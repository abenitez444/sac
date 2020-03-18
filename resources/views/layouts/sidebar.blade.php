<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-atlas"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SIGESPRO</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="{{ route('home') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Inicio</span></a>
  </li>

  <!-- Divider -->
  <!-- Heading -->
  <div class="sidebar-heading">
   Personal
  </div>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('employee.index') }}">
       <i class="fas fa-user fa-lg"></i>
      <span>Empleado</span></a>
  </li>
 
  <div class="sidebar-heading">
    Gentión
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog fa-lg"></i>
      <span>Inventario</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Gestion de inventario:</h6>
        <a class="collapse-item" href="{{ route('index') }}">Lista</a>
        <a class="collapse-item" href="{{ route('create') }}">Registrar</a>
        <a class="collapse-item" href="{{ route('upload') }}">Cargar Inventario</a>
      </div>
    </div>
  </li>
    <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Proyectos
  </div>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('project.index') }}">
      <i class="fas fa-fw fa-chart-area fa-lg"></i>
      <span>Gestión de Proyectos</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('employee.index') }}">
      <i class="fas fa-fw fa-users fa-lg"></i>
      <span>Gestión de Personal</span></a>
  </li>
  <!-- Nav Item - Pages Collapse Menu -->


  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Otros
  </div>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="charts.html">
      <i class="fas fa-fw fa-chart-area fa-lg"></i>
      <span>Carga</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>