@extends('Admin.layouts.Master')

@section('content')

@if (auth()->user()->role->name == 'Employé')

<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">



        <div class="container-fluid">

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
            </div>

            <div class="row">

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Véhicules d'occasion</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\Vehicle::count()}}</div>
                                </div>
                                <div class="col-auto">

                                    <i class="fas fa-car fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Témoignages approuvés</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\Testimony::where('approved',1)->count()}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Témoignages en attente</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\Testimony::where('approved',0)->count()}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

</body>

</html>





@elseif (auth()->user()->role->name == 'Admin')

<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">



        <div class="container-fluid">

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
            </div>

            <div class="row">

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Employés</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\User::count()}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Services
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\Service::count()}}</div>

                                </div>
                                <div class="col-auto">
                                    <i class="	fas fa-car-crash fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



        </div>

    </div>

</div>

</div>




</body>

</html>
@endif

@endsection