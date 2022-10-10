<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

$js = <<<JS
    $('select').on('change', function() {
        if(this.value == 1){
            $('#nilai').val(4); //setter
        }else if(this.value == 2){
            $('#nilai').val(3); //setter
        }else if(this.value == 3){
            $('#nilai').val(2); //setter
        }else if(this.value == 4){
            $('#nilai').val(1); //setter
        }else if(this.value == 5){
            $('#nilai').val(0); //setter
        }
    });
JS;
$this->registerJs($js);
?>

<div class="perhitungan-sisa-makan-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-md-9">
            <?=
            $form->field($model, 'id_sisa_makanan')->dropDownList(
                $refSisaMakanan,
                [
                    'prompt' => '-Silahkan Pilih-',
                ]
            )->label('Kategori '); ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'nilai')->textInput([
                // 'readOnly' => 'readOnly',
                'id' => 'nilai',
                'type' => 'number',
                'min' => 0,
                'max' => 4
            ])->label('Nilai') ?>
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