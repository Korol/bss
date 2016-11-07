<?php

/* @var $this yii\web\View */

$this->title = 'Boss';
$appstore_text = 'Available on the iPhone';
$gplay_text = 'Android app on';
?>
<!--BLOCK 1-->
<div class="boss-main-block1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5 col-lg-offset-7">
                        <div class="row">
<!--                            <div class="col-lg-12 text-left">-->
<!--                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, obcaecati?-->
<!--                                <h1>БЕСПЛАТНО</h1>-->
<!--                            </div>-->
<!--                            <div class="row">-->
<!--                                <div class="col-lg-12 text-center">-->
<!--                                    <a class="btn-yellow" href="#"><span class="btn-yellow-text"></span></a>-->
<!--                                    <a class="btn-yellow" href="#"></a>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--BLOCK 2-->
<div class="boss-main-block2">
    <div class="bmb2-wrap">
        <div class="container">
            <?php
            $block2_img_path = 'images/';
            $block2_header = 'Продавай мобильно';
            $block2_images = [
                0 => 'pm_icon_smart.png',
                1 => 'pm_icon_bar.png',
                2 => 'pm_icon_se.png',
                3 => 'pm_icon_barcode.png',
                4 => 'pm_icon_people.png',
                5 => 'pm_icon_cloud.png',
            ];
            $block2 = [
                0 => [
                    'img' => 0,
                    'text' => 'Пользуйтесь всеми базовыми функциями бесплатно',
                ],
                1 => [
                    'img' => 1,
                    'text' => 'Легко настраиваемые отчеты',
                ],
                2 => [
                    'img' => 2,
                    'text' => 'Мультивалютный учет',
                ],
                3 => [
                    'img' => 3,
                    'text' => 'Использование камеры телефона как сканера штрих-кода',
                ],
                4 => [
                    'img' => 4,
                    'text' => 'Многопользовательский режим',
                ],
                5 => [
                    'img' => 5,
                    'text' => 'Печать документов напрямую из приложения, или через Google Cloud',
                ],
            ];
            $block2_chunked = array_chunk($block2, 2);
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="bmb2-header"><?= $block2_header; ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <?php foreach($block2_chunked as $b2_chunk): ?>
                    <div class="row bmb2-row">
                        <?php foreach($b2_chunk as $b2_item): ?>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-3 bmb-icon-block">
                                    <img class="bmb2-icon" src="<?=\yii\helpers\Url::to([$block2_img_path . $block2_images[$b2_item['img']]]); ?>" alt="Icon Smart"/>
                                </div>
                                <div class="col-lg-9 vcentered-block">
                                    <div class="bmb2-text vcentered-content"><?= $b2_item['text']; ?></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    </div>
</div>
<!--BLOCK 3-->
<div class="boss-main-block3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="<?=\yii\helpers\Url::to(['images/vbvk_phone_tablet2.png']); ?>" alt="Block 3 Image"/>
            </div>
            <div class="col-lg-6">
                <?php
                $block3_img_path = 'images/';
                $block3_header = 'Весь бизнес <br/>у вас в кармане';
                $block3_img = 'vbvk_yellow_tag.png';
                $block3 = [
                    0 => [
                        'text' => 'Управляйте торговлей в несколько кликов, в любом месте, на любом девайсе.',
                    ],
                    1 => [
                        'text' => 'Интуитивно понятный интерфейс, многопользовательский режим и мультивалютность – это то, что выделяет нас среди других учётных программ, и помогает вам в работе.',
                    ],
                    2 => [
                        'text' => 'Приложение идеально подходит для предпринимателей (ИП, СПД, ЧП).',
                    ],
                ];
                ?>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-10">
                        <h1 class="bmb3-header"><?= $block3_header; ?></h1>
                    </div>
                </div>
                <?php foreach($block3 as $b3_row): ?>
                <div class="row">
                    <div class="col-lg-2 bmb3-tag-block">
                        <img src="<?=\yii\helpers\Url::to([$block3_img_path . $block3_img]); ?>" alt="Block 3 Tag"/>
                    </div>
                    <div class="col-lg-10">
                        <p class="bmb3-p"><?= $b3_row['text']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <img class="bmb3-bottom-img" src="<?=\yii\helpers\Url::to(['images/vbvk_peoples_png24-3.png']); ?>" alt="Block 3 Bottom Image"/>
            </div>
        </div>
    </div>
