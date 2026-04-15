<x-layouts.app 
    title="Privacy Policy"
    description="Learn how EG Bookkeeping LLC collects, uses, and protects your personal information."
>
    {{-- Page Hero --}}
    @php
        $breadcrumbs = [
            ['label' => 'Home', 'path' => route('home')],
            ['label' => 'Privacy Policy', 'path' => route('legal.privacy')],
        ];
    @endphp


    <x-ui.page-hero 
        title='<span class="text-eg-accent italic">Privacy</span> Policy'
        description="Your privacy is important to us. Learn how we protect your information."
        :breadcrumbs="$breadcrumbs"
    />

    {{-- Content --}}
    <x-ui.legal-content>
        <p>
            EG Bookkeeping LLC (“we,” “us,” or “our”) is committed to protecting your privacy. This Privacy Policy outlines how we collect, use, and safeguard your information when you visit our website (www.egbookkeeping.com) or engage with our services.
        </p>

        <h2>1. Information We Collect</h2>
        <p>
            We collect information to provide better services to our users. The types of information we may collect include:
        </p>
        <ul>
            <li><strong>Personal Information:</strong> Name, email address, phone number, and any other information you provide through contact forms, consultations, or email.</li>
            <li><strong>Non-Personal Information:</strong> Browser type, IP address, and usage data to improve our website and services.</li>
            <li><strong>Payment Information:</strong> For transactions, if applicable, processed securely through third-party payment providers.</li>
        </ul>

        <h2>2. How We Use Your Information</h2>
        <p>
            We use the collected information to:
        </p>
        <ul>
            <li>Provide and improve our bookkeeping services.</li>
            <li>Communicate with you about your inquiries or service updates.</li>
            <li>Send marketing communications (only with your consent).</li>
            <li>Comply with legal obligations and enforce our policies.</li>
        </ul>

        <h2>3. Sharing Your Information</h2>
        <p>
            We do not sell, rent, or trade your personal information. However, we may share your information with:
        </p>
        <ul>
            <li><strong>Service Providers:</strong> Third-party companies that assist in providing our services (e.g., payment processors, email providers).</li>
            <li><strong>Legal Obligations:</strong> If required by law or to protect our rights and safety.</li>
        </ul>

        <h2>4. Cookies and Tracking Technologies</h2>
        <p>
            We may use cookies to enhance user experience, analyze site traffic, and personalize content. You can manage cookie preferences through your browser settings.
        </p>

        <h2>5. Data Security</h2>
        <p>
            At EG Bookkeeping LLC, protecting your financial, tax, and payroll information is one of our highest priorities. We apply industry-standard security protocols to safeguard your data from unauthorized access, alteration, or loss. This includes:
        </p>
        <ul>
            <li>Encrypted communication (SSL/TLS)</li>
            <li>Secure, compliant cloud platforms (SOC 2, GDPR, HIPAA)</li>
            <li>Restricted access controls and two-factor authentication (2FA)</li>
            <li>Regular backups, monitoring, and updates</li>
        </ul>
        <p>
            We treat all sensitive information — including tax documents, payroll records, financial statements, and identity details — with strict confidentiality, in line with IRS requirements and applicable data protection laws.
        </p>
        <p>
            While we do everything reasonably possible to secure your data, no system is completely immune to risks. We also recommend that you follow safe practices when sharing or accessing documents.
        </p>
        <p>
            By working with EG Bookkeeping LLC, you can be confident that your bookkeeping, payroll, and tax information is handled with the highest level of security, care, and professionalism.
        </p>

        <h2>6. Your Rights</h2>
        <p>
            Depending on your location, you may have the following rights regarding your data:
        </p>
        <ul>
            <li>Access, update, or delete your personal information.</li>
            <li>Opt-out of marketing communications.</li>
            <li>Restrict or object to data processing.</li>
        </ul>
        <p>
            To exercise these rights, contact us at <a href="mailto:support@egbookkeeping.com">support@egbookkeeping.com</a>.
        </p>

        <h2>7. Third-Party Links</h2>
        <p>
            Our website may contain links to third-party websites. We are not responsible for the privacy practices of these websites.
        </p>

        <h2>8. Contact Us</h2>
        <p>
            If you have any questions about this Privacy Policy or how we handle your data, please contact us at:
        </p>
        <p>
            <strong>Email:</strong> <a href="mailto:support@egbookkeeping.com">support@egbookkeeping.com</a>
        </p>
    </x-ui.legal-content>

    {{-- CTA --}}
    <x-home.cta />
</x-layouts.app>
