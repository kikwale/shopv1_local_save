

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
                   <h6 style="float: lft;"><p> <b>To: </b> &nbsp;{{ $invoice['customer_name'] }}</p></h6>
                   <h6 style="float: le;"><p><b>Addres:</b> &nbsp; {{ $invoice['address'] }}</p></h6>
                   <h6 style="float: lt;"><p><b>Email: </b>&nbsp; {{ $invoice['email'] }}</p></h6>
                   <h6 style="float: le;"><p><b>Phone: </b>&nbsp; {{ $invoice['phone'] }}</p></h6> 
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                   <h6 style="float: l"><p><b>Date: </b> &nbsp;{{ $invoice['date'] }}</p></h6>
                   <h6 style="float: le;"><p><b>Invoice No: &nbsp; #{{ $invoice['id'] }}</b></p></h6> 
                </div>
            </div><br>
        
            <div class="row" >
               
                <div class="col-md-1" id="prd1">
                   
                </div>
                {{-- <div class="col-md-10 input-group" id="prd2">
                  <select name="product" class="select2 form-control" id="product" >
                    <option value="">Select Product</option>
                    @foreach (App\Models\Product::where('shop_id',Session::get('shop_id'))->get() as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                    <input type="number" class="form-control" name="quotation_number" hidden id="quotation_number" value="{{ $quotation_id }}">
                    
                    <span class="input-group-append">
                        <button type="button" onclick="getProduct()" id="add-btn" class="btn btn-primary">Add</button>
                    </span>
                </div> --}}
                <div class="col-md-1" id="prd3">
                   
                </div>
  
            </div> <br>

            <div class="row">
                <div class=" table-responsive">
                  <table class="table table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th> Quantity</th>
                        <th>Is Taxable</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                    <tbody id="quotation_table">
                        @foreach ($product_invoice as $value)
                        <tr>
                            <td >{{ $value->id }}</td>
                            <td >{{ $value->product_name }}</td>
                            <td >{{ $value->total_product }}</td>
                            <td >
                              @if ($value->isTaxable == true)
                              <input type="checkbox" disabled  checked name="" id="">
                              @else
                              <input type="checkbox" disabled name="" id="">
                              @endif
                              </td>
                            <td>{{ $value->total_price }} &nbsp; {{ Session::get('money') }}</td>
                        </tr>
                        @endforeach
                     
                        <tfoot>
                          <tr>
                          <td colspan="2"></td>
                          <td colspan="2">SUBTOTAL</td>
                          <td>{{ $sub }}{{ Session::get('money') }}</td>
                          </tr>
                          <tr>
                          <td colspan="2"></td>
                          <td colspan="2">TAX 18%</td>
                          <td>{{ $vat }}{{ Session::get('money') }}</td>
                          </tr>
                          <tr>
                          <td colspan="2"></td>
                          <td colspan="2">GRAND TOTAL</td>
                          <td>{{ $sub + $vat }}{{ Session::get('money') }}</td>
                          </tr>
                          </tfoot>
                    </tbody>
                  </table>
                </div>
              </div>

            <div class="row" id="vat">
                <div class="col-md-5"></div>
                <div class="col-md-3">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3" id="quotation-vat">
                   
                </div>
            </div><br>
        </div>

        <div class="row no-print">
            <div class="col-12" id="btn">
            
              <button type="button" style="background-color: #fc7b03; color:white" class="btn btn- float-right"><i class="far fa-credit-card"></i>Send to
                Email
              </button>
              <a   href="print-view-invoice/{{ $invoice['id']  }}" target="_blank" class="btn btn-secondary float-right" style="margin-right: 5px;">
                <i class="fas fa-print"></i> Print</a>
             
            </div>
          </div>
            </div>


            </div><!--/. container-fluid -->
          </section>
          <!-- /.content -->
          
        </div>
   
    <script>
 
 function previewQuotation(quotation_id){
  document.getElementById('prd2').remove();
  document.getElementById('btn-preview').remove();

  $('#btn').append(''+
  '<a " href="print-quote/'+quotation_id+'" target="_blank" class="btn btn-secondary float-right" style="margin-right: 5px;">'+
                '<i class="fas fa-print"></i> Print'+             
  '</a>')
 }
 function printQuotation(){
           
            
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
            var quotation_number = document.getElementById('quotation_number').value;
            
            if(id == ''){

             } else {

                $.ajax({
                type:'get',
                url:'/seller-quotation-product',
                data:{product_id:id,quotation_number:quotation_number},
                success:function(data){

                  
                    if(data == 'Unsufficient'){
                        alert('Unsufficient Product Quantity You have entered..');
                    } else{
                        $('#quotation_table').html(data);
                    }
                    
                }
            });
             }
          
        }
    </script>
   
      @endsection
 
        