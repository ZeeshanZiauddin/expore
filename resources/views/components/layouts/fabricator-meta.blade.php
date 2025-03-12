
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="language" content="en-UK">

<title>@yield('meta-title', 'Explore Flights')</title>

<meta content="@yield('meta-description', 'default')" name="description">
<meta name="keywords"
    content="@yield('meta-keywords', 'Tour, Travels, agency, business, corporate, tour packages, journey, trip')">
<link rel="shortcut icon" href="{{asset('favicon.ico')}}">


<meta name="author" content="@ZeeshanZiauddin">
<meta name="robots" content="@yield('meta_robots', 'noindex, nofollow')">
{{--
<meta name="google-site-verification" content="YOUR_VERIFICATION_CODE"> --}}
<meta name="theme-color" content="#ff6900">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
{{--
<meta http-equiv="Cache-Control" content="public, max-age=31536000, immutable"> --}}
<meta http-equiv="X-Frame-Options" content="DENY">
{{--
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}

<meta property="og:title" content="@yield('meta-og-title', 'Find cheapest Flights')">
<meta property="og:description" content="@yield('meta-og-description', 'Find cheapest Flights')">
<meta property="og:image" content="@yield('meta-og-image', 'https://yourwebsite.com/og-image.jpg')">
<meta property="og:url" content="{{asset('')}}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Explore Flights">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Your Page Title">
<meta name="twitter:description" content="A compelling description for Twitter.">
<meta name="twitter:image" content="https://yourwebsite.com/twitter-image.jpg">
<meta name="twitter:site" content="@YourTwitterHandle">
<link rel="canonical" href="@yield('canonical', request()->url())">

<!-- Css -->
<link href="{{asset('assets/libs/tobii/css/tobii.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/libs/tiny-slider/tiny-slider.css')}}" rel="stylesheet">
<link href="{{asset('assets/libs/js-datepicker/datepicker.min.css')}}" rel="stylesheet">

<!-- Main Css -->
<link href="{{asset(" assets/libs/@mdi/font/css/materialdesignicons.min.css")}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/css/tailwind.css')}}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="https://rsms.me/inter/inter.css">