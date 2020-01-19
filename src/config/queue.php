<?php

return [
    'default' => env('QUEUE_CONNECTION', 'beanstalkd'),
    'connections' => [
        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => 'test-task-beanstalkd',
            'queue' => 'nalogka-notifications',
            'retry_after' => 90,
            'block_for' => 0,
        ],
    ],
];
