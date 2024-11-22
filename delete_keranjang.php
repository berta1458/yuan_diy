<?php
session_start();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: keranjang.php');
    exit;
}

$id_produk = intval($_GET['id']); 

if (isset($_SESSION['keranjang'][$id_produk])) {
    unset($_SESSION['keranjang'][$id_produk]); 
}

header('Location: keranjang.php');
exit;
?>
