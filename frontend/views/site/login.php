<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\Html;
// use yii\bootstrap4\ActiveForm;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
$username =  json_encode(substr(strrchr(get_class($model), '\\'), 1) . '[username]');
$password =  json_encode(substr(strrchr(get_class($model), '\\'), 1) . '[password]');

?>
<div class="d-flex flex-wrap align-items-stretch">
    <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
        <div class="p-4 m-3">
            <!-- <img src="/img/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2"> -->
            <h4 class="text-dark font-weight-normal">Welcomes to <span class="font-weight-bold">App</span></h4>
            <p class="text-muted">Sebelum kamu memulai, kamu harus login atau register ijika kamu belum mempunyai akun.
            </p>

            <!-- <form method="POST" action="#" class="needs-validation" novalidate=""> -->
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'pt-3', 'enctype' => 'multipart/form-data']
            ]); ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" class="form-control" name=<?= $username ?> tabindex="1" required
                    autofocus>
                <div class="invalid-feedback">
                    Silahkan masukkan username!
                </div>
            </div>

            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name=<?= $password ?> tabindex="2" required>
                <div class="invalid-feedback">
                    Silahkan masukkan password!
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                </div>
            </div>

            <div class="form-group text-right">
                <!-- <a href="auth-forgot-password.html" class="float-left mt-3">
                    Forgot Password?
                </a> -->
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                    <i class="fas fa-right-to-bracket"></i> Masuk
                </button>
            </div>

            <!-- </form> -->
            <?php ActiveForm::end(); ?>



        </div>
    </div>
    <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
        data-background="/img/unsplash/login-bg.jpg">
        <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
                <div class="mb-5 pb-3">
                    <h1 class="mb-2 display-4 font-weight-bold">E - Monev Unit Gizi</h1>
                    <h5 class="font-weight-normal text-muted-transparent">
                </div>

            </div>
        </div>
    </div>
</div>