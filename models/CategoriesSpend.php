<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class CategoriesSpend extends ActiveRecord
{

  public static function tableName()
  {
    return 'categoriesspend';
  }

  public function attributeLabels()
  {
    return [
      'cat_name' => 'Название категории',
    ];
  }

  public function rules()
  {
    return [
      ['id', 'trim'],
      ['cat_name', 'required'],
    ];
  }
}