<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ta_skor_makanan".
 *
 * @property int $id
 * @property int|null $id_pasien
 * @property int|null $jumlah
 * @property float|null $persentasi_skor
 * @property string|null $keterangan_skor
 */
class TaSkorMakanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ta_skor_makanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'id_waktu_makan', 'jumlah'], 'integer'],
            [['persentasi_skor'], 'number'],
            [['keterangan_skor'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pasien' => 'Id Pasien',
            'jumlah' => 'Jumlah',
            'persentasi_skor' => 'Persentasi Skor',
            'keterangan_skor' => 'Keterangan Skor',
            'id_waktu_makan' => 'id Waktu Makan'
        ];
    }
    public function getPasien()
    {
        return $this->hasOne(TaPasien::className(), ['id_pasien' => 'id_pasien']);
    }
}