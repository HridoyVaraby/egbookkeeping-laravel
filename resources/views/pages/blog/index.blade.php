<x-layout>
    <x-slot:title>Expert Insights & Small Business Advice | EGBookkeeping Blog</x-slot:title>
    <x-slot:meta_description>Stay informed with the latest bookkeeping trends, tax preparation tips, and financial strategies for your small business.</x-slot:meta_description>

    <x-ui.page-hero 
        title="Our <span class='text-eg-accent italic'>Blog</span>"
        description="Insights, tutorials, and industry news for small business owners."
        :breadcrumbs="[['label' => 'Home', 'path' => '/'], ['label' => 'Blog', 'path' => '/blog']]"
    />

    <x-blog.list :posts="$posts" />

    <x-sections.newsletter />
</x-layout>
