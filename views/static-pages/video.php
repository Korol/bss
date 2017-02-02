<?php
$langs = array('ru', 'en', 'tr');
$lang = (!empty($_GET['Lang']) && in_array($_GET['Lang'], $langs)) ? $_GET['Lang'] : 'ru';
$lang = ($lang == 'tr') ? 'ru' : $lang;
$slogans = array(
    'ru' => 'Продавай мобильно!',
    'en' => 'Run business, stay mobile!',
    'tr' => 'Run business, stay mobile!',
);
$videos = array(
    'ru' => 'dKXPud5xk5s',
    'en' => 'dKXPud5xk5s',
    'tr' => 'dKXPud5xk5s',
);
?>
<link rel="stylesheet" type="text/css" href="/css/en/stylemin.css">
<link rel="stylesheet" type="text/css" href="/css/en/animatemin.css" />
<style type="text/css">
html,
body {
    height: 100%;
}
#video {
    margin-top: 150px;
    padding-bottom: 50px;
}
@media only screen and (max-width: 992px) {
    #video {
        margin-top: 90px;
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
        <div class="vk">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $videos[$lang];?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>