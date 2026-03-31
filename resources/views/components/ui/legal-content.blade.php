<section {{ $attributes->merge(['class' => 'bg-white py-16']) }}>
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="prose prose-lg prose-eg max-w-none text-eg-body leading-relaxed">
                {{ $slot }}
            </div>
        </div>
    </div>
</section>

<style>
    .prose-eg h2 {
        color: #171717; /* eg-heading */
        font-family: 'Outfit', sans-serif;
        font-weight: 700;
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }
    .prose-eg p {
        margin-bottom: 1.5rem;
    }
    .prose-eg ul {
        list-style-type: disc;
        padding-left: 1.5rem;
        margin-bottom: 1.5rem;
    }
    .prose-eg li {
        margin-bottom: 0.5rem;
    }
    .prose-eg strong {
        color: #171717;
        font-weight: 600;
    }
    .prose-eg a {
        color: #C2410C; /* eg-accent */
        font-weight: 600;
        text-decoration: underline;
    }
    .prose-eg a:hover {
        color: #9A3412;
    }
</style>
