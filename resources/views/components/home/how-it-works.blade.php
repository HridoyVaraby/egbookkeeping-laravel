@props(['showHeader' => true])
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

<section class="bg-gradient-to-b from-white to-slate-50 py-16 md:py-24">
    <div class="container mx-auto px-4">
        @if($showHeader)
        <!-- Header -->
        <div class="mb-16 text-center md:mb-20">
            <h2 class="text-3xl md:text-4xl font-bold text-eg-heading mb-4 font-display">
                How It <span class="text-[#FF6B35]">Works?</span>
            </h2>
            <p class="mx-auto max-w-2xl text-sm text-eg-body md:text-base">
                Getting started with EG Bookkeeping LLC is easy. Follow these simple steps to enjoy tailored,
                hassle-free bookkeeping services.
            </p>
        </div>
        @endif

        <!-- Timeline -->
        <div class="relative mx-auto max-w-5xl">
            <!-- Center line -->
            <div class="absolute bottom-0 left-1/2 top-0 hidden w-px -translate-x-1/2 bg-gradient-to-b from-[#FFD59E] via-[#FFA500] to-[#D7E7F8] md:block">
            </div>

            <!-- Steps -->
            <div class="space-y-8 md:space-y-10">
                @foreach($steps as $index => $step)
                    <div class="relative flex flex-col items-stretch justify-between md:flex-row md:items-center">
                        <!-- Left Side Content -->
                        <div class="w-full md:w-5/12">
                            @if($step['side'] === 'left')
                                <div
                                    class="relative flex min-h-[220px] flex-col justify-center overflow-hidden rounded-[28px] border border-white/80 bg-white p-6 shadow-[0_16px_40px_rgba(15,23,42,0.08)] transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_22px_60px_rgba(15,23,42,0.12)] md:p-8">
                                    <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-[#FFF4E4]"></div>
                                    <div class="relative z-10 flex items-center gap-3">
                                        <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#FFB326] to-[#FF8C1A] text-white shadow-lg">
                                            <i data-lucide="{{ $step['icon'] }}" class="h-5 w-5"></i>
                                        </span>
                                        <div>
                                            <p class="mb-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-[#1E88E5]">{{ $step['number'] }}</p>
                                            <p class="text-xs text-eg-subheading">{{ $step['subtitle'] }}</p>
                                        </div>
                                    </div>
                                    <h3 class="relative z-10 mt-5 text-2xl font-bold text-[#E91E63] font-display">{{ $step['title'] }}</h3>
                                    <p class="relative z-10 mt-3 max-w-sm text-sm leading-7 text-eg-body">{{ $step['description'] }}</p>
                                </div>
                            @else
                                <div class="hidden pr-10 text-right md:block">
                                    <p class="text-sm font-semibold text-[#1E88E5]">{{ $step['number'] }}</p>
                                    <p class="text-xs uppercase tracking-[0.18em] text-eg-subheading">{{ $step['label'] }}</p>
                                </div>
                            @endif
                        </div>

                        <!-- Center Circle Dot -->
                        <div
                            class="absolute left-1/2 z-10 hidden -translate-x-1/2 items-center justify-center md:flex">
                            <div class="h-4 w-4 rounded-full border-4 border-white bg-[#1E88E5] shadow-md"></div>
                        </div>

                        <!-- Right Side Content -->
                        <div class="w-full md:w-5/12 mt-4 md:mt-0">
                            @if($step['side'] === 'right')
                                <div
                                    class="relative flex min-h-[220px] flex-col justify-center overflow-hidden rounded-[28px] border border-white/80 bg-white p-6 shadow-[0_16px_40px_rgba(15,23,42,0.08)] transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_22px_60px_rgba(15,23,42,0.12)] md:p-8">
                                    <div class="absolute left-0 top-0 h-24 w-24 rounded-br-full bg-[#EEF6FF]"></div>
                                    <div class="relative z-10 flex items-center gap-3">
                                        <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#FFB326] to-[#FF8C1A] text-white shadow-lg">
                                            <i data-lucide="{{ $step['icon'] }}" class="h-5 w-5"></i>
                                        </span>
                                        <div>
                                            <p class="mb-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-[#1E88E5]">{{ $step['number'] }}</p>
                                            <p class="text-xs text-eg-subheading">{{ $step['subtitle'] }}</p>
                                        </div>
                                    </div>
                                    <h3 class="relative z-10 mt-5 text-2xl font-bold text-[#E91E63] font-display">{{ $step['title'] }}</h3>
                                    <p class="relative z-10 mt-3 max-w-sm text-sm leading-7 text-eg-body">{{ $step['description'] }}</p>
                                </div>
                            @else
                                <div class="hidden pl-10 text-left md:block">
                                    <p class="text-sm font-semibold text-[#1E88E5]">{{ $step['number'] }}</p>
                                    <p class="text-xs uppercase tracking-[0.18em] text-eg-subheading">{{ $step['label'] }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
