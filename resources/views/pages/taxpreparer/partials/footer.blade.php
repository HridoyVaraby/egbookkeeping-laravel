<footer class="relative bg-gray-900 text-white py-16">
    {{-- Decorative background --}}
    <div class="pointer-events-none absolute inset-0 overflow-hidden">
        <div class="absolute -top-24 -left-24 w-72 h-72 bg-tax-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 -right-24 w-96 h-96 bg-tax-accent/10 rounded-full blur-3xl"></div>
    </div>
    <div class="relative container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10 mb-12">
                {{-- Brand & Intro --}}
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('images/taxpreparer/logo.svg') }}" alt="EG Bookkeeping LLC" class="h-10 w-auto" />
                    </div>
                    <div class="inline-flex items-center gap-2 bg-[#FEFBE6] border-2 border-tax-primary rounded-full px-4 py-1.5 shadow-sm mb-6">
                        <i data-lucide="award" class="w-4 h-4 text-tax-primary"></i>
                        <span class="text-gray-800 font-semibold text-xs">TAX PREPARER</span>
                    </div>
                    <p class="text-gray-300 text-sm leading-relaxed mb-4">
                        At EG Bookkeeping LLC, we deliver accurate, IRS-registered tax preparation backed by a valid PTIN—ensuring your federal and state returns are compliant, optimized, and completely stress-free.
                    </p>
                    <a href="https://egbookkeeping.com/about/" class="inline-flex items-center gap-2 text-tax-primary hover:text-tax-primary-light font-medium text-sm transition-colors">
                        Learn more
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

                {{-- Useful Links --}}
                <div>
                    <h4 class="text-white font-bold mb-4">Useful Links</h4>
                    <div class="space-y-3 text-sm">
                        <a href="#" class="block text-gray-300 hover:text-tax-primary transition-colors">Home</a>
                        <a href="#services" class="block text-gray-300 hover:text-tax-primary transition-colors">Services</a>
                        <a href="#process" class="block text-gray-300 hover:text-tax-primary transition-colors">How It Works</a>
                        <a href="#pricing" class="block text-gray-300 hover:text-tax-primary transition-colors">Pricing</a>
                        <a href="https://egbookkeeping.com/contact/" class="block text-gray-300 hover:text-tax-primary transition-colors">Contact</a>
                        <a href="https://drive.google.com/drive/folders/11e_6ahqPy1FxtYF7Iq3k6UhBWy9IBsxD?usp=sharing" target="_blank" rel="noopener noreferrer" class="block text-gray-300 hover:text-tax-primary transition-colors">Tax Clients Onboarding Link</a>
                    </div>
                </div>

                {{-- Important Links --}}
                <div>
                    <h4 class="text-white font-bold mb-4">Important Links</h4>
                    <div class="space-y-3 text-sm">
                        <a href="https://egbookkeeping.com" class="block text-gray-300 hover:text-tax-primary transition-colors font-bold">EG BOOKKEEPING LLC</a>
                        <a href="https://cfoedge360.com" class="block text-gray-300 hover:text-tax-primary transition-colors font-bold">CFO EDGE360</a>
                        <a href="#" class="block text-gray-300 hover:text-tax-primary transition-colors font-bold">TAX PREPARER</a>
                        <a href="https://egbookkeeping.com/privacy-policy/" class="block text-gray-300 hover:text-tax-primary transition-colors">Privacy Policy</a>
                        <a href="https://egbookkeeping.com/return-refund-policy/" class="block text-gray-300 hover:text-tax-primary transition-colors">Cancellation & Refund Policy</a>
                    </div>
                </div>

                {{-- Address & Contact --}}
                <div>
                    <h4 class="text-white font-bold mb-4">Address</h4>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-start gap-2 text-gray-300">
                            <i data-lucide="map-pin" class="w-4 h-4 mt-0.5 flex-shrink-0"></i>
                            <span>1209 MOUNTAIN ROAD PL NE, STE R, ALBUQUERQUE, NM 87110, USA</span>
                        </div>
                        <a href="mailto:reaz@egbookkeeping.com" class="flex items-center gap-2 text-tax-primary hover:text-tax-primary-light transition-colors">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                            <span>reaz@egbookkeeping.com</span>
                        </a>
                        <a href="mailto:support@egbookkeeping.com" class="flex items-center gap-2 text-tax-primary hover:text-tax-primary-light transition-colors">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                            <span>support@egbookkeeping.com</span>
                        </a>
                        <div class="flex items-center gap-2 text-gray-300">
                            <i data-lucide="phone" class="w-4 h-4"></i>
                            <span>+1 505 523 2471</span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-300">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                            </svg>
                            <span>+880 1973 301 465</span>
                        </div>
                    </div>

                    {{-- Social --}}
                    <div class="flex items-center gap-3 mt-4">
                        <a href="https://www.facebook.com/egtaxsolutions.reaz" aria-label="Facebook" class="w-8 h-8 rounded-full bg-gray-800 hover:bg-tax-primary/20 hover:text-tax-primary flex items-center justify-center transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                        </a>
                        <a href="https://linkedin.com/company/eg-tax-solutions" aria-label="LinkedIn" class="w-8 h-8 rounded-full bg-gray-800 hover:bg-tax-primary/20 hover:text-tax-primary flex items-center justify-center transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Bottom bar --}}
            <div class="border-t border-white/10 pt-6">
                <div class="flex flex-col items-center gap-3 text-xs text-gray-400 text-center">
                    <img src="{{ asset('images/taxpreparer/payments.webp') }}" alt="Accepted payment methods" class="h-8 w-auto" />
                    <p>
                        &copy; {{ date('Y') }} Tax Adviser - EG Bookkeeping LLC. All Rights Reserved. EG Bookkeeing LLC is the Parent Company of Tax Advicer & CFO EDGE 360
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>