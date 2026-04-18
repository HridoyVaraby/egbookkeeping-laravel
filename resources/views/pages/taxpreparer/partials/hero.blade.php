<section class="relative bg-white overflow-hidden">
  {{-- Background decorative elements --}}
  <div class="absolute inset-0 overflow-hidden">
    <div class="absolute -top-40 -right-40 w-80 h-80 bg-tax-primary-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-tax-blob"></div>
    <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-tax-accent/20 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-tax-blob animation-delay-2000"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-tax-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-tax-blob animation-delay-4000"></div>
  </div>

  <div class="container mx-auto px-4 pt-8 pb-12 md:pt-16 md:pb-24 relative z-10">
    <div class="max-w-7xl mx-auto">
      <div class="flex justify-center mb-6">
        <img src="{{ asset('images/taxpreparer/logo.svg') }}" alt="EG Bookkeeping LLC" class="h-14 sm:h-16 w-auto" />
      </div>
      <div class="flex justify-center mb-8">
        <div class="inline-flex items-center gap-2 bg-gradient-to-r from-tax-primary-50 to-yellow-100/50 border-2 border-tax-primary rounded-full px-6 py-2.5 shadow-sm">
          <i data-lucide="shield" class="w-5 h-5 text-tax-primary"></i>
          <span class="text-gray-800 font-semibold text-sm">TAX PREPARER</span>
        </div>
      </div>

      {{-- Main content grid --}}
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-20 items-center mb-16">
        {{-- Left column - Text content --}}
        <div class="text-center lg:text-left lg:col-span-5">
          <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-black mb-6 text-gray-900" style="line-height: 1.2;">
            IRS-Registered
            <span class="block bg-gradient-to-r from-tax-primary to-tax-primary-700 bg-clip-text text-transparent">
              Tax Preparer,
            </span>
            Fast, Accurate & Stress-Free
          </h1>

          <p class="text-xl md:text-2xl text-gray-600 mb-8 leading-relaxed">
            Maximize your refund with expert tax preparation for individuals, self-employed professionals, small businesses and Trust & Estate Returns—100% IRS-compliant and powered by professional tax software.
          </p>

          {{-- CTA Button --}}
          <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-8">
            <a
              href="https://egbookkeeping.com/contact"
              class="group inline-flex items-center justify-center gap-3 bg-tax-primary hover:bg-tax-primary-600 text-white px-8 py-4 rounded-xl font-bold text-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300"
            >
              Get FREE Consultation
              <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
            </a>
            <a
              href="#pricing"
              class="inline-flex items-center justify-center gap-2 bg-white border-2 border-gray-300 hover:border-tax-primary text-gray-800 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300"
            >
              View Pricing
            </a>
          </div>

          <div class="flex flex-wrap justify-center lg:justify-start gap-6 text-sm text-gray-600">
            <div class="flex items-center gap-2">
              <svg class="w-5 h-5 text-tax-success" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              <span>No obligation</span>
            </div>
            <div class="flex items-center gap-2">
              <svg class="w-5 h-5 text-tax-success" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              <span>100% Free</span>
            </div>
            <div class="flex items-center gap-2">
              <svg class="w-5 h-5 text-tax-success" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              <span>Fast response</span>
            </div>
          </div>
        </div>

        {{-- Right column - Banner Image --}}
        <div class="lg:col-span-7 relative">
          <div class="mb-6 relative z-10 transform hover:scale-[1.02] transition-transform duration-500">
            <div class="absolute -inset-4 bg-gradient-to-r from-tax-primary-100 to-tax-accent/20 rounded-3xl blur-2xl opacity-60 -z-10"></div>
            <img
              src="{{ asset('images/taxpreparer/banner.webp') }}"
              alt="Tax Filing Stats"
              class="w-full h-auto rounded-2xl shadow-2xl border border-gray-100"
            />
          </div>
          <div class="flex justify-center lg:justify-end animate-tax-fade-in">
            <div class="inline-flex items-center gap-2 bg-gradient-to-r from-tax-success/10 to-tax-primary-50 border-2 border-tax-success rounded-full px-4 py-1.5 shadow-sm">
              <i data-lucide="shield" class="w-4 h-4 text-tax-success"></i>
              <span class="text-gray-800 font-semibold text-sm sm:text-base">IRS Registered & Valid PTIN Holder • 20+ Years Financial Expert</span>
            </div>
          </div>
        </div>
      </div>

      {{-- Who we serve badges --}}
      <div class="text-center">
        <p class="text-sm text-gray-500 mb-4 uppercase tracking-wider font-semibold">Trusted By</p>
        <div class="flex flex-wrap justify-center gap-3">
          @foreach(['W-2 Employees', 'Self-Employed', 'Gig Workers', 'Small Business', 'Real Estate', 'Freelancers', 'Trust & Estate'] as $item)
            <span class="bg-gray-100 hover:bg-tax-primary-50 px-4 py-2 rounded-lg text-sm text-gray-700 font-medium border border-gray-200 hover:border-tax-primary-200 transition-colors">
              {{ $item }}
            </span>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
