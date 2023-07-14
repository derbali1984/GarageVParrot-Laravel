@extends('admin.layouts.master')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10">
        @if(Session::has('message'))
        <div class="alert bg-success alert-success text-white" role="alert">
            {{Session::get('message')}}
        </div>
        @endif

        @if (Session::has('error'))
        <div class="alert bg-danger alert-danger text-white" role="alert">
            {{ Session::get('error') }}
        </div>
        @endif


        <div class="card">
            <div class="card-header">
                <h3>Créer les heures d'ouverture</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('opening-hours.store') }}" method="post">@csrf
                    <div class="card">
                        <div class="card-header">
                            Choisissez le jour
                        </div>
                        <div class="card-body">
                            <select class="form-control @error('day') is-invalid @enderror" name="day">
                                <option value="">Choisissez</option>
                                @foreach(App\Models\Day::all() as $day)
                                <option value="{{ $day->name }}">{{ $day->name }}</option>
                                @endforeach
                            </select>

                            </select>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Choisissez l'heure du matin
                            <span style="margin-left: 600px">Cocher/décocher
                                <input type="checkbox" onclick=" for(c in document.getElementsByName('time_morning[]')) document.getElementsByName('time_morning[]').item(c).checked=this.checked">
                            </span>


                        </div>
                        <div class="card-body">
                            <table class="table table-striped">


                                <tbody>

                                    <tr>
                                        <th scope="row">1</th>
                                        <td><input type="checkbox" name="time_morning[]" value="8:00">8:00</td>
                                        <td><input type="checkbox" name="time_morning[]" value="8:20">8:20</td>
                                        <td><input type="checkbox" name="time_morning[]" value="8:40">8:40</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">2</th>
                                        <td><input type="checkbox" name="time_morning[]" value="9:00">9:00</td>
                                        <td><input type="checkbox" name="time_morning[]" value="9:20">9:20</td>
                                        <td><input type="checkbox" name="time_morning[]" value="9:40">9:40</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">3</th>
                                        <td><input type="checkbox" name="time_morning[]" value="10:00">10:00</td>
                                        <td><input type="checkbox" name="time_morning[]" value="10:20">10:20</td>
                                        <td><input type="checkbox" name="time_morning[]" value="10:40">10:40</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">4</th>
                                        <td><input type="checkbox" name="time_morning[]" value="11:00">11:00</td>
                                        <td><input type="checkbox" name="time_morning[]" value="11:20">11:20</td>
                                        <td><input type="checkbox" name="time_morning[]" value="11:40">11:40</td>
                                    </tr>


                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Choisissez l'horaire de l'après-midi
                            <span style="margin-left: 600px">Cocher/décocher
                                <input type="checkbox" onclick=" for(c in document.getElementsByName('time_afternoon[]')) document.getElementsByName('time_afternoon[]').item(c).checked=this.checked">
                            </span>
                        </div>

                        <div class="card-body">

                            <table class="table table-striped">


                                <tbody>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td><input type="checkbox" name="time_afternoon[]" value="12:00">12:00</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="12:20">12:20</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="12:40">12:40</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td><input type="checkbox" name="time_afternoon[]" value="13:00">13:00</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="13:20">13:20</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="13:40">13:40</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td><input type="checkbox" name="time_afternoon[]" value="14:00">14:00</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="14:20">14:20</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="14:40">14:40</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td><input type="checkbox" name="time_afternoon[]" value="15:00">15:00</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="15:20">15:20</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="15:40">15:40</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td><input type="checkbox" name="time_afternoon[]" value="16:00">16:00</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="16:20">16:20</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="16:40">16:40</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">10</th>
                                        <td><input type="checkbox" name="time_afternoon[]" value="17:00">17:00</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="17:20">17:20</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="17:40">17:40</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">11</th>
                                        <td><input type="checkbox" name="time_afternoon[]" value="18:00">18:00</td>

                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Créer</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<style type="text/css">
    input[type="checkbox"] {
        zoom: 1.1;

    }

    body {
        font-size: 18px;
    }
</style>



@endsection