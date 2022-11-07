<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <link
  rel="icon"
  type="image/png"
  sizes="16x16"
  href="dist/img/shotram.png"
/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="pdf/pdf.css" />
    <script src="pdf/pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

</head>

<body>
    <div class="container d-flex justify-content-center mt-50 mb-50" >
        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <button class="btn btn-primary" id="download"> download pdf</button>
            </div>
            <div class="col-md-12" >
                <div class="card" id="invoice" style="background-image: url('dist/img/boxed-bg.jpg')">
                    <div class="card-header bg-transparent header-elements-inline">
                        <h6 class="card-title text-primary">Sale invoice</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4 pull-left">

                                    <ul class="list list-unstyled mb-0 text-left">
                                        <li>{{ Session::get('shop_name') }}</li>
                                        <li>{{ Session::get('country') }} &nbsp;{{ Session::get('shop_region') }} &nbsp;{{ Session::get('shop_district') }} &nbsp;{{ Session::get('shop_street') }}</li>
                                        <li>{{ Session::get('shop_email') }}</li>
                                        <li>{{ Session::get('shop_phone') }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4 ">
                                    <div class="text-sm-right">
                                        <h4 class="invoice-color mb-2 mt-md-2">Invoice #{{ $invoice['id'] }}</h4>
                                        <ul class="list list-unstyled mb-0">
                                            <li>Date: <span class="font-weight-semibold">{{ $invoice['date'] }}</span></li>
                                            {{-- <li>Due date: <span class="font-weight-semibold">March 30, 2020</span></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-flex flex-md-wrap">
                            <div class="mb-4 mb-md-2 text-left"> <span class="text-muted">Invoice To:</span>
                                <ul class="list list-unstyled mb-0">
                                    <li>
                                        <h5 class="my-2">{{ $invoice['customer_name'] }}</h5>
                                    </li>
                                    {{-- <li><span class="font-weight-semibold">Samantha Mutual funds Ltd</span></li> --}}
                                    <li>{{ $invoice['address'] }}</li>
                                    <li>{{ $invoice['phone'] }}</li>
                                    <li><a href="#" data-abc="true">{{ $invoice['email'] }}</a></li>
                                </ul>
                            </div>
                            <div class="mb-2 ml-auto">
                                <div class="d-flex flex-wrap wmin-md-400">
                                    {{-- <ul class="list list-unstyled mb-0 text-left">
                                        <li>
                                            <h5 class="my-2">Total Due:</h5>
                                        </li>
                                        <li>Bank name:</li>
                                        <li>Country:</li>
                                        <li>City:</li>
                                        <li>Address:</li>
                                        <li>IBAN:</li>
                                        <li>SWIFT code:</li>
                                    </ul> 
                                     <ul class="list list-unstyled text-right mb-0 ml-auto">
                                        <li>
                                            <h5 class="font-weight-semibold my-2">$1,090</h5>
                                        </li>
                                        <li><span class="font-weight-semibold">Hong Kong Bank</span></li>
                                        <li>Hong Kong</li>
                                        <li>Thurnung street, 21</li>
                                        <li>New standard</li>
                                        <li><span class="font-weight-semibold">98574959485</span></li>
                                        <li><span class="font-weight-semibold">BHDHD98273BER</span></li>
                                    </ul> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th> Quantity</th>
                                    <th>Is Taxable</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
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
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <div class="d-md-flex flex-md-wrap">
                            <div class="pt-2 mb-3 wmin-md-400 ml-auto">
                                <h6 class="mb-3 text-left">Total due</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th class="text-left">Subtotal:</th>
                                                <td class="text-right">{{ $sub }}{{ Session::get('money') }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">Tax VAT: <span class="font-weight-normal">(18%)</span></th>
                                                <td class="text-right">{{ $vat }}{{ Session::get('money') }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">Total:</th>
                                                <td class="text-right text-primary">
                                                    <h5 class="font-weight-semibold">{{ $sub + $vat }}{{ Session::get('money') }}</h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="text-right mt-3"> <button type="button" class="btn btn-primary"><b><i class="fa fa-paper-plane-o mr-1"></i></b>
                                        Send invoice</button> </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"> <span class="text-muted">Invoice was created on a computer and is valid without the signature and seal.</span> </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>