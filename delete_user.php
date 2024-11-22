<?php
    include "koneksi.php";

    $id = $_GET['id'];

    $query = mysqli_query($conn, "DELETE FROM multi_user WHERE id_user='$id'");
    if ($query) {
        echo "<script>";
        echo "alert('Delete user Berhasil!');";
        echo "window.location.replace('user.php')";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Delete user Gagal!');";
        echo "window.location.replace('user.php')";
        echo "</script>";
    }
?>