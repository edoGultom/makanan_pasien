<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ta_sisa_makanan".
 *
 * @property int $id
 * @property int|null $id_pasien
 * @property int|null $id_jenis_makanan
 * @property int|null $id_sisa_makanan
 * @property int|null $nilai
 * @property int|null $dikalikan
 */
class TaSisaMakanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ta_sisa_makanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'id_jenis_makanan', 'id_sisa_makanan', 'nilai', 'dikalikan'], 'integer'],
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
            'id_jenis_makanan' => 'Id Jenis Makanan',
            'id_sisa_makanan' => 'Id Sisa Makanan',
            'nilai' => 'Nilai',
            'dikalikan' => 'Dikalikan',
        ];
    }
    public function getJenisMakanan()
    {
        return $this->hasOne(RefJenisMakanan::className(), ['id' => 'id_jenis_makanan']);
    }
    public function getSisaMakanan()
    {
        return $this->hasOne(RefSisaMakanan::className(), ['id' => 'id_sisa_makanan']);
    }
}