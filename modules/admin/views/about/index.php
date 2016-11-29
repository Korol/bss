<?php
/* @var $this yii\web\View */
/* @var $admin app\modules\admin\controllers\AboutController */
/* @var $lang_id app\modules\admin\controllers\AboutController */
/* @var $about app\modules\admin\controllers\AboutController */
/* @var $languages app\modules\admin\controllers\AboutController */

use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

$this->title = Yii::t('admin', 'About');
$this->params['breadcrumbs'][] = Yii::t('admin', 'About');
$this->params['container'] = 'container';
?>

<?php if(!empty($admin) && !empty($languages)): ?>
<div class="row choose-language">
    <div class="col-lg-3">
        <form action="/admin/about/index" name="choose_lang">
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
        <form action="/admin/about/save" method="post">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <input type="hidden" name="language_id" value="<?=$lang_id; ?>" />
            <div class="form-group">
                <label for="header"><?= Yii::t('admin', 'Header'); ?>:</label>
                <input type="text" name="header" value="<?=(!empty($about['header'])) ? $about['header'] : ''; ?>" class="form-control" id="header" placeholder="About Header text">
            </div>
            <div class="form-group">
                <label for="content"><?= Yii::t('admin', 'Content'); ?>:</label>
                <?php
                echo CKEditor::widget([
                    'name' => 'content',
                    'value' => (!empty($about['content'])) ? $about['content'] : '',
                    'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['height' => 350]),
                ]);
                ?>
            </div>
            <div class="form-group">
                <label for="photo_header"><?= Yii::t('admin', 'Photos Header'); ?>:</label>
                <input type="text" name="photo_header" value="<?=(!empty($about['photo_header'])) ? $about['photo_header'] : ''; ?>" class="form-control" id="photo_header" placeholder="Photos Header text">
            </div>
            <div class="form-group">
                <label for="vacancy_header"><?= Yii::t('admin', 'Vacancy Header'); ?>:</label>
                <input type="text" name="vacancy_header" value="<?=(!empty($about['vacancy_header'])) ? $about['vacancy_header'] : ''; ?>" class="form-control" id="vacancy_header" placeholder="Vacancy Header text">
            </div>
            <div class="form-group">
                <label for="vacancy_content"><?= Yii::t('admin', 'Vacancy Content'); ?>:</label>
                <?php
                echo CKEditor::widget([
                    'name' => 'vacancy_content',
                    'value' => (!empty($about['vacancy_content'])) ? $about['vacancy_content'] : '',
                    'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['height' => 350]),
                ]);
                ?>
            </div>
            <div class="form-group">
                <label for="email"><?= Yii::t('admin', 'Vacancy Email'); ?>:</label>
                <input type="email" name="email" value="<?=(!empty($about['email'])) ? $about['email'] : ''; ?>" class="form-control" id="email" placeholder="Vacancy Email">
            </div>
            <button type="submit" class="btn btn-success"><?= Yii::t('admin', 'Save'); ?></button>
        </form>
    </div>
</div>
<?php endif; ?>