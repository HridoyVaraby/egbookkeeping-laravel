@props(['posts'])

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-eg-off-black mb-4">
                Latest <span class="text-eg-accent italic">Posts</span>
            </h2>
            <p class="text-lg text-eg-body max-w-2xl mx-auto">
                Insights, tips, and stories from our team of bookkeeping experts.
            </p>
        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse($posts as $post)
                <a href="{{ route('blog.show', $post->slug) }}" class="group block h-full">
                    <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 h-full flex flex-col">
                        <div class="aspect-video overflow-hidden relative">
                            <img 
                                src="{{ $post->getFeaturedImageUrl() ?? 'https://images.unsplash.com/photo-1454165833741-97b5299e896f?w=800&q=80' }}" 
                                alt="{{ $post->title }}"
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                loading="lazy"
                                width="800"
                                height="450"
                            >
                            <div class="absolute top-4 left-4">
                                <span class="bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold text-eg-accent shadow-sm">
                                    {{ $post->category->name }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="p-6 flex-grow flex flex-col">
                            <div class="flex items-center gap-3 text-xs text-eg-subheading mb-3">
                                <span class="flex items-center gap-1">
                                    <i data-lucide="user" class="w-3 h-3"></i>
                                    EGBookkeeping
                                </span>
                                <span class="flex items-center gap-1">
                                    <i data-lucide="calendar" class="w-3 h-3"></i>
                                    {{ $post->created_at->format('M d, Y') }}
                                </span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-eg-off-black mb-3 group-hover:text-eg-accent transition-colors">
                                {{ $post->title }}
                            </h3>
                            
                            <p class="text-sm text-eg-body line-clamp-3">
                                {{ $post->excerpt }}
                            </p>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-eg-body">No blog posts found at the moment.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16">
            {{ $posts->links() }}
        </div>
    </div>
</section>
