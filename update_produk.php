<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$id = $_POST['id_produk'];

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
        $query = "UPDATE tb_produk SET nama='$nama', deskripsi='$deskripsi', harga='$harga', stok='$stok' WHERE id_produk=$id";
    }else{
        if($ukuran < 1044070){
            $xx = $rand.'.'.$ext;
            move_uploaded_file($_FILES['foto']['tmp_name'],'gambar/'.$rand.'.'.$ext);
            $query = "UPDATE tb_produk SET nama='$nama', deskripsi='$deskripsi', harga='$harga', stok='$stok', gambar='$xx' WHERE id_produk=$id";
        }else{
            echo "<script>";
            echo "alert('Gagal ukuran file!!!');";
            echo "window.location.replace('produk.php')";
            echo "</script>";
        }
    }

    $query = mysqli_query($conn, $query);

if ($query) {
  echo "<script>";
  echo "alert('Update Data Berhasil!!!');";
  echo "window.location.replace('produk.php')";
  echo "</script>";
}else{
  echo "<script>";
        echo "alert('Update Data Gagal!!!');";
        echo "window.location.replace('produk.php')";
        echo "</script>";
}
?>