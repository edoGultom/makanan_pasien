<?php

use yii\helpers\Url;
use yii\helpers\Html;

return [
    //[
    //'class' => 'kartik\grid\CheckboxColumn',
    //'width' => '20px',
    //],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'header' => 'ID',
        'attribute' => 'id_pasien',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'header' => 'NAMA',
        'attribute' => 'nama',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'header' => 'SKOR',
        'attribute' => 'skor_sisa_makanan',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'header' => 'KETERANGAN',
        'attribute' => 'keterangan',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => 'Aksi',
        'template' => '{hapus}',
        'buttons' => [
            "hapus" => function ($url, $model, $key) {
                return Htm::a(
                    'Menilai',
                    ['menilai', 'id' => $model->id],
                    [
                        'class' => 'btn btn-info btn-block block-button',
                        'role' => 'modal-remote', 'title' => 'Menilai',
                        'data-toggle' => 'tooltip',
                        'data-confirm' => false,
                        'data-method' => false,
                        'data-request-method' => 'post',
                        'data-toggle' => 'tooltip',
                        'data-confirm-title' => 'Yakin Ingin Menilai Instruksi?',
                        'data-confirm-message' => 'Yakin Ingin Menilai Instruksi Ini'
                    ]
                );
            },
        ],
        'vAlign' => 'middle',
    ],

];