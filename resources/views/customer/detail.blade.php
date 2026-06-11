<!DOCTYPE html>
<html class="light" lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Detail Kamar - Serene Stay</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "outline-variant": "#c2c6d8",
                    "error-container": "#ffdad6",
                    "surface-container": "#e9eef6",
                    "on-secondary": "#ffffff",
                    "on-error": "#ffffff",
                    "primary-fixed": "#dae2ff",
                    "on-background": "#161c22",
                    "surface-bright": "#f7f9ff",
                    "secondary-container": "#dfe0e0",
                    "on-primary-fixed-variant": "#00419e",
                    "surface-container-lowest": "#ffffff",
                    "secondary-fixed-dim": "#c6c6c7",
                    "tertiary-fixed": "#e1e3e4",
                    "secondary": "#5d5f5f",
                    "tertiary-fixed-dim": "#c5c7c8",
                    "on-tertiary-fixed-variant": "#454748",
                    "on-secondary-container": "#616363",
                    "on-tertiary-fixed": "#191c1d",
                    "on-surface": "#161c22",
                    "on-error-container": "#93000a",
                    "secondary-fixed": "#e2e2e2",
                    "error": "#ba1a1a",
                    "on-primary-container": "#ffffff",
                    "surface-container-high": "#e3e9f0",
                    "surface-container-low": "#eff4fc",
                    "on-tertiary-container": "#ffffff",
                    "on-tertiary": "#ffffff",
                    "surface-tint": "#0057ce",
                    "background": "#f7f9ff",
                    "primary-container": "#0d6efd",
                    "inverse-surface": "#2b3137",
                    "inverse-primary": "#b1c5ff",
                    "primary": "#0057cd",
                    "outline": "#727787",
                    "on-primary-fixed": "#001946",
                    "on-surface-variant": "#424655",
                    "surface": "#f7f9ff",
                    "inverse-on-surface": "#ecf1f9",
                    "surface-dim": "#d5dae2",
                    "tertiary-container": "#757778",
                    "surface-variant": "#dde3eb",
                    "surface-container-highest": "#dde3eb",
                    "primary-fixed-dim": "#b1c5ff",
                    "tertiary": "#5c5e60",
                    "on-secondary-fixed-variant": "#454747",
                    "on-secondary-fixed": "#1a1c1c",
                    "on-primary": "#ffffff"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "sm": "12px",
                    "md": "24px",
                    "base": "8px",
                    "container-max": "1240px",
                    "xs": "4px",
                    "xl": "80px",
                    "lg": "48px",
                    "gutter": "24px"
            },
            "fontFamily": {
                    "headline-lg": ["Inter"],
                    "label-md": ["Inter"],
                    "display-lg": ["Inter"],
                    "body-lg": ["Inter"],
                    "headline-lg-mobile": ["Inter"],
                    "headline-md": ["Inter"],
                    "label-sm": ["Inter"],
                    "body-md": ["Inter"]
            },
            "fontSize": {
                    "headline-lg": ["32px", {"lineHeight": "1.3", "fontWeight": "600"}],
                    "label-md": ["14px", {"lineHeight": "1.4", "letterSpacing": "0.05em", "fontWeight": "500"}],
                    "display-lg": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "headline-lg-mobile": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                    "headline-md": ["24px", {"lineHeight": "1.4", "fontWeight": "600"}],
                    "label-sm": ["12px", {"lineHeight": "1.4", "fontWeight": "500"}],
                    "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}]
            }
          },
        },
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-surface text-on-surface">

<!-- Navbar Component -->
<x-navbar />

<main class="w-full max-w-container-max mx-auto px-gutter py-md">
<!-- Breadcrumb -->
<nav aria-label="Breadcrumb" class="flex mb-lg">
<ol class="flex items-center space-x-2 font-label-md text-label-md text-on-surface-variant">
<li><a href="{{ url('/') }}" class="hover:text-primary transition-colors">Home</a></li>
<li class="flex items-center">
<span class="material-symbols-outlined text-[16px] mx-1">chevron_right</span>
<a href="{{ url('/kamar') }}" class="hover:text-primary transition-colors">Kamar</a>
</li>
<li class="flex items-center">
<span class="material-symbols-outlined text-[16px] mx-1">chevron_right</span>
<span class="text-on-surface font-semibold">Detail Kamar</span>
</li>
</ol>
</nav>

