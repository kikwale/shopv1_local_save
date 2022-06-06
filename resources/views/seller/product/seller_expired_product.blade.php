

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
               
                  <h1 class="m-0 text-dark">Expired Products</h1>
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
                                           
                                            @if ($value->isExpired == 0)
                                             <a class="btn btn-warning btn-sm" href="seller-accept-expired?pid={{$value->id}}&&dhfjhdhgfjhgfjdhfhghguh@#gfdf$=5hj5hjg$3$$$$$#*^fg">
                                            Accept
                                             </a>
                                            
                                            @else
                                               
                                             {{-- <a class="btn btn-d1nger btn-sm" href="seller_update_rej?id={{$value->id}}&&dhfjhdhgfjhgfjdhfhghguh@#gfdf$=5hj5hjg$3$$$$$#*^fg">
                                             
                                              <i class="fas fa-trash"></i>
                                             </a> --}}
                                             <p>No Action</p>
                                            @endif
                                          

                                          </td>

                                          

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
                                      <h5 class="card-title"> &nbsp;</h5>
                
                                   
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
      
        