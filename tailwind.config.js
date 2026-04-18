/** @type {import('tailwindcss').Config} */
import tailwindcssAnimate from "tailwindcss-animate";
import tailwindTypography from "@tailwindcss/typography";

export default {
    darkMode: ["class"],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        container: {
            center: true,
            padding: "2rem",
            screens: {
                "2xl": "1400px",
            },
        },
        extend: {
            fontFamily: {
                sans: ["Poppins", "ui-sans-serif", "system-ui"],
                display: ["Raleway", "ui-sans-serif", "system-ui"],
                playfair: ["Playfair Display", "ui-serif", "Georgia"],
            },
            fontSize: {
                xs: ['12px', '18px'], // Standard tiny text
                sm: ['16px', '26px'], // Replaces all card and body descriptions to explicitly be 16px/26px
                base: ['18px', '26px'], // Replaces subheadings globally to 18px/26px
                lg: ['20px', '28px'], // Slightly larger subheadings
                xl: ['24px', '26px'], // Standardizes card titles globally to 24px/26px
                '2xl': ['28px', '32px'],
                '3xl': ['32px', '38px'],
                '4xl': ['36px', '42px'],
                '5xl': ['48px', '48px'],
            },
            colors: {
                border: "hsl(var(--border))",
                input: "hsl(var(--input))",
                ring: "hsl(var(--ring))",
                background: "hsl(var(--background))",
                foreground: "hsl(var(--foreground))",
                primary: {
                    DEFAULT: "hsl(var(--primary))",
                    foreground: "hsl(var(--primary-foreground))",
                },
                secondary: {
                    DEFAULT: "hsl(var(--secondary))",
                    foreground: "hsl(var(--secondary-foreground))",
                },
                destructive: {
                    DEFAULT: "hsl(var(--destructive))",
                    foreground: "hsl(var(--destructive-foreground))",
                },
                muted: {
                    DEFAULT: "hsl(var(--muted))",
                    foreground: "hsl(var(--muted-foreground))",
                },
                accent: {
                    DEFAULT: "hsl(var(--accent))",
                    foreground: "hsl(var(--accent-foreground))",
                },
                popover: {
                    DEFAULT: "hsl(var(--popover))",
                    foreground: "hsl(var(--popover-foreground))",
                },
                card: {
                    DEFAULT: "hsl(var(--card))",
                    foreground: "hsl(var(--card-foreground))",
                },
                // EG Bookkeeping custom colors
                'eg-primary': '#EBA927',
                'eg-accent': '#f55714',
                'eg-button': '#2374b7',
                'eg-heading': '#2374b7',
                'eg-subheading': '#000000',
                'eg-body': '#333333',
                'eg-link': '#EBA927',
                'eg-link-pink': '#EC4899',
                // Legacy colors
                'eg-orange': '#FF6B35',
                'eg-teal': '#20B2AA',
                'eg-navy': '#1E3A5F',
                'eg-slate': '#2D3748',
                'eg-dark-slate': '#1A202C',
                'eg-light-gray': '#F7FAFC',
                'eg-gray': '#4A5568',
                // Tax Preparer specific colors
                'tax-primary': {
                    DEFAULT: '#EBA927',
                    50: '#fef9ec',
                    100: '#fdf2d3',
                    200: '#fbe5a7',
                    300: '#f7d170',
                    400: '#f3ba45',
                    500: '#EBA927',
                    600: '#d89520',
                    700: '#b3751b',
                    800: '#915c1c',
                    900: '#764b1b',
                },
                'tax-accent': {
                    DEFAULT: '#2374b7',
                    light: '#60a5fa',
                    dark: '#1a5286',
                },
                'tax-success': {
                    DEFAULT: '#25D366',
                    dark: '#20BA5A',
                },
                sidebar: {
                    DEFAULT: "hsl(var(--sidebar-background))",
                    foreground: "hsl(var(--sidebar-foreground))",
                    primary: "hsl(var(--sidebar-primary))",
                    "primary-foreground": "hsl(var(--sidebar-primary-foreground))",
                    accent: "hsl(var(--sidebar-accent))",
                    "accent-foreground": "hsl(var(--sidebar-accent-foreground))",
                    border: "hsl(var(--sidebar-border))",
                    ring: "hsl(var(--sidebar-ring))",
                },
            },
            borderRadius: {
                lg: "var(--radius)",
                md: "calc(var(--radius) - 2px)",
                sm: "calc(var(--radius) - 4px)",
            },
            keyframes: {
                "accordion-down": {
                    from: {
                        height: "0",
                    },
                    to: {
                        height: "var(--radix-accordion-content-height)",
                    },
                },
                "accordion-up": {
                    from: {
                        height: "var(--radix-accordion-content-height)",
                    },
                    to: {
                        height: "0",
                    },
                },
                "tax-fade-in": {
                    from: { opacity: "0" },
                    to: { opacity: "1" },
                },
                "tax-slide-up": {
                    from: { opacity: "0", transform: "translateY(30px)" },
                    to: { opacity: "1", transform: "translateY(0)" },
                },
                "tax-fade-in-up": {
                    from: { opacity: "0", transform: "translateY(40px)" },
                    to: { opacity: "1", transform: "translateY(0)" },
                },
                "tax-blob": {
                    "0%, 100%": { transform: "translate(0, 0) scale(1)" },
                    "33%": { transform: "translate(30px, -50px) scale(1.1)" },
                    "66%": { transform: "translate(-20px, 20px) scale(0.9)" },
                }
            },
            animation: {
                "accordion-down": "accordion-down 0.2s ease-out",
                "accordion-up": "accordion-up 0.2s ease-out",
                "tax-fade-in": "tax-fade-in 0.8s ease-out",
                "tax-slide-up": "tax-slide-up 0.8s ease-out",
                "tax-slide-up-delay-1": "tax-slide-up 0.8s ease-out 0.2s both",
                "tax-slide-up-delay-2": "tax-slide-up 0.8s ease-out 0.4s both",
                "tax-fade-in-up": "tax-fade-in-up 1s ease-out 0.6s both",
                "tax-fade-in-up-delay": "tax-fade-in-up 1s ease-out 0.8s both",
                "tax-blob": "tax-blob 7s infinite",
            },
        },
    },
    plugins: [tailwindcssAnimate, tailwindTypography],
};
