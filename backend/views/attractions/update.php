<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Attractions */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Достопримечательности', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="attractions-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
