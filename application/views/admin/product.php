<?= $meta ?>
<?= $navbar ?>
<div class="container-fluid">
    <div class="row">
        <?= $sidebar ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Product</h1>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Product</td>
                            <td>Ukuran</td>
                            <td>Tebal</td>
                            <td>Berat</td>
                            <td>Stock</td>
                            <td>Harga</td>
                            <td>Display Product</td>
                            <td>Tanggal Post.</td>
                            <td colspan="2"><div class="btn btn-block btn-sm btn-primary" onclick="add_product()"><span class="glyphicon glyphicon-plus"></span> Tambah</div></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($product as $value) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['nama_product'] ?></td>
                                <td><?= $value['ukuran'] ?></td>
                                <td><?= $value['tebal'] ?></td>
                                <td><?= $value['berat'] ?></td>
                                <td><?= $value['stok'] ?></td>
                                <td><?= $value['harga'] ?></td>
                                <td><img src="<?= base_url() ?>product/<?= $value['gambar_product'] ?>" width="72" height="72"></td>
                                <td><?= $value['tgl_post'] ?></td>
                                <td><div class="btn btn-xs btn-block btn-primary" onclick="edit_product(<?= $value['id'] ?>)"><span class="glyphicon glyphicon-edit"></span> Edit</div></td>
                                <td><div class="btn btn-xs btn-block btn-danger" onclick="javascript: bootbox.confirm({
                                            size: 'small',
                                            message: 'Apakah kamu yakin menghapus ini ???',
                                            callback: function (e) {
                                                if (e) {
                                                    //alert('<?= base_url() ?>index.php/admin/hapus_banner/<?= $value["id"] ?>');
                                                    window.location = '<?= base_url() ?>index.php/admin/hapus_product/<?= $value["id"] ?>/<?= $value["gambar_product"] ?>';
                                                                    }
                                                                }
                                                            })"><span class="glyphicon glyphicon-trash"></span> Hapus</div></td>
                            </tr>
<?php } ?>
                    </tbody>
                </table>
<?= $pagination ?>
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
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <form id="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <table class="table table-striped table-hover">
                        <tr>
                            <td>Nama Product</td>
                            <td>:</td>
                            <td><input type="text" name="nama" id="nama" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Ukuran</td>
                            <td>:</td>
                            <td><input type="text" name="ukuran" id="ukuran" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tebal</td>
                            <td>:</td>
                            <td><input type="number" name="tebal" id="tebal" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Berat</td>
                            <td>:</td>
                            <td><input type="number" name="berat" id="berat" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Stock</td>
                            <td>:</td>
                            <td>
                                <select name="stock" id="stock" class="form-control">
                                    <option value="ada">Ada</option>
                                    <option value="habis">Habis</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td><input type="number" name="harga" id="harga" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Display Product</td>
                            <td>:</td>
                            <td><input type="file" name="display" id="display"></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="save_product()" id="btnsave"></button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $script ?>
<script type="text/javascript">
    var url_action;
    function add_product() {
        url_action = "tambah";
        $('#form')[0].reset();
        $('#btnsave').text("Tambah");
        $('#myModal').modal('show');
        $('.modal-title').text('Tambah Product');
    }
    function save_product() {
        var url;
        if (url_action === "tambah") {
            url = "<?= site_url() ?>/admin/add_product";
        } else {
            url = "<?= site_url() ?>/admin/update_product";
        }
        $.ajax({
            url: url,
            type: 'POST',
            mimeType: "multipart/form-data",
            data: new FormData($("#form")[0]),
            processData: false,
            cache: false,
            contentType: false,
            success: function (data) {
                console.log(data);
                $('#myModal').modal('hide');
            }
        });
    }
    function edit_product(id) {
        url_action = "edit";
        $("#form")[0].reset();

        $.ajax({
            url: "<?= site_url('admin/edit_product') ?>/" + id,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                console.log(data);
                $('#id').val(data.id);
                $('#nama').val(data.nama_product);
                $('#ukuran').val(data.ukuran);
                $('#tebal').val(data.tebal);
                $('#berat').val(data.berat);
                $('#stock').val(data.stok);
                $('#harga').val(data.harga);
                document.getElementById("display").src = data.gambar_product;
                $('#btnsave').text("Ubah");
                $('#myModal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Product'); // Set title to Bootstrap modal title
            }
        });
    }
</script>