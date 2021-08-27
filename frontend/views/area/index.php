<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'О районе';
?>

<?= $this->render(
    '../layouts/menu.php'
) ?>

        <section id="area" class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                            <div class="section-title">
                                <div class="main-title">
                                    <h2><?= Html::encode($this->title) ?></h2>
                                </div>
                            </div>
                        </div>
                        <?= ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemOptions' => ['class' => 'item'],
                            'summary'=>'',
                            'itemView' => function ($model, $key, $index, $widget) {
                        ?>

                                <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                                    <div class="area-<?= $model->id ?>">
                                        <div class="area-inner dark-inner">
                                            <div class="area-title">
                                                <h2 class="text-center"><?= $model->title ?></h2>
                                            </div>
                                            <div class="area-contact">
                                                <p><?= $model->introtext ?></p>
                                            </div>
                                            <div class="area-readmore text-center">
                                                <?= Html::a('Подробнее', ['view', 'id' => $model->id]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }, ]) ?>

                    </div>
                </div>
        </section>

<?= $this->render(
    '../layouts/footer.php'
) ?>