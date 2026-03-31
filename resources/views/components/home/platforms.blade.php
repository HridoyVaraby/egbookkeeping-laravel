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

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-[400px_1fr] gap-12 items-start">
            <!-- Left side - Title and description -->
            <div class="lg:border-l-4 lg:border-eg-accent lg:pl-6">
                <h2 class="text-4xl lg:text-5xl font-bold text-eg-heading mb-4 leading-tight font-display">
                    Top Accounting Platforms We Use
                </h2>
                <p class="text-eg-body text-base leading-relaxed">
                    We utilize the most reliable and advanced accounting tools to ensure accuracy, 
                    efficiency, and peace of mind for your business.
                </p>
            </div>

            <!-- Right side - Platform logos grid -->
            <div class="bg-gray-50 rounded-lg p-12">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-x-12 gap-y-10 items-center justify-items-center">
                    @foreach($platforms as $platform)
                        <div class="flex items-center justify-center w-full h-20">
                            <img
                                src="{{ $platform['image'] }}"
                                alt="{{ $platform['name'] }}"
                                class="max-w-full max-h-full object-contain grayscale hover:grayscale-0 transition-all duration-300"
                            />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
