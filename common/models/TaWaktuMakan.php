<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ta_waktu_makan".
 *
 * @property int $id
 * @property int|null $id_pasien
 * @property int|null $id_waktu
 * @property string|null $jenis_diet
 * @property string|null $tanggal
 */
class TaWaktuMakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ta_waktu_makan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'id_waktu'], 'integer'],
            [['tanggal'], 'safe'],
            [['jenis_diet'], 'string', 'max' => 255],
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
            'id_waktu' => 'Id Waktu',
            'jenis_diet' => 'Jenis Diet',
            'tanggal' => 'Tanggal',
        ];
    }
    public function getIsWaktuTaSisaMakanan($id_pasien)
    {
        if (TaSisaMakanan::find()->where([
            'id_waktu' => $this->id,
            'id_pasien' => $id_pasien,
        ])->exists()) {
            return true;
        } else {
            return false;
        }
    }
    public function getRefWaktu()
    {
        return $this->hasOne(RefWaktu::className(), ['id' => 'id_waktu']);
    }
    public function getTaSisaMakan()
    {
        return $this->hasMany(TaSisaMakanan::className(), ['id_pasien' => 'id_pasien', 'id_waktu_makan' => 'id']);
    }
}