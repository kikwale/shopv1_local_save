
      @extends('layouts.owner')
      @section('content')
          <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
      
                           <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="dist/img/shotram.png" alt="ShoTramLogo" height="60" width="60">
    </div>

    <div class="row mb-2">
      <div class="col-sm-6">
     
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
      
      </div><!-- /.col -->
    </div><!-- /.row -->
    
         <!-- Info boxes -->
       <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-i elevation-1" style="background-color:#F15A24" ><i class="fas fa-shopping-bag w-100 text-light" width="30px" height="30px"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Today Sales</span>
              <span class="info-box-number">
                {{App\Models\Mauzo::where('shop_id',Session::get('shop_id'))->where('sales_date',date('Y-m-d'))->sum('true_price') }}{{ Session::get('money') }}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg- elevation-1" style="background-color:#F15A24"> <i class="fas fa-shopping-bag w-100 text-light" width="30px" height="30px"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Today Profit</span>
              <span class="info-box-number">
                {{App\Models\Mauzo::where('shop_id',Session::get('shop_id'))->where('sales_date',date('Y-m-d'))->sum('profit') }}{{ Session::get('money') }}
              </span>
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
            <span class="info-box-icon bg-in elevation-1" style="background-color:#F15A24"> <i class="fas fa-shopping-bag w-100 text-light" width="30px" height="30px"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Monthly Sales</span>
              <span class="info-box-number">
                {{App\Models\Mauzo::where('shop_id',Session::get('shop_id'))->where('month',date('M', strtotime(date('Y-m-d'))))->where('year',date('Y'))->sum('true_price') }}{{ Session::get('money') }}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-inf elevation-1" style="background-color:#F15A24">  <i class="fas fa-shopping-bag w-100 text-light" width="30px" height="30px"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Monthly Profit</span>
              <span class="info-box-number">
                {{App\Models\Mauzo::where('shop_id',Session::get('shop_id'))->where('month',date('M', strtotime(date('Y-m-d'))))->where('year',date('Y'))->sum('profit')}}{{ Session::get('money') }}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-inf elevation-1" style="background-color:#F15A24"> <i class="fas fa-shopping-bag w-100 text-light" width="30px" height="30px"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Annual Sales</span>
              <span class="info-box-number">
                {{App\Models\Mauzo::where('shop_id',Session::get('shop_id'))->where('year',date('Y'))->sum('true_price')}}{{ Session::get('money') }}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon elevation-1" style="background-color:#F15A24"> <i class="fas fa-shopping-bag w-100 text-light" width="30px" height="30px"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Annual Profit</span>
              <span class="info-box-number">
                {{App\Models\Mauzo::where('shop_id',Session::get('shop_id'))->where('year',date('Y'))->sum('profit')}}{{ Session::get('money') }}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


             
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
      
          {{-- <div class="row">
            
            <div class="card-body">
              <a href="shop_worker?ower_id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="btn btn-app bg-white" style="width: 200px; height:150px"><br>
                {{-- <span class="badge bg-purple">891</span> --}
                <i class="fas fa-users W-100" style="color: cadetblue"></i> <br>
                <p>Employees</p>
              </a>
              <a class="btn btn-app bg-white" style="width: 200px; height:150px"><br>
                {{-- <i class="fas fa-edit"></i><br> --}
                <i class="fas fa-shopping-bag" style="color: cadetblue"></i><br>
             <p> Monthly Sales </p>
                
              </a>
              
              <a class="btn btn-app bg-white" style="width: 200px; height:150px"><br>
                {{-- <i class="fas fa-save"></i> Save --}
                <i class="fas fa-shopping-bag w-100" style="color: cadetblue"></i><br>
                <p>  Daily Sales</p>
              </a>
              <a class="btn btn-app bg-white" style="width: 200px; height:150px"><br>
                {{-- <span class="badge bg-success">300</span> --}
                <i class="fas fa-barcode"></i><br>
                 <p> Expired Products</p>
              </a>
             
              <a class="btn btn-app bg-white" style="width: 200px; height:150px"><br>
                {{-- <span class="badge bg-teal">67</span> --}
                <i class="fas fa-inbox"></i> Orders
              </a>

              <a class="btn btn-app bg-white" style="width: 200px; height:150px"><br>
                {{-- <span class="badge bg-success">300</span> --}
                <i class="fas fa-barcode"></i><br>
                 <p> Finished Products</p>
             </a>
             

              <a class="btn btn-app bg-white" style="width: 200px; height:150px"><br>
                {{-- <span class="badge bg-success">300</span> --}
                <i class="fas fa-barcode"></i><br>
                 <p>Stock</p>
              </a>
             

            </div>
          </div>
        --}}
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
                        
               
            
      
              </div>

             
            </div><!--/. container-fluid -->
          </section>
          <!-- /.content -->
          
        </div>
        
      @endsection
      
        