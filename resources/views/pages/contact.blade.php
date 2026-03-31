<x-layouts.app 
    title="Contact Us"
    description="Get in touch with EG Bookkeeping LLC. We're here to help with all your bookkeeping, payroll, and tax needs. Reach out for a free consultation today."
>
    {{-- Page Hero --}}
    @php
        $breadcrumbs = [
            ['label' => 'Home', 'path' => route('home')],
            ['label' => 'Contact', 'path' => route('contact')],
        ];
    @endphp

    <x-ui.page-hero 
        title='<span class="text-eg-accent italic">Contact</span> Us'
        description="We're here to help with all your bookkeeping needs. Reach out to EG Bookkeeping LLC for inquiries, consultations, or assistance. We look forward to connecting with you!"
        :breadcrumbs="$breadcrumbs"
    />

    {{-- Contact Section --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">
                
                {{-- Left Side - Form --}}
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold mb-2 font-display">
                        <span class="text-eg-heading">Send Us a </span>
                        <span class="text-eg-accent italic">Message</span>
                    </h2>
                    <p class="text-eg-body text-sm mb-8">
                        Have a question or need assistance? Fill out the form below, and we'll get back to you as soon as possible. Your inquiries are important to us!
                    </p>

                    @if(session('success'))
                        <div class="mb-8 p-4 bg-green-50 border-l-4 border-green-500 text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div>
                            <label class="text-eg-heading font-semibold text-sm mb-2 block font-display">
                                Name <span class="text-red-500">*</span>
                            </label>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <input 
                                        type="text" 
                                        name="first_name" 
                                        value="{{ old('first_name') }}"
                                        placeholder="First Name" 
                                        required 
                                        class="w-full px-4 py-2 rounded border border-gray-300 focus:border-eg-accent focus:ring-2 focus:ring-eg-accent/20 outline-none transition-all @error('first_name') border-red-500 @enderror"
                                    >
                                    @error('first_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <input 
                                        type="text" 
                                        name="last_name" 
                                        value="{{ old('last_name') }}"
                                        placeholder="Last Name" 
                                        required 
                                        class="w-full px-4 py-2 rounded border border-gray-300 focus:border-eg-accent focus:ring-2 focus:ring-eg-accent/20 outline-none transition-all @error('last_name') border-red-500 @enderror"
                                    >
                                    @error('last_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="email" class="text-eg-heading font-semibold text-sm mb-2 block font-display">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="your@email.com" 
                                required 
                                class="w-full px-4 py-2 rounded border border-gray-300 focus:border-eg-accent focus:ring-2 focus:ring-eg-accent/20 outline-none transition-all @error('email') border-red-500 @enderror"
                            >
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="whatsapp" class="text-eg-heading font-semibold text-sm mb-2 block font-display">
                                WhatsApp Number
                            </label>
                            <input 
                                type="tel" 
                                id="whatsapp" 
                                name="whatsapp"
                                value="{{ old('whatsapp') }}"
                                placeholder="+1 (555) 000-0000" 
                                class="w-full px-4 py-2 rounded border border-gray-300 focus:border-eg-accent focus:ring-2 focus:ring-eg-accent/20 outline-none transition-all @error('whatsapp') border-red-500 @enderror"
                            >
                            @error('whatsapp') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="message" class="text-eg-heading font-semibold text-sm mb-2 block font-display">
                                Your Message <span class="text-red-500">*</span>
                            </label>
                            <textarea
                                id="message"
                                name="message"
                                required
                                rows="5"
                                placeholder="How can we help you?"
                                class="w-full px-4 py-2 rounded border border-gray-300 focus:border-eg-accent focus:ring-2 focus:ring-eg-accent/20 outline-none transition-all resize-none @error('message') border-red-500 @enderror"
                            >{{ old('message') }}</textarea>
                            @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="pt-4">
                            <x-ui.button 
                                type="submit" 
                                variant="primary"
                                class="w-full sm:w-auto"
                            >
                                Send Message
                            </x-ui.button>
                        </div>
                    </form>
                </div>

                {{-- Right Side - Contact Info --}}
                <div class="bg-gray-50 p-8 lg:p-10 rounded-lg">
                    <h2 class="text-3xl md:text-4xl font-bold text-eg-heading mb-4 font-display">
                        Let's talk
                    </h2>
                    <p class="text-eg-body text-sm leading-relaxed mb-8">
                        Prefer a more direct approach? Reach out to us via email or phone, and our team will be happy to assist you with your bookkeeping needs. We're here to provide answers and support, ensuring a smooth and seamless experience.
                    </p>

                    <div class="space-y-6">
                        {{-- Address --}}
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-eg-accent/10 rounded flex items-center justify-center flex-shrink-0">
                                <i data-lucide="map-pin" class="w-5 h-5 text-eg-accent"></i>
                            </div>
                            <div>
                                <p class="text-eg-heading font-semibold text-sm mb-1 font-display">Office Address</p>
                                <p class="text-eg-body text-sm leading-relaxed">
                                    1209 MOUNTAIN ROAD PL NE, STE R, ALBUQUERQUE, NM 87110, USA
                                </p>
                            </div>
                        </div>

                        {{-- Emails --}}
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-eg-accent/10 rounded flex items-center justify-center flex-shrink-0">
                                <i data-lucide="mail" class="w-5 h-5 text-eg-accent"></i>
                            </div>
                            <div>
                                <p class="text-eg-heading font-semibold text-sm mb-1 font-display">Email Us</p>
                                <div class="space-y-1">
                                    <a href="mailto:reaaz@egbookkeeping.com" class="text-eg-body text-sm hover:text-eg-accent block transition-colors">
                                        reaaz@egbookkeeping.com
                                    </a>
                                    <a href="mailto:support@egbookkeeping.com" class="text-eg-body text-sm hover:text-eg-accent block transition-colors">
                                        support@egbookkeeping.com
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Phone --}}
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-eg-accent/10 rounded flex items-center justify-center flex-shrink-0">
                                <i data-lucide="phone" class="w-5 h-5 text-eg-accent"></i>
                            </div>
                            <div>
                                <p class="text-eg-heading font-semibold text-sm mb-1 font-display">Call Us</p>
                                <a href="tel:+15055232471" class="text-eg-body text-sm hover:text-eg-accent block transition-colors">
                                    +1 505 523 2471
                                </a>
                            </div>
                        </div>

                        {{-- WhatsApp --}}
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-green-50 rounded flex items-center justify-center flex-shrink-0 border border-green-100">
                                <i data-lucide="message-circle" class="w-5 h-5 text-green-600"></i>
                            </div>
                            <div>
                                <p class="text-eg-heading font-semibold text-sm mb-1 font-display">WhatsApp</p>
                                <a href="https://wa.me/8801973301465" class="text-eg-body text-sm hover:text-green-600 block transition-colors">
                                    +88 01973 301465
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Map placeholder if needed --}}
</x-layouts.app>
