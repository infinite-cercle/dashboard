<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Your Profile</h4>
      </div>
      <!-- <div class="d-none d-md-block">
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail" class="wd-10 mg-r-5"></i> Email</button>
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
        <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
      </div> -->
    </div>

    <div class="row row-xs">
      <div class="col-md-12">
        <form action="" method="post">
          <div class="wd-100p">
            <div class="form-group">
              <label>Firstname</label>
              <input type="text" class="form-control" placeholder="Enter your firstname" name="firstname" value="<?php echo $form_data['fld_firstname']; ?>" required="required">
            </div>
            <div class="form-group">
              <label>Lastname</label>
              <input type="text" class="form-control" placeholder="Enter your lastname" name="lastname" value="<?php echo $form_data['fld_lastname']; ?>" required="required">
            </div>
            <div class="form-group">
              <label>Company</label>
              <input type="text" class="form-control" placeholder="Enter the company name" name="company" value="<?php echo $form_data['fld_company']; ?>" required="required">
            </div>
            <div class="form-group">
              <label>Designation</label>
              <input type="text" class="form-control" placeholder="Enter your designation in your company" name="designation" value="<?php echo $form_data['fld_designation']; ?>" required="required">
            </div>
            <div class="form-group">
              <label>Work mail</label><small class="pl-1 text-danger">(You cannot change the primary email)</small>
              <input type="email" class="form-control" placeholder="Enter your email address" name="" disabled="disabled" value="<?php echo $form_data['fld_workmail']; ?>" required="required">
            </div><!-- form-group -->
            <button type="submit" class="btn btn-primary">Update Account</button>
          </div>
        </form>
      </div>
    </div><!-- row -->
  </div><!-- container -->
</div>