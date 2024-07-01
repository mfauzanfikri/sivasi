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
            <h2>Login</h2>

            <div class="d-flex justify-content-center">
                <div class="card" style="max-width: 48rem;">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <h1 class="card-title text-center pb-0 fs-4">Hotel Lucky 21</h1>
                            <p class="text-center small">Log in untuk melakukan reservasi.</p>
                        </div>

                        <?php if (session()->getFlashdata('errorMsg') !== null) : ?>
                            <div class="mt-2">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?= session()->getFlashdata('errorMsg') ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        <?php endif; ?>

                        <form action="/auth" method="post" class="row g-3 needs-validation text-start">

                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="username" class="form-control" id="username" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit" name="submit">Login</button>
                            </div>
                        </form>
                        <div class="mt-2">
                            <p class="fs-6">Belum punya akun? <a href="/register">register</a> sekarang!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Section Title -->

    </section><!-- /Starter Section Section -->

</main>

<?= $this->endSection(); ?>