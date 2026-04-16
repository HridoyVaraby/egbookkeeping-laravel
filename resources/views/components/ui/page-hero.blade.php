@props([
    'title',
    'description' => null,
    'breadcrumbs' => [],
])

<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center">
            {{-- Breadcrumbs --}}
            @if(count($breadcrumbs) > 0)
                <nav class="mb-4 flex justify-center items-center gap-1 text-sm text-eg-body/60">
                    @foreach($breadcrumbs as $index => $crumb)
                        <div class="flex items-center">
                            @if($index > 0)
                                <span class="mx-2 text-gray-400">/</span>
                            @endif
                            <a 
                                href="{{ $crumb['path'] }}" 
                                class="hover:text-eg-accent transition-colors {{ $loop->last ? 'font-semibold text-eg-heading' : '' }}"
                            >
                                {{ $crumb['label'] }}
                            </a>
                        </div>
                    @endforeach
                </nav>
            @endif

            {{-- Title --}}
            <h1 class="text-4xl font-bold tracking-tight text-eg-heading sm:text-5xl font-display">
                {!! Purifier::clean($title) !!}
            </h1>

            {{-- Description --}}
            @if($description)
                <p class="mt-4 mx-auto max-w-2xl text-lg text-eg-body">
                    {{ $description }}
                </p>
            @endif
        </div>
    </div>
</section>
