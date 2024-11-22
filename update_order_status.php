<?php
session_start();
include 'koneksi.php';

if (isset($_GET['id_order']) && isset($_GET['action'])) {
    $id_order = $_GET['id_order'];
    $action = $_GET['action'];

    if (!isset($_SESSION['sent_orders'])) {
        $_SESSION['sent_orders'] = [];
    }

    if (!isset($_SESSION['completed_orders'])) {
        $_SESSION['completed_orders'] = [];
    }

    if ($action === 'sent') {
        if (!in_array($id_order, $_SESSION['sent_orders'])) {
            $_SESSION['sent_orders'][] = $id_order;
        }
    } elseif ($action === 'completed') {
        if (!in_array($id_order, $_SESSION['completed_orders'])) {
            $_SESSION['completed_orders'][] = $id_order;
        }

        if (in_array($id_order, $_SESSION['sent_orders'])) {
            $_SESSION['sent_orders'] = array_diff($_SESSION['sent_orders'], [$id_order]);
        }
    }

    $redirect = isset($_GET['redirect']) && $_GET['redirect'] === 'checkout2' ? 'checkout2.php' : 'order.php';
    header("Location: $redirect");
    exit;
} else {
    header("Location: order.php");
    exit;
}
?>
