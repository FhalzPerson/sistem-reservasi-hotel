<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Pembayaran Berhasil - Serene Stay</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-primary-container": "#ffffff",
                        "surface-dim": "#d5dae2",
                        "surface-container": "#e9eef6",
                        "primary-fixed-dim": "#b1c5ff",
                        "on-tertiary-container": "#ffffff",
                        "on-secondary-fixed": "#1a1c1c",
                        "surface-container-high": "#e3e9f0",
                        "on-primary": "#ffffff",
                        "secondary-fixed": "#e2e2e2",
                        "primary": "#0057cd",
                        "inverse-surface": "#2b3137",
                        "secondary-container": "#dfe0e0",
                        "outline-variant": "#c2c6d8",
                        "on-secondary-fixed-variant": "#454747",
                        "background": "#f7f9ff",
                        "surface-variant": "#dde3eb",
                        "surface-container-low": "#eff4fc",
                        "primary-fixed": "#dae2ff",
                        "on-tertiary-fixed": "#191c1d",
                        "tertiary-container": "#757778",
                        "on-background": "#161c22",
                        "on-secondary-container": "#616363",
                        "inverse-primary": "#b1c5ff",
                        "surface-container-lowest": "#ffffff",
                        "outline": "#727787",
                        "tertiary-fixed": "#e1e3e4",
                        "error": "#ba1a1a",
                        "surface-bright": "#f7f9ff",
                        "secondary": "#5d5f5f",
                        "on-tertiary": "#ffffff",
                        "error-container": "#ffdad6",
                        "on-tertiary-fixed-variant": "#454748",
                        "surface-tint": "#0057ce",
                        "tertiary": "#5c5e60",
                        "on-surface": "#161c22",
                        "on-primary-fixed-variant": "#00419e",
                        "on-error-container": "#93000a",
                        "surface-container-highest": "#dde3eb",
                        "on-primary-fixed": "#001946",
                        "on-error": "#ffffff",
                        "secondary-fixed-dim": "#c6c6c7",
                        "on-secondary": "#ffffff",
                        "surface": "#f7f9ff",
                        "primary-container": "#0d6efd",
                        "on-surface-variant": "#424655",
                        "inverse-on-surface": "#ecf1f9",
                        "tertiary-fixed-dim": "#c5c7c8"
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    spacing: {
                        "gutter": "24px",
                        "xl": "80px",
                        "md": "24px",
                        "xs": "4px",
                        "lg": "48px",
                        "sm": "12px",
                        "container-max": "1240px",
                        "base": "8px"
                    },
                    fontFamily: {
                        "label-sm": ["Inter"],
                        "headline-md": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "display-lg": ["Inter"],
                        "headline-lg": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-md": ["Inter"]
                    },
                    fontSize: {
                        "label-sm": ["12px", {"lineHeight": "1.4", "fontWeight": "500"}],
                        "headline-md": ["24px", {"lineHeight": "1.4", "fontWeight": "600"}],
                        "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}],
                        "headline-lg-mobile": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                        "display-lg": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "headline-lg": ["32px", {"lineHeight": "1.3", "fontWeight": "600"}],
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "label-md": ["14px", {"lineHeight": "1.4", "letterSpacing": "0.05em", "fontWeight": "500"}]
                    }
                },
            },
        }
    </script>
