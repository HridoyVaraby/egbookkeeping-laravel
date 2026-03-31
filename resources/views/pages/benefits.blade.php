<x-layouts.app 
    title="Benefits of Our Bookkeeping Services"
    description="Discover how EG Bookkeeping LLC saves you time and cuts costs with our dedicated financial services."
>
    {{-- Page Hero --}}
    @php
        $breadcrumbs = [
            ['label' => 'Home', 'path' => route('home')],
            ['label' => 'Benefits', 'path' => '/benefits'],
        ];
    @endphp

    <x-ui.page-hero 
        title='Why Choose <span class="text-eg-accent italic">Us</span>'
        description="By leveraging our expertise, your investment in our bookkeeping services delivers exceptional returns."
        :breadcrumbs="$breadcrumbs"
    />

    <div class="py-12">
        <x-home.benefits />
    </div>
    
    <x-home.cta />
</x-layouts.app>
