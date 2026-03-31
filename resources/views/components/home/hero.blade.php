<section class="relative bg-gray-50 py-16 md:py-24">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-[1.2fr_1fr] gap-12 items-start">
            <!-- Left Column - Hero Content -->
            <div class="space-y-5">
                <!-- Small Orange Label -->
                <div class="inline-block">
                    <span class="text-eg-accent font-bold text-sm uppercase tracking-wider">EG Bookkeeping Services</span>
                </div>

                <!-- Main Headline -->
                <h1 class="text-4xl lg:text-5xl font-bold text-eg-heading leading-tight font-display">
                    Your One-Stop Solution for Smarter Business Finances.
                </h1>

                <!-- Subhead Paragraph -->
                <p class="text-base text-eg-subheading leading-relaxed font-bold text-justify">
                    Expert Bookkeeping, Payroll, Tax Prep & Fractional CFO Services Tailored for Individual, C Corps, S Corps, Partnerships, Small Business, Law Firms & Real Estate Investors.
                </p>

                <!-- Body Paragraph -->
                <p class="text-eg-body leading-relaxed text-justify">
                    At EG Bookkeeping LLC, we simplify your finances with expert care. As certified QuickBooks and Xero ProAdvisors, we offer reliable services—so you can focus on your business while we handle the numbers. Partner with us to manage your finances and better financial decisions—reach out today.
                </p>

                <!-- CTA Button -->
                <div class="pt-2">
                    <x-ui.button 
                        href="{{ url('/contact') }}" 
                        size="lg"
                        class="bg-eg-button hover:bg-eg-primary text-white font-semibold px-8 py-3 rounded-md text-base transition-colors"
                    >
                        Let's Get Started
                    </x-ui.button>
                </div>
            </div>

            <!-- Right Column - Image -->
            <div class="relative flex items-start justify-end">
                <img 
                    src="{{ asset('images/Designer2-1536x878.webp') }}" 
                    alt="EG Bookkeeping Services" 
                    class="w-full max-w-lg h-auto object-contain rounded-2xl shadow-lg"
                />
            </div>
        </div>
    </div>
</section>
