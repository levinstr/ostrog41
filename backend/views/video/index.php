<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Видео';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'url:url',
            'description',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'headerOptions' => ['class' => 'kv-align-center'],
                'options' => [
                    'width' => '30px',
                ]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
