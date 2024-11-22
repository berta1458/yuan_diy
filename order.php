<?php
session_start();
include 'layout/header2.php';
include 'koneksi.php';
?>

<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="page-body-wrapper">
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Order</th>
                                            <th>Pemesan</th>
                                            <th>Alamat</th>
                                            <th>Detail</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $data = mysqli_query($conn, "
                                            SELECT 
                                                o.tanggal_beli as tgl, 
                                                u.nama as nama, u.alamat as alamat, 
                                                o.id_order as id_order
                                            FROM tb_order as o 
                                            JOIN multi_user as u ON u.id_user = o.id_user
                                        ");

                                        while ($row = mysqli_fetch_array($data)) {
                                            $orderId = $row['id_order'];

                                            $items = mysqli_query($conn, "
                                                SELECT 
                                                    p.nama as produk, 
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
                                            <tr>
                                                <td><?php echo date('d M Y', strtotime($row['tgl'])); ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['alamat']; ?></td>
                                                <td style="display: flex; justify-content: center; align-items: center;">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalDetail<?= $row['id_order']; ?>" class="action-icon">
                                                        <i class="fa-solid fa-magnifying-glass"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (isset($_SESSION['completed_orders']) && in_array($row['id_order'], $_SESSION['completed_orders'])) {
                                                        echo 'Selesai';
                                                    } elseif (isset($_SESSION['sent_orders']) && in_array($row['id_order'], $_SESSION['sent_orders'])) {
                                                        echo 'Dikirim';
                                                    } else {
                                                        echo 'Dikemas';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <ul class="action">
                                                        <li class="delete">
                                                            <a href='delete_order.php?id=<?= $row['id_order']; ?>'><i class="far fa-trash-alt"></i></a>
                                                        </li>

                                                        <li class="status">
                                                            <?php if (!isset($_SESSION['completed_orders']) || !in_array($row['id_order'], $_SESSION['completed_orders'])) { ?>
                                                                <a href="update_order_status.php?id_order=<?= $row['id_order'] ?>&action=sent" onclick="return confirm('Apakah Pesanan Akan di Kirim?');">
                                                                    <i class="fa-solid fa-truck-fast"></i>
                                                                </a>
                                                            <?php } ?>
                                                        </li>

                                                        <li class="status">
                                                            <?php if (isset($_SESSION['sent_orders']) && in_array($row['id_order'], $_SESSION['sent_orders']) && (!isset($_SESSION['completed_orders']) || !in_array($row['id_order'], $_SESSION['completed_orders']))) { ?>
                                                            <?php } ?>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="modalDetail<?= $row['id_order']; ?>" tabindex="-1" aria-labelledby="modalDetailLabel<?= $row['id_order']; ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalDetailLabel<?= $row['id_order']; ?>">Detail Pesanan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
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
                                                                <strong>Total :</strong>
                                                                <strong>Rp.<?php echo number_format($totalPrice, 0, ',', '.'); ?></strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'layout/footer.php';
    ?>
