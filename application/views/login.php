<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DashForge">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/dashforge">
    <meta property="og:title" content="DashForge">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.png">

    <title>DashForge Responsive Bootstrap 4 Dashboard Template</title>

    <!-- vendor css -->
    <link href="<?php echo base_url(); ?>lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashforge.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashforge.auth.css">
  </head>
  <body>

    <header class="navbar navbar-header navbar-header-fixed">
      <a href="#" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
      <div class="navbar-brand">
        <a href="<?php echo base_url(); ?>" class="df-logo">think<span>Trash</span></a>
      </div><!-- navbar-brand -->
      <div id="navbarMenu" class="navbar-menu-wrapper">
        <div class="navbar-menu-header">
          <a href="<?php echo base_url(); ?>" class="df-logo">think<span>Trash</span></a>
          <a id="mainMenuClose" href=""><i data-feather="x"></i></a>
        </div><!-- navbar-menu-header -->
      </div><!-- navbar-menu-wrapper -->
      <div class="navbar-right">
        <a href="" class="btn btn-social"><i class="fab fa-dribbble"></i></a>
        <a href="" class="btn btn-social"><i class="fab fa-github"></i></a>
        <a href="" class="btn btn-social"><i class="fab fa-twitter"></i></a>
      </div><!-- navbar-right -->
    </header><!-- navbar -->

    <div class="content content-fixed content-auth">
      <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
          <div class="media-body align-items-center d-none d-lg-flex">
            <div class="mx-wd-600">
              <img src="<?php echo base_url(); ?>assets/buckets/18300.jpg" class="img-fluid" alt="">
            </div>
          </div><!-- media-body -->
          <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
                <div class="wd-100p">
                    <form action="" method="post" accept-charset="utf-8">
                      <h3 class="tx-color-01 mg-b-5">Sign In</h3>
                      <p class="tx-color-03 tx-16 mg-b-40">Welcome back! Please signin to continue.</p>

                      <div class="form-group">
                        <label>Email address</label>
                        <input type="text" name="email" class="form-control" placeholder="yourname@yourmail.com">
                      </div>
                      <div class="form-group">
                        <div class="d-flex justify-content-between mg-b-5">
                          <label class="mg-b-0-f">Password</label>
                          <a href="" class="tx-13">Forgot password?</a>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password">
                      </div>
                      <button type="submit" class="btn btn-brand-02 btn-block">Sign In</button>
                    </form>
                </div>
                <div class="tx-13 mg-t-20 tx-center">Don't have an account? <a href="<?php echo base_url(); ?>signup">Sign Up</a></div>
          </div><!-- sign-wrapper -->
        </div><!-- media -->
      </div><!-- container -->
    </div><!-- content -->

    <footer class="footer">
      <div>
        <span>&copy; 2019 ThinkTrash v1.0.0. </span>
        <span>Created by <a href="">Pepaa.co</a></span>
      </div>
      <div>
        <nav class="nav">
          <a href="" class="nav-link">Terms & Conditions</a>
          <a href="" class="nav-link">Privacy Policy</a>
          <a href="" class="nav-link">Get Help</a>
        </nav>
      </div>
    </footer>

    <script src="<?php echo base_url(); ?>lib/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>lib/feather-icons/feather.min.js"></script>
    <script src="<?php echo base_url(); ?>lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/dashforge.js"></script>

    <!-- append theme customizer -->
    <script src="<?php echo base_url(); ?>lib/js-cookie/js.cookie.js"></script>
    <script src="<?php echo base_url(); ?>lib/sweetalert/sweetalert.min.js"></script>

    <script type="text/javascript">
      <?php echo message_box('Welcome'); ?>
      <?php echo message_box('success'); ?>
      <?php echo message_box('error'); ?>
    </script>

  </body>
</html>