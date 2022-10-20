<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use frontend\models\PenggunaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use common\models\RefJenisMakanan;
use common\models\RefSisaMakanan;
use common\models\RefWaktu;
use common\models\TaPasien;
use common\models\TaSisaMakanan;
use common\models\TaSkorMakanan;
use common\models\TaWaktuMakan;

/**
 * PenggunaController implements the CRUD actions for User model.
 */
class PerhitunganSisaMakananController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulkdelete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $daftarPasien = TaPasien::find()->all();
        $refJenisMakanan = RefJenisMakanan::find()->all();
        $refWaktu = RefWaktu::find()->all();
        $isCetak = TaSkorMakanan::find()->count();
        return $this->render('index', [
            'daftarPasien' => $daftarPasien,
            'refJenisMakanan' => $refJenisMakanan,
            'refWaktu' => $refWaktu,
            'isCetak' => $isCetak,
        ]);
    }
    public function actionHitungData($id_pasien, $id_waktu_makan)
    {
        $request = Yii::$app->request;
        $model = TaSisaMakanan::find()->where(['id_pasien' => $id_pasien, 'id_waktu_makan' => $id_waktu_makan])->all();

        $total = 0;
        $jumlahJenisMenu = 4;
        $jumlah = 0;
        foreach ($model as $key => $value) :
            $jumlah += $value->nilai;
            $total += $value->nilai * $value->dikalikan;
        endforeach;

        $persentasi = ($total / ($jumlahJenisMenu * 5) * 100);

        // $TaSkorMakanan = TaSkorMakanan::find()->where(['id_pasien' => $id_pasien])->one();
        // if (!isset($TaSkorMakanan)) {
        $TaSkorMakanan = new TaSkorMakanan();
        // }
        $TaSkorMakanan->id_pasien = $id_pasien;
        $TaSkorMakanan->jumlah = $jumlah;
        $TaSkorMakanan->id_waktu_makan = $id_waktu_makan;
        $TaSkorMakanan->persentasi_skor = $persentasi;
        $TaSkorMakanan->keterangan_skor = ($persentasi > 20) ? 'Bersisa' : 'Tidak Bersisa';
        $TaSkorMakanan->save();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#site-perhitungan'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }
    public function actionExportAll()
    {
        $model = TaWaktuMakan::find()->orderBy([
            'id_pasien' => SORT_ASC
        ])->all();
        $filename = 'Data-' . Date('YmdGis') . '-rekap-pasien-.xls';
        header("Content-Disposition: attachment; filename=\".$filename\"");
        header("Cache-Control: max-age=0");
        header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false);

        return $this->renderPartial('cetak_excel_all', [
            'model' => $model,
        ]);
    }
    public function actionExportPasien($id_pasien)
    {
        $model = TaWaktuMakan::find()->where(['id_pasien' => $id_pasien])->all();
        $filename = 'Data-' . Date('YmdGis') . '-rekap-pasien-.xls';
        header("Content-Disposition: attachment; filename=\".$filename\"");
        header("Cache-Control: max-age=0");
        header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false);

        return $this->renderPartial('cetak_excel_pasien', [
            'model' => $model,
        ]);
    }
    public function actionProsesPilihMakanan($id_pasien, $id_waktu_makan, $id_jenis_makanan)
    {
        $request = Yii::$app->request;
        $model = TaSisaMakanan::find()->where(['id_pasien' => $id_pasien, 'id_jenis_makanan' => $id_jenis_makanan, 'id_waktu_makan' => $id_waktu_makan])->one();
        if (!isset($model)) {
            $model = new TaSisaMakanan();
        }
        $model->id_pasien = $id_pasien;
        $model->id_jenis_makanan = $id_jenis_makanan;
        $model->id_waktu_makan = $id_waktu_makan;

        $refSisaMakanan =  ArrayHelper::map(RefSisaMakanan::find()->all(), 'id', 'keterangan');

        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => " ",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                        'refSisaMakanan' => $refSisaMakanan,
                    ]),
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Simpan', [
                            'class' => 'btn btn-primary', 'type' => "submit",
                        ])

                ];
            } else if ($model->load($request->post()) && $model->validate()) {

                if ($model->id_sisa_makanan == 1) {
                    $model->dikalikan = 0;
                } else if ($model->id_sisa_makanan == 2) {
                    $model->dikalikan = 1;
                } else if ($model->id_sisa_makanan == 3) {
                    $model->dikalikan = 2;
                } else if ($model->id_sisa_makanan == 4) {
                    $model->dikalikan = 3;
                } else if ($model->id_sisa_makanan == 5) {
                    $model->dikalikan = 4;
                }
                if ($model->save(false)) {
                    // return $this->redirect('index');
                    return ['forceClose' => true, 'forceReload' => '#site-perhitungan'];
                    // return $this->redirect(['index']);
                }
            } else {
                return [
                    'title' => " ",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                        'refSisaMakanan' => $refSisaMakanan,

                    ]),
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Simpan', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->validate()) {
                if ($model->id_sisa_makanan == 1) {
                    $model->dikalikan = 0;
                } else if ($model->id_sisa_makanan == 2) {
                    $model->dikalikan = 1;
                } else if ($model->id_sisa_makanan == 3) {
                    $model->dikalikan = 2;
                } else if ($model->id_sisa_makanan == 4) {
                    $model->dikalikan = 3;
                } else if ($model->id_sisa_makanan == 5) {
                    $model->dikalikan = 4;
                }
                if ($model->save(false)) {
                    return $this->redirect(['index']);
                }
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'refSisaMakanan' => $refSisaMakanan,
                ]);
            }
        }
    }
    public function actionProsesPilihWaktu($id_pasien, $id_waktu)
    {
        $request = Yii::$app->request;
        $model = TaWaktuMakan::find()->where(['id_pasien' => $id_pasien, 'id_waktu' => $id_waktu])->one();
        if (!isset($model)) {
            $model = new TaWaktuMakan();
        }
        $model->id_pasien = $id_pasien;
        $model->id_waktu = $id_waktu;
        $model->tanggal = Yii::$app->formatter->asDate('now', 'php:Y-m-d');

        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => " ",
                    'content' => $this->renderAjax('_form_jenis_diet', [
                        'model' => $model,
                        'id_pasien' => $id_pasien,
                    ]),
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Simpan', [
                            'class' => 'btn btn-primary', 'type' => "submit",
                        ])

                ];
            } else if ($model->load($request->post())) {

                if ($model->save(false)) {
                    return ['forceClose' => true, 'forceReload' => '#site-perhitungan'];
                    // return $this->redirect(['index']);
                }
            } else {
                return [
                    'title' => " ",
                    'content' => $this->renderAjax('create', [
                        'id_pasien' => $id_pasien,
                        'model' => $model,

                    ]),
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Simpan', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            }
        }
    }
}