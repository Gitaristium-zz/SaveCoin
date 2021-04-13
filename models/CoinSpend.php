<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class CoinSpend extends ActiveRecord
{
    public static function tableName()
    {
        return 'coinspend';
    }

    public function attributeLabels()
    {
        return [
            'sum' => 'Сумма',
            'cat_id' => 'Категория',
            'date' => 'Дата',
        ];
    }

    public function rules()
    {
        return [
            ['id', 'trim'],
            [['sum', 'cat_id', 'date'], 'required'],
        ];
    }

    public function getCategoriesSpend()
    {
        return $this->hasOne(CategoriesSpend::className(), ['id' => 'cat_id']);
    }
}