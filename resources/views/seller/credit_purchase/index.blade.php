

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
               
                  <h1 class="m-0 text-dark">Credit Purchase Dashboard</h1>
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
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif
            @if (session('empty'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Waoo!</strong> {{session('empty')}}
              <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif
                 
                {{-- @include('admin.include') --}}
                            @if(count((array)$data) > 0)
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="card">
                                          <div class="card-header">
                                     
                
                                            <div class="card-tools">
                                             
                                              <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#staticBackdrop">New Credit Purchase</a>
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
                                                  <th>Supplier Name</th>
                                                  <th>Product Name</th>
                                                  <th>Quantity</th>
                                                  <th>Price (TZS)</th>
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
                                          <td>{{$value->customer_name}}</td>
                                          <td>{{$value->address}}</td>
                                          <td>{{$value->email1}}</td>
                                          <td>{{$value->email2}}</td>
                                          <td>{{$value->phone1}}</td>
                                          <td>{{$value->phone2}}</td>
                                          <td>{{$value->phone3}}</td>
                                          <td>{{$value->description}}</td>
                                          <td><a href="seller-edit-customer?customer={{$value->id}}" class="text-primary"><i class="fas fa-edit"></i></a>
                                           &nbsp; <a href="seller-delete-customer?customer={{$value->id}}" style="background-color: ; color:#fc7b03"><i class="fas fa-trash"></i></a>
                                          </td>
                                         
                                        
                                        

                                        </tr> 
                                      
                      
                                      @endforeach
                                              
                                                </tbody>
                                                <tfoot>
                                                  <tr>
                                                    <th>Supplier Name</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price (TZS)</th>
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
                                  <div class="card">
                                    <div class="card-header">
                                     
                
                                      <div class="card-tools">
                                       
                                        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#staticBackdrop">New Credit Purchase</a>
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
                                            <tr>
                                              <th>Supplier Name</th>
                                              <th>Product Name</th>
                                              <th>Quantity</th>
                                              <th>Price (TZS)</th>
                                              <th>Action</th>
                                            </tr>
                                         
                                          </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>Almas Mzugu</td>
                                              <td>Book</td>
                                              <td>3</td>
                                              <td>16000</td>
                                              <td>
                                                <button class="btn btn-dark">Pay</button>
                                                <button class="btn btn-warning" data-toggle="modal" data-target="#staticBackdrop">Edit</button>
                                                <button class="btn btn-danger">Delete</button>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>Almas Mzugu</td>
                                              <td>Book</td>
                                              <td>3</td>
                                              <td>16000</td>
                                              <td>
                                                <button class="btn btn-dark">Pay</button>
                                                <button class="btn btn-warning" data-toggle="modal" data-target="#staticBackdrop">Edit</button>
                                                <button class="btn btn-danger">Delete</button>
                                              </td>
                                            </tr>
                                      
                                        
                                          </tbody>
                                          <tfoot>
                                          <tr>
                                            <tr>
                                              <th>Supplier Name</th>
                                              <th>Product Name</th>
                                              <th>Quantity</th>
                                              <th>Price (TZS)</th>
                                              <th>Action</th>
                                            </tr>
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
                        <h5 class="modal-title" id="staticBackdropLabel">Add Credit Purchase</h5>
                        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="seller-save-customer">
                                @csrf

                              
                              
  {{-- date	customer_name	address	email	phone	--}}

                                <div class="form-group row">
                                    <label for="supplier_name" class="col-md-4 col-form-label text-md-right">{{ __('Select Supplier') }}</label>

                                    <div class="col-md-3">
                                      <select name="" id="" class="form-control">
                                        <option value="">Juma Kim</option>
                                        <option value="">Hanifa Jafari</option>
                                      </select>
                                          
                                        @error('supplier_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary col-md-3">New Customer</button>

                                </div>

                                <div class="form-group row">
                                  <label for="product_name" class="col-md-4 col-form-label text-md-right"><sup class="text-danger"></sup>{{ __('Product Name') }}</label>
      
                                  <div class="col-md-6">
                                      <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" autocomplete="product_name" autofocus>
                                      
                                     
                                      @error('product_name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>


                              <div class="form-group row">
                                <label for="quantity" class="col-md-4 col-form-label text-md-right"><sup class="text-danger"></sup>{{ __('Quantity') }}</label>
    
                                <div class="col-md-6">
                                    <input placeholder="Product Quantity"  id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" autocomplete="quantity" autofocus>
                                    
                                   
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="form-group row">
                              <label for="price" class="col-md-4 col-form-label text-md-right"><sup class="text-danger"></sup>{{ __('Price') }}</label>
  
                              <div class="col-md-6">
                                  <input required id="price" placeholder="Amount in Tsh" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" autocomplete="price" autofocus>
                                  
                                 
                                  @error('price')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add') }}
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
      
        