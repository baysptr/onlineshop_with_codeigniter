<?= $meta ?>
<?= $navbar ?>

<div class="container">
    <div class="row">
        <div class="container">
            <div class="page-header">
                <h1 id="timeline">Cara Beli</h1>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-badge"><b>1</b></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">Pilih Produk yang akan di order</h4>
                            <p><small class="text-muted"><i class="glyphicon glyphicon-chevron-down"></i> Seperti gambar dibawah ini</small></p>
                        </div>
                        <div class="timeline-body">
                            <div class="img-responsive">
                                <a href="javascript:;" onclick="showGambar('uploads/cara_beli/1.png')">
                                    <img src="<?= base_url() ?>uploads/cara_beli/1.png" width="100%">
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-badge warning"><b>2</b></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">Periksa Produk dan jika iya klik order</h4>
                            <p><small class="text-muted"><i class="glyphicon glyphicon-chevron-down"></i> Seperti gambar dibawah ini</small></p>
                        </div>
                        <div class="timeline-body">
                            <div class="img-responsive">
                                <a href="javascript:;" onclick="showGambar('uploads/cara_beli/2.png')">
                                    <img src="<?= base_url() ?>uploads/cara_beli/2.png" width="100%">
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge danger"><b>3</b></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">Isi data diri anda bertujuan untuk pengiriman barang</h4>
                            <p><small class="text-muted"><i class="glyphicon glyphicon-chevron-down"></i> Seperti gambar dibawah ini</small></p>
                        </div>
                        <div class="timeline-body">
                            <a href="javascript:;" onclick="showGambar('uploads/cara_beli/3.png')">
                                    <img src="<?= base_url() ?>uploads/cara_beli/3.png" width="100%">
                                </a>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-badge success"><b>4</b></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">Selamat anda Sudah Melakukan order buku, terimakasih</h4>
                            <p><small class="text-muted"><i class="glyphicon glyphicon-chevron-down"></i> Jika muncul gambar seperti dibawah ini, maka order anda berhasil</small></p>
                        </div>
                        <div class="timeline-body">
                            <a href="javascript:;" onclick="showGambar('uploads/cara_beli/4.png')">
                                    <img src="<?= base_url() ?>uploads/cara_beli/4.png" width="100%">
                                </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Lihat Gambar</h4>
            </div>
            <div class="modal-body">
                <div class="img-responsive">
                    <img src="" id="gambar" width="100%">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?= $script ?>

<script type="text/javascript">
    function showGambar(mime) {
        var baseUrl = "<?= base_url() ?>";
        $("#gambar").attr("src", baseUrl+mime);
        $("#myModal").modal("show");
    }
</script>