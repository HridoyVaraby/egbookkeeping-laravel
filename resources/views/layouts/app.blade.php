<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO --}}
    @hasSection('seo')
        @yield('seo')
    @else
        <x-seo />
    @endif
    @stack('seo')

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">

    {{-- Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans antialiased bg-background text-foreground selection:bg-eg-primary selection:text-white">
    <div class="relative min-h-screen flex flex-col">
        {{-- Header Component will go here --}}
        <x-header />

        <main id="main-content" class="flex-grow">
            @yield('content')
        </main>

        {{-- Footer Component will go here --}}
        <x-footer />
    </div>

    {{-- WhatsApp Widget will go here --}}
    <x-whatsapp-widget />

    @stack('scripts')
</body>
</html>
