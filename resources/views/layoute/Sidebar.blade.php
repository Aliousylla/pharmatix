<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-0">
            <i class="fa fa-plus  fs-1 text-center  border-light rounded-5 p-3" aria-hidden="true"></i>
            
        </div>
        <div class="sidebar-brand-text mx-3">Pharmatix <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ asset('dashboard') }}">
            <i class="fa fa-home fa-fw"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ asset('medicaments') }}">
            <i class="fa fa-tags"></i>
            <span>Produit</span></a>
    </li>
    

    <li class="nav-item">
        <a class="nav-link" href="{{ asset('commandes') }}">
            <i class="fa fa-shopping-cart"></i>
            <span>Commende</span></a>
    </li>
    
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ asset('inventaires') }}">
            <i class="fa fa-archive"></i>
            <span>Inventaire</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ asset('ventes') }}">
            <i class="fa fa-database"></i>
            <span>Transaction</span></a>
    </li>
    <!-- Divider -->
    

    <!-- Heading -->
    

    <!-- Nav Item - Pages Collapse Menu -->
   

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ asset('fournisseurs') }}">
            <i class="fa fa-truck"></i>
            <span>Fournisseur</span></a>
    </li>
    
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fa fa-users"></i>
            <span>Emploiye</span></a>
    </li>
    

    <li class="nav-item">
        <a class="nav-link" href="{{ asset('profile') }}">
            <i class="fa fa-cog"></i>
            <span>Comptes</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    

</ul>