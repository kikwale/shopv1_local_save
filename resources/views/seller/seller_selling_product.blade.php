

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
               
                  <h1 class="m-0 text-dark">{{ __('message.seller.selling_dashboard') }}</h1>
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
                  <strong> !! </strong> Selling Fail, You want to sell {{session('product_sold')}} Empty product WHILE you have {{session('product_stored')}} Product(s)
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              @endif
                 
                {{-- @include('admin.include') --}}
                            @if(count((array)$data) > 0)
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="car">
                                          <div class="card-head">

                                             <div class="row">
                                               <div class="col-md-3">
                                                <div class="card card-outline card-primary">
                                                  <div class="card-header bg-" style="background-color: #fc8803">
                                                    <h3 class="card-title text-white">{{ __('message.seller.today_sales') }} </h3>
                                    
                                                    <div class="card-tools">
                                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                      </button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                  </div>
                                                  <!-- /.card-header -->
                                                  <div class="card-body">
                                                    <h3 class="text-info"> &nbsp; {{$daySales}} {{Session::get('money')}}</h3>
                                                    </div>
                                                  <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                               </div>
                                               <div class="col-md-3">
                                                  <div class="card card-outline card-primary">
                                                <div class="card-header" style="background-color: #fc8803">
                                                   <h3 class="card-title text-white"> {{ __('message.seller.today_profit') }} </h3>
                                  
                                                  <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                    </button>
                                                  </div>
                                                  <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                  <h3 class="text-info"> &nbsp; {{$dayProfit}} {{Session::get('money')}}</h3>
                                                  </div>
                                                <!-- /.card-body -->
                                              </div>
                                              <!-- /.card -->
                                            </div>
                                               <div class="col-md-3">
                                                <div class="card card-outline card-primary">
                                                  <div class="card-header bg-inf" style="background-color: #fc8803">
                                                    <h3 class="card-title text-white">{{ __('message.seller.monthly_sales') }}</h3>
                                    
                                                    <div class="card-tools">
                                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                      </button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                  </div>
                                                  <!-- /.card-header -->
                                                  <div class="card-body">
                                                    <h3 class="text-info"> &nbsp; {{$month_sales}} {{Session::get('money')}}</h3>
                                                    </div>
                                                  <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                               </div>

                                               <div class="col-md-3">
                                                <div class="card card-outline card-primary">
                                                  <div class="card-header bg-inf" style="background-color: #fc8803">
                                                    <h3 class="card-title text-white">{{ __('message.seller.monthly_profit') }} </h3>
                                    
                                                    <div class="card-tools">
                                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                      </button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                  </div>
                                                  <!-- /.card-header -->
                                                  <div class="card-body">
                                                    <h3 class="text-info"> &nbsp; {{$month_profit}} {{Session::get('money')}}</h3>
                                                    </div>
                                                  <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                               </div>

                                               <h5 class="card-title">Shelves &nbsp;  <a href="#" class="btn btn-info btn-sm">Barcode</a></h5><br><br>
                                             </div>
                                            <div class="card-tools">
                                              
                                              {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                              </button>
                                              
                                              <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                              </button> --}}
                                            </div>
                                           
                                          </div>
                                        
                                            <div class="card-bod">
                                              <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                  <th>{{ __('message.seller.product_name') }}</th>
                                                  <th>{{ __('message.seller.product_category') }}</th>
                                                  <th>{{ __('message.seller.unit') }}</th>
                                                  <th>{{ __('message.seller.quantity') }}</th>
                                                  <th>{{ __('message.seller.sub_quantity') }}</th>
                                                  <th>{{ __('message.seller.discount') }}</th>
                                                  <th>{{ __('Selling Status') }}</th>
                                                  <th>{{ __('message.seller.customer_fully_name') }}</th>
                                                  <th>{{ __('message.seller.total') }}</th>
                                                  <th>{{ __('message.seller.action') }}</th>
                                                  <th>{{ __('message.seller.location') }}</th>
                                                  
                                                </tr>
                                                </thead>
                                                <tbody>
                                              
                    {{-- Full texts	
                      
                id	name	owner_id	shop_id	category	unit	quantity	amount	purchased_price	sold_price	expire	created_at	updated_at	
                    --}}
                                          @foreach($data as $value)
                                      
                                        <tr>
                                          <form method="POST" action="/rejarejaForm">
                                            @csrf

                                          <td>{{$value->name}}</td>
                                          <td>{{$value->category}}</td>
                                          <td>{{$value->unit}}</td>
                                          <td> <input id="total_quantity" type="number" class="form-control @error('total_quantity') is-invalid @enderror" name="total_quantity" value="{{ old('total_quantity') }}" autocomplete="total_quantity" autofocus>
                                            <input id="product_id" value="{{ $value->id }}" hidden type="number" class="form-control @error('product_id') is-invalid @enderror" name="product_id" value="{{ old('product_id') }}" autocomplete="product_id" autofocus>
                                             <input type="number" hidden name="owner_id" value="{{ Session::get('owner_id') }}">
                                            <input type="number" hidden name="shop_id" value="{{ Session::get('shop_id') }}">
                                            </td>
                                          <td> <select id="subquantity" type="text" class="select2 form-control @error('subquantity') is-invalid @enderror" name="subquantity" value="{{ old('subquantity') }}"  autocomplete="subquantity" autofocus>
                                            <option value=""></option>
                                            <option value="0.5">1/2</option>
                                            <option value="0.25">1/4</option>
                                            <option value="0.75">3/4</option>
                                           </select>
                                          </td>
                                          <td><input id="discount" type="number" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ old('discount') }}" placeholder="Option" autocomplete="discount" autofocus>
                                          </td>
                                          <td><input type="radio" name="sale_status" required value="Cash">&nbsp; Cash <br>
                                              <input  type="radio" name="sale_status" required value="Credit">&nbsp; Credit
                                          </td>
                                          <td><input id="customer_name" placeholder="Phone/Address" type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name" value="{{ old('customer_name') }}" placeholder="Option" autocomplete="customer_name" autofocus>
                                          </td>
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
                                          <td>
                                            <button type="submit" class="btn btn-info btn-sm">
                                          
                                             {{ __('message.seller.sell') }}
                                            </button>
                                          </td>
                                          <td>{{$value->location}}</td>
                                        
                                         

                                          </form>

                                        </tr> 
                                      
                      
                                      @endforeach
                                              
                                                </tbody>
                                                {{-- <tfoot>
                                                <tr>
                                                  <th>{{ __('message.seller.product_name') }}</th>
                                                  <th>{{ __('message.seller.product_category') }}</th>
                                                  <th>{{ __('message.seller.unit') }}</th>
                                                  <th>{{ __('message.seller.quantity') }}</th>
                                                  <th>{{ __('message.seller.sub_quantity') }}</th>
                                                  <th>{{ __('message.seller.discount') }}</th>
                                                  <th>{{ __('Selling Status') }}</th>
                                                  <th>{{ __('message.seller.customer_fully_name') }}</th>
                                                  <th>{{ __('message.seller.total') }}</th>
                                                  <th>{{ __('message.seller.location') }}</th>
                                                  <th>{{ __('message.seller.action') }}</th>
                                                </tr>
                                                </tfoot> --}}
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
                                      <h5 class="card-title">Shelves</h5>
                
                                      <div class="card-tools">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop" data-card-widget="collapse">
                                        add
                                        </button>
                            
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
                                            <th>{{ __('message.seller.product_name') }}</th>
                                                  <th>{{ __('message.seller.product_category') }}</th>
                                                  <th>{{ __('message.seller.unit') }}</th>
                                                  <th>{{ __('message.seller.quantity') }}</th>
                                                  <th>{{ __('message.seller.sub_quantity') }}</th>
                                                  <th>{{ __('message.seller.discount') }}</th>
                                                  <th>{{ __('Selling Status') }}</th>
                                                  <th>{{ __('message.seller.customer_fully_name') }}</th>
                                                  <th>{{ __('message.seller.total') }}</th>
                                                  <th>{{ __('message.seller.location') }}</th>
                                                  <th>{{ __('message.seller.action') }}</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                      
                                        
                                          </tbody>
                                          <tfoot>
                                          <tr>
                                            <th>{{ __('message.seller.product_name') }}</th>
                                            <th>{{ __('message.seller.product_category') }}</th>
                                            <th>{{ __('message.seller.unit') }}</th>
                                            <th>{{ __('message.seller.quantity') }}</th>
                                            <th>{{ __('message.seller.sub_quantity') }}</th>
                                            <th>{{ __('message.seller.discount') }}</th>
                                            <th>{{ __('Selling Status') }}</th>
                                            <th>{{ __('message.seller.customer_fully_name') }}</th>
                                            <th>{{ __('message.seller.total') }}</th>
                                            <th>{{ __('message.seller.location') }}</th>
                                            <th>{{ __('message.seller.action') }}</th>
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
      
        