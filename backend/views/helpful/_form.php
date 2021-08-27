<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model common\models\Helpful */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="helpful-form clearfix">

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

            <?= $form->field($model, 'text')->widget(CKEditor::className(),[
                'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
                    'preset' => 'custom', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                    'height' => '350px',
//                    'toolbarGroups' => [
//                        ['name' => 'mode'],
//                        ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup' ]],
//                        ['name' => 'paragraph', 'groups' => ['list', 'indent', 'blocks', 'align']],
//                        ['name' => 'links'],
//                        '/',
//                        ['name' => 'styles'],
//                        ['name' => 'colors'],
//                        ['name' => 'tools'],
//                        ['name' => 'others'],
//                        '/',
//                        ['name' => 'insert'],
//                    ],
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
    </div>
    <div class="col-xs-6 col-sm-6">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>&nbsp;
        <?= Html::resetButton('Очистить', ['class' => 'btn btn-secondary']) ?>&nbsp;
        <?= Html::a('Отменить', ['index'], ['class' => 'btn btn-light']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
