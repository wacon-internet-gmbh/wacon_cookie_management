<?php
defined('TYPO3') or die('Access denied.');

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionUtility::registerPlugin(
    'wacon_cookie_management',
    'Cookiefreigabe',
    'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_cookiefreigabe.name'
);

ExtensionUtility::registerPlugin(
    'wacon_cookie_management',
    'Script',
    'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_script.name'
);

ExtensionUtility::registerPlugin(
    'wacon_cookie_management',
    'Cookielist',
    'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_wacon_cookie_management_cookielist.name'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['waconcookiemanagement_script'] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue(
    // plugin signature: <extension key without underscores> '_' <plugin name in lowercase>
    'waconcookiemanagement_script',
    'FILE:EXT:wacon_cookie_management/Configuration/FlexForms/Script.xml'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['waconcookiemanagement_cookiefreigabe'] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue(
    // plugin signature: <extension key without underscores> '_' <plugin name in lowercase>
    'waconcookiemanagement_cookiefreigabe',
    'FILE:EXT:wacon_cookie_management/Configuration/FlexForms/Cookie.xml'
);
/*$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['waconcookiemanagement_cookielist'] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue(
    // plugin signature: <extension key without underscores> '_' <plugin name in lowercase>
    'waconcookiemanagement_cookielist',
    'FILE:EXT:wacon_cookie_management/Configuration/FlexForms/Cookielist.xml'
);*/
