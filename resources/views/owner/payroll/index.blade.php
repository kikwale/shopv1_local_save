@extends('layouts.owner')

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

                        <h1 class="m-0 text-dark">Payroll</h1>
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
                        <strong>Waoo!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('unsold') == 'Sold')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Ok !! </strong> Successfuly Product(s) Sold.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                @endif

                @if (session('sale_empty') == 'empty')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Ok !! </strong> No Product have been Sold
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                @endif

                @if (session('unsold1') == 'Unsold')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Ok !! </strong> Many Products You have sell than that Stored, You want to sell
                        {{ session('product_sold') }} Product(s) WHILE you have {{ session('product_stored') }}
                        Product(s)
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                @endif

                {{-- @include('admin.include') --}}



                <div class="row">

                    <div class="col-md-2"></div>
                    <a class="btn btn-app bg-white" style="width: 200px; height:150px" data-toggle="modal"
                        data-target="#sold_annual"><br>
                        {{-- <span class="badge bg-purple">891</span> --}}
                        <img src="dist/img/sales-icon-01.png" width="30px" height="30px" alt=""
                            srcset=""><br>
                        Annual Payroll
                    </a>

                    <a class="btn btn-app bg-white" style="width: 200px; height:150px" data-toggle="modal"
                        data-target="#month_payroll"><br>
                        {{-- <span class="badge bg-purple">891</span> --}}
                        <i class="fas fa-shopping-bag"></i> Monthly Payroll
                    </a>


                </div>

                <br>
                <hr>
                <div class="row">
                    <h3 class="text-info">QUICK PAYROLL</h3>
                </div>
                <!-- Main content -->
                <div id="htmlContent">
                    <!-- title row -->

                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 ">

                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 ">
                            To
                            <address>
                                <strong>John Doe</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (555) 539-1037<br>
                                Email: john.doe@example.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 ">

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Postion</th>
                                        <th>Basic Salary</th>
                                        <th>Allowances</th>
                                        <th>Gross Salary</th>
                                        <th>NSSSF Contribution</th>
                                        <th>Taxable Salary</th>
                                        <th>PAYE</th>
                                        <th>Loan</th>
                                        <th>Net Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Employee Name</td>
                                        <td>Postion</td>
                                        <td><input type="number" id="basic_salary_input" class="form-control"
                                                oninput="getBasicSalary(this.value)">
                                            <p id="basic_salary"></p>
                                        </td>
                                        <td><input type="number" id="allowance_input" class="form-control"
                                                oninput="getAllownce(this.value)">
                                            <p id="allowance"></p>
                                        </td>
                                        <td id="gross"></td>
                                        <td id="nssf"></td>
                                        <td id="taxable_salary"></td>
                                        <td id="paye"></td>
                                        <td>
                                            <input type="text" id="loan_input" class="form-control"
                                                oninput="getLoan(this.value)">
                                            <p id="loan"></p>
                                        </td>
                                        <td id="net_salary"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        {{-- <div class="col-6">
                  <p class="lead">Payment Methods:</p>
               
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div> --}}
                        <!-- /.col -->
                        <div class="col-12">
                            <p class="lead">Amount Due 2/22/2014</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">PARTICULARS:</th>
                                        <th style="width:50%">AMOUNT:</th>
                                    </tr>
                                    <tr>
                                        <th>Tax (9.3%)</th>
                                        <td>$10.34</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping:</th>
                                        <td>$5.80</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>$265.24</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>

                    <!-- /.row -->

                    <!-- this row will not appear when printing -->

                </div>

                <div id="editor"></div>
                <div class="row no-print">
                    <div class="col-12">

                        <button type="button" id="generatePDF" class="btn btn-primary float-right"
                            style="margin-right: 5px;">
                            <i class="fas fa-download"></i> Generate PDF
                        </button><br><br>
                    </div>
                </div>

            </div>


    </div>
    <!--/. container-fluid -->
    </section>
    <!-- /.content -->

    </div>

    @include('owner/modals.month_payroll_modal')

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="dist/js/cdnjs/jspdf.min.js"></script>
    <script src="dist/js/unpkg/jspdf.min.js"></script>
    <script type="text/javascript">
        var doc = new jsPDF('p', 'mm', [500, 842]);
        
        var specialElementHandlers = {
            '#editor': function(element, renderer) {
                return true;
            }
        };


        $('#generatePDF').click(function() {
            doc.fromHTML($('#htmlContent').html(), 3, 3, {
                // 'width': 700,
                'elementHandlers': specialElementHandlers
            });
            doc.save('sample_file.pdf');
        });

        function getAllownce(allowance1) {
            var allowance = parseInt(allowance1)
            var basic_salary_input = parseInt(document.getElementById('basic_salary_input').value);
            var gross;
            if (document.getElementById('basic_salary_input').value == "") {

                basic_salary_input = 0;

                if (allowance1.length < 1) {
                    gross = 0;
                    document.getElementById('allowance').innerHTML = 0;
                    document.getElementById('gross').innerHTML = 0;
                    document.getElementById('nssf').innerHTML = basic_salary_input * (10 / 100);
                    document.getElementById('taxable_salary').innerHTML = gross - (basic_salary_input * (10 / 100));
                    var taxable_salary = gross - (basic_salary_input * (10 / 100));
                    if (taxable_salary <= 270000) {
                        document.getElementById('paye').innerHTML = 0;
                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye').innerHTML = (taxable_salary - 270000) * (8 / 100);
                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                    }
                } else {
                    gross = basic_salary_input + allowance;
                    document.getElementById('allowance').innerHTML = allowance;
                    document.getElementById('gross').innerHTML = gross;
                    document.getElementById('nssf').innerHTML = basic_salary_input * (10 / 100);
                    document.getElementById('taxable_salary').innerHTML = gross - (basic_salary_input * (10 / 100));
                    var taxable_salary = gross - (basic_salary_input * (10 / 100));
                    if (taxable_salary <= 270000) {
                        document.getElementById('paye').innerHTML = 0;
                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye').innerHTML = (taxable_salary - 270000) * (8 / 100);
                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                    }
                }

            } else {
                gross = basic_salary_input + allowance;
                if (allowance1.length < 1) {
                    gross = basic_salary_input + 0;
                    document.getElementById('allowance').innerHTML = 0;
                    document.getElementById('gross').innerHTML = gross;
                    document.getElementById('nssf').innerHTML = basic_salary_input * (10 / 100);
                    document.getElementById('taxable_salary').innerHTML = gross - (basic_salary_input * (10 / 100));
                    var taxable_salary = gross - (basic_salary_input * (10 / 100));
                    if (taxable_salary <= 270000) {
                        document.getElementById('paye').innerHTML = 0;
                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye').innerHTML = (taxable_salary - 270000) * (8 / 100);
                    }  else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                    }
                } else {

                    document.getElementById('allowance').innerHTML = allowance;
                    document.getElementById('gross').innerHTML = gross;
                    document.getElementById('nssf').innerHTML = basic_salary_input * (10 / 100);
                    document.getElementById('taxable_salary').innerHTML = gross - (basic_salary_input * (10 / 100));
                    var taxable_salary = gross - (basic_salary_input * (10 / 100));
                    if (taxable_salary <= 270000) {
                        document.getElementById('paye').innerHTML = 0;
                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye').innerHTML = (taxable_salary - 270000) * (8 / 100);
                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                       alert("jkkjj")
                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                    }
                }

            }


        }



        function getBasicSalary(basic_salary1) {

            var basic_salary = parseInt(basic_salary1);
            var gross = parseInt(document.getElementById('gross').innerHTML);
            var allowance = parseInt(document.getElementById('allowance_input').value);
            if (document.getElementById('allowance_input').value == "") {
                allowance_input = 0;

                if (basic_salary1.length < 1) {
                    gross = 0;
                    document.getElementById('basic_salary').innerHTML = 0;
                    document.getElementById('gross').innerHTML = gross;
                    document.getElementById('nssf').innerHTML = 0;
                    document.getElementById('taxable_salary').innerHTML = 0;
                    var taxable_salary = gross - (basic_salary * (10 / 100));
                    if (taxable_salary <= 270000) {
                        document.getElementById('paye').innerHTML = 0;
                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye').innerHTML = (taxable_salary - 270000) * (8 / 100);
                    }  else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                    }

                } else {

                    gross = basic_salary;
                    document.getElementById('basic_salary').innerHTML = basic_salary;
                    document.getElementById('gross').innerHTML = gross;
                    document.getElementById('nssf').innerHTML = basic_salary * (10 / 100);
                    document.getElementById('taxable_salary').innerHTML = gross - (basic_salary * (10 / 100));
                    var taxable_salary = gross - (basic_salary * (10 / 100));
                    if (taxable_salary <= 270000) {
                        document.getElementById('paye').innerHTML = 0;
                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye').innerHTML = (taxable_salary - 270000) * (8 / 100);
                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                    }
                }

            } else {
                if (basic_salary1.length < 1) {
                    gross = 0;
                    document.getElementById('basic_salary').innerHTML = 0;
                    document.getElementById('gross').innerHTML = gross + allowance;
                    document.getElementById('nssf').innerHTML = 0 * (10 / 100);
                    document.getElementById('taxable_salary').innerHTML = gross - (0 * (10 / 100));
                    var taxable_salary = gross - (0 * (10 / 100));
                    if (taxable_salary <= 270000) {
                        document.getElementById('paye').innerHTML = 0;
                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye').innerHTML = (taxable_salary - 270000) * (8 / 100);
                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                    }
                } else {
                    document.getElementById('basic_salary').innerHTML = basic_salary;
                    document.getElementById('gross').innerHTML = allowance + basic_salary;
                    document.getElementById('nssf').innerHTML = basic_salary * (10 / 100);
                    document.getElementById('taxable_salary').innerHTML = (allowance + basic_salary) - (basic_salary * (10 / 100));
                    var taxable_salary = (allowance + basic_salary) - (basic_salary * (10 / 100));
                    if (taxable_salary <= 270000) {
                        document.getElementById('paye').innerHTML = 0;
                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye').innerHTML = (taxable_salary - 270000) * (8 / 100);
                    }  else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye').innerHTML = 128000 + ((taxable_salary -1000000) * (30 / 100));
                    }
                }
            }

            // document.getElementById('gross').innerHTML;
            // document.getElementById('basic_salary').innerHTML = basic_salary;
        }

        function getLoan(loan) {
            document.getElementById('loan').innerHTML = allowance;
            document.getElementById('all').innerHTML = allowance;
        }
    </script>
@endsection
