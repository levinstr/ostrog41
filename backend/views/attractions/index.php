<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Достопримечательности';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attractions-index">

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a(Html::encode($data->title), Url::to(['update', 'id' => $data->id]));
                },
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
