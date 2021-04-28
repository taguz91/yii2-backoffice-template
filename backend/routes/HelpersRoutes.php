<?php

namespace backend\routes;

use Yii;
use yii\helpers\Url;

class HelpersRoutes
{

    const BASE_CONFIG = [
        'defaultRoute' => 'site/index',
    ];

    /**
     * @return (string|string[])[]
     *
     */
    protected static function defaultRules(string $path = '/../routes/routes.php'): array
    {
        return array_merge(
            self::BASE_CONFIG,
            require $path
        );
    }

    /**
     * @return (string|string[])[]
     *
     */
    static function getRules(): array
    {
        return self::defaultRules(__DIR__ . '/../routes/routes.php');
    }

    /**
     * Creamos una ruta con el prefix configurado de forma global 
     */
    static function getRoute(string $route): string
    {
        return Yii::$app->params['prefix'] . $route;
    }

    static function to(string $route): string
    {
        $route = str_replace('index.php?r=', '', $route);
        // Para reemplazar el primer & por ?
        $route = preg_replace('/&/', '?', $route, 1);
        return Url::to(Yii::$app->params['prefix'] . $route);
    }

    /**
     * Devolvemos la url actual completa 
     */
    static function getActualURL(): string
    {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return $actual_link;
    }

    static function getActualURLBase(): string
    {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        return $actual_link;
    }

    /**
     * Contactenamos la url base a la url del sitio
     *
     * @return string
     *
     * @param string[] $to
     */
    static function toWithBase(array $to): string
    {
        $base = self::getActualURLBase();
        $url = Url::to($to);
        return "{$base}{$url}";
    }
}
