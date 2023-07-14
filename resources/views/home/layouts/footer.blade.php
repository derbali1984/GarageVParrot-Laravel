<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 footer-info">
                    <h3>Garage V.Parrot</h3>
                    <p>
                        Est un garage automobile de premier plan spécialisé dans les services de réparation et de vente.
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>LIENS UTILES</h4>
                    <ul>


                        <li><a href="#hero">Accueil</a></li>
                        <li><a href="#about">À propos</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#portfolio">Véhicules d’occasion</a></li>
                        <li><a href="#team">Équipe</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Contactez-nous</h4>
                    <p>
                        A108 Adam Street <br>
                        New York, NY 535022<br>
                        United States <br>
                        <strong>Téléphone:</strong> +1 5589 55488 55<br>
                        <strong>Email:</strong> team@garagevparrot.com<br>
                    </p>

                    <div class="social-links">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-newsletter opening-hours">
                    <h4>Horaires d'ouvertures</h4>
                    <p>
                        @foreach ($openingHours as $openingHour)
                        <span>{{$openingHour->day->name}}:</span> {{$openingHour->time}}<br>
                        @endforeach
                    </p>




                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>Garage V.Parrot</strong>. Tous les droits sont réservés
        </div>

    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('HomePageTemplate/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('HomePageTemplate/assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('HomePageTemplate/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('HomePageTemplate/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('HomePageTemplate/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('HomePageTemplate/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('HomePageTemplate/assets/vendor/php-email-form/validate.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- HomePageTemplate Main JS File -->
<script src="{{asset('HomePageTemplate/assets/js/main.js')}}"></script>

</body>

</html>

<style>
    .card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card .image {
        flex: 0 0 auto;
    }

    .card .content {
        flex: 1 0 auto;
        padding: 20px;
    }

    .user-image {
        width: 300px;
        /* Adjust the width as per your requirement */
        height: 200px;
        /* Adjust the height as per your requirement */
    }

    .large-image {
        width: 80%;
        height: auto;

    }

    .opening-hours {
        margin-bottom: 20px;
    }

    .opening-hours h4 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .opening-hours p {
        font-size: 14px;
        line-height: 1.5;
    }

    .opening-hours span {
        font-weight: bold;
        margin-right: 10px;
    }

    .price-tag {
        position: absolute;
        top: 10px;
        /* Adjust the top position as needed */
        left: 10px;
        /* Adjust the left position as needed */
        background-color: #000;
        color: #fff;
        padding: 5px 10px;
        font-size: 14px;
        border-radius: 5px;
    }

    .car-info {
        font-size: 16px;
        font-weight: bold;
        margin-top: 10px;
    }
</style>