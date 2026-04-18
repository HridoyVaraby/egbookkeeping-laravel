@php
$services = [
    [
        'iconPath' => asset('images/taxpreparer/icons/Individual-Returns.png'),
        'title' => 'Individual Returns',
        'description' => 'Forms 1040, 1040-SR, 1040-NR with all related schedules and forms',
        'color' => 'from-tax-primary to-tax-primary-700'
    ],
    [
        'iconPath' => asset('images/taxpreparer/icons/Business-Filings.png'),
        'title' => 'Business Filings',
        'description' => 'C-Corp (1120), S-Corp (1120-S), Partnership (1065), returns with <br /> all related schedules and forms',
        'color' => 'from-tax-accent to-tax-accent-dark'
    ],
    [
        'iconPath' => asset('images/taxpreparer/icons/trust.png'),
        'title' => 'Trust & Estate Filings',
        'description' => 'We handle complex 1041 filings with precision—protecting beneficiaries, reducing tax liabilities, and ensuring full IRS compliance.',
        'color' => 'from-tax-accent to-tax-accent-dark'
    ],
    [
        'iconPath' => asset('images/taxpreparer/icons/Self-Employed.png'),
        'title' => 'Self-Employed',
        'description' => 'Schedule C, gig workers, freelancers and contractors',
        'color' => 'from-tax-primary-600 to-tax-primary-800'
    ],
    [
        'iconPath' => asset('images/taxpreparer/icons/tax.png'),
        'title' => 'Federal Returns',
        'description' => 'Expertly prepared federal tax returns—optimized for maximum refund, minimum stress, and full IRS compliance',
        'color' => 'from-tax-accent-light to-tax-accent'
    ],
    [
        'iconPath' => asset('images/taxpreparer/icons/State-Returns.png'),
        'title' => 'State Returns',
        'description' => 'All 50 states, multi-state filing',
        'color' => 'from-tax-accent-light to-tax-accent'
    ],
    [
        'iconPath' => asset('images/taxpreparer/icons/IRS-Resolution.png'),
        'title' => 'IRS Resolution',
        'description' => 'Audits, notices, amended returns',
        'color' => 'from-tax-primary-400 to-tax-primary-600'
    ]
];
@endphp

<section id="services" class="py-20 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="max-w-6xl mx-auto">
      {{-- Header --}}
      <div class="text-center mb-16">
        <span class="inline-block bg-tax-primary-50 text-tax-primary-700 border-2 border-tax-primary px-4 py-2 rounded-full font-semibold text-sm mb-4">
          OUR SERVICES
        </span>
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-black mb-4 text-gray-900">
          Complete Tax Solutions
        </h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
          From simple returns to complex business filings, we handle it all with precision
        </p>
      </div>

      {{-- Services Grid --}}
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        @foreach($services as $service)
          <div class="group bg-white rounded-2xl p-8 shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
            <div class="w-20 h-20 rounded-xl bg-transparent border-2 border-solid border-tax-primary flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
              <img src="{{ $service['iconPath'] }}" alt="{{ $service['title'] }}" class="w-12 h-12" />
            </div>
            <h3 class="text-2xl font-bold mb-3 text-gray-900">{{ $service['title'] }}</h3>
            <p class="text-gray-600 leading-relaxed">{!! $service['description'] !!}</p>
          </div>
        @endforeach

        {{-- CTA Card --}}
        <div class="bg-gradient-to-br from-tax-primary-50 to-tax-primary-100 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 flex flex-col justify-center items-center text-center text-gray-800">
          <h3 class="text-2xl font-bold mb-3 text-gray-900">Need Something Else?</h3>
          <p class="text-gray-600 mb-6">We handle all tax situations</p>
          <a
            href="https://egbookkeeping.com/contact"
            class="inline-flex items-center gap-2 bg-tax-primary text-white px-6 py-3 rounded-lg font-bold hover:bg-tax-primary-600 transition-colors"
          >
            Contact Us
            <i data-lucide="arrow-right" class="w-5 h-5"></i>
          </a>
        </div>
      </div>

      {{-- Bottom CTA Banner --}}
      <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl p-8 md:p-12 text-center text-white shadow-xl">
        <h3 class="text-3xl md:text-4xl font-bold mb-4">
          Expert in All Federal & State Returns
        </h3>
        <p class="text-xl text-gray-300 mb-8 max-w-3xl mx-auto">
          Maximize Your Refund With Expert Deductions & Credits Review.
        </p>
        <a
          href="https://egbookkeeping.com/contact"
          class="inline-flex items-center gap-3 bg-tax-primary hover:bg-tax-primary-600 text-white px-10 py-4 rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300"
        >
          Get Started Today
          <i data-lucide="arrow-right" class="w-6 h-6"></i>
        </a>
      </div>
    </div>
  </div>
</section>
