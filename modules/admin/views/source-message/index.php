<?php
/* @var $this yii\web\View */
/* @var $source_messages app\modules\admin\controllers\SourceMessageController */
/* @var $category app\modules\admin\controllers\SourceMessageController */

$this->title = Yii::t('admin', 'Source Messages');
$this->params['breadcrumbs'][] = Yii::t('admin', 'Source Messages');
$this->params['container'] = 'container';

$categories = [
    'admin' => Yii::t('admin', 'Admin area'),
    'site' => Yii::t('admin', 'Website area'),
];
?>

<div class="row choose-language">
    <div class="col-lg-3">
        <form action="<?=\yii\helpers\Url::to(['/admin/source-message/index']); ?>" name="choose_cat">
            <!--            <input type="hidden" name="_csrf" value="--><?//=Yii::$app->request->getCsrfToken()?><!--" />-->
            <select class="form-control" name="category" id="category" onchange="document.choose_cat.submit();">
                <option value="0"><?= Yii::t('admin', 'Choose area'); ?></option>
                <?php foreach($categories as $cat_key => $cat_title): ?>
                    <option value="<?=$cat_key; ?>" <?=($cat_key == $category) ? 'selected="selected"' : ''; ?>><?= $cat_title; ?></option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>
</div>

<?php if(!empty($source_messages)): ?>
    <div class="row about-block">
        <div class="col-lg-12">
            <form action="<?=\yii\helpers\Url::to(['/admin/source-message/save']); ?>" method="post">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <input type="hidden" name="category" value="<?=$category; ?>" />

                <table class="table table-bordered table-striped">
                    <thead>
                    <th><?= Yii::t('admin', 'Source Message'); ?></th>
                    <th><?= Yii::t('admin', 'Source Message'); ?></th>
                    </thead>
                    <tbody>
                    <tr>
                    <?php
                    foreach($source_messages as $sm_key => $sm_val){
                        if(($sm_key > 0) && (($sm_key % 2) == 0)){
                            echo '</tr><tr>';
                        }
                    ?>
                        <td>
<!--                            <input type="text" name="messages[--><?//=$sm_val['id']; ?><!--]" value="--><?//=$sm_val['message']; ?><!--" class="form-control">-->
<!--                            <a class="btn btn-danger" href="--><?//=\yii\helpers\Url::to(['/admin/source-message/delete?id=' . $sm_val['id'] . '&category=' . $category]); ?><!--">--><?//= Yii::t('admin', 'Delete'); ?><!--</a>-->
                            <div class="input-group">
                                <input type="text" name="messages[<?=$sm_val['id']; ?>]" value="<?=$sm_val['message']; ?>" class="form-control">
                                <span class="input-group-btn">
                                    <a class="btn btn-danger" href="<?=\yii\helpers\Url::to(['/admin/source-message/delete?id=' . $sm_val['id'] . '&category=' . $category]); ?>" onclick="confirm('<?=Yii::t('admin', 'Are you sure you want to delete this item?'); ?>')"><?= Yii::t('admin', 'Delete'); ?></a>
                                </span>
                            </div>
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