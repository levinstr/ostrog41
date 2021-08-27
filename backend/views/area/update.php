<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Area */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'О районе', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="area-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
