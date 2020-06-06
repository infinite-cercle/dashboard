<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Questionnaire</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Complete the basic Questionnaire</h4>
      </div>
      <!-- <div class="d-none d-md-block">
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail" class="wd-10 mg-r-5"></i> Email</button>
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
        <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
      </div> -->
    </div>

    <div class="row row-xs">
      <div class="col-md-12">
        <div class="alert alert-solid alert-danger d-flex align-items-center" role="alert">
          <i data-feather="alert-circle" class="mg-r-10"></i> It seems you didn't complete your basic questionnaires! Complete your questionnaires to access the application.
        </div>
        <form action="" method="post" accept-charset="utf-8">
          <div class="form-group">
            <label for="" class="d-block">How much paper waste will you produce in a month(Approximately in Kilograms)?</label>
            <input type="text" class="form-control" placeholder="">
          </div>
          <div class="form-group">
            <label class="d-block">Which of the following paper wastes are produced in your concern?</label>
          </div>
          <div class="form-group">
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck1_1" name="waste_type1" value="type1">
                  <label class="custom-control-label d-block" for="customCheck1_1">Newspapers</label>
              </div>
               <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck1_2" name="waste_type2" value="type2">
                  <label class="custom-control-label d-block" for="customCheck1_2">Books and Notes</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck1_3" name="waste_type3" value="type3">
                  <label class="custom-control-label d-block" for="customCheck1_3">Files and Records</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck1_4" name="waste_type4" value="type4">
                  <label class="custom-control-label d-block" for="customCheck1_4">Paper printables</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck1_5" name="waste_type5" value="type5">
                  <label class="custom-control-label d-block" for="customCheck1_5">Paper writables</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck1_6" name="waste_type6" value="type6">
                  <label class="custom-control-label d-block" for="customCheck1_6">Cardboard, Carton, Kraft papers</label>
              </div>
              <div class="clearfix"></div>
          </div>
          <div class="row">
            <label class="col-md-8">Books contribution to overall paper waste (1 being the lowest; 5 being the highest)? <small class="text-danger text-bold">*</small></label>
            <div class="col-md-4">
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio1_1" name="radio1" value="1" required="required">
                  <label class="custom-control-label d-block" for="radio1_1">1</label>
              </div>
               <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio1_2" name="radio1" value="2" required="required">
                  <label class="custom-control-label d-block" for="radio1_2">2</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio1_3" name="radio1" value="3" required="required">
                  <label class="custom-control-label d-block" for="radio1_3">3</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio1_4" name="radio1" value="4" required="required">
                  <label class="custom-control-label d-block" for="radio1_4">4</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio1_5" name="radio1" value="5" required="required">
                  <label class="custom-control-label d-block" for="radio1_5">5</label>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="row">
            <label class="col-md-8">Newspapers contribution to overall paper waste(1 being the lowest; 5 being the highest)? <small class="text-danger text-bold">*</small></label>
            <div class="col-md-4">
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio2_1" name="radio2" value="1" required="required">
                  <label class="custom-control-label d-block" for="radio2_1">1</label>
              </div>
               <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio2_2" name="radio2" value="2" required="required">
                  <label class="custom-control-label d-block" for="radio2_2">2</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio2_3" name="radio2" value="3" required="required">
                  <label class="custom-control-label d-block" for="radio2_3">3</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio2_4" name="radio2" value="4" required="required">
                  <label class="custom-control-label d-block" for="radio2_4">4</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio2_5" name="radio2" value="5" required="required">
                  <label class="custom-control-label d-block" for="radio2_5">5</label>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="row">
            <label class="col-md-8">Paper printables contribution to overall paper waste(1 being the lowest; 5 being the highest)? <small class="text-danger text-bold">*</small></label>
            <div class="col-md-4">
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio3_1" name="radio3" value="1" required="required">
                  <label class="custom-control-label d-block" for="radio3_1">1</label>
              </div>
               <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio3_2" name="radio3" value="2" required="required">
                  <label class="custom-control-label d-block" for="radio3_2">2</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio3_3" name="radio3" value="3" required="required">
                  <label class="custom-control-label d-block" for="radio3_3">3</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio3_4" name="radio3" value="4" required="required">
                  <label class="custom-control-label d-block" for="radio3_4">4</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio3_5" name="radio3" value="5" required="required">
                  <label class="custom-control-label d-block" for="radio3_5">5</label>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="row">
            <label class="col-md-8">Paper writables contribution to overall paper waste(1 being the lowest; 5 being the highest)? <small class="text-danger text-bold">*</small></label>
            <div class="col-md-4">
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio4_1" name="radio4" value="1" required="required">
                  <label class="custom-control-label d-block" for="radio4_1">1</label>
              </div>
               <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio4_2" name="radio4" value="2" required="required">
                  <label class="custom-control-label d-block" for="radio4_2">2</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio4_3" name="radio4" value="3" required="required">
                  <label class="custom-control-label d-block" for="radio4_3">3</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio4_4" name="radio4" value="4" required="required">
                  <label class="custom-control-label d-block" for="radio4_4">4</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio4_5" name="radio4" value="5" required="required">
                  <label class="custom-control-label d-block" for="radio4_5">5</label>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="row">
            <label class="col-md-8">Cardboard,carton, kraft paper contribution to overall paper waste(1 being the lowest; 5 being the highest)? <small class="text-danger text-bold">*</small></label>
            <div class="col-md-4">
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio5_1" name="radio5" value="1" required="required">
                  <label class="custom-control-label d-block" for="radio5_1">1</label>
              </div>
               <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio5_2" name="radio5" value="2" required="required">
                  <label class="custom-control-label d-block" for="radio5_2">2</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio5_3" name="radio5" value="3" required="required">
                  <label class="custom-control-label d-block" for="radio5_3">3</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio5_4" name="radio5" value="4" required="required">
                  <label class="custom-control-label d-block" for="radio5_4">4</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio5_5" name="radio5" value="5" required="required">
                  <label class="custom-control-label d-block" for="radio5_5">5</label>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-md-8">Files and records contribution to overall paper waste(1 being the lowest; 5 being the highest)? <small class="text-danger text-bold">*</small></label>
            <div class="col-md-4">
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio6_1" name="radio6" value="1" required="required">
                  <label class="custom-control-label d-block" for="radio6_1">1</label>
              </div>
               <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio6_2" name="radio6" value="2" required="required">
                  <label class="custom-control-label d-block" for="radio6_2">2</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio6_3" name="radio6" value="3" required="required">
                  <label class="custom-control-label d-block" for="radio6_3">3</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio6_4" name="radio6" value="4" required="required">
                  <label class="custom-control-label d-block" for="radio6_4">4</label>
              </div>
              <div class="custom-control custom-radio d-table float-left mr-2">
                <input type="radio" class="custom-control-input d-block" id="radio6_5" name="radio6" value="5" required="required">
                  <label class="custom-control-label d-block" for="radio6_5">5</label>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="form-group">
            <label class="d-block">Which of the following paper wastes are produced in your concern? <small class="text-danger text-bold">*</small></label>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio7_1" name="radio7" value="1" required="required">
              <label class="custom-control-label d-block" for="radio7_1">Yes</label>
            </div>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio7_2" name="radio7" value="2" required="required">
              <label class="custom-control-label d-block" for="radio7_2">No</label>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label class="d-block">Do you have separate receptacle for each floor?</label>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio8_1" name="radio8" value="1">
              <label class="custom-control-label d-block" for="radio8_1">Yes</label>
            </div>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio8_2" name="radio8" value="2">
              <label class="custom-control-label d-block" for="radio8_2">No</label>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label class="d-block">Which of the following containers do you use to collect paper waste?</label>
            <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck2_1" name="container1" value="container1">
                  <label class="custom-control-label d-block" for="customCheck2_1">Plastic bins</label>
              </div>
               <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck2_2" name="container2" value="container2">
                  <label class="custom-control-label d-block" for="customCheck2_2">Sacks</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck2_3" name="container3" value="container3">
                  <label class="custom-control-label d-block" for="customCheck2_3">Other</label>
              </div>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label for="" class="d-block">Other containers:</label>
            <input type="text" class="form-control" placeholder="">
          </div>
          <div class="form-group">
            <label class="d-block">Where do you dispose these paper wastes?</label>
            <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck3_1" name="dispose1" value="dispose1">
                  <label class="custom-control-label d-block" for="customCheck3_1">Public bins</label>
              </div>
               <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck3_2" name="dispose2" value="dispose2">
                  <label class="custom-control-label d-block" for="customCheck3_2">Land fill dumping</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck3_3" name="dispose3" value="dispose3">
                  <label class="custom-control-label d-block" for="customCheck3_3">Sending to scrap dealers</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck3_4" name="dispose4" value="dispose4">
                  <label class="custom-control-label d-block" for="customCheck3_4">Other</label>
              </div>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label class="d-block">Why you dispose these paper wastes in public bins? <small class="text-danger text-bold">*</small></label>
            <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck4_1" name="publicbin1" value="publicbin1">
                  <label class="custom-control-label d-block" for="customCheck4_1">Public bins</label>
              </div>
               <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck4_2" name="publicbin2" value="publicbin2">
                  <label class="custom-control-label d-block" for="customCheck4_2">Paper waste accumulate too much space</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck4_3" name="publicbin3" value="publicbin3">
                  <label class="custom-control-label d-block" for="customCheck4_3">No Paper waste management</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck4_4" name="publicbin4" value="publicbin4">
                  <label class="custom-control-label d-block" for="customCheck4_4">Other</label>
              </div>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label for="" class="d-block">How often do scrap dealers collect your paper waste in a month? <small class="text-danger text-bold">*</small></label>
            <input type="text" class="form-control" placeholder="">
          </div>
          <div class="form-group">
            <label for="" class="d-block">On a average, how much will the scrap dealers pay you(Rs/kg)?</label>
            <input type="text" class="form-control" placeholder="">
          </div>
          <div class="form-group">
            <label class="d-block">Do you use any confidential and sensible statement papers in your concern?</label>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio9_1" name="radio9" value="1">
              <label class="custom-control-label d-block" for="radio9_1">Yes</label>
            </div>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio9_2" name="radio9" value="2">
              <label class="custom-control-label d-block" for="radio9_2">No</label>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label class="d-block">How many bins would you like to be placed in your company(More bins, better segregation)?</label>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio10_1" name="radio10" value="1">
              <label class="custom-control-label d-block" for="radio10_1">1</label>
            </div>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio10_2" name="radio10" value="2">
              <label class="custom-control-label d-block" for="radio10_2">2</label>
            </div>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio10_3" name="radio10" value="3">
              <label class="custom-control-label d-block" for="radio10_3">3</label>
            </div>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio10_4" name="radio10" value="4">
              <label class="custom-control-label d-block" for="radio10_4">4</label>
            </div>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio10_5" name="radio10" value="5">
              <label class="custom-control-label d-block" for="radio10_5">5</label>
            </div>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio10_6" name="radio10" value="6">
              <label class="custom-control-label d-block" for="radio10_6">6</label>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label class="d-block">Are you willing to trade with our sustainable stationeries for your paper waste?</label>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio11_1" name="radio11" value="1">
              <label class="custom-control-label d-block" for="radio11_1">Yes</label>
            </div>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio11_2" name="radio11" value="2">
              <label class="custom-control-label d-block" for="radio11_2">No</label>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label class="d-block font-weight-bold">If Yes, Provide us the following details:</label>
          </div>
          <div class="form-group">
            <label class="d-block">which of the following stationery items do you use in your concern?</label>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck5_1" name="stationary1" value="1">
                  <label class="custom-control-label d-block" for="customCheck5_1">Pencil, pens</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck5_2" name="stationary2" value="2">
                  <label class="custom-control-label d-block" for="customCheck5_2">Calenders</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck5_3" name="stationary3" value="3">
                  <label class="custom-control-label d-block" for="customCheck5_3">Notebooks</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck5_4" name="stationary4" value="4">
                  <label class="custom-control-label d-block" for="customCheck5_4">Filing and storage</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck5_5" name="stationary5" value="5">
                  <label class="custom-control-label d-block" for="customCheck5_5">Mailing and shipping supplies</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck5_6" name="stationary6" value="6">
                  <label class="custom-control-label d-block" for="customCheck5_6">Papers and pads</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck5_7" name="stationary7" value="7">
                  <label class="custom-control-label d-block" for="customCheck5_7">Carton packaging</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck5_8" name="stationary8" value="8">
                  <label class="custom-control-label d-block" for="customCheck5_8">Business cards</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck5_9" name="stationary9" value="9">
                  <label class="custom-control-label d-block" for="customCheck5_9">Coasters</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck5_10" name="stationary10" value="10">
                  <label class="custom-control-label d-block" for="customCheck5_10">Jute bags</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck5_11" name="stationary11" value="11">
                  <label class="custom-control-label d-block" for="customCheck5_11">Paper straws</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck5_12" name="stationary12" value="12">
                  <label class="custom-control-label d-block" for="customCheck5_12">Envelopes</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck5_13" name="stationary13" value="13">
                  <label class="custom-control-label d-block" for="customCheck5_13">Note pads</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck5_14" name="stationary14" value="14">
                  <label class="custom-control-label d-block" for="customCheck5_14">Paper tissues</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck5_15" name="stationary15" value="15">
                  <label class="custom-control-label d-block" for="customCheck5_15">Letter pads</label>
              </div>
              <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label for="" class="d-block">How much you spend on stationery products per month? <small class="text-danger text-bold">*</small></label>
            <input type="text" class="form-control" placeholder="">
          </div>
          <div class="form-group">
            <label class="d-block">Do you find any difficulties in sourcing stationery products? <small class="text-danger text-bold">*</small></label>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio12_1" name="radio12" value="1">
              <label class="custom-control-label d-block" for="radio12_1">Yes</label>
            </div>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio12_2" name="radio12" value="2">
              <label class="custom-control-label d-block" for="radio12_2">No</label>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label class="d-block">which of the following stationery items do you use in your concern?</label>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck6_1" name="difficulties1" value="1">
                  <label class="custom-control-label d-block" for="customCheck6_1">Pricing</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck6_2" name="difficulties2" value="2">
                  <label class="custom-control-label d-block" for="customCheck6_2">Customization unavailability</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck6_3" name="difficulties3" value="3">
                  <label class="custom-control-label d-block" for="customCheck6_3">Limited designs</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck6_4" name="difficulties4" value="4">
                  <label class="custom-control-label d-block" for="customCheck6_4">Involve Multiple vendors</label>
              </div>
              <div class="custom-control custom-checkbox d-table float-left mr-2">
                <input type="checkbox" class="custom-control-input d-block" id="customCheck6_5" name="difficulties5" value="5">
                  <label class="custom-control-label d-block" for="customCheck6_5">Other</label>
              </div>
              <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label for="" class="d-block">Specify other difficulties:</label>
            <input type="text" class="form-control" placeholder="">
          </div>
          <div class="form-group">
            <label class="d-block font-weight-bold">Quantity of products used on a monthly basis</label>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="Pencils">Pencils</label>
              <input type="email" class="form-control" id="Pencils" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="Pens">Pens</label>
              <input type="text" class="form-control" id="Pens" placeholder="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="A4 Paper">A4 Paper</label>
              <input type="email" class="form-control" id="A4 Paper" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="Coasters">Coasters</label>
              <input type="text" class="form-control" id="Coasters" placeholder="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="Business cards">Business cards</label>
              <input type="email" class="form-control" id="Business cards" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="Envelopes">Envelopes</label>
              <input type="text" class="form-control" id="Envelopes" placeholder="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="Plastic/Paper Straws">Plastic/Paper Straws</label>
              <input type="email" class="form-control" id="Plastic/Paper Straws" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="Notepads">Notepads</label>
              <input type="text" class="form-control" id="Notepads" placeholder="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="Jute/Paper/Cotton/Plastic bags">Jute/Paper/Cotton/Plastic bags</label>
              <input type="email" class="form-control" id="Jute/Paper/Cotton/Plastic bags" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="Notebooks">Notebooks</label>
              <input type="text" class="form-control" id="Notebooks" placeholder="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="Carton packaging">Carton packaging</label>
              <input type="email" class="form-control" id="Carton packaging" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="Other Paper Products?">Other Paper Products?</label>
              <input type="text" class="form-control" id="Other Paper Products?" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label class="d-block font-weight-bold">Step towards Sustainability</label>
          </div>
          <div class="form-group">
            <label class="d-block">Is there an audit for paper Waste management in your concern?</label>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio13_1" name="radio13" value="1">
              <label class="custom-control-label d-block" for="radio13_1">Yes</label>
            </div>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio13_2" name="radio13" value="2">
              <label class="custom-control-label d-block" for="radio13_2">No</label>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label class="d-block">Would you like us to audit your paper waste management? <small class="text-danger text-bold">*</small></label>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio14_1" name="radio14" value="1">
              <label class="custom-control-label d-block" for="radio14_1">Yes</label>
            </div>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio14_2" name="radio14" value="2">
              <label class="custom-control-label d-block" for="radio14_2">No</label>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label class="d-block">Have you done any paper waste workshops or events in your concern? <small class="text-danger text-bold">*</small></label>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio15_1" name="radio15" value="1">
              <label class="custom-control-label d-block" for="radio15_1">Yes</label>
            </div>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio15_2" name="radio15" value="2">
              <label class="custom-control-label d-block" for="radio15_2">No</label>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label class="d-block font-weight-bold">We host a Paper Waste Management Workshop that's guaranteed to get your office started on a 30-day challenge to reduce paper waste by 50%. Can we offer that?</label>
          </div>
          <div class="form-group">
            <label class="d-block">Paper Waste Management Workshop? <small class="text-danger text-bold">*</small></label>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio16_1" name="radio16" value="1">
              <label class="custom-control-label d-block" for="radio16_1">Yes</label>
            </div>
            <div class="custom-control custom-radio d-table float-left mr-2">
              <input type="radio" class="custom-control-input d-block" id="radio16_2" name="radio16" value="2">
              <label class="custom-control-label d-block" for="radio16_2">No</label>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary float-right">Submit</button>
          </div>
        </form>
      </div>
    </div><!-- row -->
  </div><!-- container -->
</div>