

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
               
                  <h1 class="m-0 text-dark">Add Products</h1>
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
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Waoo!</strong> {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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

                                          
                                          </div>
                                        
                                            <div class="card-body">
                                              <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                  <th>Product Name</th>
                                                  <th>Product Category</th>
                                                  <th>unit</th>
                                                  <th>quantity</th>
                                                  <th>Total</th>
                                                  <th>purchased Price</th>
                                                  <th>Price for Sale</th>
                                                  <th>Expire Date</th>
                                                  <th>Location</th>
                                                  <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                              
                    {{-- Full texts	
                      
                id	name	owner_id	shop_id	category	unit	quantity	amount	purchased_price	sold_price	expire	created_at	updated_at	
                    --}}
                                          @foreach($data as $value)
                                      
                                        <tr>
                                          <td>{{$value->name}}</td>
                                          <td>{{$value->category}}</td>
                                          <td>{{$value->unit}}</td>
                                          <td>{{$value->quantity}}</td>
                                          @if ($value->category == "Jumla")
                                          <td>{{$value->total}}
                                          @if (session('unsold') == $value->id)
                                            <small class="text-danger"> <span class="right badge badge-danger">Error</span></small>
                                          @endif
                                          @if (session('sold') == $value->id)
                                            <small class="text-success"> <span class="right badge badge-success">Success</span></small>
                                          @endif
                                          </td>
                                          @else
                                          <td>{{$value->total}}{{$value->unit}}
                                                @if (session('unsold') == $value->id)
                                                <small class="text-danger"> <span class="right badge badge-danger">Error</span></small>
                                              @endif
                                              @if (session('sold') == $value->id)
                                                <small class="text-success"> <span class="right badge badge-success">Success</span></small>
                                              @endif
                                          </td>
                                          @endif
                                          <td>{{$value->purchased_price}}</td>
                                          <td>{{$value->sold_price}}</td>
                                          <td>{{$value->expire}}</td>
                                          <td>{{$value->location}}</td>
                                        
                                          <td>
                                           
                                            <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#staticBackdrop{{$value->id}}">
                                            
                                              Add
                                              </a>
                                           

                                             
                                          </td>

                                         
                                        
                          
                                                            <!-- Modal -->
                                                      <div class="modal fade" id="staticBackdrop{{$value->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="/add-product-form">
                                                                    @csrf

                                                                    <div class="form-group row">
                                                                      <label for="total_amount" class="col-md-4 col-form-label text-md-right"><sup class="text-danger"></sup>{{ __('Total Amount') }}</label>
                                          
                                                                      <div class="col-md-6">
                                                                          <input id="total_amount" type="number" value="{{$value->total}}" class="form-control @error('total_amount') is-invalid @enderror" name="total_amount" value="{{ old('total_amount') }}" autocomplete="total_amount" autofocus>
                                                                          
                                                                          <input id="product_id" type="text" class="form-control @error('product_id') is-invalid @enderror" name="product_id" hidden value="{{ $value->id }}" required autocomplete="owner_id" autofocus>
                                                                          <input id="owner_id" type="text" class="form-control @error('owner_id') is-invalid @enderror" name="owner_id" hidden value="{{ Session::get('owner_id') }}" required autocomplete="owner_id" autofocus>
                                          
                                                                          <input id="shop_id" type="text" class="form-control @error('shop_id') is-invalid @enderror" name="shop_id" hidden value="{{Session::get('shop_id') }}" required autocomplete="shop_id" autofocus>
                                          
                                                                          @error('total_amount')
                                                                              <span class="invalid-feedback" role="alert">
                                                                                  <strong>{{ $message }}</strong>
                                                                              </span>
                                                                          @enderror
                                                                      </div>
                                                                  </div>

                                                                  
                                      {{-- id	product_id	seller_id	owner_id	shop_id	day	month	year	quantity	amount	profit	created_at	updated_at	 --}}


                                                                    <div class="form-group row">
                                                                        <label for="notification" class="col-md-4 col-form-label text-md-right">{{ __('Product Amount For Notification') }}</label>

                                                                        <div class="col-md-6">
                                                                           <input type="number" name="notification" id="notification" class="form-control" value="{{$value->notification}}">
                                                                            @error('notification')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="expire_date" class="col-md-4 col-form-label text-md-right">{{ __('Expire Date') }}</label>

                                                                        <div class="col-md-6">
                                                                           <input type="date" name="expire_date" id="expire_date" class="form-control" value="{{$value->expire}}">
                                                                            @error('expire_date')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group row">
                                                                      <label for="purchased_price" class="col-md-4 col-form-label text-md-right"><sup class="text-danger"></sup>{{ __('Purchased Price') }}</label>
                                          
                                                                      <div class="col-md-6">
                                                                          <input id="purchased_price" value="{{$value->purchased_price}}" type="number" class="form-control @error('purchased_price') is-invalid @enderror" name="purchased_price" value="{{ old('purchased_price') }}"  autocomplete="purchased_price" autofocus>
                                                                          
                                                                      
                                                                          @error('purchased_price')
                                                                              <span class="invalid-feedback" role="alert">
                                                                                  <strong>{{ $message }}</strong>
                                                                              </span>
                                                                          @enderror
                                                                      </div>
                                                                  </div>

                                                                    <div class="form-group row">
                                                                      <label for="selling_price" class="col-md-4 col-form-label text-md-right"><sup class="text-danger"></sup>{{ __('Selling Price') }}</label>
                                          
                                                                      <div class="col-md-6">
                                                                          <input id="selling_price" value="{{$value->sold_price}}" type="number" class="form-control @error('selling_price') is-invalid @enderror" name="selling_price" value="{{ old('selling_price') }}" autocomplete="selling_price" autofocus>
                                                                          
                                                                      
                                                                          @error('selling_price')
                                                                              <span class="invalid-feedback" role="alert">
                                                                                  <strong>{{ $message }}</strong>
                                                                              </span>
                                                                          @enderror
                                                                      </div>
                                                                  </div>

                                                                    <div class="form-group row">
                                                                      <label for="location" class="col-md-4 col-form-label text-md-right"><sup class="text-danger"></sup>{{ __('Location') }}</label>
                                          
                                                                      <div class="col-md-6">
                                                                          <input id="location" value="{{$value->location}}" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" autocomplete="location" autofocus>
                                                                          
                                                                      
                                                                          @error('location')
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

                                       

                                        </tr> 
                                      
                      
                                      @endforeach
                                              
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                  <th>Product Name</th>
                                                  <th>Category</th>
                                                  <th>Unit</th>
                                                  <th>Quantity</th>
                                                  <th>Product Sold</th>
                                                  <th>Purchased Price</th>
                                                  <th>Sold Price</th>
                                                  <th>Expire Date</th>
                                                  <th>Location</th>
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
                                      <h5 class="card-title">Shelves</h5>
                
                                    </div>
                                  
                                      <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                          <thead>
                                          <tr>
                                              <th>Product Name</th>
                                              <th>Product Category</th>
                                              <th>unit</th>
                                              <th>quantity</th>
                                              <th>Product Sold</th>
                                              <th>purchased Price</th>
                                              <th>Price for Sale</th>
                                              <th>Discount</th>
                                              <th>Expire Date</th>
                                              <th>Location</th>
                                              <th>Action</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                      
                                        
                                          </tbody>
                                          <tfoot>
                                          <tr>
                                              <th>Product Name</th>
                                              <th>Product Category</th>
                                              <th>unit</th>
                                              <th>quantity</th>
                                              <th>Product Sold</th>
                                              <th>purchased Price</th>
                                              <th>Price for Sale</th>
                                              <th>Discount</th>
                                              <th>Expire Date</th>
                                              <th>Location</th>
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
      
        