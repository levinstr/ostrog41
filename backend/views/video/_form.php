<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Video */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-form clearfix">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_VERTICAL,
    ]); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="col-xs-6 col-sm-6">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton('Очистить', ['class' => 'btn btn-secondary']) ?>&nbsp;
        <?= Html::a('Отменить', ['index'], ['class' => 'btn btn-light']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
