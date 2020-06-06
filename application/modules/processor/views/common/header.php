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

    <title><?php echo $page_title; ?></title>

    <!-- vendor css -->
    <link href="<?php echo base_url(); ?>lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>lib/jqvmap/jqvmap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashforge.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashforge.dashboard.css">

    <?php if(isset($injector_top)){ foreach ($injector_top as $key => $injector) { ?>
      <?php echo $injector; ?>
    <?php } } ?>
    <script type="text/javascript">
      const BASE_URL = '<?php echo PROCESSOR_BASE_URL; ?>';
    </script>

  </head>
  <body>

    <aside class="aside aside-fixed">
      <div class="aside-header">
        <a href="<?php echo base_url(); ?>" class="aside-logo">think<span>Trash</span></a>
        <a href="" class="aside-menu-link">
          <i data-feather="menu"></i>
          <i data-feather="x"></i>
        </a>
      </div>
      <div class="aside-body">
        <div class="aside-loggedin">
          <div class="d-flex align-items-center justify-content-start">
            <a href="" class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></a>
            <div class="aside-alert-link">
              <a href="" class="new" data-toggle="tooltip" title="You have 2 unread messages"><i data-feather="message-square"></i></a>
              <a href="" class="new" data-toggle="tooltip" title="Pickup Timeline"><i data-feather="bell"></i></a>
              <a href="<?php echo base_url(); ?>" data-toggle="tooltip" title="Sign out"><i data-feather="log-out"></i></a>
            </div>
          </div>
          <div class="aside-loggedin-user">
            <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
              <h6 class="tx-semibold mg-b-0"><?php if(strlen($log_info['fld_company']) > 18){ echo ucwords(strtolower(substr($log_info['fld_company'], 0,18))).'...'; } else { echo ucwords($log_info['fld_company']); } ?></h6>
              <i data-feather="chevron-down"></i>
            </a>
            <p class="tx-color-03 tx-12 mg-b-0"><?php if(strlen($log_info['fld_company']) > 18){ echo ucwords(strtolower(substr($log_info['fld_company'], 0,18))).'...'; } else { echo ucwords($log_info['fld_company']); } ?></p>
          </div>
          <div class="collapse <?php echo ($active_main_menu == 'profile')?'active show':''; ?>" id="loggedinMenu">
            <ul class="nav nav-aside mg-b-0">
              <li class="nav-item <?php echo ($active_sub_menu == 'profile')?'active':''; ?>"><a href="<?php echo PROCESSOR_BASE_URL; ?>profile" class="nav-link"><i data-feather="user"></i> <span>View Profile</span></a></li>
              <li class="nav-item"><a href="" class="nav-link"><i data-feather="help-circle"></i> <span>Help Center</span></a></li>
              <li class="nav-item"><a href="<?php echo PROCESSOR_BASE_URL; ?>logout" class="nav-link"><i data-feather="log-out"></i> <span>Sign Out</span></a></li>
            </ul>
          </div>
        </div><!-- aside-loggedin -->
        <ul class="nav nav-aside">
          <li class="nav-label">Dashboard</li>
          <li class="nav-item <?php echo ($active_main_menu == 'dashboard')?'active show':''; ?>"><a href="<?php echo PROCESSOR_BASE_URL; ?>dashboard" class="nav-link"><i data-feather="globe"></i> <span>Home</span></a></li>
          <li class="nav-label mg-t-25">Official</li>
          <li class="nav-item with-sub <?php echo ($active_main_menu == 'pickup')?'active show':''; ?>">
            <a href="" class="nav-link"><i data-feather="trash"></i> <span>Pickup requests</span></a>
            <ul>
              <li class="<?php echo ($active_sub_menu == 'existing_pickup')?'active':''; ?>"><a href="<?php echo PROCESSOR_BASE_URL; ?>all-pickup-request">Show all Requests</a></li>
            </ul>
          </li>
          <li class="nav-item with-sub <?php echo ($active_main_menu == 'trasport')?'active show':''; ?>">
            <a href="" class="nav-link"><i data-feather="truck"></i> <span>Transport</span></a>
            <ul>
              <li class="<?php echo ($active_sub_menu == 'new_transport')?'active':''; ?>"><a href="<?php echo PROCESSOR_BASE_URL; ?>new-transport">New Transport</a></li>
              <li class="<?php echo ($active_sub_menu == 'existing_transports')?'active':''; ?>"><a href="<?php echo PROCESSOR_BASE_URL; ?>existing-transports">Existing Transports</a></li>
            </ul>
          </li>
          <li class="nav-item"><a href="" class="nav-link"><i data-feather="tag"></i> <span>Manage Bids</span></a></li>

          <!-- <li class="nav-label mg-t-25">Pages</li>
          <li class="nav-item with-sub">
            <a href="" class="nav-link"><i data-feather="user"></i> <span>User Pages</span></a>
            <ul>
              <li><a href="page-profile-view.html">View Profile</a></li>
              <li><a href="page-connections.html">Connections</a></li>
              <li><a href="page-groups.html">Groups</a></li>
              <li><a href="page-events.html">Events</a></li>
            </ul>
          </li>
          <li class="nav-item with-sub">
            <a href="" class="nav-link"><i data-feather="file"></i> <span>Other Pages</span></a>
            <ul>
              <li><a href="page-timeline.html">Timeline</a></li>
            </ul>
          </li>
          <li class="nav-label mg-t-25">User Interface</li>
          <li class="nav-item"><a href="<?php echo base_url(); ?>components" class="nav-link"><i data-feather="layers"></i> <span>Components</span></a></li>
          <li class="nav-item"><a href="<?php echo base_url(); ?>collections" class="nav-link"><i data-feather="box"></i> <span>Collections</span></a></li> -->
        </ul>
      </div>
    </aside>