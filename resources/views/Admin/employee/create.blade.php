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
                <h3>Ajouter un Employé</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">@csrf

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Nom et prénom</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nom et prénom" value="{{old('name')}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="">Adresse e-mail</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Adresse e-mail" value="                   {{old('email')}}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <label for="">Mot de passe</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mot de passe">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="">Sexe</label>
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                <option value="">Sélectionner</option>
                                <option value="Masculin">Masculin</option>
                                <option value="Féminin">Féminin</option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-lg-6">
                            <label for="">Adresse</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Adresse" value="{{old('address')}}">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Numéro de téléphone</label>
                                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Numéro de téléphone" value="{{old('phone_number')}}">
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image</label>
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

                        <div class="col-md-6">
                            <label>Rôle</label>
                            <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                <option value="">Sélectionner</option>
                                @foreach(App\Models\Role::all() as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach


                            </select>
                            @error('role_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary mr-2">Créer</button>

                    <a href="" class="btn btn-secondary">
                        Annuler

                    </a>


                </form>
            </div>
        </div>
    </div>
</div>


@endsection