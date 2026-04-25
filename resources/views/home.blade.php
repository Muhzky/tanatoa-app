@extends('layouts.app')

@section('content')
<!-- Tambahkan pt-16 agar konten tidak tertutup navbar -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-cover bg-center bg-no-repeat"
    style="background-image: url({{ asset('assets/img/background.jpg') }});"

    <!-- Overlay untuk membuat teks lebih terbaca -->
    <div class="absolute inset-0 bg-black/40"></div>

    <!-- Content Container -->
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center pt-16">
        <!-- Badge -->
        <div class="animate-fade-in mb-8 mt-20" data-aos="fade-down" data-aos-delay="200">
            <span class="inline-block px-6 py-3 border border-gold-500/50 rounded-full text-gold-300 text-xs uppercase tracking-[0.35em] font-inter bg-black/20 backdrop-blur-sm">
                ✦ Warisan Nusantara ✦
            </span>
        </div>

        <!-- Main Title -->
        <h1 class="animate-slide-up font-jaini text-6xl md:text-8xl lg:text-9xl font-bold text-gold-500 tracking-wider text-shadow mb-8">
            Tanatoa Digital
        </h1>

        <!-- Decorative Line -->
        <div class="animate-slide-up mb-8 flex justify-center items-center gap-10" data-aos="fade-up" data-aos-delay="500">
            <div class="h-px w-24 md:w-56 bg-gradient-to-r from-transparent via-gold-500 to-transparent"></div>
            <div class="w-3 h-3 rounded-full bg-gold-400 animate-glow shadow-lg shadow-gold-500/50"></div>
            <div class="h-px w-24 md:w-56 bg-gradient-to-l from-transparent via-gold-500 to-transparent"></div>
        </div>

        <!-- Subtitle & Description -->
        <p class="animate-slide-up font-playfair text-2xl md:text-3xl lg:text-4xl text-gray-200 leading-relaxed max-w-3xl mx-auto mb-8 italic drop-shadow"
            data-aos="fade-up" data-aos-delay="600">
            Hidupkan Kembali Cerita Rakyat
        </p>

        <p class="animate-slide-up font-inter text-gray-300/90 text-base md:text-lg max-w-2xl mx-auto mb-4 leading-relaxed"
            data-aos="fade-up" data-aos-delay="700">
            Dalam pengalaman interaktif yang membawa Anda menyelami warisan leluhur dan tradisi yang telah bertahan berabad-abad
        </p>

        <!-- CTA Buttons -->
        <div class="animate-slide-up flex flex-row gap-4 justify-center items-center mb-8 sm:mb-0" data-aos="fade-up" data-aos-delay="800">

            <a href="{{ route('stories.index') }}" class="group inline-block transition-transform duration-300 hover:scale-105">
                <img id="cerita" src="{{ asset('assets/img/tombol/MULAI CERITA.png') }}"
                    alt="Mulai Cerita"
                    class="w-auto max-w-[160px] sm:max-w-[200px] h-auto 
   transition-all duration-300
   hover:filter hover:drop-shadow-[0_0_15px_rgba(255,215,0,0.8)]
   hover:scale-105">
            </a>

            <a href="{{ route('education.index') }}" class="group inline-block transition-transform duration-300 hover:scale-105">
                <img id="edukasi" src="{{ asset('assets/img/tombol/EDUKASI.png') }}"
                    alt="Edukasi"
                    class="w-auto max-w-[185px] sm:max-w-[238px] h-auto 
   transition-all duration-300
   hover:filter hover:drop-shadow-[0_0_15px_rgba(255,215,0,0.8)]
   hover:scale-105">
            </a>
        </div>

        <!-- Scroll Indicator -->
        <div class="pt-13 mt-6 animate-bounce" data-aos="fade-in" data-aos-delay="1200">
            <a href="#program" class="flex flex-col items-center text-gold-400/80 hover:text-gold-300 transition-colors group">
                <span class="font-inter text-[10px] uppercase tracking-widest mb-2 text-white">Jelajahi</span>
                <svg class="w-7 h-7 group-hover:translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </a>
        </div>
    </div>

    <!-- Decorative Corner Elements -->
    <div class="absolute top-20 left-8 w-24 h-24 border-l border-t border-gold-500/100 rounded-tl-2xl hidden md:block"></div>
    <div class="absolute top-20 right-8 w-24 h-24 border-r border-t border-gold-500/100 rounded-tr-2xl hidden md:block"></div>
    <div class="absolute bottom-8 left-8 w-24 h-24 border-l border-b border-gold-500/100 rounded-bl-2xl hidden md:block"></div>
    <div class="absolute bottom-8 right-8 w-24 h-24 border-r border-b border-gold-500/100 rounded-br-2xl hidden md:block"></div>
</section>

