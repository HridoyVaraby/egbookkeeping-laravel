@props([
    'title' => 'Ready to Simplify Your Bookkeeping?',
    'description' => 'Let us handle your financial records while you focus on growing your business. Schedule a free consultation today and experience the difference our expert bookkeeping services can make.',
    'primaryButtonText' => 'Get Your Free Consultation',
    'primaryButtonLink' => route('contact'),
])

<section class="py-16 md:py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="mx-auto max-w-5xl">
            <div class="relative bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Yellow left border -->
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#FFD700]"></div>
                
                <div class="flex flex-col md:flex-row items-center justify-between gap-8 p-8 md:p-12 pl-10 md:pl-16">
                    <!-- Left content -->
                    <div class="flex-1 text-left">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 font-display">
                            {!! str_replace('Bookkeeping', '<span class="text-[#FF6B35]">Bookkeeping</span>', $title) !!}
                        </h2>
                        <p class="text-gray-600 text-base md:text-lg max-w-2xl leading-relaxed">
                            {{ $description }}
                        </p>
                    </div>
                    
                    <!-- Right button -->
                    <div class="flex-shrink-0">
                        <x-ui.button 
                            size="lg" 
                            href="{{ $primaryButtonLink }}"
                            class="bg-[#1E88E5] hover:bg-[#1976D2] text-white px-8 py-6 text-base font-semibold whitespace-nowrap"
                        >
                            {{ $primaryButtonText }}
                        </x-ui.button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
