@php
$steps = [
    [
        'icon' => 'calendar',
        'title' => 'Book Your Free Tax Consultation',
        'description' => 'Ask questions, discuss your tax situation, and get clarity.',
        'color' => 'bg-amber-500'
    ],
    [
        'icon' => 'upload',
        'title' => 'Upload Your Documents Securely',
        'description' => 'Use our encrypted client portal (W-2, 1099, 1098, expenses, etc.).<br /><br />To proceed with our services, please download the appropriate onboarding packet below. Once completed, simply return the form to us via email or WhatsApp. You can find our contact details on the <a href="https://egbookkeeping.com/contact/" class="text-tax-primary hover:underline">Contact page</a>.<br /><br /><a href="https://drive.google.com/file/d/1dxolfZTtj2U56SXRC9hA1eEd9_eYDel3/view?usp=sharing" target="_blank" rel="noopener noreferrer" class="text-tax-primary hover:underline block mb-1">Individual Tax Onboarding Packet Link</a><a href="https://drive.google.com/file/d/1PaBnLQnpAErSnlODvDmDNS288oz9U9qD/view?usp=sharing" target="_blank" rel="noopener noreferrer" class="text-tax-primary hover:underline block">Business Tax Onboarding Packet Link</a>',
        'color' => 'bg-amber-500'
    ],
    [
        'icon' => 'file-text',
        'title' => 'We Prepare Everything Accurately',
        'description' => 'Using professional tax software + 20 years of experience.',
        'color' => 'bg-amber-500'
    ],
    [
        'icon' => 'clipboard-check',
        'title' => 'You Review & Approve the Draft',
        'description' => 'We make changes if needed.',
        'color' => 'bg-amber-500'
    ],
    [
        'icon' => 'send',
        'title' => 'We E-File Federal & State',
        'description' => 'You receive confirmation + refund tracking.',
        'color' => 'bg-amber-500'
    ]
];
@endphp

