@extends('layouts.base')
@section('body')
@include('components.layouts.header')
@include('components.layouts.navbar')

    @yield('content')



    @include('components.layouts.footer')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
