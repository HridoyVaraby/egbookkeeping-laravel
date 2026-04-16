@php
    $certificates = [
        [
            'image' => asset('images/certificates/1.png'),
            'alt' => 'Certificate of Completion - Accounting Cycle for Rentals',
        ],
        [
            'image' => asset('images/certificates/2.png'),
            'alt' => 'QuickBooks Online Advanced Certification',
        ],
        [
            'image' => asset('images/certificates/3.png'),
            'alt' => 'Xero Advisor Certified',
        ],
    ];
@endphp

<section class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-4xl mx-auto mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-eg-heading mb-4 font-display">
                Showcasing Our <span class="text-eg-accent italic">Expertise</span>
            </h2>
            <p class="text-eg-body text-base leading-relaxed">
                At EG Bookkeeping LLC, our certifications and credentials reflect our commitment to excellence. These achievements ensure that we provide the highest quality bookkeeping services tailored to meet your needs.
            </p>
        </div>

        {{-- Certificates Grid --}}
        <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @foreach($certificates as $cert)
                <div class="border-2 border-gray-100 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 bg-white group p-4">
                    <div class="aspect-[4/3] overflow-hidden rounded-lg bg-gray-50 flex items-center justify-center p-2">
                        <img
                            src="{{ $cert['image'] }}"
                            alt="{{ $cert['alt'] }}"
                            class="max-w-full max-h-full object-contain group-hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                            width="400"
                            height="300"
                        />
                    </div>
                    <p class="text-xs text-center mt-4 text-eg-body/60 font-medium">
                        {{ $cert['alt'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
