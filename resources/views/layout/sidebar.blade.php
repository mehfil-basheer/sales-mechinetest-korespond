<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Sales Report</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{ route('items.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  Items   
                  </p>
                </a>
              </li>
          <li class="nav-item">
            <a href="{{ route('sales.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
             sales
               
              </p>
            </a>
          </li>
   
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>