<x-layouts.app 
    title="Industries We Serve"
    description="EG Bookkeeping LLC offers specialized accounting and bookkeeping services for Law Firms and Real Estate professionals."
>
    {{-- Page Hero --}}
    @php
        $breadcrumbs = [
            ['label' => 'Home', 'path' => route('home')],
            ['label' => 'Industries', 'path' => '/industries'],
        ];
    @endphp

    <x-ui.page-hero 
        title='Our <span class="text-eg-accent italic">Industries</span>'
        description="Tailored bookkeeping services designed to meet the unique needs of your industry."
        :breadcrumbs="$breadcrumbs"
    />

    <div class="py-12">
        <x-home.industries />
    </div>
    
    <x-home.cta />
</x-layouts.app>
