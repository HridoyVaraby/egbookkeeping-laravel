@props([
    'title' => 'Expert Bookkeeping Services for Law Firms & Small Businesses',
    'description' => 'EG Bookkeeping LLC offers professional, accurate, and reliable bookkeeping solutions tailored for law firms and real estate professionals.',
    'image' => asset('ograph.png'),
    'url' => url()->current(),
    'type' => 'website',
    'article' => null,
    'keywords' => 'bookkeeping, law firm bookkeeping, real estate bookkeeping, QuickBooks Online, Xero, financial reporting',
])

<title>{{ $title }} | EG Bookkeeping LLC</title>
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">
<link rel="canonical" href="{{ $url }}">

{{-- Open Graph / Facebook --}}
<meta property="og:type" content="{{ $type }}">
<meta property="og:url" content="{{ $url }}">
<meta property="og:title" content="{{ $title }} | EG Bookkeeping LLC">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:site_name" content="EG Bookkeeping LLC">
<meta property="og:locale" content="en_US">

{{-- Twitter --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ $url }}">
<meta name="twitter:title" content="{{ $title }} | EG Bookkeeping LLC">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $image }}">

{{-- Article-specific OG tags for blog posts --}}
@if($article)
<meta property="article:published_time" content="{{ $article['published_time'] ?? '' }}">
<meta property="article:modified_time" content="{{ $article['modified_time'] ?? '' }}">
<meta property="article:author" content="{{ $article['author'] ?? 'EGBookkeeping' }}">
@if(isset($article['section']))
<meta property="article:section" content="{{ $article['section'] }}">
@endif
@endif
