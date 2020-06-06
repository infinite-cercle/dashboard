<div class="content-body pd-0" style="padding-bottom: 0 !important; ">
  <div class="contact-wrapper contact-wrapper-two">
    <div class="contact-sidebar">
      <div class="contact-sidebar-body">
        <div class="tab-content">
          <div id="tabContact" class="tab-pane fade active show">
            <div class="pd-y-20 pd-x-10 contact-list">
              <a href="#modalNewContact" class="btn btn-xs btn-icon btn-primary d-table m-auto" data-toggle="modal">
                <span data-toggle="tooltip" title="Add New Contact"><i data-feather="user-plus"></i> Add your contact</span>
              </a><!-- contact-add -->
              <div class="clearfix"></div>
              <?php
                if(!empty($contacts)){
                  $lastChar = '';
                  foreach($contacts as $val) {
                    $char = $val['fld_firstname'][0]; //first char

                    if ($char !== $lastChar) {
                      echo '<label id="contact'.strtoupper($char).'" class="contact-list-divider">'.strtoupper($char).'</label>'; //print A / B / C etc
                      $lastChar = $char;
                    } ?>
                    <div class="media getContactInfo" data-target="<?php echo $this->encryption->encrypt($val['fld_id']); ?>">
                      <div class="avatar avatar-sm"><span class="avatar-initial rounded-circle bg-gray-700" style="background-color: <?php echo $val['fld_color_hex']; ?>;"><?php echo strtoupper($char); ?></span></div>
                      <div class="media-body mg-l-10">
                        <h6 class="tx-13 mg-b-3"><?php echo $val['fld_firstname']; ?></h6>
                        <span class="tx-12"><?php echo $val['fld_phone']; ?></span>
                      </div><!-- media-body -->
                      <nav>
                        <a class="edit_contact" data-target="<?php echo $this->encryption->encrypt($val['fld_id']); ?>"><i data-feather="edit-2"></i></a>
                      </nav>
                    </div><!-- media -->
                  <?php } } ?>
            </div><!-- contact-list -->
          </div><!-- tab-pane -->
        </div><!-- tab-content -->
      </div><!-- contact-sidebar-body -->
    </div><!-- contact-sidebar -->

    <div class="contact-content">
      <div class="contact-content-header">
        <nav class="nav">
          <a href="#contactInformation" class="nav-link active" data-toggle="tab">Contact Info<span>rmation</span></a>
        </nav>
        <a href="" id="contactOptions" class="text-secondary mg-l-auto d-xl-none"><i data-feather="more-horizontal"></i></a>
      </div><!-- contact-content-header -->

      <div class="contact-content-body">
        <div class="tab-content">
          <div id="contactInformation" class="tab-pane show active pd-20 pd-xl-25 d-none">
            <div class="d-flex align-items-center justify-content-between mg-b-25">
              <h6 class="mg-b-0">Personal Details</h6>
              <div class="d-flex">
                <a class="btn btn-sm btn-white d-flex align-items-center mg-r-5 edit_contact" id="contact_target" data-target=""><i data-feather="edit-2"></i><span class="d-none d-sm-inline mg-l-5"> Edit</span></a>
                <a href="#modalDeleteContact" data-toggle="modal" class="btn btn-sm btn-white d-flex align-items-center"><i data-feather="trash"></i><span class="d-none d-sm-inline mg-l-5"> Delete</span></a>
              </div>
            </div>

            <div class="row">
              <div class="col-6 col-sm">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Firstname</label>
                <p class="mg-b-0" id="contact_firstname">Abigail</p>
              </div><!-- col -->
              <div class="col-sm mg-t-20 mg-sm-t-0">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Lastname</label>
                <p class="mg-b-0" id="contact_lastname">Johnson</p>
              </div><!-- col -->
            </div><!-- row -->

            <h6 class="mg-t-40 mg-b-20">Contact Details</h6>

            <div class="row row-sm">
              <div class="col-sm-4 mg-t-20 mg-sm-t-30">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Mobile Phone</label>
                <p class="tx-primary tx-rubik mg-b-0" id="contact_phone">+1 290 912 3868</p>
              </div>
              <div class="col-sm-4 mg-t-20 mg-sm-t-30">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Email Address</label>
                <p class="tx-primary mg-b-0" id="contact_email">me@themepixels.me</p>
              </div>
              <div class="col-sm-4 mg-t-20 mg-sm-t-30">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Job Position</label>
                <p class="mg-b-0" id="contact_designation">President &amp; CEO</p>
              </div>
              <div class="col-sm-6 mg-t-20 mg-sm-t-30">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Address</label>
                <p class="mg-b-0" id="contact_address">4658 Kenwood Place<br>Pompano Beach, FL 33060, United States</p>
              </div>
              <div class="col-sm-6 mg-t-20 mg-sm-t-30">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Notes</label>
                <p class="tx-13 mg-b-0" id="contact_note">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
              </div>
            </div><!-- row -->
          </div>
        </div><!-- tab-content -->
      </div><!-- contact-content-body -->
    </div><!-- contact-content -->

  </div><!-- contact-wrapper -->
