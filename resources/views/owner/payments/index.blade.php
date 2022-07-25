
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
               
                  <h1 class="m-0 text-dark">Pay Employees Basic Salary</h1>
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

              @if (session('error'))
             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  {{ session('error') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              @endif

              @if (session('duplicate'))
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{session('duplicate')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              @endif

                {{-- @include('admin.include') --}}
                            @if(count((array)$data) > 0)
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="car">
                                          <div class="card-header">

                                             
                                            
                                            {{-- <h5 class="card-title">Sales Book</h5> --}}
                                            {{-- <a href="#">New Loan</a> --}}
                                          </div>
                                        
                                            <div class="card-body">
                                              <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                  <th>Serial No</th>
                                                  <th>Employee Name</th>
                                                  <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                              
                    {{-- Full texts	
                      
Full texts	
id
product_id
seller_id
owner_id
shop_id
day
month
year
sales_date Ascending 1
quantity
amount
sold_price
true_price
discount
profit
created_at
updated_at
                id	name	owner_id	shop_id	category	unit	quantity	amount	purchased_price	sold_price	expire	created_at	updated_at	
                    --}}
                                          @foreach($data as $value)
                                      
                                        <tr>
                                          <td>#000{{$value->id}}</td>
                                          <td>{{$value->fname}} &nbsp; {{$value->mname}} &nbsp; {{$value->lname}}</td>
                                          {{-- <td><a href="seller-print-receipt?id={{$value->id}}&&shop_id={{Session::get('shop_id')}} "><i class="fas fa-print"></i></a></td>
                                          --}}
                                        
                                          <td>
                                            <a data-toggle="modal" data-target="#payment{{ $value->id }}" href="#" class="btn btn-sm btn-info">Pay</a>
                                            <a href="#" class="btn btn-sm btn-success">Payments</a>
                                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                            <div class="modal fade" id="payment{{ $value->id }}"
                                              data-backdrop="static" data-keyboard="false" tabindex="-1"
                                              aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                              <div
                                                  class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                  <div class="modal-content">
                                                      <div class="modal-header bg-info">
                                                          <h5 class="modal-title" id="staticBackdropLabel">Pay Employee Salary</h5>
                                                          <button type="button" class="btn-close"
                                                              data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                          </button>
                                                      </div>
                                                      <div class="modal-body">
                                                          <form method="POST" action="owner-employee-salary">
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
                                                              <input id="employee_id" type="text"
                                                                  class="form-control @error('loan_id') is-invalid @enderror"
                                                                  name="employee_id" value="{{ $value->id }}"
                                                                  hidden autocomplete="employee_id">
  
  
  
                                                              <div class="form-group row">
  
                                                                  <div class="col-md-6">
                                                                      <label for="amount"
                                                                          class="col-md- col-form-label text-md-right">{{ __('Amount Paid/Salary') }}</label>
  
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
  
                                                                      <select id="{{ $value->id }}"
                                                                          class="form-control select2 @error('payment_method') is-invalid @enderror"
                                                                          name="payment_method"
                                                                          value="{{ old('payment_method') }}"
                                                                          autocomplete="payment_method"
                                                                          onchange="paymentMethod(this.id)">
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
                                                              <div id="Phone{{ $value->id }}" style="display: none;">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="method_name"
                                                                            class="col-md- col-form-label text-md-right">Method
                                                                            Name</label>
      
                                                                        <select id="method_name{{ $value->id }}"
                                                                            class="form-control select2 "
                                                                            name="method_name"
                                                                            autocomplete="method_name">
                                                                           
                                                                        </select>
      
      
      
                                                                    </div>
                                                                    <div class="col-md-6" id="Phone">
                                                                        <label for="number"
                                                                            class="col-md- col-form-label text-md-right">
                                                                            Number</label>
      
                                                                        <input id="number"
                                                                            type="text" class="form-control "
                                                                            name="number" autocomplete="number">
      
      
      
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
                                          </td>

                                          
                                          

                                        </tr> 
                                      
                      
                                      @endforeach
                                              
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Serial No</th>
                                                    <th>Employee Name</th>
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
                                       
                                        {{-- <a class="btn btn-primary" href="#">New Loan</a> --}}
                                       
                                      </div>
                                    </div>
                                  
                                      <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                          <thead>
                                          <tr>
                                            <th>Serial No</th>
                                            <th>Employee Name</th>
                                            <th>Action</th>
                                         
                                          </tr>
                                          </thead>
                                          <tbody>
                                      
                                        
                                          </tbody>
                                          <tfoot>
                                          <tr>
                                            <th>Serial No</th>
                                            <th>Employee Name</th>
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
        function paymentMethod(id) {
          var valu = document.getElementById(id).value;
          if (valu == "Bank") {
            $('#method_name'+id+'').append(''+
                  +'<option id="emty'+id+'" value=""></option>'
                    +'<option id="crdb'+id+'" value="CRDB">CRDB</option>'
                    +'<option id="nmb'+id+'" value="NMB">NMB</option>'
                    +'<option id="kbc'+id+'" value="KBC">KBC</option>'
                    +'<option id="amana'+id+'" value="AMANA BANK">AMANA BANK</option>'
            );
            $('#emty'+id+'').remove();
            $('#tigo'+id+'').remove();
            $('#voda'+id+'').remove();
            $('#tpesa'+id+'').remove();
            $('#airtel'+id+'').remove();
            $('#ezy'+id+'').remove();
            $('#selcome'+id+'').remove();
            $('#Phone'+id+'').css('display', 'block');
            }
            else if (valu == "Phone") {
                $('#method_name'+id+'').append(''+
                +'<option id="emty'+id+'" value=""></option>'
                  +'<option id="tigo'+id+'" value="TIGO PESA">TIGO PESA</option>'
                    +'<option id="voda'+id+'" value="M-PESA">M-PESA</option>'
                    +'<option id="tpesa'+id+'" value="T-PESA">T-PESA</option>'
                    +'<option id="airtel'+id+'" value="AIRTEL MONEY">ZBC</option>'
                    +'<option id="ezy'+id+'" value="EZY PESA">EZY PESA</option>'
                    +'<option id="selcome'+id+'" value="Selcom">Selcom</option>'
            );
            $('#emty'+id+'').remove();
            $('#crdb'+id+'').remove();
            $('#nmb'+id+'').remove();
            $('#kbc'+id+'').remove();
            $('#amana'+id+'').remove();
            $('#Phone'+id+'').css('display', 'block');
            } else if (valu == "Cash") {
                $('#Bank'+id+'').css('display', 'none');
                $('#Phone'+id+'').css('display', 'none');
            }
    
        }
    </script>
      