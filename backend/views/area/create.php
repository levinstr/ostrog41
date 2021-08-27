<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Area */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'О районе', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
