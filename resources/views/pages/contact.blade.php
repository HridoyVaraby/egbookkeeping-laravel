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
                            <label for="name" class="text-eg-heading font-semibold text-sm mb-2 block font-display">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="name"
                                name="name" 
                                value="{{ old('name') }}"
                                placeholder="Your full name" 
                                required 
                                class="w-full px-4 py-2 rounded-xl border border-gray-200 focus:border-eg-accent focus:ring-2 focus:ring-eg-accent/20 outline-none transition-all @error('name') border-red-500 @enderror"
                            >
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
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
                                    class="w-full px-4 py-2 rounded-xl border border-gray-200 focus:border-eg-accent focus:ring-2 focus:ring-eg-accent/20 outline-none transition-all @error('email') border-red-500 @enderror"
                                >
                                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="phone" class="text-eg-heading font-semibold text-sm mb-2 block font-display">
                                    Phone Number
                                </label>
                                <input 
                                    type="tel" 
                                    id="phone" 
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    placeholder="+1 (555) 000-0000" 
                                    class="w-full px-4 py-2 rounded-xl border border-gray-200 focus:border-eg-accent focus:ring-2 focus:ring-eg-accent/20 outline-none transition-all @error('phone') border-red-500 @enderror"
                                >
                                @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="project_type" class="text-eg-heading font-semibold text-sm mb-2 block font-display">
                                Service Requested <span class="text-red-500">*</span>
                            </label>
                            <select 
                                id="project_type" 
                                name="project_type"
                                required
                                class="w-full px-4 py-2 rounded-xl border border-gray-200 focus:border-eg-accent focus:ring-2 focus:ring-eg-accent/20 outline-none transition-all appearance-none bg-white @error('project_type') border-red-500 @enderror"
                            >
                                <option value="" disabled {{ old('project_type') ? '' : 'selected' }}>Select a service</option>
                                <option value="Monthly Bookkeeping" {{ old('project_type') == 'Monthly Bookkeeping' ? 'selected' : '' }}>Monthly Bookkeeping</option>
                                <option value="Catch-Up Bookkeeping" {{ old('project_type') == 'Catch-Up Bookkeeping' ? 'selected' : '' }}>Catch-Up Bookkeeping</option>
                                <option value="Payroll Services" {{ old('project_type') == 'Payroll Services' ? 'selected' : '' }}>Payroll Services</option>
                                <option value="Tax Preparation" {{ old('project_type') == 'Tax Preparation' ? 'selected' : '' }}>Tax Preparation</option>
                                <option value="Business Consultation" {{ old('project_type') == 'Business Consultation' ? 'selected' : '' }}>Business Consultation</option>
                                <option value="Other" {{ old('project_type') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('project_type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
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
                                placeholder="Tell us about your business and how we can assist you..."
                                class="w-full px-4 py-2 rounded-xl border border-gray-200 focus:border-eg-accent focus:ring-2 focus:ring-eg-accent/20 outline-none transition-all resize-none @error('message') border-red-500 @enderror"
                            >{{ old('message') }}</textarea>
                            @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="pt-2">
                            <x-ui.button 
                                type="submit" 
                                variant="primary"
                                class="w-full py-4 text-lg"
                            >
                                Submit Request
                            </x-ui.button>
                            <p class="text-center text-xs text-gray-400 mt-4 italic">
                                We usually respond within 24 business hours.
                            </p>
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
