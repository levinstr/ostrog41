<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Attractions */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Достопримечательности', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attractions-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
