<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'SaveCoin';
?>

<div class="site-index">
  <div class="stats">
    <div class="row">
      <div class="stats-item stats-income col-lg-3">
        <div class="stats__inner">
          <h4 class="stats__title">Категории поступлений</h4>
          <ul>
            <?foreach($catsAdd as $cat):?>
            <li>
              <a class="stats__link" href="#" data-id="<?= $cat->id ?>" data-act="0">
                <span class="stats__cat-name"><?= $cat->cat_name ?></span>
              </a>
            </li>
            <?endforeach;?>
          </ul>
          <button id="btn-add-categogy-add" class="btn btn-primary">Добавить</button>
        </div>
      </div>
      <div class="stats-item stats-income col-lg-3">
        <div class="stats__inner">
          <h4 class="stats__title">Категории трат</h4>
          <ul>
            <?foreach($catsSpend as $cat):?>
            <li>
              <a class="stats__link" href="#" data-id="<?= $cat->id ?>" data-act="1">
                <span class="stats__cat-name"><?= $cat->cat_name ?></span>
              </a>
            </li>
            <?endforeach;?>
          </ul>
          <button id="btn-add-categogy-spend" class="btn btn-primary">Добавить</button>
        </div>
      </div>

    </div>
  </div>
  <!-- end .stats -->
</div>

<!-- modal -->
<div id="add-categogy-add" class="modal modal-add">
  <div class="modal__inner">
    <h3>Добавить новую категорию поступлений</h3>
    <a class="modal__close" href="#">
      <div class="modal__close-inner">
        <span></span>
        <span></span>
      </div>
    </a>
    <div>
      <?php $formAdd = ActiveForm::begin(['id' => 'categories-add']); ?>
      <?= $formAdd->field($modelAdd, 'cat_name')->textInput(['autofocus' => true]) ?>
      <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
<!-- end modal -->

<!-- modal -->
<div id="add-categogy-spend" class="modal modal-spend">
  <div class="modal__inner">
    <h3>Добавить новую категорию расходов</h3>
    <a class="modal__close" href="#">
      <div class="modal__close-inner">
        <span></span>
        <span></span>
      </div>
    </a>
    <div>
      <?php $formSpend = ActiveForm::begin(['id' => 'categories-spend']); ?>
      <?= $formSpend->field($modelSpend, 'cat_name')->textInput(['autofocus' => true]) ?>
      <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
<!-- end modal -->

<!-- modal -->
<div id="add-categogy-spend" class="modal modal-edit">
  <div class="modal__inner">
    <h3>Рекдатировать категорию</h3>
    <a class="modal__close" href="#">
      <div class="modal__close-inner">
        <span></span>
        <span></span>
      </div>
    </a>
    <div>
      <?php $formEdit = ActiveForm::begin(['id' => 'categories-spend']); ?>
      <?= $formEdit->field($modelSpend, 'id')->textInput(['type' => 'number']) ?>
      <?= $formEdit->field($modelSpend, 'cat_name')->textInput(['autofocus' => true]) ?>
      <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
<!-- end modal -->