<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */
?>
<?php if (!Yii::$app->request->isAjax){ ?>
<div class="row">
    <div class="col-md-12">
		<div class="card">
			<div class="card-body">
<?php } ?>
                <div class="user-view">
                    <div class="table-responsive">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                                        'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            'created_at',
            'updated_at',
            'verification_token',
                        ],
                    ]) ?>
                    </div>
                </div>
<?php if (!Yii::$app->request->isAjax){ ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
