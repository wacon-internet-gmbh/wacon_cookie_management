<?php

declare(strict_types=1);

namespace Waconcookiemanagement\WaconCookieManagement\Update;


use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\Restriction\DeletedRestriction;
use TYPO3\CMS\Core\Service\FlexFormService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;

#[UpgradeWizard('waconCookieManagement_wCMListTypeToCTypeUpdater')]

class WCMListTypeToCTypeUpdater implements UpgradeWizardInterface
{
  
     private const LIST_TYPES = [
        'waconcookiemanagement_cookiefreigabe',
        'waconcookiemanagement_script',
        'waconcookiemanagement_headerscript',
        'waconcookiemanagement_cookielist',
    ];

    /** @var FlexFormService */
    protected object $flexFormService;

    public function __construct()
    {
        $this->flexFormService = GeneralUtility::makeInstance(FlexFormService::class);
    }


    public function getTitle(): string
    {
        return 'Migrates WCM plugins';
    }

    public function getDescription(): string
    {
        return 'Migrates WCM-plugins from list_type to CType.';
    }

     public function getPrerequisites(): array
    {
        return [
            DatabaseUpdatedPrerequisite::class,
        ];
    }

    public function updateNecessary(): bool
    {
        return $this->checkIfWizardIsRequired();
    }

     public function executeUpdate(): bool
    {
        $success = false;
        foreach (self::LIST_TYPES as $list_type) {
            $success = $this->performMigration($list_type);
        }

        return $success;
    }
public function checkIfWizardIsRequired(): bool
    {
        $recordsToUpdate = 0;
        foreach (self::LIST_TYPES as $list_type) {
            $recordsToUpdate += count($this->getMigrationRecords($list_type));
        }

        return $recordsToUpdate > 0;
    }
    public function performMigration(string $list_type): bool
    {
        $records = $this->getMigrationRecords($list_type);

        foreach ($records as $record) {
            $flexFormData = GeneralUtility::xml2array($record['pi_flexform']);
            $flexForm = $this->flexFormService->convertFlexFormContentToArray($record['pi_flexform']);

         
                $targetCType = $list_type;
                $newFlexform = $record['pi_flexform'] ?? '';
         

            // Remove flexform data which do not exist in flexform of new plugin
            $this->updateContentElement($record['uid'], $targetCType, (string)$newFlexform);
        }

        return true;
    }

    protected function getMigrationRecords($list_type): array
    {
        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        $queryBuilder = $connectionPool->getQueryBuilderForTable('tt_content');
        $queryBuilder->getRestrictions()->removeAll()->add(GeneralUtility::makeInstance(DeletedRestriction::class));

        return $queryBuilder
            ->select('uid', 'list_type', 'pi_flexform')
            ->from('tt_content')
            ->where(
                $queryBuilder->expr()->eq(
                    'list_type',
                    $queryBuilder->createNamedParameter($list_type)
                ),
                $queryBuilder->expr()->eq(
                    'CType',
                    $queryBuilder->createNamedParameter('list')
                ),
            )
            ->executeQuery()
            ->fetchAllAssociative();
    }

    protected function getTargetListType(string $switchableControllerActions): string
    {
        foreach (self::MIGRATION_SETTINGS as $setting) {
            if ($setting['switchableControllerActions'] === $switchableControllerActions
            ) {
                return $setting['targetListType'];
            }
        }

        return '';
    }

    protected function getAllowedSettingsFromFlexForm(string $listType): array
    {
        $flexFormFile = $GLOBALS['TCA']['tt_content']['columns']['pi_flexform']['config']['ds']['*,' . $listType] ?? null;
        if (!$flexFormFile) {
            return [];
        }

        $flexFormContent = file_get_contents(GeneralUtility::getFileAbsFileName(substr(trim((string)$flexFormFile), 5)));
        $flexFormData = GeneralUtility::xml2array($flexFormContent);

        // Iterate each sheet and extract all settings
        $settings = [];
        foreach ($flexFormData['sheets'] as $sheet) {
            foreach ($sheet['ROOT']['el'] as $setting => $tceForms) {
                $settings[] = $setting;
            }
        }

        return $settings;
    }

    /**
     * Updates list_type and pi_flexform of the given content element UID
     */
    protected function updateContentElement(int $uid, string $newCType, string $flexform): void
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tt_content');
        $queryBuilder->update('tt_content')
            ->set('CType', $newCType)
            ->set('list_type', '')
            ->set('pi_flexform', $flexform)
            ->where(
                $queryBuilder->expr()->in(
                    'uid',
                    $queryBuilder->createNamedParameter($uid, Connection::PARAM_INT)
                )
            )
            ->executeStatement();
    }

    /**
     * Transforms the given array to FlexForm XML
     */
    protected function array2xml(array $input = []): string
    {
        $options = [
            'parentTagMap' => [
                'data' => 'sheet',
                'sheet' => 'language',
                'language' => 'field',
                'el' => 'field',
                'field' => 'value',
                'field:el' => 'el',
                'el:_IS_NUM' => 'section',
                'section' => 'itemType',
            ],
            'disableTypeAttrib' => 2,
        ];
        $spaceInd = 4;
        $output = GeneralUtility::array2xml($input, '', 0, 'T3FlexForms', $spaceInd, $options);
        return '<?xml version="1.0" encoding="utf-8" standalone="yes" ?>' . LF . $output;
    }
}