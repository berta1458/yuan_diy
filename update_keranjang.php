<?php
session_start();
include 'koneksi.php';

$id_produk = $_POST['id'];
$jumlah_baru = $_POST['jumlah'];

if (isset($_SESSION['keranjang'][$id_produk])) {
    $harga = $_SESSION['keranjang'][$id_produk]['harga'];
    $jumlah_sekarang = $_SESSION['keranjang'][$id_produk]['jumlah'];

    $selisih_jumlah = $jumlah_baru - $jumlah_sekarang;

    $result = mysqli_query($conn, "SELECT stok FROM tb_produk WHERE id_produk = '$id_produk'");
    $produk = mysqli_fetch_assoc($result);

    if ($produk['stok'] >= $jumlah_baru) {
        $_SESSION['keranjang'][$id_produk]['jumlah'] = $jumlah_baru;
        $_SESSION['keranjang'][$id_produk]['subtotal'] = $harga * $jumlah_baru;

        $stok_baru = $produk['stok'] - $selisih_jumlah;
        mysqli_query($conn, "UPDATE tb_produk SET stok = '$stok_baru' WHERE id_produk = '$id_produk'");

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Stok tidak cukup!']);
    }
}
?>
