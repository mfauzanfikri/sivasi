<?= $this->extend('layouts/dashboard/layout'); ?>

<?= $this->section('content'); ?>

<div class="pagetitle">
    <h1>Detail Reservasi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Detail Reservasi</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col">
            <div class="card">
                <?php

                use App\Utils\FormatCurrency;

                $nama = $reservasi->pelanggan->nama;
                $noTelepon = $reservasi->pelanggan->no_telepon;
                $cardTitle = "Reservasi #$reservasi->id_reservasi $nama / $noTelepon";

                ?>
                <div class="card-body">
                    <h2 class="card-title"><?= $cardTitle ?></h2>

                    <div class="row mt-2 gap-2 gap-md-0">
                        <div class="col-12 col-md-6">
                            <h3>Data Pelanggan</h3>
                            <div class="d-flex flex-column gap-2">
                                <div>
                                    <label class="fw-semibold">Nama</label>
                                    <p class="mb-0 rounded border p-1"><?= $reservasi->pelanggan->nama ?></p>
                                </div>
                                <div>
                                    <label class="fw-semibold">No Telepon</label>
                                    <p class="mb-0 rounded border p-1"><?= $reservasi->pelanggan->no_telepon ?></p>
                                </div>
                                <div>
                                    <label class="fw-semibold">Alamat</label>
                                    <p class="mb-0 rounded border p-1"><?= $reservasi->pelanggan->alamat ?></p>
                                </div>
                            </div>
                        </div>


                        <div class="col-12 col-md-6 mt-3 mt-md-0">
                            <h3>Data Reservasi</h3>
                            <div class="d-flex flex-column gap-2">
                                <div>
                                    <label class="fw-semibold">Tanggal Reservasi</label>
                                    <p class="mb-0 rounded border p-1"><?= $reservasi->tanggal ?></p>
                                </div>
                                <div>
                                    <label class="fw-semibold">Tanggal Datang (check in)</label>
                                    <p class="mb-0 rounded border p-1"><?= $reservasi->tanggal_checkin ?></p>
                                </div>
                                <div>
                                    <label class="fw-semibold">Lama</label>
                                    <p class="mb-0 rounded border p-1"><?= $reservasi->lama . ' hari' ?></p>
                                </div>
                                <div>
                                    <label class="fw-semibold">Status Reservasi</label>
                                    <p class="mb-0 rounded border p-1"><?= ucfirst($reservasi->status) ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mt-3">
                            <h3>Data Kamar</h3>
                            <div class="d-flex flex-column gap-2">
                                <div>
                                    <label class="fw-semibold">Nomor Kamar</label>
                                    <p class="mb-0 rounded border p-1"><?= $reservasi->kamar->no_kamar ?></p>
                                </div>
                                <div>
                                    <label class="fw-semibold">Tipe Kamar</label>
                                    <p class="mb-0 rounded border p-1"><?= ucwords($reservasi->kamar->tipeKamar->tipe) ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mt-3">
                            <h3>Data Pembayaran</h3>
                            <div class="d-flex flex-column gap-2">
                                <div>
                                    <label class="fw-semibold">Tanggal Pembayaran</label>
                                    <p class="mb-0 rounded border p-1"><?= $reservasi->pembayaran->tanggal ? $reservasi->pembayaran->tanggal : 'Belum Lunas' ?></p>
                                </div>
                                <div>
                                    <label class="fw-semibold">Jumlah</label>
                                    <p class="mb-0 rounded border p-1"><?= FormatCurrency::formatToIDR($reservasi->pembayaran->jumlah) ?></p>
                                </div>
                                <div>
                                    <label class="fw-semibold">Status Pembayaran</label>
                                    <p class="mb-0 rounded border p-1"><?= ucfirst($reservasi->pembayaran->status) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<?= $this->endSection(); ?>