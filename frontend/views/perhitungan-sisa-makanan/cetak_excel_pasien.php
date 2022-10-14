<p align="right">Tanggal : <?php echo Yii::$app->formatter->asDate('now', 'php:d mm Y') ?></p><br />

<?php
$no = 1;
?>
<table border="1" class="table table-bordered" cellspacing="0" cellpadding="10">
    <thead style="background-color:#D2D0D0;">
        <tr>
            <td>NAMA PASIEN</td>
            <td>NO RM</td>
            <td>TANGGAL LAHIR</td>
            <td>TANGGAL</td>
            <td>WAKTU MAKAN</td>
            <td>SIKLUS</td>
            <td>JENIS DIET</td>
            <td>RUANGAN</td>
            <td>SKOR SISA MAKAN</td>
            <td>KATEGORI</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($model as $data) {

        ?>
        <tr>
            <td><?= $data->pasien->nama ?></td>
            <td><?= $data->pasien->no_rm ?></td>
            <td><?= Yii::$app->formatter->asDate($data->pasien->tgl_lahir) ?></td>
            <td><?= Yii::$app->formatter->asDate($data->tanggal) ?></td>
            <td><?= $data->refWaktu->nama ?></td>
            <td><?= $data->pasien->siklus ?></td>
            <td><?= $data->jenis_diet ?></td>
            <td><?= $data->pasien->ruangan ?></td>
            <td><?= ($data->taSkorMakanPasien) ? $data->taSkorMakanPasien->persentasi_skor . ' % '  : '' ?></td>
            <td><?= ($data->taSkorMakanPasien) ? $data->taSkorMakanPasien->keterangan_skor : ''  ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>