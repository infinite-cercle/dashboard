
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Site</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Edit your site</h4>
      </div>
      <!-- <div class="d-none d-md-block">
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail" class="wd-10 mg-r-5"></i> Email</button>
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
        <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
      </div> -->
    </div>

    <div class="row row-xs">
      <div class="col-md-12">
        <div data-label="Example" class="df-example demo-forms">
          <form action="" method="post" autocomplete="off">
            <div class="form-group">
              <label for="site_location">Location</label>
              <input id="searchTextField" class="form-control" placeholder="Enter a location" type="text" required="required" name="location" value="<?php echo $sitedata['fld_location']; ?>">
              <input type="hidden" name="district" id="geo_district" value="<?php echo $sitedata['fld_geo_district']; ?>">
              <input type="hidden" name="key" id="edit_id" value="<?php echo $this->encryption->encrypt($sitedata['fld_id']); ?>">
            </div>
            <!-- <div class="form-row">
              <div class="form-group col-md-12">
                <label for="site_location">Add Location</label>
                <input type="text" class="form-control" id="site_location" placeholder="Enter the site location">
              </div>
            </div> -->
            <div class="form-group">
              <label for="inputAddress">Site Full Address</label>
              <input type="text" class="form-control" id="inputAddress" placeholder="eg. 1234 Main St" required="required" name="full_address" value="<?php echo $sitedata['fld_site_address']; ?>">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="typeofwaste">Type of waste</label>
                <select class="form-control select2" multiple name="type_of_waste[]">
                  <option label="Choose one"></option>
                  <option <?php if(in_array(1, $sitedata['wastes'])){ echo "selected='selected'"; } ?> value="Paper">Paper</option>
                  <option <?php if(in_array(2, $sitedata['wastes'])){ echo "selected='selected'"; } ?> value="Plastic">Plastic</option>
                  <option <?php if(in_array(3, $sitedata['wastes'])){ echo "selected='selected'"; } ?> value="Glass">Glass</option>
                  <option <?php if(in_array(4, $sitedata['wastes'])){ echo "selected='selected'"; } ?> value="Metal">Metal</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="qty">Quantity / Annum respectively</label>
                <input type="text" class="form-control" id="qty" placeholder="Enter the quantity" name="qty" value="<?php echo $sitedata['fld_quatity_annum']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="incharge_person">Incharge Person</label>
              <select class="form-control select2" required="required" name="incharge_person">
                  <option value="" label="Choose one"></option>
                  <?php if(!empty($contacts)){
                    foreach ($contacts as $key => $contact) { ?>
                      <option <?php if($sitedata['fld_incharge_person'] == $contact['fld_id']){ echo "selected='selected'"; } ?> value="<?php echo $this->encryption->encrypt($contact['fld_id']); ?>"><?php echo $contact['fld_firstname'].' '.$contact['fld_lastname']; ?></option>
                  <?php } }?>
                </select>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="workmail">Work mail <small>(Login credentials will send to this email address)</small></label>
                <input type="email" class="form-control" id="workmail" placeholder="Enter the email address" required="required" name="work_email" value="<?php echo $sitedata['fld_work_mail']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" maxlength="10" id="phone" placeholder="Enter the phone number" required="required" name="phone_number" value="<?php echo $sitedata['fld_phone_number']; ?>">
              </div>
            </div>
            <div class="form-group">
              <div id="dvMap" style="width: 100%; height: 500px"></div>
              <div class="clearfix"></div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="lat">Latitude</label>
                <input type="text" name="latitude" class="form-control" id="geo_latitude" value="<?php echo $sitedata['fld_latitide']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="lat">Longitude</label>
                <input type="text" name="longitude" class="form-control" id="geo_longitude" value="<?php echo $sitedata['fld_longitude']; ?>">
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div><!-- row -->
  </div><!-- container -->
</div>