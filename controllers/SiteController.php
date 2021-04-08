<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use app\models\Savecoin;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new Savecoin();
        // если пришли post-данные...
        if ($model->load(Yii::$app->request->post())) {
            // ...проверяем эти данные
            if ($model->save()) {
                // данные прошли валидацию, отмечаем этот факт
                Yii::$app->session->setFlash(
                    'success',
                    true
                );
                // перезагружаем страницу, чтобы избежать повтороной отправки формы
                return $this->refresh();
            } else {
                // данные не прошли валидацию, отмечаем этот факт
                Yii::$app->session->setFlash(
                    'success',
                    false
                );
                // не перезагружаем страницу, чтобы сохранить пользовательские данные
            }
        }

        return $this->render('index', ['model' => $model]);
    }
}