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
use common\models\TaPasien;
use common\models\TaSisaMakanan;
use common\models\TaSkorMakanan;

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
        $isCetak = TaSkorMakanan::find()->count();
        return $this->render('index', [
            'daftarPasien' => $daftarPasien,
            'refJenisMakanan' => $refJenisMakanan,
            'isCetak' => $isCetak,
        ]);
    }
    public function actionHitungData($id_pasien)
    {
        $request = Yii::$app->request;
        $model = TaSisaMakanan::find()->where(['id_pasien' => $id_pasien])->all();


        $total = 0;
        $jumlahJenisMenu = 4;
        $jumlah = 0;
        foreach ($model as $key => $value) :
            $jumlah += $value->nilai;
            $total += $value->nilai * $value->dikalikan;
        endforeach;
        // echo "<pre>";
        // print_r($total);
        // echo "</pre>";
        // exit();
        // $total = (($total * 100) / ($jumlahJenisMenu * 5));
        $persentasi = ($total / ($jumlahJenisMenu * 5) * 100);

        $TaSkorMakanan = TaSkorMakanan::find()->where(['id_pasien' => $id_pasien])->one();
        if (!isset($TaSkorMakanan)) {
            $TaSkorMakanan = new TaSkorMakanan();
        }
        $TaSkorMakanan->id_pasien = $id_pasien;
        $TaSkorMakanan->jumlah = $jumlah;
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
    public function actionExport()
    {
        $model = TaSkorMakanan::find()->all();
        $filename = 'Data-' . Date('YmdGis') . '-rekap-pasien-.xls';
        header("Content-Disposition: attachment; filename=\".$filename\"");
        header("Cache-Control: max-age=0");
        header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false);

        return $this->renderPartial('cetak_excel', [
            'model' => $model,
        ]);
    }
    public function actionProsesPilih($id_pasien, $id_jenis_makanan)
    {
        $request = Yii::$app->request;
        $model = TaSisaMakanan::find()->where(['id_pasien' => $id_pasien, 'id_jenis_makanan' => $id_jenis_makanan])->one();
        if (!isset($model)) {
            $model = new TaSisaMakanan();
        }
        $model->id_pasien = $id_pasien;
        $model->id_jenis_makanan = $id_jenis_makanan;
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
            } else if ($model->load($request->post())) {

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
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'refSisaMakanan' => $refSisaMakanan,
                ]);
            }
        }
    }
}