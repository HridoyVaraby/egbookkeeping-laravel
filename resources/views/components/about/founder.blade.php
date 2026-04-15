<section class="bg-gray-50 py-16 relative overflow-hidden">
    {{-- Decorative Elements --}}
    <div class="absolute inset-0 opacity-5 pointer-events-none">
        <div class="absolute top-0 right-0 w-96 h-96 bg-eg-primary rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-eg-accent rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-6xl mx-auto container px-4">
        <div class="grid lg:grid-cols-[400px,1fr] gap-12 items-center">
            {{-- Left Side - Founder Image Card --}}
            <div class="order-2 lg:order-1">
                <div class="relative">
                    {{-- Image Container --}}
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white group">
                        <img
                            src="{{ asset('images/reaz.jpg') }}"
                            alt="Md. Reazul Haque (Reaz) - Founder & CEO"
                            class="w-full h-auto object-cover grayscale group-hover:grayscale-0 transition-all duration-700"
                        />
                        {{-- Overlay Gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>

                        {{-- Name Badge on Image --}}
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                            <h4 class="text-2xl font-bold mb-1 font-display">
                                Md. Reazul Haque (Reaz)
                            </h4>
                            <p class="text-eg-accent font-semibold text-lg">
                                Founder & CEO
                            </p>
                        </div>
                    </div>

                    {{-- Experience Badge --}}
                    <div class="absolute -top-6 -right-6 bg-eg-accent text-white rounded-full w-28 h-28 flex flex-col items-center justify-center shadow-xl border-4 border-white transform hover:scale-110 transition-transform duration-300">
                        <span class="text-4xl font-bold font-display">15+</span>
                        <span class="text-xs font-semibold uppercase tracking-wider">Years</span>
                    </div>
                </div>
            </div>

            {{-- Right Side - Content --}}
            <div class="order-1 lg:order-2">
                {{-- Quote Mark --}}
                <div class="mb-6">
                    <svg class="w-16 h-16 text-eg-accent/20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z" />
                    </svg>
                </div>

                {{-- Bio Text --}}
                <p class="text-[#1F2937] text-xl md:text-2xl leading-relaxed mb-8 font-display italic font-medium">
                    I am a seasoned bookkeeping professional with certifications in 
                    <span class="text-eg-accent">QuickBooks Online</span> and 
                    <span class="text-eg-accent">Xero Advisor</span>. With a passion for precision and a deep understanding of accounting software, I founded 
                    <span class="text-[#1F2937] font-bold">EG Bookkeeping LLC</span> to provide reliable, client-focused services tailored to meet the unique needs of each business.
                </p>

                {{-- Highlights Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:border-eg-accent transition-colors">
                        <i data-lucide="award" class="w-6 h-6 text-eg-accent mb-2"></i>
                        <h5 class="text-sm font-bold text-[#1F2937] font-display">QuickBooks Pro</h5>
                        <p class="text-xs text-eg-body">Advanced Certified</p>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:border-eg-accent transition-colors">
                        <i data-lucide="check-circle" class="w-6 h-6 text-eg-accent mb-2"></i>
                        <h5 class="text-sm font-bold text-[#1F2937] font-display">Xero Advisor</h5>
                        <p class="text-xs text-eg-body">Certified Partner</p>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:border-eg-accent transition-colors">
                        <i data-lucide="calendar" class="w-6 h-6 text-eg-accent mb-2"></i>
                        <h5 class="text-sm font-bold text-[#1F2937] font-display">15+ Years</h5>
                        <p class="text-xs text-eg-body">Financial Expertise</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
