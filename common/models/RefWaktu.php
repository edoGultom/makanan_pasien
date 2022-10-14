<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ref_waktu".
 *
 * @property int $id
 * @property string|null $nama
 */
class RefWaktu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_waktu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }
    public function getWaktuMakan()
    {
        return $this->hasOne(TaWaktuMakan::className(), ['id_waktu' => 'id']);
    }
}