<?php

namespace common\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $nip;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Username ini sudah digunakan.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'E-mail ini sudah digunakan, harap menggunakan email lain.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['nip', 'string', 'min' => 2, 'max' => 255],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        // var_dump($this->nip);exit;
        // if (!$this->validate()) {
        //     // return $this->errors; //menampilkan error validate input
        //     return null;
        // }
        $model_datautama = DataUtama::find()->where(['nip_baru' => $this->nip])->one();

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        // $user->generateEmailVerificationToken();
        // return $user->save() && $this->sendEmail($user);
        $user->nip = $model_datautama->nip_baru;
        $user->id_orang = $model_datautama->id;
        // $user->opd_id = $model_datautama->unor;
        $user->opd_cepat_kode = $model_datautama->cepat_kode;
        $user->status = 10;
        // $user->opd_cabdis_id = $model_datautama->opd_id;
        // $user->opd_cabdis_cepat_kode = $model_datautama->opd_id;
        // echo "<pre>", var_dump($user) ,"</pre>";exit;
        if ($user->save()) {
            return $user;
        }
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}