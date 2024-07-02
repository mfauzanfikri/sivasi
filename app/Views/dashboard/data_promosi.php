<?= $this->extend('layouts/dashboard/layout'); ?>

<?= $this->section('content'); ?>

<div class="pagetitle">
    <h1>Data Promosi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Data Promosi</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Tabel Data Pelanggan</h2>

                    <?php if (session()->getFlashdata('error') !== null) : ?>
                        <div class="mt-2">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('error') ?>
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

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-modal">
                            Tambah
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="tambah-modal" tabindex="-1" aria-labelledby="tambah-modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="tambah-modalLabel">Tambah Promosi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/dashboard/data-promosi/tambah" method="post">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="kode_promosi" class="form-label">Kode Promosi</label>
                                                <input type="text" class="form-control" max="8" id="kode_promosi" placeholder="KODEPROMOSI" name="kode_promosi" oninput="this.value = this.value.toUpperCase()" autocomplete="off" required>
                                                <div id="kodePromosiHelp" class="form-text">Maks: 8 karakter</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="tanggal_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label>
                                                <input type="date" min="<?= (new DateTime())->add(new DateInterval('P1D'))->format('Y-m-d') ?>" class="form-control" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="potongan" class="form-label">Potongan (dalam persen (%))</label>
                                                <input type="number" min="1" max="100" class="form-control" id="potongan" name="potongan" placeholder="10" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="id_tipe_kamar" class="form-label">Tanggal Kadaluarsa</label>
                                                <select class="form-select" id="id_tipe_kamar" name="id_tipe_kamar">
                                                    <option value="0">Pilih Tipe Kamar</option>
                                                    <?php foreach ($tipeKamar as $tk) : ?>
                                                        <option value="<?= $tk->id_tipe_kamar ?>"><?= ucwords($tk->tipe) ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="tampilkan" name="tampilkan">
                                                <label class="form-check-label" for="tampilkan">
                                                    Tampilkan
                                                </label>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <table id="data-promosi-table" class="table table-striped" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Tipe Kamar</th>
                                        <th>Kode Promosi</th>
                                        <th>Tanggal Kadaluarsa</th>
                                        <th>Ditampilkan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($promosi as $p) : ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $p->tipe_kamar->tipe ?></td>
                                            <td><?= $p->kode_promosi ?></td>
                                            <td><?= $p->tanggal_kadaluarsa ?></td>
                                            <td><?= $p->tampilkan ? "Ya" : 'Tidak' ?></td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    <div>
                                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-modal-<?= $p->id_promosi ?>">
                                                            Edit
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="edit-modal-<?= $p->id_promosi ?>" tabindex="-1" aria-labelledby="edit-modal-<?= $p->id_promosi ?>Label" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="edit-modal-<?= $p->id_promosi ?>Label">Tampilan Promosi</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="/dashboard/data-promosi/edit" method="post">
                                                                        <div class="modal-body">
                                                                            <p>Apakah Anda yakin ingin <strong><?= $p->tampilkan ? "menyembunyikan" : "menampilkan" ?></strong> promosi dengan kode promosi <strong><?= $p->kode_promosi ?></strong>?</p>
                                                                            <input type="hidden" name="id_promosi" value="<?= $p->id_promosi ?>">
                                                                            <input type="hidden" name="tampilkan" value="<?= $p->tampilkan ? "0" : "1" ?>">
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                                <button type="submit" class="btn btn-primary">Ya</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-modal-<?= $p->id_promosi ?>">
                                                            Hapus
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="hapus-modal-<?= $p->id_promosi ?>" tabindex="-1" aria-labelledby="hapus-modal-<?= $p->id_promosi ?>Label" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="hapus-modal-<?= $p->id_promosi ?>Label">Hapus Promosi</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="/dashboard/data-promosi/hapus" method="post">
                                                                        <div class="modal-body">
                                                                            <p>Apakah Anda yakin ingin menghapus promosi dengan kode promosi <strong><?= $p->kode_promosi ?></strong>?</p>
                                                                            <input type="hidden" name="id_promosi" value="<?= $p->id_promosi ?>">
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
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
    const dataPelangganTable = $('#data-promosi-table').DataTable({
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