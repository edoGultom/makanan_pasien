<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ref_jenis_makanan".
 *
 * @property int $id
 * @property string|null $kode
 * @property string|null $nama
 */
class RefJenisMakanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_jenis_makanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'string'],
            [['kode'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'nama' => 'Nama',
        ];
    }
    public function getIsDataTaSisaMakanan($id_pasien, $id_waktu)
    {
        if (TaSisaMakanan::find()->where([
            'id_jenis_makanan' => $this->id,
            'id_pasien' => $id_pasien,
            'id_waktu' => $id_waktu
        ])->exists()) {
            return true;
        } else {
            return false;
        }
        // return $this->hasOne(TaSisaMakanan::className(), ['id_jenis_makanan' => 'id'])->andOnCondition(['id_pasien' => $id_pasien]);
    }
}