</div>
<!--BLOCK 4-->
<div class="boss-main-block4">
    <div class="container">
        <?php
        $block4_img_path = 'images/';
        $block4 = [
            0 => [
                'title' => 'Товары',
                'text' => 'Использование камеры телефона как сканера штрих-кода. Добавление фото к товарам. Различные типы цен.',
                'img' => '1.Goods.gif',
            ],
            1 => [
                'title' => 'Закупки и склад',
                'text' => 'Остатки товаров во всех торговых точках сети. Инвентаризация и переоценка.',
                'img' => '2.Purchasing.gif',
            ],
            2 => [
                'title' => 'Контрагенты',
                'text' => 'Клиенты, поставщики, сотрудники, финагенты. Добавление клиентов из адресной книги телефона.',
                'img' => '3.Clients.gif',
            ],
            3 => [
                'title' => 'Деньги',
                'text' => 'Мультивалютность. Контроль финансов. Акты сверки с детализацией до товаров и текущих долгов.',
                'img' => '4.Money.gif',
            ],
            4 => [
                'title' => 'Отчеты',
                'text' => 'Легко настраиваемые отчеты со множеством фильтров (продажи, прибыль, динамика, финансовый результат и многое другое).',
                'img' => '5.Reports.gif',
            ],
            5 => [
                'title' => 'Другие полезности',
                'text' => 'Отправка ссылки на документ, или отчет в любой мессенджер, на почту, в СМС. Печать на обычных и мобильных принтерах - через облако или напрямую через Bluetooth, USB, WiFi и т.д.',
                'img' => '6.Other.gif',
            ],

        ];
        ?>
        <div class="row">
            <div class="col-lg-4 bmb4-left-block-wrap">
                <?php foreach($block4 as $b4_key => $b4_row): ?>
                <div class="row bmb4-left-block <?= ($b4_key == 0) ? 'bmb4-row-active' : ''; ?>" id="bmb4_lb_<?=$b4_key; ?>">
                    <div class="col-lg-10 bmb4-row-title" id="bmb4_title_<?=$b4_key; ?>">
                        <span><?= $b4_row['title']; ?></span>
                    </div>
                    <div class="col-lg-2 bmb4-row-tag">
                        <img class="bmb4-row-tag-img" src="<?= \yii\helpers\Url::to(['images/t_tag.png']); ?>" alt="Block 4 Tag Image"/>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-4">
                <div class="bmb4-phone-block">
                <?php foreach($block4 as $b4_key => $b4_row): ?>
                    <img id="bmb4_pbi_<?=$b4_key; ?>" class="bmb4-row-img <?= ($b4_key == 0) ? 'bmb4-row-active' : ''; ?>" src="<?=\yii\helpers\Url::to([$block4_img_path . $b4_row['img']]); ?>" alt="Block 4 Image <?=$b4_row['title']; ?>"/>
                <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-4 bmb4-right-block-wrap">
                <?php foreach($block4 as $b4_key => $b4_row): ?>
                <div class="row bmb4-right-block <?= ($b4_key == 0) ? 'bmb4-row-active' : ''; ?>" id="bmb4_rb_<?=$b4_key; ?>">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-10  bmb4-row-text">
                        <h1 class="bmb3-header"><?= $b4_row['title']; ?></h1>
                        <p class="bmb3-p"><?= $b4_row['text']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row bmb4-buttons-block">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-10">
                        <a href="#" class="bmb4-btn-link">
                            <div class="bmb4-black-appstore">
                                <span><?= $appstore_text; ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-10">
                        <a href="#" class="bmb4-btn-link">
                            <div class="bmb4-black-gplay">
                                <span><?= $gplay_text; ?></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--BLOCK 5-->
