<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

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

        <div id='add-income' class="add-income">
          <?php $formAdd = ActiveForm::begin(); ?>
          <h3>Записать новый доход</h3>
          <?= $formAdd->field($modelIncome, 'sum')->textInput(['type' => 'number']) ?>
          <?= $formAdd->field($modelIncome, 'cat_id')->textInput(['type' => 'number', 'autofocus' => true]) ?>
          <?= $formAdd->field($modelIncome, 'date')->textInput(['type' => 'date', 'id' => 'date-income']) ?>
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

        <div id='add-spend' class="add-spend">
          <?php $formSpend = ActiveForm::begin(); ?>
          <h3>Записать новый расход</h3>
          <?= $formSpend->field($modelSpend, 'sum')->textInput(['type' => 'number']) ?>
          <?= $formSpend->field($modelSpend, 'cat_id')->textInput(['type' => 'number', 'autofocus' => true]) ?>
          <?= $formSpend->field($modelSpend, 'date')->textInput(['type' => 'date', 'id' => 'date-spend']) ?>
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
        <div class="stats-item__inner">
          <h4 class="stats-item__title">ТОП-5 поступлений</h4>
          <ul>
            <?foreach($income as $note):?>
            <li>
              <div class="stats-item__linkbox stats-item__linkbox--add">
                <span class="stats-item__currency"><?= $note->sum ?></span>
                <span class="stats-item__cat-id"><?= $note->categoriesAdd->cat_name ?></span>
                <span>
                  <span class="stats-item__date"
                    data-date="<?= $note->date ?>"><?= $ruDate = date("d.m.Y", strtotime($note->date)); ?></span>
                  <span>
                    <?php $url = Url::toRoute(['site/edit', 'id' => $note->id, 'edit' => 'add']); ?>
                    <a href="<?= $url; ?>" data-id="<?= $note->id ?>">
                      <i class="far fa-edit"></i>
                    </a>
                    <?php $url = Url::toRoute(['site/delete', 'id' => $note->id]); ?>
                    <a href="<?= $url; ?>" data-id="<?= $note->id ?>">
                      <i class="far fa-trash-alt"></i>
                    </a>
                  </span>
              </div>
            </li>
            <?endforeach;?>
          </ul>
        </div>
      </div>
      <div class="stats-item stats-spend col-lg-4">
        <div class="stats-item__inner">
          <h4 class="stats-item__title">ТОП-5 трат</h4>
          <ul>
            <?foreach($spend as $note):?>
            <li>
              <div class="stats-item__linkbox stats-item__linkbox--spend">
                <span class="stats-item__currency"><?= $note->sum ?></span>
                <span class="stats-item__cat-id"><?= $note->categoriesSpend->cat_name ?></span>
                <span>
                  <span class="stats-item__date"
                    data-date="<?= $note->date ?>"><?= $ruDate = date("d.m.Y", strtotime($note->date)); ?></span>
                  <span>
                    <?php $url = Url::toRoute(['site/edit', 'id' => $note->id, 'edit' => 'spend']); ?>
                    <a href="<?= $url; ?>" data-id="<?= $note->id ?>">
                      <i class="far fa-edit"></i>
                    </a>
                    <?php $url = Url::toRoute(['site/delete', 'id' => $note->id]); ?>
                    <a href="<?= $url; ?>" data-id="<?= $note->id ?>">
                      <i class="far fa-trash-alt"></i>
                    </a>
                  </span>
              </div>
            </li>
            <?endforeach;?>
          </ul>
        </div>
      </div>
      <div class="stats-item stats-all col-lg-4">
        <div class="stats-item__inner">
          <h4 class="stats-item__title">История операций</h4>
          <ul class="stats-item__history-list">
            <?foreach($income as $note):?>
            <li>
              <div class="stats-item__linkbox">
                <span class="stats-item__currency"><?= $note->sum ?></span>
                <span class="stats-item__cat-id"><?= $note->categoriesAdd->cat_name ?></span>
                <span>
                  <span class="stats-item__date"
                    data-date="<?= $note->date ?>"><?= $ruDate = date("d.m.Y", strtotime($note->date)); ?></span>
                  <span>
                    <?php $url = Url::toRoute(['site/edit', 'id' => $note->id, 'edit' => 'add']); ?>
                    <a href="<?= $url; ?>" data-id="<?= $note->id ?>">
                      <i class="far fa-edit"></i>
                    </a>
                    <?php $url = Url::toRoute(['site/delete', 'id' => $note->id]); ?>
                    <a href="<?= $url; ?>" data-id="<?= $note->id ?>">
                      <i class="far fa-trash-alt"></i>
                    </a>
                  </span>
              </div>
            </li>
            <?endforeach;?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- end .stats -->

  <!-- charts -->

  <!-- <div class="charts">
    <div class="row">
      <div class="col-lg12">
        <div id="container"></div>
      </div>
    </div>
  </div> -->

  <!-- end charts -->
</div>

<!-- modal -->
<!-- <div class="modal modal-edit">
  <div class="modal__inner">
    <h3>Редактирование записи</h3>
    <a class="modal__close" href="#">
      <div class="modal__close-inner">
        <span></span>
        <span></span>
      </div>
    </a>
    <div id='edit'>
      <?php $formEdit = ActiveForm::begin(['id' => 'savecoin']); ?>
      <?= $formEdit->field($modelIncome, 'id')->textInput(['type' => 'number']) ?>
      <?= $formEdit->field($modelIncome, 'sum')->textInput(['type' => 'number']) ?>
      <?= $formEdit->field($modelIncome, 'cat_id')->textInput(['type' => 'number', 'autofocus' => true]) ?>
      <?= $formEdit->field($modelIncome, 'date')->textInput(['type' => 'date']) ?>
      <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div> -->
<!-- end modal -->