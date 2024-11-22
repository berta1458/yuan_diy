<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($conn, "DELETE o, oi 
                                  FROM tb_order AS o 
                                  JOIN tb_order_item AS oi 
                                  ON o.id_order = oi.id_order 
                                  WHERE o.id_order = '$id'");

    if ($query) {
        echo "<script>";
        echo "alert('Delete order Berhasil!');";
        echo "window.location.replace('order.php');";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Delete order Gagal!');";
        echo "window.location.replace('order.php');";
        echo "</script>";
    }
} else {
    echo "<script>";
    echo "alert('ID not provided!');";
    echo "window.location.replace('order.php');";
    echo "</script>";
}
?>
