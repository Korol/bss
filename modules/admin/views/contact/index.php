<?php
/* @var $this yii\web\View */
/* @var $admin app\modules\admin\controllers\ContactController */
/* @var $lang_id app\modules\admin\controllers\ContactController */
/* @var $contact app\modules\admin\controllers\ContactController */
/* @var $languages app\modules\admin\controllers\ContactController */

use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

$this->title = Yii::t('admin', 'Contact');
$this->params['breadcrumbs'][] = Yii::t('admin', 'Contact');
$this->params['container'] = 'container';
$hint = htmlentities('Use <br/> HTML tag to set line break in the text below');
?>

<?php if(!empty($admin) && !empty($languages)): ?>
    <div class="row choose-language">
        <div class="col-lg-3">
            <form action="<?=\yii\helpers\Url::to(['/admin/contact/index']); ?>" name="choose_lang">
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
            <form action="<?=\yii\helpers\Url::to(['/admin/contact/save']); ?>" method="post">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <input type="hidden" name="language_id" value="<?=$lang_id; ?>" />
                <div class="form-group">
                    <label for="header"><?= Yii::t('admin', 'Header'); ?>:</label>
                    <input type="text" name="header" value="<?=(!empty($contact['header'])) ? $contact['header'] : ''; ?>" class="form-control" id="header" placeholder="Contact Header text">
                </div>
                <div class="form-group">
                    <label for="content"><?= Yii::t('admin', 'Content'); ?>:</label>
                    <?php
                    echo CKEditor::widget([
                        'name' => 'content',
                        'value' => (!empty($contact['content'])) ? $contact['content'] : '',
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['height' => 250]),
                    ]);
                    ?>
                </div>
                <div class="form-group">
                    <label for="rating"><?= Yii::t('admin', 'Rating'); ?>:</label>
                    <input type="text" name="rating" value="<?=(!empty($contact['rating'])) ? $contact['rating'] : ''; ?>" class="form-control" id="rating" placeholder="4,6">
                </div>
                <div class="form-group">
                    <label for="rating_text"><?= Yii::t('admin', 'Rating Text'); ?>:</label>
                    <p class="help-block"><?= $hint; ?></p>
                    <input type="text" name="rating_text" value="<?=(!empty($contact['rating_text'])) ? $contact['rating_text'] : ''; ?>" class="form-control" id="rating_text" placeholder="Rating text">
                </div>
                <div class="form-group">
                    <label for="qty"><?= Yii::t('admin', 'Qty'); ?>:</label>
                    <input type="text" name="qty" value="<?=(!empty($contact['qty'])) ? $contact['qty'] : ''; ?>" class="form-control" id="qty" placeholder="20 000">
                </div>
                <div class="form-group">
                    <label for="qty_text"><?= Yii::t('admin', 'Quantity Text'); ?>:</label>
                    <p class="help-block"><?= $hint; ?></p>
                    <input type="text" name="qty_text" value="<?=(!empty($contact['qty_text'])) ? $contact['qty_text'] : ''; ?>" class="form-control" id="qty_text" placeholder="Quantity text">
                </div>
                <div class="form-group">
                    <label for="feedbacks"><?= Yii::t('admin', 'Feedbacks'); ?>:</label>
                    <input type="text" name="feedbacks" value="<?=(!empty($contact['feedbacks'])) ? $contact['feedbacks'] : ''; ?>" class="form-control" id="feedbacks" placeholder="163">
                </div>
                <div class="form-group">
                    <label for="feedbacks_text"><?= Yii::t('admin', 'Rating Text'); ?>:</label>
                    <p class="help-block"><?= $hint; ?></p>
                    <input type="text" name="feedbacks_text" value="<?=(!empty($contact['feedbacks_text'])) ? $contact['feedbacks_text'] : ''; ?>" class="form-control" id="feedbacks_text" placeholder="Feedbacks text">
                </div>

                <div class="form-group">
                    <label for="email"><?= Yii::t('admin', 'Email'); ?>:</label>
                    <input type="email" name="email" value="<?=(!empty($contact['email'])) ? $contact['email'] : ''; ?>" class="form-control" id="email" placeholder="Contact Email">
                </div>
                <button type="submit" class="btn btn-success"><?= Yii::t('admin', 'Save'); ?></button>
            </form>
        </div>
    </div>
<?php endif; ?>