<!DOCTYPE html>
<html class="light" lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Serene Stay - Temukan Kamar Hotel Terbaik</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                "on-tertiary": "#ffffff",
                "on-error-container": "#93000a",
                "surface-dim": "#d5dae2",
                "primary-fixed-dim": "#b1c5ff",
                "inverse-surface": "#2b3137",
                "surface": "#f7f9ff",
                "secondary-container": "#dfe0e0",
                "background": "#f7f9ff",
                "on-tertiary-fixed": "#191c1d",
                "surface-container-low": "#eff4fc",
                "outline-variant": "#c2c6d8",
                "inverse-primary": "#b1c5ff",
                "tertiary-fixed": "#e1e3e4",
                "tertiary": "#5c5e60",
                "on-surface-variant": "#424655",
                "outline": "#727787",
                "on-tertiary-container": "#ffffff",
                "on-surface": "#161c22",
                "surface-container": "#e9eef6",
                "on-primary-container": "#ffffff",
                "on-secondary": "#ffffff",
                "on-secondary-fixed-variant": "#454747",
                "inverse-on-surface": "#ecf1f9",
                "primary-container": "#0d6efd",
                "tertiary-container": "#757778",
                "on-primary-fixed-variant": "#00419e",
                "tertiary-fixed-dim": "#c5c7c8",
                "surface-container-highest": "#dde3eb",
                "error-container": "#ffdad6",
                "secondary-fixed": "#e2e2e2",
                "on-error": "#ffffff",
                "surface-container-lowest": "#ffffff",
                "surface-tint": "#0057ce",
                "on-secondary-container": "#616363",
                "surface-variant": "#dde3eb",
                "secondary-fixed-dim": "#c6c6c7",
                "on-primary-fixed": "#001946",
                "on-background": "#161c22",
                "primary-fixed": "#dae2ff",
                "on-primary": "#ffffff",
                "error": "#ba1a1a",
                "secondary": "#5d5f5f",
                "primary": "#0057cd",
                "surface-bright": "#f7f9ff",
                "on-secondary-fixed": "#1a1c1c",
                "surface-container-high": "#e3e9f0"
            },
            "borderRadius": {
                "DEFAULT": "0.25rem",
                "lg": "0.5rem",
                "xl": "0.75rem",
                "full": "9999px"
            },
            "spacing": {
                "gutter": "24px",
                "lg": "48px",
                "base": "8px",
                "md": "24px",
                "xs": "4px",
                "container-max": "1240px",
                "xl": "80px",
                "sm": "12px"
            },
            "fontFamily": {
                "display-lg": ["Inter"],
                "label-md": ["Inter"],
                "headline-md": ["Inter"],
                "headline-lg-mobile": ["Inter"],
                "body-lg": ["Inter"],
                "label-sm": ["Inter"],
                "headline-lg": ["Inter"],
                "body-md": ["Inter"]
            },
            "fontSize": {
                "display-lg": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                "label-md": ["14px", {"lineHeight": "1.4", "letterSpacing": "0.05em", "fontWeight": "500"}],
                "headline-md": ["24px", {"lineHeight": "1.4", "fontWeight": "600"}],
                "headline-lg-mobile": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                "label-sm": ["12px", {"lineHeight": "1.4", "fontWeight": "500"}],
                "headline-lg": ["32px", {"lineHeight": "1.3", "fontWeight": "600"}],
                "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}]
            }
          },
        },
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
</head>
<body class="bg-background text-on-surface">

<!-- Navbar Component -->
<x-navbar />

<!-- Hero Section (tombol Pesan Sekarang diperbaiki) -->
<header class="relative pt-xl pb-xl flex items-center min-h-[716px] hero-gradient" data-alt="A wide-angle, luxurious hotel lobby...">
<div class="container mx-auto px-gutter relative z-10 text-white">
<div class="max-w-2xl">
<h1 class="font-display-lg text-display-lg mb-base md:text-display-lg text-headline-lg-mobile">Temukan Kamar Hotel Terbaik</h1>
<p class="font-body-lg text-body-lg mb-md opacity-90">Nikmati pengalaman menginap tak terlupakan dengan pelayanan kelas dunia dan kenyamanan maksimal di lokasi strategis.</p>
<a href="{{ url('/kamar') }}" class="bg-primary text-on-primary px-lg py-sm rounded-lg font-headline-md hover:bg-opacity-90 transition-all shadow-md inline-block">Pesan Sekarang</a>
</div>
</div>
</header>
<!-- Search Form Card -->
<section class="container mx-auto px-gutter -mt-xl relative z-20">
<div class="bg-surface-container-lowest p-md rounded-xl shadow-lg border border-outline-variant">
<form class="grid grid-cols-1 md:grid-cols-4 gap-md" action="{{ url('/kamar') }}" method="GET">
<div class="flex flex-col gap-xs">
<label class="font-label-sm text-on-surface-variant flex items-center gap-xs">
<span class="material-symbols-outlined text-[18px]">calendar_today</span> Check-in
                    </label>
