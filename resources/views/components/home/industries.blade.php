@props(['showHeader' => true])

<section id="industries" class="py-16 bg-gray-50 scroll-mt-20">
    <div class="container mx-auto px-4">
        <!-- Header -->
        @if($showHeader)
        <div class="text-center mb-12 animate-on-scroll">
            <h2 class="text-3xl md:text-4xl font-bold mb-2 font-display">
                We Specialize <span class="text-eg-accent">In</span>
            </h2>
            <p class="text-[18px] leading-[26px] font-sans text-[#4B5563] max-w-2xl mx-auto">
                Tailored bookkeeping services designed to meet the unique needs of your industry.
            </p>
        </div>
        @endif

        <!-- Industry Cards -->
        <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            @php
                $industries = [
                    [
                        'icon' => 'scale',
                        'title' => 'Law Firms',
                        'description' => "Simplify your law firm's bookkeeping with our expert solutions. We ensure compliance with industry regulations and provide precise financial tracking to support your legal practice's growth.",
                    ],
                    [
                        'icon' => 'building-2',
                        'title' => 'Real Estate',
                        'description' => 'Streamline your real estate finances with tailored bookkeeping. From tracking property expenses to managing client payments, we handle the details so you can focus on closing deals.',
                    ],
                ];
            @endphp

            @foreach($industries as $industry)
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 animate-on-scroll delay-{{ ($loop->index + 1) * 100 }}">
                    <div class="flex flex-col items-center text-center">
                        <!-- Icon -->
                        <div class="w-20 h-20 rounded-full border-2 border-eg-accent flex items-center justify-center mb-6">
                            <i data-lucide="{{ $industry['icon'] }}" class="w-10 h-10 text-eg-accent"></i>
                        </div>

                        <!-- Title -->
                        <h3 class="text-[24px] leading-[26px] font-semibold text-[#1F2937] mb-5 font-display">
                            {{ $industry['title'] }}
                        </h3>

                        <!-- Description -->
                        <p class="text-[16px] leading-[26px] font-normal font-sans text-[#4B5563]">
                            {{ $industry['description'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
