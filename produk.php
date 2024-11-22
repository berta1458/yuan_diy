<?php
include 'layout/header2.php';
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
                  <div class="order-place"><a class="btn btn-primary" href="tambah_produk.php">Tambah Produk </a></div>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Deskripsi</th>
                      <th>Harga</th>
                      <th>Stok</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "koneksi.php";
                    $no = 1;
                    $data = mysqli_query($conn, "select * from tb_produk");
                    while ($row = mysqli_fetch_array($data)) {
                      $nomor = $no++;
                      echo '<tr>';
                        echo "<td>$nomor</td>";
                        echo "<td>$row[nama]</td>";
                        echo "<td>$row[deskripsi]</td>";
                        echo "<td>$row[harga]</td>";
                        echo "<td>$row[stok]</td>";
                        echo "<td><img src='gambar/$row[gambar]' alt='' style='width:80px'></td>";
                        echo '<td>';
                          echo '<ul class="action">';
                            echo '<li class="edit"> <a href="edit_produk.php?id='.$row['id_produk'].'"><i class="far fa-edit"></i></a></li>';
                            echo '<li class="delete"><a href="delete_produk.php?id='.$row['id_produk'].'"><i class="far fa-trash-alt"></i></a></li>';
                        echo'</ul>';
                        echo'</td>';
                      echo'</tr>';
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