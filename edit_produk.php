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
                                        <h5>Edit Produk</h5>
                                        <?php
                                        include "koneksi.php";
                                        $id_produk = $_GET['id']; 
                                        $query = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk=$id_produk");
                                        $data = mysqli_fetch_assoc($query); 
                                        ?>
                                        <form action="update_produk.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id_produk" value="<?php echo $data['id_produk']; ?>">

                                            <div class="product-group">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Produk</label>
                                                            <input class="form-control" name="nama" type="text" value="<?php echo $data['nama']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Deskripsi Produk</label>
                                                            <input class="form-control" name="deskripsi" type="text" value="<?php echo $data['deskripsi']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Harga Produk</label>
                                                            <input class="form-control" name="harga" type="number" value="<?php echo $data['harga']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Stok</label>
                                                            <input class="form-control" name="stok" type="number" value="<?php echo $data['stok']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Gambar Produk</label>
                                                            <img src="gambar/<?php echo $data['gambar']?>" width="200px" alt="">
                                                            <input type="file" name="foto" id="gambar">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-4">
                                                    <div class="row">
                                                        <div class="col-sm-12 text-end">
                                                            <button class="btn btn-primary me-3" type="submit">Update</button>
                                                            <a class="btn btn-secondary" href="produk.php">Batal</a>
                                                        </div>
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
<?php
include 'layout/footer.php';
?>