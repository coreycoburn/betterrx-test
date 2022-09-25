<?php

namespace Tests\Mocks;

use App\Contracts\NPIInterface;

class NPIRegistryClientFake implements NPIInterface
{
    public function __construct()
    {
    }

    public function get(array $terms = []): array
    {
        return  [
            [
                'created_epoch' => '1514845785000',
                'enumeration_type' => 'NPI-1',
                'last_updated_epoch' => '1514845785000',
                'number' => '1528575479',
                'addresses' => [
                    [
                        'country_code' => 'US',
                        'country_name' => 'United States',
                        'address_purpose' => 'MAILING',
                        'address_type' => 'DOM',
                        'address_1' => '587 UNIVERSITY AVE APT 3',
                        'city' => 'ROCHESTER',
                        'state' => 'NY',
                        'postal_code' => '146071411',
                        'telephone_number' => '585-369-6202',
                    ],
                    [
                        'country_code' => 'US',
                        'country_name' => 'United States',
                        'address_purpose' => 'LOCATION',
                        'address_type' => 'DOM',
                        'address_1' => '350 NEW CAMPUS DR',
                        'city' => 'BROCKPORT',
                        'state' => 'NY',
                        'postal_code' => '144202997',
                        'telephone_number' => '585-395-2211',
                    ],
                ],
                'practiceLocations' => [],
                'basic' => [
                    'first_name' => 'COREY',
                    'last_name' => 'LUCEY',
                    'middle_name' => 'EVERETT',
                    'sole_proprietor' => 'YES',
                    'gender' => 'M',
                    'enumeration_date' => '2018-01-01',
                    'last_updated' => '2018-01-01',
                    'status' => 'A',
                ],
                'taxonomies' => [
                    [
                        'code' => '390200000X',
                        'taxonomy_group' => '',
                        'desc' => 'Student in an Organized Health Care Education/Training Program',
                        'state' => null,
                        'license' => null,
                        'primary' => true,
                    ],
                ],
                'identifiers' => [],
                'endpoints' => [],
                'other_names' => [
                    [
                        'type' => 'Professional Name',
                        'code' => '2',
                        'credential' => 'ATC Student',
                        'first_name' => 'COREY',
                        'last_name' => 'LUCEY',
                        'middle_name' => 'EVERETT',
                    ],
                ],
            ],
            [
                'created_epoch' => '1514926284000',
                'enumeration_type' => 'NPI-1',
                'last_updated_epoch' => '1514926284000',
                'number' => '1407363237',
                'addresses' => [
                    [
                        'country_code' => 'US',
                        'country_name' => 'United States',
                        'address_purpose' => 'MAILING',
                        'address_type' => 'DOM',
                        'address_1' => '4815 S CHICAGO ST',
                        'city' => 'SEATTLE',
                        'state' => 'WA',
                        'postal_code' => '981184115',
                        'telephone_number' => '206-214-7317',
                    ],
                    [
                        'country_code' => 'US',
                        'country_name' => 'United States',
                        'address_purpose' => 'LOCATION',
                        'address_type' => 'DOM',
                        'address_1' => '218 S 38TH ST',
                        'city' => 'TACOMA',
                        'state' => 'WA',
                        'postal_code' => '984187807',
                        'telephone_number' => '206-313-8840',
                    ],
                ],
                'practiceLocations' => [],
                'basic' => [
                    'first_name' => 'COREY',
                    'last_name' => 'HUBBARD',
                    'middle_name' => 'ELIZABETH',
                    'sole_proprietor' => 'NO',
                    'gender' => 'F',
                    'enumeration_date' => '2018-01-02',
                    'last_updated' => '2018-01-02',
                    'status' => 'A',
                ],
                'taxonomies' => [
                    [
                        'code' => '103K00000X',
                        'taxonomy_group' => '',
                        'desc' => 'Behavior Analyst',
                        'state' => null,
                        'license' => null,
                        'primary' => true,
                    ],
                ],
                'identifiers' => [
                    [
                        'code' => '05',
                        'desc' => 'MEDICAID',
                        'issuer' => null,
                        'identifier' => '111524501',
                        'state' => 'WA',
                    ],
                ],
                'endpoints' => [],
                'other_names' => [],
            ],
        ];
    }
}
