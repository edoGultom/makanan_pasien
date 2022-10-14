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
$js = <<< JS
    $(".filter-dropdown").on("click", ".dropdown-toggle", function(e) { 
        e.preventDefault();
        $(this).parent().addClass("show");
        $(this).attr("aria-expanded", "true");
        $(this).next().addClass("show"); 
      });
JS;
$this->registerJs($js);

CrudAsset::register($this);
?>

<section class="section">
    <div class="section-header">
        <div class="d-flex flex-row justify-content-between align-items-center">
            <div>
                <h1 class="mr-5">
                    <?= $this->title ?>
                </h1>
            </div>
            <div>
                <?= ($isCetak) ?
                    Html::a(
                        'Export Data',
                        ['export'],
                        [
                            'class' => 'btn btn-lg btn-success font-weight-normal',
                            'data-pjax' => 0,
                            'target' => '_blank'
                        ]
                    )
                    : ''
                ?>
            </div>
        </div>

    </div>
</section>

<?php Pjax::begin([
    'id' => 'site-perhitungan',
]); ?>
<div class="row">

    <?php
    foreach ($daftarPasien as $key => $value) :
    ?>
    <div class="col-12 col-sm-12 col-lg-12">

        <div class="card card-warning profile-widget">
            <div class="profile-widget-header">
                <img alt="image" src=" <?= "/img/avatar/avatar-" . rand(1, 5) . ".png" ?>"
                    class="rounded-circle profile-widget-picture">
                <div class="profile-widget-items">
                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">NO. RM</div>
                        <div class="profile-widget-item-value"><?= $value->no_rm ?></div>
                    </div>
                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Ruangan</div>
                        <div class="profile-widget-item-value"><?= $value->ruangan ?></div>
                    </div>

                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Audit</div>
                        <div class="profile-widget-item-value"> <?= Yii::$app->formatter->asDate($value->tgl_audit) ?>
                        </div>
                    </div>
                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Siklus</div>
                        <div class="profile-widget-item-value"><?= $value->siklus ?>
                        </div>
                    </div>
                    <div class="profile-widget-item">
                        <div class="filter-dropdown text-center">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" id="dropdownMenuButton"
                                .<?= $value->id_pasien ?>>-Pilih Waktu-
                            </button>
                            <div class="dropdown-menu">
                                <?php
                                    foreach ($refWaktu as $key => $val) :
                                        $icon = '';
                                        $check = '';
                                        if ($val->id == 1) {
                                            $icon = 'fa fa-cloud-sun';
                                        } else if ($val->id == 2) {
                                            $icon = 'fas fa-sun';
                                        } else if ($val->id == 3) {
                                            $icon = 'fa fa-cloud-moon';
                                        }
                                        if ($val->waktuMakan != null) {
                                            $check = '<i class="fas fa-check text-success"></i>';
                                        }
                                    ?>
                                <?= Html::a(
                                            $check . ' <i class="' . $icon . '"></i> ' .  $val->nama . '',
                                            ['proses-pilih-waktu', 'id_pasien' => $value->id_pasien, 'id_waktu' => $val->id],
                                            [
                                                'class' => 'dropdown-item has-icon font-weight-normal',
                                                'role' => 'modal-remote',
                                            ]
                                        ) ?>
                                <?php
                                    endforeach;
                                    ?>
                            </div>
                        </div>
                    </div>

                    <div class="profile-widget-item">
                        <?= ($value->isPasien) ? Html::a(
                                '<i class="fas fa-calculator"></i> Hitung Skor',
                                ['hitung-data', 'id_pasien' => $value->id_pasien],
                                [
                                    'class' => 'btn btn-outline-success font-weight-normal',
                                    'role' => 'modal-remote',
                                    'data-confirm' => false, 'data-method' => false, // for overide yii data api
                                    'data-request-method' => 'post',
                                    'data-toggle' => 'tooltip',
                                    'data-confirm-title' => 'Peringatan',
                                    'data-confirm-message' => 'Apakah anda yakin ingin memproses data pasien ini ???'
                                ]
                            )  : '<span class="label label-danger"> - </span>' ?>
                    </div>

                </div>
            </div>

            <div class="profile-widget-description pb-0">
                <div class="profile-widget-name"><?= $value->nama ?><div class="text-muted d-inline font-weight-normal">
                        <div class="slash"></div>
                        <?= Yii::$app->formatter->asDate($value->tgl_lahir) ?>
                    </div>

                    <p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                            data-target="#collapseExample-<?= $value->id_pasien ?>" aria-expanded="false"
                            aria-controls="collapseExample-<?= $value->id_pasien ?>">
                            Lihat Detail
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample-<?= $value->id_pasien ?>">
                        <div class="summary">
                            <!-- <div class="summary-info">
                            <h4>$1,053</h4>
                            <div class="text-muted">Sold 3 items on 2 customers</div>
                            <div class="d-block mt-2">
                                <a href="#">View All</a>
                            </div>
                            </div> -->
                            <div class="summary-item">
                                <h6>Item List <span class="text-muted">(<?= count($taWaktuMakan) ?> Items)</span></h6>
                                <ul class="list-unstyled list-unstyled-border">
                                    <?php
                                        foreach ($taWaktuMakan as $key => $waktu) :

                                        ?>
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-right">SKOR</div>
                                            <div class="media-title">
                                                <?= $waktu->refWaktu->nama ?>
                                            </div>
                                            <div class="text-muted text-small">
                                                Jenis Diet
                                                <div class="bullet"></div> <?= $waktu->jenis_diet ?>

                                                <div class="filter-dropdown">
                                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" id="dropdownMenuWaktuButton"
                                                        .<?= $waktu->id ?>>-Pilih Jenis Makanan-
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
                                                                    if ($val->getIsDataTaSisaMakanan($value->id_pasien, $waktu->id_waktu) != null) {
                                                                        $check = '<i class="fas fa-check text-success"></i>';
                                                                    }
                                                                ?>
                                                        <?= Html::a(
                                                                        $check . ' <i class="' . $icon . '"></i> ' . $val->kode . '-' . $val->nama . '',
                                                                        ['proses-pilih-makanan', 'id_pasien' => $value->id_pasien, 'id_waktu' => $waktu->id_waktu, 'id_jenis_makanan' => $val->id],
                                                                        [
                                                                            'class' => 'dropdown-item has-icon font-weight-normal',
                                                                            'role' => 'modal-remote',
                                                                        ]
                                                                    ) ?>
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
                </div>
            </div>
        </div>

    </div>
    <?php
    endforeach;
    ?>

</div>
<?php Pjax::end(); ?>

<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>