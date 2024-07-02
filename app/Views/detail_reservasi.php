<?php

use App\Utils\Database\Constants\StatusPembayaran;
use App\Utils\Database\Constants\StatusReservasi;
use App\Utils\FormatCurrency;
?>
<?= $this->extend('layouts/landing_page/layout'); ?>

<?= $this->section('content'); ?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title">
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li class="current">Detail Reservasi</li>
                </ol>
            </div>
        </nav>
    </div>

    <section id="starter-section" class="starter-section section">
        <div class="container" data-aos="fade-up">
            <h1>Detail Reservasi #<?= $reservasi->pelanggan->nama ?>-<?= $reservasi->id_reservasi ?>-<?= $reservasi->pelanggan->no_telepon ?></h1>

            <?php if ($reservasi->pembayaran->status === StatusPembayaran::MENUNGGU_PEMBAYARAN) : ?>
                <div class="mb-3">
                    <button class="btn btn-primary">Lakukan Pembayaran</button>
                </div>
            <?php endif ?>

            <table class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th colspan="2" class="text-center">Reservasi #<?= $reservasi->pelanggan->nama ?>-<?= $reservasi->id_reservasi ?>-<?= $reservasi->pelanggan->no_telepon ?></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- data pelanggan -->
                    <tr>
                        <td colspan="2" class="fw-semibold text-center">Data Pelanggan</td>
                    </tr>
                    <tr>
                        <td style="width: 60%;" class="fw-semibold">Nama</td>
                        <td><?= $reservasi->pelanggan->nama ?></td>
                    </tr>
                    <tr>
                        <td style="width: 60%;" class="fw-semibold">Alamat</td>
                        <td><?= $reservasi->pelanggan->alamat ?></td>
                    </tr>
                    <tr>
                        <td style="width: 60%;" class="fw-semibold">No. Telepon</td>
                        <td><?= $reservasi->pelanggan->no_telepon ?></td>
                    </tr>

                    <!-- data reservasi -->
                    <tr>
                        <td colspan="2" class="text-center fw-semibold">Data Reservasi</td>
                    </tr>
                    <tr>
                        <td style="width: 60%;" class="fw-semibold">Tanggal Reservasi</td>
                        <td><?= $reservasi->tanggal ?></td>
                    </tr>
                    <tr>
                        <td style="width: 60%;" class="fw-semibold">Durasi Reservasi</td>
                        <td><?= $reservasi->lama ?> Hari</td>
                    </tr>
                    <tr>
                        <td style="width: 60%;" class="fw-semibold">Tanggal Mulai</td>
                        <td><?= $reservasi->tanggal_mulai ?></td>
                    </tr>
                    <tr>
                        <td style="width: 60%;" class="fw-semibold">Tanggal Checkin</td>
                        <td><?= $reservasi->tanggal_checkin ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width: 60%;" class="fw-semibold">Tanggal Checkout</td>
                        <td><?= $reservasi->tanggal_checkout ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width: 60%;" class="fw-semibold">Status Reservasi</td>
                        <td><?= strtoupper($reservasi->status) ?></td>
                    </tr>

                    <!-- data kamar -->
                    <tr>
                        <td colspan="2" class="text-center fw-semibold">Data Kamar</td>
                    </tr>
                    <tr>
                        <td style="width: 60%;" class="fw-semibold">Nomor Kamar</td>
                        <td><?= $reservasi->kamar->no_kamar ?></td>
                    </tr>
                    <tr>
                        <td style="width: 60%;" class="fw-semibold">Tipe Kamar</td>
                        <td><?= ucwords($reservasi->kamar->tipe_kamar->tipe) ?></td>
                    </tr>

                    <!-- data pembayaran -->
                    <tr>
                        <td colspan="2" class="fw-semibold text-center">Data Pembayaran</td>
                    </tr>
                    <tr>
                        <td style="width: 60%;" class="fw-semibold">Tanggal Pembayaran</td>
                        <td><?= $reservasi->pembayaran->tanggal ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width: 60%;" class="fw-semibold">Status Pembayaran</td>
                        <td><?= strtoupper($reservasi->pembayaran->status) ?></td>
                    </tr>
                    <tr>
                        <td style="width: 60%;" class="fw-semibold">Jumlah</td>
                        <td><?= FormatCurrency::formatToIDR($reservasi->pembayaran->jumlah) ?></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </section>

</main>

<?= $this->endSection(); ?>