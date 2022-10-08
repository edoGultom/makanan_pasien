<?php

use yii\helpers\Url;

?>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">APP PASIEN</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>PASIEN</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= Url::to(['/pasien']); ?>">Data Pasien</a></li>
                    <li class="active"><a class="nav-link" href="index.html">Perhitungan Sisa Makanan</a></li>
                </ul>
            </li>

        </ul>
    </aside>
</div>