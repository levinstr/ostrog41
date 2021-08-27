<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Helpful */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Helpfuls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="helpful-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
