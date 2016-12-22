<?= $meta ?>
<?= $navbar ?>
<div class="container-fluid">
    <div class="row">
        <?= $sidebar ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header"><a href="<?= site_url() ?>/admin/banner" title="Kembali ke Daftar Banner">Banner</a> &rightarrow; Edit Banner</h1>

            <div class="panel panel-primary">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form action="javascript:;">
                        <table class="table table-responsive table-hover table-striped">
                            <tr>
                                <td>Judul</td>
                                <td>:</td>
                                <td><input type="text" name="judul" id="judul" class="form-control" value="<?= $banner[0]['judul'] ?>" autofocus></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>:</td>
                                <td><textarea name="deskripsi" id="deskripsi" class="form-control"><?= $banner[0]['deskripsi'] ?></textarea></td>
                            </tr>
                            <tr>
                                <td>Gambar</td>
                                <td>:</td>
                                <td>
                                    <img src="<?= base_url() ?>uploads/<?= $banner[0]['photo_slider'] ?>" width="150" height="40" id="gambar">
                                    &nbsp;
                                    <input type="file" name="gambar" id="file_gambar">
                                    &nbsp;
                                    <input type="checkbox" onclick="javascript:
                                            var x = document.getElementById('gambar');
                                            var y = document.getElementById('file_gambar');
                                            if (x.style.display === 'none' && y.style.display === 'block') {
                                                x.style.display = 'block';
                                                y.style.display = 'none';
                                            } else {
                                                x.style.display = 'none';
                                                y.style.display = 'block';
                                            }
                                           "> Centang untuk mengganti gambar
                                </td> 
                            </tr>
                        </table>
                    </form>
                </div>
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