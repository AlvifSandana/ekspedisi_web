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
  <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
      <i class="fas fa-fw fa-chart-pie"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Nav Item - Daftar Tarif -->
  <li class="nav-item {{ Request::is('admin/tarif*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.tarif.index') }}" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
    aria-controls="collapseOne">
      <i class="fas fa-fw fa-ticket-alt"></i>
      <span>Daftar Tarif</span></a>
      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Tarif:</h6>
          <a class="collapse-item" href="{{ route('admin.tarif.index') }}">Supir</a>
          <a class="collapse-item" href="{{ route('admin.tarif.index') }}">Pengirim</a>
        </div>
      </div>
  </li>

  <!-- Nav Item - Daftar Jadwal -->
  <li class="nav-item {{ Request::is('admin/jadwal*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-book"></i>
      <span>Daftar Jadwal</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Jadwal:</h6>
        <a class="collapse-item" href="{{ route('admin.jadwal.index') }}">Supir</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Transaksi -->
  <li class="nav-item {{ Request::is('admin/supir*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.supir.index') }}">
      <i class="fas fa-fw fa-users"></i>
      <span>Supir</span></a>
  </li>

  <!-- Nav Item - Pesanan -->
  <li class="nav-item {{ Request::is('admin/transaksi*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.transaksi.index') }}">
      <i class="fas fa-fw fa-money-bill"></i>
      <span>Pengirim</span></a>
  </li>

  <!-- Nav Item - Invoice -->
  <li class="nav-item {{ Request::is('admin/invoice*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.invoice.index') }}">
      <i class="fas fa-fw fa-file-invoice-dollar"></i>
      <span>Pesanan</span></a>
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
