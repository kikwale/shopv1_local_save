

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
      
          <div class="row pb-10">
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
              <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                  <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">{{number_format($daySales)}} {{Session::get('money')}}</div>
                    <div class="font-14 text-secondary weight-500">
                  Today Sales
                    </div>
                  </div>
                  <div class="widget-icon">
                    <div class="icon" data-color="#154c79">
                      <i class="icon-copy dw dw-calendar1"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
              <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                  <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">{{number_format($dayProfit)}} {{Session::get('money')}}</div>
                    <div class="font-14 text-secondary weight-500">
                      Today Profits
                    </div>
                  </div>
                  <div class="widget-icon">
                    <div class="icon" data-color="#154c79">
                      <span class="icon-copy ti-heart"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
              <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                  <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">{{number_format($month_sales)}} {{Session::get('money')}}</div>
                    <div class="font-14 text-secondary weight-500">
                     This Month Sales
                    </div>
                  </div>
                  <div class="widget-icon">
                    <div class="icon" data-color="#154c79">
                      <i
                        class="icon-copy fa fa-stethoscope"
                        aria-hidden="true"
                      ></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
              <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                  <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">{{number_format($month_profit)}} {{Session::get('money')}}</div>
                    <div class="font-14 text-secondary weight-500">This Month Profits</div>
                  </div>
                  <div class="widget-icon">
                    <div class="icon" data-color="#154c79">
                      <i class="icon-copy fa fa-money" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

           
          
          </div>

          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
            
              @if (session('success'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Waoo!</strong> {{session('success')}}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                                  
                                      <!-- Export Datatable start -->
                                <div class="card-box mb-30">
                                  <div class="pd-20">
                                    <a href="#" class="btn btn-info">Barcode</a>
                                  </div>
                                  <div class="pb-20">
                                    <table
                                      class="table hover multiple-select-row data-table-export nowrap"
                                    >
                                      <thead>
                                        <tr>
                                          <th>{{ __('message.seller.product_name') }}</th>
                                          <th>{{ __('message.seller.selling_price') }}</th>
                                          <th>{{ __('message.seller.quantity') }}</th>
                                          <th>{{ __('message.seller.sub_quantity') }}</th>
                                          <th>{{ __('message.seller.discount') }}</th>
                                          <th>{{ __('Selling Status') }}</th>
                                          <th>{{ __('message.seller.action') }}</th>
                                        </tr>
                                      </thead>
                                      <tbody>

                                        @foreach($data as $value)
                                      
                                        <tr>
                                          <form method="POST" action="/rejarejaForm">
                                            @csrf

                                          <td >{{$value->name}}</td>
                                          <td>{{$value->sold_price}}</td>
                                          <td> <input id="total_quantity" type="number" class="form-control @error('total_quantity') is-invalid @enderror" name="total_quantity" value="{{ old('total_quantity') }}" autocomplete="total_quantity" autofocus>
                                            <input id="product_id" value="{{ $value->id }}" hidden type="number" class="form-control @error('product_id') is-invalid @enderror" name="product_id" value="{{ old('product_id') }}" autocomplete="product_id" autofocus>
                                             <input type="number" hidden name="owner_id" value="{{ Session::get('owner_id') }}">
                                            <input type="number" hidden name="shop_id" value="{{ Session::get('shop_id') }}">
                                            <input type="number" hidden name="shop_id" value="{{ Session::get('seller_id') }}">
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
                                        
                                          <td>
                                            <button type="submit" style="background-color: #fc7b03; color:white" class="btn btn-in btn-sm">
                                          
                                             {{ __('message.seller.sell') }}
                                            </button>
                                          </td>
                                         
                                        
                                         

                                          </form>

                                        </tr> 
                                      
                      
                                      @endforeach

                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                                     
                                  
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
                                            <th>{{ __('message.seller.purchased_price') }}</th>
                                            <th>{{ __('message.seller.selling_price') }}</th>
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
                                      
                                        
                                          </tbody>
                                          <tfoot>
                                          <tr>
                                            <th>{{ __('message.seller.product_name') }}</th>
                                            <th>{{ __('message.seller.purchased_price') }}</th>
                                            <th>{{ __('message.seller.selling_price') }}</th>
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
      
        