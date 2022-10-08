<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
?>

<div class="row">
    <div class="col-md-12">
		<div class="card">
			<div class="card-body">
                <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-update">

                    <?= "<?= " ?>$this->render('_form', [
                        'model' => $model,
                    ]) ?>

                </div>
             </div>
        </div>
    </div>
</div>
