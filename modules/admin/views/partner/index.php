<?php
/* @var $this yii\web\View */
/* @var $admin app\modules\admin\controllers\FaqInfoController */
/* @var $lang_id app\modules\admin\controllers\FaqInfoController */
/* @var $partner app\modules\admin\controllers\FaqInfoController */
/* @var $languages app\modules\admin\controllers\FaqInfoController */

use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

$this->title = Yii::t('admin', 'Partner Info');
$this->params['breadcrumbs'][] = Yii::t('admin', 'Partner Info');
$this->params['container'] = 'container';
?>

<?php if(!empty($admin) && !empty($languages)): ?>
    <div class="row choose-language">
        <div class="col-lg-3">
            <form action="<?=\yii\helpers\Url::to(['/admin/partner/index']); ?>" name="choose_lang">
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
            <form action="<?=\yii\helpers\Url::to(['/admin/partner/save']); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <input type="hidden" name="language_id" value="<?=$lang_id; ?>" />
                <div class="form-group">
                    <label for="header"><?= Yii::t('admin', 'Header'); ?>:</label>
                    <input type="text" name="header" value="<?=(!empty($partner['header'])) ? $partner['header'] : ''; ?>" class="form-control" id="header" placeholder="Partner Header text">
                </div>
                <div class="form-group">
                    <label for="content"><?= Yii::t('admin', 'Content'); ?>:</label>
                    <?php
                    echo CKEditor::widget([
                        'name' => 'content',
                        'value' => (!empty($partner['content'])) ? $partner['content'] : '',
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['height' => 200]),
                    ]);
                    ?>
                </div>
                <div class="form-group">
                    <label for="button_text"><?= Yii::t('admin', 'Button text'); ?>:</label>
                    <input type="button_text" name="button_text" value="<?=(!empty($partner['button_text'])) ? $partner['button_text'] : ''; ?>" class="form-control" id="email" placeholder="Partner download button text">
                </div>
                <div class="form-group">
                    <?php
                    if(!empty($partner['file'])){
                        echo '<label for="file">' . Yii::t('admin', 'Existing File') . ':</label> ';
                        echo \yii\helpers\Html::a($partner['file'], ['@web/uploads/partner/' . $partner['file']], ['target' => '_blank']);
                        echo '<br/>';
                    }
                    ?>
                    <label for="file"><?= Yii::t('admin', 'File'); ?>:</label>
                    <div class="hint-block">Allowed: png, jpg, gif, jpeg, pdf, xls, xlsx, doc, docx, txt</div>
                    <input type="file" name="file" id="file">
                </div>
                <div class="form-group">
                    <label for="email"><?= Yii::t('admin', 'Email'); ?>:</label>
                    <input type="email" name="email" value="<?=(!empty($partner['email'])) ? $partner['email'] : ''; ?>" class="form-control" id="email" placeholder="Partner Email">
                </div>
                <div class="form-group">
                    <label for="email_text"><?= Yii::t('admin', 'Email Text'); ?>:</label>
                    <?php
                    echo CKEditor::widget([
                        'name' => 'email_text',
                        'value' => (!empty($partner['email_text'])) ? $partner['email_text'] : '',
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['height' => 200]),
                    ]);
                    ?>
                </div>
                <button type="submit" class="btn btn-success"><?= Yii::t('admin', 'Save'); ?></button>
            </form>
        </div>
    </div>
<?php endif; ?>