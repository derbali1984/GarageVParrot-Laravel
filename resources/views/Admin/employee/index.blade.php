@extends('admin.layouts.master')

@section('content')



<div class="row">
    <div class="col-md-12">
        @if(Session::has('message'))
        <div class="alert bg-success alert-success text-white" role="alert">
            {{Session::get('message')}}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Liste des employés</h3>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nom et prénom</th>
                                <th>Adresse e-mail</th>
                                <th>Numéro de téléphone</th>
                                <th>Adresse</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($users)>0)
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone_number}}</td>
                                <td>{{$user->address}}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="#" data-toggle="modal" data-target="#exampleModal{{$user->id}}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{route('employee.edit',[$user->id])}}"><i class="fas fa-edit" style="color: #fbb042;"></i></a>

                                        <a href="{{route('employee.show',[$user->id])}}">
                                            <i class="fas fa-trash" style="color: red;"></i>
                                        </a>

                                    </div>
                                </td>


                            </tr>

                            <!-- View Modal -->
                            @include('admin.employee.modal')



                            @endforeach

                            @else
                            <td>Aucun utilisateur à afficher</td>
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection