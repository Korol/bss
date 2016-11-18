<!-- Subscribe Modal -->
<div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="subscribeModalLabel">
    <div class="modal-dialog" role="document">
        <form method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="subscribeModalLabel"><?= Yii::t('site', 'Subscription to the newsletter'); ?></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="subscribe_name">Name:</label>
                        <input type="text" class="form-control" id="subscribe_name" name="subscribe_name" placeholder="Your name">
                    </div>
                    <div class="form-group">
                        <label for="subscribe_email">Email address:</label>
                        <input type="email" class="form-control" id="subscribe_email" name="subscribe_email" placeholder="Your Email">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?= Yii::t('site', 'Close'); ?></button>
                    <button type="submit" class="btn btn-primary"><?= Yii::t('site', 'Subscribe'); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /Subscribe Modal -->