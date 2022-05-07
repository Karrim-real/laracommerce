<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Limbo Shop</a>
  <div class="navbar-nav">
  <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">
         <span class="fa fa-users"></span> <h4>{{Auth()->user()->name}}</h4>
        </a>
    </div>
  </div>
  <div class="navbar-nav">
  <div class="nav-item text-nowrap">

      <a class="nav-link px-3" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
           {{ __('Logout') }}
        </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>

    </div>
  </div>
</header>
<style>
    .active{
        border: 3px solid rgb(12, 158, 56);
        border-radius: 20%;
        padding: 3px;
        margin: 5px 5px;
        background-color: rgb(194, 218, 154);
        color: white;
    }
</style>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }} ">
            <a class="nav-link " aria-current="page" href="{{ url('admin/dashboard') }}">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item {{ Request::is('products') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ url('products') }}">
              <span data-feather="file"></span>
              Products
            </a>
          </li>
          <li class="nav-item {{ Request::is('product/create') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ url('product/create') }}">
              <span data-feather="file"></span>
              Add-product
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/category') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ url('admin/category') }}">
              <span data-feather="shopping-cart"></span>
              Category
            </a>
          </li>
          <li class="nav-item {{ Request::is('add-category') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ url('add-category') }}">
              <span data-feather="shopping-cart"></span>
              Add Category
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Order
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Carts Items
            </a>
          </li>
        </ul>
      </div>
    </nav>
