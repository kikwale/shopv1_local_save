<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/auth','AuthenticationController@auth')->name('auth');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/registration', function () {
  return view('auth.register');
});

Route::get('/user-guid', function() {
  return view('user_guid');
 });

Route::get('/contact', function () {
  return view('contact');
});


// Admin


Route::group(['middleware'=>'auth'], function () {
  Route::any('/adminUserForm', 'HomeController@showForm');
  Route::post('/saveTrader', 'HomeController@saveTrader');
  Route::get('/adminUsers', 'HomeController@adminUsers');
  Route::get('/admin_register_shop','HomeController@admin_register_shop');
  Route::post('/admin_save_shop','HomeController@admin_save_shop');
  Route::get('/admin_shops','HomeController@admin_shops');
});



// Shop Owner


  Route::get('/owner_shop','MadukaController@owner_shop');
  Route::get('/shop_worker','MadukaController@shop_worker');
  Route::post('/create_worker','MadukaController@create_worker');
  Route::get('/owner_add_jumla_product','MadukaController@owner_add_jumla_product');
  Route::post('/saveJumlaProduct','MadukaController@saveJumlaProduct');
  Route::get('/owner_add_rejareja_product','MadukaController@owner_add_rejareja_product');
  Route::post('/saveRejarejaProduct','MadukaController@saveRejarejaProduct');
  Route::get('/owner_view_jumla_product','ProductController@owner_view_jumla_product');
  Route::get('/owner_view_rejareja_product','ProductController@owner_view_rejareja_product');
  Route::post('/owner_save_shop','HomeController@ownerSaveShop');
  Route::get('/owner-sold-product','ProductController@ownerSales')->name('owner.sold-products');
  Route::get('/owner-receipt','ReceiptController@ownerReceipt')->name('owner.owner-receipt');
  Route::post('/annual-receipt-form','ReceiptController@annualReceiptForm')->name('owner.annual-receipt');
  Route::post('/owner-annual-receipt-data','ReceiptController@annualReceiptData')->name('owner.annual-receipt-data');
  Route::post('/owner-monthly-receipt','ReceiptController@ownerMonthlyReceipt')->name('owner.monthly-receipt');
  Route::post('/owner-monthly-receipt-form-search','ReceiptController@ownerMonthlyReceiptFormSearch')->name('owner.monthly-receipt-form-search');
  Route::post('/owner-daily-receipt','ReceiptController@ownerDailyReceipt')->name('owner.owner-daily-receipt');
  Route::post('/owner-daily-receipt-form-search','ReceiptController@ownerDailyReceiptFormSearch')->name('owner.daily-receipt-form-search');
  Route::get('/owner-stock','ProductController@ownerStock')->name('owner.stock');
  Route::get('/owner-expired-products','ProductController@ownerExpiredProducts')->name('owner.expired-products');
  Route::get('/owner-expenses','ProfitsController@ownerExpenses')->name('owner.expenses');
  Route::get('/owner-net-profit','ProfitsController@ownerNetProfit')->name('owner.net-profit');
  Route::post('/ownerNetProfitForm','ProfitsController@ownerNetProfitForm')->name('owner.ownerNetProfitForm');
  Route::get('/owner-money','SettingController@ownerMoney')->name('owner.owner-money');
  Route::get('/owner-incoming-order','OrderController@ownerIncomingOrder')->name('owner.incoming-order');
  Route::get('/owner-delivered-order','OrderController@ownerDeliveredorder')->name('owner.delivered-order');
  Route::get('/owner-placed-order','OrderController@ownerPlacedOrder')->name('owner.placed-order');
     
  Route::post('/owner-product-annual-sold','ProductController@ownerProductAnnualSold')->name('owner.product-annual-sold');
  Route::post('/owner-monthly-product-sold','ProductController@ownerMonthlyProductSold')->name('owner.monthly-product-sold');
  Route::post('/owner-daily-product-sold','ProductController@ownerDailyProductSold')->name('owner.daily-product-sold');
  Route::get('/owner-edit-employee','HomeController@ownerEditEmployee')->name('owner.edit-employee');
  Route::post('/owner-save-edited-employee','HomeController@ownerSaveEditedEmployee')->name('owner.save-edited-employee');
  Route::get('/owner-delete-employee','HomeController@ownerDeleteEmployee')->name('owner.delete-employee');
  Route::get('/owner-change-pwd','HomeController@ownerChangePwd')->name('owner.change-pwd');
  Route::post('/owner-save-newPwd','HomeController@ownerSaveNewPwd')->name('owner.save-newPwd');
  Route::get('/owner-expenditure','ExpenditureController@index')->name('owner.expenditure');
  Route::post('/owner-expenditure','ExpenditureController@saveExpenditure')->name('save-expenditure');
  Route::get('/Loan-from','LoanController@ownerLoanFrom')->name('owner.Loan-from');
  Route::get('/Loan-to','LoanController@ownerLoanTo')->name('owner.Loan-to');
  Route::get('/payments','PaymentController@index')->name('owner.payments');
  Route::post('/payroll','PayrollController@index')->name('owner.payroll');
  Route::post('/owner-loan-from-modal','LoanController@ownerLoanFromModal')->name('owner.loan-from-modal');
  Route::post('/owner-loan-return-modal','LoanController@ownerLoanReturnModal')->name('owner.loan-return-modal');
  Route::post('/owner-loan-to-modal','LoanController@ownerLoanToModal')->name('owner.loan-to-modal');
  Route::get('/loan-to-info',function(){
    return view('owner.loan.loan_to_info');
  })->name('owner.loan-to-info');
  Route::post('/owner-employee-loan-return','LoanController@ownerEmployeeLoanReturn')->name('owner.employee-loan-return');
  Route::post('/owner-employee-salary','PaymentController@ownerEmployeeSalary')->name('owner.employee-salary');
  Route::get('/owner-monthly-payroll','PayrollController@index')->name('owner.month_payroll');
  Route::get('/owner-allowances','AllowanceController@index')->name('owner.allowance');
  Route::get('/assign-allowance','AllowanceController@assignAllowance')->name('assign-allowance');
  Route::post('/owner-assign-allowance','AllowanceController@ownerAssignAllowance')->name('owner.assign-allowance');
  Route::post('/owner-monthly-payroll','PayrollController@ownerMonthlyPayroll')->name('owner.monthly-payroll');
  Route::get('/owner-allowance-edit','AllowanceController@ownerEditAllowance')->name('owner.allowance-edit');
  Route::get('/owner-allowance-delete','AllowanceController@ownerDeleteAllowance')->name('owner.allowance-delete'); 
  Route::post('/owner-allowance-edit','AllowanceController@ownerEditAllowanceForm')->name('owner.allowance-edit-form');
  Route::get('/owner-loanf-info','LoanController@ownerLoanfInfo')->name('owner.loanf-info');
  Route::get('/owner-loanf-delete','LoanController@ownerLoanfDelete')->name('owner.loanf-delete');
  Route::get('/owner-loant-info','LoanController@ownerLoantInfo')->name('owner.loant-info');
  Route::get('/owner-loant-delete','LoanController@ownerLoantDelete')->name('owner.loant-delete');
  Route::get('/owner-payment-info','PaymentController@ownerPaymentInfo')->name('owner.payment-info');
  Route::get('/owner-payment-delete','PaymentController@ownerPaymentDelete')->name('owner.payment-delete');
  Route::get('/owner-profit-loss','ProfitsController@ownerProfitLoss')->name('owner.profit-loss');
  Route::post('/owner-annual-profit','ProfitsController@ownerAnnualProfit')->name('owner.annual-profit');
  Route::post('/owner-monthly-profit','ProfitsController@ownerMonthlyProfit')->name('owner.monthly-profit');
  Route::post('/owner-daily-profit','ProfitsController@ownerDailyProfit')->name('owner.owner-daily-profit');
  





