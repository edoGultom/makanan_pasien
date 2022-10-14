<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

?>

<div class="perhitungan-sisa-makan-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <h4>Masukkan Jenis Diet Pasien</h4>
        <p class="ml-2 h4 text-success"> <?= Yii::$app->pengguna->getPasien($id_pasien)->nama ?></p>
        <div class="col-md-12">
            <?= $form->field($model, 'jenis_diet')->textInput([
                'id' => 'nilai',
            ])->label('Jenis Diet') ?>
        </div>
    </div>


    <?php if (!Yii::$app->request->isAjax) { ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>