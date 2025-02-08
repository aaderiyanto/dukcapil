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
                    <form action="<?= base_url() ?>profile/update/<?= urlencode($id) ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Nama">Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?= $data['name'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="Nama">Username</label>
                                <input type="text" class="form-control" name="username" value="<?= $data['username'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="Nama">Email</label>
                                <input type="text" class="form-control" name="username" value="<?= $data['email'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Perusahaan</label>
                                <select class="form-control js-example-basic-single" name="customer">
                                    <option value="">----Pilih-----</option>
                                    <?php foreach ($customers as $row) { ?>
                                        <option value="<?= $row['id']; ?>"><?= $row['Name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>