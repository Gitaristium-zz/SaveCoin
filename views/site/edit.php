<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = 'Редактирование';
?>
<?php if (Yii::$app->session->hasFlash('success')) : ?>
<?php if (Yii::$app->session->getFlash('success')) : ?>
<p>Данные формы прошли валидацию</p>
<?php else : ?>
<p>Данные формы не прошли валидацию</p>
<?php endif; ?>
<?php endif; ?>

<div class="site-index">
  <div class="row">
    <div class="col-lg-4">
      <h1><?= Html::encode($this->title) ?></h1>
      <?php $formEdit = ActiveForm::begin(['id' => 'categories-spend']); ?>
      <?= $formEdit->field($modelEdit, 'cat_name')->textInput(['autofocus' => true]) ?>
      <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        <?php $url = Url::toRoute(['site/delete', 'id' => $modelEdit->id]); ?>
        <td><a class="btn btn-danger" href="<?= $url; ?>">Удалить</a></td>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>