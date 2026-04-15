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
            <p class="text-[18px] leading-[26px] font-sans text-eg-body">
                We go beyond numbers to deliver tailored, reliable, and precise bookkeeping 
                solutions. Discover why businesses trust us to manage their finances with confidence 
                and care.
            </p>
        </div>

        <!-- Cards Grid -->
        <div class="grid gap-6 md:grid-cols-3">
            @foreach($reasons as $index => $reason)
                @php
                    $cardClasses = $index % 2 == 1 
                        ? 'border-[#F6E7C6] bg-gradient-to-b from-white to-[#fff9ef]' 
                        : 'border-[#E7EEF7] bg-gradient-to-b from-white to-[#f8fbff]';
                    $iconClasses = $index % 2 == 1 
                        ? 'bg-[#FFF4E4] text-[#EBA927]' 
                        : 'bg-[#EEF6FF] text-[#2374b7]';
                @endphp
                <div class="group flex flex-col h-full rounded-[24px] border {{ $cardClasses }} p-10 shadow-[0_12px_28px_rgba(15,23,42,0.06)] transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_18px_36px_rgba(15,23,42,0.1)]">
                    <div class="mb-6 inline-flex h-14 w-14 items-center justify-center rounded-2xl {{ $iconClasses }}">
                        <i data-lucide="{{ $reason['icon'] }}" class="h-7 w-7" stroke-width="2"></i>
                    </div>
                    <h3 class="text-[24px] leading-[26px] text-eg-heading font-semibold mb-5 font-display">
                        {{ $reason['title'] }}
                    </h3>
                    <p class="text-[16px] leading-[26px] font-normal font-sans text-eg-body">
                        {{ $reason['description'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
