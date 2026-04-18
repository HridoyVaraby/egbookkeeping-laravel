<x-layouts.app
    :title="$post->meta_title ?: $post->title"
    :description="Illuminate\Support\Str::limit(strip_tags($post->meta_description ?: $post->excerpt ?: $post->body), 160)"
    :image="$post->getFeaturedImageUrl()"
    ogType="article"
    :article="[
        'published_time' => $post->created_at->toIso8601String(),
        'modified_time' => $post->updated_at->toIso8601String(),
        'author' => $post->author?->name ?? 'EGBookkeeping',
        'section' => $post->category?->name,
    ]"
    :keywords="$post->meta_keywords ?: 'bookkeeping, small business, ' . $post->category->name"
>
    {{-- BlogPosting JSON-LD Structured Data --}}
    @push('scripts')
        <x-schema.blog-post :post="$post" />
    @endpush

    <x-ui.page-hero
        :title="$post->title"
        :description="$post->excerpt"
        :breadcrumbs="[
            ['label' => 'Home', 'path' => '/'],
            ['label' => 'Blog', 'path' => route('blog.index')],
            ['label' => $post->category->name, 'path' => '#'],
            ['label' => 'Post Details', 'path' => '#']
        ]"
    />

    <article class="py-24 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Featured Image --}}
            @if($post->getFeaturedImageUrl())
                <div class="aspect-[21/9] rounded-3xl overflow-hidden mb-12 shadow-2xl">
                    <img
                        src="{{ $post->getFeaturedImageUrl() }}"
                        alt="{{ $post->title }} - Featured Image"
                        class="w-full h-full object-cover"
                        width="1200"
                        height="514"
                    >
                </div>
            @endif

            {{-- Post Meta --}}
            <div class="flex items-center gap-6 text-sm text-eg-subheading mb-8 border-b border-gray-100 pb-8">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-eg-accent/10 flex items-center justify-center text-eg-accent">
                        <i data-lucide="user" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-eg-off-black">{{ $post->author?->name ?? 'EGBookkeeping' }}</p>
                        <p class="text-xs">Author</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-eg-accent/10 flex items-center justify-center text-eg-accent">
                        <i data-lucide="calendar" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-eg-off-black">{{ $post->created_at->format('M d, Y') }}</p>
                        <p class="text-xs">Published</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-eg-accent/10 flex items-center justify-center text-eg-accent">
                        <i data-lucide="tag" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-eg-off-black">{{ $post->category->name }}</p>
                        <p class="text-xs">Category</p>
                    </div>
                </div>
            </div>

            {{-- Content --}}
            <div class="prose prose-lg max-w-none prose-headings:text-eg-off-black prose-headings:font-bold prose-p:text-eg-body prose-a:text-eg-accent prose-strong:text-eg-off-black prose-img:rounded-2xl">
                {!! \Mews\Purifier\Facades\Purifier::clean($post->body) !!}
            </div>

            {{-- Back to Blog --}}
            <div class="mt-16 pt-12 border-t border-gray-100 flex justify-between items-center">
                <a href="{{ route('blog.index') }}" class="group flex items-center gap-2 text-eg-off-black font-semibold hover:text-eg-accent transition-colors" aria-label="Back to all blog posts">
                    <i data-lucide="arrow-left" class="w-5 h-5 transition-transform group-hover:-translate-x-1"></i>
                    Back to all insights
                </a>

                <div class="flex items-center gap-4">
                    <span class="text-sm font-semibold text-eg-subheading">Share:</span>
                    <div class="flex gap-2">
                        <a
                            href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $post->slug)) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center group hover:bg-eg-accent transition-all"
                            aria-label="Share on LinkedIn"
                        >
                            <img src="{{ asset('images/footer-icons/linkedin.svg') }}" class="w-4 h-4 opacity-50 group-hover:opacity-100 group-hover:invert group-hover:brightness-0 transition-all" alt="LinkedIn" width="16" height="16" />
                        </a>
                        <a
                            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center group hover:bg-eg-accent transition-all"
                            aria-label="Share on Facebook"
                        >
                            <img src="{{ asset('images/footer-icons/facebook.svg') }}" class="w-4 h-4 opacity-50 group-hover:opacity-100 group-hover:invert group-hover:brightness-0 transition-all" alt="Facebook" width="16" height="16" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>

    {{-- Related Posts --}}
    @if($related_posts->count() > 0)
        <section class="py-24 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-eg-off-black mb-12">Related <span class="text-eg-accent italic">Articles</span></h2>
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($related_posts as $related)
                        <a href="{{ route('blog.show', $related->slug) }}" class="group block bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition-all h-full flex flex-col">
                            <div class="aspect-video overflow-hidden">
                                <img
                                    src="{{ $related->getFeaturedImageUrl() ?? 'https://images.unsplash.com/photo-1554224155-1696413565d3?w=800&q=80' }}"
                                    alt="{{ $related->title }}"
                                    class="w-full h-full object-cover transition-transform group-hover:scale-105"
                                    loading="lazy"
                                    width="400"
                                    height="225"
                                >
                            </div>
                            <div class="p-6">
                                <span class="text-xs font-bold text-eg-accent mb-2 block">{{ $related->category->name }}</span>
                                <h3 class="text-lg font-bold text-eg-off-black group-hover:text-eg-accent transition-colors line-clamp-2">{{ $related->title }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-home.cta />
</x-layouts.app>
