<?php

/**
 * 
 */

return [
    // Dynamic routes 
    [
        'pattern' => '<controller:\w+>/<action:\w+>',
        'route' => '<controller>/<action>',
    ],
    // Dynamic modules 
    [
        'pattern' => '<module:\w+>/<controller:\w+>/<action:\w+>',
        'route' => '<module>/<controller>/<action>',
    ]
];
