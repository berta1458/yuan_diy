<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['produk']; 
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    
    if (empty($nama) || empty($deskripsi) || empty($harga) || empty($stok)) { 
        echo "<script>";
        echo "alert('Tambah tidak berhasil, isi semua data produk terlebih dahulu');";
        echo "window.location.replace('tambah_produk.php');";
        echo "</script>";
        exit;
    }

    $rand = rand();
    $ekstensi = array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!$filename) {
        $query = "INSERT INTO tb_produk (nama, deskripsi, harga, stok, gambar) 
                  VALUES ('$nama', '$deskripsi', '$harga', '$stok', '')";
    } else {
        if (!in_array($ext, $ekstensi)) {
            echo "<script>";
            echo "alert('Ekstensi file tidak valid. Hanya PNG, JPG, JPEG, dan GIF yang diperbolehkan.');";
            echo "window.location.replace('produk.php');";
            echo "</script>";
            exit;
        }

        if ($ukuran > 1044070) {
            echo "<script>";
            echo "alert('Ukuran file terlalu besar. Ukuran maksimum adalah 1MB.');";
            echo "window.location.replace('produk.php');";
            echo "</script>";
            exit;
        }

        $xx = $rand . '.' . $ext;
        move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/' . $xx);

        $query = "INSERT INTO tb_produk (nama, deskripsi, harga, stok, gambar) 
                  VALUES ('$nama', '$deskripsi', '$harga', '$stok', '$xx')"; 
    }

    $query = mysqli_query($conn, $query);

    if ($query) {
        echo "<script>";
        echo "alert('Produk berhasil ditambahkan!');";
        echo "window.location.replace('produk.php');";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Gagal menambahkan produk!');";
        echo "window.location.replace('tambah_produk.php');";
        echo "</script>";
    }
}
?>
