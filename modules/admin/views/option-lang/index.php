<?php
/* @var $this yii\web\View */
/* @var $lang_id app\modules\admin\controllers\PriceLangController */
/* @var $admin app\modules\admin\controllers\PriceLangController */
/* @var $option_lang app\modules\admin\controllers\PriceLangController */
/* @var $languages app\modules\admin\controllers\PriceLangController */
/* @var $option app\modules\admin\controllers\PriceLangController */

$this->title = Yii::t('admin', 'Translation Options');
$this->params['breadcrumbs'][] = $this->title;
$this->params['container'] = 'container';
?>

<?php if(!empty($admin) && !empty($languages)): ?>
    <div class="row choose-language">
        <div class="col-lg-3">
            <form action="/admin/option-lang/index" name="choose_lang">
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
    <div class="row translation-table-block">
        <div class="col-lg-12">
            <form action="/admin/option-lang/save" method="post">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <input type="hidden" name="language_id" value="<?=$lang_id; ?>" />
                <table class="table table-bordered table-striped">
                    <thead>
                    <th><?= Yii::t('admin', 'Original'); ?></th>
                    <th><?= Yii::t('admin', 'Translation'); ?></th>
                    </thead>
                    <tbody>
                    <?php
                    if(!empty($option)){
                        foreach($option as $p){
                            ?>
                            <tr>
                                <td><?= $p['title']; ?></td>
                                <td>
                                    <input type="text" class="form-control" name="translation[<?=$p['id']; ?>]" value="<?= (!empty($option_lang[$p['id']]['title'])) ? $option_lang[$p['id']]['title'] : ''; ?>" />
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
<?php endif; ?>