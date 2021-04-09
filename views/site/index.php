<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'SaveCoin';
?>

<div class="site-index">

  <div class="top">
    <div class="row">

      <div class="top__inner col-lg-4">
        <div class="top__income  income ">
          <span class="income__text">Доход:</span>
          <span class="income__currency">&#8381</span>
          <span class="income__number">45000</span>
          <div class="income__add">
            <div class="income__add-inner">
              <span></span>
              <span></span>
            </div>
          </div>
        </div>

        <div id='add-income'>
          <?php $form = ActiveForm::begin(['id' => 'savecoin']); ?>
          <?= $form->field($model, 'sum')->textInput(['type' => 'number', 'id' => 'sum']) ?>
          <?= $form->field($model, 'cat')->textInput(['autofocus' => true]) ?>
          <?= $form->field($model, 'date')->textInput(['type' => 'date', 'id' => 'date-income']) ?>
          <div class="form-group">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
          </div>
          <?php ActiveForm::end(); ?>
        </div>

      </div>

      <div class="top__inner col-lg-4">
        <div class="top__spend spend">
          <span class="spend__text">Расход:</span>
          <span class="spend__currency">&#8381</span>
          <span class="spend__number">28500</span>
          <div class="spend__add">
            <div class="spend__add-inner">
              <span></span>
              <span></span>
            </div>
          </div>
        </div>

        <div id='add-spend'>
          <?php $form = ActiveForm::begin(['id' => 'savecoin']); ?>
          <?= $form->field($model, 'sum')->textInput(['type' => 'number', 'id' => 'sum']) ?>
          <?= $form->field($model, 'cat')->textInput(['autofocus' => true]) ?>
          <?= $form->field($model, 'date')->textInput(['type' => 'date', 'id' => 'date-spend']) ?>
          <div class="form-group">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
          </div>
          <?php ActiveForm::end(); ?>
        </div>

      </div>

      <div class="top__inner col-lg-4">
        <div class="top__balance balance">
          <span class="balance__text">Остаток:</span>
          <span class="balance__currency">&#8381</span>
          <span class="balance__number">16500</span>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-lg-4">
        <ul>
          <?foreach($income as $note):?>
          <li>
            <span><?= $note->sum ?></span>
            <span><?= $note->cat ?></span>
            <span><?= $note->date ?></span>
          </li>
          <?endforeach;?>
        </ul>
      </div>
      <div class="col-lg-4">
        <ul>
          <?foreach($spend as $note):?>
          <li>
            <span><?= $note->sum ?></span>
            <span><?= $note->cat ?></span>
            <span><?= $note->date ?></span>
          </li>
          <?endforeach;?>
        </ul>
      </div>
    </div>
  </div>



</div>