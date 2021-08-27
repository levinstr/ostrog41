<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\select2\Select2;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model common\models\Routers */
/* @var $form yii\widgets\ActiveForm */

$formattedDate = !empty($model->created) ? Yii::$app->formatter->asDatetime($model->created, 'php:d.m.Y') : date('d.m.Y');
?>

<div class="routers-form clearfix">

    <?php $form = ActiveForm::begin([
        'id' => 'portfolio-form-inline',
        'type' => ActiveForm::TYPE_VERTICAL,
        'fieldConfig' => [
            'options' => ['class' => 'form-group mr-2'],
            //'autoPlaceholder' => true,
        ]
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
            <?= $form->field($model, 'created')->widget(DatePicker::classname(), [
                'language' => 'ru',
                'options' => [
                    'value' => $formattedDate,
                    'placeholder' => 'Дата создания',
                ],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd.mm.yyyy',
                    'todayHighlight' => true,
                    'todayBtn' => true,
                ]
            ]); ?>

            <?= $form->field($model, 'file')->fileInput(['value' => (!$model->isNewRecord) ? $model->photo : '', 'multiple' => false, 'accept' => 'image/*']) ?>

            <?= $form->field($model, 'status')->widget(Select2::className(), [
                'data' => [0 => 'Не опубликовано', 1 => 'Опубликовано'],
                'options' => [
                    'placeholder' => 'Статус',
                    'value' => (!$model->isNewRecord) ? $model->status : 1,
                ],
                'hideSearch' => true,
            ]) ?>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>&nbsp;
        <?= Html::resetButton('Очистить', ['class' => 'btn btn-secondary']) ?>&nbsp;
        <?= Html::a('Отменить', ['index'], ['class' => 'btn btn-light']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
