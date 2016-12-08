<?php
//var_dump($exception);
$this->context->layout = 'error';
$this->title = $name;
?>
<div class="row">
    <div class="container">
        <h1 class="title"><?= $exception->statusCode; ?></h1>
        <p class="sub-heading"><?= $name; ?></p>
        <hr class="hr-style-404"/>
        <p class="redirect-style-404"><?= Yii::t('site', 'Something went wrong'); ?></p>
    </div>
</div>