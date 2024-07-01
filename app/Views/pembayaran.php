<?php

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
            <h1>Pembayaran Reservasi</h1>

            <table class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="text-center">Reservasi #<?= $reservasi->pelanggan->nama ?>-<?= $reservasi->id_reservasi ?>-<?= $reservasi->pelanggan->no_telepon ?></th>
                        <th class="d-flex justify-content-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Bayar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran Reservasi</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <form action="/reservasi/pembayaran" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="accordion" id="accordionExample">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                Bank BNI
                                                            </button>
                                                        </h2>
                                                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <p>No. Rekening: 83434xxxx a.n HOTEL LUCKY</p>
                                                                <p>Jumlah: <strong><?= FormatCurrency::formatToIDR($reservasi->pembayaran->jumlah) ?></strong></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                Bank BRI
                                                            </button>
                                                        </h2>
                                                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <p>No. Rekening: 83434xxxx a.n HOTEL LUCKY</p>
                                                                <p>Jumlah: <strong><?= FormatCurrency::formatToIDR($reservasi->pembayaran->jumlah) ?></strong></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <label for="bukti" class="form-label">Bukti Pembayaran</label>
                                                    <input type="file" class="form-control" id="bukti" name="bukti" accept="image/*" required>
                                                </div>
                                                <input type="hidden" name="id_reservasi" value="<?= $reservasi->id_reservasi ?>">
                                                <input type="hidden" name="id_pembayaran" value="<?= $reservasi->pembayaran->id_pembayaran ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Kirim</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- data pembayaran -->
                    <tr>
                        <td colspan="2" class="fw-semibold text-center">Data Pembayaran</td>
                    </tr>
                    <tr>
                        <td style="width: 60%;" class="fw-semibold">Jumlah</td>
                        <td><strong><?= FormatCurrency::formatToIDR($reservasi->pembayaran->jumlah) ?></strong></td>
                    </tr>

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
                        <td style="width: 60%;" class="fw-semibold">Tanggal Selesai</td>
                        <td><?= $reservasi->tanggal_selesai ?></td>
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
                        <td><?= ucwords($reservasi->kamar->tipeKamar->tipe) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

</main>

<?= $this->endSection(); ?>