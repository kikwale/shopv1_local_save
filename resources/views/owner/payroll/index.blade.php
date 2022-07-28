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

            {{--
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-i elevation-1" style="background-color:#006699"><i
                                class="fas fa-users text-white"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total O-level {{Session::get('owner_id')}}
                                {{Session::get('shop_id')}}</span>
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
                        <span class="info-box-icon bg- elevation-1" style="background-color:#006699"><i
                                class="fas fa-users text-white"></i></span>

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
                        <span class="info-box-icon bg-in elevation-1" style="background-color:#006699"><i
                                class="fas fa-users text-white"></i></span>

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
                        <span class="info-box-icon bg-inf elevation-1" style="background-color:#006699"><i
                                class="fas fa-users text-white"></i></span>

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
                    <img src="dist/img/sales-icon-01.png" width="30px" height="30px" alt="" srcset=""><br>
                    Annual Payroll
                </a>

                <a class="btn btn-app bg-white" style="width: 200px; height:150px" data-toggle="modal"
                    data-targe t="#month_payroll"><br>
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
                    <div class="col-sm-6 col-md-2">

                    </div><br>
                    <!-- /.col -->
                    <center class="col-sm-6 col-md-6 text-primary">
                        <img id="img" src="dist/img/shotram.png" alt="ShoTram Logo" class="brand-image img-circle elevation-3"
                        style="opacity: 8px; width:85px; height:75px;">
                        <p>shotram payaroll</p>
                       
                        <address>
                            <?php $duka = App\Models\Maduka::join('users','users.id','=','madukas.user_id')->where('madukas.id',Session::get('shop_id'))->first();  ?>
                            <strong style="font-size: 20px">{{ $duka->shop_name }}</strong>
                           <p style="font-size: 20px"><b class="text-secondary">Trader Name:</b>  &nbsp;{{ $duka->fname }} &nbsp; {{ $duka->lname }}</p>
                           <p style="font-size: 20px"><b class="text-secondary">Email:</b>  &nbsp; {{ $duka->email }}</p> 
                           <p style="font-size: 20px"><b class="text-secondary">Phone:</b>  &nbsp; {{ $duka->phone }}</p> 
                        </address>
                    </center>
                    <!-- /.col -->
                    <div class="col-sm-4">

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <br>
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
                                    <th>NSSF Contribution</th>
                                    <th>Taxable Salary</th>
                                    <th>PAYE</th>
                                    <th>Loan</th>
                                    <th>Net Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 3; $i = 0; $val = App\Models\seller::where('shop_id',Session::get('shop_id'))->count(); ?>
                                @foreach(App\Models\seller::where('shop_id',Session::get('shop_id'))->get() as $employees)
                                <?php $i++; ?>
                                <tr>
                                    <input type="number" id="count" hidden value="{{ $val }}">
                                    <td>{{ $employees->fname }} &nbsp; {{ $employees->lname }}</td>
                                    <td>Unsigned</td>
                                    <td><input type="number" id="basic_salary_input{{ $i }}" class="form-control"
                                            oninput="getBasicSalary(this.id)">
                                        <p id="basic_salary{{ $i }}"></p>
                                    </td>
                                    <td><input type="number" id="allowance_input{{ $i }}" class="form-control"
                                            oninput="getAllownce(this.id)">
                                        <p id="allowance{{ $i }}"></p>
                                    </td>
                                    <td id="gross{{ $i }}"></td>
                                    <td id="nssf{{ $i }}"></td>
                                    <td id="taxable_salary{{ $i }}"></td>
                                    <td id="paye{{ $i }}"></td>
                                    <td>
                                        <input type="text" id="loan_input{{ $i }}" class="form-control"
                                            oninput="getLoan(this.id)">
                                        <p id="loan{{ $i }}"></p>
                                    </td>
                                    <td id="net_salary{{ $i }}"></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tr>
                                <th></th>
                                <th>TOTAL</th>
                                <th id="total_basic_salary"></th>
                                <th id="total_allowance"></th>
                                <th id="total_gross_salary"></th>
                                <th id="total_nssf"></th>
                                <th id="total_taxable_salary"></th>
                                <th id="total_paye">PAYE</th>
                                <th id="total_loan">Loan</th>
                                <th id="total_net_salary">Net Salary</th>
                            </tr>
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
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango
                            imeem
                            plugg
                            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                        </p>
                    </div> --}}
                    <!-- /.col -->
                    <div class="col-12">
                        
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">PARTICULARS:</th>
                                    <th style="width:50%">AMOUNT:</th>
                                </tr>
                                <tr>
                                    <th> Gross Salary ({{ $count }})</th>
                                    <td id="gross_particular"></td>
                                </tr>
                                <tr>
                                    <th> Net Salary ({{ $count }})</th>
                                    <td id="net_salary_particular"></td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td id="total"></td>
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

                    {{-- <button type="button" id="generatePDF" class="btn btn-success float-right"
                        style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Generate PDF
                    </button> --}}
                    <button type="button" id="cc" onclick="printPayroll()" class="btn btn-primary float-right"
                        style="margin-right: 5px;">
                        <i class="fas fa-print"></i> Print Payroll
                    </button>
                    <button type="button" onclick="previewPayroll()" class="btn btn-primary float-right"
                        style="margin-right: 5px;">
                        <i class="fas fa-preview"></i> Priview
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

