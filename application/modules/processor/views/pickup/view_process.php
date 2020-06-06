<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Process Status</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Add your process status with short notes</h4>
      </div>
      <!-- <div class="d-none d-md-block">
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail" class="wd-10 mg-r-5"></i> Email</button>
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
        <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
      </div> -->
    </div>

    <div class="row row-xs">
      <div class="col-md-12">
        <table class="table">
          <tbody>
            <tr>
              <th width="25%">Date of Assign</th>
              <td><?php echo date('d/m/Y', strtotime($assign_details['fld_assigned_date'])); ?></td>
            </tr>
            <tr>
              <th width="25%">Material Name</th>
              <td><?php echo strtoupper($assign_details['fld_material_name']); ?></td>
            </tr>
            <tr>
              <th width="25%">Assigned Qty</th>
              <td><?php echo $assign_details['fld_assigned_qty']; ?> tons <small>(approx.)</small></td>
            </tr>
            <tr>
              <th width="25%">Notes</th>
              <td><?php echo ($assign_details['fld_notes'] != '')?$assign_details['fld_notes']:'No notes added'; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>Status date</th>
              <th>Current status</th>
              <th>Status notes</th>
              <th>Transporter</th>
              <th>Vehicle number</th>
              <th>Driver number</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($assign_details['processing_status'])) { foreach ($assign_details['processing_status'] as $key => $assign_detail) { ?>
              <tr>
                <td><?php echo date('d/m/Y', strtotime($assign_detail['fld_date_added'])); ?></td>
                <td>
                  <?php if($assign_detail['fld_current_status'] == 1) { ?>
                    <label class="badge badge-primary">Assigned</label>
                  <?php } ?>
                  <?php if($assign_detail['fld_current_status'] == 2) { ?>
                    <label class="badge badge-primary">Collected</label>
                  <?php } ?>
                  <?php if($assign_detail['fld_current_status'] == 3) { ?>
                    <label class="badge badge-primary">Received</label>
                  <?php } ?>
                  <?php if($assign_detail['fld_current_status'] == 4) { ?>
                    <label class="badge badge-primary">Processing</label>
                  <?php } ?>
                  <?php if($assign_detail['fld_current_status'] == 5) { ?>
                    <label class="badge badge-primary">Completed</label>
                  <?php } ?>
                </td>
                <td><?php echo $assign_detail['fld_status_notes']; ?></td>
                <td><?php echo $assign_detail['fld_driver_name']; ?></td>
                <td><?php echo $assign_detail['fld_vehicle_number']; ?></td>
                <td><?php echo $assign_detail['fld_diver_phone']; ?></td>
              </tr>
            <?php } } ?>
          </tbody>
        </table>
      </div>
      <div class="col-md-12">
          <form action="" method="post" accept-charset="utf-8">
            <fieldset>
              <div class="form-group">
                <label class="font-weight-bold">Current Status</label>
                <select class="form-control select2" name="status" required="required" id="current_status">
                  <option value="">Please select the status</option>
                  <option value="1">Assigned Driver</option>
                  <option value="2">Collected</option>
                  <option value="3">Received</option>
                  <option value="4">Processing</option>
                  <option value="5">Dispatched</option>
                </select>
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Status notes</label>
                <textarea class="form-control" name="status_notes" placeholder="Please provide the status notes..." required="required"></textarea>
              </div>
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="add_transport" value="1" name="is_transport">
                  <label class="custom-control-label" for="add_transport">Add transport detail</label>
                </div>
              </div>
            </fieldset>
            <fieldset id="upload_manifest" disabled class="d-none">
              <div class="form-group">
                <label class="font-weight-bold">Upload Manifest</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="manifest_file" id="manifest_file" required="required">
                  <label class="custom-file-label" for="manifest_file">Choose file</label>
                </div>
              </div>
            </fieldset>
            <fieldset id="transport_detail" disabled class="d-none">
              <div class="form-group">
                <label class="font-weight-bold">Driver name</label>
                <input type="text" class="form-control" name="driver_name" required="required">
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Licence Number</label>
                <input type="text" class="form-control" name="licence_number" required="required">
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Vehicle Number</label>
                <input type="text" class="form-control" name="vehicle_number" required="required">
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Driver Mobile Number</label>
                <input type="text" class="form-control digits-only" name="diver_mobile" required="required" placeholder="0000 000 000" maxlength="10">
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Loading men count</label>
                <input type="text" class="form-control" id="loading_mens" name="loading_mens" required="required">
              </div>
            </fieldset>
            <div class="form-group">
              <button class="btn btn-primary float-right" type="submit">Change Status</button>
            </div>
          </form>
      </div>
    </div><!-- row -->
  </div><!-- container -->
</div>