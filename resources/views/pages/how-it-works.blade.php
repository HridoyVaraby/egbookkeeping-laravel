<x-layouts.app 
    title="How It Works"
    description="Learn about our simple and effective process for getting your bookkeeping on track with EG Bookkeeping LLC."
>
    {{-- Page Hero --}}
    @php
        $breadcrumbs = [
            ['label' => 'Home', 'path' => route('home')],
            ['label' => 'How It Works', 'path' => route('how-it-works')],
        ];
    @endphp

    <x-ui.page-hero 
        title='How It <span class="text-eg-accent italic">Works</span>'
        description="A simple, transparent, and efficient process designed to streamline your bookkeeping and give you complete peace of mind."
        :breadcrumbs="$breadcrumbs"
    />

    {{-- How It Works Timeline --}}
    <x-home.how-it-works :show-header="false" />

    {{-- CTA Section --}}
    <x-home.cta />
</x-layouts.app>
