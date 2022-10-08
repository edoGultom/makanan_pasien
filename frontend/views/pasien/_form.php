<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TaPasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ta-pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'skor_sisa_makanan')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
