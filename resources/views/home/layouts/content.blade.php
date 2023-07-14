<!-- ======= Hero Section ======= -->
<section id="hero" class="clearfix">
    <div class="container" data-aos="fade-up">

        <div class="hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{asset('HomePageTemplate/assets/img/hero-img.png')}}" alt="" class="img-fluid">
        </div>

        <div class="hero-info" data-aos="zoom-in" data-aos-delay="100">
            <h2>Réparation et vente de véhicules d'occasion,<br><span> notre expertise</span><br> à votre service!</h2>
            <div>
                <a href="/login" class="btn-get-started scrollto">Connexion (Équipe)</a>
                <a href="#services" class="btn-services scrollto">Notre Services</a>
            </div>
        </div>

    </div>
</section><!-- End Hero Section -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h3>À propos de nous</h3>
                <p>Notre garage dédié à la réparation et à la vente de véhicules d'occasion est votre destination de confiance pour tous vos besoins automobiles.</p>
            </header>
            <div class="row about-container">
                <div class="col-lg-6 content order-lg-1 order-2">
                    <p>Que vous ayez besoin de réparer votre véhicule actuel ou de trouver une voiture d'occasion fiable, nous sommes là pour vous accompagner.</p>
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bi bi-hammer"></i></div>
                        <h4 class="title"><a href="">Réparation</a></h4>
                        <p class="description">Notre équipe expérimentée de mécaniciens qualifiés est prête à résoudre tous les problèmes mécaniques que votre voiture peut rencontrer. Nous mettons en œuvre notre expertise et utilisons les derniers équipements pour assurer des réparations de haute qualité. Votre sécurité et votre satisfaction sont notre priorité absolue.</p>
                    </div>
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bi bi-car-front"></i></div>
                        <h4 class="title"><a href="">Vente</a></h4>
                        <p class="description">Si vous êtes à la recherche d'une voiture d'occasion, nous vous proposons un large choix de véhicules soigneusement sélectionnés. Chaque voiture dans notre inventaire est rigoureusement inspectée pour assurer sa qualité et sa fiabilité.</p>
                    </div>
                </div>
                <div class="col-lg-6 background order-lg-2" data-aos="zoom-in">
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/woman-car-mechanic-3865864-3236911.png" class="img-fluid large-image" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="section-bg">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h3>Services</h3>
                <p>Proposez-vous des services de réparation automobile de qualité ? Faites confiance à notre garage pour prendre soin de votre véhicule et résoudre tous les problèmes mécaniques avec expertise et professionnalisme.</p>
            </header>

            <div class="row justify-content-center" style="display: flex; flex-wrap: wrap; margin-top: 20px;">
                @if(count($services) > 0)
                @foreach ($services as $service)
                <div class="col-md-6 col-lg-4 mb-4" data-aos="zoom-in" data-aos-delay="100" style="display: flex;">
                    <div class="card" style="display: flex; flex-direction: column; height: 100%;">
                        <div class="image" style="flex: 0 0 auto;">
                            <img src="{{ asset('services_images/' . $service->image) }}" alt="Service Image" style="width: 100%; height: auto;">
                        </div>
                        <div class="content" style="flex: 1 0 auto; padding: 20px;">
                            <h4 class="title" style="margin-top: 0;"><a href="">{{$service->name}}</a></h4>
                            <p class="description" style="margin-bottom: 0;">{{$service->description}}</p>
                        </div>
                    </div>
                </div>
                @endforeach

                @else
                <div class="col-md-6 col-lg-4 mb-4" data-aos="zoom-in" data-aos-delay="100" style="display: flex;">
                    <p>Aucun service disponible.</p>
                </div>
                @endif
            </div>


        </div>
    </section>
    <!-- End Services Section -->


    <!-- End Why Us Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="clearfix">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h3 class="section-title">Véhicules d’occasion</h3>
            </header>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12">
                    <ul id="portfolio-flters">
                        <li data-filter=".filter-app">
                            Kilométrage
                            <input type="range" class="form-range" id="customRange1" min="50000" max="160000" value="50000" step="1000">
                            <span id="startMileage">50000</span>Km&nbsp;&nbsp;&nbsp;-
                            <span id="endMileage">160000</span>Km
                        </li>
                        <li data-filter=".filter-app">
                            Prix
                            <input type="range" class="form-range" id="customRange2" min="5000" max="40000" value="5000" step="1000">
                            <span id="startPrice">5,000</span>€&nbsp;&nbsp;&nbsp;-
                            <span id="endPrice">40,000</span>€
                        </li>
                        <li data-filter=".filter-app">
                            Années
                            <input type="range" class="form-range" id="customRange3" min="2001" max="2022" value="2001" step="1">
                            <span id="startYear">2001</span>&nbsp;&nbsp;&nbsp;-
                            <span id="endYear">2022</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                @if(count($vehicles) > 0)
                @foreach ($vehicles as $vehicle)
                @php
                $images = explode(',', $vehicle->image); // Split the image column by comma
                $firstImage = trim($images[0]); // Get the first image
                @endphp

                <div class="col-lg-4 col-md-6 portfolio-item filter-app" data-price="{{ $vehicle->price }}" data-mileage="{{ $vehicle->mileage }}" data-year="{{ $vehicle->releaseYear }}">
                    <div class="portfolio-wrap">
                        <div class="price-tag">{{ $vehicle->price }} €</div>

                        <img src="{{ asset('vehicles_images/'. $firstImage) }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><a href="{{ route('vehicle.details', ['id' => $vehicle->id]) }}">Détails</a></h4>

                        </div>
                    </div>

                </div>
                @endforeach

                @else
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <p>Aucun véhicule disponible.</p>
                </div>
                @endif




            </div>



        </div>




        </div>

        </div>
    </section><!-- End Portfolio Section -->


    <!-- ======= Team Section ======= -->
    <section id="team" class="section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h3>Équipe
                </h3>
                <p>Notre équipe est composée de professionnels de l'automobile chevronnés et passionnés, dévoués à leur métier</p>
            </div>

            <div class="row">

                @if(count($users) > 0)

                @foreach($users as $user)
                <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="100">
                    <div class="member">
                        <img src="{{ asset('employee_admin_images/' . $user->image) }}" class="img-fluid user-image" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>{{ $user->name }}</h4>
                                <span>{{ $user->role->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="100">
                    <p>aucun membre de l'équipe disponible.</p>
                </div>
                @endif





            </div>

        </div>
    </section><!-- End Team Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials">
        <div class="container" data-aso="zoom-in">
            <div class="row">
                <div class="col-lg-8">
                    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper">
                            @if (count($testimonies) > 0)
                            @php
                            $approvedTestimonies = $testimonies->where('approved', 1);
                            @endphp

                            @if ($approvedTestimonies->count() > 0)
                            @foreach ($approvedTestimonies as $testimony)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="https://cdn3.iconfinder.com/data/icons/galaxy-open-line-gradient-i/200/contacts-512.png" class="testimonial-img" alt="">
                                    <h3>{{ $testimony->name }}</h3>
                                    <div class="starsr">
                                        <h4>
                                            @for ($i = 1; $i <= 5; $i++) @if ($i <=$testimony->rating)
                                                <i class="bi bi-star active"></i>
                                                @else
                                                <i class="bi bi-star"></i>
                                                @endif
                                                @endfor
                                        </h4>
                                    </div>
                                    <p>
                                        {{ $testimony->comment }}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="swiper-slide">
                                <p>Aucun témoignage approuvé disponible.</p>
                            </div>
                            @endif
                            @else
                            <div class="swiper-slide">
                                <p>Aucun témoignage disponible.</p>
                            </div>
                            @endif





                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="testimonial-form">
                        <h3>Témoignage</h3>
                        <form action="{{ route('testimonies.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="comment">Commentaire</label>
                                <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror" required></textarea>
                                @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3 ">
                                <div class="rating">
                                    <div class="stars" id="rating-stars">
                                        <i class="bi bi-star" data-rating="1"></i>
                                        <i class="bi bi-star" data-rating="2"></i>
                                        <i class="bi bi-star" data-rating="3"></i>
                                        <i class="bi bi-star" data-rating="4"></i>
                                        <i class="bi bi-star" data-rating="5"></i>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control @error('rating') is-invalid @enderror" name="rating" id="rating-input" required>
                                @error('rating')
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

                            <button type="submit" class="btn btn-primary mt-3">Soumettre</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <!-- End Contact Section -->

</main><!-- End #main -->
<style>
    #startMileage,
    #endMileage,
    #startPrice,
    #endPrice,
    #startYear,
    #endYear {
        margin-left: 10px;
        font-weight: bold;
    }

    /*rating */

    .stars i {
        color: #e6e6e6;
        font-size: 30px;
        cursor: pointer;
        transition: color 0.2s ease;
    }

    .stars i.active {
        color: #ff9c1a;
    }


    .starsr i {
        color: #e6e6e6;
    }

    .starsr i.active {
        color: #ff9c1a;
    }
</style>

<script>
    const mileageInput = document.getElementById('customRange1');
    const startMileage = document.getElementById('startMileage');
    const endMileage = document.getElementById('endMileage');

    mileageInput.addEventListener('input', function() {
        const value = mileageInput.value;
        startMileage.textContent = value;
        filterVehicles();
    });

    const priceInput = document.getElementById('customRange2');
    const startPrice = document.getElementById('startPrice');
    const endPrice = document.getElementById('endPrice');

    priceInput.addEventListener('input', function() {
        const value = priceInput.value;
        startPrice.textContent = numberWithCommas(value);
        filterVehicles();
    });

    const yearInput = document.getElementById('customRange3');
    const startYear = document.getElementById('startYear');
    const endYear = document.getElementById('endYear');

    yearInput.addEventListener('input', function() {
        const value = yearInput.value;
        startYear.textContent = value;
        filterVehicles();
    });

    function numberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function filterVehicles() {
        const priceValue = parseInt(priceInput.value.replace('.', ''));
        const mileageValue = parseInt(mileageInput.value.replace('.', ''));
        const yearValue = parseInt(yearInput.value);

        const vehicles = document.querySelectorAll('.portfolio-item');

        vehicles.forEach(vehicle => {
            const vehiclePrice = parseInt(vehicle.getAttribute('data-price').replace('.', ''));
            const vehicleMileage = parseInt(vehicle.getAttribute('data-mileage'));
            const vehicleYear = parseInt(vehicle.getAttribute('data-year'));

            if (
                vehiclePrice >= priceValue &&
                vehicleMileage >= mileageValue &&
                vehicleYear >= yearValue
            ) {
                vehicle.style.display = 'block';
            } else {
                vehicle.style.display = 'none';
            }
        });
    }

    //rating 

    const stars = document.querySelectorAll(".stars i");
    const ratingInput = document.getElementById("rating-input");

    // Loop through the "stars" NodeList
    stars.forEach((star, index1) => {
        // Add an event listener that runs a function when the "click" event is triggered
        star.addEventListener("click", () => {
            // Loop through the "stars" NodeList Again
            stars.forEach((star, index2) => {
                // Add the "active" class to the clicked star and any stars with a lower index
                // and remove the "active" class from any stars with a higher index
                index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
            });

            // Set the rating input value based on the number of active stars
            ratingInput.value = index1 + 1;
        });
    });
</script>

</script>