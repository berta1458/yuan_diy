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
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include "koneksi.php";
                    $no = 1;
                    $data = mysqli_query($conn, "select * from multi_user");
                    while ($row = mysqli_fetch_array($data)) {
                    ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td>
                          <?php
                          echo '<ul class="action">';
                            echo '<li class="delete"><a href="delete_user.php?id='.$row['id_user'].'"><i class="far fa-trash-alt"></i></a></li>';
                          echo '</ul>';
                          ?>
                        </td>
                      </tr>
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