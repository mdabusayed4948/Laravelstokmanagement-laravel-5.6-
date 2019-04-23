  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('public/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
       <!-- Optionally, you can add icons to the links -->
         <li class="header {{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
         @role('Administer')
        
        <li class="{{ Request::is('roles*') ? 'active' : '' }}"><a href="{{ route('roles.index') }}"><i class="fa fa-link"></i> <span>Manage Roles</span></a></li>
        <li class="{{ Request::is('permissions*') ? 'active' : '' }}" ><a href="{{ route('permissions.index') }}"><i class="fa fa-link"></i> <span>Manage Permissions</span></a></li>
          <li class="treeview {{ Request::is('users*') ? 'active' : '' }}">
          <a href="#"><i class="fa fa-link"></i> <span>Manage Users</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('users.create') }}">Create User</a></li>
            <li><a href="{{ route('users.index') }}">Users List</a></li>
          </ul>
        </li>
        @endrole
        

        <li class="treeview {{ Request::is('categories*') ? 'active' : '' }}">
          <a href="#"><i class="fa fa-link"></i> <span>Manage Categories</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="{{ route('categories.create') }}">Create Category</a></li>
            <li><a href="{{ route('categories.index') }}">Category List</a></li>
          </ul>
        </li>

        <li class="treeview {{ Request::is('brands*') ? 'active' : '' }}">
          <a href="#"><i class="fa fa-link"></i> <span>Manage Brands</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('brands.create') }}">Create Brand</a></li>
           
            <li><a href="{{ route('brands.index') }}">Brand List</a></li>
          </ul>
        </li>

        <li class="treeview {{ Request::is('products*') ? 'active' : '' }}">
          <a href="#"><i class="fa fa-link"></i> <span>Manage Products</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('products.create') }}">Create Products</a></li>
           
            <li><a href="{{ route('products.index') }}">Products List</a></li>
          </ul>
        </li>

        <li class="treeview {{ Request::is('orders*') ? 'active' : '' }}">
          <a href="#"><i class="fa fa-link"></i> <span>Manage Orders</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('orders.create') }}">Create Order</a></li>
           
            <li><a href="{{ route('orders.index') }}">Order List</a></li>
          </ul>
        </li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>