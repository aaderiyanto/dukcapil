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
                        <a href="<?= base_url() ?>users/add" class="btn btn-primary"><i class="fa fa-plus"></i> User</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table" id="example1">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if ($data == 0) { ?>
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak Ada Data</td>
                                    </tr>
                                <?php
                                } else {
                                ?>
                                    <?php foreach ($data as $row) { ?>
                                        <tr>
                                            <td><?= $row['name']; ?></td>
                                            <td><?= $row['username']; ?></td>
                                            <td><?= $row['role']; ?></td>
                                            <td><a href="<?= base_url() ?>users/edit/<?= $row['id']; ?>" class="btn btn-warning "><i class="fa fa-pencil-alt"></i></a>|<a href="<?= base_url() ?>users/delete/<?= $row['id']; ?>" class="btn btn-danger" onClick="return confirm('Apakah Anda benar-benar mau menghapusnya?')"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    <?php
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