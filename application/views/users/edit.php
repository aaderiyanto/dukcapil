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
                <div class="card card-primary">
                    <form action="<?= base_url() ?>users/update/<?= $id ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="medrec">Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?= $data['name'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="medrec">Username</label>
                                <input type="text" class="form-control" name="username" value="<?= $data['username'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="medrec">Ganti Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <?php if ($_COOKIE['role'] == "admin") { ?>
                                <div class="form-group">
                                    <label for="sel1">Select Role:</label>
                                    <select class="form-control" name="role">
                                        <option value="admin" <?php if ($data['role'] == 'admin') {
                                                                    echo "selected=selected";
                                                                } ?>>Admin</option>
                                        <option value="users" <?php if ($data['role'] == 'users') {
                                                                    echo "selected=selected";
                                                                } ?>>Users</option>
                                    </select>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <?php if ($this->session->userdata('role') == "admin") { ?>
                                <a class="btn btn-danger" href="<?= base_url() ?>users">Kembali</a>
                            <?php } ?>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>
</section>