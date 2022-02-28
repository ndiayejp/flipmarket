<?php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
?>

<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar">
    <div class="user-profile">
      <div class="ulogo">
        <a href="{{route('admin.dashboard')}}">
          <!-- logo for regular state and mobile devices -->
          <div class="d-flex align-items-center justify-content-center">
            <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
            <h3><b>Market</b> Shop</h3>
          </div>
        </a>
      </div>
    </div>

    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="{{ $route == 'admin.dashboard' ? 'active' : ''}} ">
        <a href="{{ route('admin.dashboard') }}">
          <i data-feather="pie-chart"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="treeview {{ $route == 'brands.index' ? 'active' : ''}} ">
        <a href="#">
          <i class="fa fa-bandcamp"></i>
          <span>Brands</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ $route == 'brands.index' ? 'active' : ''}}"><a href="{{route('brands.index')}}"><i class="ti-more"></i>All brands</a></li>
         </ul>
      </li>

      <li class="treeview {{ $route == 'categories.index' ? 'active' : ''}} ">
        <a href="#">
          <i class="fa fa-folder"></i> <span>Categories</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ $route == 'categories.index' ? 'active' : ''}}">
            <a href="{{route('categories.index')}}"><i class="ti-more"></i>All categories</a>
          </li>
          <li class="{{ $route == 'subcategories.index' ? 'active' : ''}}"><a href="{{route('subcategories.index')}}"><i class="ti-more"></i>All Subcategories</a></li>
          <li class="{{ $route == 'subsubcategories.index' ? 'active' : ''}}"><a href="{{route('subsubcategories.index')}}"><i
                class="ti-more"></i>All Sub-Subcategories</a></li>
        </ul>
      </li>

      <li class="treeview {{ $route == 'products.index' ? 'active' : ''}} "" >
        <a href="#">
          <i data-feather="file"></i>
          <span>Products</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('products.create')}}"><i class="ti-more"></i>Add product</a></li>
          <li><a href="{{route('products.index')}}"><i class="ti-more"></i>Manage product</a></li>

        </ul>
      </li>
      <li class="header nav-small-cap">User Interface</li>
      <li class="treeview">
        <a href="#">
          <i data-feather="grid"></i>
          <span>Components</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
          <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
          <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
          <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>

        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i data-feather="credit-card"></i>
          <span>Cards</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
          <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
        </ul>
      </li>
    </ul>
  </section>

  <div class="sidebar-footer">
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
      aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
    <!-- item-->
    <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
        class="ti-email"></i></a>
    <!-- item-->
    <a href="{{route('admin.logout')}}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
        class="ti-lock"></i></a>
  </div>
</aside>
