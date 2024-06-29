<?= $this->extend('layouts/landing_page/layout'); ?>

<?= $this->section('content'); ?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title">
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="/">Beranda</a></li>
                    <li class="current">Login</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Register</h2>

            <div class="d-flex justify-content-center">
                <div class="card" style="max-width: 48rem;">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <h1 class="card-title text-center pb-0 fs-4">Hotel Lucky 21</h1>
                            <p class="text-center small">Register untuk melakukan reservasi.</p>
                        </div>

                        <?php if (session()->getFlashdata('error') !== null) : ?>
                            <div class="mt-2">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?= session()->getFlashdata('error') ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        <?php endif; ?>

                        <form action="/register/pelanggan" method="post" class="row g-3 needs-validation text-start" autocomplete="off">

                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <input maxlength="15" type="text" name="username" class="form-control" id="username" placeholder="username" autocomplete="off" required>
                                <p style="font-size: small;">Maks: 15 karakter</p>
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" maxlength="12" name="password" class="form-control" id="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" autocomplete="new-password" required>
                                <p style="font-size: small;">Maks: 12 karakter</p>
                            </div>

                            <div class="col-12">
                                <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
                                <input type="password" maxlength="12" name="konfirmasi_password" class="form-control" id="konfirmasi_password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" autocomplete="new-password" required>
                            </div>

                            <div class="col-12">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" maxlength="30" name="nama" class="form-control" id="nama" placeholder="Nama" autocomplete="off" required>
                                <p style="font-size: small;">Maks: 30 karakter</p>
                            </div>

                            <div class="col-12">
                                <label for="no_telepon" class="form-label">No. Telepon</label>
                                <input type="number" maxlength="14" name="no_telepon" class="form-control" id="no_telepon" placeholder="08xxxxx" autocomplete="off" required>
                                <p style="font-size: small;">Maks: 14 karakter</p>
                            </div>

                            <div class="col-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea maxlength="50" name="alamat" class="form-control" id="alamat" placeholder="Alamat" autocomplete="off" required></textarea>
                                <p style="font-size: small;">Maks: 50 karakter</p>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit" name="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- End Section Title -->

    </section><!-- /Starter Section Section -->

</main>

<?= $this->endSection(); ?>