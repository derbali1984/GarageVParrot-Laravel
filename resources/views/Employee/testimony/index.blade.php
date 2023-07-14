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
                <h3>Liste des témoignages</h3>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Commentaire</th>
                                <th>Notation</th>

                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($testimonies)>0)
                            @foreach($testimonies as $testimony)
                            <tr>
                                <td>{{$testimony->name}}</td>
                                <td>{{$testimony->comment}}</td>
                                <td>{{$testimony->rating}}</td>

                                <td>
                                    <div class="table-actions">
                                        @if ($testimony->approved == 0)
                                        <form action="{{ route('testimony.allow', $testimony->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-warning">Approuver</button>
                                        </form>
                                        @else
                                        <button class="btn btn-success" disabled>Approuvé</button>
                                        @endif
                                    </div>

                                </td>


                            </tr>


                            @endforeach

                            @else
                            <td>Aucun témoignage approuvé à afficher</td>
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection