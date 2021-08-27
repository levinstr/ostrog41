<?php

/* @var $this yii\web\View */

use yii\base\BaseObject;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use lesha724\youtubewidget\Youtube;
use yii\web\JsExpression;
use yii\helpers\Json;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$modelContact = $this->params['modelContact'];

$this->title = 'Центр по сохранению объектов культурного наследия и развитию туризма Усть-Камчатского района';


foreach ($events as $event) {
    $e['id'] = $event->id;
    $e['name'] = $event->title;
    if(!empty($event->end)) {
        $e['date'] = [date('m/d/Y', $event->start), date('m/d/Y', $event->end)];
    }else{
        $e['date'] = date('m/d/Y', $event->start);
    }
    $e['description'] = $event->introtext;
    $e['type'] = 'event';
    //$e['color'] = '#'.str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
    $myEvent[] = $e;
}

$calendar = "
$('#calendar').evoCalendar({
  language: 'ru',
  calendarEvents: ".Json::encode($myEvent).",
  format: 'mm/dd/yyyy',
  titleFormat: 'MM',
  eventHeaderFormat: 'MM d, yyyy',
  todayHighlight: true,
  sidebarToggler: true,
  sidebarDisplayDefault: true,
  eventListToggler: true,
  eventDisplayDefault: true,
  canAddEvent: false,
  firstDayOfWeek: 1 // Monday
});
$('#calendar').on('selectEvent', function(event, activeEvent) {
     console.log($(this).attr('class'))// code here...
});
";
$this->registerJs( $calendar, $position = yii\web\View::POS_READY, $key = null );
?>
<!-- =========================================
Menu Area
========================================== -->
<section id="mainmenu" class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="header-logo">
                    <a href="#home-section">
                        <?= Html::img('@web/logo_w.png', ['alt' => '']) ?>
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="navbar-collaps">
                    <!-- nav -->
                    <nav class="mainMenu">
                        <div class="menuButton hidden-lg hidden-md">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <ul>
                            <li class="scroll"><a href="#home">Главная</a></li>
                            <li class="scroll"><a href="#about-us">Об организации</a></li>
                            <li class="scroll"><a href="#about-area">О районе</a></li>
                            <li class="scroll"><a href="#events">Календарь</a></li>
                            <li class="scroll"><a href="#latest-news">Новости</a></li>
                            <li class="scroll"><a href="#helpful">Полезная информация</a></li>
                            <li class="scroll"><a href="#contacts">Контакты</a></li>
                            <li class="scroll"><a href="#reviews">Отзывы</a></li>
                        </ul>
                    </nav>
                    <!-- /nav -->
                    <?php /*
                    <!-- Menue-Search-bar -->
                    <div id="sb-search" class="sb-search " >
                            <form>
                                    <input class="sb-search-input " onkeyup="buttonUp();" placeholder=	"Enter your search term..." onblur="monkey();" type="search" value="" name="search" id="search">
                                    <input class="sb-search-submit" type="submit"  value="">
                                    <span class="sb-icon-search"><i class="fa fa-search"></i></span>
                                </form>
                    </div>
                    <!-- /Menue-search-bar -->
                    */ ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =========================================
Slider Area
========================================== -->
<section class="slider-area">
    <div class="dark-inner-slider section-padding">
        <div class="container">
            <div class="row">
                <h3 class="col-md-12 revive1 text-center wow fadeInDown" data-wow-duration="700ms" data-wow-delay="200ms">Добро пожаловать в</h3>
                <div class="col-md-12 revive2 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms"><?= Html::img('@web/images/uk-logo.png', ['class' => 'img-responsive center-block']) ?></div>
                <div class="col-md-12 revive3 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms"><?= Html::img('@web/images/uk-logo2.png', ['class' => 'img-responsive center-block']) ?></div>
            </div>
        </div>
    </div>
