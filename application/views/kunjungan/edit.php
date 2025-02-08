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
                    <form action="<?= base_url() ?>kunjungan/update/<?= $id ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="medrec">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" value="<?= $data['tanggal'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="medrec">Nama</label>
                                <select class="form-control js-example-basic-single js-example-basic-single" name="penduduk">
                                    <option value=""> -- --Pilih-- -- - </option>
                                    <?php foreach ($penduduk as $row) { ?>
                                        <option value="<?= $row['id']; ?>" <?php if ($data['id_penduduk'] ==  $row['id']) {
                                                                                echo "selected=selected";
                                                                            } ?>><?= $row['nik']; ?>-<?= $row['nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="medrec">Tujuan</label>
                                <input type="text" class="form-control" name="tujuan" value="<?= $data['tujuan'] ?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>
</section>