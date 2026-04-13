@php
    $faqs = [
        [
            'question' => 'What services does EG Bookkeeping LLC offer?',
            'answer' => 'EG Bookkeeping LLC provides comprehensive bookkeeping services, including accounts receivable/payable, bank reconciliations, financial reporting, and cloud-based accounting. We specialize in industry-specific bookkeeping for small businesses, law firms (IOLTA compliance), and real estate professionals. Our services include Catch-Up & Clean-Up Bookkeeping, Monthly Bookkeeping, Real Estate & Legal Bookkeeping, Payroll Processing, and U.S. Tax Services.',
        ],
        [
            'question' => 'Do you offer cloud-based bookkeeping services?',
            'answer' => 'Yes, we specialize in cloud-based bookkeeping using industry-leading platforms like QuickBooks Online and Xero. This allows you to access your financial data anytime, anywhere, and enables real-time collaboration with our team.',
        ],
        [
            'question' => 'What industries do you serve?',
            'answer' => 'We serve a wide range of industries including small businesses, law firms, real estate professionals, e-commerce businesses, healthcare providers, construction companies, and more. Our team has specialized expertise in industry-specific bookkeeping requirements and compliance.',
        ],
        [
            'question' => 'Can you help with Legal bookkeeping?',
            'answer' => 'Absolutely! We specialize in legal bookkeeping and understand the unique requirements of law firms, including IOLTA (Interest on Lawyers Trust Accounts) compliance, trust accounting, three-way reconciliation, and legal-specific financial reporting.',
        ],
        [
            'question' => 'How do you ensure the security of my financial data?',
            'answer' => 'We take data security very seriously. We use encrypted cloud-based platforms, secure file transfer protocols, multi-factor authentication, and follow industry best practices for data protection.',
        ],
        [
            'question' => 'What are your pricing plans?',
            'answer' => 'Our pricing is flexible and tailored to your specific needs. We offer customized packages based on the scope of work, transaction volume, and complexity of your bookkeeping requirements. Contact us for a free consultation to discuss pricing that fits your budget.',
        ],
        [
            'question' => 'Do you offer payroll & tax services?',
            'answer' => 'Yes, we offer comprehensive payroll processing services and can assist with tax preparation and filing. Our team ensures accurate payroll calculations, timely tax deposits, and compliance with federal and state regulations.',
        ],
        [
            'question' => 'Can you work with my existing accounting software?',
            'answer' => 'Yes! We are certified ProAdvisors for QuickBooks Online and Xero, and we can work with most popular accounting software platforms. If you\'re using a different system, we can discuss integration options or help you transition to a more suitable platform.',
        ],
    ];
@endphp

<section 
    x-data="{ openIndex: 0 }"
    class="py-16 md:py-24 bg-white"
>
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-eg-heading mb-4 font-display">
                Frequently Asked <span class="text-[#FF6B35] italic">Questions</span>
            </h2>
            <p class="text-eg-body max-w-3xl mx-auto text-sm md:text-base">
                Got questions about our bookkeeping services? Here are some common inquiries to help you understand how we work and what we offer.
            </p>
        </div>

        <!-- FAQ Items -->
        <div class="max-w-4xl mx-auto space-y-4">
            @foreach($faqs as $index => $faq)
                <div
                    class="border-2 border-[#FFA500] rounded-lg overflow-hidden transition-all shadow-sm"
                >
                    <!-- Question -->
                    <button
                        @click="openIndex = (openIndex === {{ $index }} ? -1 : {{ $index }})"
                        class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition-colors"
                        :class="{ 'bg-gray-50': openIndex === {{ $index }} }"
                    >
                        <span class="text-eg-heading font-semibold text-base md:text-lg pr-4 font-display">
                            {{ $faq['question'] }}
                        </span>
                        <span class="flex-shrink-0 text-[#FF6B35]">
                            <i x-show="openIndex !== {{ $index }}" data-lucide="plus" class="h-6 w-6"></i>
                            <i x-show="openIndex === {{ $index }}" data-lucide="minus" class="h-6 w-6"></i>
                        </span>
                    </button>

                    <!-- Answer -->
                    <div 
                        x-show="openIndex === {{ $index }}"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="px-5 pb-5 pt-2 bg-gray-50"
                    >
                        <p class="text-eg-body text-sm md:text-base leading-relaxed">
                            {{ $faq['answer'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
