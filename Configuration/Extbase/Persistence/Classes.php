<?php
declare(strict_types = 1);

return [
    \Waconcookiemanagement\WaconCookieManagement\Domain\Model\Stat::class => [
        'tableName' => 'tx_waconcookiemanagement_domain_model_stat',
        'recordType' => \Waconcookiemanagement\WaconCookieManagement\Domain\Model\Stat::class,
        'properties' => [
            'creationDate' => [
                'fieldName' => 'crdate'
            ],
        ],
    ],
];