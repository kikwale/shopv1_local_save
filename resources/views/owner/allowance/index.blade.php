

      @extends('layouts.owner')

      <?php
      App::setLocale(Session::get('locale'));
      ?>
      
      @section('content')
          <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
      
                     {{-- <!-- Info boxes -->
       <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-i elevation-1" style="background-color:#006699" ><i class="fas fa-users text-white"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Total O-level {{Session::get('owner_id')}} {{Session::get('shop_id')}}</span>
              <span class="info-box-number">
              3546
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg- elevation-1" style="background-color:#006699"><i class="fas fa-users text-white"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Total A-level</span>
              <span class="info-box-number">4354</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
    
        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>
    
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-in elevation-1" style="background-color:#006699"><i class="fas fa-users text-white"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Undergraduates</span>
              <span class="info-box-number">2242</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-inf elevation-1" style="background-color:#006699"><i class="fas fa-users text-white"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Graduates</span>
              <span class="info-box-number">443</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row --> --}}


              <div class="row mb-2">
                <div class="col-sm-6">
               
                  <h1 class="m-0 text-dark">Allowances To Employees</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
      
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
            
              @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Waoo!</strong> {{session('success')}}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              @if (session('unsold') == "Sold")
             <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Ok !! </strong> Successfuly Product(s) Sold.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              @endif

              @if (session('sale_empty') == "empty")
             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Ok !! </strong> No Product have been Sold
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              @endif

              @if (session('unsold1') == "Unsold")
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Ok !! </strong> Many Products You have sell than that Stored, You want to sell {{session('product_sold')}} Product(s) WHILE you have {{session('product_stored')}} Product(s)
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              @endif
                 
                {{-- @include('admin.include') --}}
                            @if(count((array)$data) > 0)
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="car">
                                          <div class="card-header">
                                     
                
                                            <div class="card-tools">
                                             
                                              <a href="assign-allowance" class="btn btn-primary">Assign Allowances</a>
                                            
                                            </div>
                                          </div>
                                        
                                            <div class="card-body">
                                              <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Serial No</th>
                                                    <th>Employee Name</th>
                                                    <th>Allowance Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                              
                    {{-- Full texts	
                              
Full texts
id
name
owner_id
shop_id
loan_amount
year
month
date
payment_period
instalment_payment
balance
created_at
updated_at
--}}
                                          @foreach($data as $value)
                                      
                                        <tr>
                                          <td>#000{{$value->id}}</td>
                                          <td>{{$value->fname}}&nbsp; &nbsp; {{$value->lname}}</td>
                                          <td>{{$value->amount}}{{ Session::get('money') }}</td>
                                          <td>
                    
                                            <a href="owner-allowance-edit?al={{ $value->id }}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="owner-allowance-delete?al={{ $value->id }}" class="btn btn-sm btn-danger">Delete</a>

                                          </td>
                                    
           
                                            <!-- Modal -->
                                            <div class="modal fade" id="loan_return{{ $value->id }}"
                                              data-backdrop="static" data-keyboard="false" tabindex="-1"
                                              aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                              <div
                                                  class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                  <div class="modal-content">
                                                      <div class="modal-header bg-info">
                                                          <h5 class="modal-title" id="staticBackdropLabel">Return
                                                              Loan To Bos</h5>
                                                          <button type="button" class="btn-close"
                                                              data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                          </button>
                                                      </div>
                                                      <div class="modal-body">
                                                          <form method="POST" action="owner-employee-loan-return">
                                                              @csrf

                                                              <input id="shop_id" type="text"
                                                                  class="form-control @error('shop_id') is-invalid @enderror"
                                                                  name="shop_id"
                                                                  value="{{ Session::get('shop_id') }}" hidden
                                                                  autocomplete="shop_id">
                                                              <input id="owner_id" type="text"
                                                                  class="form-control @error('owner_id') is-invalid @enderror"
                                                                  name="owner_id"
                                                                  value="{{ Session::get('owner_id') }}" hidden
                                                                  autocomplete="owner_id">
                                                              <input id="loan_id" type="text"
                                                                  class="form-control @error('loan_id') is-invalid @enderror"
                                                                  name="loan_id" value="{{ $value->id }}"
                                                                  hidden autocomplete="loan_id">



                                                              <div class="form-group row">

                                                                  <div class="col-md-6">
                                                                      <label for="amount"
                                                                          class="col-md- col-form-label text-md-right">{{ __('Amount Paid') }}</label>

                                                                      <input required id="amount"
                                                                          type="number"
                                                                          class="form-control @error('amount') is-invalid @enderror"
                                                                          name="amount"
                                                                          value="{{ old('amount') }}"
                                                                          autocomplete="amount">

                                                                      @error('amount')
                                                                          <span class="invalid-feedback"
                                                                              role="alert">
                                                                              <strong>{{ $message }}</strong>
                                                                          </span>
                                                                      @enderror
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                      <label for="payment_method"
                                                                          class="col-md- col-form-label text-md-right">{{ __('Payment Method') }}</label>

                                                                      <select id="payment_method"
                                                                          class="form-control select2 @error('payment_method') is-invalid @enderror"
                                                                          name="payment_method"
                                                                          value="{{ old('payment_method') }}"
                                                                          autocomplete="payment_method"
                                                                          onchange="paymentMethod(this.value)">
                                                                          <option value=""></option>
                                                                          <option value="Bank">Bank</option>
                                                                          <option value="Phone">Phone</option>
                                                                          <option value="Cash">Cash</option>
                                                                      </select>
                                                                      @error('payment_method')
                                                                          <span class="invalid-feedback"
                                                                              role="alert">
                                                                              <strong>{{ $message }}</strong>
                                                                          </span>
                                                                      @enderror
                                                                  </div>
                                                              </div>

                                                              <div id="Bank" style="display: none;"
                                                                  >
                                                                  <div class="row">
                                                                      <div class="col-md-6">
                                                                          <label for="method_name"
                                                                              class="col-md- col-form-label text-md-right">Method
                                                                              Name</label>

                                                                          <select id="method_name"
                                                                              class="form-control select2 "
                                                                              name="method_name"
                                                                              autocomplete="method_name">
                                                                              <option value=""></option>
                                                                              <option value="CRDB">CRDB
                                                                              </option>
                                                                              <option value="NMB">NMB</option>
                                                                              <option value="KBC">KBC</option>
                                                                              <option value="AMANA BANK">AMANA
                                                                                  BANK</option>
                                                                          </select>



                                                                      </div>
                                                                      <div class="col-md-6" id="Phone2">
                                                                          <label for="number"
                                                                              class="col-md- col-form-label text-md-right">
                                                                              Account Number Paid</label>

                                                                          <input id="number"
                                                                              type="text"
                                                                              class="form-control "
                                                                              name="number"
                                                                              autocomplete="number">



                                                                      </div>
                                                                  </div>
                                                              </div>

                                                              <div id="Phone"
                                                                  style="display: none;">
                                                              <div class="row">
                                                                  <div class="col-md-6">
                                                                      <label for="method_name1"
                                                                          class="col-md- col-form-label text-md-right">Method
                                                                          Name</label>

                                                                      <select id="method_name1"
                                                                          class="form-control select2 "
                                                                          name="method_name1"
                                                                          autocomplete="method_name1">
                                                                          <option value=""></option>
                                                                          <option value="TIGO PESA">TIGO PESA
                                                                          </option>
                                                                          <option value="M-PESA">M-PESA</option>
                                                                          <option value="T-PESA">T-PESA</option>
                                                                          <option value="AIRTEL MONEY">ZBC
                                                                          </option>
                                                                          <option value="EZY PESA">EZY PESA
                                                                          </option>
                                                                          <option value="Selcom">Selcom</option>
                                                                      </select>



                                                                  </div>
                                                                  <div class="col-md-6" id="Phone2">
                                                                      <label for="number1"
                                                                          class="col-md- col-form-label text-md-right">
                                                                          Phone Number</label>

                                                                      <input id="number1"
                                                                          type="text" class="form-control "
                                                                          name="number1" autocomplete="number1">



                                                                  </div>
                                                              </div>
                                                              </div>

                                                              <div class="row">


                                                                  <div class="col-md-6" id="21">
                                                                      <label for="date1"
                                                                          class="col-md- col-form-label text-md-right">{{ __('Date of Payment') }}</label>

                                                                      <input required id="date"
                                                                          type="date"
                                                                          class="form-control @error('date') is-invalid @enderror"
                                                                          name="date"
                                                                          value="{{ old('date') }}"
                                                                          autocomplete="date">

                                                                      @error('date')
                                                                          <span class="invalid-feedback"
                                                                              role="alert">
                                                                              <strong>{{ $message }}</strong>
                                                                          </span>
                                                                      @enderror
                                                                  </div>

                                                              </div>


                                                              <div class="form-group row mb-0">
                                                                  <div class="col-md-10 ">

                                                                  </div>
                                                                  <div class="col-md-2 modal-footer">
                                                                      <button type="submit"
                                                                          class="btn btn-primary btn-sm">
                                                                          {{ __('Save') }}
                                                                      </button>
                                                                  </div>
                                                              </div>
                                                          </form>
                                                      </div>
                                                      <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary"
                                                              data-dismiss="modal">Close</button>
                                                      </div>
                                                  </div>


                                              </div>
                                          </div>
                  

                                        </tr> 
                                      
                      
                                      @endforeach
                                              
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                  <th>Serial No</th>
                                                  <th>Employee Name</th>
                                                  <th>Allowance Amount</th>
                                                  <th>Action</th>
                                                 
                                                </tr>
                                                </tfoot>
                                              </table>
                                            </div>
                                            <!-- /.card-body -->
                                          </div>
                                        <!-- /.card -->
                                      </div>
                                      <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                  @else
                            
                            <div class="row">
                                <div class="col-md-12">
                                  <div class="car">
                                    <div class="card-header">
                                     
                
                                      <div class="card-tools">
                                       
                                        <a href="assign-allowance" class="btn btn-primary">Assign Allowances</a>
                                      
                                      </div>
                                    </div>
                                  
                                      <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                          <thead>
                                          <tr>
                                            <th>Serial No</th>
                                            <th>Employee Name</th>
                                            <th>Allowance Amount</th>
                                            <th>Action</th>
                                         
                                          </tr>
                                          </thead>
                                          <tbody>
                                      
                                        
                                          </tbody>
                                          <tfoot>
                                          <tr>
                                            <th>Serial No</th>
                                            <th>Employee Name</th>
                                            <th>Allowance Amount</th>
                                            <th>Action</th>
                                          </tr>
                                          </tfoot>
                                        </table>
                                      </div>
                                      <!-- /.card-body -->
                                    </div>
                                  <!-- /.card -->
                                </div>
                                <!-- /.col -->
                              </div>
                              <!-- /.row -->
                    
                  @endif
                    
            
      
              </div>

             
            </div><!--/. container-fluid -->
          </section>
          <!-- /.content -->
          
        </div>

      @endsection
      <script>
        function paymentMethod(payment_method) {
          if (payment_method == "Bank") {
              $('#Phone').css('display', 'none');
                $('#Bank').css('display', 'block');
            }
            else if (payment_method == "Phone") {
                $('#Bank').css('display', 'none');
                $('#Phone').css('display', 'block');
            } else if (payment_method == "Cash") {
                $('#Bank').css('display', 'none');
                $('#Phone').css('display', 'none');
            }
    
        }
    </script>
       
        