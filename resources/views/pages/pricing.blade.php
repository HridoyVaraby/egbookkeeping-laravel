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
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden flex flex-col hover:shadow-2xl transition-all duration-300">
                        {{-- Header --}}
                        <div class="{{ $category['bgColor'] }} text-white p-6 text-center">
                            <h3 class="text-xl font-bold font-display tracking-tight">{{ $category['title'] }}</h3>
                        </div>

                        {{-- Body --}}
                        <div class="p-8 flex-grow flex flex-col">
                            @if(isset($category['subtitle']))
                                <p class="text-eg-heading/70 text-sm font-medium mb-6 text-center italic">
                                    "{{ $category['subtitle'] }}"
                                </p>
                            @endif

                            @if(isset($category['customOnly']) && $category['customOnly'])
                                <div class="space-y-4 mb-8">
                                    <h4 class="font-bold text-eg-accent text-lg font-display">{{ $category['customTitle'] }}</h4>
                                    <p class="text-eg-body text-sm leading-relaxed">{{ $category['customDescription'] }}</p>
                                    @if(isset($category['contactNote']))
                                        <p class="text-eg-body text-sm font-semibold">{{ $category['contactNote'] }}</p>
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
                                                <p class="text-eg-heading font-bold text-sm">{{ $plan['name'] }}</p>
                                                <p class="text-eg-body text-xs line-clamp-2 leading-relaxed">{{ $plan['description'] }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            @if(isset($category['pricing']))
                                <div class="mt-auto p-4 bg-gray-50 rounded-lg mb-6 border border-gray-100">
                                    <p class="text-eg-body text-xs leading-relaxed italic">
                                        {{ $category['pricing'] }}
                                    </p>
                                </div>
                            @endif

                            @if(isset($category['customPricing']))
                                <p class="text-eg-accent font-bold text-sm mb-6 text-center">
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

    {{-- FAQ Link Section --}}
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 text-center">
            <p class="text-eg-body mb-6">Have more questions about how our pricing works?</p>
            <x-ui.button href="{{ route('home') }}#faq" variant="outline">
                View Pricing FAQs
            </x-ui.button>
        </div>
    </section>

    {{-- CTA --}}
    <x-home.cta />
</x-layouts.app>
