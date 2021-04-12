<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class CategoriesAdd extends ActiveRecord
{

  public static function tableName()
  {
    return 'categoriesadd';
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