<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['email'])) {
    echo "<script>alert('Anda harus login terlebih dahulu!'); window.location.replace('login.php');</script>";
    exit();
}

if (!isset($_POST['pilih_keranjang']) || count($_POST['pilih_keranjang']) === 0) {
    echo "<script>alert('Tidak ada produk yang dipilih untuk checkout.'); window.location.replace('keranjang.php');</script>";
    exit();
}

if (!isset($_POST['rdo-ani']) || empty($_POST['rdo-ani'])) {
    echo "<script>alert('Metode pembayaran harus dipilih.'); window.location.replace('checkout.php');</script>";
    exit();
}

$email = $_SESSION['email'];
$query_user = mysqli_query($conn, "SELECT id_user FROM multi_user WHERE email='$email'");

if (mysqli_num_rows($query_user) > 0) {
    $row_user = mysqli_fetch_assoc($query_user);
    $id_user = $row_user['id_user'];
} else {
    echo "<script>alert('User tidak ditemukan.'); window.location.replace('home.php');</script>";
    exit();
}

$total_checkout = $_POST['total'];
$pilih_keranjang = $_POST['pilih_keranjang'];

$stmt_order = $conn->prepare("INSERT INTO tb_order (id_user, total_harga) VALUES (?, ?)");
$stmt_order->bind_param("ii", $id_user, $total_checkout);
$stmt_order->execute();
$id_order = $stmt_order->insert_id;

foreach ($pilih_keranjang as $id_produk) {
    foreach ($_SESSION['keranjang'] as $item) {
        if ($item['id'] == $id_produk) {
            $jumlah = $item['jumlah'];
            $query_produk = mysqli_query($conn, "SELECT stok FROM tb_produk WHERE id_produk = '$id_produk'");
            $produk = mysqli_fetch_assoc($query_produk);

            if ($produk['stok'] >= $jumlah) {
                $stmt_item = $conn->prepare("INSERT INTO tb_order_item (id_order, id_produk, quantity) VALUES (?, ?, ?)");
                $stmt_item->bind_param("iii", $id_order, $id_produk, $jumlah);
                $stmt_item->execute();

                $stok_baru = $produk['stok'] - $jumlah;
                mysqli_query($conn, "UPDATE tb_produk SET stok = '$stok_baru' WHERE id_produk = '$id_produk'");
            } else {
                echo "<script>alert('Stok tidak cukup untuk " . $item['nama'] . "'); window.location.replace('keranjang.php');</script>";
                exit();
            }
        }
    }
}

unset($_SESSION['keranjang']);
echo "<script>alert('Checkout berhasil!'); window.location.replace('email_order_sukses.php');</script>";
exit();
?>
