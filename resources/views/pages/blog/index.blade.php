<x-layouts.app
    title="Expert Insights & Small Business Advice"
    description="Stay informed with the latest bookkeeping trends, tax preparation tips, and financial strategies for your small business from EG Bookkeeping LLC."
    keywords="bookkeeping blog, small business advice, tax tips, financial management, QuickBooks tips, Xero tips"
>
    <x-ui.page-hero
        title="Our <span class='text-eg-accent italic'>Blog</span>"
        description="Insights, tutorials, and industry news for small business owners."
        :breadcrumbs="[['label' => 'Home', 'path' => '/'], ['label' => 'Blog', 'path' => '/blog']]"
    />

    <x-blog.list :posts="$posts" />

    <x-home.cta />
</x-layouts.app>
