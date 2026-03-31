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

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-12 max-w-3xl mx-auto">
            <h2 class="text-4xl lg:text-5xl font-bold text-eg-heading mb-4 font-display">
                <span class="text-eg-accent italic">Benefits</span> Exceed The Investment
            </h2>
            <p class="text-eg-body text-base leading-relaxed">
                By leveraging our expertise, your investment in our bookkeeping services delivers 
                exceptional returns, both in saved time and optimized financial health.
            </p>
        </div>

        <!-- Benefits Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @foreach($benefits as $benefit)
                <div class="flex gap-4">
                    <!-- Icon -->
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 rounded-full bg-white shadow-sm flex items-center justify-center">
                            <i data-lucide="{{ $benefit['icon'] }}" class="w-6 h-6 text-eg-heading" stroke-width="2"></i>
                        </div>
                    </div>

                    <!-- Content -->
                    <div>
                        <h3 class="text-xl font-bold text-eg-heading mb-2 font-display">
                            {{ $benefit['title'] }}
                        </h3>
                        <p class="text-eg-body text-sm leading-relaxed">
                            {{ $benefit['description'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
