<header 
    x-data="{ isMenuOpen: false }"
    class="sticky top-0 z-50 w-full bg-white shadow-sm border-b border-gray-100"
>
    <nav class="container mx-auto flex h-20 items-center justify-between px-4">
        @php
            $navItems = [
                ['label' => 'Home', 'path' => '/'],
                ['label' => 'Services', 'path' => '/services'],
                ['label' => 'Industries', 'path' => '/industries'],
                ['label' => 'Benefits', 'path' => '/benefits'],
                ['label' => 'About Us', 'path' => '/about'],
                ['label' => 'Pricing', 'path' => '/pricing'],
                ['label' => 'Blog', 'path' => '/blog'],
                ['label' => 'Contact Us', 'path' => '/contact'],
            ];
        @endphp

        <a href="{{ url('/') }}" class="flex items-center">
            <img src="{{ asset('logo.svg') }}" alt="EG Bookkeeping LLC" class="h-12" />
        </a>

        <!-- Desktop Navigation -->
        <div class="hidden lg:flex lg:items-center lg:gap-8">
            @foreach($navItems as $item)
                @php
                    $isActive = Request::is(trim($item['path'], '/')) || (Request::is('/') && $item['path'] == '/');
                @endphp
                <a 
                    href="{{ url($item['path']) }}" 
                    class="text-sm font-medium text-eg-body hover:text-eg-link transition-colors {{ $isActive ? 'text-eg-link' : '' }}"
                >
                    {{ $item['label'] }}
                </a>
            @endforeach

            <x-ui.button 
                href="https://calendly.com/md-reazul-haque/30min" 
                target="_blank" 
                rel="noopener noreferrer"
                class="bg-eg-button hover:bg-eg-primary text-white font-semibold px-6 py-2 rounded-md transition-colors"
            >
                Book A Call
            </x-ui.button>
        </div>

        <!-- Mobile Menu Toggle -->
        <button
            class="lg:hidden"
            @click="isMenuOpen = !isMenuOpen"
            aria-label="Toggle menu"
        >
            <i x-show="!isMenuOpen" data-lucide="menu" class="h-6 w-6"></i>
            <i x-show="isMenuOpen" data-lucide="x" class="h-6 w-6"></i>
        </button>

        <!-- Mobile Navigation -->
        <div 
            x-show="isMenuOpen" 
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-1"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="absolute left-0 right-0 top-20 border-b bg-white p-4 lg:hidden shadow-lg"
            @click.away="isMenuOpen = false"
        >
            <div class="flex flex-col gap-4">
                @foreach($navItems as $item)
                    @php
                        $isActive = Request::is(trim($item['path'], '/')) || (Request::is('/') && $item['path'] == '/');
                    @endphp
                    <a 
                        href="{{ url($item['path']) }}" 
                        class="text-sm font-medium text-eg-body hover:text-eg-link transition-colors {{ $isActive ? 'text-eg-link' : '' }}"
                        @click="isMenuOpen = false"
                    >
                        {{ $item['label'] }}
                    </a>
                @endforeach
                
                <x-ui.button 
                    href="https://calendly.com/md-reazul-haque/30min" 
                    target="_blank" 
                    rel="noopener noreferrer"
                    class="bg-eg-button hover:bg-eg-primary text-white font-semibold px-6 py-2 rounded-md transition-colors w-full"
                >
                    Book A Call
                </x-ui.button>
            </div>
        </div>
    </nav>
</header>
