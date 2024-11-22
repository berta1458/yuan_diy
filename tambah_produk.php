<?php
include 'layout/header2.php';
?>
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="page-body-wrapper">
        <div class="page-body">
            <div class="row">
                <div class="container-fluid add-product">
                    <div class="row">
                        <div class="col-xl-15">
                            <div class="card">
                                <div class="card-body">
                                    <div class="product-info">
                                        <h5>Description</h5>
                                        <form action="simpan_produk.php" method="post" enctype="multipart/form-data">
                                            <div class="product-group">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Produk</label>
                                                            <input class="form-control" name="produk" type="text"><span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Deskripsi Produk</label>
                                                            <input class="form-control" name="deskripsi" type="text"><span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Harga Produk</label>
                                                            <input class="form-control" id="harga" name="harga" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Stok Produk</label>
                                                            <input class="form-control" id="stok" name="stok" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                    <label class="form-label">Gambar Produk</label>
                                                    <input type="file" name="foto" id="foto">
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <div class="row">
                                                        <div class="col-sm-12 text-end"><button class="btn btn-primary me-3" type="submit" >Tambah</button><a class="btn btn-secondary" href="produk.php">Batal</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
include 'layout/footer.php';
?>