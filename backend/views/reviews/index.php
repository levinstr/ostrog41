<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reviews-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'user.name',
                'width' => '150px',
            ],
            [
                'attribute' => 'user.username',
                'width' => '150px',
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'status',
                'format' => 'boolean',
                'editableOptions' => [
                    'inputType' => \kartik\editable\Editable::INPUT_SWITCH,
                    'placement' => 'left',
                    'preHeader' => '<i class="glyphicon glyphicon-edit"></i> ',
                    'closeOnBlur'=>true,
                ],
                'hAlign' => 'center',
                'vAlign' => 'middle',
                'width' => '30px',
            ],
            [
                'attribute' => 'review',
            ],
            [
                'attribute' => 'created',
                'format' => ['date', 'php:d.m.Y'],
                'hAlign' => 'center',
                'vAlign' => 'middle',
                'width' => '150px',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'headerOptions' => ['class' => 'kv-align-center'],
                'options' => [
                    'width' => '30px',
                ]
            ],
        ],
    ]); ?>


</div>
