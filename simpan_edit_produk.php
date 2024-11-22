<?php
    include "koneksi.php";
    $produk = $_POST['produk'];
    $deskripsi =$_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $rand = rand();
    $ekstensi = array('png','jpg','jpeg','gif');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($ext,$ekstensi)){
        echo "<script>";
        echo "alert('Berhasil Ekstensi!!!!');";
        echo "window.location.replace('produk.php')";
        echo "</script>";
    }if(!$filename){
        $query = "INSERT INTO tb_produk VALUES (null, '$produk', '$deskripsi', '$harga', '$stok', '')";
    }else{
        if($ukuran < 1044070){
            $xx = $rand.'.'.$ext;
            move_uploaded_file($_FILES['foto']['tmp_name'],'gambar/'.$rand.'.'.$ext);
            $query = "INSERT INTO tb_produk VALUES (null, '$produk', '$deskripsi', '$harga', '$stok', '$xx')";
        }else{
            echo "<script>";
            echo "alert('Gagal ukuran file!!!');";
            echo "window.location.replace('produk.php')";
            echo "</script>";
        }
    }
    
    if ($query) {
        echo "<script>";
        echo "alert('Edit Produk Berhasil!');";
        echo "window.location.replace('produk.php')";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Edit Produk Gagal!');";
        echo "window.location.replace('tambah_produk.php')";
        echo "</script>";
    }
?>