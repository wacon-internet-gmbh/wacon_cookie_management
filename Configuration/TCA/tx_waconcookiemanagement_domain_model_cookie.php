<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_waconcookiemanagement_domain_model_cookie',
        'label' => 'bezeichnung',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => true,
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
        'languageField' => 'sys_language_uid',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'bezeichnung,kategorie,anbieter,zweck,cookiename,laufzeit,datenschutzlink,host',
        'iconfile' => 'EXT:wacon_cookie_management/Resources/Public/Icons/Extension.png'
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, bezeichnung, kategorie, anbieter, zweck, cookiename, laufzeit, datenschutzlink, host, nocookieimage, nocookietext, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'group',
                'allowed' => 'tx_waconcookiemanagement_domain_model_cookie',
                'size' => 1,
                'maxitems' => 1,
                'minitems' => 0,
                'default' => 0,
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 0,
                'items' => [
                    ['label' => '', 'value' => ''],
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel',
            'config' => [
                'type' => 'datetime',
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
            'config' => [
                'type' => 'datetime',
            ],
        ],

        'bezeichnung' => [
            'exclude' => true,
            'label' => 'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_waconcookiemanagement_domain_model_cookie.bezeichnung',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'kategorie' => [
            'exclude' => true,
            'label' => 'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_waconcookiemanagement_domain_model_cookie.kategorie',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['label' => 'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_waconcookiemanagement_domain_model_cookie.kategorie.0', 'value' => 0],
                    ['label' => 'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_waconcookiemanagement_domain_model_cookie.kategorie.1', 'value' => 1],
                    ['label' => 'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_waconcookiemanagement_domain_model_cookie.kategorie.2', 'value' => 2],
                    ['label' => 'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_waconcookiemanagement_domain_model_cookie.kategorie.3', 'value' => 3],
                ],
            ],
        ],
        'anbieter' => [
            'exclude' => true,
            'label' => 'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_waconcookiemanagement_domain_model_cookie.anbieter',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'zweck' => [
            'exclude' => true,
            'label' => 'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_waconcookiemanagement_domain_model_cookie.zweck',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'enableRichtext' => true,
            ]
        ],
        'cookiename' => [
            'exclude' => true,
            'label' => 'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_waconcookiemanagement_domain_model_cookie.cookiename',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'laufzeit' => [
            'exclude' => true,
            'label' => 'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_waconcookiemanagement_domain_model_cookie.laufzeit',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'datenschutzlink' => [
            'exclude' => true,
            'label' => 'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_waconcookiemanagement_domain_model_cookie.datenschutzlink',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'host' => [
            'exclude' => true,
            'label' => 'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_waconcookiemanagement_domain_model_cookie.host',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'nocookieimage' => [
            'exclude' => true,
            'label' => 'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_waconcookiemanagement_domain_model_cookie.nocookieimage',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-media-types',
            ],
        ],
        'nocookietext' => [
            'exclude' => true,
            'label' => 'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_waconcookiemanagement_domain_model_cookie.nocookietext',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'enableRichtext' => true,
            ],
        ],
    ],
];
