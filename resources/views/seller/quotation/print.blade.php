<html><head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script><style>#invoice{
    padding: 30px;
    }
    .invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
    }
    .invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
    }
    .invoice .company-details {
    text-align: right
    }
    .invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
    }
    .invoice .contacts {
    margin-bottom: 20px
    }
    .invoice .invoice-to {
    text-align: left
    }
    .invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
    }
    .invoice .invoice-details {
    text-align: right
    }
    .invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
    }
    .invoice main {
    padding-bottom: 50px
    }
    .invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
    }
    .invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
    }
    .invoice main .notices .notice {
    font-size: 1.2em
    }
    .invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
    }
    .invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
    }
    .invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
    }
    .invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
    }
    .invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
    }
    .invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
    }
    .invoice table .unit {
    background: #ddd
    }
    .invoice table .total {
    background: #3989c6;
    color: #fff
    }
    .invoice table tbody tr:last-child td {
    border: none
    }
    .invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
    }
    .invoice table tfoot tr:first-child td {
    border-top: none
    }
    .invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
    }
    .invoice table tfoot tr td:first-child {
    border: none
    }
    .invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
    }
    @media print {
    .invoice {
    font-size: 11px!important;
    overflow: hidden!important
    }
    .invoice footer {
    position: absolute;
    bottom: 10px;
    page-break-after: always
    }
    .invoice>div:last-child {
    page-break-before: always
    }
    }</style><link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <!--Author : @arboshiki-->
    </head><body><div id="invoice">
    <div class="toolbar hidden-print">
    <div class="text-right">
    {{-- <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
    <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button> --}}
    </div>
    <hr>
    </div>
    <div class="invoice overflow-auto">
    <div style="min-width: 600px">
    <header>
    <div class="row">
    <div class="col">
    <a target="_blank" href="https://lobianijs.com">
    <img src="http://lobianijs.com/lobiadmin/version/1.0/ajax/img/logo/lobiadmin-logo-text-64.png" data-holder-rendered="true">
    </a>
    </div>
    <div class="col company-details">
    <h2 class="name">
    {{-- <a target="_blank" href="https://lobianijs.com">
    Arboshiki
    </a> --}}
    </h2>
    <div>{{ Session::get('shop_name') }}, &nbsp; {{ Session::get('country') }}</div>
    {{-- <div>(123) 456-789</div>
    <div>company@example.com</div> --}}
    </div>
    </div>
    </header>
    <main>
    <div class="row contacts">
    <div class="col invoice-to">
    <div class="text-gray-light">QUOTATION TO:</div>
    <h2 class="to">{{ $quotation->customer_name }}</h2>
    <div class="address">{{ $quotation->address }}</div>
    <div class="email"><a href="mailto:{{ $quotation->email }}">{{ $quotation->email }}</a>
        <a href="tel:{{ $quotation->phone }}">{{ $quotation->phone }}</a></div>
    </div>
    <div class="col invoice-details">
    <h1 class="invoice-id">Quotation #{{ $quotation->id }}</h1>
    <div class="date">Date: </div>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $quotation->created_at)->format('d-m-Y H:i:s') }}
    {{-- <div class="date">Due Date: 30/10/2018</div> --}}
    </div>
    </div>
    <table border="0" cellspacing="0" cellpadding="0">
    <thead>
    <tr>
    <th>#</th>
    <th class="text-left">ITEM</th>
    <th class="text-right"> PRICE</th>
    </tr>
    </thead>
    <tbody>
    <?php  ?>
        @foreach ($product_quotation as $item)
        <tr>
            <td class="no">{{ $item->id }}</td>
            <td class="text-left">{{ $item->product_name }}</td>
            <td class="unit">{{ $item->price }}</td>
            </tr>
        @endforeach
    
    </tbody>
   
    </table>
   
   
   
    </div>
    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
    <div></div>
    </div>
    </div> 
    <script type="text/javascript">
    // $(document).ready(function () {
        
    // $('#printInvoice').on('click', function () {
        
        Popup($('.invoice')[0].outerHTML);
    function Popup(data)
    {
    window.print();
    return true;
    }
        
    // });
    
    // })
    
    
    </script></body></html>