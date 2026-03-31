@props([
    'title' => 'Expert Bookkeeping Services for Law Firms & Small Businesses',
    'description' => 'EG Bookkeeping LLC offers professional, accurate, and reliable bookkeeping solutions tailored for law firms and real estate professionals.',
    'keywords' => 'bookkeeping, law firm bookkeeping, real estate bookkeeping, QuickBooks Online, Xero, financial reporting',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO Metadata --}}
    <title>{{ $title }} | EG Bookkeeping LLC</title>
    <meta name="description" content="{{ $description }}">
    <meta name="keywords" content="{{ $keywords }}">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    {{-- Alpine JS Initialization --}}
    <script defer src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="font-sans antialiased bg-white text-eg-body selection:bg-eg-accent selection:text-white">
    <div class="relative min-h-screen flex flex-col">
        {{-- Navigation Header --}}
        <x-header />

        {{-- Main Page Content --}}
        <main id="main-content" class="flex-grow">
            {{ $slot }}
        </main>

        {{-- Site Footer --}}
        <x-footer />
    </div>

    {{-- Global Scripts --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