</div>

<div class="modal fade effect-scale" id="modalNewContact" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="" method="POST" accept-charset="utf-8">
        <div class="modal-body pd-20 pd-sm-30">
          <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

          <h5 class="tx-18 tx-sm-20 mg-b-20">Create New Contact</h5>
          <div class="d-sm-flex">
            <div class="flex-fill">
              <h6 class="mg-b-10">Personal Information</h6>
              <div class="form-group mg-b-10">
                <input type="text" class="form-control" placeholder="Firstname" name="firstname" required="required">
              </div><!-- form-group -->
              <div class="form-group mg-b-10">
                <input type="text" class="form-control" placeholder="Lastname" name="lastname">
              </div><!-- form-group -->
              <div class="form-group mg-b-10">
                <input type="text" class="form-control" placeholder="Address line 1" name="address_1" required="required">
              </div><!-- form-group -->
              <div class="form-group mg-b-10">
                <input type="text" class="form-control" placeholder="Address line 2" name="address_2">
              </div><!-- form-group -->
              <div class="form-group mg-b-10">
                <input type="text" class="form-control" placeholder="Designation" name="designation" required="required">
              </div><!-- form-group -->

              <h6 class="mg-t-20 mg-b-10">Contact Information</h6>

              <div class="form-group mg-b-10">
                <input type="text" class="form-control" placeholder="Phone number" name="phone_number" required="required">
              </div><!-- form-group -->
              <div class="form-group mg-b-10">
                <input type="email" class="form-control" placeholder="Email address" name="email" required="required">
              </div><!-- form-group -->

              <h6 class="mg-t-20 mg-b-10">Notes</h6>
              <textarea class="form-control" rows="2" placeholder="Add notes" name="notes"></textarea>
            </div><!-- col -->
          </div>
        </div>
        <div class="modal-footer">
          <div class="wd-100p d-flex flex-column flex-sm-row justify-content-end">
            <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Save Contact</button>
            <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Discard</button>
          </div>
        </div><!-- modal-footer -->
      </form>
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div>

<!-- Edit Modal -->
<div class="modal fade effect-scale" id="modalEditContact" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="" method="POST" accept-charset="utf-8">
        <div class="modal-body pd-20 pd-sm-30">
          <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

          <h5 class="tx-18 tx-sm-20 mg-b-20">Create New Contact</h5>
          <div class="d-sm-flex">
            <div class="flex-fill">
              <h6 class="mg-b-10">Personal Information</h6>
              <div class="form-group mg-b-10">
                <input type="hidden" class="form-control" placeholder="Id" name="con_id">
                <input type="text" class="form-control" placeholder="Firstname" name="firstname" required="required">
              </div><!-- form-group -->
              <div class="form-group mg-b-10">
                <input type="text" class="form-control" placeholder="Lastname" name="lastname">
              </div><!-- form-group -->
              <div class="form-group mg-b-10">
                <input type="text" class="form-control" placeholder="Address line 1" name="address_1" required="required">
              </div><!-- form-group -->
              <div class="form-group mg-b-10">
                <input type="text" class="form-control" placeholder="Address line 2" name="address_2">
              </div><!-- form-group -->
              <div class="form-group mg-b-10">
                <input type="text" class="form-control" placeholder="Designation" name="designation" required="required">
              </div><!-- form-group -->

              <h6 class="mg-t-20 mg-b-10">Contact Information</h6>

              <div class="form-group mg-b-10">
                <input type="text" class="form-control" placeholder="Phone number" name="phone_number" required="required">
              </div><!-- form-group -->
              <div class="form-group mg-b-10">
                <input type="email" class="form-control" placeholder="Email address" name="email" required="required">
              </div><!-- form-group -->

              <h6 class="mg-t-20 mg-b-10">Notes</h6>
              <textarea class="form-control" rows="2" placeholder="Add notes" name="notes"></textarea>
            </div><!-- col -->
          </div>
        </div>
        <div class="modal-footer">
          <div class="wd-100p d-flex flex-column flex-sm-row justify-content-end">
            <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Save Contact</button>
            <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Discard</button>
          </div>
        </div><!-- modal-footer -->
      </form>
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div>