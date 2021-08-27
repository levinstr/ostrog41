<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Полезная информация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="helpful-index">

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
        ],
    ]); ?>


</div>
