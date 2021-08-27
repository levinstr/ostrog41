<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Events */

$js = <<< JS
    $('.fancybox').fancybox();
JS;

$this->registerJs( $js, $position = yii\web\View::POS_READY, $key = null );

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
                    <?php
                    if (!empty($model->images)) {
                        foreach (explode('|', $model->images) as $image) {
                            echo '<div class="col-md-12 gallery-image"><a class="fancybox" href="'.Url::to('@web/uploads/images/').$image.'" data-fancybox-group="gallery"><img src="'.Url::to('@web/uploads/images/thumb-').$image.'" alt="" /></a></div>';
                        }
                    }
                    ?>

                </div>
                <div class="col-md-9 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                    <?= $model->introtext ?>
                    <?= $model->fulltext ?>
                </div>
            </div>
        </div>
    </section>
<?= $this->render(
    '../layouts/footer.php'
) ?>