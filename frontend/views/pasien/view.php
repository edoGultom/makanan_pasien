<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TaPasien */
?>
<?php if (!Yii::$app->request->isAjax){ ?>
<div class="row">
    <div class="col-md-12">
		<div class="card">
			<div class="card-body">
<?php } ?>
                <div class="ta-pasien-view">
                    <div class="table-responsive">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                                        'id_pasien',
            'nama:ntext',
            'no_rm',
            'tgl_lahir',
            'tgl_audit',
            'waktu_makan',
            'siklus:ntext',
            'jenis_diet:ntext',
            'ruangan:ntext',
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
