<?php

use yii\helpers\Url;

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
        'header' => 'NO. RM',
        'attribute' => 'no_rm',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'header' => 'TGL. LAHIR',
        'attribute' => 'tgl_lahir',
        'value' => function ($model) {
            return Yii::$app->formatter->asDate($model->tgl_lahir);
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'header' => 'TGL. AUDIT',
        'attribute' => 'tgl_audit',
        'value' => function ($model) {
            return Yii::$app->formatter->asDate($model->tgl_audit);
        }
    ],

    [
        'class' => '\kartik\grid\DataColumn',
        'header' => 'SIKLUS',
        'attribute' => 'siklus',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'header' => 'RUANGAN',
        'attribute' => 'ruangan',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $model->id_pasien]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'Lihat', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Ubah', 'data-toggle' => 'tooltip'],
        'deleteOptions' => [
            'role' => 'modal-remote', 'title' => 'Hapus',
            'data-confirm' => false, 'data-method' => false, // for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Peringatan',
            'data-confirm-message' => 'Apakah anda yakin ingin menghapus data ini?'
        ],
    ],

];