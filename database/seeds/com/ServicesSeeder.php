<?php

namespace seeds\com;

use App\Models\Service\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    public const DEFAULT_VALUES = [
        [
            'min'   => 1,
            'max'   => 1000000,
            'value' => 0
        ]
    ];

    private string $table = 'services';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        foreach ($this->getDump() as $layout) {
            /**
             * @var Service $service
             */
            $service = Service::create($layout['tariff']);
            $service->values()->createMany($layout['values']);
        }
    }

    private function getDump (): array
    {
        return [
            [
                'tariff' => [
                    'alias'       => 'physical_normal',
                    'person_type' => 'physical',
                    'name_en'     => 'Preparation of the card for the natural person in normal regime.',
                    'name_ro'     => 'Perfectarea carnetului pentru persoana fizica in regim normal.',
                    'name_ru'     => 'Подготовка карты для физического лица в обычном режиме.',
                    'default' => 1
                ],
                'values' => [
                    [
                        'min'   => 1,
                        'max'   => 1000000,
                        'value' => 1300
                    ]
                ]
            ],
            [
                'tariff' => [
                    'alias'       => 'physical_urgent',
                    'person_type' => 'physical',
                    'name_en'     => 'Preparation of the card for the individual in emergency.',
                    'name_ro'     => 'Perfectarea carnetului pentru persoana fizica in regim de urgenta.',
                    'name_ru'     => 'Подготовка карты для физического лица в аварийном режиме.',
                    'default' => 1
                ],
                'values' => [
                    [
                        'min'   => 1,
                        'max'   => 1000000,
                        'value' => 700
                    ]
                ]
            ],
            [
                'tariff' => [
                    'alias'       => 'juridical_normal',
                    'person_type' => 'juridical',
                    'name_en'     => 'Completion of the legal person card in normal regime.',
                    'name_ro'     => 'Perfectarea carnetului persoana juridica in regim normal.',
                    'name_ru'     => 'Заполнение карты юридического лица в обычном режиме.',
                    'default' => 1
                ],
                'values' => [
                    [
                        'min'   => 1,
                        'max'   => 1000000,
                        'value' => 1900
                    ]
                ]
            ],
            [
                'tariff' => [
                    'alias'       => 'juridical_urgent',
                    'person_type' => 'juridical',
                    'name_en'     => 'Preparation of the card for the natural person in emergency regime.',
                    'name_ro'     => 'Perfectarea carnetului pentru persoana fizica in regim de urgenta.',
                    'name_ru'     => 'Подготовка карты для физического лица в экстренном режиме.',
                    'default' => 1
                ],
                'values' => [
                    [
                        'min'   => 1,
                        'max'   => 1000000,
                        'value' => 1100
                    ]
                ]
            ],
            [
                'tariff' => [
                    'alias'       => 'extra_visit',
                    'person_type' => 'both',
                    'name_en'     => 'For each additional trip / visit.',
                    'name_ro'     => 'Pentru fiecare calatorie/vizita suplimentara.',
                    'name_ru'     => 'За каждую дополнительную поездку / посещение.',
                ],
                'values' => [
                    [
                        'min'   => 1,
                        'max'   => 1000000,
                        'value' => 150
                    ]
                ]
            ],
            [
                'tariff' => [
                    'alias'       => 'extra_positions',
                    'person_type' => 'both',
                    'name_en'     => 'For each additional position.',
                    'name_ro'     => 'Pentru fiecare pozitie suplimentara.',
                    'name_ru'     => 'По каждой дополнительной позиции.',
                ],
                'values' => [
                    [
                        'min'   => 1,
                        'max'   => 1,
                        'value' => 0
                    ],
                    [
                        'min'   => 2,
                        'max'   => 4,
                        'value' => 30
                    ],
                    [
                        'min'   => 5,
                        'max'   => 20,
                        'value' => 20
                    ],
                    [
                        'min'   => 21,
                        'max'   => 50,
                        'value' => 10
                    ],
                    [
                        'min'   => 51,
                        'max'   => 1000,
                        'value' => 5
                    ],
                ]
            ],
            [
                'tariff' => [
                    'alias'       => 'extra_visits_after',
                    'person_type' => 'both',
                    'name_en'     => 'Completion with additional sheets for subsequent visits.',
                    'name_ro'     => 'Completarea cu fise suplimentare pentru vizite ulterioare.',
                    'name_ru'     => 'Заполнение дополнительными листами для последующих посещений.',
                ],
                'values' => [
                    [
                        'min'   => 1,
                        'max'   => 1000000,
                        'value' => 500
                    ]
                ]
            ],
            [
                'tariff' => [
                    'alias'       => 'data_edit',
                    'person_type' => 'both',
                    'name_en'     => 'Modification of the data from the ATA carnet.',
                    'name_ro'     => 'Modificarea datelor din carnetul ATA.',
                    'name_ru'     => 'Модификация данных из книжки АТА.',
                ],
                'values' => [
                    [
                        'min'   => 1,
                        'max'   => 1000000,
                        'value' => 300
                    ]
                ]
            ],
            [
                'tariff' => [
                    'alias'   => 'ata_exposition_discount',
                    'person_type' => 'both',
                    'name_en' => 'Discount for participants in the CCI exhibitions of the Republic of Moldova.',
                    'name_ro' => 'Reducere pentru participantii la expozitiile CCI a RM.',
                    'name_ru' => 'Скидка для участников выставок ТПП Республики Молдова.',
                    'default' => 1
                ],
                'values' => [
                    [
                        'min'   => 1,
                        'max'   => 1000000,
                        'value' => 40
                    ]
                ]
            ]
        ];
    }
}

