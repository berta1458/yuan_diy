<?php
session_start();
include 'layout/header.php';
include 'koneksi.php';

$email_session = $_SESSION['email'] ?? '';
$nama = '';
$email = '';
$alamat = '';

if ($email_session) {
    $query = "SELECT * FROM multi_user WHERE email = '$email_session'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $nama = $user['nama'];
        $email = $user['email'];
        $alamat = $user['alamat'];
    }
}

$pilih_keranjang = $_POST['pilih_keranjang'] ?? [];
$produk_terpilih = [];
$total_checkout = 0;

if (isset($_SESSION['keranjang']) && is_array($_SESSION['keranjang'])) {
    foreach ($_SESSION['keranjang'] as $item) {
        if (in_array($item['id'], $pilih_keranjang)) {
            $produk_terpilih[] = $item;
            $total_checkout += $item['subtotal'];
        }
    }
}
?>

<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="page-body-wrapper">
        <div class="page-body">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Billing Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 col-sm-12">
                                <form>
                                    <div class="mb-3">
                                        <label for="nama">Nama</label>
                                        <input class="form-control" id="nama" type="text" value="<?= $nama ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input class="form-control" id="email" type="email" value="<?= $email ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat">Alamat</label>
                                        <input class="form-control" id="alamat" type="text" value="<?= $alamat ?>" readonly>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xl-6 col-sm-12">
                                <div class="checkout-details">
                                    <div class="order-box">
                                        <div class="title-box">
                                            <h4 class="mb-0">Produk </h4><span>Total</span>
                                        </div>
                                        <ul class="qty">
                                            <?php
                                            if (count($produk_terpilih) > 0) {
                                                foreach ($produk_terpilih as $item) {
                                            ?>
                                                    <li><?= $item['nama'] ?> <span>Rp.<?= number_format($item['subtotal'], 0, ',', '.') ?></span></li>
                                            <?php
                                                }
                                            } else {
                                                echo '<li class="text-center">Tidak ada produk yang dipilih</li>';
                                            }
                                            ?>
                                        </ul>
                                        <ul class="sub-total total">
                                            <li>Total <span class="count">Rp.<?= number_format($total_checkout, 0, ',', '.') ?></span></li>
                                        </ul>
                                        
                                        <form action="checkout_produk.php" method="post">
                                            <input type="hidden" name="total" value="<?= $total_checkout ?>">

                                            <?php foreach ($pilih_keranjang as $id_produk): ?>
                                                <input type="hidden" name="pilih_keranjang[]" value="<?= $id_produk ?>">
                                            <?php endforeach; ?>
                                            <div class="animate-chk">
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="d-block" for="edo-ani1">
                                                            <p>Pembayaran</p>
                                                            <input class="radio_animated" id="edo-ani1" type="radio" name="rdo-ani" value="COD" required> Cash On Delivery
                                                        </label>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <button class="btn btn-primary" type="submit">Order</button>
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
