<x-layouts.app 
    title="Our Services"
    description="EG Bookkeeping LLC provides comprehensive digital solutions tailored to your business needs, including monthly bookkeeping, catch-up/clean-up, real estate, and legal trust accounting."
>
    {{-- Page Hero --}}
    @php
        $breadcrumbs = [
            ['label' => 'Home', 'path' => route('home')],
            ['label' => 'Services', 'path' => route('services')],
        ];
    @endphp

    <x-ui.page-hero 
        title='Our <span class="text-eg-accent italic">Services</span>'
        description="Comprehensive bookkeeping solutions designed to provide clarity, ensure accuracy, and empower your business growth."
        :breadcrumbs="$breadcrumbs"
    />

    {{-- Reuse the Home Services Grid --}}
    <x-home.services />

    {{-- Why us or other specific service benefits could be added here --}}

    {{-- CTA --}}
    <x-home.cta />
</x-layouts.app>
