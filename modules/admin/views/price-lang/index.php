<?php
/* @var $this yii\web\View */
/* @var $lang_id app\modules\admin\controllers\PriceLangController */
/* @var $admin app\modules\admin\controllers\PriceLangController */
/* @var $price_lang app\modules\admin\controllers\PriceLangController */
/* @var $languages app\modules\admin\controllers\PriceLangController */
/* @var $price app\modules\admin\controllers\PriceLangController */
/* @var $format app\modules\admin\controllers\PriceLangController */
/* @var $price_note app\modules\admin\controllers\PriceLangController */

use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

$this->title = Yii::t('admin', 'Translation Tariffs');
$this->params['breadcrumbs'][] = $this->title;
$this->params['container'] = 'container';
$format_before = $format_after = '';
if(!empty($format['format'])){
    $format_ex = explode('{sum}', $format['format']);
    $format_before = $format_ex[0];
    $format_after = $format_ex[1];
}
?>
<?php if(!empty($admin) && !empty($languages)): ?>
<div class="row choose-language">
    <div class="col-lg-3">
        <form action="<?=\yii\helpers\Url::to(['/admin/price-lang/index']); ?>" name="choose_lang">
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
<div class="row set-price-format">
    <div class="col-lg-9">
        <form class="form-inline" method="post" action="<?=\yii\helpers\Url::to(['/admin/price-lang/format']); ?>">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <input type="hidden" name="language_id" value="<?=$lang_id; ?>" />
            <div class="form-group">
                <label for="basic-addon1"><?= Yii::t('admin', 'Price format'); ?>:</label>
                <div class="input-group">
                    <input type="text" name="format_before" class="form-control text-right price-format-input" placeholder="$" aria-describedby="basic-addon1" value="<?= $format_before; ?>">
                    <span class="input-group-addon" id="basic-addon1">9,99</span>
                    <input type="text" name="format_after" class="form-control price-format-input" placeholder="/month" aria-describedby="basic-addon1" value="<?= $format_after; ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-success"><?= Yii::t('admin', 'Save format'); ?></button>
        </form>
    </div>
</div>

<div class="row translation-table-block">
    <div class="col-lg-12">
        <form action="<?=\yii\helpers\Url::to(['/admin/price-lang/save']); ?>" method="post">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <input type="hidden" name="language_id" value="<?=$lang_id; ?>" />
        <table class="table table-bordered table-striped">
            <thead>
                <th><?= Yii::t('admin', 'Original'); ?></th>
                <th><?= Yii::t('admin', 'Translation'); ?></th>
            </thead>
            <tbody>
            <?php
            if(!empty($price)){
                foreach($price as $p){
            ?>
                <tr>
                    <td><?= $p['title']; ?></td>
                    <td>
                        <input type="text" class="form-control" name="translation[<?=$p['id']; ?>]" value="<?= (!empty($price_lang[$p['id']]['title'])) ? $price_lang[$p['id']]['title'] : ''; ?>" />
                    </td>
                </tr>
            <?php
                }
            }
            ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-success"><?= Yii::t('admin', 'Save translations'); ?></button>
        </form>
    </div>
</div>

    <div class="row option-note-block">
        <div class="col-lg-12">
            <form method="post" action="<?=\yii\helpers\Url::to(['/admin/price-lang/note']); ?>">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <input type="hidden" name="language_id" value="<?=$lang_id; ?>" />
                <div class="form-group">
                    <label for="option_note"><?= Yii::t('admin', 'Star Note'); ?> (description for possible star in the bottom of Tariffs table on Price page):</label>
                    <?php
                    echo CKEditor::widget([
                        'name' => 'price_note',
                        'value' => (!empty($price_note['note'])) ? $price_note['note'] : '',
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['height' => 250]),
                    ]);
                    ?>
                </div>
                <button type="submit" class="btn btn-success"><?= Yii::t('admin', 'Save note'); ?></button>
            </form>
        </div>
    </div>
<?php endif; ?>