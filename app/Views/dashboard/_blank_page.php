<?= $this->extend('layouts/dashboard/layout'); ?>

<?= $this->section('content'); ?>

<div class="pagetitle">
    <h1>Page</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Page</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col">
            <div class="card">
                <p>Page</p>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>