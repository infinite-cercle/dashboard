<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="">Generator</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New Generator</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Add New Generator</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-md-12">
        <div data-label="Example" class="df-example demo-forms">
          <form>
            <div class="form-group">
              <label for="company_name">Company Name</label>
              <input type="text" class="form-control" id="company_name" placeholder="Enter the company name">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="person_name">Name of the person</label>
                <input type="text" class="form-control" id="person_name" placeholder="Enter the client name">
              </div>
              <div class="form-group col-md-6">
                <label for="client_designation">Designation</label>
                <input type="text" class="form-control" id="client_designation" placeholder="Enter the designation">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="workemail">Email</label>
                <input type="email" class="form-control" id="workemail" placeholder="Enter the email">
              </div>
              <div class="form-group col-md-6">
                <label for="contact">Contact number</label>
                <input type="text" class="form-control" id="contact" placeholder="Enter the contact number">
              </div>
            </div>
            <div class="form-group">
              <label for="hq_location">HQ Location</label>
              <input type="text" class="form-control" id="hq_location" placeholder="Enter the Headquarters location">
            </div>
            <div class="form-group">
              <label for="inputAddress">Industry type</label>
              <select class="form-control select2">
                <option></option>
                <!-- <option value="Software development">Software development</option> -->
                <option value="Restaurant">Restaurant</option>
                <option value="Grocery">Grocery</option>
                <option value="Retail">Retail</option>
                <option value="Manufacturing">Manufacturing</option>
                <option value="Distribution & Logistics">Distribution & Logistics</option>
                <option value="HealthCare">HealthCare</option>
              </select>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="workemail" class="d-block font-weight-bold">Number of locations</label>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="workemail">Office</label>
                <select class="form-control">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              </div>
              <div class="form-group col-md-4">
                <label for="workemail">Factories</label>
                <select class="form-control">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              </div>
              <div class="form-group col-md-4">
                <label for="workemail">Warehouses</label>
                <select class="form-control">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <label for="waste_majority">Majority of the waste</label>
              <select class="form-control select2">
                <option label="Choose one"></option>
                <option value="Firefox">Paper</option>
                <option value="Chrome">Plastic</option>
                <option value="Safari">Glass</option>
                <option value="Opera">Metal</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Generator</button>
          </form>
        </div>
      </div>
    </div>
    <!-- row -->
  </div><!-- container -->
</div>