<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use kartik\grid\GridView;
// use frontend\assets\CrudAsset;
// use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\CrudAsset;
use yii\widgets\Pjax;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PasienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title =
    'Perhitungan Sisa Makanan';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<section class="section">
    <div class="section-header ">
        <h1 class="mr-5">
            <?= $this->title ?>
        </h1>
    </div>
</section>
<?php Pjax::begin([
    'id' => 'site-perhitungan',
]); ?>

<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Pasien</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                    <?php
                    foreach ($daftarPasien as $key => $value) :
                    ?>
                    <li class="media d-flex justify-content-center align-items-center">
                        <img alt="image" class="mr-3 rounded-circle" width="50" src="/img/avatar/avatar-1.png">
                        <div class="media-body">
                            <div class="media-title"><?= $value->nama ?></div>
                            <div class="text-job text-muted">Lahir -
                                <?= Yii::$app->formatter->asDate($value->tgl_lahir) ?></div>
                        </div>
                        <div class="media-cta">
                            <div class="text-job text-muted">NO RM - <?= $value->no_rm ?></div>

                        </div>

                        <div class="media-cta">
                            <div class="text-job text-muted">Audit -
                                <?= Yii::$app->formatter->asDate($value->tgl_audit) ?></div>
                        </div>
                        <div class="media-cta">
                            <div class="text-job text-muted">Makan - <?= $value->waktu_makan ?></div>
                        </div>
                        <div class="media-cta">
                            <div class="text-job text-muted">Siklus - <?= $value->siklus ?></div>
                        </div>
                        <div class="media-cta">
                            <div class="text-job text-muted">Diet - <?= $value->jenis_diet ?></div>
                        </div>
                        <div class="media-cta">

                            <div class="dropdown d-inline">
                                <button class="btn btn-outline-info dropdown-toggle" type="button"
                                    id="dropdownMenuButton" .<?= $value->id_pasien ?> data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Pilih Jenis Makanan
                                </button>
                                <div class="dropdown-menu">
                                    <?php
                                        foreach ($refJenisMakanan as $key => $val) :
                                            $icon = '';
                                            $check = '';
                                            if ($val->kode == 'MP') {
                                                $icon = 'fas fa-plate-wheat';
                                            } else if ($val->kode == 'LH') {
                                                $icon = 'fas fa-shrimp';
                                            } else if ($val->kode == 'S') {
                                                $icon = 'fas fa-solid fa-leaf';
                                            } else if ($val->kode == 'LN') {
                                                $icon = 'fas fa-burger';
                                            }
                                            if ($val->getIsDataTaSisaMakanan($value->id_pasien) != null) {
                                                $check = '<i class="fas fa-check text-success"></i>';
                                            }
                                        ?>
                                    <!-- <i class="fas fa-check"> -->
                                    <?= Html::a(
                                                $check . ' <i class="' . $icon . '"></i> ' . $val->kode . '-' . $val->nama . '',
                                                ['proses-pilih', 'id_pasien' => $value->id_pasien, 'id_jenis_makanan' => $val->id],
                                                [
                                                    'class' => 'dropdown-item has-icon font-weight-normal',
                                                    'role' => 'modal-remote',
                                                ]
                                            ) ?>
                                    <!-- <a class="dropdown-item has-icon" href="#"> <i class="<?= $icon ?>"></i>
                                        <?= $val->kode . '-' . $val->nama ?></a> -->
                                    <?php
                                        endforeach;
                                        ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                    endforeach;
                    ?>

                </ul>
            </div>
        </div>

    </div>

    <?php Pjax::end(); ?>

    <?php Modal::begin([
        "id" => "ajaxCrudModal",
        "footer" => "", // always need it for jquery plugin
    ]) ?>
    <?php Modal::end(); ?>