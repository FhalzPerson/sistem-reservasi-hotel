<!DOCTYPE html>
<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Pembayaran - Serene Stay</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0057cd",
                        "tertiary-container": "#757778",
                        "error-container": "#ffdad6",
                        "surface-container": "#e9eef6",
                        "surface": "#f7f9ff",
                        "on-tertiary-fixed-variant": "#454748",
                        "on-tertiary": "#ffffff",
                        "inverse-primary": "#b1c5ff",
                        "on-secondary-container": "#616363",
                        "on-secondary-fixed-variant": "#454747",
                        "surface-container-lowest": "#ffffff",
                        "on-primary-container": "#ffffff",
                        "surface-variant": "#dde3eb",
                        "on-primary": "#ffffff",
                        "background": "#f7f9ff",
                        "on-tertiary-container": "#ffffff",
                        "on-surface": "#161c22",
                        "error": "#ba1a1a",
                        "surface-tint": "#0057ce",
                        "on-secondary": "#ffffff",
                        "on-primary-fixed-variant": "#00419e",
                        "secondary-fixed": "#e2e2e2",
                        "primary-fixed-dim": "#b1c5ff",
                        "primary-container": "#0d6efd",
                        "outline": "#727787",
                        "on-background": "#161c22",
                        "on-surface-variant": "#424655",
                        "secondary": "#5d5f5f",
                        "surface-container-high": "#e3e9f0",
                        "surface-container-low": "#eff4fc",
                        "surface-bright": "#f7f9ff",
                        "inverse-on-surface": "#ecf1f9",
                        "tertiary-fixed": "#e1e3e4",
                        "secondary-fixed-dim": "#c6c6c7",
                        "on-primary-fixed": "#001946",
                        "primary-fixed": "#dae2ff",
                        "tertiary": "#5c5e60",
                        "surface-container-highest": "#dde3eb",
                        "on-error": "#ffffff",
                        "tertiary-fixed-dim": "#c5c7c8",
                        "on-tertiary-fixed": "#191c1d",
                        "surface-dim": "#d5dae2",
                        "outline-variant": "#c2c6d8",
                        "on-secondary-fixed": "#1a1c1c",
                        "on-error-container": "#93000a",
                        "inverse-surface": "#2b3137",
                        "secondary-container": "#dfe0e0"
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    spacing: {
                        "md": "24px",
                        "sm": "12px",
                        "lg": "48px",
                        "gutter": "24px",
                        "container-max": "1240px",
                        "xs": "4px",
                        "xl": "80px",
                        "base": "8px"
                    },
                    fontFamily: {
                        "label-md": ["Inter"],
                        "headline-md": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "label-sm": ["Inter"],
                        "display-lg": ["Inter"],
                        "body-lg": ["Inter"]
                    },
                    fontSize: {
                        "label-md": ["14px", {"lineHeight": "1.4", "letterSpacing": "0.05em", "fontWeight": "500"}],
                        "headline-md": ["24px", {"lineHeight": "1.4", "fontWeight": "600"}],
                        "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}],
                        "headline-lg": ["32px", {"lineHeight": "1.3", "fontWeight": "600"}],
                        "headline-lg-mobile": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                        "label-sm": ["12px", {"lineHeight": "1.4", "fontWeight": "500"}],
                        "display-lg": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}]
                    }
                }
            }
        }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9ff;
        }
        .custom-radio:checked {
            border-color: #0057cd;
            background-color: #0057cd;
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
        }
    </style>
</head>
<body class="bg-background text-on-surface">

<!-- Navbar Component -->
<x-navbar />

