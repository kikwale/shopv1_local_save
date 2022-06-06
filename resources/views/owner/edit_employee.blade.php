
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
         
            <h1 class="m-0 text-dark">Edit Employee</h1><br><br>

          </div><!-- /.col -->
          <div class="col-sm-6">
          
          </div><!-- /.col -->

          <div class="row">
            <div class="col-sm-1">
          
            </div><!-- /.col -->

            <div class="col-sm-10">
              <h5 class="text-warning"><b> {{ __('message.owner_adding_emplo_guide') }}</b></h5>
            </div><!-- /.col -->
           
            <div class="col-sm-1">
          
            </div><!-- /.col -->
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
        @if (session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Waoo!</strong> {{session('success')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
           
        <div class="row">
            
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form method="POST" action="owner-save-edited-employee">
                    @csrf
      
                    <div class="form-group row">
                        <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
      
                        <div class="col-md-6">
                            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ $data->fname }}" required autocomplete="fname" autofocus>
      
                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
      {{-- 
                    + Options
      Full texts	
      id
      fname
      mname
      lname
      gender
      phone
      email
      email_verified_at
      password --}}
      
                     <div class="form-group row">
                        <label for="mname" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>
      
                        <div class="col-md-6">
                            <input id="mname" type="text" class="form-control @error('mname') is-invalid @enderror" name="mname" value="{{ $data->mname }}"  autocomplete="mname">
                            <input id="shop_id" type="text" class="form-control @error('shop_id') is-invalid @enderror" name="shop_id" value="{{Session::get('shop_id') }}" hidden autocomplete="shop_id">
                            <input id="owner_id" type="text" class="form-control @error('owner_id') is-invalid @enderror" name="owner_id" value="{{ Session::get('owner_id') }}" hidden autocomplete="owner_id">
                            <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ $data->id }}" hidden autocomplete="id">
      
                            <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ $data->user_id }}" hidden autocomplete="user_id">
      
                            @error('mname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name (login password)') }}</label>
      
                        <div class="col-md-6">
                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ $data->lname }}"  autocomplete="lname">
      
                            @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
      
                        <div class="col-md-6">
                            <select id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}"  autocomplete="gender">
                              <option value="{{ $data->gender }}">{{ $data->gender }}</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
      
                    <div class="form-group row">
                      <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
      
                      <div class="col-md-6">
                          <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" value="{{ $data->email }}" name="email" required   autocomplete="email">
      
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
      
                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
      
                        <div class="col-md-6">
                            <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" value="{{ $data->phone}}" name="phone" required   autocomplete="phone">
      
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
      
               
                    <div class="form-group row">
                       
                            <label for="leader" class="col-md-3 col-form-label text-md-right">{{ __('Leader') }}</label>
      
                       
                            <input required id="leader" type="radio" class="col-md-3 @error('leader') is-invalid @enderror" name="leader" value="1"    autocomplete="leader">
      
                       
           
                            <label for="leader" class="col-md-3 col-form-label text-md-right">{{ __('Not a Leader') }}</label>
      
                        
                        <div class="col-md-3">
                            <input required id="leader" type="radio" class="col-md-3 @error('leader') is-invalid @enderror" name="leader"  value="2"    autocomplete="leader">
      
                        </div>
                    </div>
      
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
@endsection

  