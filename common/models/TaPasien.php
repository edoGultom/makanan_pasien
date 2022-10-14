<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ta_pasien".
 *
 * @property int $id_pasien
 * @property string|null $nama
 * @property string|null $no_rm
 * @property string|null $tgl_lahir
 * @property string|null $tgl_audit
 * @property string|null $siklus
 * @property string|null $ruangan
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
            [['nama', 'siklus', 'ruangan'], 'string'],
            [['tgl_lahir', 'tgl_audit'], 'safe'],
            [['no_rm'], 'string', 'max' => 25],
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
            'no_rm' => 'No Rm',
            'tgl_lahir' => 'Tgl Lahir',
            'tgl_audit' => 'Tgl Audit',
            'siklus' => 'Siklus',
            'ruangan' => 'Ruangan',
        ];
    }
    public function getIsPasien()
    {
        $model = TaSisaMakanan::find()->where(['id_pasien' => $this->id_pasien])->count();
        if ($model >= 4) {
            return true;
        }
        return false;
    }
    public function getTaSisaMakanan()
    {
        return $this->hasMany(TaSisaMakanan::className(), ['id_pasien' => 'id_pasien']);
    }
}