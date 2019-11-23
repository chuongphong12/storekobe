<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bò Kobe Việt Nam</title>
    <base href="{{asset('')}}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="fb:app_id" content="361055761450242" />
    <meta property="fb:admins" content="655527234920042">
    <meta name="google-site-verification" content="fXcvfLQmCvjEVP0NeBnadwS3oKh2aM0cYzMu2HkZ_dQ" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/img/icon.png">
    <!-- ************************* CSS Files ************************* -->

    <!-- Vendor CSS -->
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/vendor.css">

    <!-- style css -->

    <link rel="stylesheet" href="assets/css/main.css">

    @yield('style')
</head>

<body>
    @include('sweetalert::alert')
    <!-- Preloader Start -->

    <div class="ft-preloader active">

        <div class="ft-preloader-inner h-100 d-flex align-items-center justify-content-center">

            <div class="ft-child ft-bounce1"></div>

            <div class="ft-child ft-bounce2"></div>

            <div class="ft-child ft-bounce3"></div>

        </div>

    </div>

    <!-- Preloader End -->

    <!-- Main Wrapper Start -->

    <div class="wrapper">

        <!-- Topbar Start -->

        @include('layouts.topbar')

        <!-- Topbar End -->

        <!-- Header Start -->

        @include('layouts.header')

        <!-- Header End -->

        @yield('content')

        <!-- Footer Start-->

        @include('layouts.footer')

        <!-- Footer End-->

        <!-- OffCanvas Menu Start -->

        @include('layouts.offcanvas')

        <!-- OffCanvas Menu End -->

        <!-- Mini Cart Start -->

        @include('layouts.minicart')

        <!-- Mini Cart End -->

        <!-- Searchform Popup Start -->

        @include('layouts.search')

        <!-- Searchform Popup End -->

        <!-- Global Overlay Start -->

        <div class="global-overlay"></div>

        <!-- Global Overlay End -->

        <!-- Global Overlay Start -->

        <a class="scroll-to-top" href=""><i class="la la-angle-up"></i></a>

        <!-- Global Overlay End -->

    </div>

    <!-- Main Wrapper End -->

    <!-- ************************* JS Files ************************* -->

    <!-- Google Map -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxvP66_Xk1ts77oL2Z7EpDxhDD_jMg-D0"></script>

    <script>
        // When the window has finished loading create our google map below

        google.maps.event.addDomListener(window, 'load', init);
        function init() {

            // Basic options for a simple Google Map

            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 12,
                scrollwheel: false,
                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(40.740610, -73.935242), // New York
                // How you would like to style the map. 
                // This is where you would paste any style found on
                styles: [{
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#e9e9e9"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {

                        "featureType": "landscape",

                        "elementType": "geometry",

                        "stylers": [{

                                "color": "#f5f5f5"

                            },

                            {

                                "lightness": 20

                            }

                        ]

                    },

                    {

                        "featureType": "road.highway",

                        "elementType": "geometry.fill",

                        "stylers": [{

                                "color": "#ffffff"

                            },

                            {

                                "lightness": 17

                            }

                        ]

                    },

                    {

                        "featureType": "road.highway",

                        "elementType": "geometry.stroke",

                        "stylers": [{

                                "color": "#ffffff"

                            },

                            {

                                "lightness": 29

                            },

                            {

                                "weight": 0.2

                            }

                        ]

                    },

                    {

                        "featureType": "road.arterial",

                        "elementType": "geometry",

                        "stylers": [{

                                "color": "#ffffff"

                            },

                            {

                                "lightness": 18

                            }

                        ]

                    },

                    {

                        "featureType": "road.local",

                        "elementType": "geometry",

                        "stylers": [{

                                "color": "#ffffff"

                            },

                            {

                                "lightness": 16

                            }

                        ]

                    },

                    {

                        "featureType": "poi",

                        "elementType": "geometry",

                        "stylers": [{

                                "color": "#f5f5f5"

                            },

                            {

                                "lightness": 21

                            }

                        ]

                    },

                    {

                        "featureType": "poi.park",

                        "elementType": "geometry",

                        "stylers": [{

                                "color": "#dedede"

                            },

                            {

                                "lightness": 21

                            }

                        ]

                    },

                    {

                        "elementType": "labels.text.stroke",

                        "stylers": [{

                                "visibility": "on"

                            },

                            {

                                "color": "#ffffff"

                            },

                            {

                                "lightness": 16

                            }

                        ]

                    },

                    {

                        "elementType": "labels.text.fill",

                        "stylers": [{

                                "saturation": 36

                            },

                            {

                                "color": "#333333"

                            },

                            {

                                "lightness": 40

                            }

                        ]

                    },

                    {

                        "elementType": "labels.icon",

                        "stylers": [{

                            "visibility": "off"

                        }]

                    },

                    {

                        "featureType": "transit",

                        "elementType": "geometry",

                        "stylers": [{

                                "color": "#f2f2f2"

                            },

                            {

                                "lightness": 19

                            }

                        ]

                    },

                    {

                        "featureType": "administrative",

                        "elementType": "geometry.fill",

                        "stylers": [{

                                "color": "#fefefe"

                            },

                            {

                                "lightness": 20

                            }

                        ]

                    },

                    {

                        "featureType": "administrative",

                        "elementType": "geometry.stroke",

                        "stylers": [{

                                "color": "#fefefe"

                            },

                            {

                                "lightness": 17

                            },

                            {

                                "weight": 1.2

                            }

                        ]

                    }

                ]

            };



            // Get the HTML DOM element that will contain your map 

            // We are using a div with id="map" seen below in the <body>

            var mapElement = document.getElementById('google-map');



            // Create the Google Map using our element and options defined above

            var map = new google.maps.Map(mapElement, mapOptions);



            // Let's also add a marker while we're at it

            var marker = new google.maps.Marker({

                position: new google.maps.LatLng(40.740610, -73.935242),

                map: map,

                title: 'Contixs',

                icon: "assets/img/icons/marker.png",

                animation: google.maps.Animation.BOUNCE

            });

        }

    </script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    @yield('script')
</body>

</html>