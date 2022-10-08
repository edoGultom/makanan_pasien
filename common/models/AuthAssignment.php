<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property int $created_at
 */
class AuthAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'auth_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['created_at'], 'default', 'value' => null],
            [['created_at'], 'integer'],
            [['item_name', 'user_id'], 'string', 'max' => 64],
            [['item_name', 'user_id'], 'unique', 'targetAttribute' => ['item_name', 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_name' => 'Item Name',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    public function getJlhUser()
    {
        $model = AuthAssignment::find()->where(['=', 'item_name', $this->item_name])->andWhere(['!=', 'user_id', 1])->count();
        return $model;
        // return $this->hasMany(User::className(), ['id' => 'user_id'])->count();
    }
    public function getUserPegawai()
    {
        $model = User::find()->where(['=', 'id', (int)$this->user_id])->one();
        return $model;
    }
}