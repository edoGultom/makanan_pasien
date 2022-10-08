<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TaPasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ta-pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-md-12">
            <?= $form->field($model, 'nama')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'no_rm')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-8">
            <?= $form->field($model, 'tgl_lahir')->widget(DatePicker::classname(), [
                'options' => [
                    'placeholder' => 'YYYY-MM-DD',
                ],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ])->label('Tanggal Lahir');
            ?>
        </div>
        <div class="col-md-4">
            <?=
            $form->field($model, 'waktu_makan')->dropDownList(
                ['pagi' => 'Pagi', 'siang' => 'Siang', 'malam' => 'Malam'],
            )->label('Nama Dokumen'); ?>
        </div>
        <div class="col-md-8">
            <?= $form->field($model, 'tgl_audit')->widget(DatePicker::classname(), [
                'options' => [
                    'placeholder' => 'YYYY-MM-DD',
                ],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ])->label('Tanggal Audit'); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'jenis_diet')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-8">
            <?= $form->field($model, 'siklus')->textarea(['rows' => 6]) ?>
        </div>

        <div class="col-md-12">
            <?= $form->field($model, 'ruangan')->textarea(['rows' => 6]) ?>
        </div>
    </div>


    <?php if (!Yii::$app->request->isAjax) { ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>