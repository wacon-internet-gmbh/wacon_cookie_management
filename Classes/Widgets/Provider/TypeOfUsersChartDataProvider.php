<?php

//declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace Waconcookiemanagement\WaconCookieManagement\Widgets\Provider;

use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Localization\LanguageService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Dashboard\WidgetApi;
use TYPO3\CMS\Dashboard\Widgets\ChartDataProviderInterface;

class TypeOfUsersChartDataProvider implements ChartDataProviderInterface
{
    /**
     * @var LanguageService
     */
    private $languageService;

    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

    /**
     * @inheritDoc
     */
    public function getChartData(): array
    {
        $maxCookies = $this->getNumberOfCookies('max');
        $minCookies = $this->getNumberOfCookies('min');
        $customCookies = $this->getNumberOfCookies('custom');
        
        return [
            'labels' => [
                $this->languageService ->sL('LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang.xlf:stats.all'),
                $this->languageService ->sL('LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang.xlf:stats.custom'),
                $this->languageService ->sL('LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang.xlf:stats.none')
            ],
            'datasets' => [
                [
                    'backgroundColor' => WidgetApi::getDefaultChartColors(),
                    'data' => [$maxCookies,$customCookies,$minCookies]
                ]
            ],
        ];
    }

    protected function getNumberOfCookies(string $config = 'max'): int
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_waconcookiemanagement_domain_model_stat');
        return (int)$queryBuilder
            ->count('*')
            ->from('tx_waconcookiemanagement_domain_model_stat')
            ->where(
                $queryBuilder->expr()->eq(
                    'cookieconfig',
                    $queryBuilder->createNamedParameter($config)
                )
            )
            ->execute()
            ->fetchColumn();
    }
}