<!-- Notifikasi Error / Sukses -->
@if(session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow" role="alert">
        <div class="flex items-center">
            <span class="material-symbols-outlined mr-2 text-red-500">error</span>
            <span>{{ session('error') }}</span>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow" role="alert">
        <div class="flex items-center">
            <span class="material-symbols-outlined mr-2 text-green-500">check_circle</span>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif

<!-- Main Detail Section -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
<!-- Left Column: Gallery -->
<div class="md:col-span-7">
<div class="overflow-hidden rounded-xl shadow-sm mb-md group relative">
<img id="mainImage" src="{{ $room->image_url ?? 'https://via.placeholder.com/800x600?text=Kamar+Hotel' }}" alt="{{ $room->room_type }}" class="w-full aspect-[4/3] object-cover transition-transform duration-500 group-hover:scale-105">
</div>
<div class="grid grid-cols-4 gap-sm">
@php
    $thumbnails = [
        $room->image_url ?? '',
        'https://lh3.googleusercontent.com/aida-public/AB6AXuBU8R2Yf-sb2nzRpBmAQE1yZRLSQ1EROpPsJ8DNHcIquyy2wh9GVQfyubsprjDR1rfbB31tET2HwuHqehjgTmsEpx0uMrmxrEFJGs3vK_3BwodMDYb8NLyC8xj9jOFmlsURSO8rxmksmAPCC-J1O7dHKtA-RnKY631exVFTAouMmioCWBqPq4n6zUzK1B5cvjrpaQxY9ScqltM6FYvE06rIGL_qPmz9cV3ilAdupp5Lk2m9VK6r3qLB9odkBBOlUzWH-cHpOhMD19A',
        'https://lh3.googleusercontent.com/aida-public/AB6AXuBUiKaRRdvtkNkx284rpAnNrFjk2qPdyH_xVXxTk-WsPxFXsZL-erhe0T1RSnM5xMx-oU60SApLL7ZxPqnvwv2MxJq0tBT1ynZgXFu_HuCKj6hEuL1zccNJPhhSpFTQD2NSiPEeoTJrMiCu66_0V63HPfTzJ1qis5zjfqnyVAeeKCRuZM5xBO0FvdqHXBV6gRel9p4CyFqnWQtFO3HYc-qusTPMfpYXe9fH0FO_FXra80Ow8sQ5jNXCO_j6CwP9IBUi3ssLVo5PqmM',
        'https://lh3.googleusercontent.com/aida-public/AB6AXuDSOrtw7rgzeMa7CkWUmtpJP7OwXpuCvp7XIXDLm1rQx8g73ww7oocl4UYeYLz4dR7MJte76MLlLjmWC_NvVedB8ieaMYE6Uxs7JW18yrXB552bjyCI7L6pX-cJio_MSILCplN_3Yq91pOQkO8uyYaGa-8dRsTrgNcRLZmU986GRGLkFaoy_7O0tU2Jbp3CB7HV-Kn8evnyjYNfJlQdxGfUl2IabsAO6S_ZpDiCjDRF7peZtdoommlCKi0AVRqFEOSPp2ZxCjgxTus'
    ];
@endphp
@foreach($thumbnails as $index => $thumb)
<button class="rounded-lg overflow-hidden border-2 {{ $index == 0 ? 'border-primary' : 'border-outline-variant' }} hover:border-primary transition-all" onclick="changeMainImage('{{ $thumb }}', this)">
    <img src="{{ $thumb }}" alt="Thumbnail {{ $index+1 }}" class="w-full aspect-square object-cover">
</button>
@endforeach
</div>
</div>
<!-- Right Column: Details & Booking -->
<div class="md:col-span-5 space-y-md">
<div>
<h1 class="font-headline-lg text-headline-lg text-on-surface mb-xs">{{ $room->room_type }} - {{ $room->room_number }}</h1>
<div class="flex items-center gap-xs text-primary mb-md">
<span class="material-symbols-outlined fill" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="font-label-md text-label-md">4.9 (128 Review)</span>
</div>
<p class="font-headline-md text-headline-md text-primary font-bold">Rp {{ number_format($room->price_per_night, 0, ',', '.') }} <span class="font-body-md text-body-md text-on-surface-variant font-normal">/ malam</span></p>
</div>
<div class="p-md bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/30">
<h2 class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant mb-md">Fasilitas Utama</h2>
<div class="grid grid-cols-2 gap-y-sm">
<div class="flex items-center gap-sm"><span class="material-symbols-outlined text-primary">wifi</span><span class="font-body-md text-body-md">Free WiFi</span></div>
<div class="flex items-center gap-sm"><span class="material-symbols-outlined text-primary">restaurant</span><span class="font-body-md text-body-md">Breakfast</span></div>
<div class="flex items-center gap-sm"><span class="material-symbols-outlined text-primary">ac_unit</span><span class="font-body-md text-body-md">AC</span></div>
<div class="flex items-center gap-sm"><span class="material-symbols-outlined text-primary">tv</span><span class="font-body-md text-body-md">Smart TV</span></div>
<div class="flex items-center gap-sm"><span class="material-symbols-outlined text-primary">coffee_maker</span><span class="font-body-md text-body-md">Coffee Maker</span></div>
<div class="flex items-center gap-sm"><span class="material-symbols-outlined text-primary">pool</span><span class="font-body-md text-body-md">Akses Kolam</span></div>
</div>
</div>
<div class="space-y-sm">
<h2 class="font-headline-md text-headline-md text-on-surface">Deskripsi</h2>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">{{ $room->description ?? 'Nikmati pengalaman menginap tak terlupakan di kamar kami yang nyaman.' }}</p>
</div>
<!-- Booking Form Card -->
<div class="bg-surface-container p-md rounded-xl shadow-lg border border-primary/10 sticky top-24">
<h3 class="font-headline-md text-headline-md mb-md">Pesan Kamar</h3>
<form action="{{ route('booking.create', $room->id) }}" method="GET" class="space-y-md">
<div class="grid grid-cols-2 gap-sm">
<div class="space-y-xs">
<label class="font-label-sm text-label-sm text-on-surface-variant">Check-in</label>
<input type="date" name="check_in" value="{{ $check_in }}" class="w-full bg-white border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all" required>
</div>
<div class="space-y-xs">
<label class="font-label-sm text-label-sm text-on-surface-variant">Check-out</label>
<input type="date" name="check_out" value="{{ $check_out }}" class="w-full bg-white border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all" required>
</div>
</div>
<div class="space-y-xs">
<label class="font-label-sm text-label-sm text-on-surface-variant">Jumlah Tamu</label>
<select name="guests" class="w-full bg-white border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all">
<option value="1">1 Tamu</option>
<option value="2" selected>2 Tamu</option>
<option value="3">3 Tamu</option>
<option value="4">4 Tamu</option>
</select>
</div>
<div class="pt-sm border-t border-outline-variant">
<div class="flex justify-between items-center mb-md">
<span class="font-body-md text-body-md">Total ({{ $days }} Malam)</span>
<span class="font-headline-md text-headline-md font-bold text-primary">Rp {{ number_format($total, 0, ',', '.') }}</span>
</div>
@if(auth()->user() && auth()->user()->is_admin)
    <button type="button" class="w-full bg-gray-400 text-white py-md rounded-xl shadow-md cursor-not-allowed" disabled>Admin tidak bisa booking</button>
@else
    <button type="submit" class="w-full bg-primary-container text-on-primary-container font-headline-md py-md rounded-xl shadow-md hover:shadow-lg hover:brightness-110 active:scale-[0.98] transition-all">Pesan Sekarang</button>
@endif
<p class="text-center font-label-sm text-label-sm text-on-surface-variant mt-sm">Tidak ada biaya tambahan saat check-in</p>
</div>
</form>
</div>
</div>
</div>
<!-- Similar Rooms Section -->
<section class="mt-xl">
<h2 class="font-headline-lg text-headline-lg mb-lg">Rekomendasi Kamar Lainnya</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-md">
@php
    $otherRooms = App\Models\Room::where('id', '!=', $room->id)->limit(3)->get();
@endphp
@foreach($otherRooms as $other)
<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all group">
<div class="aspect-[16/9] overflow-hidden relative">
<img src="{{ $other->image_url ?? 'https://via.placeholder.com/400x300' }}" alt="{{ $other->room_type }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
<div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-sm py-xs rounded-full font-label-sm text-primary">Best Value</div>
</div>
<div class="p-md">
<h4 class="font-headline-md text-headline-md mb-xs">{{ $other->room_type }}</h4>
<p class="text-on-surface-variant font-body-md mb-md">{{ Str::limit($other->description, 50) }}</p>
<div class="flex justify-between items-center">
<span class="font-bold text-primary">Rp {{ number_format($other->price_per_night, 0, ',', '.') }}/malam</span>
<a href="{{ route('rooms.show', $other->id) }}" class="text-primary font-label-md hover:underline">Lihat Detail</a>
</div>
</div>
</div>
@endforeach
</div>
</section>
</main>

<footer class="bg-surface-container-lowest dark:bg-inverse-surface mt-xl">
<div class="flex flex-col md:flex-row justify-between items-center py-lg px-gutter w-full max-w-container-max mx-auto">
<div class="mb-md md:mb-0 text-center md:text-left">
<div class="font-headline-sm text-headline-sm font-bold text-on-surface dark:text-inverse-on-surface mb-xs">Serene Stay</div>
<p class="font-label-md text-label-md text-on-surface-variant dark:text-surface-variant">© 2024 Serene Stay. All rights reserved.</p>
</div>
<div class="flex gap-md">
<a class="font-label-md text-label-md text-on-surface-variant dark:text-surface-variant hover:underline transition-all duration-200" href="#">Privacy Policy</a>
<a class="font-label-md text-label-md text-on-surface-variant dark:text-surface-variant hover:underline transition-all duration-200" href="#">Terms of Service</a>
<a class="font-label-md text-label-md text-on-surface-variant dark:text-surface-variant hover:underline transition-all duration-200" href="#">Contact Us</a>
<a class="font-label-md text-label-md text-on-surface-variant dark:text-surface-variant hover:underline transition-all duration-200" href="#">About Us</a>
</div>
</div>
</footer>

<script>
        // Gallery thumbnail changer
        function changeMainImage(src, btn) {
            document.getElementById('mainImage').src = src;
            document.querySelectorAll('.grid.grid-cols-4 button').forEach(button => {
                button.classList.remove('border-primary');
                button.classList.add('border-outline-variant');
            });
            btn.classList.remove('border-outline-variant');
            btn.classList.add('border-primary');
        }
        // Set min date
        const today = new Date().toISOString().split('T')[0];
        document.querySelectorAll('input[type="date"]').forEach(input => {
            input.min = today;
        });
    </script>
</body>
</html>