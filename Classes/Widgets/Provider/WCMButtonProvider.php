<?php

declare(strict_types=1);

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

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Dashboard\Widgets\ButtonProviderInterface;

/**
 * Provide link for sys log button.
 * Check whether belog is enabled and add link to module.
 * No link is returned if not enabled.
 */
class WCMButtonProvider implements ButtonProviderInterface
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $target;

    public function __construct(string $title = 'Details', string $target = '')
    {
        $this->title = $title;
        $this->target = $target;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getLink(): string
    {
        if (ExtensionManagementUtility::isLoaded('wacon_cookie_management')) {
            return 'javascript:top.goToModule('
                . GeneralUtility::quoteJSvalue('web_WaconCookieManagementReport') . ', '
                . GeneralUtility::quoteJSvalue('&' . http_build_query(['tx_wacon_cookie_management_web_waconcookiemanagementreport' => ['constraint' => ['action' => -1]]])) . ');';
        }

        return '';
    }

    public function getTarget(): string
    {
        return $this->target;
    }
}
