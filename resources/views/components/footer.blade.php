<footer class="relative overflow-hidden bg-[#102743] text-white">
    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-[#EBA927] to-transparent"></div>
    <div class="absolute -left-24 top-16 h-56 w-56 rounded-full bg-[#1F4C78]/30 blur-3xl"></div>
    <div class="absolute -right-24 bottom-8 h-64 w-64 rounded-full bg-[#EBA927]/10 blur-3xl"></div>

    <div class="container relative mx-auto px-4 py-14 md:py-16">
        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-4">
            <!-- Brand & Description -->
            <div class="lg:col-span-1 animate-on-scroll delay-100">
                <a href="{{ url('/') }}" class="inline-block">
                    <img 
                        src="{{ asset('logo.svg') }}" 
                        alt="EG Bookkeeping LLC" 
                        class="h-12 w-auto"
                    />
                </a>
                <p class="mt-6 text-sm leading-7 text-slate-300">
                    At EG Bookkeeping LLC, we specialize in precise and reliable bookkeeping services tailored to your business needs. With years of expertise, we ensure your financials are accurate, compliant, and stress-free.
                </p>
                
                <div class="mt-6">
                    <a href="{{ url('/about') }}" class="inline-flex items-center text-sm font-semibold text-[#EBA927] transition-colors hover:text-[#f0b63c]">
                        Learn more
                        <span class="ml-2">→</span>
                    </a>
                </div>
            </div>

            <!-- Useful Links -->
            <div class="animate-on-scroll delay-200">
                <h3 class="mb-6 text-lg font-bold text-white">Useful Links</h3>
                <ul class="space-y-3">
                    <li><a href="{{ url('/') }}" class="inline-block text-sm text-slate-300 transition-all duration-300 hover:translate-x-1 hover:text-white">Home</a></li>
                    <li><a href="{{ url('/services') }}" class="inline-block text-sm text-slate-300 transition-all duration-300 hover:translate-x-1 hover:text-white">Services</a></li>
                    <li><a href="{{ route('how-it-works') }}" class="inline-block text-sm text-slate-300 transition-all duration-300 hover:translate-x-1 hover:text-white">How It Works</a></li>
                    <li><a href="{{ url('/blog') }}" class="inline-block text-sm text-slate-300 transition-all duration-300 hover:translate-x-1 hover:text-white">Tools and Tips</a></li>
                    <li>
                        <a 
                            href="https://docs.google.com/document/d/1TmDEIk_PToY1pNmcXMWvgFd5tDUI0BoI/edit?pli=1&tab=t.0" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="text-sm text-slate-300 transition-colors hover:text-white"
                        >
                            Bookkeeping/Accounting Agreement
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Important Links -->
            <div class="animate-on-scroll delay-300">
                <h3 class="mb-6 text-lg font-bold text-white">Important Links</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('legal.privacy') }}" class="inline-block text-sm text-slate-300 transition-all duration-300 hover:translate-x-1 hover:text-white">Privacy Policy</a></li>
                    <li><a href="{{ route('legal.terms') }}" class="inline-block text-sm text-slate-300 transition-all duration-300 hover:translate-x-1 hover:text-white">Terms & Conditions</a></li>
                    <li><a href="{{ route('legal.refund') }}" class="inline-block text-sm text-slate-300 transition-all duration-300 hover:translate-x-1 hover:text-white">Cancellation & Refund Policy</a></li>
                </ul>
            </div>

            <!-- Address/Contact -->
            <div class="animate-on-scroll delay-400">
                <h3 class="mb-6 text-lg font-bold text-white">Address</h3>
                <div class="space-y-4">
                    <p class="text-sm leading-relaxed text-slate-300">
                        1209 MOUNTAIN ROAD PL NE, STE R,<br />
                        ALBUQUERQUE, NM 87110, USA
                    </p>
                    
                    <div class="space-y-2">
                        <a href="mailto:reaz@egbookkeeping.com" class="flex items-center gap-2 text-sm text-slate-300 transition-colors hover:text-white">
                            <i data-lucide="mail" class="h-4 w-4"></i>
                            reaz@egbookkeeping.com
                        </a>
                        <a href="mailto:support@egbookkeeping.com" class="flex items-center gap-2 text-sm text-slate-300 transition-colors hover:text-white">
                            <i data-lucide="mail" class="h-4 w-4"></i>
                            support@egbookkeeping.com
                        </a>
                    </div>

                    <div class="space-y-2">
                        <a href="tel:+15055232471" class="flex items-center gap-2 text-sm text-slate-300 transition-colors hover:text-white">
                            <i data-lucide="phone" class="h-4 w-4 text-[#FF6B35]"></i>
                            +1 505 523 2471
                        </a>
                        <a href="https://wa.me/8801973301465" class="flex items-center gap-2 text-sm text-slate-300 transition-colors hover:text-white">
                            <i data-lucide="message-circle" class="h-4 w-4 text-[#25D366]"></i>
                            +88 01973 301465
                        </a>
                    </div>

                    <!-- Social Icons -->
                    <div class="flex gap-3 mt-4">
                        @php
                            $socials = [
                                ['label' => 'Facebook', 'url' => 'https://www.facebook.com/Bookkeeper.reaz/', 'icon' => 'facebook.svg'],
                                ['label' => 'Twitter', 'url' => 'https://x.com/Md01713', 'icon' => 'x.svg'],
                                ['label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/company/egbookkeepingllc', 'icon' => 'linkedin.svg'],
                            ];
                        @endphp
                        @foreach($socials as $social)
                            <a
                                href="{{ $social['url'] }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="group flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-white/10 transition-all duration-300 hover:-translate-y-1 hover:border-[#EBA927] hover:bg-[#EBA927]"
                                aria-label="{{ $social['label'] }}"
                            >
                                <img src="{{ asset('images/footer-icons/' . $social['icon']) }}" class="h-5 w-5 opacity-90 transition-all duration-300 group-hover:opacity-100" style="filter: brightness(0) saturate(100%) invert(100%);" alt="{{ $social['label'] }}" />
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-12 border-t border-white/10 pt-8">
            <!-- Payment Methods -->
            <div class="flex justify-center flex-wrap gap-3 mb-6">
                @php
                    $payments = [
                        ['name' => 'Visa', 'file' => 'visa.svg'],
                        ['name' => 'Mastercard', 'file' => 'mastercard.svg'],
                        ['name' => 'PayPal', 'file' => 'paypal.svg'],
                        ['name' => 'Amex', 'file' => 'americanexpress.svg'],
                        ['name' => 'Discover', 'file' => 'discover.svg'],
                        ['name' => 'JCB', 'file' => 'jcb.svg'],
                    ];
                @endphp
                @foreach($payments as $payment)
                    <div class="flex items-center justify-center rounded-xl border border-white/10 bg-white/95 px-3 py-2 shadow-sm">
                        <img src="{{ asset('images/footer-icons/' . $payment['file']) }}" alt="{{ $payment['name'] }}" class="h-5 w-auto" />
                    </div>
                @endforeach
            </div>

            <div class="text-center text-sm text-slate-400">
                <p>
                    ©{{ date('Y') }} <span class="font-semibold text-white">EG Bookkeeping LLC</span>. All Rights Reserved. 
                    <span class="font-semibold text-white">EG Bookkeeping LLC</span> is the parent company of 
                    <a href="https://cfoedge360.com" class="text-[#EBA927] hover:underline">CFO Edge360</a>
                </p>
            </div>
        </div>
    </div>
</footer>
