

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
               
                  <h1 class="m-0 text-dark">Creating Invoice Dashboard</h1>
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
            
        <div id="htmlContent">
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-3">
                   <h6 style="float: lft;"><p> <b>To: </b> &nbsp;{{ $data['customer_name'] }}</p></h6>
                   <h6 style="float: le;"><p><b>Addres:</b> &nbsp; {{ $data['address'] }}</p></h6>
                   <h6 style="float: lt;"><p><b>Email: </b>&nbsp; {{ $data['email'] }}</p></h6>
                   <h6 style="float: le;"><p><b>Phone: </b>&nbsp; {{ $data['phone'] }}</p></h6> 
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                   <h6 style="float: l"><p><b>Date: </b> &nbsp;{{ $data['date'] }}</p></h6>
                   <h6 style="float: le;"><p><b>Invoice No: &nbsp; #{{ $invoice_id }}</b></p></h6> 
                </div>
            </div><br>
        
            <div class="row" >
               
                <div class="col-md-6" id="prd">
                    <select name="product" class="custom-select2 form-control" id="product" >
                        <option value="">Select Product</option>
                        @foreach (App\Models\Product::where('shop_id',Session::get('shop_id'))->get() as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 input-group">
                    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantity">
                    <input type="number" class="form-control" name="invoice_number" hidden id="invoice_number" value="{{ $invoice_id }}">
                    
                    <span class="input-group-append">
                        <button type="button" onclick="getProduct()" id="add-btn" class="btn btn-primary">Add</button>
                    </span>
                </div>
  
            </div> <br>

            <div class="row">
                <div class=" table-responsive">
                  <table class="table table table-striped">
                    <thead>
                      <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Taxable</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                    <tbody id="invoice_table">
                     
                      {{-- <tr>
                        <td>&nbsp;</td>
                        <td><strong>Total</strong></td>
                        <td><strong>$1000.00</strong></td>
                      </tr> --}}
                    </tbody>
                  </table>
                </div>
              </div>

            <div class="row" id="vat">
                <div class="col-md-5"></div>
                <div class="col-md-3">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3" id="invoice-vat">
                   
                </div>
            </div><br>
        </div>

        <div class="row no-print">
            <div class="col-12" id="btn">
            
              <button type="button" style="background-color: #fc7b03; color:white" class="btn btn- float-right"><i class="far fa-credit-card"></i>Send to
                Email
              </button>
              <button onclick="previewInvoice(this.value)" id="btn-preview" value="{{ $invoice_id }}" type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="fas fa-eye"></i> Preview
              </button>
            </div>
          </div>
            </div>


            </div><!--/. container-fluid -->
          </section>
          <!-- /.content -->
          
        </div>
   
    <script>
 
 function previewInvoice(invoice_id){
  document.getElementById('prd').remove();
  document.getElementById('quantity').remove();
  document.getElementById('btn-preview').remove();
  document.getElementById('add-btn').remove();
  var invoice_number = document.getElementById('invoice_number').value;
  
  $.ajax({
        type:'get',
        url:'/seller-invoice-vat',
        data:{invoice_number:invoice_number},
        success:function(data){

          $('#invoice-vat').append(data);
        }
       });
      
  $('#btn').append(''+
  '<a href="seller-view-invoice?invoice='+invoice_id+'" target="_blank" class="btn btn-secondary float-right" style="margin-right: 5px;">'+
                '<i class="fas fa-print"></i> Check For PDF'+             
  '</a>')
 }
 function printInvoice(){
           
            
            var divContents = document.getElementById("htmlContent").innerHTML;
            
            var a = window.open();
            a.document.write('<html>');
            a.document.write('<body>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
       
         var count = 0;
        function getProduct() {
            count = count + 1;
            var id = document.getElementById('product').value;
            var quantity = document.getElementById('quantity').value;
            var invoice_number = document.getElementById('invoice_number').value;
            
             if (quantity == '') {

             } else if(id == ''){

             } else {

                $.ajax({
                type:'get',
                url:'/seller-invoice-product',
                data:{product_id:id,product_quantity:quantity,invoice_number:invoice_number},
                success:function(data){

                    if(data == 'Unsufficient'){
                        alert('Unsufficient Product Quantity You have entered..');
                    } else{
                        $('#invoice_table').html(data);
                    }
                    
                }
            });
             }
          
        }
    </script>
   
      @endsection
 
        