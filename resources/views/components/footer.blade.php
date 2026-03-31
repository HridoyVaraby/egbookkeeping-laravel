<footer class="relative bg-[#1a2f4d] text-white">
    <div class="container mx-auto px-4 py-12">
        <div class="grid gap-12 md:grid-cols-4 lg:grid-cols-4">
            <!-- Brand & Description -->
            <div class="lg:col-span-1">
                <a href="{{ url('/') }}" class="inline-block mb-6">
                    <img 
                        src="{{ asset('logo.svg') }}" 
                        alt="EG Bookkeeping LLC" 
                        class="h-16 w-auto"
                    />
                </a>
                <p class="mt-4 text-sm leading-relaxed text-gray-300">
                    At EG Bookkeeping LLC, we specialize in precise and reliable bookkeeping services tailored to your business needs. With years of expertise, we ensure your financials are accurate, compliant, and stress-free.
                </p>
                
                <div class="mt-6">
                    <a href="{{ url('/about') }}" class="inline-flex items-center text-[#FFD700] text-sm font-semibold hover:underline">
                        Learn more
                        <span class="ml-2">→</span>
                    </a>
                </div>
            </div>

            <!-- Useful Links -->
            <div>
                <h3 class="mb-6 text-lg font-bold text-white">Useful Links</h3>
                <ul class="space-y-3">
                    <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition-colors text-sm">Home</a></li>
                    <li><a href="{{ url('/services') }}" class="text-gray-300 hover:text-white transition-colors text-sm">Services</a></li>
                    <li><a href="{{ url('/how-it-works') }}" class="text-gray-300 hover:text-white transition-colors text-sm">How It Works</a></li>
                    <li><a href="{{ url('/tools-and-tips') }}" class="text-gray-300 hover:text-white transition-colors text-sm">Tools and Tips</a></li>
                    <li>
                        <a 
                            href="https://docs.google.com/document/d/1TmDEIk_PToY1pNmcXMWvgFd5tDUI0BoI/edit?pli=1&tab=t.0" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="text-gray-300 hover:text-white transition-colors text-sm"
                        >
                            Bookkeeping/Accounting Agreement
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Important Links -->
            <div>
                <h3 class="mb-6 text-lg font-bold text-white">Important Links</h3>
                <ul class="space-y-3">
                    <li><a href="{{ url('/privacy-policy') }}" class="text-gray-300 hover:text-white transition-colors text-sm">Privacy Policy</a></li>
                    <li><a href="{{ url('/cookie-policy') }}" class="text-gray-300 hover:text-white transition-colors text-sm">Cookie Policy</a></li>
                    <li><a href="{{ url('/cancellation-refund-policy') }}" class="text-gray-300 hover:text-white transition-colors text-sm">Cancellation & Refund Policy</a></li>
                    <li><a href="{{ url('/terms-conditions') }}" class="text-gray-300 hover:text-white transition-colors text-sm">Terms & Conditions</a></li>
                </ul>
            </div>

            <!-- Address/Contact -->
            <div>
                <h3 class="mb-6 text-lg font-bold text-white">Address</h3>
                <div class="space-y-4">
                    <p class="text-gray-300 text-sm leading-relaxed">
                        1209 MOUNTAIN ROAD PL NE, STE R,<br />
                        ALBUQUERQUE, NM 87110, USA
                    </p>
                    
                    <div class="space-y-2">
                        <a href="mailto:reaz@egbookkeeping.com" class="flex items-center gap-2 text-gray-300 hover:text-white transition-colors text-sm">
                            <i data-lucide="mail" class="h-4 w-4"></i>
                            reaz@egbookkeeping.com
                        </a>
                        <a href="mailto:support@egbookkeeping.com" class="flex items-center gap-2 text-gray-300 hover:text-white transition-colors text-sm">
                            <i data-lucide="mail" class="h-4 w-4"></i>
                            support@egbookkeeping.com
                        </a>
                    </div>

                    <div class="space-y-2">
                        <a href="tel:+15055232471" class="flex items-center gap-2 text-gray-300 hover:text-white transition-colors text-sm">
                            <i data-lucide="phone" class="h-4 w-4 text-[#FF6B35]"></i>
                            +1 505 523 2471
                        </a>
                        <a href="https://wa.me/8801973301465" class="flex items-center gap-2 text-gray-300 hover:text-white transition-colors text-sm">
                            <i data-lucide="message-circle" class="h-4 w-4 text-[#25D366]"></i>
                            +88 01973 301465
                        </a>
                    </div>

                    <!-- Social Icons -->
                    <div class="flex gap-3 mt-4">
                        @php
                            $socials = [
                                ['label' => 'Facebook', 'url' => 'https://www.facebook.com/Bookkeeper.reaz/', 'icon' => 'facebook'],
                                ['label' => 'Twitter', 'url' => 'https://x.com/Md01713', 'icon' => 'twitter'],
                                ['label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/company/egbookkeepingllc', 'icon' => 'linkedin'],
                            ];
                        @endphp
                        @foreach($socials as $social)
                            <a
                                href="{{ $social['url'] }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex h-10 w-10 items-center justify-center rounded-full bg-[#FFD700] text-[#1a2f4d] hover:bg-[#FFC700] transition-all"
                                aria-label="{{ $social['label'] }}"
                            >
                                <i data-lucide="{{ $social['icon'] }}" class="h-5 w-5"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-12 border-t border-gray-700 pt-8">
            <!-- Payment Methods -->
            <div class="flex justify-center flex-wrap gap-3 mb-6">
                @php
                    $payments = [
                        ['name' => 'Visa', 'url' => 'https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg'],
                        ['name' => 'Mastercard', 'url' => 'https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg'],
                        ['name' => 'PayPal', 'url' => 'https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg'],
                        ['name' => 'Amex', 'url' => 'https://upload.wikimedia.org/wikipedia/commons/f/fa/American_Express_logo_%282018%29.svg'],
                        ['name' => 'Maestro', 'url' => 'https://upload.wikimedia.org/wikipedia/commons/b/b7/MasterCard_Logo.svg'],
                        ['name' => 'JCB', 'url' => 'https://upload.wikimedia.org/wikipedia/commons/4/40/JCB_logo.svg'],
                    ];
                @endphp
                @foreach($payments as $payment)
                    <div class="bg-white rounded px-3 py-2 flex items-center justify-center">
                        <img src="{{ $payment['url'] }}" alt="{{ $payment['name'] }}" class="h-5 w-auto" />
                    </div>
                @endforeach
            </div>

            <div class="text-center text-sm text-gray-400">
                <p>
                    ©{{ date('Y') }} <span class="font-semibold text-white">EG Bookkeeping LLC</span>. All Rights Reserved. 
                    <span class="font-semibold text-white">EG Bookkeeping LLC</span> is the parent company of 
                    <a href="https://cfoedge360.com" class="text-[#FFD700] hover:underline">CFO Edge360</a>
                </p>
            </div>
        </div>
    </div>
</footer>
