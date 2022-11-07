@extends('layouts.seller')
@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Publish New</h1>
          </div>
          <div class="col-sm-6">
            {{-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">FAQ</li>
            </ol> --}}
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
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
        <div class="row">
            <div class="col-12" id="accordion">
                <div class="card card-primary card-outline">
                    <div class="row">
                        <div class="col-md-6">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                       SALES
                                    </h4>
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-header">
                                <span class="badge badge-info right">{{ App\Models\Mauzo::where('isPublished',0)->count() }}</span>
                            </div>
                    </div>
                        <div class="col-md-3">
                            <a class="d-block w-10 btn-warning" href="publish-new-sales">
                                <div class="card-header">
                                    <h4 class="card-title w-">
                                        <i class="fas fa-upload"></i>
                                       PUBLISH
                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>
                   
                </div>
                
                <div class="card card-primary card-outline">
                    <div class="row">
                        <div class="col-md-6">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                       STOCK
                                    </h4>
                                </div>
                            
                        </div>
                        <div class="col-md-3">
                            <div class="card-header">
                                <span class="badge badge-info right">{{ App\Models\Product::where('isPublished',0)->count() }}</span>
                            </div>
                       </div>
                        <div class="col-md-3">
                            <a class="d-block w-10 btn-warning" href="publish-new-products">
                                <div class="card-header">
                                    <h4 class="card-title w-">
                                        <i class="fas fa-upload"></i>
                                       PUBLISH
                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>
                   
                </div>

                <div class="card card-primary card-outline">
                    <div class="row">
                        <div class="col-md-6">
                      
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                       INVOICE
                                    </h4>
                                </div>
                               
                        </div>
                        <div class="col-md-3">
                                <div class="card-header">
                                    <span class="badge badge-info right">{{ App\Models\Invoice::where('isPublished',0)->count() }}</span>
                                </div>
                        </div>
                        <div class="col-md-3">
                            <a class="d-block w-10 btn-warning" href="publish-new-invoices">
                                <div class="card-header">
                                    <h4 class="card-title w-">
                                        <i class="fas fa-upload"></i>
                                       PUBLISH
                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>
                   
                </div>


                <div class="card card-primary card-outline">
                    <div class="row">
                        <div class="col-md-6">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                       QUOTATION
                                    </h4>
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-header">
                                <span class="badge badge-info right">{{ App\Models\QuotationModel::where('isPublished',0)->count() }}</span>
                            </div>
                    </div>
                        <div class="col-md-3">
                            <a class="d-block w-10 btn-warning" href="#">
                                <div class="card-header">
                                    <h4 class="card-title w-">
                                        <i class="fas fa-upload"></i>
                                       PUBLISH
                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>
                   
                </div>

               <div class="card card-primary card-outline">
                    <div class="row">
                        <div class="col-md-6">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                       RETURNED PRODUCTS
                                    </h4>
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-header">
                                <span class="badge badge-info right">0</span>
                            </div>
                    </div>
                        <div class="col-md-3">
                            <a class="d-block w-10 btn-warning" href="#">
                                <div class="card-header">
                                    <h4 class="card-title w-">
                                        <i class="fas fa-upload"></i>
                                       PUBLISH
                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>
                   
               
            </div>
        </div>
       
    </section>
    <!-- /.content -->
  </div>
@endsection