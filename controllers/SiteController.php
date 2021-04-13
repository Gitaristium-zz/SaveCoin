<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use app\models\CoinAdd;
use app\models\CoinSpend;
use app\models\CategoriesAdd;
use app\models\CategoriesSpend;

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
        $income = CoinAdd::find()->orderBy('sum DESC')->limit(5)->all();
        $spend = CoinSpend::find()->orderBy('sum DESC')->limit(5)->all();
        // $all = Stats::find()->orderBy('date DESC')->all();
        $incomeStat = CoinAdd::find()->all();
        $spendStat = CoinSpend::find()->all();

        $modelIncome = new CoinAdd();
        if ($modelIncome->load(Yii::$app->request->post())) {
            // ...проверяем эти данные
            if ($modelIncome->save()) {
                return $this->refresh();
            } else {
            }
        }

        $modelSpend = new CoinSpend();
        if ($modelSpend->load(Yii::$app->request->post())) {
            // ...проверяем эти данные
            if ($modelSpend->save()) {
                return $this->refresh();
            } else {
            }
        }

        return $this->render('index', compact('modelIncome', 'modelSpend', 'income', 'spend', 'incomeStat', 'spendStat'));
    }

    public function actionCategories()
    {
        $id = 1;
        $modelAdd = new CategoriesAdd();
        if ($modelAdd->load(Yii::$app->request->post())) {
            if ($modelAdd->save()) {
                return $this->refresh();
            } else {
            }
        }
        $modelSpend = new CategoriesSpend();
        if ($modelSpend->load(Yii::$app->request->post())) {
            if ($modelSpend->save()) {
                return $this->refresh();
            } else {
            }
        }


        //списки
        $catsAdd = CategoriesAdd::find()->orderBy('cat_name ASC')->all();
        $catsSpend = CategoriesSpend::find()->orderBy('cat_name ASC')->all();
        // $catId = 1;
        // $catsEdit = CategoriesSpend::find()->where('id = ' . $catId)->all();
        // echo '<pre>';
        // print_r($catsEdit);
        // echo '</pre>';

        return $this->render('categories', compact('modelAdd', 'modelSpend', 'catsAdd', 'catsSpend'));
    }

    public function actionEdit($id, $edit)
    {
        $edit = Yii::$app->request->get('edit');
        //редактирование
        if (!ctype_digit($id)) {
            return $this->redirect(['site/categories']);
        }

        if ($edit == 'cat-add') {
            $modelEdit = CategoriesAdd::findOne($id);
        } else {
            if ($edit == 'cat-spend') {
                $modelEdit = CategoriesSpend::findOne($id);
            } else {
                if ($edit == 'add') {
                    $modelEdit = Stats::findOne($id);
                } else {
                    $modelEdit = Stats::findOne($id);
                }
            }
        }


        // если пришли post-данные
        if ($modelEdit->load(Yii::$app->request->post())) {
            // проверяем и сохраняем эти данные
            if ($modelEdit->update()) {
                // данные прошли валидацию и записаны в БД
                return $this->redirect(['site/categories']);
            }
            // данные не прошли валидацию
            Yii::$app->session->setFlash(
                'success',
                false
            );
        }

        return $this->render('edit', compact('modelEdit'));
    }

    public function actionDelete($id)
    {
        if (!ctype_digit($id)) {
            return $this->redirect(['site/categories']);
        }
        $modelDelete = CategoriesSpend::findOne($id);
        $modelDelete->delete();
        return $this->redirect(['site/categories']);
    }
}