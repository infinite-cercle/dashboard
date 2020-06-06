
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">New Site</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Create your new site</h4>
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
              <label>Category</label>
              <select class="form-control" name="category" required="required">
                <option value="">Select Site Category</option>
                <option value="1">Office</option>
                <option value="2">Store</option>
                <option value="3">Kitchen</option>
                <option value="4">Factory</option>
                <option value="5">Warehouse</option>
              </select>
            </div>
            <div class="form-group">
              <label for="site_location">Add Location</label>
              <input id="searchTextField" class="form-control" placeholder="Enter a location" type="text" required="required" name="location">
              <input type="hidden" name="district" id="geo_district">
            </div>
            <!-- <div class="form-row">
              <div class="form-group col-md-12">
                <label for="site_location">Add Location</label>
                <input type="text" class="form-control" id="site_location" placeholder="Enter the site location">
              </div>
            </div> -->
            <div class="form-group">
              <label for="inputAddress">Site Full Address</label>
              <input type="text" class="form-control" id="inputAddress" placeholder="eg. 1234 Main St" required="required" name="full_address">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="typeofwaste">Type of Waste(s)</label>
                <select class="form-control select2" multiple name="type_of_waste[]">
                  <option label="Choose one"></option>
                  <option value="Paper">Paper</option>
                  <option value="Plastic">Plastic</option>
                  <option value="Food">Food</option>
                  <option value="Textile">Textile</option>
                  <option value="E-Waste">E-Waste</option>
                  <option value="Metal">Metal</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="qty">Quantity / Annum respectively</label>
                <input type="text" class="form-control" id="qty" placeholder="Enter the quantity" name="qty">
              </div>
            </div>
            <div class="form-group">
              <label for="incharge_person">Incharge Person</label>
              <select class="form-control select2" required="required" name="incharge_person">
                  <option value="" label="Choose one"></option>
                  <?php if(!empty($contacts)){
                    foreach ($contacts as $key => $contact) { ?>
                      <option value="<?php echo $this->encryption->encrypt($contact['fld_id']); ?>"><?php echo $contact['fld_firstname'].' '.$contact['fld_lastname']; ?></option>
                  <?php } }?>
                </select>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="workmail">Work mail</label>
                <input type="email" class="form-control" id="workmail" placeholder="Enter the email address" required="required" name="work_email">
              </div>
              <div class="form-group col-md-6">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone" placeholder="Enter the phone number" required="required" name="phone_number">
              </div>
            </div>
            <div class="form-group">
              <div id="dvMap" style="width: 100%; height: 500px"></div>
              <div class="clearfix"></div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="lat">Latitude</label>
                <input type="text" name="latitude" class="form-control" id="geo_latitude">
              </div>
              <div class="form-group col-md-6">
                <label for="lat">Longitude</label>
                <input type="text" name="longitude" class="form-control" id="geo_longitude">
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Add New Site</button>
            </div>
          </form>
        </div>
      </div>
    </div><!-- row -->
  </div><!-- container -->
</div>