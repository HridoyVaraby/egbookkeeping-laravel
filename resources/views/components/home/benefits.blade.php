@php
    $benefits = [
        [
            'icon' => 'dollar-sign',
            'title' => 'Time & Cost Savings',
            'description' => 'Save 240+ hours and cut at least $40k a year in hiring costs with our expert bookkeeping. We work five days a week (but not limited to), giving you the freedom to focus on your business.',
        ],
        [
            'icon' => 'trending-up',
            'title' => 'Informed Decisions',
            'description' => 'Make informed decisions with dependable financial data, concise reports, and expert advice.',
        ],
        [
            'icon' => 'file-text',
            'title' => 'Optimized Finances',
            'description' => 'Prevent overpayments, remain confident during audits, and maximize your tax deductions efficiently.',
        ],
        [
            'icon' => 'target',
            'title' => 'Accuracy Focus',
            'description' => 'We ensure every number is accurate, reducing fraud risks and errors, safeguarding your financial health.',
        ],
        [
            'icon' => 'pie-chart',
            'title' => 'Financial Insights',
            'description' => "Our bookkeeper organizes and reconciles your financial data, providing clear and insightful reports on your business's health.",
        ],
        [
            'icon' => 'zap',
            'title' => 'Boost Efficiency',
            'description' => 'Experience improved efficiency and productivity through enhanced processes, workflows, and systems in your business.',
        ],
    ];
@endphp

<section id="benefits" class="scroll-mt-20 bg-[linear-gradient(180deg,_#f8fbff_0%,_#ffffff_100%)] py-16">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-12 max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-2 font-display">
                <span class="text-eg-accent">Benefits</span> Exceed The Investment
            </h2>
            <p class="text-[18px] leading-[26px] font-sans text-[#4B5563]">
                By leveraging our expertise, your investment in our bookkeeping services delivers 
                exceptional returns, both in saved time and optimized financial health.
            </p>
        </div>

        <!-- Benefits Grid -->
        <div class="grid max-w-6xl gap-6 md:grid-cols-2 lg:grid-cols-3 mx-auto">
            @foreach($benefits as $benefit)
                <div class="rounded-[26px] border border-slate-100 bg-white p-6 shadow-[0_16px_40px_rgba(15,23,42,0.06)] transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_24px_60px_rgba(15,23,42,0.1)]">
                    <div class="flex gap-4">
                    <!-- Icon -->
                    <div class="flex-shrink-0">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#FFF4E4] shadow-sm">
                            <i data-lucide="{{ $benefit['icon'] }}" class="w-6 h-6 text-eg-accent" stroke-width="2"></i>
                        </div>
                    </div>

                    <!-- Content -->
                    <div>
                        <h3 class="text-[24px] leading-[26px] font-semibold text-[#1F2937] mb-4 font-display">
                            {{ $benefit['title'] }}
                        </h3>
                        <p class="text-[16px] leading-[26px] font-normal font-sans text-[#4B5563]">
                            {{ $benefit['description'] }}
                        </p>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
