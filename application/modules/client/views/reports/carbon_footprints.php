<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Report</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Carbon Footprints</h4>
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
          <table id="carbon-footprint-table" class="table">
            <thead>
              <tr>
                <th class="wd-3p">S.No</th>
                <th class="wd-10p">Req. Date</th>
                <th class="wd-30p">Site</th>
                <th class="wd-20p">Loading Men</th>
                <th class="wd-10p">Quantity</th>
                <th class="wd-17p">Carbon Footprint</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($pickups)) { $x=1; foreach ($pickups as $key => $pickup) { ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo date('d/m/Y', strtotime($pickup['fld_created_date'])); ?></td>
                  <td><?php echo $pickup['fld_location']; ?></td>
                  <td><?php echo ($pickup['fld_is_loadingman_req'] == 1)?'Yes':'No'; ?></td>
                  <td><?php echo $pickup['fld_qty']; ?><small class="text-success font-weight-bold">tons</small></td>
                  <td><?php echo number_format(($pickup['fld_qty']*0.82*4000), 2); ?><small class="text-danger font-weight-bold">tons</small></td>
                </tr>
              <?php $x++; } } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div><!-- row -->
  </div><!-- container -->
</div>
<style type="text/css">
.dt-button {
    background: none;
    border: 0;
    background-color: #0268fa;
    padding: 5px 12px;
    color: #fff;
    font-weight: bold;
    border-radius: 5px;
}
.dt-buttons {
    display: inline-block;
}
</style>