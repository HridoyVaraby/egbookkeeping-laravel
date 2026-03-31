@php
    $steps = [
        [
            'number' => 'First Step',
            'label' => 'Meeting',
            'title' => 'Schedule a Meeting',
            'description' => 'Discuss your pain points and business needs.',
            'subtitle' => 'Zoom, Google Meet, Slack, WhatsApp',
            'icon' => 'file-text',
            'side' => 'left',
        ],
        [
            'number' => '2nd Step',
            'label' => 'Access',
            'title' => 'Grant Access',
            'description' => 'Provide access to your QuickBooks Online / Xero access for assessment.',
            'subtitle' => 'QuickBooks online / Xero accountant access',
            'icon' => 'lock',
            'side' => 'right',
        ],
        [
            'number' => '3rd Step',
            'label' => 'Pricing',
            'title' => 'Discuss Pricing',
            'description' => 'Agree on pricing based on the scope of work.',
            'subtitle' => 'Flexible pricing tailored to your needs',
            'icon' => 'dollar-sign',
            'side' => 'left',
        ],
        [
            'number' => '4th Step',
            'label' => 'Invoice',
            'title' => 'Receive Invoice',
            'description' => 'An invoice is issued as per the agreed price.',
            'subtitle' => 'Digital invoice sent to your email',
            'icon' => 'receipt',
            'side' => 'right',
        ],
        [
            'number' => '5th Step',
            'label' => 'Agreement',
            'title' => 'Sign the Agreement',
            'description' => 'Formalize the terms by signing the agreement.',
            'subtitle' => 'E-signature via secure platforms',
            'icon' => 'file-signature',
            'side' => 'left',
        ],
        [
            'number' => '6th Step',
            'label' => 'Payment',
            'title' => 'Make Full Payment',
            'description' => 'Settle the invoice in full.',
            'subtitle' => 'Stripe or Debit / Credit Card',
            'icon' => 'credit-card',
            'side' => 'right',
        ],
        [
            'number' => '7th Step',
            'label' => 'Documents',
            'title' => 'Submit Documents',
            'description' => 'Provide necessary documents.',
            'subtitle' => 'Bank and credit card statements',
            'icon' => 'upload',
            'side' => 'left',
        ],
        [
            'number' => '8th Step',
            'label' => 'Work',
            'title' => 'Work Begins',
            'description' => 'We start working on your financials.',
            'subtitle' => 'Bookkeeping tasks commence immediately',
            'icon' => 'briefcase',
            'side' => 'right',
        ],
        [
            'number' => 'Final Step',
            'label' => 'Complete',
            'title' => 'Timely Delivery',
            'description' => 'Receive your completed work on time.',
            'subtitle' => 'Expect your work delivered as promised',
            'icon' => 'check-circle',
            'side' => 'left',
        ],
    ];
@endphp

<section class="py-16 md:py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 font-display">
                How It <span class="text-[#FF6B35]">Works?</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-base">
                Getting started with EG Bookkeeping LLC is easy. Follow these simple steps to enjoy tailored, hassle-free bookkeeping services.
            </p>
        </div>

        <!-- Timeline -->
        <div class="relative max-w-5xl mx-auto">
            <!-- Center line -->
            <div class="absolute left-1/2 top-0 bottom-0 w-0.5 bg-gray-300 transform -translate-x-1/2 hidden md:block"></div>

            <!-- Steps -->
            <div class="space-y-12">
                @foreach($steps as $index => $step)
                    <div class="relative flex items-center justify-between flex-col md:flex-row">
                        <!-- Left Side Content -->
                        <div class="w-full md:w-5/12">
                            @if($step['side'] === 'left')
                                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow relative">
                                    <div class="absolute -right-4 top-1/2 transform -translate-y-1/2 w-10 h-10 rounded-full bg-[#FFA500] flex items-center justify-center text-white shadow-lg hidden md:flex">
                                        <i data-lucide="{{ $step['icon'] }}" class="h-5 w-5"></i>
                                    </div>
                                    <p class="text-xs text-gray-500 mb-1">{{ $step['subtitle'] }}</p>
                                    <h3 class="text-xl font-bold text-[#E91E63] mb-2 font-display">{{ $step['title'] }}</h3>
                                    <p class="text-sm text-gray-600">{{ $step['description'] }}</p>
                                </div>
                            @else
                                <div class="text-right hidden md:block pr-8">
                                    <p class="text-sm text-[#1E88E5] font-semibold">{{ $step['number'] }}</p>
                                    <p class="text-xs text-gray-500">{{ $step['label'] }}</p>
                                </div>
                            @endif
                        </div>

                        <!-- Center Circle Dot -->
                        <div class="absolute left-1/2 transform -translate-x-1/2 hidden md:flex items-center justify-center z-10">
                            <div class="w-3 h-3 rounded-full bg-[#1E88E5] border-4 border-white shadow-md"></div>
                        </div>

                        <!-- Right Side Content -->
                        <div class="w-full md:w-5/12 mt-4 md:mt-0">
                            @if($step['side'] === 'right')
                                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow relative">
                                    <div class="absolute -left-4 top-1/2 transform -translate-y-1/2 w-10 h-10 rounded-full bg-[#FFA500] flex items-center justify-center text-white shadow-lg hidden md:flex">
                                        <i data-lucide="{{ $step['icon'] }}" class="h-5 w-5"></i>
                                    </div>
                                    <p class="text-xs text-gray-500 mb-1">{{ $step['subtitle'] }}</p>
                                    <h3 class="text-xl font-bold text-[#E91E63] mb-2 font-display">{{ $step['title'] }}</h3>
                                    <p class="text-sm text-gray-600">{{ $step['description'] }}</p>
                                </div>
                            @else
                                <div class="text-left hidden md:block pl-8">
                                    <p class="text-sm text-[#1E88E5] font-semibold">{{ $step['number'] }}</p>
                                    <p class="text-xs text-gray-500">{{ $step['label'] }}</p>
                                </div>
                            @endif
                        </div>

                        <!-- Mobile Icon -->
                        <div class="md:hidden flex items-center justify-center my-4">
                            <div class="w-10 h-10 rounded-full bg-[#FFA500] flex items-center justify-center text-white shadow-lg">
                                <i data-lucide="{{ $step['icon'] }}" class="h-5 w-5"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
