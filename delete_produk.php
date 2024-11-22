<?php
include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM tb_produk WHERE id_produk='$id'");
if ($query) {
    echo "<script>";
    echo "alert('Delete produk Berhasil!');";
    echo "window.location.replace('produk.php')";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert('Delete produk Gagal!');";
    echo "window.location.replace('produk.php')";
    echo "</script>";
}
