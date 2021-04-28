<?php

namespace backend\controllers\api;

use common\yii\RestController;

class SiteController extends RestController
{

    protected function rules()
    {
        return [
            [
                'actions' => [
                    'version',
                ],
                'allow' => true,
                // 'roles' => ['@'],
            ],
        ];
    }

    protected function verbs()
    {
        return [
            'version' => ['get']
        ];
    }


    public function actionVersion()
    {
        return [
            'version' => '1.0.0'
        ];
    }
}
