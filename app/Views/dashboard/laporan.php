<?= $this->extend('layouts/dashboard/layout'); ?>

<?= $this->section('content'); ?>

<div class="pagetitle">
    <h1>Laporan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Laporan</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Filter Cetak Laporan</h2>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        msg
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="row mt-1">
                        <div class="col">
                            <form id="laporan-form" action="/dashboard/laporan/cetak" method="get">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="from" class="form-label">Dari</label>
                                        <input type="date" min="<?= (new DateTime())->format('Y-m-d') ?>" class="form-control" id="date-from" name="from" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="to" class="form-label">Sampai</label>
                                        <input type="date" class="form-control" id="date-to" name="to" required disabled>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" id="cetak-button" class="btn btn-primary" disabled>Cetak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Tabel Pembayaran</h2>

                    <div class="row mt-1">
                        <div class="col">
                            <?php
                            // TODO: display data pembayaran
                            ?>
                            <table id="data-laporan-table" class="table table-striped" style="width: 100%;">
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
                                    <?php foreach ($pembayaran as $p) : ?>
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
    const dataLaporanTable = $('#data-laporan-table').DataTable({
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

    dataLaporanTable
        .on('order.dt search.dt', function() {
            var i = 1;

            dataLaporanTable
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

<script src="/assets/vendor/momentjs/main.js"></script>

<script>
    const fromInput = document.getElementById('date-from');
    const toInput = document.getElementById('date-to');
    const cetakButton = document.getElementById('cetak-button');
    const laporanForm = document.getElementById('laporan-form');

    fromInput.addEventListener('change', (e) => {
        const value = e.target.value;

        if (!value || value.trim() === '') {
            toInput.setAttribute('disabled', '');
            toInput.value = '';

            return;
        }

        if (toInput.value < value) {
            toInput.value = '';
        }

        toInput.removeAttribute('disabled');

        const date = moment(value).add(1, 'days');

        toInput.setAttribute('min', date.format('yyy-MM-DD'));
    });

    laporanForm.addEventListener('change', (e) => {
        if (fromInput.value === '' || toInput.value === '') {
            cetakButton.setAttribute('disabled', '');

            return;
        }

        cetakButton.removeAttribute('disabled');
    });
</script>
<?= $this->endSection(); ?>