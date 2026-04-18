@php
$packages = [
    [
        'name' => 'STANDARD',
        'icon' => 'zap',
        'tagline' => 'Fast • Accurate • IRS-Compliant',
        'description' => 'Perfect for individuals and small businesses needing quality filing without premium add-ons.',
        'color' => 'tax-primary',
        'featured' => false,
        'features' => [
            'Federal Tax Return (1040 or Business Return)',
            'One State Return',
            'Full Accuracy Review',
            '3–5 Business Day Delivery',
            'Email Support'
        ],
        'pricing' => [
            ['label' => 'Simple 1040 Individuals', 'price' => '$230'],
            ['label' => '1040 + Schedule C', 'price' => '$300'],
            ['label' => '1065 Partnership', 'price' => '$495'],
            ['label' => '1120 C Corporation / 1120s-S Corporation', 'price' => '$595'],
            ['label' => '1041 Trust & Estate Returns', 'price' => '$395']
        ],
        'idealFor' => 'W-2 earners, freelancers, sole proprietors, rental owners, small partnerships.',
        'cta' => 'Choose Standard'
    ],
    [
        'name' => 'PREMIUM',
        'icon' => 'star',
        'tagline' => 'Priority Filing • Faster Delivery • More Support',
        'description' => 'Our most popular option, offering faster turnaround and deeper tax guidance.',
        'color' => 'tax-accent',
        'featured' => true,
        'features' => [
            'Everything in Standard PLUS:',
            '24–48 Hour Priority Delivery',
            'Tax Planning Suggestions',
            'Support for Missing Documents',
            'State + Local Filing Assistance',
            'One Free Revision'
        ],
        'pricing' => [
            ['label' => 'Simple 1040 Individuals', 'price' => '$355'],
            ['label' => '1040 + Schedule C', 'price' => '$425'],
            ['label' => '1065 Partnership', 'price' => '$620'],
            ['label' => '1120 C Corporation / 1120s-S Corporation', 'price' => '$720'],
            ['label' => '1041 Trust & Estate Returns', 'price' => '$520']
        ],
        'idealFor' => 'Self-employed professionals, entrepreneurs, small businesses, multi-state earners.',
        'cta' => 'Choose Premium'
    ],
    [
        'name' => 'PLATINUM',
        'icon' => 'crown',
        'tagline' => 'Complete Full-Service Tax Support',
        'description' => 'Our most comprehensive package for maximum accuracy and year-round support.',
        'color' => 'tax-primary',
        'featured' => false,
        'features' => [
            'Everything in Premium PLUS:',
            'Audit Assistance (Up to IRS Notice Response)',
            '30-Minute Tax Strategy Call',
            'Multi-State Filing',
            'Bookkeeping Review (Up to 3 Hours)',
            'Unlimited Email Support',
            'Same-Day Priority Processing (When Available)'
        ],
        'pricing' => [
            ['label' => 'Simple 1040 Individuals', 'price' => '$530'],
            ['label' => '1040 + Schedule C', 'price' => '$600'],
            ['label' => '1065 Partnership', 'price' => '$795'],
            ['label' => '1120 C Corporation / 1120s-S Corporation', 'price' => '$895'],
            ['label' => '1041 Trust & Estate Returns', 'price' => '$695']
        ],
        'idealFor' => 'Business owners, S-Corporations, real estate investors, high-income individuals.',
        'cta' => 'Choose Platinum'
    ]
];

$additionalServices = [
    ['service' => 'Bookkeeping cleanup', 'price' => 'Starting at $45/hour'],
    ['service' => 'Additional State Return', 'price' => '$50–$75'],
    ['service' => 'Amended Tax Return (1040X)', 'price' => 'Starting at $180'],
    ['service' => 'W-2 & 1099 preparation', 'price' => '$10–$30 per form'],
    ['service' => 'Quarterly estimated tax assistance', 'price' => '$100/quarter']
];
@endphp

