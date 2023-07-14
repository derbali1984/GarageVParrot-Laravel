@extends('home.layouts.master')

@section('header')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Garage V.Parrot</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('HomePageTemplate/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('HomePageTemplate/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('HomePageTemplate/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('HomePageTemplate/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('HomePageTemplate/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('HomePageTemplate/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('HomePageTemplate/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- HomePageTemplate Main CSS File -->
    <link href="{{asset('HomePageTemplate/assets/css/style.css')}}" rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between">

            <div class="logo">

                <img src="{{asset('HomePageTemplate/assets/img/logo.jpg')}}" alt="" class="img-fluid">
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="/">Retour à la page d'accueil</a></li>

                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- #header -->
    @endsection

    @section('content')



    <div class="card border-0 h-100 ">
        <div class="card-body">
            <div class="row">
                @foreach (explode(',', $vehicle->image) as $index => $imageName)
                <div class="col-lg-4 col-md-6 mb-4">
                    <img src="{{ asset('vehicles_images/'. $imageName) }}" class="card-img-top w-100 h-100" alt="">
                </div>
                @endforeach
            </div>

            <br>
            @php
            $titreannonce = "Vente de " . $vehicle->brand . " " . $vehicle->model . " - " . $vehicle->releaseYear . " - " . $vehicle->mileage . " km - " . $vehicle->price . " €";
            @endphp

            <p><span class="titreannonce">{{ $titreannonce }}</span></p>

            <h6 class="section-heading">Description:</h6>
            <p style="font-family:'Courier New', Courier, monospace;">{{$vehicle->description}}</p>

            <h6 class="section-heading">Caractéristiques:</h6>
            <table>
                <tbody>
                    <tr>
                        <th>Marque</th>
                        <td>{{ $vehicle->brand }}</td>
                    </tr>
                    <tr>
                        <th>Modéle</th>
                        <td>{{ $vehicle->model }}</td>
                    </tr>
                    <tr>
                        <th>Mise en circulation</th>
                        <td>{{ $vehicle->releaseYear }}</td>
                    </tr>
                    <tr>
                        <th>Puissance fiscale</th>
                        <td>{{ $vehicle->fiscalPower }}</td>
                    </tr>
                    <tr>
                        <th>Kilométrage</th>
                        <td>{{ $vehicle->mileage }} KM</td>
                    </tr>
                    <tr>
                        <th>Carburant</th>
                        <td>{{ $vehicle->energy }}</td>
                    </tr>
                    <tr>
                        <th>Boîte de vitesse</th>
                        <td>{{ $vehicle->gearbox }}</td>
                    </tr>
                </tbody>
            </table>

            <h6 class="section-heading">Équipement et options installées:</h6>
            <ul class="custom-list">
                @foreach (explode(',', $vehicle->equipment) as $eq)

                <li> <i class="bi bi-check2-circle"></i>
                    {{$eq}}
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <section id="contact">
        <div class="container-fluid " data-aos="fade-up">

            <div class="section-header">
                <h3>Contactez-nous</h3>
            </div>

            <div class="row">

                <div class="col-lg-6">
                    <div class="map mb-4 mb-lg-0">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 340px;" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-5 info">
                            <i class="bi bi-geo-alt"></i>
                            <p>A108 Adam Street, NY 535022</p>
                        </div>
                        <div class="col-md-4 info">
                            <i class="bi bi-envelope"></i>
                            <p>team@garagevparrot.com</p>
                        </div>
                        <div class="col-md-3 info">
                            <i class="bi bi-phone"></i>
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div>

                    <div class="form">
                        <!-- <form action="{{route('contact.send')}}" method="post" enctype="multipart/form-data">@csrf -->
                        <form action="" method="post" enctype="multipart/form-data">@csrf
   
                        <div class="row">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" value="{{ $titreannonce }}" id="subject" style="background-color: #f8f9fa; cursor: not-allowed; opacity: 0.6;">
                                </div>

                                <div class="form-group col-lg-6 mt-3">
                                    <input type="text" name="firstName" class="form-control  @error('firstName') is-invalid @enderror" id="firstName" placeholder="Votre nom" required>
                                    @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-6 mt-3 ">
                                    <input type="text" class="form-control @error('lastName') is-invalid @enderror " name="lastName" id="lastName" placeholder="Votre prénom" required>
                                    @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">

                                <div class="form-group col-lg-6 mt-3">
                                    <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" placeholder="Votre adresse e-mail" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 mt-3">
                                    <input type="text" name="tel" class="form-control @error('tel') is-invalid @enderror" id="tel" placeholder="Votre numéro de téléphone" required>
                                    @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <textarea class="form-control @error('Message') is-invalid @enderror" name="Message" rows="5" placeholder="Message" required></textarea>
                                @error('Message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @if(Session::has('message'))
                            <div class="alert bg-success alert-success text-white mt-3" role="alert">
                                {{Session::get('message')}}
                            </div>
                            @endif
                            <div class="text-center mt-3"><button class="btn btn-primary" type="submit">Envoyer</button></div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <style>
        .custom-list {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .custom-list li {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
        }


        .titreannonce {
            font-size: 30px;
            font-weight: 400;
            margin: 2px;
            font-family: sans-serif;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        table th {
            text-align: left;
        }

        table th,
        table td {
            padding: 5px;
            border-bottom: 1px solid #ddd;
        }

        ul {
            margin: 0;
            padding-left: 20px;
        }


        .card {
            max-width: 60%;
            margin-top: 50px;
            padding: 20px;
            margin-left: 50px;
        }

        .section-heading {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            color: #54afaf;
        }
    </style>
    @endsection