<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Savecoin extends ActiveRecord
{
    public static function tableName()
    {
        return 'coinadd';
    }

    public function attributeLabels()
    {
        return [
            'sum' => 'Сумма',
            'cat' => 'Категория',
            'date' => 'Дата',
        ];
    }

    public function rules()
    {
        return [
            ['id', 'trim'],
            [['sum', 'cat', 'date', 'act'], 'required'],
        ];
    }
}