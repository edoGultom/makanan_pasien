<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ref_sisa_makanan".
 *
 * @property int $id
 * @property string|null $keterangan
 */
class RefSisaMakanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_sisa_makanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['keterangan'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keterangan' => 'Keterangan',
        ];
    }
}
