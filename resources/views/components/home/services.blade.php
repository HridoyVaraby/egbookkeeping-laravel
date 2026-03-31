@php
    $services = [
        [
            'icon' => asset('images/service-icons/Catch-Up-Clean-Up.png'),
            'title' => 'Catch-Up & Clean-Up Bookkeeping',
            'description' => "Behind on your books? We'll bring you up to date—fast. Get a full year's bookkeeping done in just 2–3 weeks for stress-free tax filing and peace of mind.",
            'idealFor' => "This service is perfect for small businesses and startups looking to stay financially organized. It's also well-suited for professionals in real estate and property management, legal firms and practitioners, nonprofit organizations and NGOs, as well as businesses in the hospitality sector.",
            'includes' => [
                'Up to 12 months of bookkeeping done quickly',
                'Full account reconciliation (banks, credit cards, PayPal, etc.)',
                'Clean, accurate financials ready for tax time',
                'Fix errors, duplicates, and missing entries',
                'QuickBooks & Xero expertise included'
            ],
            'cta' => "Ready to get caught up? Let's clean up your books so you can focus on growing your business."
        ],
        [
            'icon' => asset('images/service-icons/monthly-bookkeeping.png'),
            'title' => 'Monthly Bookkeeping',
            'description' => 'Stay stress-free with reliable monthly bookkeeping. We track your transactions weekly and deliver simple, clear reports each month—so you always know where your business stands.',
            'idealFor' => 'This service is perfect for Small Businesses & Startups, Real Estate & Property Management, Law Firms & Legal Professionals, Nonprofits & NGOs, and Hospitality.',
            'includes' => [
                'Weekly transaction tracking',
                'Monthly account reconciliations',
                'Clear financial reports (P&L, balance sheet, cash flow)',
                'Insights to grow and manage cash flow confidently'
            ],
            'cta' => 'Let us handle the books—so you can focus on growth.'
        ],
        [
            'icon' => asset('images/service-icons/Real-Estate.png'),
            'title' => 'Monthly Real Estate Bookkeeping',
            'description' => 'Real estate bookkeeping made easy. Designed for real estate professionals, our monthly service tracks every transaction so you can focus on growing your portfolio—not managing spreadsheets.',
            'idealFor' => 'Rental property owners, real estate investors & flippers, property managers & landlords, and short-term & vacation rental hosts (Airbnb, VRBO).',
            'includes' => [
                'Accurate tracking of rental income & property expenses',
                'Categorization by property or unit',
                'Monthly P&L, balance sheet, and cash flow reports',
                'Reconciliation of bank, mortgage, and escrow accounts',
                'Support with tax prep and Schedule E reporting'
            ],
            'cta' => 'Keep your books clean, your cash flow visible, and your ROI strong—month after month.'
        ],
        [
            'icon' => asset('images/service-icons/Legal.png'),
            'title' => 'Monthly Legal Bookkeeping',
            'description' => "Focus on clients. We'll handle the books. Our specialized legal bookkeeping service ensures your firm's financials are accurate, organized, and fully compliant.",
            'idealFor' => 'Law firm owners & managing partners, solo attorneys & boutique firms, and legal practices using IOLTA/trust accounts.',
            'includes' => [
                'Accurate tracking of revenue, retainers & expenses',
                'Perform monthly 3-way trust account reconciliations (IOLTA)',
                'Monthly 3-way reconciliation',
                'Matter-by-matter bookkeeping',
                'Monthly financial reports (P&L, balance sheet, trust ledgers)',
                'Support for audit readiness & tax filing'
            ],
            'cta' => 'Trust your books to experts who understand the legal industry.'
        ],
        [
            'icon' => asset('images/service-icons/Payroll-removebg-preview.webp'),
            'title' => 'Payroll Services',
            'description' => 'Accurate. Compliant. Hassle-Free. At EG Bookkeeping, we offer Standard Payroll Services that go beyond just paying employees.',
            'includes' => [
                'Timely payroll processing (weekly, bi-weekly, or monthly)',
                'Federal & state payroll tax filings',
                'New hire reporting and employee onboarding',
                'W-2s and 1099s at year-end',
                'Accurate payroll records for audits and financial reporting'
            ],
            'cta' => 'Less payroll stress. More time to grow.',
            'ctaButton' => 'Schedule your free payroll consultation today!'
        ],
        [
            'icon' => asset('images/service-icons/tax-removebg-preview.webp'),
            'title' => 'U.S. Tax Services',
            'description' => 'Fast. Accurate. Stress-Free. IRS Compliant. At EG Bookkeeping LLC, we make tax season easy—so you can focus on what matters most.',
            'includes' => [
                'Federal tax return prep: 1040, 1040-SR, 1040-NR',
                'Business tax filings: C Corp, S Corp, and Partnership returns',
                'Schedule C filing for freelancers & gig workers',
                'State income tax preparation for all states',
                'IRS notices, audits & penalty relief support'
            ],
            'cta' => 'No stress. No surprises. Just expert tax help you can count on.',
            'ctaButton' => 'Book your free consultation today!'
        ]
    ];
