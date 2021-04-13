<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = 'SaveCoin';
?>
<?php if (Yii::$app->session->hasFlash('success')) : ?>
<?php if (Yii::$app->session->getFlash('success')) : ?>
<p>Данные формы прошли валидацию</p>
<?php else : ?>
<p>Данные формы не прошли валидацию</p>
<?php endif; ?>
<?php endif; ?>

<div class="site-index">
  <div class="stats">
    <div class="row">
      <div class="stats-item stats-income col-lg-3">
        <div class="stats-item__inner">
          <h4 class="stats-item__title">Категории поступлений</h4>
          <ul>
            <?foreach($catsAdd as $cat):?>
            <li>
              <div class="stats-item__linkbox stats-item__linkbox--add">
                <span class="stats-item__cat-name"><?= $cat->cat_name ?></span>
                <span>
                  <?php $url = Url::toRoute(['site/edit', 'id' => $cat->id, 'edit' => 'cat-add']); ?>
                  <a href="<?= $url; ?>" data-id="<?= $cat->id ?>">
                    <i class="fas fa-edit"></i>
                  </a>
                  <?php $url = Url::toRoute(['site/delete', 'id' => $cat->id]); ?>
                  <a href="<?= $url; ?>" data-id="<?= $cat->id ?>">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                </span>
              </div>
            </li>
            <?endforeach;?>
          </ul>
          <button id="btn-add-categogy-add" class="btn btn-primary">Добавить</button>
        </div>
      </div>
      <div class="stats-item stats-income col-lg-3">
        <div class="stats-item__inner">
          <h4 class="stats-item__title">Категории трат</h4>
          <ul>
            <?foreach($catsSpend as $cat):?>
            <li>
              <div class="stats-item__linkbox stats-item__linkbox--spend">
                <span class="stats-item__cat-name"><?= $cat->cat_name ?></span>
                <span>
                  <?php $url = Url::toRoute(['site/edit', 'id' => $cat->id, 'edit' => 'cat-spend']); ?>
                  <a href="<?= $url; ?>" data-id="<?= $cat->id ?>">
                    <i class="fas fa-edit"></i>
                  </a>
                  <?php $url = Url::toRoute(['site/delete', 'id' => $cat->id]); ?>
                  <a href="<?= $url; ?>" data-id="<?= $cat->id ?>">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                </span>
              </div>
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
      <?= $formEdit->field($modelSpend, 'cat_name')->textInput(['autofocus' => true, 'class' => 'edit-catname form-control']) ?>
      <div class="form-group">
        <a class="link-edit btn btn-primary" href="#">Сохранить</a>
        <?php $url = Url::toRoute(['site/delete', 'id' => $catId]); ?>
        <td><a class="btn btn-danger" href="<?= $url; ?>">Удалить</a></td>
        <?php ActiveForm::end(); ?>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->