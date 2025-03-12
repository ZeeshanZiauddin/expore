

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
@hasSection('title')
    <title>@yield('title') - {{ $meta['title'] ?? config('app.name') }}</title>
@else
    <title>{{ $meta['title'] ?? config('app.name') }}</title>
@endif
<meta content="Tour & Travels Agency Tailwind CSS Template" name="description">
<meta
    content="Tour, Travels, agency, business, corporate, tour packages, journey, trip, tailwind css, Admin, Landing"
    name="keywords">
<meta name="author" content="@ZeeshanZiauddin">
{{--
<meta name="website" content="https://shreethemes.in"> --}}
<meta name="email" content="zeeshanziauddin6@gmail.com">

<!-- favicon -->
<link rel="shortcut icon" href="{{asset('favicon.ico')}}">

<!-- Css -->
<link href="{{asset('assets/libs/tobii/css/tobii.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/libs/tiny-slider/tiny-slider.css')}}" rel="stylesheet">
<link href="{{asset('assets/libs/js-datepicker/datepicker.min.css')}}" rel="stylesheet">
<!-- Main Css -->
<link href="{{asset("assets/libs/@mdi/font/css/materialdesignicons.min.css")}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/css/tailwind.css')}}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="https://rsms.me/inter/inter.css">