<style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9ff;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .success-checkmark {
            animation: scaleIn 0.5s ease-out forwards;
        }
        @keyframes scaleIn {
            0% { transform: scale(0); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body class="bg-surface text-on-surface antialiased">

<!-- Navbar Component -->
<x-navbar />

<main class="min-h-[calc(100vh-180px)] pt-lg pb-xl px-gutter max-w-container-max mx-auto">
<!-- Success Header -->
<section class="text-center mb-lg">
<div class="inline-flex items-center justify-center w-20 h-20 bg-green-100 rounded-full mb-md success-checkmark">
<span class="material-symbols-outlined text-[48px] text-green-600" style="font-variation-settings: 'FILL' 1;">check_circle</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-on-surface mb-xs">Pembayaran Berhasil!</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant">Terima kasih, {{ $booking->customer_name }}. Reservasi Anda telah kami terima.</p>
</section>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Left Side: Transaction Details -->
<div class="lg:col-span-7 space-y-md">
<div class="bg-surface-container-lowest p-md rounded-xl shadow-sm">
<h2 class="font-headline-md text-headline-md text-on-surface mb-md">Detail Transaksi</h2>
<div class="space-y-sm">
<div class="flex justify-between items-center py-sm border-b border-outline-variant">
<span class="font-label-md text-label-md text-on-surface-variant">Booking ID</span>
<span class="font-body-md text-body-md font-semibold text-on-surface">#{{ $booking->id }}</span>
</div>
<div class="flex justify-between items-center py-sm border-b border-outline-variant">
<span class="font-label-md text-label-md text-on-surface-variant">Tanggal Transaksi</span>
<span class="font-body-md text-body-md text-on-surface">{{ \Carbon\Carbon::parse($booking->updated_at)->format('d M Y, H:i') }} WIB</span>
</div>
<div class="flex justify-between items-center py-sm">
<span class="font-label-md text-label-md text-on-surface-variant">Metode Pembayaran</span>
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-sm">account_balance</span>
<span class="font-body-md text-body-md text-on-surface">Transfer Bank</span>
</div>
</div>
</div>
</div>
<!-- Action Buttons -->
<div class="flex flex-col md:flex-row gap-sm pt-md">
<a href="{{ url('/riwayat') }}" class="bg-primary text-on-primary font-label-md text-label-md px-lg py-4 rounded-lg hover:opacity-90 transition-all duration-200 shadow-md flex items-center justify-center gap-sm flex-1">
                        Lihat Riwayat Booking
                        <span class="material-symbols-outlined">history</span>
</a>
<a href="{{ url('/') }}" class="font-label-md text-label-md text-primary flex items-center justify-center px-lg py-4 border border-primary rounded-lg hover:bg-primary-fixed transition-all duration-200 flex-1">
                        Kembali ke Beranda
                    </a>
</div>
</div>
<!-- Right Side: Reservation Summary Card -->
<div class="lg:col-span-5">
<div class="bg-surface-container-lowest rounded-xl shadow-[0_10px_20px_rgba(0,0,0,0.08)] overflow-hidden transition-all duration-200">
<div class="relative h-48 w-full">
<img alt="{{ $booking->room->room_type }}" class="w-full h-full object-cover" src="{{ $booking->room->image_url ?? 'https://via.placeholder.com/400x300?text=Kamar+Hotel' }}">
<div class="absolute top-4 right-4 bg-green-600 text-white px-sm py-1 rounded-full font-label-sm text-label-sm flex items-center gap-xs shadow-md">
<span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">verified</span>
                            LUNAS
                        </div>
</div>
<div class="p-md">
<h3 class="font-headline-md text-headline-md text-on-surface mb-xs">{{ $booking->room->room_type }} - {{ $booking->room->room_number }}</h3>
<p class="font-body-md text-body-md text-on-surface-variant flex items-center gap-xs mb-md">
<span class="material-symbols-outlined text-sm">location_on</span>
                            Serene Stay, Bali
                        </p>
<div class="grid grid-cols-2 gap-md p-sm bg-surface-container-low rounded-lg mb-md">
<div>
<p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-xs">Check-in</p>
<p class="font-body-md text-body-md font-bold text-on-surface">{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</p>
</div>
<div>
<p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-xs">Check-out</p>
<p class="font-body-md text-body-md font-bold text-on-surface">{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</p>
</div>
</div>
<div class="flex justify-between items-center mb-md">
<div class="flex items-center gap-sm">
<span class="material-symbols-outlined text-secondary">group</span>
<span class="font-body-md text-body-md text-on-surface">2 Tamu</span>
</div>
<div class="flex items-center gap-sm">
<span class="material-symbols-outlined text-secondary">bed</span>
<span class="font-body-md text-body-md text-on-surface">King Size</span>
</div>
</div>
<div class="pt-md border-t border-outline-variant flex justify-between items-end">
<div>
<p class="font-label-sm text-label-sm text-on-surface-variant">Total Terbayar</p>
<p class="font-headline-md text-headline-md text-primary">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
</div>
<span class="font-label-sm text-label-sm text-secondary italic">Sudah termasuk pajak</span>
</div>
</div>
</div>
<!-- Small Helper Card -->
<div class="mt-md p-md bg-primary-fixed rounded-xl flex items-start gap-md">
<span class="material-symbols-outlined text-primary mt-xs">info</span>
<div>
<p class="font-label-md text-label-md text-on-primary-fixed font-bold mb-xs">Info Penting</p>
<p class="font-label-sm text-label-sm text-on-primary-fixed-variant">Silakan tunjukkan Booking ID #{{ $booking->id }} saat proses check-in di resepsionis hotel.</p>
</div>
</div>
</div>
</div>
</main>
<!-- Footer -->
<footer class="bg-surface-container-high w-full mt-xl">
<div class="w-full px-gutter py-lg flex flex-col md:flex-row justify-between items-center max-w-container-max mx-auto">
<div class="mb-md md:mb-0">
<div class="font-headline-md text-headline-md text-primary font-bold">Serene Stay</div>
<p class="font-label-md text-label-md text-on-surface-variant mt-2">© 2024 Serene Stay. All rights reserved.</p>
</div>
<div class="flex flex-wrap justify-center gap-md">
<a class="font-label-md text-label-md text-on-surface-variant hover:underline decoration-primary transition-all duration-200" href="#">Privacy Policy</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:underline decoration-primary transition-all duration-200" href="#">Terms of Service</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:underline decoration-primary transition-all duration-200" href="#">Help Center</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:underline decoration-primary transition-all duration-200" href="#">Contact Us</a>
</div>
</div>
</footer>
</body>
</html>