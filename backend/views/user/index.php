<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'kartik\grid\BooleanColumn',
                'attribute' => 'status',
                'value' => function ($model) {
                $user = \common\models\User::findOne(['id' => $model->id]);
                return ($user->status == 10) ? 1 : 0;
                },
                'vAlign' => 'middle',
                'options' => [
                    'width' => '30px',
                ]
            ],
            [
                'attribute' => 'username',
                'headerOptions' => ['class' => 'kv-align-center'],
                'options' => [
                    'width' => '100px',
                ]
            ],
            [
                'class' => '\kartik\grid\EditableColumn',
                'header' => 'Роль',
                'value' => function($model) {
                    return array_values(Yii::$app->authManager->getRolesByUser($model->id))[0]->description;
                },
                'editableOptions' => [
                    'name' => 'role',
                    'header' => 'Роль',
                    'preHeader' => '<i class="glyphicon glyphicon-edit"></i> ',
                    'asPopover' => true,
                    'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                    'data' => [
                        'admin' => 'Администратор',
                        'registered' => 'Зарегистрированный'
                    ],
                    'options' => [
                        'class'=>'form-control',
                        'prompt'=>'Выберите роль...'
                    ],
                ],
                'headerOptions' => [
                        'width' => '180'
                ],
            ],
            [
                'attribute' => 'email',
                'headerOptions' => ['class' => 'kv-align-center'],
                'options' => [
                    'width' => '180px',
                ]
            ],
            'name',
            'secondname',
            [
                'attribute' => 'phone',
                'headerOptions' => ['class' => 'kv-align-center'],
                'options' => [
                    'width' => '150px',
                ]
            ],
            [
                'attribute' => 'created_at',
                'label' => 'Дата',
                'format' => ['date', 'php:d.m.Y'],
                'options' => [
                    'width' => '80px',
                ],
                'headerOptions' => ['class' => 'kv-align-center'],
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

    <?php Pjax::end(); ?>

</div>
