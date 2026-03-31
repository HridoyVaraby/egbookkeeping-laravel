@php
    $navLinks = [
        ['name' => 'Home', 'link' => '/'],
        ['name' => 'About', 'link' => '/about'],
        ['name' => 'Services', 'link' => '/services'],
        ['name' => 'Portfolio', 'link' => '/portfolio'],
        ['name' => 'Blog', 'link' => '/blog'],
        ['name' => 'Contact', 'link' => '/contact'],
    ];
@endphp

<header x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 w-full transition-all duration-300 bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60 border-b border-border">
    <div class="container flex h-16 items-center justify-between">
        <div class="flex items-center gap-2">
            <a href="/" class="flex items-center space-x-2">
                <span class="font-display font-bold text-xl text-eg-primary tracking-tight">EG Bookkeeping</span>
            </a>
        </div>

        {{-- Desktop Nav --}}
        <nav class="hidden md:flex gap-6 items-center">
            @foreach($navLinks as $item)
                <a href="{{ $item['link'] }}" class="text-sm font-medium transition-colors hover:text-eg-primary {{ request()->is(trim($item['link'], '/')) ? 'text-eg-primary' : 'text-muted-foreground' }}">
                    {{ $item['name'] }}
                </a>
            @endforeach
            <a href="/pricing" class="px-4 py-2 bg-eg-button text-white rounded-md text-sm font-semibold hover:bg-eg-button/90 transition-all">Get Started</a>
        </nav>

        {{-- Mobile Menu Trigger --}}
        <button class="md:hidden p-2" @click="mobileMenuOpen = !mobileMenuOpen">
            <span class="sr-only">Toggle Menu</span>
            <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="mobileMenuOpen" x-transition.opacity class="fixed inset-0 top-16 z-50 bg-background md:hidden p-6">
        <nav class="flex flex-col gap-4">
            @foreach($navLinks as $item)
                <a href="{{ $item['link'] }}" class="text-lg font-medium border-b border-border py-2" @click="mobileMenuOpen = false">{{ $item['name'] }}</a>
            @endforeach
        </nav>
    </div>
</header>
