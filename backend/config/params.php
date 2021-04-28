<?php

use yii\web\Request;

$baseUrl = str_replace('/backend/web', '', (new Request())->getBaseUrl());

return [
    'adminEmail' => 'admin@example.com',
    'prefix' => IS_LOCAL ? "/yii2-backoffice-template/" : '/',
    'baseUrl' => "$baseUrl/",
];
