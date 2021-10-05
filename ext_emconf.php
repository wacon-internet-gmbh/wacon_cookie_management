<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "wacon_cookie_management"
 *
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'Wacon Cookie Management',
    'description' => 'WCM is a typo3 extension that enables website visitors to control and manage the usage of cookies on the website (commonly known as "cookie consent box"). Thus it helps website owner to be in line with the rules of the General Data Protection Regulation (GDPR) which took effect on 25 May 2018.',
    'category' => 'plugin',
    'author' => 'Kerstin Schmitt',
    'author_email' => 'info@wacon.de',
    'author_company' => 'WACON Internet GmbH',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '3.2.1',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