@endphp

<section class="py-16 md:py-20 bg-white">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-12 animate-on-scroll">
            <h2 class="text-3xl md:text-4xl font-bold mb-2 font-display">
                Our <span class="text-eg-accent">Services</span>
            </h2>
            <p class="text-[18px] leading-[26px] font-sans text-eg-body">Let's Simplify Your Bookkeeping Together</p>
        </div>

        <!-- Services Grid -->
        <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto">
            @foreach($services as $service)
                <div class="bg-white rounded-xl p-8 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] border border-gray-100 transition-all duration-300 hover:shadow-lg animate-on-scroll delay-{{ ($loop->index % 4 + 1) * 100 }}">
                    <!-- Icon -->
                    <div class="mb-6 flex justify-start">
                        <!-- Outer white circle with border -->
                        <div class="w-[90px] h-[90px] rounded-full border border-[#FFE4DC] bg-white flex items-center justify-center shadow-sm">
                            <!-- Inner solid yellow circle with the image -->
                            <div class="w-[72px] h-[72px] bg-eg-primary rounded-full flex items-center justify-center">
                                <img src="{{ $service['icon'] }}" alt="{{ $service['title'] }}" class="w-11 h-11 object-contain" />
                            </div>
                        </div>
                    </div>

                    <!-- Title -->
                    <h3 class="text-[24px] leading-[26px] font-semibold text-[#1F2937] mb-5 font-display">{{ $service['title'] }}</h3>

                    <!-- Description -->
                    <p class="text-[16px] leading-[26px] font-normal font-sans text-[#4B5563] mb-6">{{ $service['description'] }}</p>

                    <!-- Ideal For -->
                    @if(isset($service['idealFor']))
                        <div class="mb-6">
                            <p class="text-[16px] leading-[26px] font-semibold font-sans text-[#1F2937] mb-3">Ideal for:</p>
                            <p class="text-[16px] leading-[26px] font-normal font-sans text-[#4B5563]">{{ $service['idealFor'] }}</p>
                        </div>
                    @endif

                    <!-- Features -->
                    <div class="mb-8">
                        <p class="text-[16px] leading-[26px] font-semibold font-sans text-[#1F2937] mb-4">
                            @if(str_contains($service['title'], 'Real Estate'))
                                What You Get:
                            @elseif(str_contains($service['title'], 'Tax'))
                                What We Offer:
                            @else
                                What's Included:
                            @endif
                        </p>
                        <ul class="space-y-2">
                            @foreach($service['includes'] as $item)
                                <li class="flex items-start text-[16px] leading-[26px] font-normal font-sans text-[#4B5563]">
                                    <div class="bg-[#71B55E] rounded-sm w-[18px] h-[18px] flex items-center justify-center shrink-0 mr-3 mt-[4px]">
                                        <i data-lucide="check" class="w-3 h-3 text-white" stroke-width="3"></i>
                                    </div>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- CTA Text -->
                    @if(isset($service['cta']))
                        <div class="flex items-start">
                            <!-- Optional icon based on index could go here, omitting to keep strictly to data -->
                            <p class="text-[16px] leading-[26px] font-sans text-[#4B5563]">
                                @php
                                    $ctaStr = $service['cta'];
                                    // Use strong for first sentence if matches a question or dash
                                    $ctaFormatted = preg_replace('/^([^?\—]+[?\—])\s*/', '<strong class="text-[#1F2937]">$1</strong> ', $ctaStr);
                                @endphp
                                {!! $ctaFormatted === $ctaStr ? '<strong class="text-[#1F2937]">'.$ctaStr.'</strong>' : $ctaFormatted !!}
                            </p>
                        </div>
                    @endif

                    <!-- CTA Button Text -->
                    @if(isset($service['ctaButton']))
                        <p class="text-[16px] leading-[26px] text-eg-accent font-semibold mt-4">
                            {{ $service['ctaButton'] }}
                        </p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
