<?= $meta ?>
<?= $navbar ?>

<div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <?php for ($i = 1; $i <= $row_banner; $i++) { ?>
                <li data-target="#myCarousel" data-slide-to="<?= $i ?>"></li>
            <?php } ?>
        </ol>
        <div class="carousel-inner">
            <div class="item active"> <img src="<?= base_url() ?>uploads/book3.jpg" style="width:100%" data-src="" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Buku Fashion</h1>
                        <p>Buku Dapat Menjadi Tren dalam Fashion</p>
                    </div>
                </div>
            </div>
            <?php foreach ($banner as $value) { ?>
                <div class="item"> <img src="<?= base_url() ?>uploads/<?= $value['photo_slider'] ?>" style="width:100%" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1><?= $value['judul'] ?></h1>
                            <p><?= $value['deskripsi'] ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div><br/>
    <div class="row">
        <?php foreach ($product as $data) { ?>
            <div class="col-md-6 col-sm-4 col-xs-6 col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4><?= $data['nama_product'] ?></h4>
                    </div>
                    <div class="panel-body">
                        <a href="javascript:;" onclick="show_product(<?= $data['id'] ?>)">
                            <img src="<?= base_url() ?>product/<?= $data['gambar_product'] ?>" class="img-responsive">
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12"><?= $pagination ?></div>
    </div>
</div> <!-- /container -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Login Form</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url() ?>index.php/admin/do_login">
                    <table class="table table-striped table-hover">
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><input type="text" name="username" class="form-control" placeholder="Username"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input type="password" name="password" class="form-control" placeholder="Password"></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title pull-right">Stock: <b id="stock"></b></h4>
                <h4 class="modal-title" id="judul_product"></h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <td rowspan="6"><img id="display" width="300" height="320"></td>
                        </tr>
                        <tr>
                            <td>Ukuran</td>
                            <td>:</td>
                            <td id="ukuran"></td>
                        </tr>
                        <tr>
                            <td>Tebal</td>
                            <td>:</td>
                            <td id="tebal"></td>
                        </tr>
                        <tr>
                            <td>Berat</td>
                            <td>:</td>
                            <td id="berat"></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td id="harga"></td>
                        </tr>
                        <input type="hidden" id="id_proc">
                        <tr>
                            <td colspan="3" align="center">
                                <div class="btn btn-primary" id="btn_order">Order</div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</button>
            </div>
        </div>
    </div>
</div>

<?= $script ?>
<script type="text/javascript">
    function show_product(id) {
        $.ajax({
            url: "<?= site_url() ?>/welcome/show_product/" + id,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $("#judul_product").text(data.nama_product);
                $("#display").attr("src", "<?= base_url() ?>product/" + data.gambar_product);
                $("#ukuran").text(data.ukuran);
                $("#tebal").text(data.tebal + " Lembar");
                $("#berat").text(data.berat + " Grams");
                $("#harga").text(data.harga + " IDR");
                $("#stock").text(data.stok);
                $("#btn_order").on("click", function () {
                    window.location = "<?= site_url() ?>/welcome/order/" + data.id;
                });
                $("#myDetail").modal("show");
            }
        });
    }
</script>