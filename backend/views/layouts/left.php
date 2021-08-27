<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Меню', 'options' => ['class' => 'header']],
                    ['label' => 'О районе', 'icon' => 'pencil-square-o', 'url' => ['/area']],
                    ['label' => 'Видео', 'icon' => 'file-video-o ', 'url' => ['/video']],
                    ['label' => 'Новости', 'icon' => 'newspaper-o', 'url' => ['/news']],
                    ['label' => 'Маршруты', 'icon' => 'newspaper-o', 'url' => ['/routers']],
                    ['label' => 'Полезная информация', 'icon' => 'info-circle', 'url' => ['/helpful']],
                    ['label' => 'Достопримечательности', 'icon' => 'info-circle', 'url' => ['/attractions']],
                    ['label' => 'Календарь событий', 'icon' => 'calendar', 'url' => ['/events']],
                    ['label' => 'Отзывы', 'icon' => 'quote-left', 'url' => ['/reviews']],
                    ['label' => 'Пользователи', 'icon' => 'users', 'url' => ['/user']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
