<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Request Approve</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Approve your pickups and assign processor</h4>
      </div>
      <!-- <div class="d-none d-md-block">
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail" class="wd-10 mg-r-5"></i> Email</button>
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
        <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
      </div> -->
    </div>

    <div class="row row-xs">
      <div class="col-md-12">
        <table width="100%" class="table">
          <tbody>
            <tr>
              <td width="15%" class="font-weight-bold">Company name</td>
              <td><?php echo strtoupper($pickup_detail['company']); ?></td>
            </tr>
            <tr>
              <td width="15%" class="font-weight-bold">Site Location</td>
              <td><?php echo strtoupper($pickup_detail['fld_location']); ?></td>
            </tr>
            <tr>
              <td width="15%" class="font-weight-bold">Incharge Person</td>
              <td><?php echo strtoupper($pickup_detail['inchg_fname'].' '.$pickup_detail['inchg_lname']); ?></td>
            </tr>
            <tr>
              <td width="15%" class="font-weight-bold">Incharge Email</td>
              <td><?php echo strtolower($pickup_detail['fld_inchg_email']); ?></td>
            </tr>
            <tr>
              <td width="15%" class="font-weight-bold">Incharge Phone</td>
              <td><?php echo strtolower($pickup_detail['fld_inchg_phone']); ?></td>
            </tr>
            <tr>
              <td width="15%" class="font-weight-bold">Type of waste(s)</td>
              <td>
                <?php if(!empty($pickup_detail['wastes'])) { $wastes = array( '1' => 'Paper', '2' => 'Plastic', '3' => 'Glass', '4' => 'Metal' );
                foreach ($pickup_detail['wastes'] as $key => $value) { ?>
                  <span class="badge badge-pill badge-<?php echo strtolower($wastes[$value]); ?>"><?php echo ucfirst($wastes[$value]); ?></span>
                <?php } } ?>
              </td>
            </tr>
            <tr>
              <td width="15%" class="font-weight-bold">Image(s)</td>
              <td>
                <?php if(!empty($pickup_detail['images'])) { $x = 1;
                foreach ($pickup_detail['images'] as $key => $value) { ?>
                  <a href="<?php echo $value; ?>" class="image-attachment" target="_blank" title="Think Trash Waste Images">Image <?php echo $x; ?></a>
                <?php $x++; } } ?>
              </td>
            </tr>
            <tr>
              <td width="15%" class="font-weight-bold">Total Quantity Available</td>
              <td><?php echo $pickup_detail['fld_qty']; ?> tons <small>aprox.</small></td>
            </tr>
            <?php if($existing_assign != '' || $existing_assign != 0) { ?>
              <tr>
                <td width="15%" class="font-weight-bold">Existing Assigned Quantity</td>
                <td class="font-weight-bold"><?php echo $existing_assign; ?> tons <small>aprox.</small></td>
              </tr>
              <tr>
                <td width="15%" class="font-weight-bold">Remaining Quantity</td>
                <td class="font-weight-bold"><?php echo ($pickup_detail['fld_qty']-$existing_assign); ?> tons <small>aprox.</small></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <fieldset class="form-fieldset col-md-12">
          <legend>Assign pickup to processor</legend>
          <form action="" method="POST" accept-charset="utf-8">
            <div class="form-group">
              <label class="d-block">Material Name</label>
              <input type="text" name="material_name" class="form-control" required="required">
            </div>
            <div class="form-group">
              <label class="d-block">Assigning Quantity <small>(Approx. tons)</small></label>
              <input type="text" name="qty" class="form-control" required="required">
            </div>
            <div class="form-group">
              <label class="d-block">Select First Communication party</label>
              <select class="form-control select2" required="required" name="processor">
                  <option value=""></option>
                <?php if(!empty($processors)){ foreach ($processors as $key => $processor) { ?>
                  <option value="<?php echo $processor['fld_processor_uniq_id']; ?>"><?php echo ucwords(strtolower($processor['fld_dealer_name'])); ?></option>
                <?php } } ?>
              </select>
            </div>
            <div class="form-group">
              <label class="d-block">Pickup Notes</label>
              <textarea class="form-control pickup-notes" required="required" name="assign_notes"></textarea>
            </div>
            <div class="form-group">
              <button class="btn btn-primary float-right" type="submit">Assign</button>
            </div>
          </form>
      </fieldset>
    </div><!-- row -->
  </div><!-- container -->
</div>