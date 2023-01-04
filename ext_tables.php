<?php

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
            'Waconcookiemanagement.WaconCookieManagement',
            'web',
            'report',
            'bottom',
            [
                \Waconcookiemanagement\WaconCookieManagement\Controller\StatController::class => 'list'
            ],
            [
                'access' => 'user',
                'iconIdentifier' => 'wacon_cookie_management-plugin-cookiefreigabe',
                'labels' => 'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_mod.xlf',
            ]
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('wacon_cookie_management', 'Configuration/TypoScript', 'Wacon Cookie Management');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_waconcookiemanagement_domain_model_cookie', 'EXT:wacon_cookie_management/Resources/Private/Language/locallang_csh_tx_waconcookiemanagement_domain_model_cookie.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_waconcookiemanagement_domain_model_cookie');
    }
);
