<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use kartik\grid\GridView;
use frontend\assets\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PenggunaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title =
    'User';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<!-- <div class="element-wrapper">
    <h6 class="element-header">
            </h6>
    <div class="element-box"> -->
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
                            ['data-pjax' => 1, 'class' => 'btn btn-warning', 'title' => 'Reset Grid']
                        ) .
                            '{toggleData}'
                        // .'{export}'
                    ],
                ],
                'striped' => true,
                'condensed' => true,
                'responsive' => true,
                'panel' => [
                    'before' =>  Html::a(
                        '<i class="fa fa-circle-plus"></i> TAMBAH DATA',
                        ['create'],
                        ['class' => 'btn btn-info font-weight-normal', 'role' => 'modal-remote']
                    ),
                ]
            ]) ?>
        </div>
    </div>
</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>