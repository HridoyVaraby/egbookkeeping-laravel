<x-layouts.app 
    title="Cookie Policy"
    description="Learn how EG Bookkeeping LLC uses cookies and tracking technologies to improve your experience."
>
    {{-- Page Hero --}}
    @php
        $breadcrumbs = [
            ['label' => 'Home', 'path' => route('home')],
            ['label' => 'Cookie Policy', 'path' => route('legal.cookies')],
        ];
    @endphp


    <x-ui.page-hero 
        title='<span class="text-eg-accent italic">Cookie</span> Policy'
        description="Learn about the cookies we use and how you can manage your preferences."
        :breadcrumbs="$breadcrumbs"
    />

    {{-- Content --}}
    <x-ui.legal-content>
        <p>
            EG Bookkeeping LLC (“we,” “us,” or “our”) uses cookies and similar tracking technologies on our website (www.egbookkeeping.com) to improve user experience, analyze website performance, and ensure seamless navigation. This Cookie Policy explains what cookies are, how we use them, and how you can manage your preferences.
        </p>

        <h2>1. What Are Cookies?</h2>
        <p>
            Cookies are small text files stored on your device (computer, tablet, or mobile) when you visit a website. They help the site recognize your device, remember your preferences, and provide personalized experiences.
        </p>

        <h2>2. Types of Cookies We Use</h2>
        
        <h3>Essential Cookies</h3>
        <p>
            These cookies are necessary for the website to function correctly and enable features such as security and accessibility. Without these cookies, certain services may not be available.
        </p>

        <h3>Performance and Analytics Cookies</h3>
        <p>
            These cookies collect anonymous data about how visitors use our website, such as the pages they visit and any errors encountered. This information helps us improve website performance and user experience.
        </p>

        <h3>Functional Cookies</h3>
        <p>
            These cookies remember your preferences and choices, such as language settings or form inputs, to provide a customized experience.
        </p>

        <h3>Advertising and Marketing Cookies</h3>
        <p>
            We may use these cookies to deliver relevant advertisements and track the effectiveness of our marketing campaigns.
        </p>

        <h2>3. How We Use Cookies</h2>
        <ul>
            <li>To ensure the website operates efficiently.</li>
            <li>To analyze website traffic and usage patterns.</li>
            <li>To remember your preferences and provide personalized services.</li>
            <li>To enhance security and prevent fraudulent activities.</li>
        </ul>

        <h2>4. Third-Party Cookies</h2>
        <p>
            We may use third-party services, such as analytics tools (e.g., Google Analytics), which place cookies on your device. These third-party cookies are subject to their respective privacy policies.
        </p>

        <h2>5. Managing Your Cookie Preferences</h2>
        <p>
            You can control or delete cookies through your browser settings. Most browsers allow you to:
        </p>
        <ul>
            <li>View and delete existing cookies.</li>
            <li>Block or allow cookies from specific websites.</li>
            <li>Disable all cookies entirely.</li>
        </ul>
        <p>
            Please note that disabling cookies may affect the functionality of our website.
        </p>

        <h2>6. Changes to This Cookie Policy</h2>
        <p>
            We may update this Cookie Policy to reflect changes in technology, laws, or our practices. Updates will be posted on this page with a revised “Effective Date.”
        </p>

        <h2>7. Contact Us</h2>
        <p>
            If you have questions about this Cookie Policy or how we use cookies, please contact us at:
        </p>
        <p>
            <strong>Email:</strong> <a href="mailto:support@egbookkeeping.com">support@egbookkeeping.com</a>
        </p>
    </x-ui.legal-content>

    {{-- CTA --}}
    <x-home.cta />
</x-layouts.app>
