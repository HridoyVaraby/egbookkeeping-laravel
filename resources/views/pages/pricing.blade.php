<x-layouts.app 
    title="Pricing"
    description="Affordable, transparent bookkeeping pricing tailored to your business needs. Explore our flexible packages for monthly bookkeeping, payroll, and tax services."
>
    {{-- Page Hero --}}
    @php
        $breadcrumbs = [
            ['label' => 'Home', 'path' => route('home')],
            ['label' => 'Pricing', 'path' => route('pricing')],
        ];

        $pricingData = [
            [
                'id' => 'catchup',
                'title' => 'Catch-Up & Clean-Up Bookkeeping',
                'subtitle' => 'Bring your books back on track with expert support.',
                'bgColor' => 'bg-eg-heading',
                'plans' => [
                    ['name' => 'Basic Catch-Up & Clean-Up', 'description' => 'Up to 100 transactions per month'],
                    ['name' => 'Standard Catch-Up & Clean-Up', 'description' => 'Up to 300 transactions per month'],
                    ['name' => 'Premium Catch-Up & Clean-Up', 'description' => 'Up to 400 transactions per month'],
                ],
                'pricing' => 'Starting from $100 up to $1,500 — based on the number of transactions and complexity of your records.',
                'customPricing' => 'Custom Pricing – Available upon request.',
                'buttonText' => 'Book Now',
            ],
            [
                'id' => 'monthly',
                'title' => 'Monthly Bookkeeping',
                'bgColor' => 'bg-eg-heading',
                'plans' => [
                    ['name' => 'Startup Business $199/Month', 'description' => 'Up to 100 transactions per month'],
                    ['name' => 'Small Business $399/Month', 'description' => 'Up to 200 transactions per month'],
                    ['name' => 'Small Business Plus $499/Month', 'description' => 'Up to 300 transactions per month'],
                    ['name' => 'Small Business Advanced $599/Month', 'description' => 'Up to 400 transactions per month'],
                ],
                'customPricing' => 'Custom Pricing - Available upon request',
                'buttonText' => 'Book Now',
            ],
            [
                'id' => 'realestate',
                'title' => 'Monthly Real Estate Bookkeeping',
                'bgColor' => 'bg-eg-heading',
                'plans' => [
                    ['name' => 'Startup Business $249/Month', 'description' => 'Up to 100 transactions per month'],
                    ['name' => 'Small Business $449/Month', 'description' => 'Up to 200 transactions per month'],
                    ['name' => 'Small Business Plus $649/Month', 'description' => 'Up to 300 transactions per month'],
                    ['name' => 'Small Business Advanced $849/Month', 'description' => 'Up to 400 transactions per month'],
                ],
                'customPricing' => 'Custom Pricing - Available upon request',
                'buttonText' => 'Book Now',
            ],
            [
                'id' => 'legal',
                'title' => 'Monthly Legal Bookkeeping',
                'bgColor' => 'bg-eg-heading',
                'plans' => [
                    ['name' => 'Basic Plan (Solo Practitioners) $325/Month', 'description' => 'Up to 1 trust account (IOLTA), monthly reconciliation.'],
                    ['name' => 'Standard Plan (Small Law Firms) $875/Month', 'description' => 'Up to 3 trust accounts (IOLTA), 3-way reconciliation.'],
                    ['name' => 'Premium Plan (Mid-sized Law Firms) $1525/Month', 'description' => 'Up to 5 trust accounts (IOLTA), weekly reconciliations.'],
                ],
                'customPricing' => 'Custom Pricing - Available upon request',
                'buttonText' => 'Book Now',
            ],
            [
                'id' => 'payroll',
                'title' => 'Payroll Services',
                'bgColor' => 'bg-eg-heading',
                'customOnly' => true,
                'customTitle' => 'Custom Pricing Based on Your Needs',
                'customDescription' => "Every business is unique. Let's discuss your payroll requirements and provide a custom quote that fits you best.",
                'contactNote' => '📞 Contact us today for a free consultation.',
                'buttonText' => 'Contact Now',
            ],
            [
                'id' => 'tax',
                'title' => 'U.S. Tax Services',
                'bgColor' => 'bg-eg-heading',
                'customOnly' => true,
                'customTitle' => 'Custom Pricing for Every Tax Situation',
                'customDescription' => "Every tax profile is different. Let's review your needs and provide a personalized quote that's fair and transparent.",
                'contactNote' => '📞 Contact us today for a free consultation.',
                'buttonText' => 'Contact Now',
            ],
        ];
    @endphp

    <x-ui.page-hero 
        title='Affordable & <span class="text-eg-accent italic">Transparent</span> Pricing'
        description="Our final cost is always tailored to your specific needs. We're here as your trusted partner, not just a service provider."
        :breadcrumbs="$breadcrumbs"
    />

    {{-- Pricing Grid --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 max-w-4xl mx-auto">
                <p class="text-eg-body text-base mb-4 leading-relaxed">
                    The prices below are provided for your reference. Prices are <span class="font-bold text-eg-heading">flexible and negotiable</span>. Our priority is to support your business success.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                @foreach($pricingData as $category)
                    @php
                        $cardClasses = $loop->index % 2 == 1 
                            ? 'border-[#F6E7C6] bg-gradient-to-b from-white to-[#fff9ef]' 
                            : 'border-[#E7EEF7] bg-gradient-to-b from-white to-[#f8fbff]';
                    @endphp
                    <div class="group rounded-[24px] border {{ $cardClasses }} shadow-[0_12px_28px_rgba(15,23,42,0.06)] overflow-hidden flex flex-col hover:-translate-y-1 hover:shadow-[0_18px_36px_rgba(15,23,42,0.1)] transition-all duration-300">
                        {{-- Header --}}
                        <div class="p-6 text-center border-b border-gray-100">
                            <h3 class="text-[24px] leading-[26px] font-semibold text-[#1F2937] font-display">{{ $category['title'] }}</h3>
                        </div>

                        {{-- Body --}}
                        <div class="p-8 flex-grow flex flex-col">
                            @if(isset($category['subtitle']))
                                <p class="text-[16px] leading-[26px] font-normal text-[#4B5563] mb-6 text-center italic">
                                    "{{ $category['subtitle'] }}"
                                </p>
                            @endif

                            @if(isset($category['customOnly']) && $category['customOnly'])
                                <div class="space-y-4 mb-8">
                                    <h4 class="text-[18px] leading-[26px] font-semibold text-[#1F2937] mb-2 font-display">{{ $category['customTitle'] }}</h4>
                                    <p class="text-[16px] leading-[26px] font-normal text-[#4B5563]">{{ $category['customDescription'] }}</p>
                                    @if(isset($category['contactNote']))
                                        <p class="text-[16px] leading-[26px] text-[#1F2937] font-semibold">{{ $category['contactNote'] }}</p>
                                    @endif
                                </div>
                            @else
                                <ul class="space-y-4 mb-8">
                                    @foreach($category['plans'] as $plan)
                                        <li class="flex items-start gap-3">
                                            <div class="flex-shrink-0 mt-1">
                                                <i data-lucide="check-circle-2" class="w-5 h-5 text-eg-accent"></i>
                                            </div>
                                            <div>
                                                <p class="text-[#1F2937] font-semibold text-[16px] leading-[26px]">{{ $plan['name'] }}</p>
                                                <p class="text-[#4B5563] font-normal text-[14px] leading-[24px]">{{ $plan['description'] }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            @if(isset($category['pricing']))
                                <div class="mt-auto p-4 bg-gray-50 rounded-lg mb-6 border border-gray-100">
                                    <p class="text-[#4B5563] font-normal text-[14px] leading-[24px] italic">
                                        {{ $category['pricing'] }}
                                    </p>
                                </div>
                            @endif

                            @if(isset($category['customPricing']))
                                <p class="text-[16px] leading-[26px] text-eg-accent font-semibold mb-6 text-center">
                                    {{ $category['customPricing'] }}
                                </p>
                            @endif

                            <div class="mt-auto">
                                <x-ui.button 
                                    href="{{ route('contact') }}" 
                                    variant="primary" 
                                    class="w-full justify-center"
                                >
                                    {{ $category['buttonText'] }}
                                </x-ui.button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- WARNING: pricing_notice_content is sanitized via Setting model accessor. Do not use {!! !!} elsewhere. --}}
    {{-- Dynamic Pricing Notice Section --}}
    @php
        $pricingNoticeEnabled = \App\Models\Setting::where('key', 'pricing_notice_enabled')->value('value') === '1';
        $pricingNoticeContent = \App\Models\Setting::where('key', 'pricing_notice_content')->value('value');
    @endphp

    @if($pricingNoticeEnabled && !empty(trim(strip_tags($pricingNoticeContent))))
        <section class="py-16 md:py-20 bg-white border-t border-gray-100">
            <div class="container mx-auto px-4 max-w-7xl text-left">
                <h2 class="text-3xl font-bold font-display text-[#1F2937] mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center border border-blue-100">
                        <i data-lucide="sparkles" class="w-5 h-5 text-blue-600"></i>
                    </span>
                    Pricing Notice
                </h2>
                <div class="prose prose-lg max-w-none text-[#4B5563] border-4 border-red-500
                    prose-headings:font-display prose-headings:font-bold prose-headings:text-[#1F2937]
                    prose-h2:text-2xl prose-h2:mb-4 prose-h2:mt-8
                    prose-p:leading-relaxed prose-p:mb-4
                    prose-strong:text-[#1F2937] prose-strong:font-bold
                    prose-ul:list-disc prose-ul:ml-6 prose-li:mb-2">
                    {!! $pricingNoticeContent !!}  {{-- Sanitized via Setting model accessor --}}
                </div>
            </div>
        </section>
    @endif



    {{-- CTA --}}
    <x-home.cta />
</x-layouts.app>
