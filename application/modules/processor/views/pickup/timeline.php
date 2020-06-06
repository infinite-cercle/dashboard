
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Waste Pickup Timeline</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Track the waste pickup status</h4>
      </div>
      <!-- <div class="d-none d-md-block">
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail" class="wd-10 mg-r-5"></i> Email</button>
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
        <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
      </div> -->
    </div>

    <div class="row row-xs">
      <div class="col-md-12">
        <div class="media-body">
          <div class="timeline-group tx-13">
            <?php if(!empty($timeline['today'])) { ?>
              <!-- Today Timeline -->
              <div class="timeline-label">Today</div>
              <?php foreach ($timeline['today'] as $key => $today) { ?>
                <div class="timeline-item">
                  <div class="timeline-time"><?php echo date('h:ia', strtotime($today['fld_date_added'])); ?></div>
                  <div class="timeline-body">
                    <h6 class="mg-b-0"><?php echo $today['fld_activity_title']; ?></h6>
                    <p>
                      Added by&nbsp;<span class="badge badge-pill badge-primary">
                        <?php
                          if($today['firstname'] != '' || $today['lastname'] != ''){
                            echo $today['firstname'].' '.$today['lastname'].' | '.$today['company'];
                          } else {
                            echo $today['company'];
                          }
                        ?></span>&nbsp;<?php echo $today['designation']; ?> | <?php echo $today['email']; ?>
                      </p>
                    <p><?php echo $today['fld_decription']; ?></p>
                  </div><!-- timeline-body -->
                </div><!-- timeline-item -->
              <?php } ?>
              <!-- End Today -->
            <?php } ?>
            <?php if(!empty($timeline['yesterday'])) { ?>
              <hr>
              <!-- Yesterday Timeline -->
              <div class="timeline-label">Yesterday</div>
              <?php foreach ($timeline['yesterday'] as $key => $yesterday) { ?>
                <div class="timeline-item">
                  <div class="timeline-time"><?php echo date('h:ia', strtotime($yesterday['fld_date_added'])); ?></div>
                  <div class="timeline-body">
                    <h6 class="mg-b-0"><?php echo $yesterday['fld_activity_title']; ?></h6>
                    <p>
                      Added by&nbsp;<span class="badge badge-pill badge-primary">
                        <?php
                          if($yesterday['firstname'] != '' || $yesterday['lastname'] != ''){
                            echo $yesterday['firstname'].' '.$yesterday['lastname'].' | '.$yesterday['company'];
                          } else {
                            echo $yesterday['company'];
                          }
                        ?>
                      </span>&nbsp;<?php echo $yesterday['designation']; ?> | <?php echo $yesterday['email']; ?></p>
                    <p><?php echo $yesterday['fld_decription']; ?></p>
                  </div><!-- timeline-body -->
                </div><!-- timeline-item -->
              <?php } ?>
              <!-- End Yesterday -->
            <?php } ?>
            <?php if(!empty($timeline['other_days'])) { ?>
              <hr>
              <!-- Other Timeline -->
              <?php $prevdate = ''; foreach ($timeline['other_days'] as $key => $other) { $thisdate = date('Y-m-d', strtotime($other['fld_date_added'])); ?>
              <?php if($thisdate != $prevdate) { ?>
                <div class="timeline-label"><?php echo date('d M, Y', strtotime($other['fld_date_added'])); ?></div>
              <?php $prevdate = $thisdate; } ?>
                <div class="timeline-item">
                  <div class="timeline-time"><?php echo date('h:ia', strtotime($other['fld_date_added'])); ?></div>
                  <div class="timeline-body">
                    <h6 class="mg-b-0"><?php echo $other['fld_activity_title']; ?></h6>
                    <p>
                      Added by&nbsp;<span class="badge badge-pill badge-primary">
                        <?php
                          if($other['firstname'] != '' || $other['lastname'] != ''){
                            echo $other['firstname'].' '.$other['lastname'].' | '.$other['company'];
                          } else {
                            echo $other['company'];
                          }
                        ?></span>&nbsp;<?php echo $other['designation']; ?> | <?php echo $other['email']; ?></p>
                    <p><?php echo $other['fld_decription']; ?></p>
                  </div><!-- timeline-body -->
                </div><!-- timeline-item -->
              <?php } ?>
              <!-- End Other -->
            <?php } ?>
          </div><!-- timeline-group -->

        </div><!-- media-body -->
      </div>
    </div><!-- row -->
  </div><!-- container -->
</div>