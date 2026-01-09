<?php
defined('TYPO3') or die('Access denied.');

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$ctypeKey = ExtensionUtility::registerPlugin(
    'wacon_cookie_management',
    'Cookiefreigabe',
    'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_cookiefreigabe.name',
     'wacon_cookie_management-plugin',
    'plugins',
     'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_cookiefreigabe.description'

);
ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:wacon_cookie_management/Configuration/FlexForms/Cookie.xml',
    'waconcookiemanagement_cookiefreigabe',
);
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;Configuration,pi_flexform,',
    'waconcookiemanagement_cookiefreigabe',
    'after:subheader',
);


$ctypeKey = ExtensionUtility::registerPlugin(
    'WaconCookieManagement',
    'Script',
    'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_script.name',
     'wacon_cookie_management-plugin',
    'plugins',
     'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_script.description'
   
);
ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:wacon_cookie_management/Configuration/FlexForms/Script.xml',
    'waconcookiemanagement_script',
);
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;Configuration,pi_flexform,',
    'waconcookiemanagement_script',
    'after:subheader',
);



$ctypeKey = ExtensionUtility::registerPlugin(
    'wacon_cookie_management',
    'Cookielist',
    'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_cookielist.name',
     'wacon_cookie_management-plugin',
    'plugins',
     'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_cookielist.description'
);

$ctypeKey = ExtensionUtility::registerPlugin(
    'wacon_cookie_management',
    'Headerscript',
    'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_headerscript.name',
     'wacon_cookie_management-plugin',
    'plugins',
     'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_headerscript.description'
     
);
ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:wacon_cookie_management/Configuration/FlexForms/Headerscript.xml',
    'waconcookiemanagement_headerscript',
);
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;Configuration,pi_flexform,',
    'waconcookiemanagement_headerscript',
    'after:subheader',
);

