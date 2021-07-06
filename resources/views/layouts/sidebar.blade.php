<ul class="navbar-nav sidebar bg-custom sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <img src="{{ asset('img/logo.png') }}" alt="logo" style="max-width: 50%">
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::is('admin/dashboard') ? 'active':'' }}">
    <a class="nav-link" href="index.html">
      <i class="fas fa-fw fa-chart-pie"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Nav Item - Daftar Tarif -->
  <li class="nav-item {{ Request::is('admin/tarif') ? 'active':'' }}">
    <a class="nav-link" href="index.html">
      <i class="fas fa-fw fa-ticket-alt"></i>
      <span>Daftar Tarif</span></a>
  </li>

  <!-- Nav Item - Daftar Jadwal -->
  <li class="nav-item ">
    <a class="nav-link" href="index.html">
      <i class="fas fa-fw fa-book"></i>
      <span>Daftar Jadwal</span></a>
  </li>

  <!-- Nav Item - Invoice -->
  <li class="nav-item ">
    <a class="nav-link" href="index.html">
      <i class="fas fa-fw fa-users"></i>
      <span>Invoice</span></a>
  </li>

  <!-- Nav Item - Settings -->
  <li class="nav-item ">
    <a class="nav-link" href="index.html">
      <i class="fas fa-fw fa-cog"></i>
      <span>Settings</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
