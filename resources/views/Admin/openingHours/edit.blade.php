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
                <h3>Modifier les heures d'ouverture pour {{$openingHour->day->name}}</h3>
            </div>
            <div class="card-body">
                <form action="{{route('opening-hours.update',[$openingHour->id])}}}" method="post">@csrf

                    @method('PUT')
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
                                        <td><input type="checkbox" name="time_morning[]" value="8:00" @if(isset($openingHour->time) && strpos($openingHour->time, '8:00') !== false) checked @endif>8:00</td>
                                        <td><input type="checkbox" name="time_morning[]" value="8:20" @if(isset($openingHour->time) && strpos($openingHour->time, '8:20') !== false) checked @endif>8:20</td>
                                        <td><input type="checkbox" name="time_morning[]" value="8:40" @if(isset($openingHour->time) && strpos($openingHour->time, '8:40') !== false) checked @endif>8:40</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">2</th>
                                        <td><input type="checkbox" name="time_morning[]" value="9:00" @if(isset($openingHour->time) && strpos($openingHour->time, '9:00') !== false) checked @endif>9:00</td>
                                        <td><input type="checkbox" name="time_morning[]" value="9:20" @if(isset($openingHour->time) && strpos($openingHour->time, '9:20') !== false) checked @endif>9:20</td>
                                        <td><input type="checkbox" name="time_morning[]" value="9:40" @if(isset($openingHour->time) && strpos($openingHour->time, '9:40') !== false) checked @endif>9:40</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">3</th>
                                        <td><input type="checkbox" name="time_morning[]" value="10:00" @if(isset($openingHour->time) && strpos($openingHour->time, '10:00') !== false) checked @endif>10:00</td>
                                        <td><input type="checkbox" name="time_morning[]" value="10:20" @if(isset($openingHour->time) && strpos($openingHour->time, '10:20') !== false) checked @endif>10:20</td>
                                        <td><input type="checkbox" name="time_morning[]" value="10:40" @if(isset($openingHour->time) && strpos($openingHour->time, '10:40') !== false) checked @endif>10:40</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">4</th>
                                        <td><input type="checkbox" name="time_morning[]" value="11:00" @if(isset($openingHour->time) && strpos($openingHour->time, '11:00') !== false) checked @endif>11:00</td>
                                        <td><input type="checkbox" name="time_morning[]" value="11:20" @if(isset($openingHour->time) && strpos($openingHour->time, '11:20') !== false) checked @endif>11:20</td>
                                        <td><input type="checkbox" name="time_morning[]" value="11:40" @if(isset($openingHour->time) && strpos($openingHour->time, '11:40') !== false) checked @endif>11:40</td>
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
                                        <td><input type="checkbox" name="time_afternoon[]" value="12:00" @if(isset($openingHour->time) && strpos($openingHour->time, '12:00') !== false) checked @endif>12:00</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="12:20" @if(isset($openingHour->time) && strpos($openingHour->time, '12:20') !== false) checked @endif>12:20</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="12:40" @if(isset($openingHour->time) && strpos($openingHour->time, '12:40') !== false) checked @endif>12:40</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td><input type="checkbox" name="time_afternoon[]" value="13:00" @if(isset($openingHour->time) && strpos($openingHour->time, '13:00') !== false) checked @endif>13:00</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="13:20" @if(isset($openingHour->time) && strpos($openingHour->time, '13:20') !== false) checked @endif>13:20</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="13:40" @if(isset($openingHour->time) && strpos($openingHour->time, '13:40') !== false) checked @endif>13:40</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td><input type="checkbox" name="time_afternoon[]" value="14:00" @if(isset($openingHour->time) && strpos($openingHour->time, '14:00') !== false) checked @endif>14:00</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="14:20" @if(isset($openingHour->time) && strpos($openingHour->time, '14:20') !== false) checked @endif>14:20</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="14:40" @if(isset($openingHour->time) && strpos($openingHour->time, '14:40') !== false) checked @endif>14:40</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td><input type="checkbox" name="time_afternoon[]" value="15:00" @if(isset($openingHour->time) && strpos($openingHour->time, '15:00') !== false) checked @endif>15:00</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="15:20" @if(isset($openingHour->time) && strpos($openingHour->time, '15:20') !== false) checked @endif>15:20</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="15:40" @if(isset($openingHour->time) && strpos($openingHour->time, '15:40') !== false) checked @endif>15:40</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td><input type="checkbox" name="time_afternoon[]" value="16:00" @if(isset($openingHour->time) && strpos($openingHour->time, '16:00') !== false) checked @endif>16:00</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="16:20" @if(isset($openingHour->time) && strpos($openingHour->time, '16:20') !== false) checked @endif>16:20</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="16:40" @if(isset($openingHour->time) && strpos($openingHour->time, '16:40') !== false) checked @endif>16:40</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">10</th>
                                        <td><input type="checkbox" name="time_afternoon[]" value="17:00" @if(isset($openingHour->time) && strpos($openingHour->time, '17:00') !== false) checked @endif>17:00</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="17:20" @if(isset($openingHour->time) && strpos($openingHour->time, '17:20') !== false) checked @endif>17:20</td>
                                        <td><input type="checkbox" name="time_afternoon[]" value="17:40" @if(isset($openingHour->time) && strpos($openingHour->time, '17:40') !== false) checked @endif>17:40</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">11</th>
                                        <td><input type="checkbox" name="time_afternoon[]" value="18:00" @if(isset($openingHour->time) && strpos($openingHour->time, '18:00') !== false) checked @endif>18:00</td>

                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Modifier</button>
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