@props(['post'])

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "{{ $post->meta_title ?: $post->title }}",
    "description": "{{ Illuminate\Support\Str::limit(strip_tags($post->meta_description ?: $post->excerpt ?: $post->body), 160) }}",
    "url": "{{ route('blog.show', $post->slug) }}",
    @if($post->featured_image)
    "image": "{{ asset('storage/' . $post->featured_image) }}",
    @else
    "image": "{{ asset('images/og-image.jpg') }}",
    @endif
    "datePublished": "{{ $post->created_at->toIso8601String() }}",
    "dateModified": "{{ $post->updated_at->toIso8601String() }}",
    "author": {
        "@type": "Person",
        "name": "{{ $post->author?->name ?? 'EG Bookkeeping LLC' }}"
    },
    "publisher": {
        "@type": "Organization",
        "name": "EG Bookkeeping LLC",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ asset('logo.svg') }}"
        }
    },
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ route('blog.show', $post->slug) }}"
    },
    "articleSection": "{{ $post->category->name }}",
    "wordCount": "{{ str_word_count(strip_tags($post->body)) }}",
    "inLanguage": "en-US"
}
</script>
