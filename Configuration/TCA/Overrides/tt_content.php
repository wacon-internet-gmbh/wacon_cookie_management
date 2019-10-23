<?php
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['waconcookiemanagement_script'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    // plugin signature: <extension key without underscores> '_' <plugin name in lowercase>
    'waconcookiemanagement_script',
    'FILE:EXT:wacon_cookie_management/Configuration/FlexForms/Script.xml'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['waconcookiemanagement_cookiefreigabe'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    // plugin signature: <extension key without underscores> '_' <plugin name in lowercase>
    'waconcookiemanagement_cookiefreigabe',
    'FILE:EXT:wacon_cookie_management/Configuration/FlexForms/Cookie.xml'
);
