
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">New Pickup Schedule</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Create your new pickup request</h4>
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
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label class="d-block">Pickup date</label>
              <input type="date" class="form-control" name="">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="typeofwaste">Select Site</label>
                <select class="form-control select2" id="site_selected" name="site" required="required">
                  <option label="Choose one"></option>
                  <?php
                    if(!empty($sites)){
                      foreach ($sites as $key => $site) { ?>
                        <option value="<?php echo $this->encryption->encrypt($site['site_id']); ?>"><?php echo $site['fld_location']; ?></option>
                  <?php } } ?>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="typeofwaste">Type of waste</label>
                <select class="form-control select2" name="wastes[]" required="required">
                  <option label="Choose one"></option>
                  <option value="1">Paper</option>
                  <option value="2">Plastic</option>
                  <option value="3">Glass</option>
                  <option value="4">Metal</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="incharge_person">Incharge Person</label>
                <select class="form-control " id="incharge_person" name="person" required="required">
                    <option label="Choose one"></option>
                    <?php
                      if(!empty($incharge_persons)){
                        foreach ($incharge_persons as $key => $incharge_person) { ?>
                          <option data-target="per<?php echo $incharge_person['fld_id']; ?>" value="<?php echo $this->encryption->encrypt($incharge_person['fld_id']); ?>"><?php echo $incharge_person['fld_firstname'].' '.$incharge_person['fld_lastname']; ?></option>
                    <?php } } ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                <label for="qty">Quantity <small>(Approx. in kg)</small></label>
                <input type="text" class="form-control" id="qty" placeholder="Enter the approximate quantity" name="qty" required="required">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="workmail">Work mail <small>(Login credentials will send to this email address)</small></label>
                <input type="email" class="form-control" id="workmail" placeholder="Enter the email address" name="email">
              </div>
              <div class="form-group col-md-6">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone" placeholder="Enter the phone number" name="phone" required="required">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="loadingman">Is loading man required?</label>
                <div class="custom-control custom-radio">
                  <input type="radio" id="loadingman1" name="loading_man" value="1" class="custom-control-input" required="required">
                  <label class="custom-control-label" for="loadingman1">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="loadingman2" name="loading_man" value="0" class="custom-control-input" required="required">
                  <label class="custom-control-label" for="loadingman2">No</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="d-block">Recurring Pickup</label>
              <div class="custom-control custom-radio rec-radio">
                <input type="radio" name="recuring" value="0" class="recurring-pickup custom-control-input" id="recuring0" required="required" checked="checked">
                <label class="custom-control-label" for="recuring0">Not Required</label>
              </div>
              <div class="custom-control custom-radio rec-radio">
                <input type="radio" name="recuring" value="1" class="recurring-pickup custom-control-input" id="recuring1" required="required">
                <label class="custom-control-label" for="recuring1">Weekly</label>
              </div>
              <div class="custom-control custom-radio rec-radio">
                <input type="radio" name="recuring" value="2" class="recurring-pickup custom-control-input" id="recuring2" required="required">
                <label class="custom-control-label" for="recuring2">Fortnight</label>
              </div>
              <div class="custom-control custom-radio rec-radio">
                <input type="radio" name="recuring" value="3" class="recurring-pickup custom-control-input" id="recuring3" required="required">
                <label class="custom-control-label" for="recuring3">Monthly</label>
              </div>
            </div>
            <div class="form-group d-none" id="rec-day">
              <label>Select the pickup day</label>
              <select name="recurring-day" id="recurring-day" class="form-control" disabled="disabled">
                <option value="1">Sunday</option>
                <option value="2">Monday</option>
                <option value="3">Tuesday</option>
                <option value="4">Wednesday</option>
                <option value="5">Thursdayy</option>
                <option value="6">Friday</option>
                <option value="7">Saturday</option>
              </select>
            </div>
            <div class="form-row multi_file">
              <div class="form-group col-md-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="waste_file[]" id="waste_file" >
                  <label class="custom-file-label" for="waste_file">Attach Photographs</label>
                </div>
              </div>
              <!-- <div class="form-group col-md-3 ex-image">
                <span class="del-image">Delete</span>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="waste_file[]" id="waste_file" required="required">
                  <label class="custom-file-label" for="waste_file">Choose file</label>
                </div>
              </div> -->
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="add-more-images">+ Add more</button>
              </div>
            <div class="form-group">
              <ul class="image-list" id="image-list"></ul>
            </div>
            <button type="submit" class="btn btn-primary">Create New Pickup Request</button>
          </form>
        </div>
      </div>
    </div><!-- row -->
  </div><!-- container -->
</div>
<style type="text/css">
span.del-image {
    position: absolute;
    z-index: 99;
    top: -15px;
    right: 5px;
    font-size: 12px;
    cursor: pointer;
    color: red;
}
.ex-image {
    position: relative;
}
.rec-radio {
    display: inline-block;
    margin-right: 20px;
}
</style>