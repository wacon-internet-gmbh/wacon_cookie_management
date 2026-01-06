<?php

declare(strict_types=1);

namespace Waconcookiemanagement\WaconCookieManagement\Upgrades;


use TYPO3\CMS\Core\Attribute\UpgradeWizard;
use TYPO3\CMS\Core\Upgrades\AbstractListTypeToCTypeUpdate;

#[UpgradeWizard('WCMListTypeToCTypeUpdate')]
final class WCMListTypeToCTypeUpdate extends AbstractListTypeToCTypeUpdate
{
    protected function getListTypeToCTypeMapping(): array
    {
        return [
            'waconcookiemanagement_cookiefreigabe' => 'waconcookiemanagement_cookiefreigabe',
            'waconcookiemanagement_script' => 'waconcookiemanagement_script',
            'waconcookiemanagement_headerscript' => 'waconcookiemanagement_headerscript',
            'waconcookiemanagement_cookielist' => 'waconcookiemanagement_cookielist',
        ];
    }

    public function getTitle(): string
    {
        return 'Migrates WCM plugins';
    }

    public function getDescription(): string
    {
        return 'Migrates WCM-plugins from list_type to CType.';
    }
}