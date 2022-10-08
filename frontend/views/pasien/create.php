<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TaPasien */

?>
<div class="row">
    <div class="col-md-12">
		<div class="card">
			<div class="card-body">
                <div class="ta-pasien-create">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
