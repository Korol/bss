<?php
$this->title = 'Boss - How to work';
?>
<?php
$url = 'how-to-work';
$langs = array('ru', 'en', 'tr');
$lang = (!empty($_GET['Lang']) && in_array($_GET['Lang'], $langs)) ? $_GET['Lang'] : 'ru';
$lang = ($lang == 'tr') ? 'en' : $lang;
$slogans = array(
    'ru' => 'Продавай мобильно!',
    'en' => 'Run business, stay mobile!',
);
$videos = array(
    'ru' => array('iqasbSx46bw', 'noGaX8m6ANc', '_PAd84Dv-C4', 'Sl-FS5rRDqQ', '4Q_NWordb_0', 'rVHEDuanK00'),
    'en' => array('iqasbSx46bw', 'noGaX8m6ANc', '_PAd84Dv-C4', 'Sl-FS5rRDqQ', '4Q_NWordb_0', 'rVHEDuanK00'),
);
$lists = array(
    'ru' => array(
        0 => array(
            'link' => '/video/' . $url . '?Lang=ru&video=iqasbSx46bw',
            'title' => 'Начало (рабочий стол)',
            'code' => 'iqasbSx46bw',
        ),
        1 => array(
            'link' => '/video/' . $url . '?Lang=ru&video=noGaX8m6ANc',
            'title' => 'Как продать?',
            'code' => 'noGaX8m6ANc',
        ),
        2 => array(
            'link' => '/video/' . $url . '?Lang=ru&video=_PAd84Dv-C4',
            'title' => 'Как принять оплату?',
            'code' => '_PAd84Dv-C4',
        ),
        3 => array(
            'link' => '/video/' . $url . '?Lang=ru&video=Sl-FS5rRDqQ',
            'title' => 'Где деньги?',
            'code' => 'Sl-FS5rRDqQ',
        ),
        4 => array(
            'link' => '/video/' . $url . '?Lang=ru&video=4Q_NWordb_0',
            'title' => 'Как сделать переоценку?',
            'code' => '4Q_NWordb_0',
        ),
        5 => array(
            'link' => '/video/' . $url . '?Lang=ru&video=rVHEDuanK00',
            'title' => 'Отчеты',
            'code' => 'rVHEDuanK00',
        ),
    ),
    'en' => array(
        0 => array(
            'link' => '/video/' . $url . '?Lang=en&video=iqasbSx46bw',
            'title' => 'Start (desktop)',
            'code' => 'iqasbSx46bw',
        ),
        1 => array(
            'link' => '/video/' . $url . '?Lang=en&video=noGaX8m6ANc',
            'title' => 'How to sell?',
            'code' => 'noGaX8m6ANc',
        ),
        2 => array(
            'link' => '/video/' . $url . '?Lang=en&video=_PAd84Dv-C4',
            'title' => 'How to get payment?',
            'code' => '_PAd84Dv-C4',
        ),
        3 => array(
            'link' => '/video/' . $url . '?Lang=en&video=Sl-FS5rRDqQ',
            'title' => 'Where is the money?',
            'code' => 'Sl-FS5rRDqQ',
        ),
        4 => array(
            'link' => '/video/' . $url . '?Lang=en&video=4Q_NWordb_0',
            'title' => 'How to make a re-evaluation?',
            'code' => '4Q_NWordb_0',
        ),
        5 => array(
            'link' => '/video/' . $url . '?Lang=en&video=rVHEDuanK00',
            'title' => 'Reports',
            'code' => 'rVHEDuanK00',
        ),
    ),
);
$video_code = (!empty($_GET['video']) && in_array($_GET['video'], $videos[$lang])) ? $_GET['video'] : $videos[$lang][0]; // показываем первое видео – если код из URL не соответствует ни одному из элементов массива $videos
?>

<link rel="stylesheet" type="text/css" href="/css/en/stylemin.css">
<link rel="stylesheet" type="text/css" href="/css/en/animatemin.css" />
<style type="text/css">
    html,
    body {
        height: 100%;
    }
    .v-links-list {
        padding-left: 15px;
        padding-right: 20px;
    }
    .v-links-list,
    .v-links-list > li > a {
        color: #222;
        font-size: 20px;
    }
    .v-links-list > li > a {
        text-decoration: underline;
    }
    .v-links-list > li > a:hover {
        text-decoration: none;
    }
    #video {
        padding-top: 150px;
        padding-bottom: 50px;
    }
    @media only screen and (max-width: 992px) {
        .v-links-list {
            margin-top: 25px;
            margin-bottom: 30px;
        }
        #video {
            padding-top: 70px;
        }
    }
    @media only screen and (max-width: 768px) {
        .v-links-list {
            margin-top: 25px;
            margin-bottom: 30px;
        }
    }
    @media(max-width: 460px){
        .logo p {
            font-size: 14px !important;
        }
        .ln span {
            padding-top: 0 !important;
        }
    }
    @media(max-width: 680px){
        .ln span {
            padding-top: 0 !important;
        }
    }
</style>

<div id="video">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                <ol class="v-links-list">
                    <?php foreach($lists[$lang] as $row): ?>
                        <li>
                            <?php if($row['code'] == $video_code): ?>
                                <?=$row['title']; ?>
                            <?php else: ?>
                                <a href="<?=$row['link']; ?>">
                                    <?=$row['title']; ?>
                                </a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <div class="vk">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $video_code;?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>