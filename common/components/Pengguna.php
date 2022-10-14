<?php

namespace common\components;

use common\models\TaPasien;
use Yii;
use yii\base\Component;
use \yii\web\Response;

class Pengguna extends Component
{

    public function getPasien($id_pasien)
    {

        $model = TaPasien::findOne(['id_pasien' => $id_pasien]);
        return $model;
    }
}