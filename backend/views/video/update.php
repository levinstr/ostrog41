<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Video */

$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => 'Видео', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->description, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="video-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
