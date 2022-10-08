<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ta_pasien".
 *
 * @property int $id_pasien
 * @property string|null $nama
 * @property int|null $skor_sisa_makanan
 * @property string|null $keterangan
 */
class TaPasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ta_pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'string'],
            [['skor_sisa_makanan'], 'integer'],
            [['keterangan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pasien' => 'Id Pasien',
            'nama' => 'Nama',
            'skor_sisa_makanan' => 'Skor Sisa Makanan',
            'keterangan' => 'Keterangan',
        ];
    }
}
