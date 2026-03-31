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

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-12 max-w-3xl mx-auto">
            <h2 class="text-4xl lg:text-5xl font-bold text-eg-heading mb-4 font-display">
                Why <span class="text-eg-accent italic">Choose</span> Us
            </h2>
            <p class="text-eg-body text-base leading-relaxed">
                We go beyond numbers to deliver tailored, reliable, and precise bookkeeping 
                solutions. Discover why businesses trust us to manage their finances with confidence 
                and care.
            </p>
        </div>

        <!-- Cards Grid -->
        <div class="grid md:grid-cols-3 gap-6 max-w-6xl mx-auto">
            @foreach($reasons as $reason)
                <div class="bg-gradient-to-br from-[#E8A84D] to-[#D89332] rounded-lg p-8 text-[#1a2f4d] shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                    <i data-lucide="{{ $reason['icon'] }}" class="w-8 h-8 mb-6" stroke-width="2"></i>
                    <h3 class="text-xl font-bold mb-4 leading-tight font-display">
                        {{ $reason['title'] }}
                    </h3>
                    <p class="text-sm leading-relaxed opacity-90">
                        {{ $reason['description'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
