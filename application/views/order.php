<?= $meta ?>

<?= $navbar ?>

<div class="container">
    <div class="row">
        <div class="alert alert-danger">
            <a href="javascript:;" onclick="window.location = '<?= base_url() ?>'">
                <div class="glyphicon glyphicon-backward"></div> Back to Home
            </a>
        </div>
        <div class="col-sm-12 col-md-6 col-xs-12 col-lg-6">
            <form action="<?= site_url() ?>/welcome/checkout" method="post">
                <table class="table table-responsive table-hover">
                    <input type="hidden" name="id_product" id="id_product" value="<?= $product->id ?>">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><input type="text" name="nama" id="nama" class="form-control" autofocus></td>
                    </tr>
                    <tr>
                        <td>e-Mail</td>
                        <td>:</td>
                        <td><input type="email" name="email" id="email" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>No. Telp</td>
                        <td>:</td>
                        <td><input type="text" name="telp" id="telp" class="form-control" maxlength="12"></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><select name="jk" id="jk" class="form-control"><option value="Laki - laki">Laki - laki</option><option value="Perempuan">Perempuan</option></select></td>
                    </tr>
                    <tr>
                        <td>Usia</td>
                        <td>:</td>
                        <td><input type="text" name="usia" id="usia" maxlength="2" class="form-control" maxlength="2"></td>
                    </tr>
                    <tr>
                        <td>Propinsi</td>
                        <td>:</td>
                        <td>
                            <select name="provinsi" id="provinsi" class="form-control">
                                <option value="">--Pilih Provinsi--</option>
                                <?php foreach ($provinsi as $prov) { ?>
                                    <option value="<?= $prov['kodePropinsi'] ?>"><?= $prov['namaPropinsi'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Kota</td>
                        <td>:</td>
                        <td>
                            <select name="kota" id="kota" class="form-control">
                                <option value="">--Pilih Kota--</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><textarea name="alamat" id="alamat" class="form-control"></textarea></td>
                    </tr>
                    <tr><td colspan="3" align="right"><input type="submit" class="btn btn-success" value="Checkout"></td></tr>
                </table>
            </form>
        </div>
        <div class="col-sm-12 col-md-6 col-xs-12 col-lg-6">
            <div class="panel panel-info">
                <div class="panel-heading"><?= $product->nama_product ?> <div class="pull-right">Stock: <b><?= $product->stok ?></b></div></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <td rowspan="6"><img src="<?= base_url() ?>product/<?= $product->gambar_product ?>" width="300" height="320"></td>
                            </tr>
                            <tr>
                                <td>Ukuran</td>
                                <td>:</td>
                                <td><?= $product->ukuran ?></td>
                            </tr>
                            <tr>
                                <td>Tebal</td>
                                <td>:</td>
                                <td><?= $product->tebal ?></td>
                            </tr>
                            <tr>
                                <td>Berat</td>
                                <td>:</td>
                                <td><?= $product->berat ?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>:</td>
                                <td><?= $product->harga ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $script ?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#telp").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                            // Allow: home, end, left, right, down, up
                                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                        // let it happen, don't do anything
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
        $("#usia").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                            // Allow: home, end, left, right, down, up
                                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                        // let it happen, don't do anything
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
        $("#provinsi").change(function () {
            var kodePropinsi = $("#provinsi").val();
            $.ajax({
                type: 'POST',
                url: "<?= site_url() ?>/welcome/getKota",
                data: "kodePropinsi="+kodePropinsi,
                success: function (data){
                    $("#kota").html(data);
                }
            });
        });
    });
</script>