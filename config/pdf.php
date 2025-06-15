<?php
return [
    'engine' => 'blade',
    'browsershot' => [
        'no_sandbox' => true,
        'options' => [
            'args' => [
                '--no-sandbox',
                '--disable-setuid-sandbox',
                '--disable-dev-shm-usage',  # Решает проблему с /dev/shm в Docker
                '--disable-gpu',            # Полезно для некоторых окружений
                '--single-process',         # Может помочь в Docker
            ],
        ],
    ],
];
