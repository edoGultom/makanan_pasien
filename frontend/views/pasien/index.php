<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use kartik\grid\GridView;
use frontend\assets\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PasienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title =
    ' Data Pasien';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<!-- <div class="element-wrapper">
    <h6 class="element-header">
            </h6>
    <div class="element-box"> -->
<section class="section">
    <div class="section-header ">
        <h1 class="mr-5">
            <?= $this->title ?>

        </h1>
        <div>
            <?= Html::a(
                '<i class="fa fa-circle-plus"></i> Tambah Data',
                ['create'],
                ['class' => 'btn btn-success font-weight-normal', 'role' => 'modal-remote']
            ) ?>
        </div>

    </div>
</section>
<div class="row">
    <div class="col-md-12">
        <div id="ajaxCrudDatatable">
            <div id="table-responsive">
                <?= GridView::widget([
                    'id' => 'crud-datatable',
                    'pager' => [
                        'firstPageLabel' => 'Awal',
                        'lastPageLabel' => 'Akhir'
                    ],
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'pjax' => true,
                    'columns' => require(__DIR__ . '/_columns.php'),
                    'toolbar' => [
                        [
                            'content' =>
                            Html::a(
                                '<i class="fa fa-repeat"></i> ',
                                [''],
                                ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']
                            ) .
                                '{toggleData}'
                            // .'{export}'
                        ],
                    ],
                    'striped' => true,
                    'condensed' => true,
                    'responsive' => true,
                    'panel' => [
                        'before' => "",
                    ]
                ]) ?>
            </div>
        </div>
    </div>
</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>