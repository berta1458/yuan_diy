<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" href="assets/images/logo/logoo.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/logoo.png" type="image/x-icon">
    <title>Yuan DIY</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  </head>
  <body>
    <div class="loader-wrapper">
      <div class="loader"></div>
    </div>
    <div class="container-fluid p-0"> 
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card">
            <div>
              <div><a class="logo text-center" href="register.php"><img class="img-fluid for-light" src="assets/images/logo/logoo.png" alt="loginpage"></a></div>
              <div class="login-main"> 
                <form class="theme-form" action="simpan_register.php" method="post">
                  <h4 class="text-center">Buat akun</h4>
                  <p class="text-center">Masukkan data pribadi anda untuk membuat akun</p>
                  <div class="form-group">
                    <label class="col-form-label pt-0">Nama</label>
                    <div class="row g-2">
                      <div class="col-12">
                        <input class="form-control" name="nama" type="text" required="" placeholder=" Nama">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Alamat</label>
                    <input class="form-control" name="alamat" type="text" required="" placeholder="Alamat">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Email</label>
                    <input class="form-control" name="email" type="email" required="" placeholder="Test@gmail.com">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" name="password" required="" placeholder="*********">
                      <div class="show-hide"><span class="show"></span></div>
                    </div>
                  </div>
                    <button class="btn btn-primary btn-block w-100 mt-3" type="submit" >Buat Akun</button>
                    <p class="mt-4 mb-0 text-center">Sudah punya akun?<a class="ms-2" href="login.php">Login</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
      <script src="assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="assets/js/icons/feather-icon/feather-icon.js"></script>
      <script src="assets/js/config.js"></script>
      <script src="assets/js/script.js"></script>
    </div>
  </body>

</html>