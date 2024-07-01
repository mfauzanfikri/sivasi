<?= $this->extend('layouts/landing_page/layout'); ?>

<?= $this->section('content'); ?>

<?php

use App\Utils\FormatCurrency;

?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title">
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li class="current">Reservasi</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">
        <div class="container" data-aos="fade-up">
            <h1>Reservasi</h1>
            <p>Anda dapat melihat riwayat reservasi di bawah.</p>
            <p>Riwayat Reservasi:</p>
            <ul class="nav nav-tabs" id="reservasiTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="aktif-tab" data-bs-toggle="tab" data-bs-target="#aktif-tab-pane" type="button" role="tab" aria-controls="aktif-tab-pane" aria-selected="true">Aktif</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="menunggu-pembayaran-tab" data-bs-toggle="tab" data-bs-target="#menunggu-pembayaran-tab-pane" type="button" role="tab" aria-controls="menunggu-pembayaran-tab-pane" aria-selected="false">Menunggu Pembayaran</button>
                </li>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="menunggu-konfirmasi-tab" data-bs-toggle="tab" data-bs-target="#menunggu-konfirmasi-tab-pane" type="button" role="tab" aria-controls="menunggu-konfirmasi-tab-pane" aria-selected="false">Menunggu Konfirmasi</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="selesai-tab" data-bs-toggle="tab" data-bs-target="#selesai-tab-pane" type="button" role="tab" aria-controls="selesai-tab-pane" aria-selected="false">Selesai</button>
                </li>
            </ul>
            <div class="tab-content" id="reservasiTabContent">
                <!-- Aktif -->
                <div class="tab-pane fade show active" id="aktif-tab-pane" role="tabpanel" aria-labelledby="aktif-tab" tabindex="0">
                    <div class="mt-3">
                        <!-- Buat Reservasi Modal Button -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Buat Reservasi
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Buat Reservasi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/reservasi/buat" method="post">
                                        <div class="modal-body">
                                            <?php
                                            $date = (new DateTime())->format('Y-m-d');
                                            ?>
                                            <input type="hidden" name="id_pelanggan" value="<?= session()->get('pelanggan')['id_pelanggan'] ?>">
                                            <div class="mb-3">
                                                <label for="tanggal_mulai" class="form-label">Tanggal Mulai Inap<span class="text-danger">*</span></label>
                                                <input type="date" min="<?= $date ?>" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="lama" class="form-label">Lama Inap<span class="text-danger">*</span></label>
                                                <input type="number" min="1" class="form-control" id="lama" name="lama" value="1" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="id_tipe_kamar" class="form-label">Tipe Kamar<span class="text-danger">*</span></label>
                                                <select id="id_tipe_kamar" class="form-select" name="id_tipe_kamar" required>
                                                    <option value="0">Pilih Tipe Kamar</option>
                                                    <option value="1">Standard Room / Rp200.000 per hari</option>
                                                    <option value="2">Superior Room / Rp300.000 per hari</option>
                                                    <option value="3">Deluxe Room / Rp400.000 per hari</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kode_promosi" class="form-label">Kode Promosi (Opsional)</label>
                                                <input type="text" maxlength="8" class="form-control" id="kode_promosi" name="kode_promosi" placeholder="KODEPROMO">
                                            </div>
                                            <div class="mb-3">
                                                <p class="text-danger fs-6">*harus diisi</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Buat</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if (session()->getFlashdata('error') !== null) : ?>
                        <div class="mt-2">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('warning') !== null) : ?>
                        <div class="mt-2">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('warning') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('success') !== null) : ?>
                        <div class="mt-2">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="mt-4">
                        <table id="reservasi-aktif-table" class="table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tanggal Reservasi</th>
                                    <th>Tanggal Checkin</th>
                                    <th>Durasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservasiAktif as $reservasi) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $reservasi->tanggal ?></td>
                                        <td><?= $reservasi->tanggal_checkin ?></td>
                                        <td><?= $reservasi->lama ?> Hari</td>
                                        <td>
                                            <button class="btn btn-primary">Detail</button>
                                            <button class="btn btn-warning">Checkout</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Menunggu Pembayaran -->
                <div class="tab-pane fade" id="menunggu-pembayaran-tab-pane" role="tabpanel" aria-labelledby="menunggu-pembayaran-tab" tabindex="0">
                    <div class="mt-4">
                        <table id="reservasi-mp-table" class="table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tanggal Reservasi</th>
                                    <th>Durasi</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservasiMenungguPembayaran as $reservasi) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $reservasi->tanggal ?></td>
                                        <td><?= $reservasi->lama ?> Hari</td>
                                        <td><?= FormatCurrency::formatToIDR($reservasi->pembayaran->jumlah) ?></td>
                                        <td class="d-flex gap-1">
                                            <a href="reservasi/<?= $reservasi->id_reservasi ?>">
                                                <button class="btn btn-primary">Detail</button>
                                            </a>
                                            <a href="reservasi/pembayaran/<?= $reservasi->id_reservasi ?>">
                                                <button class="btn btn-warning">Bayar</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Menunggu Konfirmasi -->
                <div class="tab-pane fade" id="menunggu-konfirmasi-tab-pane" role="tabpanel" aria-labelledby="menunggu-pembayaran-tab" tabindex="0">
                    <div class="mt-4">
                        <table id="reservasi-mk-table" class="table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tanggal Reservasi</th>
                                    <th>Durasi</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservasiMenungguKonfirmasi as $reservasi) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $reservasi->tanggal ?></td>
                                        <td><?= $reservasi->lama ?> Hari</td>
                                        <td><?= FormatCurrency::formatToIDR($reservasi->pembayaran->jumlah) ?></td>
                                        <td>
                                            <a href="reservasi/<?= $reservasi->id_reservasi ?>">
                                                <button class="btn btn-primary">Detail</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Selesai -->
                <div class="tab-pane fade" id="selesai-tab-pane" role="tabpanel" aria-labelledby="selesai-tab" tabindex="0">
                    <div class="mt-4">
                        <table id="reservasi-selesai-table" class="table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tanggal Reservasi</th>
                                    <th>Tanggal Checkin</th>
                                    <th>Tanggal Checkout</th>
                                    <th>Durasi</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservasiSelesai as $reservasi) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $reservasi->tanggal ?></td>
                                        <td><?= $reservasi->tanggal_checkin ?></td>
                                        <td><?= $reservasi->tanggal_checkout ?></td>
                                        <td><?= $reservasi->lama ?> Hari</td>
                                        <td><?= FormatCurrency::formatToIDR($reservasi->pembayaran->jumlah) ?></td>
                                        <td class="d-flex gap-1">
                                            <button class="btn btn-primary">Detail</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /Starter Section Section -->

