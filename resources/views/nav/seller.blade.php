{{--  HEADER --}}

<div class="pre-loader">
  <div class="pre-loader-box">
    <div class="loader-logo">
      <img src="dist/img/shotram.png"  alt="" />
    </div>
    <div class="loader-progress" id="progress_div">
      <div class="bar" id="bar1"></div>
    </div>
    <div class="percent" id="percent1">0%</div>
    <div class="loading-text">Loading...</div>
  </div>
</div>

<div class="header">
  <div class="header-left">
    <div class="menu-icon bi bi-list"></div>
    <div
      class="search-toggle-icon bi bi-search"
      data-toggle="header_search"
    ></div>
    <div class="header-search">
      <form>
        <div class="form-group mb-0">
          <i class="dw dw-search2 search-icon"></i>
          <input
            type="text"
            class="form-control search-input"
            placeholder="Search Here"
          />
          <div class="dropdown">
            <a
              class="dropdown-toggle no-arrow"
              href="#"
              role="button"
              data-toggle="dropdown"
            >
              <i class="ion-arrow-down-c"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"
                  >From</label
                >
                <div class="col-sm-12 col-md-10">
                  <input
                    class="form-control form-control-sm form-control-line"
                    type="text"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">To</label>
                <div class="col-sm-12 col-md-10">
                  <input
                    class="form-control form-control-sm form-control-line"
                    type="text"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"
                  >Subject</label
                >
                <div class="col-sm-12 col-md-10">
                  <input
                    class="form-control form-control-sm form-control-line"
                    type="text"
                  />
                </div>
              </div>
              <div class="text-right">
                <button class="btn btn-primary">Search</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="header-right">
    <div class="dashboard-setting user-notification">
      <div class="dropdown">
        <a
          class="dropdown-toggle no-arrow"
          href="javascript:;"
          data-toggle="right-sidebar"
        >
          <i class="dw dw-settings2"></i>
        </a>
      </div>
    </div>
    <div class="user-notification">
      <div class="dropdown">
        <a
          class="dropdown-toggle no-arrow"
          href="#"
          role="button"
          data-toggle="dropdown"
        >
          <i class="icon-copy dw dw-notification"></i>

          <?php 
          use App\Models\Product;
          $count = 0; ?>
          @foreach (Product::where('shop_id',Session::get('shop_id'))->where('expire','<=',date('Y-m-d'))
          ->where('isExpired',0)->get() as $value)
            <?php $count = $count + 1; ?>
          @endforeach

          @foreach (Product::where('shop_id',Session::get('shop_id'))->where('expire','>=',date('Y-m-d'))
          ->whereRaw('total <= notification')->get() as $value)

            
             <?php $count = $count + 1; ?>
            
          @endforeach

          @if (App\Models\Order::where('ordered_shop_id',Session::get('shop_id'))->where('status','normal')->get() != "")
          @foreach (App\Models\Order::where('ordered_shop_id',Session::get('shop_id'))->where('status','normal')->get()
          as $value)
           <?php $count = $count + 1; ?>
          @endforeach
          @endif
         
          @if ($count != 0)
           <span class="badge notification-active">
          {{-- {{ $count }} --}}
             
           </span>
          @endif
         
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="notification-list mx-h-350 customscroll">
            <ul>

              @foreach (App\Models\Product::where('shop_id',Session::get('shop_id'))->where('expire','<=',date('Y-m-d'))
              ->where('isExpired',0)->get() as $value)
              <li id = "expired_notification{{ $value->id }}">
                <a href="#" onclick="removeProductNotification('{{ $value->id }}')">
                  <img src="dist/img/warning-symbol-01.png" height="40px;" alt="" />
                  <h3>New Expired Product</h3>
                  <p>
                    {{ $value->name }}
                  </p>
                </a>
              </li>
              @endforeach
              
        @foreach (App\Models\Product::where('shop_id',Session::get('shop_id'))->where('expire','>=',date('Y-m-d'))
        ->whereRaw('total <= notification')->get() as $value)
        <li id = "expired_notification{{ $value->id }}">
          <a href="#" onclick="removeProductNotification('{{ $value->id }}')">
            <img src="dist/img/warning-symbol-01.png" height="40px;" alt="" />
            <h3 style="color: rgb(255, 123, 0)">Bidhaa Inakaribia Kuisha</h3>
            <p>
              {{ $value->name }}
            </p>
          </a>
        </li>
      @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="user-info-dropdown">
      <div class="dropdown">
        <a
          class="dropdown-toggle"
          href="#"
          role="button"
          data-toggle="dropdown"
        >
          
          <span class="user-name">{{__('message.language')}}</span>
        </a>
        <div
          class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
        >
          <a class="dropdown-item" href="sw"
            ><i class=""></i> Kiswahili</a
          >
          <a class="dropdown-item" href="en"
          ><i class="dw dw-"></i> English</a
        >
         
         
        </div>
      </div>
    </div>

    <div class="user-info-dropdown">
      <div class="dropdown">
        <a
          class="dropdown-toggle"
          href="#"
          role="button"
          data-toggle="dropdown"
        >
          <span class="user-icon">
            <img src="dist/img/person-icon-01.png" class="img-circle elevation-2" alt="User Image">
          </span>
          <span class="user-name">{{Session::get('fname')}}</span>
        </a>
        <div
          class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
        >
          <a class="dropdown-item" href="profile.html"
            ><i class="dw dw-user1"></i> Profile</a
          >
          <a class="dropdown-item" href="seller-change-pwd"
            ><i class="icon-copy bi bi-wrench"></i> {{ __('message.seller.change_psw') }}</a
          >
                      {{-- <a class="dropdown-item" href="faq.html"
                        ><i class="dw dw-help"></i> Help</a
                      > --}}
                      <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                <i class="dw dw-logout" aria-hidden="true"></i>    {{ __('message.seller.logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            </form>
         
        </div>
      </div>
    </div>
    {{-- <div class="github-link">
      <a href="https://github.com/dropways/deskapp" target="_blank"
        ><img src="vendors/images/github.svg" alt=""
      /></a>
    </div> --}}
  </div>
</div>


{{-- MENU SIDEBAR --}}


<div class="right-sidebar">
  <div class="sidebar-title">
    <h3 class="weight-600 font-16 text-blue">
      Layout Settings
      <span class="btn-block font-weight-400 font-12"
        >User Interface Settings</span
      >
    </h3>
    <div class="close-sidebar" data-toggle="right-sidebar-close">
      <i class="icon-copy ion-close-round"></i>
    </div>
  </div>
  <div class="right-sidebar-body customscroll">
    <div class="right-sidebar-body-content">
      <h4 class="weight-600 font-18 pb-10">Header Background</h4>
      <div class="sidebar-btn-group pb-30 mb-10">
        <a
          href="javascript:void(0);"
          class="btn btn-outline-primary header-white active"
          >White</a
        >
        <a
          href="javascript:void(0);"
          class="btn btn-outline-primary header-dark"
          >Dark</a
        >
      </div>

      <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
      <div class="sidebar-btn-group pb-30 mb-10">
        <a
          href="javascript:void(0);"
          class="btn btn-outline-primary sidebar-light"
          >White</a
        >
        <a
          href="javascript:void(0);"
          class="btn btn-outline-primary sidebar-dark active"
          >Dark</a
        >
      </div>

      <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
      <div class="sidebar-radio-group pb-10 mb-10">
        <div class="custom-control custom-radio custom-control-inline">
          <input
            type="radio"
            id="sidebaricon-1"
            name="menu-dropdown-icon"
            class="custom-control-input"
            value="icon-style-1"
            checked=""
          />
          <label class="custom-control-label" for="sidebaricon-1"
            ><i class="fa fa-angle-down"></i
          ></label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input
            type="radio"
            id="sidebaricon-2"
            name="menu-dropdown-icon"
            class="custom-control-input"
            value="icon-style-2"
          />
          <label class="custom-control-label" for="sidebaricon-2"
            ><i class="ion-plus-round"></i
          ></label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input
            type="radio"
            id="sidebaricon-3"
            name="menu-dropdown-icon"
            class="custom-control-input"
            value="icon-style-3"
          />
          <label class="custom-control-label" for="sidebaricon-3"
            ><i class="fa fa-angle-double-right"></i
          ></label>
        </div>
      </div>

      <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
      <div class="sidebar-radio-group pb-30 mb-10">
        <div class="custom-control custom-radio custom-control-inline">
          <input
            type="radio"
            id="sidebariconlist-1"
            name="menu-list-icon"
            class="custom-control-input"
            value="icon-list-style-1"
            checked=""
          />
          <label class="custom-control-label" for="sidebariconlist-1"
            ><i class="ion-minus-round"></i
          ></label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input
            type="radio"
            id="sidebariconlist-2"
            name="menu-list-icon"
            class="custom-control-input"
            value="icon-list-style-2"
          />
          <label class="custom-control-label" for="sidebariconlist-2"
            ><i class="fa fa-circle-o" aria-hidden="true"></i
          ></label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input
            type="radio"
            id="sidebariconlist-3"
            name="menu-list-icon"
            class="custom-control-input"
            value="icon-list-style-3"
          />
          <label class="custom-control-label" for="sidebariconlist-3"
            ><i class="dw dw-check"></i
          ></label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input
            type="radio"
            id="sidebariconlist-4"
            name="menu-list-icon"
            class="custom-control-input"
            value="icon-list-style-4"
            checked=""
          />
          <label class="custom-control-label" for="sidebariconlist-4"
            ><i class="icon-copy dw dw-next-2"></i
          ></label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input
            type="radio"
            id="sidebariconlist-5"
            name="menu-list-icon"
            class="custom-control-input"
            value="icon-list-style-5"
          />
          <label class="custom-control-label" for="sidebariconlist-5"
            ><i class="dw dw-fast-forward-1"></i
          ></label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input
            type="radio"
            id="sidebariconlist-6"
            name="menu-list-icon"
            class="custom-control-input"
            value="icon-list-style-6"
          />
          <label class="custom-control-label" for="sidebariconlist-6"
            ><i class="dw dw-next"></i
          ></label>
        </div>
      </div>

      <div class="reset-options pt-30 text-center">
        <button class="btn btn-danger" id="reset-settings">
          Reset Settings
        </button>
      </div>
    </div>
  </div>
</div>


<div class="left-side-bar">
  <div class="brand-logo">
    <a href="#">
      <img src="dist/img/shotram.png" width="80" height="50" alt="" class="dark-logo" />
      <img
        src="dist/img/shotram.png" width="80" height="50"
        alt=""
        class="light-logo"
      />
    </a>
    <div class="close-sidebar" data-toggle="left-sidebar-close">
      <i class="ion-close-round"></i>
    </div>
  </div>
  <div class="menu-block customscroll">
    <div class="sidebar-menu">
      <ul id="accordion-menu">
        <li >
          <a href="#" class="dropdown-toggle no-arrow">
            <span class="micon bi bi-house"></span
            ><span>Dashboard </span>
          </a>
          {{-- <ul class="submenu">
            <li><a href="index.html">Dashboard style 1</a></li>
            <li><a href="index2.html">Dashboard style 2</a></li>
            <li><a href="index3.html">Dashboard style 3</a></li>
          </ul> --}}
        </li>
        <li>
          <a href="seller-calendar" class="dropdown-toggle no-arrow">
            <span class="micon bi bi-calendar4-week"></span
            ><span class="mtext">Calendar</span>
          </a>
        </li>
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" >
            <span class="micon icon-copy fa fa-signal"></span
            ><span class="mtext"> {{__('message.seller.sales')}}</span>
          </a>
          <ul class="submenu">
            
            <li>
              <a href="seller_selling_product">{{__('message.seller.start_selling')}}</a>
            </li>
            <li><a href="seller-sold-product">{{__('message.seller.sales')}}</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle">
            <span class="micon bi bi-archive"></span
            ><span class="mtext"> {{__('message.seller.product')}}</span>
          </a>
          <ul class="submenu">
            <li><a href="seller-add-rejareja-product">{{__('message.seller.register_products')}}</a></li>
            <li><a href="seller-returned-products">{{__('message.seller.returned_products')}}</a></li>
            <li><a href="seller-finished-product">{{__('message.seller.finished_products')}}</a></li>
            <li><a href="seller-store">{{__('message.seller.stock')}}</a></li>
            <li><a href="seller_expired_product">{{__('message.seller.expired_products')}}</a></li>
          </ul>
        </li>
        <li>
          <a href="seller-invoice" class="dropdown-toggle no-arrow">
            <span class="micon bi bi-receipt-cutoff"></span
            ><span class="mtext"> {{__('message.seller.invoice')}}</span>
          </a>
        </li>
        <li>
          <a href="seller-quotaions" class="dropdown-toggle no-arrow">
            <span class="micon bi bi-back"></span
            ><span class="mtext">  {{__('message.seller.quotation')}}</span>
          </a>
        </li>
        <li>
          <a href="customers" class="dropdown-toggle no-arrow">
            <span class="micon fa fa-users"></span
            ><span class="mtext">{{ __('message.seller.customers') }}</span>
          </a>
        </li>
        <li>
          <a href="supplier" class="dropdown-toggle no-arrow">
            <span class="micon fa fa-users"></span
            ><span class="mtext">{{ __('Suppliers') }}</span>
          </a>
        </li>
        <li>
          <a href="credit-purchase" class="dropdown-toggle no-arrow">
            <span class="micon icon-copy fa fa-diamond"></span
            ><span class="mtext"> {{ __('message.seller.credit_purchases') }}</span>
          </a>
        </li>
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle">
            <span class="micon bi bi-archive"></span
            ><span class="mtext">{{__('message.seller.credit_collection') }} </span>
          </a>
          <ul class="submenu">
            <li><a href="collect-from-invoice">{{__('From Invoices') }}</a></li>
            <li><a href="collect-from-creditSale">{{__('Credit Sales')}}</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" style="background-color: rgb(255, 123, 0)">
            <span class="micon icon-copy fa fa-send-o"></span
            ><span class="mtext">   {{__('Online Operations')}}</span>
          </a>
          <ul class="submenu">
            <li><a href="seller-publish-new"> {{__('Publish')}}</a></li>
            <li><a href="#">{{__('Marketing')}}</a></li>
          </ul>
        </li>
   
    
      </ul>
    </div>
  </div>
</div>
<div class="mobile-menu-overlay"></div>

<script>
  function removeProductNotification(product_id){
    
    // $('expired_notification'+product_id+'').remove();
  }
</script>