<!-- Program Section -->
<section id="program" class="py-24 bg-heritage-950 relative overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-gold-500/5 via-transparent to-transparent"></div>
    <div class="absolute inset-0 opacity-[0.03] bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTAgMGg2MHY2MEgweiIgZmlsbD0ibm9uZSIvPjxwYXRoIGQ9Ik0zMCAwbDMwIDMwTDAgNjB6IiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMSIgZmlsbD0ibm9uZSIvPjwvc3ZnPg==')]"></div>
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gold-500/40 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <!-- Header -->
        <div class="text-center mb-20" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gold-500/10 border border-gold-500/20 text-gold-400 text-xs font-medium uppercase tracking-wider mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-gold-400 animate-pulse"></span>
                Program Utama
            </span>
            <h2 class="font-jaini text-4xl md:text-5xl text-white mb-6">
                Tentang <span class="text-transparent bg-clip-text bg-gradient-to-r from-gold-400 to-gold-200">Tana Toa Digital</span>
            </h2>
            <div class="w-32 h-1.5 bg-gradient-to-r from-transparent via-gold-500 to-transparent mx-auto rounded-full"></div>
        </div>

        <!-- Description -->
        <div class="max-w-3xl mx-auto text-center mb-20" data-aos="fade-up" data-aos-delay="100">
            <p class="font-inter text-gray-400 leading-relaxed">
                Tana Toa Digital adalah platform storytelling interaktif berbasis budaya Sulawesi Selatan
                yang memadukan teknologi modern dengan warisan tradisi. Program ini menghadirkan
                pengalaman seperti teater digital, di mana pengguna tidak hanya membaca cerita,
                tetapi juga <span class="text-gold-300 font-medium">menentukan alur perjalanan</span> kisah tersebut.
            </p>
        </div>

        <!-- Program Points -->
        <div class="grid md:grid-cols-3 gap-6 lg:gap-8">

            <!-- Point 1 - Cerita Interaktif -->
            <div class="group relative p-8 rounded-3xl bg-white/[0.03] border border-white/10 backdrop-blur-sm hover:border-gold-500/40 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-gold-500/10"
                data-aos="fade-up" data-aos-delay="200">
                <!-- Gradient overlay -->
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-gold-500/5 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <!-- Icon: Branching Path / Decision Tree -->
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-gold-500/20 to-gold-600/10 border border-gold-500/30 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 20V8m0 0L7 4m5 4l5-4M12 8l-3 6m3-6l3 6" />
                        </svg>
                    </div>
                    <h3 class="font-jaini text-2xl text-white mb-3 group-hover:text-gold-300 transition-colors">Cerita Interaktif</h3>
                    <p class="font-inter text-gray-400 text-sm leading-relaxed">
                        Pengguna dapat memilih jalur cerita dan menentukan akhir kisah berdasarkan keputusan yang diambil.
                    </p>
                </div>
            </div>

            <!-- Point 2 - Edukasi Budaya -->
            <div class="group relative p-8 rounded-3xl bg-white/[0.03] border border-white/10 backdrop-blur-sm hover:border-gold-500/40 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-gold-500/10"
                data-aos="fade-up" data-aos-delay="300">
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-gold-500/5 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <!-- Icon: Traditional Tongkonan House -->
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-gold-500/20 to-gold-600/10 border border-gold-500/30 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <!-- Tongkonan-style roof -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 10l8-6 8 6M4 10v4M20 10v4M4 14h16M4 14v4h16v-4" />
                            <!-- Door -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M11 18v-2h2v2" />
                            <!-- Roof detail lines -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M8 8l4-3 4 3" />
                        </svg>
                    </div>
                    <h3 class="font-jaini text-2xl text-white mb-3 group-hover:text-gold-300 transition-colors">Edukasi Budaya</h3>
                    <p class="font-inter text-gray-400 text-sm leading-relaxed">
                        Mengangkat nilai filosofi, adat, dan makna kehidupan dari cerita rakyat Bugis-Makassar.
                    </p>
                </div>
            </div>

            <!-- Point 3 - Teknologi & Budaya -->
            <div class="group relative p-8 rounded-3xl bg-white/[0.03] border border-white/10 backdrop-blur-sm hover:border-gold-500/40 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-gold-500/10"
                data-aos="fade-up" data-aos-delay="400">
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-gold-500/5 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <!-- Icon: Gear + Circuit Pattern (Tech & Culture) -->
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-gold-500/20 to-gold-600/10 border border-gold-500/30 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <!-- Gear -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z" />
                            <!-- Circuit dots -->
                            <circle cx="4" cy="12" r="1" fill="currentColor" stroke="none" />
                            <circle cx="20" cy="12" r="1" fill="currentColor" stroke="none" />
                        </svg>
                    </div>
                    <h3 class="font-jaini text-2xl text-white mb-3 group-hover:text-gold-300 transition-colors">Teknologi & Budaya</h3>
                    <p class="font-inter text-gray-400 text-sm leading-relaxed">
                        Menggabungkan visual, audio, dan interaksi digital untuk menghidupkan kembali cerita tradisional.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection


@push('scripts')
<!-- <script>
    // Preload hero image untuk performa lebih baik
    document.addEventListener('DOMContentLoaded', function() {
        const img = new Image();
        img.src = "{{ asset('assets/img/background.jpg') }}";

        // Refresh AOS jika tersedia
        if (typeof AOS !== 'undefined') {
            AOS.refresh();
        }
    });
</script> -->
@endpush