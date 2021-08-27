<?php
    use yii\helpers\Html;
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
                            <li class="scroll"><a href="/">Главная</a></li>
                            <li class="scroll"><a href="/#about-us">Об организации</a></li>
                            <li class="scroll"><a href="/#about-area">О районе</a></li>
                            <li class="scroll"><a href="/#events">Календарь</a></li>
                            <li class="scroll"><a href="/#latest-news">Новости</a></li>
                            <li class="scroll"><a href="/#helpful">Полезная информация</a></li>
                            <li class="scroll"><a href="/#contacts">Контакты</a></li>
                            <li class="scroll"><a href="/#reviews">Отзывы</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>