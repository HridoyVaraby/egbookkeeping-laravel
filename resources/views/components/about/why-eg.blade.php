@php
    $reasons = [
        [
            'icon' => 'award',
            'title' => 'Experienced Professionals',
            'description' => "Our team consists of certified bookkeepers and accountants with extensive knowledge in financial reporting, tax compliance, and payroll management.",
        ],
        [
            'icon' => 'sliders-horizontal',
            'title' => 'Tailored Solutions',
            'description' => "We offer customized bookkeeping and accounting services to fit your specific needs—whether you're a startup, small business, or growing enterprise.",
        ],
        [
            'icon' => 'circle-dollar-sign',
            'title' => 'Affordable Pricing',
            'description' => 'Our bookkeeping services are designed to be cost-effective with no hidden fees. We provide transparent pricing plans for all budgets.',
        ],
        [
            'icon' => 'cloud-cog',
            'title' => 'Advanced Technology',
            'description' => 'We use the latest cloud-based accounting software such as QuickBooks, Xero, Silo, etc, ensuring secure and accessible data.',
        ],
        [
            'icon' => 'layers',
            'title' => 'Comprehensive Services',
            'description' => 'From day-to-day bookkeeping to financial strategy and tax planning, we provide a one-stop solution for all your needs.',
        ],
        [
            'icon' => 'headset',
            'title' => 'Dedicated Support',
            'description' => 'We pride ourselves on providing exceptional customer service. Our team is always available to answer your questions.',
        ],
    ];
@endphp

<section class="bg-white py-16 md:py-20">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-4xl mx-auto mb-12 animate-on-scroll">
            <h2 class="text-3xl md:text-4xl font-bold mb-2 font-display">
                Why Choose <span class="text-eg-accent">EG Bookkeeping?</span>
            </h2>
            <p class="text-[18px] leading-[26px] font-sans text-eg-body">
                Choosing the right bookkeeping service is essential for your business's success. Here's why 
                <span class="font-semibold text-eg-heading">EG Bookkeeping LLC</span> stands out:
            </p>
        </div>

        {{-- Reasons Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @foreach($reasons as $reason)
                <div class="group bg-white rounded-xl p-8 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] border border-gray-100 transition-all duration-300 hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)] hover:-translate-y-2 animate-on-scroll delay-{{ ($loop->index % 6 + 1) * 100 }}">
                    <!-- Icon -->
                    <div class="mb-6 flex justify-start">
                        <!-- Outer white circle with border -->
                        <div class="w-[90px] h-[90px] rounded-full border border-[#FFE4DC] bg-white flex items-center justify-center shadow-sm transition-transform duration-300 group-hover:scale-110">
                            <!-- Inner solid yellow circle with the icon -->
                            <div class="w-[72px] h-[72px] bg-eg-primary rounded-full flex items-center justify-center transition-colors duration-300 group-hover:bg-[#2374b7] text-[#1F2937] group-hover:text-white">
                                <i data-lucide="{{ $reason['icon'] }}" class="w-8 h-8 transition-colors duration-300"></i>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Content --}}
                    <h3 class="text-[24px] leading-[26px] font-semibold text-[#1F2937] mb-5 font-display transition-colors duration-300 group-hover:text-[#2374b7]">
                        {{ $reason['title'] }}
                    </h3>
                    <p class="text-[16px] leading-[26px] font-normal font-sans text-[#4B5563]">
                        {{ $reason['description'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