<section id="process" class="py-20 bg-gradient-to-b from-white via-gray-50 to-white">
  <div class="container mx-auto px-4">
    <div class="max-w-7xl mx-auto">
      {{-- Header --}}
      <div class="text-center mb-12 md:mb-20">
        <span class="inline-block bg-tax-primary-50 text-tax-primary-700 border-2 border-tax-primary px-4 py-2 rounded-full font-semibold text-sm mb-4">
          SIMPLE & SECURE
        </span>
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-black mb-4 text-gray-900">
          HOW OUR FILING PROCESS WORKS
        </h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
          From consultation to refund in 5 simple steps
        </p>
      </div>

      {{-- Steps - Vertical Alternating Timeline --}}
      <div class="mb-24 relative max-w-6xl mx-auto">
        {{-- Central Line (Desktop) --}}
        <div class="absolute left-1/2 transform -translate-x-1/2 top-0 bottom-0 w-0.5 bg-gray-100 hidden lg:block"></div>

        <div class="space-y-12 lg:space-y-0">
          @foreach($steps as $index => $step)
            @php $isEven = $index % 2 !== 0; @endphp
            <div class="flex flex-col lg:flex-row items-center justify-between w-full group {{ $isEven ? 'lg:flex-row-reverse' : '' }}">

              {{-- Card Side --}}
              <div class="w-full lg:w-[calc(50%-3rem)] relative mb-8 lg:mb-0">
                <div class="bg-white p-8 rounded-2xl shadow-[0_10px_40px_-10px_rgba(0,0,0,0.05)] border border-gray-100 relative hover:-translate-y-1 transition-all duration-300 flex flex-col-reverse {{ $isEven ? 'lg:flex-row' : 'lg:flex-row-reverse' }} gap-6 items-center">

                  {{-- Triangle Pointer --}}
                  <div class="hidden lg:block absolute top-1/2 -translate-y-1/2 w-5 h-5 bg-white transform rotate-45 border-gray-100 {{ $isEven ? '-left-2.5 border-l border-b' : '-right-2.5 border-r border-t' }}"></div>

                  {{-- Text Content --}}
                  <div class="flex-1 text-center {{ $isEven ? 'lg:text-left' : 'lg:text-right' }}">
                    <span class="text-xs font-bold tracking-wider text-tax-primary/60 uppercase mb-2 block">
                      Step {{ $index + 1 }}
                    </span>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $step['title'] }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">{!! $step['description'] !!}</p>
                  </div>

                  {{-- Icon --}}
                  <div class="relative flex-shrink-0 w-16 h-16 rounded-full {{ $step['color'] }} flex items-center justify-center shadow-lg text-white transform group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="{{ $step['icon'] }}" class="w-7 h-7"></i>
                  </div>
                </div>
              </div>

              {{-- Center Dot --}}
              <div class="relative flex items-center justify-center w-12 lg:w-24 flex-shrink-0 mb-8 lg:mb-0">
                <div class="w-4 h-4 rounded-full bg-white border-[3px] border-tax-primary z-10 shadow-sm ring-4 ring-white"></div>
              </div>

              {{-- Label Side (Opposite) --}}
              <div class="w-full lg:w-[calc(50%-3rem)] hidden lg:block">
                <div class="{{ $isEven ? 'text-right pr-4' : 'text-left pl-4' }}">
                  <span class="text-2xl font-black text-gray-200 block mb-1">0{{ $index + 1 }}</span>
                  <span class="text-gray-400 font-medium text-sm uppercase tracking-widest">{{ explode(' ', $step['title'])[0] }} Phase</span>
                </div>
              </div>

            </div>
          @endforeach
        </div>
      </div>

      {{-- Benefits Grid --}}
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-gradient-to-br from-tax-primary-50 to-tax-primary-100 rounded-2xl p-6 border-2 border-tax-primary-200">
          <i data-lucide="check-circle" class="w-10 h-10 text-tax-primary mb-3"></i>
          <h4 class="font-bold text-lg text-gray-900 mb-2">Fast Turnaround</h4>
          <p class="text-gray-600 text-sm">Most returns completed Fast & Accurate</p>
        </div>
        <div class="bg-gradient-to-br from-tax-success/10 to-tax-success/20 rounded-2xl p-6 border-2 border-tax-success">
          <i data-lucide="check-circle" class="w-10 h-10 text-tax-success mb-3"></i>
          <h4 class="font-bold text-lg text-gray-900 mb-2">Secure Process</h4>
          <p class="text-gray-600 text-sm">Bank-level encryption for all documents</p>
        </div>
        <div class="bg-gradient-to-br from-tax-accent-light/20 to-tax-accent/30 rounded-2xl p-6 border-2 border-tax-accent">
          <i data-lucide="check-circle" class="w-10 h-10 text-tax-accent mb-3"></i>
          <h4 class="font-bold text-lg text-gray-900 mb-2">Expert Support</h4>
          <p class="text-gray-600 text-sm">Direct access to IRS-authorized preparers</p>
        </div>
      </div>

      {{-- Guarantee Banner --}}
      <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 rounded-3xl p-8 md:p-12 text-center text-white shadow-2xl relative overflow-hidden">
        {{-- Decorative elements --}}
        <div class="absolute top-0 right-0 w-64 h-64 bg-tax-success/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-tax-primary/10 rounded-full blur-3xl"></div>

        <div class="relative z-10">
          <div class="inline-flex items-center justify-center w-20 h-20 bg-tax-success/20 rounded-full mb-6">
            <i data-lucide="shield" class="w-12 h-12 text-tax-success"></i>
          </div>
          <h3 class="text-3xl md:text-4xl font-black mb-4">
            100% Accuracy Guarantee
          </h3>
          <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
            If we make a mistake, we fix it FREE and handle any IRS correspondence at no charge. Your peace of mind is guaranteed.
          </p>
          <a
            href="https://egbookkeeping.com/contact"
            class="inline-flex items-center gap-3 bg-tax-primary hover:bg-tax-primary-600 text-white px-10 py-4 rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300"
          >
            Start Your Tax Filing
            <i data-lucide="arrow-right" class="w-6 h-6"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