<main class="max-w-container-max mx-auto px-gutter py-xl">
<div class="mb-lg">
<h1 class="font-headline-lg text-headline-lg text-on-surface mb-xs">Selesaikan Pembayaran</h1>
<p class="font-body-md text-body-md text-on-surface-variant">Segera konfirmasi reservasi Anda sebelum waktu habis.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
<!-- Left: Booking Summary -->
<div class="md:col-span-5 lg:col-span-4">
<div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden sticky top-24">
<img alt="{{ $booking->room->room_type }}" class="w-full h-48 object-cover" src="{{ $booking->room->image_url ?? 'https://via.placeholder.com/400x300?text=Kamar+Hotel' }}">
<div class="p-md">
<h2 class="font-headline-md text-headline-md text-on-surface mb-sm">{{ $booking->room->room_type }} - {{ $booking->room->room_number }}</h2>
<div class="space-y-sm mb-md border-b border-surface-variant pb-md">
<div class="flex items-center gap-sm">
<span class="material-symbols-outlined text-primary">calendar_today</span>
<div>
<p class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Check-in</p>
<p class="text-body-md font-body-md font-semibold">{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</p>
</div>
</div>
<div class="flex items-center gap-sm">
<span class="material-symbols-outlined text-primary">event_available</span>
<div>
<p class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Check-out</p>
<p class="text-body-md font-body-md font-semibold">{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</p>
</div>
</div>
</div>
<div class="flex justify-between items-center pt-xs">
<p class="font-body-md text-on-surface-variant">Total Pembayaran</p>
<p class="font-headline-md text-headline-md text-primary">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
</div>
</div>
<div class="bg-surface-container-low p-sm px-md flex items-center gap-xs">
<span class="material-symbols-outlined text-tertiary text-[20px]">info</span>
<p class="text-label-sm font-label-sm text-on-surface-variant">Harga sudah termasuk pajak dan biaya layanan.</p>
</div>
</div>
</div>
<!-- Right: Payment Details -->
<div class="md:col-span-7 lg:col-span-8">
<div class="bg-surface-container-lowest rounded-xl shadow-sm p-md md:p-lg">
<h3 class="font-headline-md text-headline-md text-on-surface mb-md">Detail Pembayaran</h3>
<form method="POST" action="{{ route('payment.process', $booking->id) }}">
@csrf
<!-- Payment Method -->
<div class="mb-lg">
<label class="font-label-md text-label-md text-on-surface-variant block mb-sm">Pilih Metode Pembayaran</label>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-sm">
<label class="flex items-center p-md border-2 border-surface-variant rounded-xl cursor-pointer hover:border-primary transition-colors group has-[:checked]:border-primary has-[:checked]:bg-surface-container-low">
<input checked class="custom-radio w-5 h-5 text-primary focus:ring-primary border-surface-variant" name="payment_method" type="radio" value="bank">
<div class="ml-md">
<p class="font-label-md text-label-md text-on-surface group-has-[:checked]:text-primary">Transfer Bank</p>
<p class="text-label-sm font-label-sm text-on-surface-variant">BCA, Mandiri, BNI</p>
</div>
<span class="material-symbols-outlined ml-auto text-on-surface-variant">account_balance</span>
</label>
<label class="flex items-center p-md border-2 border-surface-variant rounded-xl cursor-pointer hover:border-primary transition-colors group has-[:checked]:border-primary has-[:checked]:bg-surface-container-low">
<input class="custom-radio w-5 h-5 text-primary focus:ring-primary border-surface-variant" name="payment_method" type="radio" value="ewallet">
<div class="ml-md">
<p class="font-label-md text-label-md text-on-surface group-has-[:checked]:text-primary">E-Wallet</p>
<p class="text-label-sm font-label-sm text-on-surface-variant">GoPay, OVO, ShopeePay</p>
</div>
<span class="material-symbols-outlined ml-auto text-on-surface-variant">account_balance_wallet</span>
</label>
</div>
</div>
<!-- Bank Details (Dynamic) -->
<div class="bg-surface-container-low rounded-lg p-md mb-lg" id="bank-info">
<p class="font-label-sm text-label-sm text-on-surface-variant mb-xs">Nomor Rekening Tujuan</p>
<div class="flex items-center justify-between">
<p class="font-headline-md text-headline-md text-on-surface" id="rekening-number">8830 1234 5678</p>
<button type="button" class="text-primary font-label-md text-label-md flex items-center gap-1 hover:underline" onclick="copyRekening()">
                                    Salin <span class="material-symbols-outlined text-[18px]">content_copy</span>
</button>
</div>
<p class="font-body-md text-on-surface-variant mt-1">Atas Nama: PT Serene Stay Indonesia</p>
</div>

<!-- Upload Bukti - DIHILANGKAN untuk penyederhanaan (tidak wajib) -->
<!-- 
<div class="mb-xl">
    <label class="font-label-md text-label-md text-on-surface-variant block mb-sm">Unggah Bukti Pembayaran</label>
    <div class="border-2 border-dashed border-outline-variant rounded-xl p-lg text-center cursor-pointer hover:bg-surface-container-low transition-colors relative group">
        <input class="absolute inset-0 opacity-0 cursor-pointer" type="file" accept="image/*,application/pdf">
        <div class="flex flex-col items-center gap-sm">
            <div class="w-12 h-12 bg-surface-container flex items-center justify-center rounded-full text-primary group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined">cloud_upload</span>
            </div>
            <div>
                <p class="font-body-md text-on-surface">Klik untuk unggah atau seret file di sini</p>
                <p class="text-label-sm font-label-sm text-on-surface-variant mt-1">PNG, JPG atau PDF (Maks. 5MB)</p>
            </div>
        </div>
    </div>
</div>
-->

<button type="submit" class="w-full bg-primary text-on-primary font-label-md text-label-md py-4 rounded-xl shadow-md hover:bg-primary-container active:scale-[0.98] transition-all flex items-center justify-center gap-sm">
<span class="material-symbols-outlined">check_circle</span>
                            Bayar Sekarang
                        </button>
</form>
</div>
</div>
</div>
</main>
<footer class="bg-surface-container dark:bg-surface-dim mt-xl">
<div class="flex flex-col md:flex-row justify-between items-center px-gutter py-lg w-full max-w-container-max mx-auto">
<div class="mb-md md:mb-0">
<p class="font-headline-md text-headline-md text-on-surface font-bold">Serene Stay</p>
<p class="font-label-sm text-label-sm text-on-secondary-container mt-1">© 2024 Serene Stay. All rights reserved.</p>
</div>
<div class="flex gap-8">
<a class="font-label-sm text-label-sm text-on-secondary-container hover:text-primary transition-colors" href="#">Privacy Policy</a>
<a class="font-label-sm text-label-sm text-on-secondary-container hover:text-primary transition-colors" href="#">Terms of Service</a>
<a class="font-label-sm text-label-sm text-on-secondary-container hover:text-primary transition-colors" href="#">Contact Us</a>
</div>
</div>
</footer>
<script>
        // Ganti nomor rekening sesuai pilihan metode pembayaran
        const radioButtons = document.querySelectorAll('input[name="payment_method"]');
        const rekeningSpan = document.getElementById('rekening-number');
        radioButtons.forEach(radio => {
            radio.addEventListener('change', (e) => {
                if (e.target.value === 'bank') {
                    rekeningSpan.innerText = '8830 1234 5678';
                } else {
                    rekeningSpan.innerText = '0812-3456-7890 (GoPay/OVO)';
                }
            });
        });

        function copyRekening() {
            const text = rekeningSpan.innerText;
            navigator.clipboard.writeText(text).then(() => {
                alert('Nomor rekening disalin: ' + text);
            });
        }
    </script>
</body>
</html>