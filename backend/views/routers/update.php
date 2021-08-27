<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Routers */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Маршруты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="routers-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
