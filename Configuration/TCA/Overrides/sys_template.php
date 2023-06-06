<?php
defined('TYPO3') or die('Access denied.');
call_user_func(function()
{
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('wacon_cookie_management', 'Configuration/TypoScript', 'Wacon Cookie Management');
  
});