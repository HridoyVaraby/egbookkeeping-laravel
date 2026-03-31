/** @type {import('tailwindcss').Config} */
import tailwindcssAnimate from "tailwindcss-animate";

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
            },
            animation: {
                "accordion-down": "accordion-down 0.2s ease-out",
                "accordion-up": "accordion-up 0.2s ease-out",
            },
        },
    },
    plugins: [tailwindcssAnimate],
};