</section>
<!-- =========================================
About US Section
========================================== -->
<section id="about-us" class="feature-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                <div class="section-title">
                    <div class="main-title">
                        <h2>Об организации</h2>
                    </div>
                    <div class="desc-title">
                        <h4>Центр по сохранению объектов культурного наследия и развитию туризма Усть-Камчатского района</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6 align-center wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="200ms">
                <div class="circular"></div>
            </div>
            <div class="col-md-6 wow fadeInRight" data-wow-duration="1.5" data-wow-delay="200ms">
                <div class="features-list">
                    <div class="more-about">
                        <div class="about-icon">
                            <?= Html::a('<i class="pe-7s-bottom-arrow"></i>', '@web/uploads/docs/ustav.pdf', ['target' => '_blank']) ?>
                        </div>
                        <div class="about-content">
                            <h4>УСТАВ</h4>
                            <p>МУНИЦИПАЛЬНОГО БЮДЖЕТНОГО УЧРЕЖДЕНИЯ «ЦЕНТР ПО СОХРАНЕНИЮ ОБЪЕКТОВ КУЛЬТУРНОГО НАСЛЕДИЯ И РАЗВИТИЮ ТУРИЗМА УСТЬ-КАМЧАТСКОГО МУНИЦИПАЛЬНОГО РАЙОНА»</p>
                        </div>
                    </div>
                    <div class="more-about">
                        <div class="about-icon">
                            <?= Html::a('<i class="pe-7s-bottom-arrow"></i>', '@web/uploads/docs/egrul-22.04.21.pdf', ['target' => '_blank']) ?>
                        </div>
                        <div class="about-content">
                            <h4>ВЫПИСКА</h4>
                            <p>из Единого государственного реестра юридических лиц</p>
                        </div>
                    </div>
                    <div class="more-about">
                        <div class="about-icon">
                            <i class="pe-7s-home"></i>
                        </div>
                        <div class="about-content">
                            <h4>КОНТАКТЫ</h4>
                            <ul>
                                <li>Туристский информационный центр</li>
                                <li><i class="fa fa-phone"></i> +7 (41534) 2-08-68</li>
                                <li>Директор - <strong>Корягин Сергей Витальевич</strong></li>
                                <li><i class="fa fa-phone"></i> +7 (914) 022-98-74</li>
                                <li>Зам. Директора - <strong>Баранник Марина Валерьевна</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =========================================
About Area Section
========================================== -->
<section id="about-area" class="graphic-content-area">
    <div class="graphic-image">
        <div class="paralax-image"></div>
        <div class="graphover"></div>
    </div>
    <div class="container featur">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="graphic-content">
                    <h2 class="wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms"><span><?= $area->title; ?></span></h2>
                    <p class="wow fadeInDown" data-wow-duration="700ms" data-wow-delay="200ms"><?= $area->introtext; ?></p>
                    <div class="col-md-4 col-md-offset-2 readmore-btn wow pulse"><?= Html::a('Подробнее', Url::to(['/area']), ['class' => '']) ?></div>
                    <div class="col-md-4 readmore-btn wow pulse"><?= Html::a('Достопримечательности', Url::to(['/attractions']), ['class' => '']) ?></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =========================================
Youtube Section
========================================== -->
<section id="video-area" class="video-content-area section-padding latest-project-area">
    <div class="container">
        <div class="row">
            <?= ListView::widget([
            'dataProvider' => $video,
            'itemOptions' => ['class' => 'item'],
            'summary'=>'',
            'itemView' => function ($v, $key, $index, $widget) {
            ?>
                <div class="col-md-6">
                    <?= Youtube::widget([
                        'video'=>$v->url,
                        'iframeOptions'=>[
                            'class'=>'youtube-video'
                        ],
                        'divOptions'=>[
                            'class'=>'youtube-video-div'
                        ],
                        'height'=>290,
                        'width'=>'100%',
                        'playerVars'=>[
                            'controls' => 1,
                            'autoplay' => 0,
                            'showinfo' => 0,
                            'start'   => 0,
                            'end' => 0,
                            'loop ' => 0,
                            'modestbranding'=>  1,
                            'fs'=>0,
                            'rel'=>1,
                            'disablekb'=>0
                        ],
                        'events'=>[
                            'onReady'=> 'function (event){
                        /*The API will call this function when the video player is ready*/
                        event.target.playVideo();
            }',
                        ]
                    ]); ?>
                </div>
            <?php }, ]) ?>

        </div>
    </div>