</main>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    function initializeTables() {
        const reservasiAktifTable = $('#reservasi-aktif-table').DataTable({
            scrollX: true,
            columnDefs: [{
                searchable: false,
                orderable: false,
                width: '1%',
                targets: 0
            }, {
                className: "dt-head-center dt-body-center",
                targets: ['_all']
            }, ],
        });

        reservasiAktifTable.on('order.dt search.dt', function() {
            var i = 1;

            reservasiAktifTable
                .cells(null, 0, {
                    search: 'applied',
                    order: 'applied'
                })
                .every(function(cell) {
                    this.data(i++);
                });
        }).draw();

        const reservasiMpTable = $('#reservasi-mp-table').DataTable({
            scrollX: true,
            columnDefs: [{
                searchable: false,
                orderable: false,
                width: '1%',
                targets: 0
            }, {
                className: "dt-head-center dt-body-center",
                targets: ['_all']
            }, ],
        });

        reservasiMpTable.on('order.dt search.dt', function() {
            var i = 1;

            reservasiMpTable
                .cells(null, 0, {
                    search: 'applied',
                    order: 'applied'
                })
                .every(function(cell) {
                    this.data(i++);
                });
        }).draw();

        const reservasiMkTable = $('#reservasi-mk-table').DataTable({
            scrollX: true,
            columnDefs: [{
                searchable: false,
                orderable: false,
                width: '1%',
                targets: 0
            }, {
                className: "dt-head-center dt-body-center",
                targets: ['_all']
            }, ],
        });

        reservasiMkTable.on('order.dt search.dt', function() {
            var i = 1;

            reservasiMkTable
                .cells(null, 0, {
                    search: 'applied',
                    order: 'applied'
                })
                .every(function(cell) {
                    this.data(i++);
                });
        }).draw();

        const reservasiSelesaiTable = $('#reservasi-selesai-table').DataTable({
            scrollX: true,
            columnDefs: [{
                searchable: false,
                orderable: false,
                width: '1%',
                targets: 0
            }, {
                className: "dt-head-center dt-body-center",
                targets: ['_all']
            }, ],
        });

        reservasiSelesaiTable.on('order.dt search.dt', function() {
            var i = 1;

            reservasiSelesaiTable
                .cells(null, 0, {
                    search: 'applied',
                    order: 'applied'
                })
                .every(function(cell) {
                    this.data(i++);
                });
        }).draw();
    }

    initializeTables();

    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function(event) {
        DataTable.tables({
            visible: true,
            api: true
        }).columns.adjust();
    });
</script>
<?= $this->endSection(); ?>