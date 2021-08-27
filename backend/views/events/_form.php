<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model common\models\Events */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="events-form clearfix">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_VERTICAL,
    ]); ?>
    <div class="row">
        <div class="col-xs-9 col-sm-9">
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
        </div>
        <div class="col-xs-3 col-sm-3">
            <?= $form->field($model, 'start')->widget(DatePicker::classname(), [
                'language' => 'ru',
                'options' => [
                    'placeholder' => 'Дата начала',
                ],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd.mm.yyyy',
                    'todayHighlight' => true,
                    'todayBtn' => true,
                ]
            ]); ?>
            <?= $form->field($model, 'end')->widget(DatePicker::classname(), [
                'language' => 'ru',
                'options' => [
                    'placeholder' => 'Дата окончания',
                ],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd.mm.yyyy',
                    'todayHighlight' => true,
                    'todayBtn' => true,
                ]
            ]); ?>

            <?= $form->field($model, 'files[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
        </div>

    <?= $form->field($model, 'ordering')->HiddenInput(['value' => 1])->label(false) ?>

    <div class="col-xs-6 col-sm-6">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton('Очистить', ['class' => 'btn btn-secondary']) ?>&nbsp;
        <?= Html::a('Отменить', ['index'], ['class' => 'btn btn-light']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
