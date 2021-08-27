<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model common\models\Area */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="area-form clearfix">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_VERTICAL,
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'introtext')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'preset' => 'custom', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'height' => '350px',
            'toolbar' => [
                [
                    'Source', 'RemoveFormat', 'Maximize',
                    '-',
                    'Bold', 'Italic', 'Underline', 'TextColor', 'BGColor',
                    '-',
                    'NumberedList', 'BulletedList',
                    '-',
                    'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock',
                    '-',
                    'Outdent', 'Indent',
                    '-',
                    'Blockquote', 'CreateDiv',
                    '-',
                    'PageBreak', 'Anchor',
                    '-',
                    'ShowBlocks',
                    'Styles', 'Font', 'FontSize', 'Format',
                    '-',
                    'Image', 'Table', 'Link', 'Unlink',
                ]
            ]
        ]),
    ]); ?>

    <?= $form->field($model, 'fulltext')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'preset' => 'custom', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'height' => '350px',
            'toolbar' => [
                [
                    'Source', 'RemoveFormat', 'Maximize',
                    '-',
                    'Bold', 'Italic', 'Underline', 'TextColor', 'BGColor',
                    '-',
                    'NumberedList', 'BulletedList',
                    '-',
                    'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock',
                    '-',
                    'Outdent', 'Indent',
                    '-',
                    'Blockquote', 'CreateDiv',
                    '-',
                    'PageBreak', 'Anchor',
                    '-',
                    'ShowBlocks',
                    'Styles', 'Font', 'FontSize', 'Format',
                    '-',
                    'Image', 'Table', 'Link', 'Unlink',
                ]
            ]
        ]),
    ]); ?>

    <?= $form->field($model, 'files[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'ordering')->hiddenInput(['value'=>'1', 'style'=>'width:50px'])->label(false) ?>

    <div class="col-xs-6 col-sm-6">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>&nbsp;
        <?= Html::resetButton('Очистить', ['class' => 'btn btn-secondary']) ?>&nbsp;
        <?= Html::a('Отменить', ['index'], ['class' => 'btn btn-light']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
