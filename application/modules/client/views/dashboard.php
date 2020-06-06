
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Generator Dashboard</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
      </div>
      <!-- <div class="d-none d-md-block">
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail" class="wd-10 mg-r-5"></i> Email</button>
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
        <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
      </div> -->
    </div>

    <!-- row -->
    <div class="row row-xs mg-t-10">
      <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Zero waste to landfill fulfillment</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?php if($total_qty == 0){ echo '0%'; } else { echo '96%'; } ?></h3>
            <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success"><i data-feather="arrow-up"></i> above</span></p>
          </div>
          <!-- chart-three -->
        </div>
      </div><!-- col -->
      <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">EPR compliance</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?php if($total_qty == 0){ echo '0%'; } else { echo '100%'; } ?></h3>
            <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success"></span></p>
          </div>
          <!-- chart-three -->
        </div>
      </div><!-- col -->
      <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Waste generated</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?php $waste_generated = ($total_qty*0.04); echo number_format($waste_generated, 2); ?></h3>
            <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">tons</span></p>
          </div>
          <!-- chart-three -->
        </div>
      </div><!-- col -->
      <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Volume of landfill area saved</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?php $landfill = ($total_qty*81); echo number_format($landfill, 2); ?></h3>
            <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-primary">cu. ft</span></p>
          </div>
          <!-- chart-three -->
        </div>
      </div><!-- col -->
    </div>
    <div class="row row-xs mg-t-10">
      <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">CO2 emissions avoided</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">
              <?php $co2 = ($total_qty*0.82*4000); echo number_format($co2, 2); ?>
            </h3>
            <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">tons</span></p>
          </div>
          <!-- chart-three -->
        </div>
      </div><!-- col -->
      <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">KWh of energy conserved</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">
              <?php $energy = ($total_qty*4000); echo number_format($energy, 2); ?>
            </h3>
            <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">kwh</span></p>
          </div>
          <!-- chart-three -->
        </div>
      </div><!-- col -->
      <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Liters of water saved</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">
              <?php $water = ($total_qty*26500); echo number_format($water, 2); ?>
            </h3>
            <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">ltrs</span></p>
          </div>
          <!-- chart-three -->
        </div>
      </div><!-- col -->
      <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Number of trees saved</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">
              <?php $trees = ($total_qty*17); echo number_format($trees, 2); ?>
            </h3>
            <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">trees</span></p>
          </div>
          <!-- chart-three -->
        </div>
      </div><!-- col -->
    </div>
    <!-- row -->
    <div class="row row-xs">
      <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card">
          <div class="card-header pd-y-20 d-md-flex align-items-center justify-content-between">
            <h6 class="mg-b-0">Spatial Map</h6>
          </div><!-- card-header -->
          <div class="card-body pos-relative pd-0">
            <div id="map2" class="ht-500"></div>
            <!-- map-one -->
          </div><!-- card-body -->
        </div><!-- card -->
      </div>
    </div>
  </div><!-- container -->
</div>