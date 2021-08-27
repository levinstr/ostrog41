<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';

?>

<?= $this->render(
    '../layouts/menu.php'
) ?>

    <section id="news-view" class="section-padding">
        <div class="container">
            <div class="section-title">
                <div class="main-title">
                    <h2>Новости</h2>
                </div>
            </div>

                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemOptions' => ['class' => 'item'],
                    'layout' => "{pager}\n{items}\n{pager}",
                    'itemView' => function ($model, $key, $index, $widget) {
                    ?>
            <div class="row">
                <div class="col-md-4 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                    <?= Html::img('/uploads/images/news/' .$model->photo) ?>
                </div>
                <div class="col-md-8 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                    <h4><?= Html::a(Html::encode($model->title), ['view', 'id' => $model->id]); ?></h4>
                    <div class="news-para"><?= \yii\helpers\StringHelper::truncateWords($model->text, 100, '...');?></div>
                    <p><?= Html::a(Html::encode('[Подробнее ...]'), ['news/view', 'id' => $model->id]); ?></p>
                </div>
            </div>
            <?php
        },
    ]) ?>
        </div>
    </section>

<?= $this->render(
    '../layouts/footer.php'
) ?>