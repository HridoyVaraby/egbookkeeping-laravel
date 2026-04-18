@props([
    'title' => 'Expert Bookkeeping Services for Law Firms & Small Businesses',
    'description' => 'EG Bookkeeping LLC offers professional, accurate, and reliable bookkeeping solutions tailored for law firms and real estate professionals.',
    'keywords' => 'bookkeeping, law firm bookkeeping, real estate bookkeeping, QuickBooks Online, Xero, financial reporting',
    'image' => null,
    'ogType' => 'website',
    'article' => null,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="512x512" href="{{ asset('favicon.png') }}">

    {{-- SEO Metadata via Component --}}
    <x-seo
        :title="$title"
        :description="$description"
        :keywords="$keywords"
        :image="$image ?? asset('ograph.png')"
        :type="$ogType"
        :article="$article"
    />

    {{-- Business Structured Data (Global) --}}
    <x-schema.business />

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,700&family=Poppins:wght@400;500;600;700&family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>

    {{-- Analytics --}}
    <script defer src="https://analytics.egbookkeeping.com/script.js" data-website-id="cef21f23-1e75-405c-aa40-000d07ccf7e4"></script>
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

    {{-- WhatsApp Widget --}}
    <x-whatsapp-widget />

    {{-- Global Scripts --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            console.log("DOMContentLoaded fired. window.lucide is:", typeof lucide !== 'undefined' ? lucide : 'undefined');
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
                console.log("lucide.createIcons() called. Now there are " + document.querySelectorAll('svg.lucide').length + " svg elements.");
            } else {
                console.error("Lucide is undefined.");
            }
        });
    </script>
    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observerOptions = {
                root: null,
                rootMargin: '0px 0px -50px 0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.animate-on-scroll').forEach((el) => {
                observer.observe(el);
            });
        });
    </script>
</body>
</html>