<input class="w-full border-outline-variant rounded-lg focus:ring-primary focus:border-primary" type="date" name="check_in"/>
</div>
<div class="flex flex-col gap-xs">
<label class="font-label-sm text-on-surface-variant flex items-center gap-xs">
<span class="material-symbols-outlined text-[18px]">calendar_month</span> Check-out
                    </label>
<input class="w-full border-outline-variant rounded-lg focus:ring-primary focus:border-primary" type="date" name="check_out"/>
</div>
<div class="flex flex-col gap-xs">
<label class="font-label-sm text-on-surface-variant flex items-center gap-xs">
<span class="material-symbols-outlined text-[18px]">person</span> Tamu
                    </label>
<select class="w-full border-outline-variant rounded-lg focus:ring-primary focus:border-primary" name="guests">
<option>1 Dewasa</option>
<option selected="">2 Dewasa</option>
<option>3 Dewasa</option>
<option>Keluarga</option>
</select>
</div>
<div class="flex items-end">
<button class="w-full bg-primary text-on-primary py-sm rounded-lg font-headline-md hover:bg-opacity-90 transition-all flex items-center justify-center gap-xs" type="submit">
<span class="material-symbols-outlined">search</span> Cari
                    </button>
</div>
</form>
</div>
</section>
<!-- Rooms Section (tombol Detail dan Lihat Semua Kamar diperbaiki) -->
<main class="container mx-auto px-gutter py-xl">
<div class="flex justify-between items-end mb-lg">
<div>
<h2 class="font-headline-lg text-headline-lg text-on-surface">Pilihan Kamar Populer</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Pilih kenyamanan yang sesuai dengan kebutuhan Anda</p>
</div>
<a href="{{ url('/kamar') }}" class="hidden md:block text-primary font-label-md hover:underline">Lihat Semua Kamar</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-md">
<!-- Card 1 -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all group">
<div class="relative h-64 overflow-hidden">
<img alt="Deluxe Suite" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="..." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-6vdR5OYxxbn3YtE6S12XuanAspw0IVvcjeX9O_JW7kY9dtQ2RgyLs01ARHOg3mYj38OEEtB4mNMM05pQ1kd8DXo5Li8aEGfkvMUjDe9lNlejddm2ceaHsidzRWiWJWyoPvw3oHVU1LzK0Q7XVZroOYooYJiAckUWjgZv87NT02n8zqTORrBNt5eAYqmCCASchl_AmojWokWsSkptK2qr6hHc47QsN697qbUSLmZ0_1bYnWaDNWMNZzIsLzmVkmgPsmFw-AM7B_k"/>
<div class="absolute top-4 left-4">
<span class="bg-primary/90 text-on-primary px-sm py-xs rounded-full font-label-sm shadow-sm">Populer</span>
</div>
</div>
<div class="p-md">
<h3 class="font-headline-md text-headline-md mb-xs">Deluxe Ocean Suite</h3>
<div class="flex items-center gap-xs mb-sm">
<span class="material-symbols-outlined text-primary text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="font-label-md text-on-surface">4.9</span>
<span class="text-on-surface-variant text-label-sm">(120 Ulasan)</span>
</div>
<div class="flex gap-xs mb-md flex-wrap">
<span class="bg-secondary-container text-on-secondary-container px-sm py-xs rounded-full text-label-sm">Free WiFi</span>
<span class="bg-secondary-container text-on-secondary-container px-sm py-xs rounded-full text-label-sm">Sarapan</span>
</div>
<div class="flex justify-between items-center pt-md border-t border-outline-variant">
<div>
<p class="text-label-sm text-on-surface-variant">Mulai dari</p>
<p class="font-headline-md text-primary">Rp 1.250.000<span class="text-label-sm text-on-surface-variant font-normal">/malam</span></p>
</div>
<a href="{{ url('/kamar/1') }}" class="border border-primary text-primary px-md py-xs rounded-lg font-label-md hover:bg-primary hover:text-on-primary transition-all inline-block text-center">Detail</a>
</div>
</div>
</div>
<!-- Card 2 (sama, ubah href ke /kamar/2) -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all group">
<div class="relative h-64 overflow-hidden">
<img alt="Executive Room" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDiI9wHie9vzE2SKSW-mUW_z_LEWZom_yiCrn7Lcx3C7BS2H90ilKlIMiOTpNknIZWMYew4d9oQN9vVB2fhDZfnUgrf_w518L4BJve0IO04V4oAsRSdupUX824wKZ_4-imvfMG8V8PtnY6EqnUci1ae_0Emlie_FdVUUhs02Fw8pNBwf28L5-9Ae8VQ7plCh53wOiyX3GQXaC6Qgq-M_N3EJ0vZeGDP4_-FD4nLO_nDxGyh0fNlJgG5AjR0MnCnVzQVuS0l5LqMf28"/>
</div>
<div class="p-md">
<h3 class="font-headline-md text-headline-md mb-xs">Executive City Room</h3>
<div class="flex items-center gap-xs mb-sm">
<span class="material-symbols-outlined text-primary text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="font-label-md text-on-surface">4.7</span>
<span class="text-on-surface-variant text-label-sm">(85 Ulasan)</span>
</div>
<div class="flex gap-xs mb-md flex-wrap">
<span class="bg-secondary-container text-on-secondary-container px-sm py-xs rounded-full text-label-sm">Work Desk</span>
<span class="bg-secondary-container text-on-secondary-container px-sm py-xs rounded-full text-label-sm">Gym</span>
</div>
<div class="flex justify-between items-center pt-md border-t border-outline-variant">
<div><p class="text-label-sm text-on-surface-variant">Mulai dari</p><p class="font-headline-md text-primary">Rp 850.000<span class="text-label-sm text-on-surface-variant font-normal">/malam</span></p></div>
<a href="{{ url('/kamar/2') }}" class="border border-primary text-primary px-md py-xs rounded-lg font-label-md hover:bg-primary hover:text-on-primary transition-all inline-block text-center">Detail</a>
</div>
</div>
</div>
<!-- Card 3 (sama, ubah href ke /kamar/3) -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all group">
<div class="relative h-64 overflow-hidden">
<img alt="Family Suite" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAx0yMo83VY2yEfdebSm_3IOv1Gj-h-Y-BGJYTgR_wJog8MccXY2nadiwJP9crsDqoV4KHsSzWliux7wfHFW7pDuyH2j8X-m_HILCMSP4XJ6GjMfdvq318h54tGhQc2Vfvai2hiEdm-DlzPDXklPWcBLx_Nzp_8hnsvoBdmUCttapcn2g-KpTyd8aLmP5WmKtFUHftJiTwxs44Nu-RVqBK52shBFX7KVTY9If27hZIFvd8piJGtqWKBJEdioCvL2JerDJmhJumQn6k"/>
</div>
<div class="p-md">
<h3 class="font-headline-md text-headline-md mb-xs">Premium Family Suite</h3>
<div class="flex items-center gap-xs mb-sm">
<span class="material-symbols-outlined text-primary text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="font-label-md text-on-surface">4.8</span>
<span class="text-on-surface-variant text-label-sm">(96 Ulasan)</span>
</div>
<div class="flex gap-xs mb-md flex-wrap">
<span class="bg-secondary-container text-on-secondary-container px-sm py-xs rounded-full text-label-sm">2 Kamar</span>
<span class="bg-secondary-container text-on-secondary-container px-sm py-xs rounded-full text-label-sm">Dapur</span>
</div>
<div class="flex justify-between items-center pt-md border-t border-outline-variant">
<div><p class="text-label-sm text-on-surface-variant">Mulai dari</p><p class="font-headline-md text-primary">Rp 1.950.000<span class="text-label-sm text-on-surface-variant font-normal">/malam</span></p></div>
<a href="{{ url('/kamar/3') }}" class="border border-primary text-primary px-md py-xs rounded-lg font-label-md hover:bg-primary hover:text-on-primary transition-all inline-block text-center">Detail</a>
</div>
</div>
</div>
</div>
</main>
<!-- Footer (tidak berubah) -->
<footer class="bg-surface-container-lowest border-t border-outline-variant">
<div class="w-full py-md px-gutter flex flex-col md:flex-row justify-between items-center max-w-container-max mx-auto">
<div class="mb-md md:mb-0">
<span class="font-headline-md text-headline-md font-bold text-primary">Serene Stay</span>
<p class="font-label-sm text-on-surface-variant mt-xs">© 2024 Serene Stay. All rights reserved.</p>
</div>
<div class="flex flex-wrap justify-center gap-md">
<a class="font-label-sm text-on-surface-variant hover:text-primary transition-all" href="#">Privacy Policy</a>
<a class="font-label-sm text-on-surface-variant hover:text-primary transition-all" href="#">Terms of Service</a>
<a class="font-label-sm text-on-surface-variant hover:text-primary transition-all" href="#">Contact Us</a>
<a class="font-label-sm text-on-surface-variant hover:text-primary transition-all" href="#">About Us</a>
</div>
<div class="flex gap-md mt-md md:mt-0">
<span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:text-primary transition-colors">public</span>
<span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:text-primary transition-colors">mail</span>
<span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:text-primary transition-colors">call</span>
</div>
</div>
</footer>
<script>
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
        document.querySelectorAll('button').forEach(btn => {
            btn.addEventListener('click', function(e) {
                let x = e.clientX - e.target.offsetLeft;
                let y = e.clientY - e.target.offsetTop;
                let ripple = document.createElement('span');
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                this.appendChild(ripple);
                setTimeout(() => { ripple.remove(); }, 600);
            });
        });
    </script>
</body>
</html>