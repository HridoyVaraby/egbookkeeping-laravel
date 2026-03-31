<x-layouts.app 
    title="Cancellation & Refund Policy"
    description="Understand the cancellation and refund terms for EG Bookkeeping LLC's services. We strive for transparency and client satisfaction."
>
    {{-- Page Hero --}}
    @php
        $breadcrumbs = [
            ['label' => 'Home', 'path' => route('home')],
            ['label' => 'Cancellation & Refund', 'path' => route('legal.refund')],
        ];
    @endphp


    <x-ui.page-hero 
        title='Cancellation & <span class="text-eg-accent italic">Refund</span> Policy'
        description="Our policy regarding service cancellations and refund requests."
        :breadcrumbs="$breadcrumbs"
    />

    {{-- Content --}}
    <x-ui.legal-content>
        <p>
            At EG Bookkeeping LLC, we are dedicated to providing high-quality bookkeeping services tailored to your needs. This policy outlines the terms for cancellations and refunds for our services.
        </p>

        <h2>Cancellation Policy</h2>
        <ul>
            <li>Clients may cancel services at any time by providing written notice to <a href="mailto:reaz@egbookkeeping.com">reaz@egbookkeeping.com</a>.</li>
            <li>Cancellations made before any work has commenced will not incur charges.</li>
            <li>For ongoing or completed work, cancellations will not be eligible for a refund for services already performed.</li>
        </ul>

        <h2>Refund Policy</h2>
        <ul>
            <li>Due to the nature of our services, refunds are generally not available once work has commenced.</li>
            <li>If you are unsatisfied with the quality of our services, you may contact us within <strong>7 days</strong> of receipt. We will address your concerns and, if deemed appropriate, provide a pro-rata refund for work not yet performed.</li>
            <li>Refunds will not cover services already delivered or additional costs such as transaction fees or third-party charges.</li>
        </ul>

        <h2>General Terms</h2>
        <ul>
            <li>All requests for cancellations or refunds must be submitted in writing to <a href="mailto:reaz@egbookkeeping.com">reaz@egbookkeeping.com</a>.</li>
            <li>Refunds will only be issued in compliance with the agreed timeline and terms of service.</li>
            <li>This policy is subject to updates to ensure compliance with applicable laws and to reflect company practices.</li>
        </ul>

        <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-eg-heading mt-8">
            <p class="text-base font-medium text-eg-heading">
                Thank you for trusting EG Bookkeeping LLC for your financial management needs.
            </p>
        </div>
    </x-ui.legal-content>

    {{-- CTA --}}
    <x-home.cta />
</x-layouts.app>
