<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>DASHBOARD</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>PRODUK</span>
        </a>
        <div id="collapse" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('product.index') }}">PRODUK BASIC</a>
                <a class="collapse-item" href="{{ route('color.index') }}">WARNA</a>
            </div>
        </div>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('transaction.index') }}"> 
            <i class="fas fa-receipt"></i>
            <span>TRANSAKSI</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href=""> 
            <i class="fas fa-chart-area"></i>
            <span>POLA PENJUALAN</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href=""> 
            <i class="fas fa-sign-out-alt"></i>
            <span>LOGOUT</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>