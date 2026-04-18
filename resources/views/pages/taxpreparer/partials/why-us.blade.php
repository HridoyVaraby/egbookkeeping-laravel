@php
$benefits = [
    [
        'iconPath' => asset('images/taxpreparer/icons/IRS-Compliant.png'),
        'title' => '100% IRS Compliant',
        'description' => 'Authorized preparer with valid PTIN'
    ],
    [
        'iconPath' => asset('images/taxpreparer/icons/24-72-Hour-Filing.png'),
        'title' => 'Fast & Accurate Filing',
        'description' => 'Fast turnaround, quick refunds'
    ],
    [
        'iconPath' => asset('images/taxpreparer/icons/Maximum-Refund.png'),
        'title' => 'Maximum Refund',
        'description' => 'Every deduction & credits you deserve'
    ],
    [
        'iconPath' => asset('images/taxpreparer/icons/Secure-Portal.png'),
        'title' => 'Secure Portal',
        'description' => 'Protected with bank-grade encryption to keep your documents and data safe'
    ],
    [
        'iconPath' => asset('images/taxpreparer/icons/Zero-Errors.png'),
        'title' => 'Zero Errors',
        'description' => 'Accuracy guaranteed or free fix'
    ],
    [
        'iconPath' => asset('images/taxpreparer/icons/Expert-Support.png'),
        'title' => 'Expert Support',
        'description' => '20+ years of financial expertise'
    ]
];
@endphp

<section class="py-20 bg-white">
  <div class="container mx-auto px-4">
    <div class="max-w-6xl mx-auto">
      {{-- Header --}}
      <div class="text-center mb-16">
        <span class="inline-block bg-tax-primary-50 text-tax-primary-700 border-2 border-tax-primary px-4 py-2 rounded-full font-semibold text-sm mb-4">
          WHY CHOOSE US
        </span>
        <h2 class="text-4xl md:text-5xl font-black mb-4 text-gray-900">
          The EG Bookkeeping Advantage
        </h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
          Professional tax preparation that saves you time and maximizes your refund
        </p>
      </div>

      {{-- Benefits Grid --}}
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
        @foreach($benefits as $benefit)
          <div class="group bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 border-2 border-gray-200 hover:border-tax-primary hover:shadow-lg transition-all duration-300">
            <div class="w-12 h-12 rounded-xl bg-transparent border-2 border-solid border-tax-primary-50 flex items-center justify-center mb-4 transition-colors">
              <img src="{{ $benefit['iconPath'] }}" alt="{{ $benefit['title'] }}" class="w-8 h-8" />
            </div>
            <h3 class="font-bold text-xl text-gray-900 mb-2">{{ $benefit['title'] }}</h3>
            <p class="text-gray-600">{{ $benefit['description'] }}</p>
          </div>
        @endforeach
      </div>

      {{-- Special Offer Banner --}}
      <div class="relative bg-gradient-to-r from-tax-primary-50 via-tax-primary-100 to-tax-primary-200 rounded-3xl p-8 md:p-12 text-gray-800 overflow-hidden shadow-2xl">
        {{-- Decorative elements --}}
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-5 rounded-full -ml-24 -mb-24"></div>

        <div class="relative z-10 text-center">
          <div class="inline-flex items-center gap-2 bg-white text-gray-900 px-4 py-2 rounded-full font-bold text-sm mb-6">
            <i data-lucide="zap" class="w-4 h-4"></i>
            LIMITED TIME OFFER
          </div>

          <h3 class="text-3xl md:text-5xl font-black mb-4 text-gray-900">
            Get 10% OFF Your First Filing
          </h3>

          <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
            New clients save on all tax preparation services. Valid through December 2025.
          </p>

          <a
            href="https://egbookkeeping.com/contact"
            class="inline-flex items-center gap-3 bg-tax-primary text-white px-10 py-4 rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl hover:bg-tax-primary-600 transform hover:scale-105 transition-all duration-300"
          >
            Claim Your Discount
            <i data-lucide="arrow-right" class="w-6 h-6"></i>
          </a>

          <p class="mt-6 text-gray-600 text-sm">
            ✓ No commitment required • ✓ Free consultation included
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
