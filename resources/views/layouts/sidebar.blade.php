<!-- Sidebar -->
<ul class="navbar-nav info-color-dark sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-atlas"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Gestión de condóminio y (gca)</div>
  </a>

  <!-- Divider -->

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="{{ route('home') }}">
      <i class="fas fa-fw fa-lg fa-tachometer-alt"></i>
      <span>Inicio</span></a>
  </li>
 <!-- Heading -->
  <div class="sidebar-heading mt-2">
   Gestión
  </div>

  <hr class="sidebar-divider d-none d-md-block">

   <!-- Heading -->
  <div class="sidebar-heading mt-3">
   Control Residencial
  </div>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('residence.index') }}">
     <span><i class="fas fa-building fa-lg"></i>  Conjunto residencial</span>
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
    <i class="fas fa-fw fa-cog fa-lg"></i>
      <span>Gástos Mensuales</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Gestión:</h6>
        <a class="collapse-item" href="{{ route('mon-expenditure.index') }}">Lista</a>
        <a class="collapse-item" href="{{ route('mon-expenditure.create') }}">Registrar</a>
        <a class="collapse-item" href="#"> Cargar Inventario</a>
      </div>
    </div>
  </li>

  

    <!-- Heading -->
  <div class="sidebar-heading mt-3">
   Control Copropietarios
  </div>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('co-owner.index') }}">
       <i class="fas fa-users fa-lg"></i>
      <span>Copropietario</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog fa-lg"></i>
      <span>Saldo</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Gestión:</h6>
        <a class="collapse-item" href="{{ route('balance.index') }}">Lista</a>
        <a class="collapse-item" href="{{ route('balance.create') }}">Registrar</a>
      </div>
    </div>
  </li>
   
  
 
  <!--
  <div class="sidebar-heading">
    Personal
  </div>

  

   
    // Nav Item - Charts 
  <li class="nav-item">
    <a class="nav-link" href="charts.html">
      <i class="fas fa-fw fa-chart-area fa-lg"></i>
      <span>Carga</span></a>
  </li>
    -->
    <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul> 
