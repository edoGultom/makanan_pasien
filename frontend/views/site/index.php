<?php

use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Url;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Ecommerce Dashboard &mdash; Stisla</title>
</head>

<body>

    <!-- Main Content -->
    <div class="col-12 mb-4">
        <div class="hero text-white hero-bg-image hero-bg-parallax"
            data-background="/img/unsplash/andre-benz-1214056-unsplash.jpg">
            <div class="hero-inner">
                <h2>Welcome, <?= Yii::$app->user->identity->username ?>!</h2>
                <p class="lead">You almost arrived, complete the information about your patient .</p>
                <div class="mt-4">
                    <a href="<?= Url::to(['./pasien']); ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i
                            class="far fa-user"></i>
                        Next </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>