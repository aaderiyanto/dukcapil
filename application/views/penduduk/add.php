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
                    <form action="<?= base_url() ?>penduduk/save" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="medrec">No KK</label>
                                <input type="text" class="form-control" name="kk">
                            </div>
                            <div class="form-group">
                                <label for="medrec">No NIK</label>
                                <input type="text" class="form-control" name="nik">
                            </div>
                            <div class="form-group">
                                <label for="medrec">Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="medrec">No Hp</label>
                                <input type="text" class="form-control" name="hp">
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