<x-front-layout title="Order Details">
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Order # {{ $order->number }}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="#">Orders</a></li>
                        <li><a href="#"># {{ $order->number }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->




    <section class="checkout-wrapper section">
        <div class="container">
            <div id="map" style="height: 50vh;">

            </div>
        </div>
    </section>






    <script>
        function initMap() {
            const location = {
                lat: {{ $delivery->lat }},
                lng: {{ $delivery->lng }},
            };

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: location,
            });

            const marker = new google.maps.Marker({
                position: location,
                map: map,
            });
        }
    </script>

    <script async src="https://maps.googleapis.com/maps/api/js?key=YOUR_REAL_API_KEY&callback=initMap"></script>

</x-front-layout>
