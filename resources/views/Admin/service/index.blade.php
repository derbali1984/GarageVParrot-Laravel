@extends('Admin.layouts.Master')

@section('content')
<style>
    .table-service-thumb {
        width: 40px;
        /* Adjust the width to your desired size */
        height: auto;
        /* Maintain aspect ratio */
        border-radius: 30%;
        /* Make it circular */
    }
</style>


<div class="row">
    <div class="col-md-12">
        @if(Session::has('message'))
        <div class="alert bg-success alert-success text-white" role="alert">
            {{Session::get('message')}}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Liste des services</h3>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($services)>0)
                            @foreach($services as $service)
                            <tr>
                                <td>{{$service->name}}</td>
                                <td>{{$service->description}}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="#" data-toggle="modal" data-target="#exampleModal{{$service->id}}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{route('service.edit',[$service->id])}}"><i class="fas fa-edit" style="color: #fbb042;"></i></a>

                                        <a href="{{route('service.show',[$service->id])}}">
                                            <i class="fas fa-trash" style="color: red;"></i>
                                        </a>

                                    </div>
                                </td>


                            </tr>

                            <!-- View Modal -->
                            @include('admin.service.modal')



                            @endforeach

                            @else
                            <td>Aucun service à afficher</td>
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection