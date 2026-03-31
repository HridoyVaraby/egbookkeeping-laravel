<x-layouts.app 
    title="About Us"
    description="Your trusted bookkeeping partner with over 15 years of experience. Learn about EG Bookkeeping LLC's vision, mission, and the expertise behind our financial solutions."
>
    {{-- Page Hero --}}
    @php
        $breadcrumbs = [
            ['label' => 'Home', 'path' => route('home')],
            ['label' => 'About', 'path' => route('about')],
        ];
    @endphp

    <x-ui.page-hero 
        title='<span class="text-eg-accent italic">About</span> Us'
        description="Your trusted bookkeeping partner with over 15 years of experience in financial clarity and small business growth."
        :breadcrumbs="$breadcrumbs"
    />

    {{-- About Hero --}}
    <x-about.hero />

    {{-- Vision & Mission --}}
    <x-about.vision-mission />

    {{-- Certifications --}}
    <x-about.certifications />

    {{-- Platforms (Reused from home) --}}
    <x-home.platforms />

    {{-- Why Choose EG --}}
    <x-about.why-eg />

    {{-- Founder --}}
    <x-about.founder />

    {{-- CTA --}}
    <x-home.cta />
</x-layouts.app>
