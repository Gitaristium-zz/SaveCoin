<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Savecoin extends ActiveRecord
{
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
            [['sum', 'cat', 'date', 'act'], 'required', 'message' => 'Поле обязательно для заполнения'],
        ];
    }
}
