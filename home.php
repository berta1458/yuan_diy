<?php
include 'layout/header.php';
include 'koneksi.php';

$q = isset($_GET['q']) ? $_GET['q'] : '';
$result = mysqli_query($conn, "SELECT * FROM tb_produk WHERE nama LIKE '%$q%' OR deskripsi LIKE '%$q%'");
?>

<div class="page-body">
  <div class="container-fluid product-wrapper">

    <div class="row mb-4">
      <div class="col-md-12">
        <form action="" method="get" class="d-flex">
          <input 
            type="text" 
            name="q" 
            class="form-control me-2" 
            placeholder="Cari produk..." 
            value="<?= htmlspecialchars($q) ?>"
          >
          <button type="submit" class="btn btn-primary me-2"><i class="fa-solid fa-magnifying-glass"></i></button>
          <a href="<?= strtok($_SERVER["REQUEST_URI"], '?') ?>" class="btn btn-secondary"><i class="fa-solid fa-arrow-rotate-right"></i></a>
        </form>
      </div>
    </div>

    <div class="product-wrapper-grid">
      <div class="row">
        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-xl-3 col-lg-4 col-sm-6 xl-25">
              <div class="card">
                <div class="product-box">
                  <div class="product-img" style="height:200px">
                    <img class="img-fluid d-block mx-auto" src="gambar/<?= $row['gambar'] ?>" alt="<?= $row['nama'] ?>" style="height:200px">
                    <div class="product-hover">
                      <ul>
                        <li><a data-bs-toggle="modal" data-bs-target="#modal<?= $row['id_produk'] ?>"><i data-feather="shopping-cart"> </i></a></li>
                      </ul>
                    </div>
                  </div>

                  <div class="modal fade" id="modal<?= $row['id_produk'] ?>" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="product-box row">
                            <div class="product-img col-lg-6">
                              <img class="img-fluid" src="gambar/<?= $row['gambar'] ?>" alt="<?= $row['nama'] ?>">
                            </div>
                            <div class="product-details col-lg-6 text-start">
                              <h4><?= $row['nama'] ?></h4>
                              <div class="product-price">Rp.<?= number_format($row['harga'], 0, ',', '.') ?></div>
                              <div class="product-view">
                                <h6 class="f-w-600">Detail Produk</h6>
                                <p class="mb-0"><?= $row['deskripsi'] ?></p>
                              </div>
                              <br>
                              <div class="product-qnty">
                                <form action="tambah_keranjang.php" method="post">
                                  <h6 class="f-w-600">Quantity</h6>
                                  <p class="stok">Stok: <?= $row['stok'] ?></p>
                                  <fieldset>
                                    <input type="hidden" name="id" value="<?= $row['id_produk'] ?>">
                                    <div class="input-group">
                                      <input class="touchspin text-center" name="jumlah" type="text" value="1">
                                    </div>
                                  </fieldset>
                                  <div class="addcart-btn">
                                    <button class="btn btn-secondary" type="submit">Tambah Keranjang</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="product-details">
                    <h4><?= $row['nama'] ?></h4>
                    <div class="product-price">Rp.<?= number_format($row['harga'], 0, ',', '.') ?></div>
                  </div>
                </div>
              </div>
            </div>
        <?php
          }
        } else {
        ?>
          <div class="col-12">
            <div class="alert alert-warning text-center">
              Tidak ada produk yang ditemukan.
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>

<?php
include 'layout/footer.php';
?>
