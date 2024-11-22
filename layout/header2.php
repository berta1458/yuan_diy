<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" href="assets/images/logo/logoos.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/logoos.png" type="image/x-icon">
    <title>Yuan DIY</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/select2.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/owlcarousel.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/range-slider.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/datatables.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
</head>

<body>
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <div class="page-header">
            <div class="header-wrapper row m-0">
                <form class="form-inline search-full col" action="#" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search  .." name="q" title="" autofocus>
                                <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>
                <div class="header-logo-wrapper col-auto p-0">
                    <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="assets/images/logo/login.png" alt=""></a></div>
                    <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
                </div>
                <div class="left-header col horizontal-wrapper ps-0">
                    <div class="page-title">
                        <div class="row" style="margin-right: 10px;">
                            <div class="col-sm-6">
                                <h3>Admin</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-header col horizontal-wrapper ps-0">
                    <div class="product-grid ">
                        <div class="feature-products">
                            <div class="row mb-30 ">
                                <div class=" col-md-15 products-total">
                                    <div class="product-search">
                                        <form>
                                            <div class="form-group m-0">
                                                <span>
                                                    <!-- <input class="form-control" style="width: 555px;" type="search" placeholder="Search.." data-original-title="" title=""> -->
                                                    <!-- <i class="fa fa-search" data-feather="search"></i> -->
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script class="result-template" type="text/x-handlebars-template">
                    <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
          </script>
                <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
            </div>
        </div>
        <div class="page-body-wrapper">
            <div class="sidebar-wrapper">
                <div>
                    <div class="logo-wrapper"><img class="img-fluid for-light" src="assets/images/logo/logoo.png" alt=""></a>
                        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                        <div class="toggle-sidebar"><i class="fa fa-cog status_toggle middle sidebar-toggle"> </i></div>
                    </div>
                    <div class="logo-icon-wrapper"><a href="home.php"><img class="img-fluid" src="assets/images/logo/logoos.png" alt=""></a></div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">
                                <li class="back-btn"><a href="home.php"><img class="img-fluid" src="assets/images/logo/logoo.png" alt=""></a>
                                    <div class="mobile-back text-end"><span>Back</span><i class="fa-solid fa-arrow-right"></i></div>
                                </li>
                                <li class="menu-box">
                                    <ul>
                                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="produk.php"><i data-feather="server"> </i><span>Data Produk</span></a></li>
                                        <li class="sidebar-list"> <a class="sidebar-link sidebar-title link-nav" href="user.php"><i data-feather="user"> </i><span>Data User</span></a></li>
                                        <li class="sidebar-list"> <a class="sidebar-link sidebar-title link-nav" href="order.php"><i data-feather="file-text"> </i><span>Data Order</span></a></li>
                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title link-nav" href="#" onclick="confirmLogout(event)">
                                                <i class="fa-solid fa-right-from-bracket"></i><span>Logout</span>
                                            </a>
                                        </li>

                                        <script>
                                            function confirmLogout(event) {
                                                event.preventDefault();
                                                const userConfirmed = confirm("Apakah Anda yakin ingin logout?");
                                                if (userConfirmed) {
                                                    window.location.href = "logout.php";
                                                }
                                            }
                                        </script>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </nav>
                </div>
            </div>