<div class="boss-main-block5">
    <div class="container">
        <?php
        $block5_header = 'Что нового у босса';
        $block5_subscribe_text = 'Хочу быть в курсе новостей BOSS';
        ?>
        <div class="row">
            <div class="col-lg-10">
                <h1 class="bmb3-header ml30"><?= $block5_header; ?></h1>
            </div>
            <div class="col-lg-2">
                <div class="row bmb5-subscribe-block">
                    <div class="col-lg-3 bmb5-subscribe-img">
                        <img src="<?= \yii\helpers\Url::to(['images/cnub_mail.png']); ?>" alt="Subscribe Image"/>
                    </div>
                    <div class="col-lg-9">
                        <a href="#" class="bmb5-subscribe-link">
                            <span class="bmb5-subscribe-text"><?= $block5_subscribe_text; ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php
                $block5 = [
                    0 => [
                        'title' => 'Новые возможности Босса',
                        'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eveniet ipsam nemo pariatur quidem rerum?',
                        'url' => '#',
                    ],
                    1 => [
                        'title' => 'Что нового у BOSS?',
                        'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eveniet ipsam nemo pariatur quidem rerum?',
                        'url' => '#',
                    ],
                    2 => [
                        'title' => 'Как сэкономить с BOSS?',
                        'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eveniet ipsam nemo pariatur quidem rerum?',
                        'url' => '#',
                    ],
                    3 => [
                        'title' => 'Бесплатно и ещё бесплатнее!',
                        'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eveniet ipsam nemo pariatur quidem rerum?',
                        'url' => '#',
                    ],
                    4 => [
                        'title' => 'Скидки вам и вашим друзьям! и вашим друзьям! и вашим друзьям!',
                        'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eveniet ipsam nemo pariatur quidem rerum?',
                        'url' => '#',
                    ],
                    5 => [
                        'title' => 'Станьте первым!',
                        'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eveniet ipsam nemo pariatur quidem rerum?',
                        'url' => '#',
                    ],
                ];
                $block5_chunked = array_chunk($block5, 3);
                ?>
                <div id="block5_carousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <?php /*ol class="carousel-indicators">
                        <?php for($b5_i = 0; $b5_i < count($block5_chunked); $b5_i++): ?>
                        <li data-target="#block5_carousel" data-slide-to="<?= $b5_i; ?>" <?=($b5_i == 0) ? 'class="active"' : ''; ?>></li>
                        <?php endfor; ?>
                    </ol*/?>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php foreach($block5_chunked as $b5_chunk_key => $b5_chunk): ?>
                        <div class="item <?= ($b5_chunk_key == 0) ? 'active' : ''; ?>">
                            <div class="row">
                                <?php foreach($b5_chunk as $b5_key => $b5_item): ?>
                                <div class="col-lg-4">
                                    <div class="bmb5-carousel-item <?= ($b5_key < 2) ? 'bmb5-slider-item-left' : 'bmb5-slider-item-both'; ?>">
                                        <div class="bmb5-ci-header">
                                            <h3 class="bmb5-h3">
                                                <a href="<?=$b5_item['url']; ?>"><?= $b5_item['title']; ?></a>
                                            </h3>
                                        </div>
                                        <div class="bmb5-ci-text">
                                            <p class="bmb5-p"><?= $b5_item['text']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#block5_carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#block5_carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--BLOCK 6-->
