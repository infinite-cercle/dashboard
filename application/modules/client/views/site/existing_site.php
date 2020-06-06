<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sites</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Your existing sites</h4>
      </div>
      <!-- <div class="d-none d-md-block">
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail" class="wd-10 mg-r-5"></i> Email</button>
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
        <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
      </div> -->
    </div>

    <div class="row row-xs">
      <div class="col-md-10">
        <div class="form-group">
          <label>Category</label>
          <select class="form-control">
            <option value="">Select Site Category</option>
            <option value="1">Office</option>
            <option value="2">Store</option>
            <option value="3">Kitchen</option>
            <option value="4">Factory</option>
            <option value="5">Warehouse</option>
          </select>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label class="d-block">&nbsp;</label>
          <button type="submit" class="btn btn-primary float-right">Filter</button>
        </div>
      </div>
      <div class="col-md-12">
        <div data-label="Client List" class="df-example demo-table">
          <table id="existing-sites-table" class="table">
            <thead>
              <tr>
                <th class="wd-5p">S.No</th>
                <th class="wd-15p">Location</th>
                <th class="wd-20p">Incharge Person</th>
                <th class="wd-10p">Services</th>
                <th class="wd-15p">Email</th>
                <th class="wd-15p">Mobile</th>
                <th class="wd-15p">Type of wate generated</th>
                <th class="wd-5p">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if(!empty($existing_sites)){
                  $x = 1;
                  foreach ($existing_sites as $key => $site) { ?>
                    <tr>
                      <td><?php echo $x; ?></td>
                      <td><?php echo $site['fld_location']; ?></td>
                      <td><?php echo $site['fld_firstname'].' '.$site['fld_lastname']; ?></td>
                      <td class="text-center">0</td>
                      <td><?php echo $site['fld_work_mail']; ?></td>
                      <td><?php echo $site['fld_phone_number']; ?></td>
                      <td>
                        <?php if(!empty($site['wastes'])){ foreach ($site['wastes'] as $key => $waste) { ?>
                          <span class="badge badge-pill badge-<?php echo strtolower($waste['fld_name']); ?>"><?php echo $waste['fld_name']; ?></span>
                        <?php } } ?>
                      </td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="more-vertical"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?php echo CLIENT_BASE_URL; ?>view-site?sitekey=<?php echo base64_encode($this->encryption->encrypt($site['site_id'])); ?>">View</a>
                            <a class="dropdown-item" href="<?php echo CLIENT_BASE_URL; ?>contacts">Contacts</a>
                            <form action="<?php echo CLIENT_BASE_URL; ?>site-report" method="post">
                              <input type="hidden" name="site" value="<?php echo $this->encryption->encrypt($site['site_id']); ?>">
                              <button type="submit" class="dropdown-item">Site report</button>
                            </form>
                            <!-- <a class="dropdown-item" href="#">Site Report</a> -->
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