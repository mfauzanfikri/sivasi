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
                <div class="card-body">
                    <h2 class="card-title">Tabel Data Pelanggan</h2>

                    <div class="row mt-2">
                        <div class="col">
                            <table id="data-pelanggan-table" class="table table-striped" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No. Telepon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pelanggan as $p) : ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $p->username; ?></td>
                                            <td><?= $p->nama; ?></td>
                                            <td><?= $p->alamat; ?></td>
                                            <td><?= $p->no_telepon; ?></td>
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
    // table cuti
    const dataPelangganTable = $('#data-pelanggan-table').DataTable({
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

    dataPelangganTable
        .on('order.dt search.dt', function() {
            var i = 1;

            dataPelangganTable
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