<div class="boss-main-block6">
    <div class="container">
        <?php
        $block6_header = 'Отзывы';
        ?>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="bmb3-header ml30"><?= $block6_header; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            <?php
            $block6_img_path = 'images/';
            $block6 = [
                0 => [
                    'type' => 'video',
                    'code' => '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/4cTGrUQIYeo" allowfullscreen></iframe>',
                    'user_photo' => '',
                    'user_name' => '',
                    'user_text' => '',
                ],
                1 => [
                    'type' => 'text',
                    'code' => '',
                    'user_photo' => 'user1.jpg',
                    'user_name' => 'Марина Соколова',
                    'user_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam debitis dolor ducimus eligendi harum id nemo neque nulla ullam voluptate.',
                ],
                2 => [
                    'type' => 'text',
                    'code' => '',
                    'user_photo' => 'user2.jpg',
                    'user_name' => 'Иван Петров',
                    'user_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab blanditiis error labore molestiae pariatur unde.',
                ],
                3 => [
                    'type' => 'text',
                    'code' => '',
                    'user_photo' => 'user3.jpg',
                    'user_name' => 'Наталья Борисова',
                    'user_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet ea earum, enim eveniet, molestiae nam perspiciatis quibusdam quis quod sequi totam vel voluptates. Accusamus, pariatur.',
                ],
                4 => [
                    'type' => 'video',
                    'code' => '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/X78wiDUt9SM" allowfullscreen></iframe>',
                    'user_photo' => '',
                    'user_name' => '',
                    'user_text' => '',
                ],
                5 => [
                    'type' => 'text',
                    'code' => '',
                    'user_photo' => 'user1.jpg',
                    'user_name' => 'Марина Соколова',
                    'user_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab blanditiis error labore molestiae pariatur unde.',
                ],
                6 => [
                    'type' => 'video',
                    'code' => '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/rXKVYb59uhA" allowfullscreen></iframe>',
                    'user_photo' => '',
                    'user_name' => '',
                    'user_text' => '',
                ],
                7 => [
                    'type' => 'text',
                    'code' => '',
                    'user_photo' => 'user2.jpg',
                    'user_name' => 'Владимир Смирнов',
                    'user_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam debitis dolor ducimus eligendi harum id nemo neque nulla ullam voluptate.',
                ],
            ];
            $block6_chunked = array_chunk($block6, 4);
            ?>
                <div class="bmb6-carousel-wrapper">
                    <div id="block6_carousel" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php foreach($block6_chunked as $b6_chunk_key => $b6_chunk): ?>
                                <div class="item <?= ($b6_chunk_key == 0) ? 'active' : ''; ?>">
                                    <div class="row">
                                        <?php foreach($b6_chunk as $b6_key => $b6_item): ?>
                                            <div class="col-lg-3">
                                            <?php if($b6_item['type'] == 'video'): ?>
                                                <div class="embed-responsive embed-responsive-4by3"><?= $b6_item['code']; ?></div>
                                            <?php else: ?>
                                                <div class="thumbnail bmb6-thumb">
                                                    <img class="img-circle pull-left" src="<?= \yii\helpers\Url::to([$block6_img_path . $b6_item['user_photo']]); ?>" alt="Image <?=$b6_item['user_name']; ?>">
                                                    <div class="clearfix"></div>
                                                    <div class="caption">
                                                        <h3><?= $b6_item['user_name']; ?></h3>
                                                        <div class="bmb6-thumb-text">
                                                            <p><?= $b6_item['user_text']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#block6_carousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#block6_carousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--BLOCK 7-->
<div class="boss-main-block7">
    <div class="bmb2-wrap">
        <div class="container">
            <div class="row">
                <?php
                $block7_header = 'Стать партнером Boss';
                $block7_text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores assumenda autem beatae deleniti dolores doloribus ea, eligendi eos esse eveniet facere facilis ipsam itaque magni minima minus, necessitatibus nobis numquam officia perspiciatis quaerat quidem quo sed sunt tempora unde voluptatum. Dolor dolore dolores officia quam tempora. Facere fugit iure voluptatibus!';
                ?>
                <div class="col-lg-6 col-lg-offset-3 bmb7-content">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img src="<?=\yii\helpers\Url::to(['images/sp_icon.png']); ?>" alt="Partners Icon"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="bmb3-header text-center"><a href="#"><?= $block7_header; ?></a></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="text-center"><?= $block7_text; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--BLOCK 8-->
