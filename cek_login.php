<?php
session_start();
include 'koneksi.php';

$data_user = $_POST['email'];
$data_password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM multi_user WHERE email='$data_user' AND password='$data_password'");

if (mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_assoc($query);

    $_SESSION['email'] = $data_user;
    $_SESSION['role'] = $row['role'];
    $_SESSION['login'] = true;

    if ($row['role'] == 'admin') {
        header("location:produk.php"); 
    } elseif ($row['role'] == 'user') {
        header("location:home.php"); 
    }
} else {
    echo "<script>
            alert('Email atau Password salah!');
            window.location.replace('index.php');
          </script>";
}
?>