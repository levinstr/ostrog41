<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->title;
?>

<?= $this->render(
    '../layouts/menu.php'
) ?>

<section id="area-view" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">

                <h2 class="area-detail-title"><?= Html::encode($this->title) ?></h2>
                <?= Html::img('/uploads/images/news/' .$model->photo) ?>
            </div>
            <div class="col-md-9 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                <?= $model->text ?>
            </div>
        </div>
    </div>
</section>

<?= $this->render(
    '../layouts/footer.php'
) ?>