<section id="pricing" class="py-20 bg-white">
  <div class="container mx-auto px-4">
    <div class="max-w-7xl mx-auto">
      {{-- Header --}}
      <div class="text-center mb-12 md:mb-16">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-black mb-4 text-gray-900">
          Simple, Clear Pricing
        </h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
          Choose the package that fits your needs. All plans include expert preparation and IRS e-filing.
        </p>
      </div>

      {{-- Pricing Cards --}}
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 mb-16">
        @foreach($packages as $pkg)
          <div class="relative bg-white rounded-3xl shadow-xl border-2 transition-all duration-300 hover:shadow-2xl {{ $pkg['featured'] ? 'border-tax-accent lg:scale-105 lg:-mt-4 lg:mb-4' : 'border-gray-200 hover:border-tax-primary' }}">
            {{-- Popular Badge --}}
            @if($pkg['featured'])
              <div class="absolute -top-5 left-1/2 transform -translate-x-1/2">
                <div class="bg-gradient-to-r from-tax-accent to-tax-accent-dark text-white px-6 py-2 rounded-full text-sm font-bold shadow-lg">
                  ⭐ MOST POPULAR
                </div>
              </div>
            @endif

            <div class="p-6 md:p-8">
              {{-- Icon & Name --}}
              <div class="flex items-center gap-3 mb-6">
                <div class="w-14 h-14 rounded-2xl flex items-center justify-center {{ $pkg['color'] === 'tax-primary' ? 'bg-gradient-to-br from-tax-primary to-tax-primary-700' : 'bg-gradient-to-br from-tax-accent to-tax-accent-dark' }}">
                  <i data-lucide="{{ $pkg['icon'] }}" class="w-7 h-7 text-white"></i>
                </div>
                <div>
                  <h3 class="text-2xl font-black text-gray-900">{{ $pkg['name'] }}</h3>
                </div>
              </div>

              {{-- Tagline --}}
              <p class="text-gray-600 mb-6 leading-relaxed">{{ $pkg['description'] }}</p>

              {{-- Starting Price --}}
              <div class="mb-6 pb-6 border-b-2 border-gray-100">
                <div class="flex items-baseline gap-2">
                  <span class="text-sm text-gray-500">Starting at</span>
                  <span class="text-4xl font-black text-gray-900">{{ $pkg['pricing'][0]['price'] }}</span>
                </div>
                <p class="text-sm text-gray-500 mt-1">{{ $pkg['pricing'][0]['label'] }}</p>
              </div>

              {{-- Features --}}
              <div class="mb-8">
                <h4 class="font-bold text-gray-900 mb-4 text-sm uppercase tracking-wide">What's Included:</h4>
                <ul class="space-y-3">
                  @foreach($pkg['features'] as $feature)
                    <li class="flex items-start gap-3">
                      @if(str_contains($feature, 'Everything'))
                        <span class="font-bold text-gray-800 text-sm">{{ $feature }}</span>
                      @else
                        <i data-lucide="check" class="w-5 h-5 text-tax-success flex-shrink-0 mt-0.5"></i>
                        <span class="text-gray-700 text-sm">{{ $feature }}</span>
                      @endif
                    </li>
                  @endforeach
                </ul>
              </div>

              {{-- Pricing Details - Always Visible --}}
              <div class="mt-6">
                <div class="space-y-2 pl-2">
                  @foreach($pkg['pricing'] as $item)
                    <div class="flex justify-between items-center text-sm py-1">
                      <span class="text-gray-600">{{ $item['label'] }}</span>
                      <span class="font-bold text-gray-900">{{ $item['price'] }}</span>
                    </div>
                  @endforeach
                </div>
              </div>

              {{-- CTA Button --}}
              <div class="mt-6 mb-2">
                <p class="font-bold text-gray-900 text-sm mb-1">Ideal for:</p>
                <p class="text-sm text-gray-600 leading-relaxed">{{ $pkg['idealFor'] }}</p>
              </div>

              <a
                href="https://egbookkeeping.com/contact"
                class="mt-6 block w-full text-center py-4 rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-105 bg-tax-primary hover:bg-tax-primary-600 text-white shadow-lg"
              >
                {{ $pkg['cta'] }}
              </a>
            </div>
          </div>
        @endforeach
      </div>

      {{-- Additional Services --}}
      <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl p-8 md:p-12 mb-16 border border-gray-200">
        <h3 class="text-3xl font-black mb-8 text-gray-900 text-center">
          Additional Services
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach($additionalServices as $item)
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 hover:border-tax-primary hover:shadow-lg transition-all duration-300">
              <p class="font-bold text-gray-900 mb-2 text-lg">{{ $item['service'] }}</p>
              <p class="text-tax-primary font-black text-xl">{{ $item['price'] }}</p>
            </div>
          @endforeach
        </div>
      </div>

      {{-- Bottom CTA --}}
      <div class="bg-gradient-to-r from-tax-primary-50 via-tax-primary-100 to-tax-primary-200 rounded-3xl p-8 md:p-12 text-center text-gray-800 shadow-2xl relative overflow-hidden">
        {{-- Decorative elements --}}
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-5 rounded-full -ml-24 -mb-24"></div>

        <div class="relative z-10">
          <h3 class="text-3xl md:text-4xl font-black mb-4 text-gray-900">
            Ready to Maximize Your Refund?
          </h3>
          <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
            Start with a free consultation and discover how much you could save this tax season
          </p>
          <a
            href="https://egbookkeeping.com/contact"
            class="inline-flex items-center gap-3 bg-tax-primary text-white px-10 py-4 rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl hover:bg-tax-primary-600 transform hover:scale-105 transition-all duration-300"
          >
            Get Your Free Consultation
            <i data-lucide="arrow-right" class="w-6 h-6"></i>
          </a>
          <p class="mt-6 text-gray-600 text-sm">
            ✓ No obligation • ✓ 100% Free • ✓ IRS Authorized
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
