<?= $this->extend('layouts/dashboard/layout'); ?>

<?= $this->section('content'); ?>

<div class="pagetitle">
    <h1>Data Pelanggan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Data Pelanggan</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col">
            <div class="card">
                <p>data pelanggan</p>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>