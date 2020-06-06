<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pickup requests</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Your existing pickup requests</h4>
      </div>
      <!-- <div class="d-none d-md-block">
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail" class="wd-10 mg-r-5"></i> Email</button>
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
        <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
      </div> -->
    </div>

    <div class="row row-xs">
      <div class="col-md-12">
        <div data-label="Client List" class="df-example demo-table">
          <table id="existing-pickup-request-table" class="table">
            <thead>
              <tr>
                <th class="wd-3p">S.No</th>
                <!-- <th class="wd-10p">Req. Date</th> -->
                <th class="wd-20p">Location</th>
                <th class="wd-10p">Type of waste</th>
                <th class="wd-10p">Quantity</th>
                <th class="wd-15p">Loading Men</th>
                <th class="wd-10p">Photos</th>
                <th class="wd-15p">Incharge</th>
                <th class="wd-12p">Phone no.</th>
                <th class="wd-5p">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if(!empty($pickups)){ $x = 1;
                  foreach ($pickups as $key => $pickup) { ?>
                    <tr>
                      <td><?php echo $x; ?></td>
                      <!-- <td><?php echo date('d/m/y', strtotime($pickup['fld_date_created'])); ?></td> -->
                      <td><?php echo $pickup['fld_location']; ?></td>
                      <td>
                        <?php if(!empty($pickup['wastes'])) { $wastes = array( '1' => 'Paper', '2' => 'Plastic', '3' => 'Glass', '4' => 'Metal' );
                        foreach ($pickup['wastes'] as $key => $value) { ?>
                          <span class="badge badge-pill badge-<?php echo strtolower($wastes[$value]); ?>"><?php echo ucfirst($wastes[$value]); ?></span>
                        <?php } } ?>
                      </td>
                      <td><?php echo number_format($pickup['fld_qty'], 0).'<small class="text-danger font-weight-bold">tons</small>'; ?></td>
                      <td>
                        <?php if($pickup['fld_is_loadingman_req'] == 0) { ?>
                          <span class="badge badge-pill badge-danger">No</span>
                        <?php } else { ?>
                          <span class="badge badge-pill badge-success">Yes</span>
                        <?php } ?>
                      </td>
                      <td>
                        <?php
                          if($pickup['fld_is_images'] == 0){
                            echo '<span class="badge badge-pill badge-warning">No Images</span>';
                          } else {
                            echo '<span class="badge badge-pill badge-success">Added</span>';
                          }
                        ?>
                      </td>
                      <td><?php echo $pickup['inchg_fname'].' '.$pickup['inchg_lname']; ?></td>
                      <td><?php echo $pickup['fld_inchg_phone']; ?></td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="more-vertical"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <!-- <a class="dropdown-item" href="<?php echo CLIENT_BASE_URL; ?>upload-images?pickup_key=<?php echo $pickup['fld_uniq_token']; ?>">Images</a> -->
                            <a class="dropdown-item" href="<?php echo CLIENT_BASE_URL; ?>check-pickup-timeline?pickup_key=<?php echo $pickup['fld_uniq_token']; ?>">Check Timeline</a>
                            <a class="dropdown-item" href="">Carbon Footprints</a>
                          </div>
                        </div>
                      </td>
                    </tr>
              <?php $x++; } } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div><!-- row -->
  </div><!-- container -->
</div>