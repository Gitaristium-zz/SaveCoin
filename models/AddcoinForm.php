<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class AddcoinForm extends Model
{
    public $sum;
    public $cat;
    public $date;

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
            [['sum', 'cat', 'date'], 'required'],
        ];
    }

    /**
     * @return array customized attribute labels
     */


    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
}