@php
    $reasons = [
        [
            'icon' => 'award',
            'title' => 'Expertise You Can Trust',
            'description' => 'Our team comprises certified professionals in QuickBooks Online and Xero, bringing years of experience to streamline your bookkeeping with precision and accuracy.',
        ],
        [
            'icon' => 'settings',
            'title' => 'Tailored Solutions for Your Business',
            'description' => "We understand that every business is unique. That's why we customize our services to fit your specific needs, ensuring efficiency and satisfaction.",
        ],
        [
            'icon' => 'headphones',
            'title' => 'Dedicated Support',
            'description' => "Our commitment to your success means you'll always have access to timely communication, proactive insights, and exceptional customer service.",
        ],
    ];
@endphp

<section class="bg-white py-16">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-12 max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-2 font-display">
                Why <span class="text-eg-accent">Choose</span> Us
            </h2>
            <p class="text-[18px] leading-[26px] font-sans text-[#4B5563]">
                We go beyond numbers to deliver tailored, reliable, and precise bookkeeping 
                solutions. Discover why businesses trust us to manage their finances with confidence 
                and care.
            </p>
        </div>

        <!-- Cards Grid -->
        <div class="grid max-w-6xl gap-6 md:grid-cols-3 mx-auto">
            @foreach($reasons as $reason)
                <div class="rounded-[28px] bg-gradient-to-br from-[#163253] via-[#1a4069] to-[#2374b7] p-8 text-white shadow-[0_20px_50px_rgba(22,50,83,0.18)] transition-all duration-300 hover:-translate-y-1">
                    <div class="mb-6 inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-white/10 ring-1 ring-white/15">
                        <i data-lucide="{{ $reason['icon'] }}" class="h-7 w-7" stroke-width="2"></i>
                    </div>
                    <h3 class="text-[24px] leading-[26px] font-semibold mb-5 font-display">
                        {{ $reason['title'] }}
                    </h3>
                    <p class="text-[16px] leading-[26px] font-normal font-sans text-slate-100/90">
                        {{ $reason['description'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
