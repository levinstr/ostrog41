<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Routers */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Маршруты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="routers-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
