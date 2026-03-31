<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-12">
            <h3 class="text-eg-accent text-xl italic font-semibold mb-2">
                Industries
            </h3>
            <h2 class="text-4xl lg:text-5xl font-bold text-eg-heading mb-4 font-display">
                We Specialize In
            </h2>
            <p class="text-eg-body text-base max-w-2xl mx-auto">
                Tailored bookkeeping services designed to meet the unique needs of your industry.
            </p>
        </div>

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
                <div class="bg-white rounded-lg p-8 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex flex-col items-center text-center">
                        <!-- Icon -->
                        <div class="w-20 h-20 rounded-full border-2 border-eg-accent flex items-center justify-center mb-6">
                            <i data-lucide="{{ $industry['icon'] }}" class="w-10 h-10 text-eg-accent"></i>
                        </div>

                        <!-- Title -->
                        <h3 class="text-2xl font-bold text-eg-heading mb-4 font-display">
                            {{ $industry['title'] }}
                        </h3>

                        <!-- Description -->
                        <p class="text-eg-body text-base leading-relaxed">
                            {{ $industry['description'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
