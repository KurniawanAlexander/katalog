<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-coffee"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Coffee Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Menu
    </div>

    <!-- Nav Item - Kategori -->
    <li class="nav-item">
        <a class="nav-link" href="/categories">
            <i class="fas fa-fw fa-tags"></i>
            <span>Kategori</span>
        </a>
    </li>

    <!-- Nav Item - Menu -->
    <li class="nav-item">
        <a class="nav-link" href="/menus">
            <i class="fas fa-fw fa-utensils"></i>
            <span>Menu</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Tables (opsional) -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/tables') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
