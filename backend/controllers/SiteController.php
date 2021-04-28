<?php

namespace backend\controllers;

use common\yii\WebController;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends WebController
{

    protected function rules()
    {
        return [
            [
                'actions' => ['login', 'error', 'home'],
                'allow' => true,
            ],
            [
                'actions' => ['logout', 'index'],
                'allow' => true,
                'roles' => ['@'],
            ],
        ];
    }

    protected function verbs()
    {
        return [
            'logout' => ['post'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';
        return $this->render('login', []);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionHome()
    {
        $this->layout = 'blank';
        return $this->render('home');
    }
}
