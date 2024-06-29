<?= $this->extend('layouts/landing_page/layout'); ?>

<?= $this->section('content'); ?>

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
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="">
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                <!-- <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr> -->
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
                                    <th>Tanggal Checkin</th>
                                    <th>Durasi</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr> -->
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
                                    <th>Durasi</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr> -->
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

        const reservasiSelesaiTable = $('#reservasi-selesai-table').DataTable({
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