

      @extends('layouts.seller')

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
               
                  <h1 class="m-0 text-dark">Quotation Dashboard</h1>
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
            
         
                 
                {{-- @include('admin.include') --}}
                            @if(count((array)$data) > 0)
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="car">
                                          <div class="card-header">
                                     
                
                                            <div class="card-tools">
                                             
                                              <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#staticBackdrop">New Quotation</a>
                                              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                              </button>
                                              
                                              {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                              </button> --}}
                                            </div>
                                          </div>
                                        
                                            <div class="card-body">
                                              <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                  <th>Invoice No</th>
                                                  <th>Date</th>
                                                  <th>Customer Name</th>
                                                  <th>Address</th>
                                                  <th>Email</th>
                                                  <th>Phone</th>
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
                                          <td>{{$value->date}}</td>
                                          <td>{{$value->customer_name}}</td>
                                          <td>{{$value->address}}</td>
                                          <td>{{$value->email}}</td>
                                          <td>{{$value->phone}}</td>
                                          <td><a href="seller-view-quotation?quote={{$value->id}}" class="text-primary"><i class="fas fa-eye"></i></a>
                                           &nbsp; <a href="seller-delete-quotation?quote={{$value->id}}" style="background-color: ; color:#fc7b03"><i class="fas fa-trash"></i></a>
                                          </td>
                                         
                                        
                                        

                                        </tr> 
                                      
                      
                                      @endforeach
                                              
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                <th>Invoice No</th>
                                                <th>Date</th>
                                                <th>Customer Name</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>Phone</th>
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
                                       
                                        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#staticBackdrop">New Quotation</a>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                          <i class="fas fa-minus"></i>
                                        </button>
                                        
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                          <i class="fas fa-times"></i>
                                        </button>
                                      </div>
                                    </div>
                                  
                                      <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                          <thead>
                                          <tr>
                                            <th>Invoice No</th>
                                            <th>Date</th>
                                            <th>Customer Name</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                         
                                          </tr>
                                          </thead>
                                          <tbody>
                                      
                                        
                                          </tbody>
                                          <tfoot>
                                          <tr>
                                            <th>Invoice No</th>
                                            <th>Date</th>
                                            <th>Customer Name</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Phone</th>
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
                    
            
                  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog- modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Create Quotation</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/seller-new-quotation">
                                @csrf

                                <div class="form-group row">
                                  <label for="date" class="col-md-4 col-form-label text-md-right"><sup class="text-danger"></sup>{{ __('Date') }}</label>
                                   <input required class="col-md-6 form-control" type="date" name="date" class="form-control">
                                  <div class="col-md-6">
                                      @error('date')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              
  {{-- date	customer_name	address	email	phone	--}}

                                <div class="form-group row">
                                    <label for="customer_name" class="col-md-4 col-form-label text-md-right">{{ __('Customer Name') }}</label>

                                    <div class="col-md-6">
                                        <input required id="customer_name" type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name" value="{{ old('customer_name') }}"  autocomplete="customer_name" autofocus>
                                          
                                        @error('customer_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                  <label for="address" class="col-md-4 col-form-label text-md-right"><sup class="text-danger"></sup>{{ __('Address') }}</label>
      
                                  <div class="col-md-6">
                                      <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" autofocus>
                                      
                                     
                                      @error('address')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                                <div class="form-group row">
                                  <label for="email" class="col-md-4 col-form-label text-md-right"><sup class="text-danger"></sup>{{ __('Email') }}</label>
      
                                  <div class="col-md-6">
                                      <input required id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                      
                                     
                                      @error('email')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                                <div class="form-group row">
                                  <label for="phone" class="col-md-4 col-form-label text-md-right"><sup class="text-danger"></sup>{{ __('Phone') }}</label>
      
                                  <div class="col-md-6">
                                      <input required id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>
                                      
                                     
                                      @error('phone')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Next') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>


                    </div>
                  </div>
              </div>

             
            </div><!--/. container-fluid -->
          </section>
          <!-- /.content -->
          
        </div>
        
      @endsection
      
        