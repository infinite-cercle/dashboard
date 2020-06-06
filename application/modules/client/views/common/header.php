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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">

    <?php if(isset($injector_top)){ foreach ($injector_top as $key => $injector) { ?>
      <?php echo $injector; ?>
    <?php } } ?>
    <script type="text/javascript">
      const BASE_URL = '<?php echo CLIENT_BASE_URL; ?>';
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
              <a href="" class="" data-toggle="tooltip" title=""><i data-feather="message-square"></i></a>
              <!-- Add class="new" in anchor tag for new notifications -->
              <a href="<?php echo CLIENT_BASE_URL; ?>notifications" class="<?php echo ($active_main_menu == 'notifications')?'active-notification':''; ?>" data-toggle="tooltip" title=""><i data-feather="bell"></i></a>
            </div>
          </div>
          <div class="aside-loggedin-user">
            <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
              <h6 class="tx-semibold mg-b-0"><?php if(strlen($log_info['fld_company']) > 18){ echo ucwords(strtolower(substr($log_info['fld_company'], 0,18))).'...'; } else { echo ucwords($log_info['fld_company']); } ?></h6>
              <i data-feather="chevron-down"></i>
            </a>
            <p class="tx-color-03 tx-12 mg-b-0"><?php if(strlen($log_info['fld_company']) > 18){ echo ucwords(strtolower(substr($log_info['fld_company'], 0,18))).'...'; } else { echo ucwords($log_info['fld_company']); } ?></p>
          </div>
          <div class="collapse <?php echo ($active_main_menu == 'profile' || $active_main_menu == 'faq')?'active show':''; ?>" id="loggedinMenu">
            <ul class="nav nav-aside mg-b-0">
              <li class="nav-item <?php echo ($active_sub_menu == 'profile')?'active':''; ?>"><a href="<?php echo CLIENT_BASE_URL; ?>profile" class="nav-link"><i data-feather="user"></i> <span>View Profile</span></a></li>
              <li class="nav-item <?php echo ($active_sub_menu == 'contacts')?'active':''; ?>"><a href="<?php echo CLIENT_BASE_URL; ?>contacts" class="nav-link"><i data-feather="book-open"></i> <span>Contacts</span></a></li>
              <li class="nav-item <?php echo ($active_main_menu == 'faq')?'active':''; ?>"><a href="<?php echo CLIENT_BASE_URL; ?>frequently-asked-question" class="nav-link"><i data-feather="help-circle"></i> <span>Help Center</span></a></li>
              <li class="nav-item"><a href="<?php echo CLIENT_BASE_URL; ?>logout" class="nav-link"><i data-feather="log-out"></i> <span>Sign Out</span></a></li>
            </ul>
          </div>
        </div><!-- aside-loggedin -->
        <ul class="nav nav-aside">
          <li class="nav-label">Dashboard</li>
          <li class="nav-item <?php echo ($active_main_menu == 'dashboard')?'active show':''; ?>"><a href="<?php echo CLIENT_BASE_URL; ?>dashboard" class="nav-link"><i data-feather="globe"></i> <span>Home</span></a></li>
          <li class="nav-label mg-t-25">Official</li>
          <li class="nav-item with-sub <?php echo ($active_main_menu == 'sites')?'active show':''; ?>">
            <a href="" class="nav-link"><i data-feather="users"></i> <span>Sites</span></a>
            <ul>
              <li class="<?php echo ($active_sub_menu == 'add_site')?'active':''; ?>"><a href="<?php echo CLIENT_BASE_URL; ?>add-new-site">Add new site</a></li>
              <li class="<?php echo ($active_sub_menu == 'existing_site')?'active':''; ?>"><a href="<?php echo CLIENT_BASE_URL; ?>existing-site">Existing sites</a></li>
            </ul>
          </li>
          <li class="nav-item with-sub <?php echo ($active_main_menu == 'pickup')?'active show':''; ?>">
            <a href="" class="nav-link"><i data-feather="trash"></i> <span>Pickup requests</span></a>
            <ul>
              <li class="<?php echo ($active_sub_menu == 'new_pickup')?'active':''; ?>"><a href="<?php echo CLIENT_BASE_URL; ?>new-pickup-request">New request</a></li>
              <li class="<?php echo ($active_sub_menu == 'existing_pickup')?'active':''; ?>"><a href="<?php echo CLIENT_BASE_URL; ?>existing-pickup-request">Earlier Pickups</a></li>
              <li class="<?php echo ($active_sub_menu == 'sensor')?'active':''; ?>"><a href="<?php echo CLIENT_BASE_URL; ?>sensor-alert">Sensor alert</a></li>
            </ul>
          </li>
          <li class="nav-item"><a href="" class="nav-link"><i data-feather="tag"></i> <span>Manage Bids</span></a></li>
          <li class="nav-item with-sub <?php echo ($active_main_menu == 'reports')?'active show':''; ?>">
            <a href="" class="nav-link"><i data-feather="trash"></i> <span>Reports</span></a>
            <ul>
              <li class="<?php echo ($active_sub_menu == 'site_report')?'active':''; ?>"><a href="<?php echo CLIENT_BASE_URL; ?>site-report">Site Report</a></li>
              <li class="<?php echo ($active_sub_menu == 'carbon_footprint')?'active':''; ?>"><a href="<?php echo CLIENT_BASE_URL; ?>pickup-carbon-fotprints">Carbon Footprint</a></li>
              <!-- <li class=""><a href="<?php echo CLIENT_BASE_URL; ?>existing-pickup-request">Benefits</a></li> -->
            </ul>
          </li>

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