@yield('modal')

<!-- Footer -->
<footer class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col text-center py-4">
                <h3 class="mb-2 text-primary">KALIMOSODO HOTEL</h3>
                <small class="m-0">Copyright&copy; 2021. All rights reserved.</small>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('template-hotel') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Font Awesome JS -->
<script src="{{ asset('template-hotel') }}/vendor/fontawesome/js/all.min.js"></script>
<!-- Slick -->
<script src="{{ asset('template-hotel') }}/vendor/slick/slick/slick.min.js"></script>
<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Main Script -->
<script src="{{ asset('template-hotel') }}/assets/js/script.js"></script>
@yield('script')

<script>
    $(document).ready(function() {
        // AOS
        AOS.init();
    });

</script>
</body>

</html>
