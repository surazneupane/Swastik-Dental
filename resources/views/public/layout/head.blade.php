<!DOCTYPE html>
<html lang="en">

<head>
    <title>DentaCare - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="/public/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/animate.css">

    <link rel="stylesheet" href="/public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/public/css/magnific-popup.css">

    <link rel="stylesheet" href="/public/css/aos.css">

    <link rel="stylesheet" href="/public/css/ionicons.min.css">

    <link rel="stylesheet" href="/public/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/public/css/jquery.timepicker.css">


    <link rel="stylesheet" href="/public/css/flaticon.css">
    <link rel="stylesheet" href="/public/css/icomoon.css">
    <link rel="stylesheet" href="/public/css/style.css">
</head>

<body>

    {{-- Nav --}}
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{route('public.index')}}">Denta<span>Care</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="{{route('public.index')}}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{route('public.about')}}" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="{{route('public.services')}}" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="{{route('public.doctors')}}" class="nav-link">Doctors</a></li>
                    <li class="nav-item"><a href="{{route('public.blogs')}}" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="{{route('public.contact')}}" class="nav-link">Contact</a></li>
                    <li class="nav-item cta"><a href="{{route('public.contact')}}" class="nav-link" data-toggle="modal"
                            data-target="#modalRequest"><span>Make an Appointment</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
