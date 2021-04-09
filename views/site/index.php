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
          <span class="income__number">
            <?php
            echo $incomeResult = array_sum(array_map(function ($product_row) {
              return $product_row['sum'];
            }, $incomeStat));
            ?>
          </span>
          <div class="income__add">
            <div class="income__add-inner">
              <span></span>
              <span></span>
            </div>
          </div>
        </div>

        <div id='add-income'>
          <?php $form = ActiveForm::begin(['id' => 'savecoin']); ?>
          <h3>Записать новый доход</h3>
          <?= $form->field($model, 'sum')->textInput(['type' => 'number']) ?>
          <?= $form->field($model, 'cat')->textInput(['autofocus' => true]) ?>
          <?= $form->field($model, 'date')->textInput(['type' => 'date', 'id' => 'date-income']) ?>
          <?= $form->field($model, 'act')->textInput(['type' => 'number', 'value' => '0']) ?>
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
          <span class="spend__number">
            <?php
            echo $spendResult = array_sum(array_map(function ($product_row) {
              return $product_row['sum'];
            }, $spendStat));
            ?>
          </span>
          <div class="spend__add">
            <div class="spend__add-inner">
              <span></span>
              <span></span>
            </div>
          </div>
        </div>

        <div id='add-spend'>
          <?php $form = ActiveForm::begin(['id' => 'savecoin']); ?>
          <h3>Записать новый расход</h3>
          <?= $form->field($model, 'sum')->textInput(['type' => 'number']) ?>
          <?= $form->field($model, 'cat')->textInput(['autofocus' => true]) ?>
          <?= $form->field($model, 'date')->textInput(['type' => 'date', 'id' => 'date-spend']) ?>
          <?= $form->field($model, 'act')->textInput(['type' => 'number', 'value' => '1']) ?>
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
          <span class="balance__number">
            <?php
            echo $balace = $incomeResult - $spendResult;
            ?>
          </span>
        </div>
      </div>

    </div>
  </div>
  <!-- end .top -->
  <div class="stats">
    <div class="row">
      <div class="stats-item stats-income col-lg-4">
        <div class="stats__inner">
          <h4 class="stats__title">ТОП поступлений</h4>
          <ul>
            <?foreach($income as $note):?>
            <li>
              <a class="stats__link" href="#" data-id="<?= $note->id ?>" data-act="<?= $note->act ?>">
                <span><?= $note->sum ?></span>
                <span><?= $note->cat ?></span>
                <span data-date="<?= $note->date ?>"><?= $ruDate = date("d.m.Y", strtotime($note->date)); ?></span>
              </a>
            </li>
            <?endforeach;?>
          </ul>
        </div>
      </div>
      <div class="stats-item stats-spend col-lg-4">
        <div class="stats__inner">
          <h4 class="stats__title">ТОП трат</h4>
          <ul>
            <?foreach($spend as $note):?>
            <li>
              <a class="stats__link" href="#" data-id="<?= $note->id ?>" data-act="<?= $note->act ?>">
                <span><?= $note->sum ?></span>
                <span><?= $note->cat ?></span>
                <span data-date="<?= $note->date ?>"><?= $ruDate = date("d.m.Y", strtotime($note->date)); ?></span>
              </a>
            </li>
            <?endforeach;?>
          </ul>
        </div>
      </div>
      <div class="stats-item stats-all col-lg-4">
        <div class="stats__inner">
          <h4 class="stats__title">10 последних операций</h4>
          <ul>
            <?foreach($all as $note):?>
            <li>
              <a class="stats__link" href="#" data-id="<?= $note->id ?>" data-act="<?= $note->act ?>">
                <span><?= $note->sum ?></span>
                <span><?= $note->cat ?></span>
                <span data-date="<?= $note->date ?>"><?= $ruDate = date("d.m.Y", strtotime($note->date)); ?></span>
              </a>
            </li>
            <?endforeach;?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- end .stats -->

  <!-- charts -->
  <div class="charts">
    <div class="row">
      <div class="col-lg12">
        <div id="container"></div>
      </div>
    </div>
  </div>
  <!-- end charts -->
</div>
<!-- modal -->
<div class="modal">
  <div class="modal__inner">
    <h3>Редактирование записи</h3>
    <a class="modal__close" href="#">
      <div class="modal__close-inner">
        <span></span>
        <span></span>
      </div>
    </a>
    <div id='edit'>
      <?php $form = ActiveForm::begin(['id' => 'savecoin']); ?>
      <?= $form->field($model, 'id')->textInput(['type' => 'number']) ?>
      <?= $form->field($model, 'sum')->textInput(['type' => 'number']) ?>
      <?= $form->field($model, 'cat')->textInput(['autofocus' => true]) ?>
      <?= $form->field($model, 'date')->textInput(['type' => 'date']) ?>
      <?= $form->field($model, 'act')->textInput(['type' => 'number']) ?>
      <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
<!-- end modal -->