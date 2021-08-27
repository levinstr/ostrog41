<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use common\widgets\Alert;

$modelLogin = $this->params['modelLogin'];
$modelSignup = $this->params['modelSignup'];

//use frontend\assets\AppAsset;

//AppAsset::register($this);

$this->registerLinkTag([
    'rel' => 'shortcut icon',
    'type' => 'image/x-icon',
    'href' => Url::to(['/favicon.ico']),
]);

//$this->registerMetaTag([
//    'name' => 'keywords',
//    'content' => 'Разработка сайтов в Петропавловске-Камчатском и на Камчатке, Cоздание сайтов в Петропавловске-Камчатском и на Камчатке, сопровождение сайтов в Петропавловске-Камчатском, поддержка сайтов в Петропавловске-Камчатском, реклама в сети Интернет',
//]);

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Центр по сохранению объектов культурного наследия и развитию туризма Усть-Камчатского района',
]);

$this->registerMetaTag([
    'name' => 'viewport',
    'content' => 'width=device-width, initial-scale=1.0',
]);

$this->registerCssFile('@web/css/owl.transitions.css');
$this->registerCssFile('@web/css/owl.theme.css');
$this->registerCssFile('@web/css/owl.carousel.css');
$this->registerCssFile('@web/css/pe-icon-7-stroke.css');
$this->registerCssFile('@web/css/font-awesome.min.css');
$this->registerCssFile('@web/css/animate.css');
$this->registerCssFile('@web/css/bootstrap.min.css');
$this->registerCssFile('@web/css/style.css');
$this->registerCssFile('@web/css/responsive.css');
$this->registerCssFile('@web/css/social.css');
$this->registerCssFile('@web/css/evo-calendar.css');
$this->registerCssFile('https://fonts.googleapis.com/css?family=Exo+2:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap&amp;subset=cyrillic');
$this->registerCssFile('https://fonts.googleapis.com/css?family=Exo+2:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap&amp;subset=latin');
$this->registerCssFile('@web/js/fancybox/jquery.fancybox.css?v=2.1.5');

$this->registerJsFile('@web/js/modernizr-2.8.3.min.js',['position' => \yii\web\View::POS_HEAD]);
//$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js');
$this->registerJsFile('@web/js/jquery.min.js');
$this->registerJsFile('@web/js/jquery.animateNumber.min.js');
$this->registerJsFile('@web/js/jquery.appear.js');
$this->registerJsFile('@web/js/wow.min.js');
$this->registerJsFile('@web/js/owl.carousel.min.js');
$this->registerJsFile('@web/js/jquery.mixitup.min.js');
$this->registerJsFile('@web/js/bootstrap.min.js');
$this->registerJsFile('@web/js/gmap.js');
$this->registerJsFile('@web/js/plugins.js');
$this->registerJsFile('@web/js/jquery.cookie.min.js');
$this->registerJsFile('@web/js/google-translate.js');
$this->registerJsFile('//translate.google.com/translate_a/element.js?cb=TranslateInit');
$this->registerJsFile('@web/js/main.js');
$this->registerJsFile('@web/js/fancybox/jquery.fancybox.pack.js?v=2.1.5');
$this->registerJsFile('@web/js/evo-calendar.js');

?>
<?php $this->beginPage() ?>
<!doctype html>
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="">
<!-- =========================================
head
========================================== -->
<head>
    <!-- =========================================
    Basic
    ========================================== -->
    <meta charset="<?= Yii::$app->charset ?>">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>
<div class="social hidden-sm hidden-xs">
    <ul>
        <li><a><i class="icon-facebook-squared"></i></a></li>
        <li><a><i class="icon-vkontakte"></i></a></li>
        <li><a><i class="icon-instagram"></i></a></li>
        <li><a><i class="icon-odnoklassniki-square"></i></a></li>
        <li><a href="https://www.youtube.com/channel/UCTM-vqJuhWj9DS4bXWIFPFw" target="_blank"><i class="icon-youtube-squared"></i></a></li>
    </ul>
