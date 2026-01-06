<?php
defined('TYPO3') or die('Access denied.');
use \TYPO3\CMS\Extbase\Utility\ExtensionUtility;
call_user_func(
    function () {
        ExtensionUtility::configurePlugin(
            'wacon_cookie_management',
            'Cookiefreigabe',
            [
                \Waconcookiemanagement\WaconCookieManagement\Controller\CookieController::class => 'list',
            ],
            // non-cacheable actions
            [
                \Waconcookiemanagement\WaconCookieManagement\Controller\CookieController::class => 'list'
            ],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
        );
        ExtensionUtility::configurePlugin(
            'wacon_cookie_management',
            'Script',
            [
                \Waconcookiemanagement\WaconCookieManagement\Controller\CookieController::class => 'show',
            ],
            // non-cacheable actions
            [
                \Waconcookiemanagement\WaconCookieManagement\Controller\CookieController::class => 'show',
            ],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
        );
        ExtensionUtility::configurePlugin(
            'wacon_cookie_management',
            'Headerscript',
            [
                \Waconcookiemanagement\WaconCookieManagement\Controller\CookieController::class => 'headerscript',
            ],
            // non-cacheable actions
            [
                \Waconcookiemanagement\WaconCookieManagement\Controller\CookieController::class => 'headerscript',
            ],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
        );
        ExtensionUtility::configurePlugin(
            'wacon_cookie_management',
            'Cookielist',
            [
                \Waconcookiemanagement\WaconCookieManagement\Controller\CookieController::class => 'cookielist',
            ],
            // non-cacheable actions
            [

            ],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
        );

      
       

    }
);
