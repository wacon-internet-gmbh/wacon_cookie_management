<?php

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Waconcookiemanagement.WaconCookieManagement',
            'Cookiefreigabe',
            [
                \Waconcookiemanagement\WaconCookieManagement\Controller\CookieController::class => 'list',
            ],
            // non-cacheable actions
            [
                \Waconcookiemanagement\WaconCookieManagement\Controller\CookieController::class => 'list'
            ]
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Waconcookiemanagement.WaconCookieManagement',
            'Script',
            [
                \Waconcookiemanagement\WaconCookieManagement\Controller\CookieController::class => 'show',
            ],
            // non-cacheable actions
            [
                \Waconcookiemanagement\WaconCookieManagement\Controller\CookieController::class => 'show',
            ]
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Waconcookiemanagement.WaconCookieManagement',
            'Cookielist',
            [
                \Waconcookiemanagement\WaconCookieManagement\Controller\CookieController::class => 'cookielist',
            ],
            // non-cacheable actions
            [
                \Waconcookiemanagement\WaconCookieManagement\Controller\CookieController::class => ''
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    cookiefreigabe {
                        iconIdentifier = wacon_cookie_management-plugin-cookiefreigabe
                        title = LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_cookiefreigabe.name
                        description = LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_cookiefreigabe.description
                        tt_content_defValues {
                            CType = list
                            list_type = waconcookiemanagement_cookiefreigabe
                        }
                    }
                    cookielist {
                        iconIdentifier = wacon_cookie_management-plugin-script
                        title = LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_cookielist.name
                        description = LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_cookielist.description
                        tt_content_defValues {
                            CType = list
                            list_type = waconcookiemanagement_cookielist
                        }
                    }
                    script {
                        iconIdentifier = wacon_cookie_management-plugin-script
                        title = LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_script.name
                        description = LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_script.description
                        tt_content_defValues {
                            CType = list
                            list_type = waconcookiemanagement_script
                        }
                    }
                }
                show = *
            }
       }'
        );
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

        $iconRegistry->registerIcon(
            'wacon_cookie_management-plugin-cookiefreigabe',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:wacon_cookie_management/Resources/Public/Icons/user_plugin_cookiefreigabe.svg']
        );

        $iconRegistry->registerIcon(
            'wacon_cookie_management-plugin-script',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:wacon_cookie_management/Resources/Public/Icons/user_plugin_script.svg']
        );
    }
);
