<?php
/* @var $this yii\web\View */
/* @var $admin app\modules\admin\controllers\FaqInfoController */
/* @var $lang_id app\modules\admin\controllers\FaqInfoController */
/* @var $faq_info app\modules\admin\controllers\FaqInfoController */
/* @var $languages app\modules\admin\controllers\FaqInfoController */

use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

$this->title = Yii::t('admin', 'FAQ Info');
$this->params['breadcrumbs'][] = Yii::t('admin', 'FAQ Info');
$this->params['container'] = 'container';
?>

<?php if(!empty($admin) && !empty($languages)): ?>
    <div class="row choose-language">
        <div class="col-lg-3">
            <form action="/admin/faq-info/index" name="choose_lang">
                <!--            <input type="hidden" name="_csrf" value="--><?//=Yii::$app->request->getCsrfToken()?><!--" />-->
                <select class="form-control" name="lang_id" id="lang_id" onchange="document.choose_lang.submit();">
                    <option value="0"><?= Yii::t('admin', 'Choose language'); ?></option>
                    <?php foreach($languages as $lang): ?>
                        <option value="<?=$lang['id']; ?>" <?=($lang['id'] == $lang_id) ? 'selected="selected"' : ''; ?>><?= $lang['title_en']; ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>
    </div>
<?php endif; ?>

<?php if(!empty($lang_id)): ?>
    <div class="row about-block">
        <div class="col-lg-12">
            <form action="/admin/faq-info/save" method="post">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <input type="hidden" name="language_id" value="<?=$lang_id; ?>" />
                <div class="form-group">
                    <label for="header"><?= Yii::t('admin', 'Header'); ?>:</label>
                    <input type="text" name="header" value="<?=(!empty($faq_info['header'])) ? $faq_info['header'] : ''; ?>" class="form-control" id="header" placeholder="FAQ Header text">
                </div>
                <div class="form-group">
                    <label for="email"><?= Yii::t('admin', 'Email'); ?>:</label>
                    <input type="email" name="email" value="<?=(!empty($faq_info['email'])) ? $faq_info['email'] : ''; ?>" class="form-control" id="email" placeholder="FAQ Email">
                </div>
                <div class="form-group">
                    <label for="email_text"><?= Yii::t('admin', 'Email Text'); ?>:</label>
                    <?php
                    echo CKEditor::widget([
                        'name' => 'email_text',
                        'value' => (!empty($faq_info['email_text'])) ? $faq_info['email_text'] : '',
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['height' => 350]),
                    ]);
                    ?>
                </div>
                <button type="submit" class="btn btn-success"><?= Yii::t('admin', 'Save'); ?></button>
            </form>
        </div>
    </div>
<?php endif; ?>