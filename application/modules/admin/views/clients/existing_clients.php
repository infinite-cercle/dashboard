<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Generators</a></li>
            <li class="breadcrumb-item active" aria-current="page">Existing Generators</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Existing Generators List</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-md-12">
        <form action="" method="get" accept-charset="utf-8">
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="client_name">Generator Name</label>
              <div class="">
                <select class="form-control select2" name="generator">
                  <option label="Select Generator"></option>
                  <?php if(!empty($clients)){ foreach ($clients as $key => $generator) { ?>
                    <?php if($generator['fld_client_id'] == $this->encryption->decrypt(base64_decode($get_param['generator']))) { ?>
                      <?php if($get_param['generator']) { ?>
                        <option value="<?php echo base64_encode($this->encryption->encrypt($generator['fld_client_id'])); ?>" selected="selected"><?php echo $generator['fld_company']; ?></option>
                      <?php } else { ?>
                        <option value="<?php echo base64_encode($this->encryption->encrypt($generator['fld_client_id'])); ?>"><?php echo $generator['fld_company']; ?></option>
                      <?php } ?>
                    <?php } else { ?>
                      <option value="<?php echo base64_encode($this->encryption->encrypt($generator['fld_client_id'])); ?>"><?php echo $generator['fld_company']; ?></option>
                    <?php } ?>
                  <?php } } ?>
                </select>
              </div>
            </div>
            <div class="form-group col-md-3">
              <label for="location">Location</label>
              <input type="text" class="form-control" id="location" name="location" placeholder="Filter by location">
            </div>
            <div class="form-group col-md-3">
              <label for="waste_generating">Waste generated</label>
              <div class="">
                <select class="form-control select2" name="waste_type">
                  <option label="Choose one"></option>
                  <?php if($get_param['waste_type'] && ($get_param['waste_type'] == '1')) { ?>
                    <option value="1" selected="selected">Paper</option>
                  <?php } else { ?>
                    <option value="1">Paper</option>
                  <?php } ?>
                  <?php if($get_param['waste_type'] && ($get_param['waste_type'] == '2')) { ?>
                    <option value="2" selected="selected">Plastic</option>
                  <?php } else { ?>
                    <option value="2">Plastic</option>
                  <?php } ?>
                  <?php if($get_param['waste_type'] && ($get_param['waste_type'] == '3')) { ?>
                    <option value="3" selected="selected">Glass</option>
                  <?php } else { ?>
                    <option value="3">Glass</option>
                  <?php } ?>
                  <?php if($get_param['waste_type'] && ($get_param['waste_type'] == '4')) { ?>
                    <option value="4" selected="selected">Metal</option>
                  <?php } else { ?>
                    <option value="4">Metal</option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group col-md-3">
              <label for="waste_generating">&nbsp;</label>
              <button type="submit" class="btn btn-block btn-primary" name="filter" value="true"> <i data-feather="filter"></i> Filter</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-12">
        <div data-label="Client List" class="df-example demo-table">
          <table id="existing-client-table" class="table">
            <thead>
              <tr>
                <th class="wd-20p">Generator Name</th>
                <th class="wd-20p">Contact Person</th>
                <th class="wd-25p">Location</th>
                <th class="wd-15p">Email</th>
                <th class="wd-15p">Mobile</th>
                <th class="wd-20p">Type of wate generated</th>
                <th class="wd-5p">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($generators)){ foreach ($generators as $key => $generator) { ?>
                <tr>
                  <td><?php echo strtoupper($generator['fld_company']); ?></td>
                  <td><?php echo ucwords(strtolower($generator['incharge_firstname'].' '.$generator['incharge_lastname'])); ?></td>
                  <td><?php echo $generator['fld_location']; ?></td>
                  <td><?php echo strtolower($generator['incharge_email']); ?></td>
                  <td><?php echo $generator['incharge_contact']; ?></td>
                  <td>
                    <?php if(!empty($generator['wastes_generating'])) { $wastes = array( '1' => 'Paper', '2' => 'Plastic', '3' => 'Glass', '4' => 'Metal' );
                    foreach ($generator['wastes_generating'] as $key => $value) { ?>
                      <span class="badge badge-pill badge-<?php echo strtolower($wastes[$value]); ?>"><?php echo ucfirst($wastes[$value]); ?></span>
                    <?php } } ?>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="more-vertical"></i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">View</a>
                        <a class="dropdown-item" href="#">Contacts</a>
                        <a class="dropdown-item" href="#">Branch Report</a>
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