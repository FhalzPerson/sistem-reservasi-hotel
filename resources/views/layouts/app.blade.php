<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Serene Stay - Temukan Kamar Hotel Terbaik')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-tertiary": "#ffffff", "on-error-container": "#93000a", "surface-dim": "#d5dae2",
                        "primary-fixed-dim": "#b1c5ff", "inverse-surface": "#2b3137", "surface": "#f7f9ff",
                        "secondary-container": "#dfe0e0", "background": "#f7f9ff", "on-tertiary-fixed": "#191c1d",
                        "surface-container-low": "#eff4fc", "outline-variant": "#c2c6d8", "inverse-primary": "#b1c5ff",
                        "tertiary-fixed": "#e1e3e4", "tertiary": "#5c5e60", "on-surface-variant": "#424655",
                        "outline": "#727787", "on-tertiary-container": "#ffffff", "on-surface": "#161c22",
                        "surface-container": "#e9eef6", "on-primary-container": "#ffffff", "on-secondary": "#ffffff",
                        "on-secondary-fixed-variant": "#454747", "inverse-on-surface": "#ecf1f9", "primary-container": "#0d6efd",
                        "tertiary-container": "#757778", "on-primary-fixed-variant": "#00419e", "tertiary-fixed-dim": "#c5c7c8",
                        "surface-container-highest": "#dde3eb", "error-container": "#ffdad6", "secondary-fixed": "#e2e2e2",
                        "on-error": "#ffffff", "surface-container-lowest": "#ffffff", "surface-tint": "#0057ce",
                        "on-secondary-container": "#616363", "surface-variant": "#dde3eb", "secondary-fixed-dim": "#c6c6c7",
                        "on-primary-fixed": "#001946", "on-background": "#161c22", "primary-fixed": "#dae2ff",
                        "on-primary": "#ffffff", "error": "#ba1a1a", "secondary": "#5d5f5f", "primary": "#0057cd",
                        "surface-bright": "#f7f9ff", "on-secondary-fixed": "#1a1c1c", "surface-container-high": "#e3e9f0"
                    },
                    borderRadius: { DEFAULT: "0.25rem", lg: "0.5rem", xl: "0.75rem", full: "9999px" },
                    spacing: { gutter: "24px", lg: "48px", base: "8px", md: "24px", xs: "4px", "container-max": "1240px", xl: "80px", sm: "12px" },
                    fontFamily: { "display-lg": ["Inter"], "label-md": ["Inter"], "headline-md": ["Inter"], "headline-lg-mobile": ["Inter"], "body-lg": ["Inter"], "label-sm": ["Inter"], "headline-lg": ["Inter"], "body-md": ["Inter"] },
                    fontSize: {
                        "display-lg": ["48px", { lineHeight: "1.2", letterSpacing: "-0.02em", fontWeight: "700" }],
                        "label-md": ["14px", { lineHeight: "1.4", letterSpacing: "0.05em", fontWeight: "500" }],
                        "headline-md": ["24px", { lineHeight: "1.4", fontWeight: "600" }],
                        "headline-lg-mobile": ["24px", { lineHeight: "1.3", fontWeight: "600" }],
                        "body-lg": ["18px", { lineHeight: "1.6", fontWeight: "400" }],
                        "label-sm": ["12px", { lineHeight: "1.4", fontWeight: "500" }],
                        "headline-lg": ["32px", { lineHeight: "1.3", fontWeight: "600" }],
                        "body-md": ["16px", { lineHeight: "1.5", fontWeight: "400" }]
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
        .hero-gradient {
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-background text-on-surface">

<!-- TopNavBar -->
<nav class="fixed top-0 left-0 w-full z-50 flex justify-between items-center px-gutter py-sm max-w-container-max mx-auto bg-surface shadow-sm">
    <div class="flex items-center gap-md">
        <span class="font-headline-md text-headline-md font-bold text-primary">Serene Stay</span>
        <div class="hidden md:flex items-center gap-md">
            <a href="{{ route('home') }}" class="font-body-md text-body-md {{ request()->routeIs('home') ? 'text-primary border-b-2 border-primary font-bold' : 'text-on-surface-variant hover:text-primary' }} pb-1 transition-colors duration-200">Home</a>
            <a href="{{ route('rooms.index') }}" class="font-body-md text-body-md {{ request()->routeIs('rooms.index') ? 'text-primary border-b-2 border-primary font-bold' : 'text-on-surface-variant hover:text-primary' }} pb-1 transition-colors duration-200">Kamar</a>
            <a href="{{ route('booking.my') }}" class="font-body-md text-body-md {{ request()->routeIs('booking.my') ? 'text-primary border-b-2 border-primary font-bold' : 'text-on-surface-variant hover:text-primary' }} pb-1 transition-colors duration-200">Riwayat</a>
        </div>
    </div>
    <a href="{{ route('login') }}" class="bg-primary text-on-primary px-md py-xs rounded-lg font-label-md scale-95 active:scale-90 transition-transform">Login</a>
</nav>

<!-- Main Content -->
@yield('content')

<!-- Footer -->
<footer class="bg-surface-container-lowest border-t border-outline-variant">
    <div class="w-full py-md px-gutter flex flex-col md:flex-row justify-between items-center max-w-container-max mx-auto">
        <div class="mb-md md:mb-0">
            <span class="font-headline-md text-headline-md font-bold text-primary">Serene Stay</span>
            <p class="font-label-sm text-on-surface-variant mt-xs">© 2024 Serene Stay. All rights reserved.</p>
        </div>
        <div class="flex flex-wrap justify-center gap-md">
            <a href="#" class="font-label-sm text-on-surface-variant hover:text-primary transition-all">Privacy Policy</a>
            <a href="#" class="font-label-sm text-on-surface-variant hover:text-primary transition-all">Terms of Service</a>
            <a href="#" class="font-label-sm text-on-surface-variant hover:text-primary transition-all">Contact Us</a>
            <a href="#" class="font-label-sm text-on-surface-variant hover:text-primary transition-all">About Us</a>
        </div>
        <div class="flex gap-md mt-md md:mt-0">
            <span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:text-primary transition-colors">public</span>
            <span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:text-primary transition-colors">mail</span>
            <span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:text-primary transition-colors">call</span>
        </div>
    </div>
</footer>

<script>
    // Simple scroll effect for navbar
    window.addEventListener('scroll', () => {
        const nav = document.querySelector('nav');
        if (window.scrollY > 50) {
            nav.classList.add('bg-white/95', 'backdrop-blur-sm');
            nav.classList.remove('bg-surface');
        } else {
            nav.classList.add('bg-surface');
            nav.classList.remove('bg-white/95', 'backdrop-blur-sm');
        }
    });
</script>
@stack('scripts')
</body>
</html>