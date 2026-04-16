<x-layouts.app 
    title="Our Portfolio"
    description="Explore the successful projects and partnerships led by EG Bookkeeping LLC. See how we've helped businesses achieve financial clarity and growth."
>
    {{-- Page Hero --}}
    @php
        $breadcrumbs = [
            ['label' => 'Home', 'path' => route('home')],
            ['label' => 'Portfolio', 'path' => route('portfolio')],
        ];

        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'category' => 'Web Development',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&q=80',
                'slug' => 'ecommerce-platform',
            ],
            [
                'title' => 'Mobile Banking App',
                'category' => 'Mobile App',
                'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=800&q=80',
                'slug' => 'mobile-banking-app',
            ],
            [
                'title' => 'Brand Identity System',
                'category' => 'Design',
                'image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800&q=80',
                'slug' => 'brand-identity',
            ],
            [
                'title' => 'SaaS Dashboard',
                'category' => 'Web Development',
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=80',
                'slug' => 'saas-dashboard',
            ],
        ];
    @endphp

    <x-ui.page-hero 
        title='<span class="text-eg-accent italic">Our</span> Portfolio'
        description="Real results for real clients. Explore our case studies and successful bookkeeping transformations."
        :breadcrumbs="$breadcrumbs"
    />

    {{-- Portfolio Grid --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 max-w-6xl mx-auto">
                @foreach($projects as $index => $project)
                    @php
                        $cardClasses = $index % 2 == 1 
                            ? 'border-[#F6E7C6] bg-gradient-to-b from-white to-[#fff9ef]' 
                            : 'border-[#E7EEF7] bg-gradient-to-b from-white to-[#f8fbff]';
                    @endphp
                    <div class="group cursor-pointer">
                        <div class="{{ $cardClasses }} rounded-[24px] overflow-hidden shadow-[0_12px_28px_rgba(15,23,42,0.06)] hover:-translate-y-1 hover:shadow-[0_18px_36px_rgba(15,23,42,0.1)] transition-all duration-300 border h-full flex flex-col">
                            {{-- Project Image --}}
                            <div class="aspect-video overflow-hidden relative">
                                <img
                                    src="{{ $project['image'] }}"
                                    alt="{{ $project['title'] }} - {{ $project['category'] }} case study"
                                    class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
                                    loading="lazy"
                                    width="800"
                                    height="450"
                                />
                                <div class="absolute inset-0 bg-black/5 group-hover:bg-black/0 transition-colors"></div>
                            </div>
                            
                            {{-- Project Info --}}
                            <div class="p-6 flex-grow flex flex-col justify-between">
                                <div>
                                    <span class="inline-block px-3 py-1 rounded-full bg-eg-accent/10 text-eg-accent text-xs font-semibold mb-3">
                                        {{ $project['category'] }}
                                    </span>
                                    <h3 class="text-xl font-bold text-eg-heading mb-2 group-hover:text-eg-accent transition-colors font-display">
                                        {{ $project['title'] }}
                                    </h3>
                                </div>
                                <div class="mt-4 flex items-center text-eg-accent font-semibold text-sm">
                                    <span>View Case Study</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <x-home.cta 
        title="Have a Project in Mind?"
        description="Let's work together to bring your vision of financial clarity to life. Schedule a free consultation to discuss your specific needs."
    />
</x-layouts.app>