</section>
<!-- =========================================
Tour Section
========================================== -->
<section id="tour" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                <div class="section-title">
                    <div class="main-title">
                        <h2>Туристические маршруты</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInUp goldring">
                <?= Html::a(Html::img('@web/images/goldring_big_logo.png', ['class' => 'img-responsive center-block']), ['routers/view', 'id' => 5]); ?>
            </div>
            <?= ListView::widget([
                'dataProvider' => $routers,
                'itemOptions' => ['class' => 'item'],
                'summary'=>'',
                'itemView' => function ($r, $key, $index, $widget) {
                    ?>
                    <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                        <div class="tour-b" style="background-image: url(<?= Url::to('@web/uploads/images/routers/' .$r->photo) ?>)">
                            <div class="tour-inner dark-inner">
                                <div class="tour-title">
                                    <h2 class="text-center"><?= $r->title ?></h2>
                                </div>
                                <div class="tour-contact">
                                    <p><?= $r->introtext ?></p>
                                </div>
                                <div class="tour-readmore text-center">
                                    <?= Html::a(Html::encode('Подробнее'), ['routers/view', 'id' => $r->id]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }, ]) ?>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<!-- =========================================
Calendar Section
========================================== -->
<section id="events" class="servicer-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                <div class="section-title">
                    <div class="main-title">
                        <h2>Календарь событий</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</section>
<!-- =========================================
Latest NEWS Section
========================================== -->
<section id="latest-news">
    <div class="section-padding">
        <div class="container latest-news-area">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                    <div class="section-title">
                        <div class="main-title">
                            <h2>Последние новости</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?= ListView::widget([
                    'dataProvider' => $news,
                    'itemOptions' => ['class' => 'item'],
                    'summary'=>'',
                    'itemView' => function ($n, $key, $index, $widget) {
                ?>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInLeft" data-wow-duration="1.6s" data-wow-delay="100ms">
                    <div class="news-box">
                        <div class="news-text">
                            <ul class="news-info">
                                <li><?= Yii::$app->formatter->asDate($n->created); ?></li>
                            </ul>
                            <h4><?= $n->title ?></h4>
                            <div class="news-para"><?= \yii\helpers\StringHelper::truncateWords($n->text, 15, '...');?></div>
                            <p><?= Html::a(Html::encode('[Подробнее ...]'), ['news/view', 'id' => $n->id]); ?></p>
                        </div>
                        <figure class="news-image">
                            <?= Html::img('@web/uploads/images/news/' .$n->photo) ?>
                        </figure>
                    </div>
                </div>
                <?php }, ]) ?>
                <div class="col-md-4 col-md-offset-4 readmore-btn wow pulse"><?= Html::a('Все новости', Url::to(['/news']), ['class' => '']) ?></div>
            </div>
        </div>
    </div>
</section>
<!-- =========================================
Helpful Section
========================================== -->
<section id="helpful" class="feature-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                <div class="section-title">
                    <div class="main-title">
                        <h2>Полезная информация</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="helpful-row" class="helpful-row">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 text-center wow fadeInLeft" data-wow-duration="700ms" data-wow-delay="200ms">
                    <?= Html::a(Html::img('images/helpful-1.png'), ['helpful/view', 'id' => 1]); ?>
                    <h4>Базы отдыха</h4>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 text-center wow fadeInLeft" data-wow-duration="700ms" data-wow-delay="200ms">
                    <?= Html::a(Html::img('images/helpful-2.png'), ['helpful/view', 'id' => 2]); ?>
                    <h4>Кафе, рестораны</h4>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 text-center wow fadeInRight" data-wow-duration="700ms" data-wow-delay="200ms">
                    <?= Html::a(Html::img('images/helpful-3.png'), ['helpful/view', 'id' => 3]); ?>
                    <h4>Гостиницы</h4>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 text-center wow fadeInRight" data-wow-duration="700ms" data-wow-delay="200ms">
                    <?= Html::a(Html::img('images/helpful-4.png'), ['helpful/view', 'id' => 4]); ?>
                    <h4>Транспорт</h4>
                </div>
            </div>
        </div>
</section>
<section id="helpful-danger">
    <div class="dark-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                    <div class="section-title">
                        <div class="main-title">
                            <h3>Будь осторожен!</h3>
                        </div>
                        <div class="desc-title">
                            <h4>Правила безопасности</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 envelope wow fadeInLeft" data-wow-duration="700ms" data-wow-delay="200ms">
                    <div class="feature-box-style2">
                        <span class="bd-left"></span>
                        <span class="bd-right"></span>
                        <span class="bd-btm-left"></span>
                        <span class="bd-btm-right"></span>
                        <div class="feature-box-icon">
                            <i class="fa fa-exclamation"></i>
                        </div>
                        <div class="feature-box-containt">
                            <h5><?= Html::a(Html::encode('Окружающая среда медведи'), ['helpful/view', 'id' => 5]); ?></h5>
                            <p>Медведь весьма осторожный зверь и большей частью избегает встреч с человеком, но один из немногих зверей, которые могут быть опасны для человека...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 envelope wow fadeInRight" data-wow-duration="700ms" data-wow-delay="200ms">
                    <div class="feature-box-style2">
                        <span class="bd-left"></span>
                        <span class="bd-right"></span>
                        <span class="bd-btm-left"></span>
                        <span class="bd-btm-right"></span>
                        <div class="feature-box-icon">
                            <i class="fa fa-exclamation"></i>
                        </div>
                        <div class="feature-box-containt">
                            <h5><?= Html::a(Html::encode('Окружающая среда природа'), ['helpful/view', 'id' => 6]); ?></h5>
                            <p>Если вы планируете провести время на природе, следует подготовиться к такому времяпрепровождению заблаговременно...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =========================================
Contacts Section
========================================== -->
<section id="contacts" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                <div class="section-title">
                    <div class="main-title">
                        <h2>Контакты</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-12 wow fadeInDown" data-wow-duration="700ms" data-wow-delay="200ms"">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A86f4a42c42d4b21f03647968326e9fe8e87c0280cf03ce94c0109f5451292835&amp;width=100%25&amp;height=380&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
        </div>
    </div>
</section>
<!-- =========================================
Reviews Section
========================================== -->
<section id="reviews" class="latest-project-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="client-area">
                    <div class="client-title wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                        <h2>Отзывы</h2>
                    </div>
                    <div id="owl-demo" class="owl-carousel owl-theme wow fadeInUp" data-wow-duration="700ms" data-wow-delay="200ms">
                        <?php
                            foreach ($reviews as $r) {
                        ?>
                            <div class="item">
                                <h3><?= $r->user->name ?></h3>
                                <p><i class="fa fa-quote-left"></i>  <?= $r->review ?>  <i class="fa fa-quote-right"></i></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php
                if (Yii::$app->user->isGuest) {
                ?>
                <div class="col-md-2 col-md-offset-5 text-center wow fadeInUp">
                    <a class="send-review-btn" href="#" data-toggle="modal" data-target="#modal-signup">Оставить отзыв</a>
                </div>
                <?php }else{
                    $review = new \common\models\Reviews();
                    ?>
                <div class="col-md-2 col-md-offset-5 text-center wow fadeInUp">
                    <?php
                    Modal::begin([
                        'header' => '<h2>Отзыв</h2>',
                        'toggleButton' => [
                            'label' => 'Оставить отзыв',
                            'class' => 'send-review-btn center-block',
                            'tag' => 'button',
                        ],
                        'options' => [
                            'id' => 'modal-review',
                        ],
                        'bodyOptions' => [
                            'class' => 'modal-review text-left',
                        ],
//                    'footer' => '',
                    ]);
                    ?>
                    <?php $form = ActiveForm::begin([
                        'action' => ['site/review'],
                    ]); ?>

                    <?= $form->field($review, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>

                    <?= $form->field($review, 'status')->hiddenInput(['value' => 0])->label(false) ?>

                    <?= $form->field($review, 'created')->hiddenInput(['value' => date('d.m.Y')])->label(false) ?>

                    <?= $form->field($review, 'review', ['enableLabel' => false])->textarea(['placeholder' => 'Отзыв', 'rows' => 3]) ?>

                    <?= Html::submitButton('Отправить', ['class' => 'btn red-btn', 'name' => 'review-button']) ?>


                    <?php ActiveForm::end(); ?>
                    <?php
                    Modal::end();
                    ?>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =========================================
Footer Top Section
========================================== -->
<section class="footer-top-area">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-4">
                <div class="left-side">
                    <h3>Организация</h3>
                    <p><strong>МБУ «Центр по сохранению объектов культурного наследия и развитию туризма Усть-Камчатского района»</strong></p>
                    <p><span class="yellow-color">Адрес:</span> 684415, Камчатский край, Усть-Камчатский район, поселок Усть-Камчатск, улица 60 лет Октября, дом 24</p>
                    <p><span class="yellow-color">Директор:</span> Корягин Сергей Витальевич, +7(914)022 98-74</p>
                    <p><span class="yellow-color">Туристский информационный центр:</span> Администратор, +7(41534) 2-08-68</p>
                    <p><span class="yellow-color">E-mail:</span> ustkamtic@yandex.ru</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="quick-link">
                    <h4>Меню</h4>
                    <ul class="categories">
                        <li><a href="#home">Главная</a></li>
                        <li><a href="#about-us">Об организации</a></li>
                        <li><a href="#about-area">О районе</a></li>
                        <li><a href="#calendar">Календарь</a></li>
                    </ul>
                    <ul class="categories-right">
                        <li><a href="#latest-news">Новости</a></li>
                        <li><a href="#helpful">Полезная информация</a></li>
                        <li><a href="#contacts">Контакты</a></li>
                        <li><a href="#reviews">Отзывы</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="right-side">
                    <?php
                    Modal::begin([
                        'header' => '<h2>Обратная связь</h2>',
                        'toggleButton' => [
                            'label' => 'Связаться с нами',
                            'class' => 'red-btn contact-btn center-block',
                            'tag' => 'button',
                        ],
                        'options' => [
                            'id' => 'modal-contact',
                        ],
                        'bodyOptions' => [
                            'class' => 'modal-contact text-left',
                        ],
//                    'footer' => '',
                    ]);
                    ?>
                    <?php $form = ActiveForm::begin([
                            'id' => 'contact-form',
                            'action' => ['site/contact'],
                    ]); ?>

                    <?= $form->field($modelContact, 'name', ['enableLabel' => false])->textInput(['placeholder' => 'Ваше имя', 'autofocus' => true]) ?>

                    <?= $form->field($modelContact, 'email', ['enableLabel' => false])->textInput(['placeholder' => 'E-mail']) ?>

                    <?= $form->field($modelContact, 'subject', ['enableLabel' => false])->textInput(['placeholder' => 'Тема сообщения']) ?>

                    <?= $form->field($modelContact, 'body', ['enableLabel' => false])->textarea(['placeholder' => 'Сообщение', 'rows' => 6]) ?>

                    <?= $form->field($modelContact, 'verifyCode', ['enableLabel' => false])->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>', 'options' => ['placeholder' => 'Введите проверочный код'],
                    ]) ?>


                        <?= Html::submitButton('Отправить', ['class' => 'btn red-btn', 'name' => 'contact-button']) ?>


                    <?php ActiveForm::end(); ?>


                    <?php
                    Modal::end();
                    ?>

                    <div class="social-icons footer-social">
                        <ul>
                            <li><a><i class="icon-facebook-squared"></i></a></li>
                            <li><a><i class="icon-vkontakte"></i></a></li>
                            <li><a><i class="icon-instagram"></i></a></li>
                            <li><a><i class="icon-odnoklassniki-square"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCTM-vqJuhWj9DS4bXWIFPFw" target="_blank"><i class="icon-youtube-squared"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =========================================
Footer Section
========================================== -->
<footer class="footer-area">
    <div class="scroll-top-icon wow zoomIn" data-wow-duration="700ms" data-wow-delay="200ms">
        <i class="fa fa-chevron-up"></i>
    </div>
    <div class="container footer">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="copyright-boot">
                    <p>&copy Все права защищены <?= date('Y') ?></p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="copyright-boot text-right">
                    <p>Разработка сайта <a href="http://levinst.ru" title="Levin Studio - разработка сайтов на Камчатке">Levin Studio</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>