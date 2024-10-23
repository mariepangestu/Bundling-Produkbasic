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

    {{-- <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>PENJUALAN</span>
        </a>
        <div id="collapse" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="">Data Produksi</a>
                <a class="collapse-item" href="">Data Biaya Produksi</a>
                <a class="collapse-item" href="{">Data Bahan Baku Produksi</a>
                <a class="collapse-item" href="">Data Stok Produksi</a>
            </div>
        </div>
    </li> --}}
{{-- <li class="nav-item active">
        <a class="nav-link" href="{{ route('produksi') }}"> 
            <i class="fas fa-sign-language"></i>
            <span>Data Produksi</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('biayaproduksi') }}"> 
            <i class="fas fa-money-bill-alt"></i>
            <span>Data Biaya Produksi</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('bahanbaku') }}"> 
            <i class="fas fa-sign-language"></i>
            <span>Data Bahan Baku Produksi</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('stokproduksi') }}"> 
            <i class="fas fa-box"></i>
            <span>Data Stok Produksi</span></a>
    </li>  --}}    
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('product.index') }}"> 
            <i class="fas fa-cube"></i>
            <span>PRODUK BASIC</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('color.index') }}"> 
            <i class="fas fa-palette"></i>
            <span>WARNA PRODUK</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('transaction.index') }}"> 
            <i class="fas fa-receipt"></i>
            <span>PENJUALAN</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href=""> 
            <i class="fas fa-chart-area"></i>
            <span>PERAMALAN</span></a>
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