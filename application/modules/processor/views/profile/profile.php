<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Your Personal and Company Details</h4>
      </div>
    </div>

    <?php if(!empty($profile_complete)) { ?>
      <div class="alert alert-danger d-flex align-items-center" role="alert">
        <i data-feather="alert-circle" class="mg-r-10"></i> Your profile seems incomplete, kindly provide us basic details about your company!
      </div>
    <?php } ?>

    <div class="row row-xs">
      <div class="col-md-12">
        <div data-label="Example" class="df-example demo-forms">
          <form action="" method="POST">
            <div class="form-group">
              <label for="dealer_name">Dealer Name</label>
              <input type="text" class="form-control" id="dealer_name" placeholder="Enter the dealer name" name="dealer_name" required="required" value="<?php echo $profile['dealer_name']; ?>">
            </div>
            <div class="form-group">
              
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputAddress">Business Process</label>
                <select class="form-control select2" multiple name="business_process[]" required="required">
                  <option></option>
                  <?php if(in_array('1', $profile['business_process'])) { ?> <option value="1" selected="selected">Wholesalers</option> <?php } else { ?><option value="1">Wholesalers</option><?php } ?>
                  <?php if(in_array('2', $profile['business_process'])) { ?> <option value="2" selected="selected">Pre-Procesors</option> <?php } else { ?><option value="2" >Pre-Procesors</option><?php } ?>
                  <?php if(in_array('3', $profile['business_process'])) { ?> <option value="3" selected="selected">Reuser</option> <?php } else { ?><option value="3" >Reuser</option><?php } ?>
                  <?php if(in_array('4', $profile['business_process'])) { ?> <option value="4" selected="selected">Recycler</option> <?php } else { ?><option value="4" >Recycler</option><?php } ?>
                  <?php if(in_array('5', $profile['business_process'])) { ?> <option value="5" selected="selected">Upcycler</option> <?php } else { ?><option value="5" >Upcycler</option><?php } ?>
                  <?php if(in_array('6', $profile['business_process'])) { ?> <option value="6" selected="selected">Converter</option> <?php } else { ?><option value="6" >Converter</option><?php } ?>
                  <?php if(in_array('7', $profile['business_process'])) { ?> <option value="7" selected="selected">Trasporter</option> <?php } else { ?><option value="7" >Trasporter</option><?php } ?>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="client_designation">Waste(s) Handled</label>
                <select class="form-control select2 select-multilple" multiple name="waste_handeling[]" required="required">
                  <option></option>
                  <?php if(in_array('1', $profile['waste_process'])) { ?> <option value="1" selected="selected">Paper</option> <?php } else { ?> <option value="1">Paper</option> <?php } ?>
                  <?php if(in_array('2', $profile['waste_process'])) { ?> <option value="2" selected="selected">Plastic</option> <?php } else { ?> <option value="2">Plastic</option> <?php } ?>
                  <?php if(in_array('3', $profile['waste_process'])) { ?> <option value="3" selected="selected">Glass</option> <?php } else { ?> <option value="3">Glass</option> <?php } ?>
                  <?php if(in_array('4', $profile['waste_process'])) { ?> <option value="4" selected="selected">Metal</option> <?php } else { ?> <option value="4">Metal</option> <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="Enter the address" name="address" required="required" value="<?php echo $profile['address']; ?>">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="workemail">Email</label>
                <input type="email" class="form-control" id="workemail" placeholder="Enter the email" name="email" disabled value="<?php echo $profile['email']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="contact">Contact number</label>
                <input type="text" class="form-control" id="contact" placeholder="Enter the contact number" name="phone_number" required="required" value="<?php if($profile['contact_number'] == 0){ echo ""; } else { echo $profile['contact_number']; } ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="reg_num">Business Registration Number</label>
              <input type="text" class="form-control" id="reg_num" placeholder="Enter the business registration number" name="reg_number" required="required" value="<?php echo $profile['reg_number']; ?>">
            </div>
            <div class="form-group">
              <label for="gst">GST number</label>
              <input type="text" class="form-control" id="gst" placeholder="Enter the GST number" name="gst_number" required="required" value="<?php echo $profile['gst_number']; ?>">
            </div>
            <div class="form-group">
              <div id="dvMap" style="width: 100%; height: 500px"></div>
              <div class="clearfix"></div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="lat">Latitude</label>
                <input type="text" name="latitude" class="form-control" id="geo_latitude" readonly="readonly" value="<?php echo $profile['lat']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="lat">Longitude</label>
                <input type="text" name="longitude" class="form-control" id="geo_longitude" readonly="readonly" value="<?php echo $profile['lng']; ?>">
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Update your profile</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- row -->
  </div><!-- container -->
</div>