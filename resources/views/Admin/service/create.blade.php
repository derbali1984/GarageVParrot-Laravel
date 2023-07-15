@extends('Admin.layouts.Master')

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
                <h3>Ajouter un Service</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="{{route('service.store')}}" method="post" enctype="multipart/form-data">@csrf

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Nom</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nom" value="{{old('name')}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-lg-6">

                            <label for="">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <label for="">Image</label>
                            <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror" placeholder="Télécharger une image" name="image">
                            <span class="input-group-append">

                            </span>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                    </div>



                    <button type="submit" class="btn btn-primary mr-2 mt-4">Créer</button>

                    <a href="" class="btn btn-secondary mt-4">
                        Annuler

                    </a>


                </form>
            </div>
        </div>
    </div>
</div>


@endsection