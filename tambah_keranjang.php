<?php
session_start();
include 'koneksi.php';

$id_produk = $_POST['id'];
$jumlah = $_POST['jumlah'];

$result = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = '$id_produk'");
$produk = mysqli_fetch_assoc($result);

if (isset($_SESSION['keranjang'][$id_produk])) {
    $jumlah_di_keranjang = $_SESSION['keranjang'][$id_produk]['jumlah'];
    $total_jumlah = $jumlah_di_keranjang + $jumlah;
} else {
    $total_jumlah = $jumlah;
}

if ($produk['stok'] >= $total_jumlah) {
    if (isset($_SESSION['keranjang'][$id_produk])) {
        $_SESSION['keranjang'][$id_produk]['jumlah'] = $total_jumlah;
        $_SESSION['keranjang'][$id_produk]['subtotal'] = $_SESSION['keranjang'][$id_produk]['harga'] * $total_jumlah;
    } else {
        $_SESSION['keranjang'][$id_produk] = [
            'id' => $id_produk,
            'nama' => $produk['nama'],
            'harga' => $produk['harga'],
            'gambar' => $produk['gambar'],
            'jumlah' => $jumlah,
            'subtotal' => $produk['harga'] * $jumlah,
        ];
    }

    echo "<script>";
    echo "alert('Berhasil ditambah ke keranjang');";
    echo "window.location.replace('home.php')";
    echo "</script>";
    exit();
} else {
    echo "<script>";
    echo "alert('Stok tidak cukup!');";
    echo "window.location.replace('home.php')";
    echo "</script>";
}
