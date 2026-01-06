<?php
defined('TYPO3') or die('Access denied.');

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$ctypeKey = ExtensionUtility::registerPlugin(
    'wacon_cookie_management',
    'Cookiefreigabe',
    'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_cookiefreigabe.name',
     'wacon_cookie_management-plugin',
    'default',
     'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_cookiefreigabe.description',
     'FILE:EXT:wacon_cookie_management/Configuration/Flexforms/Cookie.xml'
);
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;Configuration,pi_flexform,',
    $ctypeKey,
    'after:subheader',
);
$ctypeKey = ExtensionUtility::registerPlugin(
    'wacon_cookie_management',
    'Script',
    'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_script.name',
     'wacon_cookie_management-plugin',
    'default',
     'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_script.description',
     'FILE:EXT:wacon_cookie_management/Configuration/Flexforms/Script.xml'
);
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;Configuration,pi_flexform,',
    $ctypeKey,
    'after:subheader',
);
$ctypeKey = ExtensionUtility::registerPlugin(
    'wacon_cookie_management',
    'Cookielist',
    'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_cookielist.name',
     'wacon_cookie_management-plugin',
    'default',
     'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_cookielist.description'
);

$ctypeKey = ExtensionUtility::registerPlugin(
    'wacon_cookie_management',
    'Headerscript',
    'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_headerscript.name',
     'wacon_cookie_management-plugin',
    'default',
     'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_headerscript.description',
     'FILE:EXT:wacon_cookie_management/Configuration/Flexforms/Headerscript.xml'
);
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;Configuration,pi_flexform,',
    $ctypeKey,
    'after:subheader',
);
