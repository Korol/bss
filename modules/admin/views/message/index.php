<?php
/* @var $this yii\web\View */
/* @var $source_messages app\modules\admin\controllers\MessageController */
/* @var $category app\modules\admin\controllers\MessageController */
/* @var $lang_id app\modules\admin\controllers\MessageController */
/* @var $admin app\modules\admin\controllers\MessageController */
/* @var $messages app\modules\admin\controllers\MessageController */
/* @var $languages app\modules\admin\controllers\MessageController */
/* @var $language_url app\modules\admin\controllers\MessageController */

use yii\helpers\ArrayHelper;

$this->title = Yii::t('admin', 'Translation Messages');
$this->params['breadcrumbs'][] = Yii::t('admin', 'Translation Messages');
$this->params['container'] = 'container';
$categories = [
    'admin' => Yii::t('admin', 'Admin area'),
    'site' => Yii::t('admin', 'Website area'),
];
?>

<div class="row choose-language">
    <div class="col-lg-12">
        <form action="<?=\yii\helpers\Url::to(['/admin/message/index']); ?>" class="form-inline">
            <!--            <input type="hidden" name="_csrf" value="--><?//=Yii::$app->request->getCsrfToken()?><!--" />-->
            <?php if(!empty($admin) && !empty($languages)): ?>
            <div class="form-group">
                <label for="exampleInputName2"><?= Yii::t('admin', 'Language'); ?>:</label>
                <select class="form-control" name="lang_id" id="lang_id">
                    <option value="0"><?= Yii::t('admin', 'Choose language'); ?></option>
                    <?php foreach($languages as $lang): ?>
                        <option value="<?=$lang['id']; ?>" <?=($lang['id'] == $lang_id) ? 'selected="selected"' : ''; ?>><?= $lang['title_en']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="exampleInputName2"><?= Yii::t('admin', 'Category'); ?>:</label>
                <select class="form-control" name="category" id="category">
                    <option value="0"><?= Yii::t('admin', 'Choose area'); ?></option>
                    <?php foreach($categories as $cat_key => $cat_title): ?>
                        <option value="<?=$cat_key; ?>" <?=($cat_key == $category) ? 'selected="selected"' : ''; ?>><?= $cat_title; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success"><?= Yii::t('admin', 'Get messages'); ?></button>
        </form>
    </div>
</div>

<?php if(!empty($source_messages)): ?>
    <div class="row messages-block">
        <div class="col-lg-12">
            <form action="<?=\yii\helpers\Url::to(['/admin/message/save']); ?>" method="post">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <input type="hidden" name="category" value="<?=$category; ?>" />
                <input type="hidden" name="lang_id" value="<?=$lang_id; ?>" />
                <input type="hidden" name="language_url" value="<?=$language_url; ?>" />
                <table class="table table-bordered table-striped">
                    <thead>
                    <th><?= Yii::t('admin', 'Source Message'); ?></th>
                    <th><?= Yii::t('admin', 'Translation'); ?></th>
                    <th><?= Yii::t('admin', 'Source Message'); ?></th>
                    <th><?= Yii::t('admin', 'Translation'); ?></th>
                    </thead>
                    <tbody>
                    <tr>
                    <?php
                    foreach($source_messages as $sm_key => $sm_val){
                        if(($sm_key > 0) && (($sm_key % 2) == 0)){
                            echo '</tr><tr>';
                        }
                    ?>
                        <td><?= $sm_val['message']; ?></td>
                        <td>
                            <input type="text" name="messages[<?=$sm_val['id']; ?>]" value="<?= ArrayHelper::getValue($messages, $sm_val['id'] . '.translation', ''); ?>" class="form-control">
                        </td>
                    <?php
                    }
                    ?>
                    </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success"><?= Yii::t('admin', 'Save'); ?></button>
            </form>
        </div>
    </div>
<?php endif; ?>