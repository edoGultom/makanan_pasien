<p align="right">Tanggal : <?php echo Yii::$app->formatter->asDate('now', 'php:d mm Y') ?></p><br />

<?php
$no = 1;
?>
<table border="1" class="table table-bordered" cellspacing="0" cellpadding="10">
    <thead style="background-color:#D2D0D0;">
        <tr>
            <td>ID PASIEN</td>
            <td>NAMA</td>
            <td>SKOR SISA MAKANAN</td>
            <td>KETERANGAN</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($model as $data) {

        ?>
        <tr>
            <td><?= $data->id_pasien ?></td>
            <td><?= ($data->pasien) ? $data->pasien->nama  : '' ?></td>
            <td><?= $data->persentasi_skor . ' % ' ?></td>
            <td><?= $data->keterangan_skor ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>