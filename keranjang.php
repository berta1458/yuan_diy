<?php
session_start();
include 'layout/header.php';
?>

<div class="page-wrapper compact-wrapper" id="pageWrapper">
  <div class="page-body-wrapper">
    <div class="page-body">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header pb-0">
                <h5>Keranjang</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="order-history table-responsive wishlist">
                    <form action="checkout.php" method="post">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Pilih</th>
                            <th>Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Quantity</th>
                            <th>Aksi</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $total = 0;
                          if (isset($_SESSION['keranjang']) && count($_SESSION['keranjang']) > 0) {
                            foreach ($_SESSION['keranjang'] as $item) {
                              $total += $item['subtotal'];
                          ?>
                              <tr>
                                <td>
                                  <input type="checkbox" name="pilih_keranjang[]" value="<?= $item['id'] ?>">
                                </td>
                                <td><img class="img-fluid img-40" src="gambar/<?= $item['gambar'] ?>" alt="#"></td>
                                <td>
                                  <div class="product-name">
                                    <h6><?= $item['nama'] ?></h6>
                                  </div>
                                </td>
                                <td>Rp.<?= number_format($item['harga'], 0, ',', '.') ?></td>
                                <td>
                                  <input
                                    class="touchspin text-center jumlah-barang"
                                    type="number"
                                    id="jumlah-<?= $item['id'] ?>"
                                    value="<?= $item['jumlah'] ?>"
                                    min="1"
                                    data-harga="<?= $item['harga'] ?>"
                                    onchange="updateQuantity(<?= $item['id'] ?>, <?= $item['harga'] ?>)">
                                </td>
                                <td>
                                <a href="delete_keranjang.php?id=<?= $item['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?');">Hapus</a>
                                </td>
                                <td id="total-harga-<?= $item['id'] ?>">Rp.<?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                              </tr>
                          <?php
                            }
                          } else {
                            echo '<tr><td colspan="7" class="text-center">Keranjang kosong</td></tr>';
                          }
                          ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="6" class="text-end"><strong>Total</strong></td>
                            <td id="total-semua">Rp.<?= number_format($total, 0, ',', '.') ?></td>
                          </tr>
                        </tfoot>
                      </table>
                      <button type="submit" class="btn btn-primary">Checkout</button>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function updateQuantity(itemId, hargaPerItem) {
    var jumlah = document.getElementById('jumlah-' + itemId).value;

    $.ajax({
      url: 'update_keranjang.php',
      type: 'POST',
      data: {
        id: itemId,
        jumlah: jumlah
      },
      dataType: 'json',
      success: function(response) {
        if (response.success) {
          console.log('Jumlah diperbarui.');
          updateTotal(itemId, hargaPerItem);
        } else {
          alert(response.message);
          document.getElementById('jumlah-' + itemId).value = response.max_stok; // Reset to max available stock
        }
      },
      error: function(xhr, status, error) {
        console.error('Terjadi kesalahan: ' + xhr.responseText);
      }
    });
  }

  function updateTotal(itemId, hargaPerItem) {
    var jumlah = document.getElementById('jumlah-' + itemId).value;
    var totalHarga = jumlah * hargaPerItem;

    document.getElementById('total-harga-' + itemId).innerHTML = 'Rp.' + totalHarga.toLocaleString('id-ID');

    var totalKeseluruhan = 0;
    var jumlahProduk = document.querySelectorAll('.jumlah-barang');

    jumlahProduk.forEach(function(input) {
      var hargaPerItem = input.getAttribute('data-harga');
      totalKeseluruhan += input.value * hargaPerItem;
    });

    document.getElementById('total-semua').innerHTML = 'Rp.' + totalKeseluruhan.toLocaleString('id-ID');
  }
</script>
<?php
include 'layout/footer.php';
?>