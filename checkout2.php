<?php
session_start();
include 'layout/header.php';
include 'koneksi.php';

$email = $_SESSION['email'];

$query_user = mysqli_query($conn, "SELECT id_user FROM multi_user WHERE email='$email'");
if (mysqli_num_rows($query_user) > 0) {
    $row_user = mysqli_fetch_assoc($query_user);
    $id_user = $row_user['id_user'];
} else {
    echo "User not found!";
    exit();
}
?>

<div class="page-body">
    <div class="container-fluid">
        <h5>Riwayat Pesanan</h5>
        <div class="row">
            <?php
            $query_checkout = mysqli_query($conn, "
                SELECT o.id_order, o.tanggal_beli
                FROM tb_order as o
                WHERE o.id_user = $id_user
                ORDER BY o.tanggal_beli DESC
            ");

            while ($row = mysqli_fetch_assoc($query_checkout)) {
                $orderId = $row['id_order'];

                $items = mysqli_query($conn, "
                    SELECT 
                        p.nama as produk, 
                        p.gambar, 
                        oi.quantity as jumlah, 
                        (oi.quantity * p.harga) as subtotal 
                    FROM tb_produk as p 
                    JOIN tb_order_item as oi ON oi.id_produk = p.id_produk 
                    WHERE oi.id_order = '$orderId'
                ");

                $productList = [];
                $totalPrice = 0;

                while ($item = mysqli_fetch_array($items)) {
                    $productList[] = $item;
                    $totalPrice += $item['subtotal'];
                }
            ?>
                <div class="col-12"> 
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-12"> 
                                <div class="card-body">
                                    <h4>Detail Pesanan</h4>
                                    <hr>
                                    Tanggal Order : <?= date('d M Y', strtotime($row['tanggal_beli'])) ?>
                                    <hr>
                                    <ul class="list-group">
                                        <?php foreach ($productList as $product) { ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <?php echo $product['produk'] . " (" . $product['jumlah'] . ")"; ?>
                                                <span>Rp.<?php echo number_format($product['subtotal'], 0, ',', '.'); ?></span>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <span>Total :</span>
                                        <span>Rp.<?php echo number_format($totalPrice, 0, ',', '.'); ?></span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <strong>Status Pesanan :</strong>
                                        <strong>
                                            <?php
                                            if (isset($_SESSION['completed_orders']) && in_array($orderId, $_SESSION['completed_orders'])) {
                                                echo 'Sudah Diterima';
                                            } elseif (isset($_SESSION['sent_orders']) && in_array($orderId, $_SESSION['sent_orders'])) {
                                                echo 'Sedang Dikirim';
                                            } else {
                                                echo 'Sedang Dikemas';
                                            }
                                            ?>
                                        </strong>
                                    </div>
                                    <?php if (isset($_SESSION['sent_orders']) && in_array($orderId, $_SESSION['sent_orders'])) { ?>
                                        <div class="d-flex justify-content-end mt-2">
                                            <a href="update_order_status.php?id_order=<?= $orderId ?>&action=completed&redirect=checkout2"
                                                class="btn btn-success btn-sm"
                                                onclick="return confirm('Apakah Anda yakin telah menerima pesanan?');">
                                                Diterima
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php
include 'layout/footer.php';
?>