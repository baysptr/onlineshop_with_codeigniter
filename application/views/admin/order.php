<?= $meta ?>
<?= $navbar ?>
<div class="container-fluid">
    <div class="row">
        <?= $sidebar ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Check List Order Product</h1>

            <div class="table-responsive">
                <table class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Nama</td>
                            <td>e-Mail</td>
                            <td>No. Telp</td>
                            <td>Jenis Kelamin</td>
                            <td>Usia</td>
                            <td>Alamat Lengkap</td>
                            <td>Tgl Order</td>
                            <td colspan="2">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($order as $val) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $val['nama'] ?></td>
                                <td><?= $val['email'] ?></td>
                                <td><?= $val['telp'] ?></td>
                                <td><?= $val['gender'] ?></td>
                                <td><?= $val['usia'] ?></td>
                                <td><?= $val['alamat'] ?>, <?= $val['kota'] ?>, <?= $val['propinsi'] ?></td>
                                <td><?= $val['tgl_post'] ?></td>
                                    <?php if ($val['status'] == "proses") { ?>
                                    <td><div class="btn btn-xs btn-warning" onclick="if (confirm('Anda yakin akan diverifikasi ???') === true) {
                                                        window.location = '<?= site_url() ?>/admin/verifikasi/<?= $val["id"] ?>';
                                                                }"><div class="glyphicon glyphicon-check"></div> Verifikasi</div></td>
                                    <td><div class="btn btn-xs btn-danger" onclick="if(confirm('Anda yakin akan dihapus ???') === true ){ window.location = '<?= site_url() ?>/admin/batal_order/<?= $val["id"] ?>'; }"><div class="glyphicon glyphicon-erase"></div> Batal</div></td>
                                <?php } else { ?>
                                    <td><div class="btn btn-xs btn-danger" onclick="if(confirm('Anda yakin akan dihapus ???') === true ){ window.location = '<?= site_url() ?>/admin/batal_order/<?= $val["id"] ?>'; }"><div class="glyphicon glyphicon-erase"></div> Batal</div></td>
                            <?php } ?>
                            </tr>
<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>