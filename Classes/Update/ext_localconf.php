<?php

if (!defined('TYPO3')) {
	die('Access denied.');
}

use YellowTree\YtPalladio\ViewHelpers;

// custom RTE config
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['ytminimal'] = 'EXT:yt_palladio/Configuration/RTE/Minimal.yaml';

// custom CSS in backend
$GLOBALS['TYPO3_CONF_VARS']['BE']['stylesheets']['yt_palladio'] = 'EXT:yt_palladio/Resources/Public/Dist/styles/backend.css';

// enable custom ViewHelpers globally
$GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['namespaces']['ytpal'] = [ViewHelpers::class];
