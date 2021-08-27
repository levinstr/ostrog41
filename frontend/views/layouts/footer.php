<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$modelContact = $this->params['modelContact'];
?>
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
                        <li><a href="/">Главная</a></li>
                        <li><a href="/#about-us">Об организации</a></li>
                        <li><a href="/#about-area">О районе</a></li>
                        <li><a href="/#calendar">Календарь</a></li>
                    </ul>
                    <ul class="categories-right">
                        <li><a href="/#latest-news">Новости</a></li>
                        <li><a href="/#helpful">Полезная информация</a></li>
                        <li><a href="/#contacts">Контакты</a></li>
                        <li><a href="/#reviews">Отзывы</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="right-side">
                    <?php // АВТОРИЗАЦИЯ
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