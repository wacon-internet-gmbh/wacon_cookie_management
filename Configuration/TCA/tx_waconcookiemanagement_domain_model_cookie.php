<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:wacon_cookie_management/Resources/Private/Language/locallang_db.xlf:tx_waconcookiemanagement_domain_model_cookie',
        'label' => 'bezeichnung',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
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
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, bezeichnung, kategorie, anbieter, zweck, cookiename, laufzeit, datenschutzlink, host',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, bezeichnung, kategorie, anbieter, zweck, cookiename, laufzeit, datenschutzlink, host, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_waconcookiemanagement_domain_model_cookie',
                'foreign_table_where' => 'AND tx_waconcookiemanagement_domain_model_cookie.pid=###CURRENT_PID### AND tx_waconcookiemanagement_domain_model_cookie.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
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
                    ['Notwendig', 0],
                    ['Statistik', 1],
                    ['Marketing', 2],
                    ['Externe Inhalte', 3],
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
                'eval' => 'trim'
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
    
    ],
];
