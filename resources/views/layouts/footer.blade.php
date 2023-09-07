<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

<footer id="footer" data-aos="fade-up" ddata-aos-duration="1000" style="background-color: rgb(161, 161, 161);">
    <div class="footer-top bg-dark">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="footer-info">
                        <h3 class="text-light">SMA NEGERI 3 DOBO</h3>
                        <p class="text-light">
                            JlN. Cendrawasih RT 005 RW 005 Kel. Siwalima <br>Kec. Pulau-Pulau Aru.
                            Kab. Kepulauan Aru. <br>Prov. Maluku <br>Kode Pos : 97662 <br><br>
                            <i class="bi bi-phone"></i>
                            <span style="margin-left: 5px;">+62 812-3188-0285
                            </span>
                            <br>
                            <i class="bi bi-whatsapp"></i>
                            <span style="margin-left: 5px;">
                                <a href="https://wa.me/6281231880285?text=Hallo%20admin,..!!!%20SMAN%203%20Dobo%20"
                                    target="blank">
                                    +62 812-3188-0285
                                </a>
                            </span>
                            <br>
                            <i class="bi bi-facebook"></i>
                            <span style="margin-left: 5px;">Sma Negeri 3 Dobo
                            </span>
                            <br>
                        </p>
                    </div>
                </div>

                <div class="col-md-8 footer-links">
                    <h4 class="text-light">Lokasi Sekolah</h4>
                    <div wire:ignore style="">
                        <div id="address-map-container" class="" style="width:100%;">
                            <div wire:ignore.self id="map2" style="height: 300px;border-radius: 3px;">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="copyright">
            <strong><span class="text-dark">Copyright &copy; 2023 SMA Negeri 3 Dobo</span></strong>
        </div>
        <div class="credits">
            Designed by <a href="/" class="text-dark">Mario I. Namsa</a>
        </div>

    </div>

</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i></a>


@livewireScripts
{{-- <script src="/vendor/turbolinks/turbolinks.js"></script>
<script src="/vendor/turbolinks/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script> --}}
{{-- scripts --}}
<script src="/vendor/aos/aos.js"></script>
<script>
    AOS.init();
</script>
<!-- bootstrap -->
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Templates -->
<script src="/vendor/templates/glightbox/js/glightbox.min.js"></script>
<script src="/vendor/templates/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/vendor/templates/swiper/swiper-bundle.min.js"></script>
<script src="/vendor/templates/main/main.js"></script>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script>
    $(document).ready(function() { 
        var latitude = "-5.766443267381629";
        var longitude = "134.21849176967748";
        var map = L.map('map2').setView([latitude, longitude], 17.5);

        googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        var marker = L.marker([latitude, longitude]).addTo(map);

        var circle = L.circle([latitude, longitude], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 20
        }).addTo(map);

        map.scrollWheelZoom.disable();

        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("Koordinat  posisi. " + e.latlng)
                .openOn(map);
        }

        map.on('click', onMapClick);
    });
</script>

</body>

</html>
