

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
               
                  <h1 class="m-0 text-dark">Invoice Dashboard</h1>
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
            
         
                 
                <div class="container" id="invoice">
                    <div class="row">
                      <div class="col-md-1"></div>
                      <div class="col-md-10 border">
                        <div class="row">
                          <div class="col-md-12 invoice text-center text-primary">
                            <h2>Invoice</h2>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 text-right">
                            <p><strong>Invoice No: </strong> 12345</p>
                            <p><strong>Date:</strong> 15/Jan/2020</p>
                            <p>Bangalore</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 well invoice-body">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>Description</th>
                                  <th>Date</th>
                                  <th>Amount</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Service request</td>
                                  <td>15/Jan/2020</td>
                                  <td>$1000.00</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td><strong>Total</strong></td>
                                  <td><strong>$1000.00</strong></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-11 text-right mt-2 mb-2">Signature</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="container">
                    <div class="row ">
                      <div class="col-md-12 text-center mb-4">
                        <button class="btn btn-warning" id="downloadPdf">
                          Generate Invoice
                        </button>
                      </div>
                    </div>
                  </div>
                    
            
      
              </div>

             
            </div><!--/. container-fluid -->
          </section>
          <!-- /.content -->
          
        </div>
        
      <script>
        document
          .getElementById("downloadPdf")
          .addEventListener("click", function download() {
            const element = document.getElementById("invoice");
            html2pdf()
              .from(element)
              .save();
          });
      </script>
      @endsection
 
        