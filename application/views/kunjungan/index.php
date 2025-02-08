<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url() ?>kunjungan/add" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Tujuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($data) == 0) { ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak Ada Pengajuan</td>
                                    </tr>
                                <?php
                                } else {
                                    $no = 1;
                                ?>
                                    <?php foreach ($data as $row) {
                                        $penduduk = $this->db->query("select * from penduduk where id= '$row[id_penduduk]'")->row_array(); ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['tanggal'] ?></td>
                                            <td><?= $penduduk['nik']; ?> - <?= $penduduk['nama']; ?></td>
                                            <td><?= $row['tujuan']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="<?= base_url() ?>kunjungan/edit/<?= $row['id']; ?>" class="dropdown-item"><i class="fa fa-pencil-alt"></i> Edit</a>
                                                        <a href="<?= base_url() ?>kunjungan/delete/<?= $row['id']; ?>" class="dropdown-item" onClick="return confirm('Apakah Anda benar-benar mau menghapusnya?')"><i class="fa fa-trash"></i> Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    } ?>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>