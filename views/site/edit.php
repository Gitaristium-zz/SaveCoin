<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = 'SaveCoin';
?>


<?php if (Yii::$app->session->hasFlash('success')) : ?>
<?php Yii::$app->session->getFlash('success'); /* очищаем данные сессии */ ?>
<p>Данные формы не прошли валидацию</p>
<?php endif; ?>

<div class="page-feedback">
  <h1><?= Html::encode($this->title) ?></h1>
  <?php $formEdit = ActiveForm::begin(['id' => 'categories-spend']); ?>
  <?= $formEdit->field($modelEdit, 'id')->textInput(['type' => 'number']) ?>
  <?= $formEdit->field($modelEdit, 'cat_name')->textInput(['autofocus' => true]) ?>
  <div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    <?php $url = Url::toRoute(['site/delete', 'id' => $modelEdit->id]); ?>
    <td><a class="btn btn-danger" href="<?= $url; ?>">Удалить</a></td>
  </div>
  <?php ActiveForm::end(); ?>

</div>