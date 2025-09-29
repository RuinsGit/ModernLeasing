<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'MODERN LİZİNQ - Texnika, Avtomobil və Əmlak Lizinqi')</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'MODERN LİZİNQ - Texnika, avtomobil və əmlakınızı şərfəli lizinq şərtləri ilə əldə edin. Peşəkar xidmət və etibarlı həllər.')">
    <meta name="keywords" content="@yield('keywords', 'lizinq, texnika lizinqi, avtomobil lizinqi, əmlak lizinqi, kənd təsərrüfatı, sənaye avadanlıqları')">
    <meta name="author" content="MODERN LİZİNQ">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og_title', 'MODERN LİZİNQ - Texnika və Avtomobil Lizinqi')">
    <meta property="og:description" content="@yield('og_description', 'Texnika, avtomobil və əmlakınızı şərfəli lizinq şərtləri ilə əldə edin.')"
    <meta property="og:image" content="@yield('og_image', asset('assets/images/og-image.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    
    <!-- Styles -->
    @include('front.includes.styles')
    
    @stack('styles')
</head>
<body class="antialiased">
    <!-- Navbar -->
    @include('front.includes.navbar')
    
    <!-- Mobile Navbar -->
    @include('front.includes.mobile-navbar')
    
    <!-- Header -->
    @yield('header')
    
    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('front.includes.footer')
    
    <!-- Scripts -->
    @include('front.includes.scripts')
    
    @stack('scripts')
</body>
</html>
