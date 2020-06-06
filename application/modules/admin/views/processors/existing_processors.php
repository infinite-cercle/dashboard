<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Processors</a></li>
            <li class="breadcrumb-item active" aria-current="page">Existing Processors</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Existing Processors List</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-md-12">
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="client_name">Dealer Name</label>
            <div class="">
              <select class="form-control select2">
                <option label="Select Dealer"></option>
                <?php if(!empty($processors)){ foreach ($processors as $key => $processor) { ?>
                  <option value="<?php echo $processor['fld_processor_uniq_id']; ?>"><?php echo $processor['fld_dealer_name']; ?></option>
                <?php } } ?>
              </select>
            </div>
          </div>
          <div class="form-group col-md-3">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" placeholder="Filter by location">
          </div>
          <div class="form-group col-md-3">
            <label for="waste_generating">Business Type</label>
            <div class="">
              <select class="form-control select2 select-multilple" multiple>
                <option value="1">Wholesalers</option>
                <option value="2">Pre-Procesors</option>
                <option value="3">Reuser</option>
                <option value="4">Recycler</option>
                <option value="5">Upcycler</option>
                <option value="6">Converter</option>
                <option value="7">Trasporter</option>
              </select>
            </div>
          </div>
          <div class="form-group col-md-3">
            <label for="waste_generating">&nbsp;</label>
            <button type="submit" class="btn btn-block btn-primary"> <i data-feather="filter"></i> Filter</button>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div data-label="Client List" class="df-example demo-table">
          <table id="existing-client-table" class="table">
            <thead>
              <tr>
                <th class="wd-20p">Dealer Name</th>
                <th class="wd-20p">Email</th>
                <th class="wd-15p">Mobile</th>
                <th class="wd-30p">Type of waste handled</th>
                <th class="wd-15p">Reg. No.</th>
                <th class="wd-15p">GST</th>
                <th class="wd-5p">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($processors)) {  foreach ($processors as $key => $processor) { ?>
                <tr>
                  <td><?php echo $processor['fld_dealer_name']; ?></td>
                  <td><?php echo $processor['fld_email']; ?></td>
                  <td><?php echo $processor['fld_contact_number']; ?></td>
                  <td>
                    <?php if(!empty($processor['waste_handling'])) { $wastes = array( '1' => 'Paper', '2' => 'Plastic', '3' => 'Glass', '4' => 'Metal' );
                    foreach ($processor['waste_handling'] as $key => $value) { ?>
                      <span class="badge badge-pill badge-<?php echo strtolower($wastes[$value]); ?>"><?php echo ucfirst($wastes[$value]); ?></span>
                    <?php } } ?>
                  </td>
                  <td><?php echo $processor['fld_reg_number']; ?></td>
                  <td><?php echo $processor['fld_gst_number']; ?></td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="more-vertical"></i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Branch Report</a>
                        <a class="dropdown-item" href="#">Send Message</a>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php } } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- row -->
  </div><!-- container -->
</div>