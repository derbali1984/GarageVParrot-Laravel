<body id="page-top">
    <div id="app">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

                    <div class="sidebar-brand-text ">Garage V.Parrot</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="/dashboard">
                        <i class="fas fa-chart-line"></i>
                        <span>Tableau de bord</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Navigation
                </div>
                @if(auth()->check() && auth()->user()->role->name === 'Admin')
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmployee" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-user-cog"></i>
                        <span>Employés</span>
                    </a>
                    <div id="collapseEmployee" class="collapse" aria-labelledby="headingEmployee" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{route('employee.create')}}">Créer</a>
                            <a class="collapse-item" href="{{route('employee.index')}}">Liste</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseService" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-car-crash"></i>
                        <span>Services</span>
                    </a>
                    <div id="collapseService" class="collapse" aria-labelledby="headingService" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{route('service.create')}}">Créer</a>
                            <a class="collapse-item" href="{{route('service.index')}}">Liste</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOpening" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-clock"></i>
                        <span>Horaires d'ouvertures</span>
                    </a>
                    <div id="collapseOpening" class="collapse" aria-labelledby="headingOpening" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{route('opening-hours.create')}}">Créer</a>
                            <a class="collapse-item" href="{{route('opening-hours.index')}}">Liste</a>
                        </div>
                    </div>
                </li>
                @elseif(auth()->check() && auth()->user()->role->name === 'Employé')

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVehicle" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-car"></i>
                        <span>Véhicules d'occasion </span>
                    </a>
                    <div id="collapseVehicle" class="collapse" aria-labelledby="headingVehicle" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{route('vehicle.create')}}">Créer</a>
                            <a class="collapse-item" href="{{route('vehicle.index')}}">Liste</a>
                        </div>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTestimony" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-comments"></i>
                        <span>Témoignages</span>
                    </a>
                    <div id="collapseTestimony" class="collapse" aria-labelledby="headingVehicle" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{route('testimony.index')}}">Liste</a>
                        </div>
                    </div>
                </li>
                @endif




            </ul>
            <!-- End of Sidebar --><!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{strtoupper(Auth()->user()->name)}}</span>
                                    <img class="img-profile rounded-circle" src="{{asset('employee_admin_images/'.Auth()->user()->image)}}">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">


                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> {{ __('Se déconnecter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->