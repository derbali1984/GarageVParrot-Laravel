@extends('admin.layouts.master')

@section('content')


<div class="row justify-content-center">
    <div class="col-lg-10">
        @if(Session::has('message'))
        <div class="alert bg-success alert-success text-white" role="alert">
            {{Session::get('message')}}
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Confirmation de la suppression</h3>
            </div>
            <div class="card-body">
                <img src="{{asset('employee_admin_images')}}/{{$user->image}}" width="120">
                <h2>{{$user->name}}</h2>
                <form class="forms-sample" action="{{route('employee.destroy',[$user->id])}}" method="post">@csrf
                    @method('DELETE')

                    <div class="card-footer">
                        <button type="submit" class="btn btn-danger mr-2">Confrimer</button>
                        <a href="{{route('employee.index')}}" class="btn btn-secondary">
                            Annuler

                        </a>
                    </div>



                </form>
            </div>
        </div>
    </div>
</div>


@endsection