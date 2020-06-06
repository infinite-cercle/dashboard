
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Waste Images</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Images are uploaded by the client</h4>
      </div>
      <!-- <div class="d-none d-md-block">
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail" class="wd-10 mg-r-5"></i> Email</button>
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
        <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
      </div> -->
    </div>

    <div class="row row-xs">
      <div class="row">
        <?php if(!empty($images)) { foreach ($images as $key => $image) { ?>
          <div data-label="Preview" class="df-example clearfix col-md-3">
            <div class="image-preview">
              <a href="<?php echo $image; ?>" data-lightbox="<?php echo $image; ?>" data-title="Thinktrash Waste Images">
                <img src="<?php echo $image; ?>" class="" alt="Responsive image">
              </a>
            </div>
          </div>
        <?php } } ?>
      </div>
    </div><!-- row -->
  </div><!-- container -->
</div>