<style type="text/css">
.total_co2 {
    min-width: 75px;
    border-bottom: 1px solid #000;
    display: inline-block;
    margin-right: 5px;
}
</style>
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Carbon Foortprints</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Add process carbon footprints for each process</h4>
      </div>
      <!-- <div class="d-none d-md-block">
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail" class="wd-10 mg-r-5"></i> Email</button>
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
        <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
      </div> -->
    </div>

    <div class="row row-xs">
      <div class="col-md-12">
        <fieldset>
          <h5>Trasport</h5>
          <pre>From generator to processer - Total distance travelled = X <br>Carbon Footprint = ((X/4.3) * no. of trucks * 2.734)/1000 =____ tons of CO2 eq.</pre>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="font-weight-bold">Total Distance Travelled</label>
                <input type="number" class="form-control" name="" id="trasport_distance" value="<?php echo $cf_data['fld_distance_travelled']; ?>" placeholder="Enter total distance travelled">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="font-weight-bold">Number of Trucks</label>
                <input type="number" class="form-control" name="" value="<?php echo $cf_data['fld_trucks']; ?>" id="trasport_trucks" placeholder="Total no. of trucks">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Total: &nbsp;</label><label><span class="total_co2" id="total_co2_transport"><?php echo $cf_data['fld_transport_cf']; ?></span>tons of CO2 eq.</label>
          </div>
        </fieldset>
        <fieldset>
          <h5>Balling</h5>
          <pre>Carbon Footprint = (Quantity of waste * 1.5)/1000 = ____ tons of CO2 eq.</pre>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="font-weight-bold">Quantity of waste</label>
                <input type="text" class="form-control" name="" value="<?php echo $assignDetails['fld_assigned_qty']; ?>" placeholder="Total Waste Quantity" id="balling_qty" readonly="readonly">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Total: &nbsp;</label><label><span class="total_co2" id="total_co2_balling"><?php echo $cf_data['fld_balling_cf']; ?></span>tons of CO2 eq.</label>
          </div>
        </fieldset>
        <fieldset>
          <h5>Recycling</h5>
          <pre>Carbon Footprint = (Quantity of waste * 1.4)/1000 = ____ tons of CO2 eq.</pre>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="font-weight-bold">Quantity of waste</label>
                <input type="text" class="form-control" name="" value="<?php echo $assignDetails['fld_assigned_qty']; ?>" placeholder="Total Waste Quantity" id="recycling_qty" readonly="readonly">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Total: &nbsp;</label><label><span class="total_co2" id="total_co2_recycling"><?php echo $cf_data['fld_recycling_cf']; ?></span>tons of CO2 eq.</label>
          </div>
        </fieldset>
        <fieldset>
          <h5>Total Carbon Footprint Value</h5>
          <pre>Carbon Footprint values of (Transport+Balling+Recycling)</pre>
          <div class="form-group">
            <label class="font-weight-bold">Total: &nbsp;</label><label><span class="total_co2" id="total_co2_total"><?php echo $cf_data['fld_total_cf']; ?></span>tons of CO2 eq.</label>
          </div>
        </fieldset>
        <div class="form-group">
          <input type="hidden" value="<?php echo $this->input->get('assign_key'); ?>" id="assign_key">
          <button type="button" id="save_carbonfootprint" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div><!-- row -->
  </div><!-- container -->
</div>