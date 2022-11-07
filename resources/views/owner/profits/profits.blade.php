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

               <br>
                <div class="row">
                    <div class="col-md-4">
                      <a href="" data-toggle="modal" data-target="#profit_annual">
                            <div class="info-box bg-" style="background-color: #F15A24">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-light">{{ __('Annual Profits') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a href="#" data-toggle="modal" data-target="#profit_month">
                            <div class="info-box bg-" style="background-color:#F15A24">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-light">{{ __('Monthly Profits') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a href="" data-toggle="modal" data-target="#profit_day">
                            <div class="info-box bg-" style="background-color:#F15A24">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-light">{{ __('Daily Profits') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="row mb-2">
                    <div class="col-sm-9">

                        @if ($type == 'Year')
                            <h1 class="m-0 text-dark">{{ __('message.seller.profit') }} {{ $val }}</h1><br>

                            <div class="row">
                              <div class="col-md-6">
                                  <div class="info-box bg-light">
                                      <div class="info-box-content">
                                          <span
                                              class="info-box-text text-center text-secondary">{{ __('message.seller.gross_profit_loss') }}</span>
                                          <span
                                              class="info-box-number text-center text-secondary mb-0">{{ App\Models\Mauzo::where('year', $val)->where('shop_id', Session::get('shop_id'))->sum('profit') }}{{ Session::get('money') }}</span>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="info-box bg-light">
                                      <div class="info-box-content">
                                          <span class="info-box-text text-center text-secondary">{{ __('message.seller.net_profit_loss') }}</span>
                                           <span
                                                  class="info-box-number text-center text-secondary mb-0">{{ App\Models\Mauzo::where('year', $val)->where('shop_id', Session::get('shop_id'))->sum('profit') - App\Models\Expenditure::where('year', $val)->where('shop_id', Session::get('shop_id'))->sum('amount')}}{{ Session::get('money') }}</span></span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                            <div class="ro">
                                
                                <div class="col-md-">
                                    <form method="POST" action="{{url('owner-annual-profit')}}">
                                        @csrf


                                        <input id="shop_id" type="text"
                                            class="form-control @error('shop_id') is-invalid @enderror" name="shop_id"
                                            value="{{ Session::get('shop_id') }}" hidden autocomplete="shop_id">
                                        <input id="owner_id" type="text"
                                            class="form-control @error('owner_id') is-invalid @enderror" name="owner_id"
                                            value="{{ Session::get('owner_id') }}" hidden autocomplete="owner_id">
                                        <input id="type" type="text"
                                            class="form-control @error('type') is-invalid @enderror" name="type"
                                            value="Year" hidden autocomplete="type">


                                        <div class="row">
                                            <label for="gender"
                                                class="col-md-2 col-form-label text-md-right">{{ __('Year') }}</label>

                                            <div class="col-md-5 form-group">
                                                <select id="year" type="text"
                                                    class="form-control selected2 @error('year') is-invalid @enderror"
                                                    name="year" value="{{ old('year') }}" autocomplete="year">
                                                    <option value="{{ $val }}">{{ $val }}</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2015">2015</option>
                                                </select>
                                                @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-5 offset-md- form-group">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    {{ __('Search..') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif

                        @if ($type == 'Month')
                            <h1 class="m-0 text-dark">{{ __('message.seller.profit') }} {{ $month }} / {{ $year }}</h1>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span
                                                class="info-box-text text-center text-secondary">{{ __('message.seller.gross_profit_loss') }}</span>
                                            <span
                                                class="info-box-number text-center text-secondary mb-0">{{ App\Models\Mauzo::where('month', $month)->where('year', $year)->where('shop_id', Session::get('shop_id'))->sum('profit') }}{{ Session::get('money') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-secondary">{{ __('message.seller.net_profit_loss') }}</span>
                                            <span
                                            class="info-box-number text-center text-secondary mb-0">{{ App\Models\Mauzo::where('month', $month)->where('year', $year)->where('shop_id', Session::get('shop_id'))->sum('profit') - App\Models\Expenditure::where('month', $month)->where('year', $year)->where('shop_id', Session::get('shop_id'))->sum('amount') }}{{ Session::get('money') }}</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="owner-monthly-profit">
                                @csrf

                                <input id="shop_id" type="text" class="form-control @error('shop_id') is-invalid @enderror"
                                    name="shop_id" value="{{ Session::get('shop_id') }}" hidden autocomplete="shop_id">
                                <input id="owner_id" type="text"
                                    class="form-control @error('owner_id') is-invalid @enderror" name="owner_id"
                                    value="{{ Session::get('owner_id') }}" hidden autocomplete="owner_id">
                                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror"
                                    name="type" value="Month" hidden autocomplete="type">

                                <div class="form-group row">

                                    <div class="col-md-4">
                                        <label for="month"
                                            class="col-md- col-form-label text-md-right">{{ __('Month') }}</label>

                                        <select id="month" type="text"
                                            class="form-control select2 @error('month') is-invalid @enderror" name="month"
                                            value="{{ old('month') }}" autocomplete="month">
                                            <option value="{{ $month }}">{{ $month }}</option>
                                            <option value="Jan">1 (Jan)</option>
                                            <option value="Feb">2 (Feb)</option>
                                            <option value="Mar">3 (Mar)</option>
                                            <option value="Apr">4 (Apr)</option>
                                            <option value="May">5 (May)</option>
                                            <option value="Jun">6 (Jun)</option>
                                            <option value="Jul">7 (Jul)</option>
                                            <option value="Aug">8 (Aug)</option>
                                            <option value="Sep">9 (Sep)</option>
                                            <option value="Oct">10 (Oct)</option>
                                            <option value="Nov">11 (Nov)</option>
                                            <option value="Des">12 (Des)</option>
                                        </select>
                                        @error('month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="col-md-4">
                                        <label for="gender"
                                            class="col-md- col-form-label text-md-right">{{ __('Year') }}</label>

                                        <select id="year" type="text"
                                            class="form-control select2 @error('year') is-invalid @enderror" name="year"
                                            value="{{ old('year') }}" autocomplete="year">
                                            <option value="{{ $year }}">{{ $year }}</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                            <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="gender"
                                            class="col-md- col-form-label text-md-right">{{ __('Search') }}</label>

                                        <br><button type="submit" class="btn btn-primary btn-sm">

                                            {{ __('Search..') }}
                                        </button>
                                    </div>

                                </div>




                            </form>
                        @endif

                        @if ($type == 'Day')
                            <h1 class="m-0 text-dark">{{ __('message.seller.profit') }} {{ $date }}</h1>
                            <br>
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="info-box bg-light">
                                      <div class="info-box-content">
                                          <span
                                              class="info-box-text text-center text-secondary">{{ __('message.seller.gross_profit_loss') }}</span>
                                          <span
                                              class="info-box-number text-center text-secondary mb-0">{{ App\Models\Mauzo::where('sales_date', $date)->where('shop_id', Session::get('shop_id'))->sum('profit')}}{{ Session::get('money') }}</span>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="info-box bg-light">
                                      <div class="info-box-content">
                                          <span class="info-box-text text-center text-secondary">{{ __('message.seller.net_profit_loss') }}</span>
                                           <span
                                                  class="info-box-number text-center text-secondary mb-0">{{ App\Models\Mauzo::where('sales_date', $date)->where('shop_id', Session::get('shop_id'))->sum('profit') - App\Models\Expenditure::where('sales_date', $date)->where('shop_id', Session::get('shop_id'))->sum('amount') }}{{ Session::get('money') }}</span></span>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <br>

                          <form method="POST" action="owner-daily-profit">
                            @csrf
              
                            <input id="shop_id" type="text" class="form-control @error('shop_id') is-invalid @enderror" name="shop_id" value="{{Session::get('shop_id') }}" hidden autocomplete="shop_id">
                            <input id="owner_id" type="text" class="form-control @error('owner_id') is-invalid @enderror" name="owner_id" value="{{ Session::get('owner_id') }}" hidden autocomplete="owner_id">
                            <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="Day" hidden autocomplete="type">
      
                            <div class="form-group row">
                                <label for="day" class="col-md-2 col-form-label text-md-right">{{ __('Date') }}</label>
              
                                <div class="col-md-6">
                                    <input id="day" type="date" class="form-control @error('day') is-invalid @enderror" name="day" value="{{ old('day') }}" required autocomplete="day" autofocus>
              
                                    @error('day')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-0">
                                  <div class="col-md-4 offset-md-4">
                                      <button type="submit" class="btn btn-primary btn-sm">
                                          {{ __('Search..') }}
                                      </button>
                                  </div>
                              </div>
                            </div>
            
              
                        </form>
                        @endif

                    </div><!-- /.col -->
                    <div class="col-sm-3">

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Ok !! </strong> {{session('success')}}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Please !! </strong>Error has occured.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
        
                @endif

                {{-- @include('admin.include') --}}
                


            </div>


    </div>
    <!--/. container-fluid -->
    </section>
    <!-- /.content -->

    </div>

    @include('owner/modals.profit_annualy')
    @include('owner/modals.profit_monthly')
    @include('owner/modals.profit_daily')

@endsection
