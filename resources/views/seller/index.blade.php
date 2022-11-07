 @extends('layouts.seller')

 <?php
App::setLocale(Session::get('locale'));
?>
      @section('content')
        
      <div class="xs-pd-20-10 pd-ltr-20">
          <!-- /.content-header -->
          <div class="title pb-20">
            <h2 class="h3 mb-0">Overview</h2>
          </div>
          <div class="row pb-10">
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
              <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                  <div class="widget-data">
                    <div class="weight-700 font-24 text-dark"> {{number_format(App\Models\Mauzo::where('shop_id',Session::get('shop_id'))->where('sales_date',date('Y-m-d'))->sum('true_price')) }}{{ Session::get('money') }} </div>
                    <div class="font-14 text-secondary weight-500">
                  Today Sales
                    </div>
                  </div>
                  <div class="widget-icon">
                    <div class="icon" data-color="#00eccf">
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
                    <div class="weight-700 font-24 text-dark"> {{number_format(App\Models\Mauzo::where('shop_id',Session::get('shop_id'))->where('sales_date',date('Y-m-d'))->sum('profit')) }}{{ Session::get('money') }}</div>
                    <div class="font-14 text-secondary weight-500">
                      Today Profits
                    </div>
                  </div>
                  <div class="widget-icon">
                    <div class="icon" data-color="#ff5b5b">
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
                    <div class="weight-700 font-24 text-dark">{{number_format(App\Models\Mauzo::where('shop_id',Session::get('shop_id'))->where('month',date('M', strtotime(date('Y-m-d'))))->where('year',date('Y'))->sum('true_price')) }}{{ Session::get('money') }}</div>
                    <div class="font-14 text-secondary weight-500">
                     This Month Sales
                    </div>
                  </div>
                  <div class="widget-icon">
                    <div class="icon">
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
                    <div class="weight-700 font-24 text-dark"> {{number_format(App\Models\Mauzo::where('shop_id',Session::get('shop_id'))->where('month',date('M', strtotime(date('Y-m-d'))))->where('year',date('Y'))->sum('profit'))}}{{ Session::get('money') }}</div>
                    <div class="font-14 text-secondary weight-500">This Month Profits</div>
                  </div>
                  <div class="widget-icon">
                    <div class="icon" data-color="#09cc06">
                      <i class="icon-copy fa fa-money" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
              <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                  <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">             {{number_format(App\Models\Mauzo::where('shop_id',Session::get('shop_id'))->where('year',date('Y'))->sum('true_price'))}}{{ Session::get('money') }}</div>
                    <div class="font-14 text-secondary weight-500">This Year Sales</div>
                  </div>
                  <div class="widget-icon">
                    <div class="icon" data-color="#09cc06">
                      <i class="icon-copy fa fa-money" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
              <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                  <div class="widget-data">
                    <div class="weight-700 font-24 text-dark"> {{number_format(App\Models\Mauzo::where('shop_id',Session::get('shop_id'))->where('year',date('Y'))->sum('profit'))}}{{ Session::get('money') }}</div>
                    <div class="font-14 text-secondary weight-500">This Year Profit</div>
                  </div>
                  <div class="widget-icon">
                    <div class="icon" data-color="#09cc06">
                      <i class="icon-copy fa fa-money" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
              <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                  <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">{{ number_format(App\Models\Product::all()->sum(function($sale) {
                      return $sale->total * $sale->purchased_price;
                  })) }}{{ Session::get('money') }}</div>
                    <div class="font-14 text-secondary weight-500">Stock</div>
                  </div>
                  <div class="widget-icon">
                    <div class="icon" data-color="#09cc06">
                      <i class="icon-copy fa fa-money" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
            <div class="title pb-20">
              <h2 class="h3 mb-0">Quick Details</h2>
            </div>
          
         <div class="row">
          <div class="row">

            <div class="col-md-2">
              <div class="card-body" >
                
          
                <a href="seller-sold-product" class="btn btn-app bg-white" style="width: 200px; height:150px"><br>
                  <span class="micon icon-copy fa fa-signal"></span
                    ><br>
                  <p>{{__('message.seller.sales')}}</p>
                </a>
                
              </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
              <div class="card-body">
                
          
                <a href="seller-finished-product" class="btn btn-app bg-white" style="width: 200px; height:150px"><br>
                  <span class="micon bi bi-archive"></span
                    ><br>
                  <p>{{__('message.seller.finished_products')}}</p>
                </a>
                
              </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
              <div class="card-body">
                
          
                <a href="seller-store" class="btn btn-app bg-white" style="width: 200px; height:150px"><br>
                  <span class="micon bi bi-archive"></span
                    ><br>
                  <p>{{__('message.seller.stock')}}</p>
                </a>
                
              </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
              <div class="card-body">
                
          
                <a href="seller_expired_product" class="btn btn-app bg-white" style="width: 200px; height:150px"><br>
                  <span class="micon bi bi-archive"></span
                    ><br>
                  <p>{{__('message.seller.expired_products')}}</p>
                </a>
                
              </div>
            </div>
          
          </div>

        
          <div class="row">

            <div class="col-md-2">
              <div class="card-body">
                
          
                <a href="seller-invoice" class="btn btn-app bg-white" style="width: 200px; height:150px"><br>
                  <span class="micon bi bi-receipt-cutoff"></span
                    ><br>
                  <p>{{__('message.seller.invoice')}}</p>
                </a>
                
              </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
              <div class="card-body">
                
          
                <a href="seller-quotaions" class="btn btn-app bg-white" style="width: 200px; height:150px"><br>
                  <span class="micon bi bi-back"></span
                    ><br>
                  <p>{{__('message.seller.quotation')}}</p>
                </a>
                
              </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
              <div class="card-body">
                
          
                <a href="customers" class="btn btn-app bg-white" style="width: 200px; height:150px"><br>
                  <span class="micon fa fa-users"></span
                    ><br>
                  <p>{{ __('message.seller.customers') }}</p>
                </a>
                
              </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
              <div class="card-body">
                
          
                <a href="credit-purchase" class="btn btn-app bg-white" style="width: 200px; height:150px"><br>
                  <span class="micon icon-copy fa fa-diamond"></span
                    ><br>
                  <p>{{ __('message.seller.credit_purchases') }}</p>
                </a>
                
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
                        
                
                <div class="row">
              


                {{-- <div class="col-md-4">
                  <a href="owner_shop">
                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <h3 class="card-title"></h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body text-secondary text-center">
                    <b>{{__('message.seller.wholesale_products')}}</b>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </a>
                </div>

                <div class="col-md-4">
                  <a href="owner_shop">
                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <h3 class="card-title"></h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body text-secondary text-center">
                    <b>{{__('message.seller.retail_products')}}</b>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </a>
                </div> --}}

           
           </div>
         
                <br>
                    
            
      
              </div>

              {{-- footer --}}
              <div class="footer-wrap pd-20 mb-20 card-box">
                <strong>Copyright &copy;2022 <a href="#">ShoTram</a>.</strong>
                All rights reserved.
                <a href="#" 
                  ><b>Version</b> 3.0.4</a
                >
              </div>
            </div>
          </section>
          <!-- /.content -->
          
        </div>
        
      @endsection
      
        