<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
<script type="text/javascript">

   $('#generatePDF').click(function() {
            const element = document.getElementById('htmlContent')
            html2pdf()
            .from(element)
            .save();
        });

        function printPayroll(){
            var count = parseInt(document.getElementById('count').value);
            for (var i = 1; i <= count; i++) {
                $('#basic_salary_input'+i+'').remove();
                $('#allowance_input'+i+'').remove();
                $('#loan_input'+i+'').remove();
                $('#img').remove();
            }
       
            var divContents = document.getElementById("htmlContent").innerHTML;
            
            var a = window.open();
            a.document.write('<html>');
            a.document.write('<body>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
       
        function previewPayroll(){
            var count = parseInt(document.getElementById('count').value);
            for (var i = 1; i <= count; i++) {
                $('#basic_salary_input'+i+'').remove();
                $('#allowance_input'+i+'').remove();
                $('#loan_input'+i+'').remove();
            }
        }


        function getAllownce(allowance1) {
            var allowance = parseInt(document.getElementById(allowance1).value)
            var val = document.getElementById(allowance1).value;
            var length = allowance1.length;
            var id = allowance1.slice(length-1);
            
            var basic_salary_input = parseInt(document.getElementById('basic_salary_input'+id+'').value);
            var gross;
            if (document.getElementById('basic_salary_input'+id+'').value == "") {

                   basic_salary_input = 0;
                  
                if (val.length < 1) {
                    
                    gross = 0;
                    document.getElementById('allowance'+id+'').innerHTML = 0;
                    document.getElementById('gross'+id+'').innerHTML = 0;
                    document.getElementById('nssf'+id+'').innerHTML = basic_salary_input * (10 / 100);
                    document.getElementById('taxable_salary'+id+'').innerHTML = gross - (basic_salary_input * (10 / 100));
                    
                    var taxable_salary = gross - (basic_salary_input * (10 / 100));
                    var net_salary;
                    if (document.getElementById('loan_input'+id+'').value == "") {
                        
                        if (taxable_salary <= 270000) {
                        document.getElementById('paye'+id+'').innerHTML = 0;
                        net_salary = taxable_salary - 0;
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye'+id+'').innerHTML = (taxable_salary - 270000) * (8 / 100);
                        net_salary = taxable_salary - ((taxable_salary - 270000) * (8 / 100));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye'+id+'').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                        net_salary = taxable_salary - (20000 + ((taxable_salary - 520000) * (20 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                        net_salary = taxable_salary - (68000 + ((taxable_salary - 760000) * (25 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                        net_salary = taxable_salary - (128000 + ((taxable_salary - 1000000) * (30 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    }


                    } else {

                        if (taxable_salary <= 270000) {
                        document.getElementById('paye'+id+'').innerHTML = 0;
                        net_salary = taxable_salary - 0;
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye'+id+'').innerHTML = (taxable_salary - 270000) * (8 / 100);
                        net_salary = taxable_salary - ((taxable_salary - 270000) * (8 / 100));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye'+id+'').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                        net_salary = taxable_salary - (20000 + ((taxable_salary - 520000) * (20 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                        net_salary = taxable_salary - (68000 + ((taxable_salary - 760000) * (25 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                        net_salary = taxable_salary - (128000 + ((taxable_salary - 1000000) * (30 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    }

                    }

                   
                } else {
                    gross = basic_salary_input + allowance;
                    document.getElementById('allowance'+id+'').innerHTML = allowance;
                    document.getElementById('gross'+id+'').innerHTML = gross;
                    document.getElementById('nssf'+id+'').innerHTML = basic_salary_input * (10 / 100);
                    document.getElementById('taxable_salary'+id+'').innerHTML = gross - (basic_salary_input * (10 / 100));
                    var taxable_salary = gross - (basic_salary_input * (10 / 100));
                    var net_salary;
                    if (document.getElementById('loan_input'+id+'').value == "") {
                        
                        if (taxable_salary <= 270000) {
                        document.getElementById('paye'+id+'').innerHTML = 0;
                        net_salary = taxable_salary - 0;
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye'+id+'').innerHTML = (taxable_salary - 270000) * (8 / 100);
                        net_salary = taxable_salary - ((taxable_salary - 270000) * (8 / 100));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye'+id+'').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                        net_salary = taxable_salary - (20000 + ((taxable_salary - 520000) * (20 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                        net_salary = taxable_salary - (68000 + ((taxable_salary - 760000) * (25 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                        net_salary = taxable_salary - (128000 + ((taxable_salary - 1000000) * (30 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    }


                    } else {

                        if (taxable_salary <= 270000) {
                        document.getElementById('paye'+id+'').innerHTML = 0;
                        net_salary = taxable_salary - 0;
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye'+id+'').innerHTML = (taxable_salary - 270000) * (8 / 100);
                        net_salary = taxable_salary - ((taxable_salary - 270000) * (8 / 100));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye'+id+'').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                        net_salary = taxable_salary - (20000 + ((taxable_salary - 520000) * (20 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                        net_salary = taxable_salary - (68000 + ((taxable_salary - 760000) * (25 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                        net_salary = taxable_salary - (128000 + ((taxable_salary - 1000000) * (30 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    }

                    }
                }

            } else {
                gross = basic_salary_input + allowance;
                if (val.length < 1) {
                    gross = basic_salary_input + 0;
                    document.getElementById('allowance'+id+'').innerHTML = 0;
                    document.getElementById('gross'+id+'').innerHTML = gross;
                    document.getElementById('nssf'+id+'').innerHTML = basic_salary_input * (10 / 100);
                    document.getElementById('taxable_salary'+id+'').innerHTML = gross - (basic_salary_input * (10 / 100));
                    var taxable_salary = gross - (basic_salary_input * (10 / 100));
                    var net_salary;
                    if (document.getElementById('loan_input'+id+'').value == "") {
                        
                        if (taxable_salary <= 270000) {
                        document.getElementById('paye'+id+'').innerHTML = 0;
                        net_salary = taxable_salary - 0;
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye'+id+'').innerHTML = (taxable_salary - 270000) * (8 / 100);
                        net_salary = taxable_salary - ((taxable_salary - 270000) * (8 / 100));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye'+id+'').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                        net_salary = taxable_salary - (20000 + ((taxable_salary - 520000) * (20 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                        net_salary = taxable_salary - (68000 + ((taxable_salary - 760000) * (25 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                        net_salary = taxable_salary - (128000 + ((taxable_salary - 1000000) * (30 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    }


                    } else {

                        if (taxable_salary <= 270000) {
                        document.getElementById('paye'+id+'').innerHTML = 0;
                        net_salary = taxable_salary - 0;
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye'+id+'').innerHTML = (taxable_salary - 270000) * (8 / 100);
                        net_salary = taxable_salary - ((taxable_salary - 270000) * (8 / 100));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye'+id+'').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                        net_salary = taxable_salary - (20000 + ((taxable_salary - 520000) * (20 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                        net_salary = taxable_salary - (68000 + ((taxable_salary - 760000) * (25 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                        net_salary = taxable_salary - (128000 + ((taxable_salary - 1000000) * (30 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    }

                    }

                } else {

                    document.getElementById('allowance'+id+'').innerHTML = allowance;
                    document.getElementById('gross'+id+'').innerHTML = gross;
                    document.getElementById('nssf'+id+'').innerHTML = basic_salary_input * (10 / 100);
                    document.getElementById('taxable_salary'+id+'').innerHTML = gross - (basic_salary_input * (10 / 100));
                    var taxable_salary = gross - (basic_salary_input * (10 / 100));
                    var net_salary;
                    if (document.getElementById('loan_input'+id+'').value == "") {
                        
                        if (taxable_salary <= 270000) {
                        document.getElementById('paye'+id+'').innerHTML = 0;
                        net_salary = taxable_salary - 0;
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye'+id+'').innerHTML = (taxable_salary - 270000) * (8 / 100);
                        net_salary = taxable_salary - ((taxable_salary - 270000) * (8 / 100));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye'+id+'').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                        net_salary = taxable_salary - (20000 + ((taxable_salary - 520000) * (20 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                        net_salary = taxable_salary - (68000 + ((taxable_salary - 760000) * (25 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                        net_salary = taxable_salary - (128000 + ((taxable_salary - 1000000) * (30 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    }


                    } else {

                        if (taxable_salary <= 270000) {
                        document.getElementById('paye'+id+'').innerHTML = 0;
                        net_salary = taxable_salary - 0;
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye'+id+'').innerHTML = (taxable_salary - 270000) * (8 / 100);
                        net_salary = taxable_salary - ((taxable_salary - 270000) * (8 / 100));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye'+id+'').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                        net_salary = taxable_salary - (20000 + ((taxable_salary - 520000) * (20 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                        net_salary = taxable_salary - (68000 + ((taxable_salary - 760000) * (25 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                        net_salary = taxable_salary - (128000 + ((taxable_salary - 1000000) * (30 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    }

                    }
                }

            }

              
            var count = parseInt(document.getElementById('count').value);
            var total_basic_salary = 0;
            var total_allowance = 0;
            var total_gross_salary = 0;
            var total_nssf = 0;
            var total_taxable_salary = 0;
            var total_paye = 0;
            var total_loan = 0;
            var total_net_salary = 0;

            for (var i = 1; i <= count; i++) {

                if (document.getElementById('basic_salary'+i+'').innerHTML == "" || document.getElementById('basic_salary'+i+'').innerHTML == 0)  {
                    document.getElementById('basic_salary'+i+'').innerHTML = 0;
                }
                if (document.getElementById('allowance'+i+'').innerHTML == "" || document.getElementById('allowance'+i+'').innerHTML == 0)  {
                    document.getElementById('allowance'+i+'').innerHTML = 0;
                }
                if (document.getElementById('gross'+i+'').innerHTML == "" || document.getElementById('gross'+i+'').innerHTML == 0)  {
                    document.getElementById('gross'+i+'').innerHTML = 0;
                }
                if (document.getElementById('nssf'+i+'').innerHTML == "" || document.getElementById('nssf'+i+'').innerHTML == 0)  {
                    document.getElementById('nssf'+i+'').innerHTML = 0;
                }
                if (document.getElementById('taxable_salary'+i+'').innerHTML == "" || document.getElementById('taxable_salary'+id+'').innerHTML == 0)  {
                    document.getElementById('taxable_salary'+i+'').innerHTML = 0;
                }
                if (document.getElementById('paye'+i+'').innerHTML == "" || document.getElementById('paye'+i+'').innerHTML == 0)  {
                    document.getElementById('paye'+i+'').innerHTML = 0;
                }
                if (document.getElementById('loan'+i+'').innerHTML == "" || document.getElementById('loan'+i+'').innerHTML == 0)  {
                    document.getElementById('loan'+i+'').innerHTML = 0;
                }
                if (document.getElementById('net_salary'+i+'').innerHTML == "" || document.getElementById('net_salary'+i+'').innerHTML == 0)  {
                    document.getElementById('net_salary'+i+'').innerHTML = 0;
                }

               total_basic_salary = total_basic_salary + parseFloat(document.getElementById('basic_salary'+i+'').innerHTML);
               total_allowance = total_allowance +  parseFloat(document.getElementById('allowance'+i+'').innerHTML);
               total_gross_salary = total_gross_salary + parseFloat(document.getElementById('gross'+i+'').innerHTML);
               total_nssf = total_nssf + parseFloat(document.getElementById('nssf'+i+'').innerHTML);
               total_taxable_salary = total_taxable_salary + parseFloat(document.getElementById('taxable_salary'+i+'').innerHTML);
               total_paye = total_paye + parseFloat(document.getElementById('paye'+i+'').innerHTML);
               total_loan = total_loan + parseFloat(document.getElementById('loan'+i+'').innerHTML);
               total_net_salary = total_net_salary + parseFloat(document.getElementById('net_salary'+i+'').innerHTML);
            }
            
               document.getElementById('total_basic_salary').innerHTML = total_basic_salary;
               document.getElementById('total_allowance').innerHTML = total_allowance;
               document.getElementById('total_gross_salary').innerHTML = total_gross_salary;
               document.getElementById('total_nssf').innerHTML = total_nssf;
               document.getElementById('total_taxable_salary').innerHTML = total_taxable_salary;
               document.getElementById('total_paye').innerHTML = total_paye;
               document.getElementById('total_loan').innerHTML = total_loan;
               document.getElementById('total_net_salary').innerHTML = total_net_salary;
               document.getElementById('gross_particular').innerHTML = total_gross_salary;
               document.getElementById('net_salary_particular').innerHTML = total_net_salary;
               document.getElementById('total').innerHTML = total_net_salary + total_gross_salary;

        }



        function getBasicSalary(basic_salary1) {
            var length = basic_salary1.length;
            var id = basic_salary1.slice(length - 1);
            var val = document.getElementById(basic_salary1).value;
            var basic_salary = parseInt(document.getElementById(basic_salary1).value);
            var gross = parseInt(document.getElementById('gross'+id+'').innerHTML);
            var allowance = parseInt(document.getElementById('allowance_input'+id+'').value);
           
            

            if (document.getElementById('allowance_input'+id+'').value == "") {
                var allowance_input = 0;
                
                if (val.length < 1) {
                    gross = 0;
                    document.getElementById('basic_salary'+id+'').innerHTML = 0;
                    document.getElementById('gross'+id+'').innerHTML = gross;
                    document.getElementById('nssf'+id+'').innerHTML = 0;
                    document.getElementById('taxable_salary'+id+'').innerHTML = 0;
                    var taxable_salary = gross - (0 * (10 / 100));
                    var net_salary;
                    if (document.getElementById('loan_input'+id+'').value == "") {
                        
                        if (taxable_salary <= 270000) {
                        document.getElementById('paye'+id+'').innerHTML = 0;
                        net_salary = taxable_salary - 0;
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye'+id+'').innerHTML = (taxable_salary - 270000) * (8 / 100);
                        net_salary = taxable_salary - ((taxable_salary - 270000) * (8 / 100));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye'+id+'').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                        net_salary = taxable_salary - (20000 + ((taxable_salary - 520000) * (20 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                        net_salary = taxable_salary - (68000 + ((taxable_salary - 760000) * (25 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                        net_salary = taxable_salary - (128000 + ((taxable_salary - 1000000) * (30 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    }


                    } else {

                        if (taxable_salary <= 270000) {
                        document.getElementById('paye'+id+'').innerHTML = 0;
                        net_salary = taxable_salary - 0;
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye'+id+'').innerHTML = (taxable_salary - 270000) * (8 / 100);
                        net_salary = taxable_salary - ((taxable_salary - 270000) * (8 / 100));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye'+id+'').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                        net_salary = taxable_salary - (20000 + ((taxable_salary - 520000) * (20 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                        net_salary = taxable_salary - (68000 + ((taxable_salary - 760000) * (25 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                        net_salary = taxable_salary - (128000 + ((taxable_salary - 1000000) * (30 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    }

                    }


                } else {

                    gross = basic_salary;
                    document.getElementById('basic_salary'+id+'').innerHTML = basic_salary;
                    document.getElementById('gross'+id+'').innerHTML = gross;
                    document.getElementById('nssf'+id+'').innerHTML = basic_salary * (10 / 100);
                    document.getElementById('taxable_salary'+id+'').innerHTML = gross - (basic_salary * (10 / 100));
                    var taxable_salary = gross - (basic_salary * (10 / 100));
                    var net_salary;
                    if (document.getElementById('loan_input'+id+'').value == "") {
                        
                        if (taxable_salary <= 270000) {
                        document.getElementById('paye'+id+'').innerHTML = 0;
                        net_salary = taxable_salary - 0;
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye'+id+'').innerHTML = (taxable_salary - 270000) * (8 / 100);
                        net_salary = taxable_salary - ((taxable_salary - 270000) * (8 / 100));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye'+id+'').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                        net_salary = taxable_salary - (20000 + ((taxable_salary - 520000) * (20 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                        net_salary = taxable_salary - (68000 + ((taxable_salary - 760000) * (25 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                        net_salary = taxable_salary - (128000 + ((taxable_salary - 1000000) * (30 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    }


                    } else {

                        if (taxable_salary <= 270000) {
                        document.getElementById('paye'+id+'').innerHTML = 0;
                        net_salary = taxable_salary - 0;
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye'+id+'').innerHTML = (taxable_salary - 270000) * (8 / 100);
                        net_salary = taxable_salary - ((taxable_salary - 270000) * (8 / 100));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye'+id+'').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                        net_salary = taxable_salary - (20000 + ((taxable_salary - 520000) * (20 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                        net_salary = taxable_salary - (68000 + ((taxable_salary - 760000) * (25 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                        net_salary = taxable_salary - (128000 + ((taxable_salary - 1000000) * (30 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    }

                    }
                }

            } else {
                if (val.length < 1) {
                    gross = 0;
                    document.getElementById('basic_salary'+id+'').innerHTML = 0;
                    document.getElementById('gross'+id+'').innerHTML = gross + allowance;
                    document.getElementById('nssf'+id+''+id+'').innerHTML = 0 * (10 / 100);
                    document.getElementById('taxable_salary'+id+'').innerHTML = gross - (0 * (10 / 100));
                    var taxable_salary = gross - (0 * (10 / 100));
                    var net_salary;
                    if (document.getElementById('loan_input'+id+'').value == "") {
                        
                        if (taxable_salary <= 270000) {
                        document.getElementById('paye'+id+'').innerHTML = 0;
                        net_salary = taxable_salary - 0;
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye'+id+'').innerHTML = (taxable_salary - 270000) * (8 / 100);
                        net_salary = taxable_salary - ((taxable_salary - 270000) * (8 / 100));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye'+id+'').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                        net_salary = taxable_salary - (20000 + ((taxable_salary - 520000) * (20 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                        net_salary = taxable_salary - (68000 + ((taxable_salary - 760000) * (25 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                        net_salary = taxable_salary - (128000 + ((taxable_salary - 1000000) * (30 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    }


                    } else {

                        if (taxable_salary <= 270000) {
                        document.getElementById('paye'+id+'').innerHTML = 0;
                        net_salary = taxable_salary - 0;
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye'+id+'').innerHTML = (taxable_salary - 270000) * (8 / 100);
                        net_salary = taxable_salary - ((taxable_salary - 270000) * (8 / 100));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye'+id+'').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                        net_salary = taxable_salary - (20000 + ((taxable_salary - 520000) * (20 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                        net_salary = taxable_salary - (68000 + ((taxable_salary - 760000) * (25 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                        net_salary = taxable_salary - (128000 + ((taxable_salary - 1000000) * (30 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    }

                    }

                } else {
                    document.getElementById('basic_salary'+id+'').innerHTML = basic_salary;
                    document.getElementById('gross'+id+'').innerHTML = allowance + basic_salary;
                    document.getElementById('nssf'+id+'').innerHTML = basic_salary * (10 / 100);
                    document.getElementById('taxable_salary'+id+'').innerHTML = (allowance + basic_salary) - (basic_salary * (10 / 100));
                    var taxable_salary = (allowance + basic_salary) - (basic_salary * (10 / 100));
                     var net_salary;
                    if (document.getElementById('loan_input'+id+'').value == "") {
                        
                        if (taxable_salary <= 270000) {
                        document.getElementById('paye'+id+'').innerHTML = 0;
                        net_salary = taxable_salary - 0;
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye'+id+'').innerHTML = (taxable_salary - 270000) * (8 / 100);
                        net_salary = taxable_salary - ((taxable_salary - 270000) * (8 / 100));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye'+id+'').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                        net_salary = taxable_salary - (20000 + ((taxable_salary - 520000) * (20 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                        net_salary = taxable_salary - (68000 + ((taxable_salary - 760000) * (25 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                        net_salary = taxable_salary - (128000 + ((taxable_salary - 1000000) * (30 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary;

                    }
                    } else {

                        if (taxable_salary <= 270000) {
                        document.getElementById('paye'+id+'').innerHTML = 0;
                        net_salary = taxable_salary - 0;
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 270000 && taxable_salary <= 520000) {
                        document.getElementById('paye'+id+'').innerHTML = (taxable_salary - 270000) * (8 / 100);
                        net_salary = taxable_salary - ((taxable_salary - 270000) * (8 / 100));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 520000 && taxable_salary <= 760000) {
                        document.getElementById('paye'+id+'').innerHTML = 20000 + ((taxable_salary - 520000) * (20 / 100));
                        net_salary = taxable_salary - (20000 + ((taxable_salary - 520000) * (20 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 760000 && taxable_salary <= 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 68000 + ((taxable_salary - 760000) * (25 / 100));
                        net_salary = taxable_salary - (68000 + ((taxable_salary - 760000) * (25 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    } else if (taxable_salary > 1000000) {
                        document.getElementById('paye'+id+'').innerHTML = 128000 + ((taxable_salary - 1000000) * (30 / 100));
                        net_salary = taxable_salary - (128000 + ((taxable_salary - 1000000) * (30 / 100)));
                        document.getElementById('net_salary'+id+'').innerHTML = net_salary - parseInt(document.getElementById('loan_input'+id+'').value);

                    }

                    }
                }

            }

            // document.getElementById('gross').innerHTML;
            // document.getElementById('basic_salary').innerHTML = basic_salary;
            var count = parseInt(document.getElementById('count').value);
            var total_basic_salary = 0;
            var total_allowance = 0;
            var total_gross_salary = 0;
            var total_nssf = 0;
            var total_taxable_salary = 0;
            var total_paye = 0;
            var total_loan = 0;
            var total_net_salary = 0;

            for (var i = 1; i <= count; i++) {

                if (document.getElementById('basic_salary'+i+'').innerHTML == "" || document.getElementById('basic_salary'+i+'').innerHTML == 0)  {
                    document.getElementById('basic_salary'+i+'').innerHTML = 0;
                }
                if (document.getElementById('allowance'+i+'').innerHTML == "")  {
                    document.getElementById('allowance'+i+'').innerHTML = 0;
                }
                if (document.getElementById('gross'+i+'').innerHTML == "")  {
                    document.getElementById('gross'+i+'').innerHTML = 0;
                }
                if (document.getElementById('nssf'+i+'').innerHTML == "")  {
                    document.getElementById('nssf'+i+'').innerHTML = 0;
                }
                if (document.getElementById('taxable_salary'+i+'').innerHTML == "")  {
                    document.getElementById('taxable_salary'+i+'').innerHTML = 0;
                }
                if (document.getElementById('paye'+i+'').innerHTML == "")  {
                    document.getElementById('paye'+i+'').innerHTML = 0;
                }
                if (document.getElementById('loan'+i+'').innerHTML == "")  {
                    document.getElementById('loan'+i+'').innerHTML = 0;
                }
                if (document.getElementById('net_salary'+i+'').innerHTML == "")  {
                    document.getElementById('net_salary'+i+'').innerHTML = 0;
                }

               total_basic_salary = total_basic_salary + parseFloat(document.getElementById('basic_salary'+i+'').innerHTML);
               total_allowance = total_allowance +  parseFloat(document.getElementById('allowance'+i+'').innerHTML);
               total_gross_salary = total_gross_salary + parseFloat(document.getElementById('gross'+i+'').innerHTML);
               total_nssf = total_nssf + parseFloat(document.getElementById('nssf'+i+'').innerHTML);
               total_taxable_salary = total_taxable_salary + parseFloat(document.getElementById('taxable_salary'+i+'').innerHTML);
               total_paye = total_paye + parseFloat(document.getElementById('paye'+i+'').innerHTML);
               total_loan = total_loan + parseFloat(document.getElementById('loan'+i+'').innerHTML);
               total_net_salary = total_net_salary + parseFloat(document.getElementById('net_salary'+i+'').innerHTML);
            }

           
               document.getElementById('total_basic_salary').innerHTML = total_basic_salary;
               document.getElementById('total_allowance').innerHTML = total_allowance;
               document.getElementById('total_gross_salary').innerHTML = total_gross_salary;
               document.getElementById('total_nssf').innerHTML = total_nssf;
               document.getElementById('total_taxable_salary').innerHTML = total_taxable_salary;
               document.getElementById('total_paye').innerHTML = total_paye;
               document.getElementById('total_loan').innerHTML = total_loan;
               document.getElementById('total_net_salary').innerHTML = total_net_salary;
               document.getElementById('gross_particular').innerHTML = total_gross_salary;
               document.getElementById('net_salary_particular').innerHTML = total_net_salary;
               document.getElementById('total').innerHTML = total_net_salary + total_gross_salary;
        }

        //Loan change

        function getLoan(loan1) {
            var val = document.getElementById(loan1).value;
           var length = loan1.length - 1;
           var id = loan1.slice(length);
          
           var loan = parseInt(document.getElementById(loan1).value);
            if (val.length < 1) {

                if (document.getElementById('taxable_salary'+id+'').innerHTML == "" || document.getElementById('taxable_salary'+id+'').innerHTML == 0) {
                    document.getElementById('loan'+id+'').innerHTML = 0;
                    document.getElementById('net_salary'+id+'').innerHTML = 0 - val; 
                } else {
                    document.getElementById('loan'+id+'').innerHTML = 0;
                    var paye = parseInt(document.getElementById('paye'+id+'').innerHTML);
                    var taxable_salary = parseInt(document.getElementById('taxable_salary'+id+'').innerHTML);
                    document.getElementById('net_salary'+id+'').innerHTML = taxable_salary - paye; 
                }
            } else {
                if (document.getElementById('taxable_salary'+id+'').innerHTML == "") {
                    document.getElementById('loan'+id+'').innerHTML = loan;
                    document.getElementById('net_salary'+id+'').innerHTML = 0 - loan; 
                } else {
                    document.getElementById('loan'+id+'').innerHTML = loan;
                    var paye = parseInt(document.getElementById('paye'+id+'').innerHTML);
                    var taxable_salary = parseInt(document.getElementById('taxable_salary'+id+'').innerHTML);
                    document.getElementById('net_salary'+id+'').innerHTML = taxable_salary - loan - paye; 
                }
            }

            var count = parseInt(document.getElementById('count').value);
            var total_basic_salary = 0;
            var total_allowance = 0;
            var total_gross_salary = 0;
            var total_nssf = 0;
            var total_taxable_salary = 0;
            var total_paye = 0;
            var total_loan = 0;
            var total_net_salary = 0;

            for (var i = 1; i <= count; i++) {

                if (document.getElementById('basic_salary'+i+'').innerHTML == "" || document.getElementById('basic_salary'+i+'').innerHTML == 0)  {
                    document.getElementById('basic_salary'+i+'').innerHTML = 0;
                }
                if (document.getElementById('allowance'+i+'').innerHTML == "" || document.getElementById('allowance'+i+'').innerHTML == 0)  {
                    document.getElementById('allowance'+i+'').innerHTML = 0;
                }
                if (document.getElementById('gross'+i+'').innerHTML == "" || document.getElementById('gross'+i+'').innerHTML == 0)  {
                    document.getElementById('gross'+i+'').innerHTML = 0;
                }
                if (document.getElementById('nssf'+i+'').innerHTML == "" || document.getElementById('nssf'+i+'').innerHTML == 0)  {
                    document.getElementById('nssf'+i+'').innerHTML = 0;
                }
                if (document.getElementById('taxable_salary'+i+'').innerHTML == "" || document.getElementById('taxable_salary'+id+'').innerHTML == 0)  {
                    document.getElementById('taxable_salary'+i+'').innerHTML = 0;
                }
                if (document.getElementById('paye'+i+'').innerHTML == "" || document.getElementById('paye'+i+'').innerHTML == 0)  {
                    document.getElementById('paye'+i+'').innerHTML = 0;
                }
                if (document.getElementById('loan'+i+'').innerHTML == "" || document.getElementById('loan'+i+'').innerHTML == 0)  {
                    document.getElementById('loan'+i+'').innerHTML = 0;
                }
                if (document.getElementById('net_salary'+i+'').innerHTML == "" || document.getElementById('net_salary'+i+'').innerHTML == 0)  {
                    document.getElementById('net_salary'+i+'').innerHTML = 0;
                }

               total_basic_salary = total_basic_salary + parseFloat(document.getElementById('basic_salary'+i+'').innerHTML);
               total_allowance = total_allowance +  parseFloat(document.getElementById('allowance'+i+'').innerHTML);
               total_gross_salary = total_gross_salary + parseFloat(document.getElementById('gross'+i+'').innerHTML);
               total_nssf = total_nssf + parseFloat(document.getElementById('nssf'+i+'').innerHTML);
               total_taxable_salary = total_taxable_salary + parseFloat(document.getElementById('taxable_salary'+i+'').innerHTML);
               total_paye = total_paye + parseFloat(document.getElementById('paye'+i+'').innerHTML);
               total_loan = total_loan + parseFloat(document.getElementById('loan'+i+'').innerHTML);
               total_net_salary = total_net_salary + parseFloat(document.getElementById('net_salary'+i+'').innerHTML);
            }
            
               document.getElementById('total_basic_salary').innerHTML = total_basic_salary;
               document.getElementById('total_allowance').innerHTML = total_allowance;
               document.getElementById('total_gross_salary').innerHTML = total_gross_salary;
               document.getElementById('total_nssf').innerHTML = total_nssf;
               document.getElementById('total_taxable_salary').innerHTML = total_taxable_salary;
               document.getElementById('total_paye').innerHTML = total_paye;
               document.getElementById('total_loan').innerHTML = total_loan;
               document.getElementById('total_net_salary').innerHTML = total_net_salary;
               document.getElementById('gross_particular').innerHTML = total_gross_salary;
               document.getElementById('net_salary_particular').innerHTML = total_net_salary;
               document.getElementById('total').innerHTML = total_net_salary + total_gross_salary;
           
        }
</script>
@endsection