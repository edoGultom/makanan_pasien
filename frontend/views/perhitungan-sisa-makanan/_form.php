<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TaPasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perhitungan-sisa-makan-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-md-8">
            <?=
            $form->field($model, 'id_sisa_makanan')->dropDownList(
                $refSisaMakanan,
            )->label('Kategori '); ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'nilai')->textInput()->label('Nilai') ?>
        </div>
    </div>


    <?php if (!Yii::$app->request->isAjax) { ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>

<!-- 

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <select id="inputState" class="form-control">
            <option selected>Choose...</option>
            <option>...</option>
        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="inputZip">Zip</label>
        <input type="text" class="form-control" id="inputZip">
    </div>
</div> -->