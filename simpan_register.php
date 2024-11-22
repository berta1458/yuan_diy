<?php
    include "koneksi.php";
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = 'user';

    $query = mysqli_query($conn, "INSERT INTO multi_user VALUES (null, '$nama', '$password', '$email', '$alamat', '$role')");
    if ($query) {
        echo "<script>";
        echo "alert('Simpan Akun Berhasil!');";
        echo "window.location.replace('index.php')";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Simpan Akun Gagal!');";
        echo "window.location.replace('register.php')";
        echo "</script>";
    }
    
?>