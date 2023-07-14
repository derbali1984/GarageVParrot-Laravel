@extends('admin.layouts.master')

@section('content')


<div class="row justify-content-center">
    <div class="col-lg-10">
        @if(Session::has('message'))
        <div class="alert bg-success alert-success text-white" role="alert">
            {{Session::get('message')}}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="alert bg-danger alert-danger text-white" role="alert">
            {{Session::get('error')}}
        </div>
        @endif


        <div class="card">
            <div class="card-header">
                <h3>Modifier un véhicule d'occasion</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="{{route('vehicle.update',[$vehicle->id])}}}" method="post" enctype="multipart/form-data">@csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Marque</label>
                            <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" placeholder="Marque" value="{{$vehicle->brand}}">
                            @error('brand')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="">Modèle</label>
                            <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" placeholder="Modèle" value="{{$vehicle->model}}">
                            @error('model')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <label for="">Puissance fiscale</label>
                            <input type="text" name="fiscalPower" class="form-control @error('fiscalPower') is-invalid @enderror" placeholder="Puissance fiscale" value="{{$vehicle->fiscalPower}}">
                            @error('fiscalPower')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="">Prix</label>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Prix" value="{{$vehicle->price}}">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">



                        <div class="col-lg-6">
                            <label for="">Mise en circulation</label>
                            <select name="releaseYear" class="form-control @error('releaseYear') is-invalid @enderror" placeholder="Mise en circulation">
                                <option value="">Sélectionnez une année</option>
                                @php
                                $currentYear = date('Y');
                                $startYear = $currentYear - 50; // Change the range of years as needed
                                @endphp
                                @for ($year = $currentYear; $year >= $startYear; $year--)
                                <option value="{{ $year }}" @if ($vehicle->releaseYear == $year) selected @endif>{{ $year }}</option>
                                @endfor
                            </select>
                            @error('releaseYear')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col-lg-6">
                            <label for="">Carburant</label>
                            <input type="text" name="energy" class="form-control @error('energy') is-invalid @enderror" placeholder="Carburant" value="{{$vehicle->energy}}">
                            @error('energy')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">



                        <div class="col-lg-6">
                            <label for="">Kilométrage</label>
                            <input type="number" name="mileage" class="form-control @error('mileage') is-invalid @enderror" placeholder="Kilométrage" value="{{$vehicle->mileage}}">
                            @error('mileage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{$vehicle->description}}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>


                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <label for="">Boîte de vitesse</label>
                            <select name="gearbox" class="form-control @error('gearbox') is-invalid @enderror">
                                <option value="">Sélectionner la boîte de vitesses</option>
                                @foreach(['Automatique','Manuelle'] as $gearbox)
                                <option value="{{$gearbox}}" @if($vehicle->gearbox==$gearbox)selected @endif>{{$gearbox}}</option>
                                @endforeach

                            </select>
                            @error('gearbox')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col-lg-6">
                            <label for="">Liste des équipements</label>
                            <input type="text" name="equipment" class="form-control @error('equipment') is-invalid @enderror" placeholder="Liste des équipements" value="{{$vehicle->equipment}}">


                        </div>

                    </div>



                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <label for="">Galerie d'images</label>
                            <image-comp></image-comp>


                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2 mt-4">Modifier</button>
                    <a href="{{route('vehicle.index')}}" class="btn btn-secondary mt-4">
                        Annuler

                    </a>


                </form>
            </div>
        </div>
    </div>
</div>

@endsection