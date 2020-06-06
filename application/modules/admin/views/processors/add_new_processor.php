<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Generator</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New Processor</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Add New Processor</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-md-12">
        <div data-label="Example" class="df-example demo-forms">
          <form action="" method="POST">
            <div class="form-group">
              <label for="dealer_name">Dealer Name</label>
              <input type="text" class="form-control" id="dealer_name" placeholder="Enter the dealer name" name="dealer_name" required="required">
            </div>
            <div class="form-group">
              
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputAddress">Business Process</label>
                <select class="form-control select2" multiple name="business_process[]" required="required">
                  <option></option>
                  <option value="1">Wholesalers</option>
                  <option value="2">Pre-Procesors</option>
                  <option value="3">Reuser</option>
                  <option value="4">Recycler</option>
                  <option value="5">Upcycler</option>
                  <option value="6">Converter</option>
                  <option value="7">Trasporter</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="client_designation">Waste(s) Handled</label>
                <select class="form-control select2 select-multilple" multiple name="waste_handeling[]" required="required">
                  <option></option>
                  <option value="1">Paper</option>
                  <option value="2">Plastic</option>
                  <option value="3">Glass</option>
                  <option value="4">Metal</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="Enter the address" name="address" required="required">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="workemail">Email</label>
                <input type="email" class="form-control" id="workemail" placeholder="Enter the email" name="email" required="required">
              </div>
              <div class="form-group col-md-6">
                <label for="contact">Contact number</label>
                <input type="text" class="form-control" id="contact" placeholder="Enter the contact number" name="phone_number" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="reg_num">Business Registration Number</label>
              <input type="text" class="form-control" id="reg_num" placeholder="Enter the business registration number" name="reg_number" required="required">
            </div>
            <div class="form-group">
              <label for="gst">GST number</label>
              <input type="text" class="form-control" id="gst" placeholder="Enter the GST number" name="gst_number" required="required">
            </div>
            <div class="form-group">
              <div id="dvMap" style="width: 100%; height: 500px"></div>
              <div class="clearfix"></div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="lat">Latitude</label>
                <input type="text" name="latitude" class="form-control" id="geo_latitude" readonly="readonly">
              </div>
              <div class="form-group col-md-6">
                <label for="lat">Longitude</label>
                <input type="text" name="longitude" class="form-control" id="geo_longitude" readonly="readonly">
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Add Processor</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- row -->
  </div><!-- container -->
</div>