<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Samara International - Home</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{url('public/assets/img/fav_icon.png')}}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset("public/assets/vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("public/assets/vendor/icofont/icofont.min.css")}}" rel="stylesheet">
    <link href="{{asset("public/assets/vendor/boxicons/css/boxicons.min.css")}}" rel="stylesheet">
    <link href="{{asset("public/assets/vendor/animate.css/animate.min.css")}}" rel="stylesheet">
    <link href="{{asset("public/assets/vendor/remixicon/remixicon.css")}}" rel="stylesheet">
    <link href="{{asset("public/assets/vendor/venobox/venobox.css")}}" rel="stylesheet">
    <link href="{{asset("public/assets/vendor/owl.carousel/assets/owl.carousel.min.css")}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset("public/assets/css/style.css")}}" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>