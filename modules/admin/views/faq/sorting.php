<?php
/* @var $this yii\web\View */
/* @var $admin app\modules\admin\controllers\AboutController */
/* @var $lang_id app\modules\admin\controllers\AboutController */
/* @var $faq app\modules\admin\controllers\AboutController */
/* @var $languages app\modules\admin\controllers\AboutController */

use kartik\sortinput\SortableInput;

$this->title = Yii::t('admin', 'FAQ Sorting order');
$this->params['breadcrumbs'][] = Yii::t('admin', 'FAQ Sorting order');
$this->params['container'] = 'container';
?>

<?php if(!empty($admin) && !empty($languages)): ?>
<div class="row choose-language">
    <div class="col-lg-3">
        <form action="<?=\yii\helpers\Url::to(['/admin/faq/sorting']); ?>" name="choose_lang">
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

<?php if(!empty($lang_id) && !empty($faq)): ?>
<div class="row about-block">
    <div class="col-lg-12">
        <form action="<?=\yii\helpers\Url::to(['/admin/faq/sorting-save']); ?>" method="post">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <input type="hidden" name="language_id" value="<?=$lang_id; ?>" />
            <div class="form-group">
                <label for="header"><?= Yii::t('admin', 'FAQ questions sorting order'); ?>:</label>
                <p class="help-block"><?= Yii::t('admin', 'Drag and drop question to change sorting order. Then click to Save button'); ?>.</p>
                <?php
                $items = [];
                $icon = '<span class="glyphicon glyphicon-resize-vertical" aria-hidden="true"></span> ';
                foreach($faq as $item){
                    $items[$item['id']]['content'] = $icon . $item['question'];
                }
                echo SortableInput::widget([
                    'name'=> 'sort_list',
                    'items' => $items,
                    'hideInput' => true,
                    'options' => ['class'=>'form-control', 'readonly'=>true]
                ]);
                ?>
            </div>
            <button type="submit" class="btn btn-success"><?= Yii::t('admin', 'Save'); ?></button>
        </form>
    </div>
</div>
<?php endif; ?>