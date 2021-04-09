<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use app\models\Savecoin;
use app\models\Stats;

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
        $income = Stats::find()->where(['act' => 0])->all();
        $spend = Stats::find()->where(['act' => 1])->all();

        $model = new Savecoin();
        if ($model->load(Yii::$app->request->post())) {
            // ...проверяем эти данные
            if ($model->save()) {
                return $this->refresh();
            } else {
            }
        }

        return $this->render('index', ['model' => $model, 'income' => $income, 'spend' => $spend]);
    }
}