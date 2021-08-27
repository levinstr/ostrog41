<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Events */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'События', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="events-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
