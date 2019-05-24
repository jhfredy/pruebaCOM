<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>American Observatory</title>
    <!-- Favicon -->
    <link href="{{asset('/img/brand/favicon.png')}}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    @stack('styles')
    <!-- Argon CSS -->
    <link type="text/css" href="/css/argon.css?v=1.0.0" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
  </head>