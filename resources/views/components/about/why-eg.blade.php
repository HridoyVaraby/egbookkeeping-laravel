@php
    $reasons = [
        [
            'title' => 'Experienced Professionals',
            'description' => "Our team consists of certified bookkeepers and accountants with extensive knowledge in financial reporting, tax compliance, and payroll management.",
        ],
        [
            'title' => 'Tailored Solutions',
            'description' => "We offer customized bookkeeping and accounting services to fit your specific needs—whether you're a startup, small business, or growing enterprise.",
        ],
        [
            'title' => 'Affordable Pricing',
            'description' => 'Our bookkeeping services are designed to be cost-effective with no hidden fees. We provide transparent pricing plans for all budgets.',
        ],
        [
            'title' => 'Advanced Technology',
            'description' => 'We use the latest cloud-based accounting software such as QuickBooks, Xero, Silo, etc, ensuring secure and accessible data.',
        ],
        [
            'title' => 'Comprehensive Services',
            'description' => 'From day-to-day bookkeeping to financial strategy and tax planning, we provide a one-stop solution for all your needs.',
        ],
        [
            'title' => 'Dedicated Support',
            'description' => 'We pride ourselves on providing exceptional customer service. Our team is always available to answer your questions.',
        ],
    ];
@endphp

<section class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-4xl mx-auto mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-eg-heading mb-4 font-display">
                Why Choose <span class="text-eg-accent italic">EG Bookkeeping?</span>
            </h2>
            <p class="text-eg-body text-base leading-relaxed">
                Choosing the right bookkeeping service is essential for your business's success. Here's why 
                <span class="font-semibold text-eg-heading">EG Bookkeeping LLC</span> stands out:
            </p>
        </div>

        {{-- Reasons Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
            @foreach($reasons as $reason)
                <div class="bg-gray-50 rounded-xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-lg transition-all duration-300">
                    {{-- Header --}}
                    <div class="bg-eg-heading text-white py-4 px-6">
                        <h3 class="text-lg font-bold font-display tracking-tight">{{ $reason['title'] }}</h3>
                    </div>
                    {{-- Content --}}
                    <div class="p-6">
                        <p class="text-eg-body text-sm leading-relaxed">
                            {{ $reason['description'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
