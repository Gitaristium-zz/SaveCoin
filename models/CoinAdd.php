<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class CoinAdd extends ActiveRecord
{
    public static function tableName()
    {
        return 'coinadd';
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
    public function getCategoriesAdd()
    {
        return $this->hasOne(CategoriesAdd::className(), ['id' => 'cat_id']);
    }
}