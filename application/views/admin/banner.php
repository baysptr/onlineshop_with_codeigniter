<?= $meta ?>
<?= $navbar ?>
<div class="container-fluid">
    <div class="row">
        <?= $sidebar ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Banner</h1>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Gambar</td>
                            <td>Judul</td>
                            <td>Deskripsi</td>
                            <td colspan="2">
                                <a href="javascript:;" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-block btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</a>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($banner as $value) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><img src="<?= base_url() ?>uploads/<?= $value['photo_slider'] ?>" width="150" height="40"></td>
                                <td><?= $value['judul'] ?></td>
                                <td><?= $value['deskripsi'] ?></td>
                                <td><div class="btn btn-block btn-xs btn-primary" onclick="javascript: window.location = '<?= site_url() ?>/admin/edit_banner/<?= $value["id"] ?>'"><span class="glyphicon glyphicon-edit"></span> Edit</div></td>
                                <td><div class="btn btn-block btn-xs btn-danger" onclick="javascript: bootbox.confirm({
                                                size: 'small',
                                                message: 'Are you sure?',
                                                callback: function (e) {
                                                    if (e) {
                                                        //alert('<?= base_url() ?>index.php/admin/hapus_banner/<?= $value["id"] ?>');
                                                        window.location = '<?= base_url() ?>index.php/admin/hapus_banner/<?= $value["id"] ?>';
                                                                        }
                                                                    }
                                                                    })"><span class="glyphicon glyphicon-trash"></span> Hapus</div></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Login Form</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url() ?>/admin/add_banner" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <table class="table table-striped table-hover">
                        <tr>
                            <td>Gambar</td>
                            <td>:</td>
                            <td><input type="file" name="gambar" id="gambar" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Judul</td>
                            <td>:</td>
                            <td><input type="text" name="judul" id="judul" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td><textarea name="deskripsi" id="deskripsi" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $script ?>