<x-layouts.app 
    title="Terms & Conditions"
    description="Read the terms and conditions for using EG Bookkeeping LLC's website and services. Understand your rights and responsibilities as a client."
>
    {{-- Page Hero --}}
    @php
        $breadcrumbs = [
            ['label' => 'Home', 'path' => route('home')],
            ['label' => 'Terms & Conditions', 'path' => route('terms')],
        ];
    @endphp

    <x-ui.page-hero 
        title='Terms & <span class="text-eg-accent italic">Conditions</span>'
        description="Please read these terms carefully before engaging with our services."
        :breadcrumbs="$breadcrumbs"
    />

    {{-- Content --}}
    <x-ui.legal-content>
        <p>
            Welcome to EG Bookkeeping LLC ("we," "our," or "us"). These Terms & Conditions govern your access to and use of our website (www.egbookkeeping.com) and services. By using our website or engaging our services, you agree to comply with these terms.
        </p>

        <h2>1. Acceptance of Terms</h2>
        <p>
            By accessing our website or using our services, you confirm that you are at least 18 years old and legally capable of entering into binding agreements.
        </p>

        <h2>2. Services Overview</h2>
        <p>
            EG Bookkeeping LLC provides professional bookkeeping services, including but not limited to:
        </p>
        <ul>
            <li>Catch-up and clean-up bookkeeping.</li>
            <li>Monthly bookkeeping for startups and small businesses.</li>
            <li>Real Estate and Legal (IOLTA) bookkeeping.</li>
            <li>Payroll & US Tax Services.</li>
        </ul>
        <p>
            Our services are subject to the specific scope outlined in your signed service agreement.
        </p>

        <h2>3. Use of the Website</h2>
        <ul>
            <li>You agree to use the website only for lawful purposes.</li>
            <li>You shall not use the website to distribute harmful or unlawful content.</li>
            <li>Unauthorized access, such as hacking or data mining, is strictly prohibited.</li>
        </ul>

        <h2>4. Payment Terms</h2>
        <ul>
            <li>Payments for services must be made as outlined in your service agreement.</li>
            <li>Late payments may result in service suspension or termination.</li>
            <li>All fees are non-refundable unless otherwise stated in our Refund Policy.</li>
        </ul>

        <h2>5. Intellectual Property</h2>
        <ul>
            <li>All content on our website, including text, logos, and design, is the intellectual property of EG Bookkeeping LLC.</li>
            <li>You may not reproduce or use our content without prior written consent.</li>
        </ul>

        <h2>6. Limitation of Liability</h2>
        <ul>
            <li>EG Bookkeeping LLC is not liable for indirect or consequential damages arising from the use of our services.</li>
            <li>We are not responsible for errors caused by inaccurate information provided by clients.</li>
        </ul>

        <h2>7. Governing Law</h2>
        <p>
            These Terms & Conditions are governed by and construed in accordance with the laws of <strong>New Mexico, USA</strong>. Any disputes shall be resolved in the courts of New Mexico, USA.
        </p>

        <h2>8. Contact Us</h2>
        <p>
            If you have any questions about these Terms & Conditions, please contact us at:
        </p>
        <p>
            <strong>Email:</strong> <a href="mailto:support@egbookkeeping.com">support@egbookkeeping.com</a>
        </p>
    </x-ui.legal-content>

    {{-- CTA --}}
    <x-home.cta />
</x-layouts.app>
