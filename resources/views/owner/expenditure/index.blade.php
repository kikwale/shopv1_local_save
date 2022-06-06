

      @extends('layouts.owner')
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
               
                  <h1 class="m-0 text-dark">Expenditure</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                    <li class="breadcrumb-item active">Expenditure</li>
                  </ol>
                </div>


              </div><!-- /.row -->

              <div class="row">

                <div class="col-md-2"></div>
                <div class="card-body">
                
                  <a class="btn btn-app bg-white" style="width: 200px; height:150px"><br>
                    <i class="fas fa-save"></i><br>
                    <p>Net Profit/Loss</p>
                  </a>
                 
                </div>
              </div>
              <br>
              
             
          </div>
          <!-- /.content-header -->
      
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
            
              <div class="row">
                <div class="col-md-2"></div>

                <div class="col-md-8">
                  @if (session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Waoo!</strong> {{session('success')}}
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">&times;</button>
                  </div>
                  @endif <br>
                  @if (session('duplicate'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Waoo!</strong> {{session('duplicate')}}
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">&times;</button>
                  </div>
                  @endif <br>
                <form method="POST" action="/owner-expenditure" >

                  @csrf
                  <table class="table table-hover" id="expenditure_table">
                    <thead><th>Write your Month Expenditure</th> </thead> 
                    <tbody id="">
                      <tr>
                        <td><select id="month" type="text" class="select2 form-control @error('month') is-invalid @enderror" name="month" value="{{ old('month') }}"  required autocomplete="month">
                          <option value="">Select Month</option>
                          <option value="Jan">1 (Jan)</option>
                          <option value="Feb">2 (Feb)</option>
                          <option value="Mar">3 (Mar)</option>
                          <option value="Apr">4 (Apr)</option>
                          <option value="May">5 (May)</option>
                          <option value="Jun">6 (Jun)</option>
                          <option value="Jul">7 (Jul)</option>
                          <option value="Aug">8 (Aug)</option>
                          <option value="Sep">9  (Sep)</option>
                          <option value="Oct">10 (Oct)</option>
                          <option value="Nov">11 (Nov)</option>
                          <option value="Des">12 (Des)</option>
                        </select>
                       </td>

                       <td>
                        <select id="year" type="text" class="select2 form-control @error('year') is-invalid @enderror" name="year" required  autocomplete="year">
                          <option value="">Select Year</option>
                          <option value="2022">2022</option>
                          <option value="2021">2021</option>
                          <option value="2020">2020</option>
                          <option value="2019">2019</option>
                          <option value="2018">2018</option>
                          <option value="2017">2017</option>
                          <option value="2016">2016</option>
                          <option value="2015">2015</option>
                        </select>
                       </td>
                      </tr>
                      <tr>
                        <td>
                          <input class="form-control" type="text" name="name1" id="" value="{{ __('Rent') }}">
                        </td>
                        <td>
                          <input class="form-control" type="number" name="amount1" id="" placeholder="Amount">
                        </td>
                       
                      </tr>

                      <td>
                        <input class="form-control" type="text" name="name2" id="" value="{{ __('Water Bill') }}">
                      </td>
                      <td>
                        <input class="form-control" type="number" name="amount2" id="" placeholder="Amount">
                      </td>
                     
                    </tr>

                    <td>
                      <input class="form-control" type="text" name="name3" id="" value="Electrical Bill">
                    </td>
                    <td>
                      <input class="form-control" type="number" name="amount3" id="" placeholder="Amount">
                    </td>
                   
                  </tr>

                  <td>
                    <input class="form-control" type="text" name="name4" id="" value="Salary">
                  </td>
                  <td>
                    <input class="form-control" type="number" name="amount4" id="" placeholder="Amount">
                  </td>
                  
                </tr>

                <td>
                  <input class="form-control" type="text" name="name5" id="" value="Wages">
                </td>
                <td>
                  <input class="form-control" type="number" name="amount5" id="" placeholder="Amount">
                </td>
               
              </tr>

              <td>
                <input class="form-control" type="text" name="name6" id="" value="Communication">
              </td>
              <td>
                <input class="form-control" type="number" name="amount6" id="" placeholder="Amount">
              </td>
              
            </tr>

            <td>
              <input class="form-control" type="text" name="name7" id="" value="Waste Cleaner">
            </td>
            <td>
              <input class="form-control" type="number" name="amount7" id="" placeholder="Amount">
            </td>
            <td>
              <button class="btn btn-primary" type="button" name="add" onclick="add_field()" id="add">Add More</button>
            </td>
          </tr>

                     
                  </tbody>
                  
                  </table>
                  <button class="btn btn-info  save" type="submit">save</button>
                </form>
                </div>

                <div class="col-md-2"></div>
              </div>

<br>

     

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
                                          {{-- <div class="card-header">

                                             
                                            <div class="card-tools">
                                              

                                              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                              </button>
                                              
                                              <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                              </button>
                                            </div><br>
                                          
                                          </div> --}}
                                        
                                         
                                              <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                  <th>Year</th>
                                                  <th>Month</th>
                                                  <th>Name</th>
                                                  <th>Amount</th>
                                                  <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                              
                    {{-- Full texts	
                      
                id	name	owner_id	shop_id	category	unit	quantity	amount	purchased_price	sold_price	expire	created_at	updated_at	
                    --}}
                                          @foreach($data as $value)
                                      
                                        <tr>
                                          <td>{{$value->year}}</td>
                                          <td>{{$value->month}}</td>
                                          <td>{{$value->name}}</td>
                                          <td>{{$value->amount}}</td>
                                          <td><a href="owner-delete-expenditure?id={{ $value->id }}"><i class="fas fa-trash text-danger"></i></a></td>
                                        
                                        </tr> 
                                      
                      
                                      @endforeach
                                              
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                  <th>Year</th>
                                                  <th>Month</th>
                                                  <th>Name</th>
                                                  <th>Amount</th>
                                                  <th>Action</th>
                                                </tr>
                                                </tfoot>
                                              </table>
                                          
                                         
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
                                      <h5 class="card-title"> &nbsp;</h5>
                
                                      <div class="card-tools">
                                     
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
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                      
                                        
                                          </tbody>
                                          <tfoot>
                                          <tr>
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Name</th>
                                            <th>Amount</th>
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
        
        <script>

          var i = 7;
         
          function add_field() {
            i++;
            var postUrl = "<?php echo url('save-expenditure') ?>";


            $('#expenditure_table').append(
              ''+'<tr id="row'+i+'">'
                  +'<td><input class="form-control" type="text" name="name'+i+'" id="" placeholder="{{ __( 'Write Onather Expenditure') }}"></td>'+
                  '<td><input class="form-control" type="number" name="amount'+i+'" id="" placeholder="Amount"></td>'+
                  '<td><button class="btn btn-danger  button_remove" type="button" name="remove" id="'+i+'" onclick="remove_field(this.id)" >x</button>&nbsp<button class="btn btn-primary" type="button" name="add" onclick="add_field()" id="add">+</button></td>'+
                  
                '</tr>'

            );
                     

          }

          function remove_field(btn_id){
            // var  = $(this).val();
              $('#row'+btn_id+'').remove();
            }


            function submitExpenditure(){
              alert("mhfhfh");
            }
           

        </script>
      @endsection
      
   
    
        