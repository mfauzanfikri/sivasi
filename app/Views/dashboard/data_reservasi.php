<?= $this->extend('layouts/dashboard/layout'); ?>

<?= $this->section('content'); ?>

<div class="pagetitle">
    <h1>Data Reservasi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Data Reservasi</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Tabel Data Reservasi</h2>

                    <div class="row mt-2">
                        <div class="col">
                            <table id="data-reservasi-table" class="table table-striped" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>ID</th>
                                        <th>Nama / No. Telp</th>
                                        <th>Tanggal Reservasi</th>
                                        <th>Tanggal Inap</th>
                                        <th>Jumlah Hari</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    use App\Utils\Database\Constants\StatusReservasi;

                                    foreach ($reservasi as $r) : ?>
                                        <?php
                                        $tanggalInap = new DateTime($r->tanggal_mulai);
                                        $tanggalKeluar = (new DateTime($r->tanggal_mulai))->add(new DateInterval('P3D'));

                                        $statusColor = 'text-bg-warning';
                                        switch ($r->status) {
                                            case StatusReservasi::SELESAI:
                                                $statusColor = 'text-bg-success';
                                                break;

                                            case StatusReservasi::GAGAL:
                                                $statusColor = 'text-bg-danger';
                                                break;
                                        }
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td>#<?= $r->id_reservasi; ?></td>
                                            <td><?= $r->nama; ?>/<?= $r->no_telepon; ?></td>
                                            <td><?= $r->tanggal; ?></td>
                                            <td><?= $tanggalInap->format('Y-m-d'); ?> s.d. <?= $tanggalKeluar->format('Y-m-d'); ?></td>
                                            <td><?= $r->lama; ?> Hari</td>
                                            <td><span class="badge <?= $statusColor; ?>"><?= $r->status; ?></span></td>
                                            <td>
                                                <a href="<?= "/dashboard/data-reservasi/" . $r->id_reservasi ?>"><button class="btn btn-primary">Detail</button></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    const dataReservasiTable = $('#data-reservasi-table').DataTable({
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

    dataReservasiTable
        .on('order.dt search.dt', function() {
            var i = 1;

            dataReservasiTable
                .cells(null, 0, {
                    search: 'applied',
                    order: 'applied'
                })
                .every(function(cell) {
                    this.data(i++);
                });
        })
        .draw();
</script>
<?= $this->endSection(); ?>