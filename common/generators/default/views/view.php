<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
?>
<?='<?php if (!Yii::$app->request->isAjax){ ?>'."\n"?>
<div class="row">
    <div class="col-md-12">
		<div class="card">
			<div class="card-body">
<?="<?php } ?>\n"?>
                <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">
                    <div class="table-responsive">
                    <?= "<?= " ?>DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            <?php
                            if (($tableSchema = $generator->getTableSchema()) === false) {
                                foreach ($generator->getColumnNames() as $name) {
                                    echo "            '" . $name . "',\n";
                                }
                            } else {
                                foreach ($generator->getTableSchema()->columns as $column) {
                                    $format = $generator->generateColumnFormat($column);
                                    echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                                }
                            }
                            ?>
                        ],
                    ]) ?>
                    </div>
                </div>
<?='<?php if (!Yii::$app->request->isAjax){ ?>'."\n"?>
            </div>
        </div>
    </div>
</div>
<?="<?php } ?>\n"?>