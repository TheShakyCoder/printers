<?php

return [
    'options' => [
        [
            'name' => 'Option 1',
            'min_value' => 1,
            'max_value' => 10,
            'increment_value' => 1,
            'input' => 'quantity'
        ],
        [
            'name' => 'Option 2',
            'min_value' => 0,
            'max_value' => 1,
            'increment_value' => 1,
            'input' => 'boolean'
        ],
        [
            'name' => 'Option 3',
            'min_value' => 0,
            'max_value' => 120,
            'increment_value' => 15,
            'input' => 'minutes'
        ]
    ],
    'categories' => [
        [
            'name' => 'Steel-Backed Letterpress Polymer',
            'sort' => 1,
            'products' => [
                [
                    'name' => '1.75mm Steel-Backed',
                    'options' => [
                        'Option 1',
                        'Option 2'
                    ]
                ],
                [
                    'name' => '0.95mm Steel-Backed',
                    'options' => [
                        'Option 3'
                    ]
                ],
                [
                    'name' => '1.45mm Steel-Backed',
                    'options' => [
                        'Option 2',
                        'Option 3'
                    ]
                ]
            ]
        ],
        [
            'name' => 'Foil-Backed Letterpress Polymer',
            'sort' => 2,
            'products' => [
                [
                    'name' => '1.75mm Foil-Backed',
                    'options' => []
                ],
                [
                    'name' => '0.95mm Foil-Backed',
                    'options' => []
                ],
                [
                    'name' => 'KF-152 (1.52mm) Foil-Backed',
                    'options' => []
                ]
            ]
        ],
        [
            'name' => 'Magnesium',
            'sort' => 3,
            'products' => [
                [
                    'name' => '16 Gauge (1.6mm)',
                    'options' => []
                ],
                [
                    'name' => '8 Gauge (4mm)',
                    'options' => []
                ],
                [
                    'name' => '3 Gauge (6.35mm)',
                    'options' => []
                ]
            ]
        ],
        [
            'name' => 'Embossing Set',
            'sort' => 4,
            'products' => [
                [
                    'name' => '16 Gauge Magnesium + 0.95mm Polymer',
                    'options' => []
                ],
                [
                    'name' => '8 Gauge Magnesium + 0.95mm Polymer',
                    'options' => []
                ],
                [
                    'name' => '3 Gauge Magnesium + 0.95mm Polymer',
                    'options' => []
                ]
            ]
        ]
    ]
];