<div class="boss-main-block8">
    <div class="container">
        <?php
        $block8_header = 'Чем <b>boss</b> облегчит вам жизнь';
        $block8_img_path = 'images/';
        $block8 = [
            0 => [
                'img' => 'cbovz_pig.png',
                'text' => 'Вы экономите до 400$ на покупке ноутбука, так как он вам не нужен в работе.',
            ],
            1 => [
                'img' => 'cbovz_laptop.png',
                'text' => 'Не нужно отдельное место для работы.',
            ],
            2 => [
                'img' => 'cbovz_peoples.png',
                'text' => 'Не нужно бегать к компьютелу, будьте всегда рядом с клиентом.',
            ],
            3 => [
                'img' => 'cbovz_labirint.png',
                'text' => 'Не покупайте отдельно сканер штрих-кодов, он встроен в приложение.',
            ],
            4 => [
                'img' => 'cbovz_smartphone.png',
                'text' => 'Не нужно покупать специальное программное обеспечение.',
            ],
        ];
        ?>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="bmb3-header text-center"><?= $block8_header; ?></h1>
            </div>
        </div>
        <div class="row bmb8-content">
            <div class="col-lg-5 bmb8-content-images">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <a href="#">
                            <img src="<?=\yii\helpers\Url::to(['images/cbovz_quote.png']); ?>" alt="Quote Image"/>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <img src="<?=\yii\helpers\Url::to(['images/cbovz_boss.png']); ?>" alt="Boss Image"/>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
            <?php foreach($block8 as $b8_row): ?>
                <div class="row bmb8-row">
                    <div class="col-lg-3 text-right">
                        <img class="bmb8-quote" src="<?=\yii\helpers\Url::to([$block8_img_path . $b8_row['img']]); ?>" alt="Icon <?=$b8_row['img']; ?>"/>
                    </div>
                    <div class="col-lg-9 vcentered-block">
                        <div class="bmb2-text vcentered-content"><?= $b8_row['text']; ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
                <div class="row bmb8-buttons-block">
                    <div class="col-lg-6">
                        <a href="#" class="bmb4-btn-link">
                            <div class="bmb8-black-white-appstore pull-right">
                                <span><?= $appstore_text; ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="#" class="bmb4-btn-link">
                            <div class="bmb8-black-white-gplay">
                                <span><?= $gplay_text; ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--BLOCK 9-->
<div class="boss-main-block9">
    <div class="container">
        <?php
        $block9_header = 'Узнай больше о boss';
        $block9 = [
            0 => [
                'code' => '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/4cTGrUQIYeo" allowfullscreen></iframe>',
            ],
            1 => [
                'code' => '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/X78wiDUt9SM" allowfullscreen></iframe>',
            ],
            2 => [
                'code' => '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/rXKVYb59uhA" allowfullscreen></iframe>',
            ],
            3 => [
                'code' => '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/rXKVYb59uhA" allowfullscreen></iframe>',
            ],
            4 => [
                'code' => '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/4cTGrUQIYeo" allowfullscreen></iframe>',
            ],
            5 => [
                'code' => '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/X78wiDUt9SM" allowfullscreen></iframe>',
            ],
        ];
        $block9_chunked = array_chunk($block9, 3);
        ?>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="bmb3-header header-white text-left ml30"><?= $block9_header; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="bmb9-carousel-wrapper">
                    <div id="block9_carousel" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php foreach($block9_chunked as $b9_chunk_key => $b9_chunk): ?>
                                <div class="item <?= ($b9_chunk_key == 0) ? 'active' : ''; ?>">
                                    <div class="row">
                                        <?php foreach($b9_chunk as $b9_key => $b9_item): ?>
                                            <div class="col-lg-4">
                                                <div class="embed-responsive embed-responsive-16by9"><?= $b9_item['code']; ?></div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#block9_carousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#block9_carousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--BLOCK 10-->
<div class="boss-main-block10">
    <div class="container">
        <?php
        $block10_left = 'Подписывайтесь<br/>на наш канал';
        $block10_right = 'Будем рады подружиться с вами<br/>в социальных сетях';
        $block10_img_path = 'images/';
        ?>
        <div class="row bmb10-content">
            <div class="col-lg-4">
                <p class="bmb10-p text-right"><?= $block10_left; ?></p>
            </div>
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-4">
                        <a href="#">
                            <img src="<?=\yii\helpers\Url::to([$block10_img_path . 'ubob_youtube.png']); ?>" alt="Youtube Icon"/>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="#">
                            <img src="<?=\yii\helpers\Url::to([$block10_img_path . 'ubob_fb.png']); ?>" alt="Facebook Icon"/>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="#">
                            <img src="<?=\yii\helpers\Url::to([$block10_img_path . 'ubob_vk.png']); ?>" alt="VK Icon"/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <p class="bmb10-p text-left"><?= $block10_right; ?></p>
            </div>
        </div>
    </div>
</div>