@php
    $platforms = [
        ['name' => 'QuickBooks Online', 'image' => asset('images/company-icons/QuickBooksOnlineLogo-removebg-preview-1.png')],
        ['name' => 'CosmoLex', 'image' => asset('images/company-icons/CosmoLex1.png')],
        ['name' => 'LawPay', 'image' => asset('images/company-icons/Lawpay.png')],
        ['name' => 'Xero', 'image' => asset('images/company-icons/xero-seeklogo.svg')],
        ['name' => 'Clio', 'image' => asset('images/company-icons/Logo_Clio-Logo-Blue-1024x338.png')],
        ['name' => 'LEAP', 'image' => asset('images/company-icons/LEAP-Logo.webp')],
        ['name' => 'Buildium', 'image' => asset('images/company-icons/Asset-1.png')],
    ];
@endphp

<section class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-[400px_1fr] gap-12 items-start">
            <!-- Left side - Title and description -->
            <div class="relative lg:pl-6 animate-on-scroll">
                {{-- Gradient left accent line --}}
                <div class="hidden lg:block absolute left-0 top-0 w-1.5 rounded-full" style="background: linear-gradient(to top, #f55714, #D4A853, #C69026); height: 100%;"></div>
                <h2 class="text-3xl md:text-4xl font-bold text-[#1F2937] mb-4 leading-tight font-display">
                    Top Accounting Platforms <span class="text-eg-accent">We Use</span>
                </h2>
                <p class="text-[16px] leading-[26px] font-sans text-[#4B5563]">
                    We utilize the most reliable and advanced accounting tools to ensure accuracy, 
                    efficiency, and peace of mind for your business.
                </p>
            </div>

            <!-- Right side - Platform logos grid -->
            <div class="rounded-[28px] border border-slate-100 bg-[linear-gradient(180deg,_#ffffff_0%,_#f8fbff_100%)] p-8 shadow-[0_18px_50px_rgba(15,23,42,0.06)] md:p-12">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-x-12 gap-y-10 items-center justify-items-center">
                    @foreach($platforms as $platform)
                        <div class="flex h-20 w-full items-center justify-center rounded-2xl border border-transparent bg-white/70 px-4 animate-on-scroll delay-{{ ($loop->index % 4 + 1) * 100 }}">
                            <img
                                src="{{ $platform['image'] }}"
                                alt="{{ $platform['name'] }} accounting platform logo"
                                class="max-w-full max-h-full object-contain grayscale opacity-70 hover:opacity-100 hover:grayscale-0 hover:scale-105 transition-all duration-300 ease-out"
                                loading="lazy"
                                width="160"
                                height="60"
                            />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