</div>
<!-- =========================================
HEADER-AREA
========================================== -->
<header id="home" class="header-area">
    <div class="container header">
        <div class="row">
            <div class="col-md-2 col-sm-2">
                <div id="info">
                    <span><i class="fa fa-phone"></i></span>
                    <span>+7 (41534) 2-08-68</span>
                </div>
            </div>
            <div class="col-md-5 col-sm-4 text-center">
            <?php
                if (Yii::$app->user->isGuest) {
            ?>
            <?php // АВТОРИЗАЦИЯ
                Modal::begin([
                    'header' => '<h2>Авторизация</h2>',
                    'toggleButton' => [
                        'label' => 'Вход',
                        'class' => 'btn btn-link top-btn',
                        'tag' => 'button',
                    ],
                    'options' => [
                        'id' => 'modal-login',
                    ],
                    'bodyOptions' => [
                         'class' => 'modal-login text-left',
                    ],
//                    'footer' => '',
                ]);
            ?>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
//                'layout'=>'horizontal',
                'method' => 'post',
                'action' => ['site/login'],
            ]); ?>

                <?= $form->field($modelLogin, 'username', ['enableLabel' => false])->textInput(['placeholder' => 'Логин', 'autofocus' => true]) ?>

                <?= $form->field($modelLogin, 'password', ['enableLabel' => false])->passwordInput(['placeholder' => 'Пароль']) ?>

                <?= Html::submitButton('Войти', ['class' => 'btn red-btn', 'name' => 'login-button']) ?>


            <?php ActiveForm::end(); ?>
            <?php
                Modal::end();
            ?>

            <?php // РЕГИСТРАЦИЯ
                Modal::begin([
                    'header' => '<h2>Регистрация</h2>',
                    'toggleButton' => [
                        'label' => 'Регистрация',
                        'class' => 'btn btn-link top-btn',
                        'tag' => 'button',
                    ],
                    'options' => [
                        'id' => 'modal-signup',
                    ],
                    'bodyOptions' => [
                        'class' => 'modal-signup text-left',
                    ],
//                    'footer' => 'Низ окна',
                ]);
            ?>
                    <?php $form = ActiveForm::begin([
                        'id' => 'form-signup',
//                'layout'=>'horizontal',
                        'method' => 'post',
                        'action' => ['site/signup'],
                        ]); ?>

                    <?= $form->field($modelSignup, 'username', ['enableLabel' => false])->textInput(['placeholder' => 'Логин', 'autofocus' => true]) ?>

                    <?= $form->field($modelSignup, 'name', ['enableLabel' => false])->textInput(['placeholder' => 'Имя']) ?>

                    <?= $form->field($modelSignup, 'secondname', ['enableLabel' => false])->textInput(['placeholder' => 'Фамилия']) ?>

                    <?= $form->field($modelSignup, 'phone', ['enableLabel' => false])->widget(\yii\widgets\MaskedInput::class, [
                        'mask' => '+7 (999) 999-9999',
                        'options' => [
                                'placeholder' => 'Телефон'
                        ],
                        'clientOptions' => [
                            'clearIncomplete' => true
                        ]
                    ]) ?>

                    <?= $form->field($modelSignup, 'email', ['enableLabel' => false])->widget(\yii\widgets\MaskedInput::class, [
                        'options' => [
                            'placeholder' => 'E-mail'
                        ],
                        'clientOptions' => [
                            'alias' =>  'email',
                            'clearIncomplete' => true
                        ]
                    ]) ?>

                    <?= $form->field($modelSignup, 'password', ['enableLabel' => false])->passwordInput(['placeholder' => 'Пароль']) ?>

                    <?= Html::submitButton('Зарегистрировать', ['class' => 'btn red-btn', 'name' => 'signup-button']) ?>
                    <div class="auth-form-link"><a class="auth-link" href="#" data-toggle="modal" data-target="#modal-login" onclick="$('#modal-signup').modal('hide')">Уже зарегистрированы?</a></div>
                    <?php ActiveForm::end(); ?>
            <?php
                Modal::end();
            ?>
            <?php } else { ?>
                <?php
                    echo Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Выйти (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout top-btn']
                        )
                        . Html::endForm();
                ?>
            <?php } ?>
            </div>
            <div class="col-md-5 col-sm-6">
                <!-- social-icons -->
                <div class="lang-icons">
                    <ul>
                        <li><img src="<?= Url::to('@web/images/') ?>lang/lang__ru.png" alt="ru" data-google-lang="ru" class="language__img"></li>
                        <li><img src="<?= Url::to('@web/images/') ?>lang/lang__en.png" alt="en" data-google-lang="en" class="language__img"></li>
                        <li><img src="<?= Url::to('@web/images/') ?>lang/lang__ja.png" alt="ja" data-google-lang="ja" class="language__img"></li>
                        <li><img src="<?= Url::to('@web/images/') ?>lang/lang__zh.png" alt="zh" data-google-lang="zh-CN" class="language__img"></li>
                        <li><img src="<?= Url::to('@web/images/') ?>lang/lang__ko.png" alt="ko" data-google-lang="ko" class="language__img"></li>
                    </ul>
                </div><!-- /social-icons -->
            </div>
        </div>
    </div>
</header>
        <?= Alert::widget() ?>
        <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