//Seller Routes


  
Route::post('/seller-import-products','ImportingController@sellerImportProducts')->name('seller.import-products');
Route::post('/rejarejaForm','ProductController@rejarejaForm')->name('seller.rejarejaForm');
Route::post('/jumlaForm','ProductController@jumlaForm')->name('seller.jumlaForm');
Route::get('/seller_selling_product','ProductController@seller_selling_product')->name('seller.selling_product');
Route::get('/seller_today_sales','ProductController@seller_today_sales')->name('seller.today_sales');
Route::get('/seller_add_jumla_product','ProductController@seller_add_jumla_product')->name('seller.add_jumla_product');
Route::post('/seller_saveJumlaProduct','ProductController@seller_saveJumlaProduct')->name('seller.saveJumlaProduct');
Route::get('/seller_view_jumla_product','ProductController@seller_view_jumla_product')->name('seller.view_jumla_product');
Route::get('/seller-add-rejareja-product','ProductController@sellerAddRejarejaProduct')->name('seller.add_rejareja_product');
Route::post('/seller_saveRejarejaProduct','ProductController@seller_saveRejarejaProduct')->name('seller.saveRejarejaProduct');
Route::get('/seller_view_rejareja_product','ProductController@seller_view_rejareja_product')->name('seller.view_rejareja_product');
Route::get('/seller-finished-product','ProductController@sellerFinishedProduct')->name('seller.finished_product');
Route::get('/seller-store','ProductController@sellerStore')->name('seller.store');
Route::get('/seller_shop_workers','HomeController@seller_shop_workers')->name('seller.shop_workers');
Route::get('/seller-receipt-data','ReceiptController@showReceiptData')->name('seller.receipt-data');
Route::get('/seller-print-receipt','ReceiptController@printReceipt')->name('seller.print-receipt');
Route::get('/seller_printed_receipt','ReceiptController@printedReceipt')->name('seller.printed-receipt');
Route::get('/seller-sold-product','ProductController@soldProducts')->name('seller.sold-product');
Route::post('/seller-annual-product-sold','ProductController@soldProductsYear')->name('seller.annual-product-sold');
Route::post('/seller-monthly-product-sold','ProductController@soldProductsMonth')->name('seller.monthly-product-sold');
Route::post('/seller-daily-product-sold','ProductController@soldProductsDay')->name('seller.daily-product-sold');
Route::get('/seller_expired_product','ProductController@expiredProducts')->name('seller.expired_product');
Route::get('/seller-place-order','OrderController@sellerPlaceOrder')->name('seller.place-order');
Route::post('/placeOrder','OrderController@sellerPutOrder')->name('seller.placeOrder');
Route::get('/seller-incoming-order','OrderController@sellerIncomingOrder')->name('seller.incoming-order');
Route::get('/seller-delivered-order','OrderController@sellerDeliveredorder')->name('seller.delivered-order');
Route::get('/seller-placed-order','OrderController@sellerPlacedOrder')->name('seller.placed-order');
Route::get('/seller-accept-order','OrderController@sellerAcceptOrder')->name('seller.accept-order');
Route::get('/seller-reject-order','OrderController@sellerRejectOrder')->name('seller.reject-order');
Route::get('/seller-confirm-delivery','OrderController@sellerConfirmDelivery')->name('seller.confirm-delivery');
Route::get('/seller-change-pwd','HomeController@sellerChangePwd')->name('seller.change-pwd');
Route::post('/seller-save-newPwd','HomeController@sellerSaveNewPwd')->name('seller.save-newPwd');
Route::get('/seller-accept-expired','ProductController@sellerAcceptExpired')->name('seller.accept-expired');
Route::post('/add-product-form','ProductController@addProduct')->name('seller.product-form');
Route::get('/seller-return-product','ReturnController@returnProduct')->name('seller.return-product');
Route::get('/seller-show-product-sold-year','ProductController@sellerShowProducctsSoldYear')->name('seller.show-product-sold-year');
Route::get('/seller-show-product-sold-month','ProductController@sellerShowProducctsSoldMonth')->name('seller.show-product-sold-month');
Route::get('/seller-show-product-sold-day','ProductController@sellerShowProducctsSoldDay')->name('seller.show-product-sold-day');
Route::get('/seller-returned-products','ReturnController@sellerShowReturnedProducts')->name('seller.returned-products');
Route::get('/seller_update_product','ProductController@sellerUpdateProduct')->name('seller.update-product');
Route::post('/seller-update-product','ProductController@sellerUpdateProductSave')->name('seller.update-product-save');
Route::get('/seller-delete-product','ProductController@sellerDeleteProduct')->name('seller.delete-product');
Route::get('/seller-invoice','InvoiceController@index')->name('seller.invoice');
Route::post('/seller-new-invoice','InvoiceController@newInvoice')->name('seller.new-invoice');
Route::get('/seller-invoice-product','InvoiceController@sellerInvoiceProduct')->name('seller.invoice-product');
Route::get('/seller-create-invoicePage','InvoiceController@sellerCreateInvoicePage')->name('seller.create-invoicePage');
Route::get('/seller-invoice-vat','InvoiceController@sellerInvoiceVat')->name('seller.invoice-vat');
Route::get('/print-invoice/{invoice_id}','InvoiceController@sellerInvoicePrint')->name('seller.invoice-print');
Route::get('/print-view-invoice/{id}','InvoiceController@sellerViewInvoicePrint')->name('seller.view-invoice-print');
Route::get('/seller-view-invoice','InvoiceController@sellerViewInvoice')->name('seller.invoice-view');
Route::get('/seller-publish-new','PublishController@sellerPublishNew')->name('seller.publish-new');
Route::get('/publish-new-sales','PublishController@publishNewSales')->name('seller.publish-new-sales');
Route::get('/publish-new-products','PublishController@publishNewProducts')->name('seller.publish-new-products');
Route::get('/publish-new-invoices','PublishController@publishNewInvoices')->name('seller.publish-new-invoices');
Route::get('/seller-quotaions','QuotationController@index')->name('seller.quotation');
Route::post('/seller-new-quotation','QuotationController@newQuotation')->name('seller.new-quotation');
Route::get('/seller-create-quotationPage','QuotationController@sellerCreateQuotationPage')->name('seller.create-quotationPage');
Route::get('/seller-quotation-product','QuotationController@sellerQuotationProduct')->name('seller.quotation-product');
Route::get('/print-quote/{quote_id}','QuotationController@sellerQuotationPrint')->name('seller.quotation-print');
Route::get('/seller-view-quotation','QuotationController@sellerViewQuotation')->name('seller.quotation-view');
Route::get('/customers','CustomerController@index')->name('seller.customers');
Route::post('/seller-save-customer','CustomerController@saveCustomer')->name('seller.save-customer');
Route::get('/collect-from-invoice','CreditcollectionController@collectFromInvoice')->name('seller.collect-from-invoice');
Route::get('/collect-from-creditSale','CreditcollectionController@collectFromCreditSale')->name('seller.collect-from-creditSale');
Route::get('/credit-purchase','CreditpurchaseController@index')->name('seller.credit-purchase');
Route::get('/supplier','SupplierController@index')->name('seller.supplier');
Route::post('/seller-save-supplier','SupplierController@saveSupplier')->name('seller.save-supplier');

Route::get('/seller-calendar', function() {
 return view('seller.calendar');
});

Route::get('/seller-calculator', function() {
  return view('seller.calculator');
 });

 
Route::get('/seller-notify-order', 'OrderController@sellerNotifyOrder');

 Route::get('/seller-notify-expired', function(Request $request) {
  return $request->all();
 });









Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/{lang}', function($lang){
  App::setLocale($lang);
  Session::put('locale', $lang);
  return back();

})->name('app.lang');