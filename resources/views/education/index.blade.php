@extends('layouts.app')

@section('content')
{{-- ✅ HEADER - Konsisten dengan Scene Page --}}
<header class="fixed top-0 left-0 right-0 z-50 bg-black/90 backdrop-blur-md border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            {{-- Tombol Kembali --}}
            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}"
                    class="p-2.5 rounded-lg hover:bg-gray-800 transition-colors group"
                    title="Kembali ke Beranda">
                    <svg class="w-5 h-5 text-yellow-500 group-hover:text-yellow-400"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>

                <div class="flex flex-col">
                    <h1 class="font-jaini text-base md:text-lg text-yellow-500">
                        Tana Toa Digital
                    </h1>
                    <p class="font-inter text-xs text-gray-400 mt-0.5">
                        ✦ Halaman Edukasi Budaya ✦
                    </p>
                </div>
            </div>

            {{-- Badge Progress --}}
            <div class="flex items-center gap-2 px-3 py-1.5 bg-gray-900 rounded-lg border border-gray-700">
                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                <span class="font-inter text-xs text-gray-300">Edukasi</span>
            </div>
        </div>
    </div>
</header>

<main class="min-h-screen pt-24 pb-16 bg-heritage-950 relative overflow-hidden">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 z-0 opacity-10">
        <img src="{{ asset('assets/img/pattern-ukiran.png') }}" alt="Pattern" class="w-full h-full object-cover">
    </div>

    <div class="relative z-10 max-w-6xl mx-auto px-4 md:px-6">

        {{-- ✅ HERO SECTION --}}
        <section class="text-center py-12 md:py-16" data-aos="fade-down">
            <span class="inline-block px-4 py-2 bg-gold-500/10 border border-gold-500/30 rounded-full text-gold-400 text-xs font-inter uppercase tracking-wider mb-4">
                ✦ Eksplorasi Budaya ✦
            </span>

            <h1 class="font-jaini text-3xl md:text-5xl lg:text-6xl text-gold-400 mb-4">
                Akar Kearifan Nusantara
            </h1>

            <p class="font-inter text-gray-300 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed">
                Pahami filosofi, nilai kehidupan, dan makna simbolik yang menghidupi cerita rakyat Bugis & Toraja.
                Setiap simbol adalah pesan, setiap nilai adalah warisan.
            </p>
        </section>

        {{-- ✅ NAVIGASI TAB --}}
        <section class="sticky top-20 z-40 py-4 bg-heritage-950/95 backdrop-blur-md border-y border-gray-800" data-aos="fade-down" data-aos-delay="100">
            <div class="flex overflow-x-auto gap-2 pb-2 scrollbar-hide" id="eduTabs">
                <button data-tab="filosofi" class="tab-btn active px-5 py-3 rounded-lg bg-gold-500/20 border border-gold-500/40 text-gold-300 font-inter text-sm whitespace-nowrap transition-all hover:bg-gold-500/30">
                    ✦ Filosofi
                </button>
                <button data-tab="nilai" class="tab-btn px-5 py-3 rounded-lg bg-black/40 border border-gray-700 text-gray-400 font-inter text-sm whitespace-nowrap transition-all hover:border-gold-500/30 hover:text-gold-300">
                    ✦ Nilai Kehidupan
                </button>
                <button data-tab="simbolik" class="tab-btn px-5 py-3 rounded-lg bg-black/40 border border-gray-700 text-gray-400 font-inter text-sm whitespace-nowrap transition-all hover:border-gold-500/30 hover:text-gold-300">
                    ✦ Makna Simbolik
                </button>
                <button data-tab="koneksi" class="tab-btn px-5 py-3 rounded-lg bg-black/40 border border-gray-700 text-gray-400 font-inter text-sm whitespace-nowrap transition-all hover:border-gold-500/30 hover:text-gold-300">
                    ✦ Kaitkan dengan Cerita
                </button>
            </div>
        </section>

        {{-- ✅ KONTEN TAB: FILOSOFI --}}
        <section id="tab-filosofi" class="tab-content active py-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Card: Siri' Na Pacce --}}
                <article class="group bg-gradient-to-br from-black/70 to-black/40 backdrop-blur-sm border border-gold-500/20 rounded-2xl p-6 hover:border-gold-400 transition-all hover:-translate-y-1" data-aos="fade-up">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 rounded-xl bg-gold-500/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-jaini text-xl text-gold-300 mb-1">Siri' Na Pacce</h3>
                            <span class="font-inter text-xs text-gray-500 uppercase tracking-wide">Filosofi Bugis</span>
                        </div>
                    </div>

                    <p class="font-inter text-gray-300 text-sm leading-relaxed mb-4">
                        <strong class="text-gold-400">Siri'</strong> = Harga diri & kehormatan.
                        <strong class="text-gold-400">Pacce</strong> = Empati & solidaritas sosial.
                        Dua pilar etika yang menjadi pondasi tindakan tokoh dalam epos La Galigo.
                    </p>

                    <div class="flex items-center gap-2 text-xs text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span>Terlihat di: La Galigo, Sawerigading</span>
                    </div>

                    {{-- Hover: Quote Leluhur --}}
                    <div class="hidden group-hover:block mt-4 pt-4 border-t border-gold-500/20">
                        <blockquote class="font-jaini text-gold-200/90 italic text-sm">
                            "Siri' mateppi, pacce mappasitinjak."
                            <br><span class="font-inter text-xs text-gray-500 not-italic">— Pepatah Bugis Kuno</span>
                        </blockquote>
                    </div>
                </article>

                {{-- Card: Aluk Todolo --}}
                <article class="group bg-gradient-to-br from-black/70 to-black/40 backdrop-blur-sm border border-gold-500/20 rounded-2xl p-6 hover:border-gold-400 transition-all hover:-translate-y-1" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 rounded-xl bg-gold-500/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-jaini text-xl text-gold-300 mb-1">Aluk Todolo</h3>
                            <span class="font-inter text-xs text-gray-500 uppercase tracking-wide">Filosofi Toraja</span>
                        </div>
                    </div>

                    <p class="font-inter text-gray-300 text-sm leading-relaxed mb-4">
                        "Jalan para leluhur": tatanan kehidupan yang menjaga harmoni antara
                        <span class="text-gold-400">manusia</span>, <span class="text-gold-400">alam</span>, dan
                        <span class="text-gold-400">roh leluhur</span>. Ritual bukan sekadar tradisi, tapi cara menjaga keseimbangan kosmos.
                    </p>

                    <div class="flex items-center gap-2 text-xs text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span>Terlihat di: Legenda Toraja</span>
                    </div>

                    <div class="hidden group-hover:block mt-4 pt-4 border-t border-gold-500/20">
                        <blockquote class="font-jaini text-gold-200/90 italic text-sm">
                            "Bumi adalah ibu, langit adalah ayah, manusia adalah penjaga."
                            <br><span class="font-inter text-xs text-gray-500 not-italic">— Kearifan Aluk Todolo</span>
                        </blockquote>
                    </div>
                </article>

                {{-- Card: Resi'na Ade'na --}}
                <article class="group bg-gradient-to-br from-black/70 to-black/40 backdrop-blur-sm border border-gold-500/20 rounded-2xl p-6 hover:border-gold-400 transition-all hover:-translate-y-1" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 rounded-xl bg-gold-500/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-jaini text-xl text-gold-300 mb-1">Resi'na Ade'na</h3>
                            <span class="font-inter text-xs text-gray-500 uppercase tracking-wide">Kesetiaan pada Adat</span>
                        </div>
                    </div>

                    <p class="font-inter text-gray-300 text-sm leading-relaxed mb-4">
                        Prinsip memegang teguh janji dan tatanan adat. Menjadi sumber konflik batin tokoh ketika harus memilih antara
                        <span class="text-gold-400">takdir pribadi</span> dan <span class="text-gold-400">kewajiban terhadap keluarga/kerajaan</span>.
                    </p>

                    <div class="flex items-center gap-2 text-xs text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <span>Konflik utama dalam cerita</span>
                    </div>
<!-- 
                    <div class="hidden group-hover:block mt-4 pt-4 border-t border-gold-500/20">
                        <a href="/stories" class="inline-flex items-center gap-1 text-gold-400 text-xs hover:text-gold-300 transition-colors">
                            <span>Lihat dalam Cerita</span>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div> -->
                </article>

            </div>
        </section>

        {{-- ✅ KONTEN TAB: NILAI KEHIDUPAN --}}
        <section id="tab-nilai" class="tab-content hidden py-8">
            <div class="grid md:grid-cols-2 gap-6">

                {{-- Nilai 1 --}}
                <article class="bg-gradient-to-br from-black/70 to-black/40 backdrop-blur-sm border border-gold-500/20 rounded-2xl p-6 hover:border-gold-400 transition-all" data-aos="fade-right">
                    <div class="flex items-start gap-4 mb-4">
                        <span class="w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center text-green-400 font-bold text-sm flex-shrink-0">1</span>
                        <div>
                            <h3 class="font-jaini text-xl text-gold-300 mb-2">Keberanian Menghadapi Takdir</h3>
                            <span class="font-inter text-xs text-gray-500">Sumber: Epos Sawerigading</span>
                        </div>
                    </div>
                    <p class="font-inter text-gray-300 text-sm leading-relaxed mb-4">
                        Pahlawan tidak lari dari tanggung jawab. Sawerigading memilih berlayar ke negeri asing, menghadapi badai dan monster, demi menyelamatkan kerajaan dan memenuhi takdirnya sebagai pemimpin.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-2 py-1 bg-gold-500/10 border border-gold-500/20 rounded-lg text-gold-300 text-xs font-inter">💡 #Keberanian</span>
                        <span class="px-2 py-1 bg-green-500/10 border border-green-500/20 rounded-lg text-green-300 text-xs font-inter">📜 #Takdir</span>
                    </div>
                </article>

                {{-- Nilai 2 --}}
                <article class="bg-gradient-to-br from-black/70 to-black/40 backdrop-blur-sm border border-gold-500/20 rounded-2xl p-6 hover:border-gold-400 transition-all" data-aos="fade-left">
                    <div class="flex items-start gap-4 mb-4">
                        <span class="w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center text-green-400 font-bold text-sm flex-shrink-0">2</span>
                        <div>
                            <h3 class="font-jaini text-xl text-gold-300 mb-2">Kesetiaan & Pengorbanan</h3>
                            <span class="font-inter text-xs text-gray-500">Sumber: La Galigo</span>
                        </div>
                    </div>
                    <p class="font-inter text-gray-300 text-sm leading-relaxed mb-4">
                        Cinta dan bakti kepada tanah air sering menuntut pengorbanan pribadi. Tokoh-tokoh La Galigo mengajarkan bahwa kebahagiaan kolektif lebih mulia daripada kepentingan individu.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-2 py-1 bg-gold-500/10 border border-gold-500/20 rounded-lg text-gold-300 text-xs font-inter">🤝 #Kesetiaan</span>
                        <span class="px-2 py-1 bg-green-500/10 border border-green-500/20 rounded-lg text-green-300 text-xs font-inter">🕊️ #Pengorbanan</span>
                    </div>
                </article>

                {{-- Nilai 3 --}}
                <article class="bg-gradient-to-br from-black/70 to-black/40 backdrop-blur-sm border border-gold-500/20 rounded-2xl p-6 hover:border-gold-400 transition-all" data-aos="fade-right">
                    <div class="flex items-start gap-4 mb-4">
                        <span class="w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center text-green-400 font-bold text-sm flex-shrink-0">3</span>
                        <div>
                            <h3 class="font-jaini text-xl text-gold-300 mb-2">Kepemimpinan Bijaksana</h3>
                            <span class="font-inter text-xs text-gray-500">Sumber: Legenda Toraja</span>
                        </div>
                    </div>
                    <p class="font-inter text-gray-300 text-sm leading-relaxed mb-4">
                        Pemimpin sejati mendengarkan suara alam, menjaga adat, dan tidak memaksakan kehendak. Keputusan diambil melalui musyawarah, bukan otoriter.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-2 py-1 bg-gold-500/10 border border-gold-500/20 rounded-lg text-gold-300 text-xs font-inter">👑 #Kepemimpinan</span>
                        <span class="px-2 py-1 bg-green-500/10 border border-green-500/20 rounded-lg text-green-300 text-xs font-inter">🗣️ #Musyawarah</span>
                    </div>
                </article>

                {{-- Nilai 4 --}}
                <article class="bg-gradient-to-br from-black/70 to-black/40 backdrop-blur-sm border border-gold-500/20 rounded-2xl p-6 hover:border-gold-400 transition-all" data-aos="fade-left">
                    <div class="flex items-start gap-4 mb-4">
                        <span class="w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center text-green-400 font-bold text-sm flex-shrink-0">4</span>
                        <div>
                            <h3 class="font-jaini text-xl text-gold-300 mb-2">Gotong Royong & Solidaritas</h3>
                            <span class="font-inter text-xs text-gray-500">Sumber: Semua Cerita</span>
                        </div>
                    </div>
                    <p class="font-inter text-gray-300 text-sm leading-relaxed mb-4">
                        Tidak ada tokoh yang berhasil sendirian. Kolaborasi lintas generasi, suku, dan status sosial menjadi kunci keberhasilan setiap misi dalam cerita rakyat Nusantara.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-2 py-1 bg-gold-500/10 border border-gold-500/20 rounded-lg text-gold-300 text-xs font-inter">🤲 #GotongRoyong</span>
                        <span class="px-2 py-1 bg-green-500/10 border border-green-500/20 rounded-lg text-green-300 text-xs font-inter">🌍 #Solidaritas</span>
                    </div>
                </article>

            </div>
        </section>

        {{-- ✅ KONTEN TAB: MAKNA SIMBOLIK --}}
        <section id="tab-simbolik" class="tab-content hidden py-8">
            <div class="grid md:grid-cols-2 gap-6">

                {{-- Simbol: Tongkonan --}}
                <article class="group relative bg-gradient-to-br from-black/70 to-black/40 backdrop-blur-sm border border-gold-500/20 rounded-2xl overflow-hidden hover:border-gold-400 transition-all" data-aos="zoom-in">
                    {{-- Image Hotspot --}}
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset('assets/img/simbolik/tongkonan.jpeg') }}" alt="Rumah Tongkonan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    </div>

                    <div class="p-6">
                        <h3 class="font-jaini text-xl text-gold-300 mb-2">Rumah Tongkonan</h3>
                        <span class="font-inter text-xs text-gray-500 uppercase tracking-wide">Simbol Kosmologi Toraja</span>

                        <p class="font-inter text-gray-300 text-sm leading-relaxed mt-3 mb-4">
                            Atap melambangkan tanduk kerbau (status spiritual), tiang = hubungan manusia-leluhur, lantai = dunia fana. Setiap bagian adalah peta alam semesta.
                        </p>

                        {{-- Pop-up Penjelasan Hotspot (Hidden by default) --}}
                        <div id="hotspot-desc" class="hidden p-3 bg-black/60 border border-gold-500/30 rounded-lg text-xs font-inter text-gray-300">
                            <strong class="text-gold-400">Atap:</strong> Melambangkan dunia atas, tempat roh leluhur. Semakin banyak tingkatan atap, semakin tinggi status spiritual keluarga.
                        </div>
                    </div>
                </article>

                {{-- Simbol: Phinisi --}}
                <article class="group relative bg-gradient-to-br from-black/70 to-black/40 backdrop-blur-sm border border-gold-500/20 rounded-2xl overflow-hidden hover:border-gold-400 transition-all" data-aos="zoom-in" data-aos-delay="100">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset('assets/img/simbolik/perahu-pinisi.jpg') }}" alt="Perahu Phinisi" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-jaini text-xl text-gold-300 mb-2">Perahu Phinisi</h3>
                        <span class="font-inter text-xs text-gray-500 uppercase tracking-wide">Simbol Perjalanan Spiritual</span>
                        <p class="font-inter text-gray-300 text-sm leading-relaxed mt-3">
                            Perjalanan fisik = perjalanan spiritual. Layar yang mengembang melambangkan harapan, keberanian menghadapi ketidakpastian, dan kepercayaan pada takdir.
                        </p>
                        <div class="mt-4 flex items-center gap-2">
                            <span class="px-2 py-1 bg-gold-500/10 border border-gold-500/30 rounded text-gold-300 text-xs">🌊 Laut = Kehidupan</span>
                            <span class="px-2 py-1 bg-gold-500/10 border border-gold-500/30 rounded text-gold-300 text-xs">⚓ Jangkar = Iman</span>
                        </div>
                    </div>
                </article>

                {{-- Simbol: Motif Kain --}}
                <article class="group relative bg-gradient-to-br from-black/70 to-black/40 backdrop-blur-sm border border-gold-500/20 rounded-2xl overflow-hidden hover:border-gold-400 transition-all" data-aos="zoom-in" data-aos-delay="200">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset('assets/img/simbolik/lipa-sabbe.jpeg') }}" alt="Motif Kain Bugis" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-jaini text-xl text-gold-300 mb-2">Motif Kain Sarung Bugis</h3>
                        <span class="font-inter text-xs text-gray-500 uppercase tracking-wide">Kode Silsilah & Doa</span>
                        <p class="font-inter text-gray-300 text-sm leading-relaxed mt-3">
                            Pola geometris bukan hiasan semata. Setiap garis, warna, dan bentuk menyimpan kode silsilah, status sosial, dan doa keselamatan bagi pemakainya.
                        </p>
                        <div class="mt-4">
                            <div class="flex gap-2">
                                <span class="w-6 h-6 rounded-full bg-red-700 border border-gold-500/30" title="Merah = Keberanian"></span>
                                <span class="w-6 h-6 rounded-full bg-yellow-600 border border-gold-500/30" title="Kuning = Kemuliaan"></span>
                                <span class="w-6 h-6 rounded-full bg-green-700 border border-gold-500/30" title="Hijau = Kesuburan"></span>
                                <span class="w-6 h-6 rounded-full bg-black border border-gold-500/30" title="Hitam = Kekuatan"></span>
                            </div>
                            <p class="font-inter text-xs text-gray-500 mt-2">Klik warna untuk lihat makna</p>
                        </div>
                    </div>
                </article>

                {{-- Simbol: Pa'tedong --}}
                <article class="group relative bg-gradient-to-br from-black/70 to-black/40 backdrop-blur-sm border border-gold-500/20 rounded-2xl overflow-hidden hover:border-gold-400 transition-all" data-aos="zoom-in" data-aos-delay="300">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset('assets/img/simbolik/pa-tedong.jpg') }}" alt="Kerbau Toraja" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-jaini text-xl text-gold-300 mb-2">Pa'tedong (Kerbau)</h3>
                        <span class="font-inter text-xs text-gray-500 uppercase tracking-wide">Simbol Pengorbanan Suci</span>
                        <p class="font-inter text-gray-300 text-sm leading-relaxed mt-3">
                            Simbol pengorbanan tertinggi, penghormatan pada leluhur, dan penjaga keseimbangan alam gaib. Kerbau bukan sekadar hewan, tapi mediator antara dunia manusia dan roh.
                        </p>
                    </div>
                </article>

            </div>
        </section>

        {{-- ✅ KONTEN TAB: KAITKAN DENGAN CERITA --}}
        <section id="tab-koneksi" class="tab-content hidden py-8">
            <div class="bg-gradient-to-br from-black/70 to-black/40 backdrop-blur-sm border border-gold-500/20 rounded-2xl p-6 md:p-8" data-aos="fade-up">
                <h3 class="font-jaini text-2xl text-gold-300 mb-6 text-center">Eksplorasi Lebih Dalam</h3>

                <div class="grid md:grid-cols-3 gap-6">
                    {{-- Link ke Cerita 1 --}}
                    <a href="{{ route('stories.start', 'la-galigo') }}" class="group block p-5 bg-black/40 border border-gray-700 rounded-xl hover:border-gold-500/40 transition-all hover:-translate-y-1">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-lg bg-gold-500/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <h4 class="font-jaini text-lg text-gold-300 group-hover:text-gold-400 transition-colors">La Galigo</h4>
                        </div>
                        <p class="font-inter text-sm text-gray-400">
                            Temukan bagaimana <strong class="text-gold-400">Siri' Na Pacce</strong> membentuk keputusan Sawerigading dalam menghadapi konflik kerajaan.
                        </p>
                        <div class="mt-4 flex items-center text-gold-400 text-xs font-inter group-hover:gap-2 transition-all">
                            <span>Mulai Eksplorasi</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </a>

                    {{-- Link ke Cerita 2 --}}
                    <a href="{{ route('stories.start', 'sawerigading') }}" class="group block p-5 bg-black/40 border border-gray-700 rounded-xl hover:border-gold-500/40 transition-all hover:-translate-y-1">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-lg bg-gold-500/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                </svg>
                            </div>
                            <h4 class="font-jaini text-lg text-gold-300 group-hover:text-gold-400 transition-colors">Sawerigading</h4>
                        </div>
                        <p class="font-inter text-sm text-gray-400">
                            Saksikan simbol <strong class="text-gold-400">Phinisi</strong> dalam adegan pelayaran, dan maknanya sebagai metafora perjalanan hidup.
                        </p>
                        <div class="mt-4 flex items-center text-gold-400 text-xs font-inter group-hover:gap-2 transition-all">
                            <span>Mulai Eksplorasi</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </a>

                    {{-- Link ke Cerita 3 --}}
                    <a href="{{ route('stories.start', 'to-manurung') }}" class="group block p-5 bg-black/40 border border-gray-700 rounded-xl hover:border-gold-500/40 transition-all hover:-translate-y-1">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-lg bg-gold-500/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                            <h4 class="font-jaini text-lg text-gold-300 group-hover:text-gold-400 transition-colors">Legenda To Manurung</h4>
                        </div>
                        <p class="font-inter text-sm text-gray-400">
                            Pelajari bagaimana <strong class="text-gold-400">Siri' na Pacce</strong> menjadi fondasi kepemimpinan dan tatanan masyarakat dalam kisah turunnya To Manurung dari langit.
                        </p>
                        <div class="mt-4 flex items-center text-gold-400 text-xs font-inter group-hover:gap-2 transition-all">
                            <span>Mulai Eksplorasi</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </section>

    </div>
</main>

{{-- ✅ FOOTER EDUKASI --}}
<footer class="relative z-10 border-t border-gray-800 bg-black/50 backdrop-blur-sm py-8">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <p class="font-inter text-gray-400 text-sm mb-4">
            Konten edukasi ini disusun berdasarkan penelitian budaya Bugis & Toraja.
            Untuk referensi akademik, silakan kunjungi bagian <a href="#" class="text-gold-400 hover:underline">Sumber Referensi</a>.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-black/40 border border-gray-700 rounded-lg text-gray-300 text-sm font-inter hover:border-gold-500/30 hover:text-gold-300 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Kembali ke Beranda</span>
            </a>
        </div>
    </div>
</footer>
@endsection

@push('styles')
<style>
    /* Tab Transitions */
    .tab-content {
        animation: fadeIn 0.4s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Scrollbar Hide for Tabs */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    /* Hotspot Pulse Animation */
    [data-hotspot] {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            box-shadow: 0 0 0 0 rgba(234, 179, 8, 0.4);
        }

        50% {
            box-shadow: 0 0 0 10px rgba(234, 179, 8, 0);
        }
    }

    /* Color Swatch Hover */
    .rounded-full[title]:hover::after {
        content: attr(title);
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        padding: 4px 8px;
        background: #1a1a1a;
        border: 1px solid #d4af37;
        border-radius: 4px;
        font-size: 10px;
        color: #f5deb3;
        white-space: nowrap;
        z-index: 20;
        pointer-events: none;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('🎓 Edukasi Page Loaded');

        // ============ 🔄 TAB NAVIGATION (SINGLE SOURCE) ============
        const tabBtns = document.querySelectorAll('[data-tab]');
        const tabContents = document.querySelectorAll('.tab-content');

        function switchTab(tabName) {
            console.log('🔄 Switching to tab:', tabName);

            // 1. Reset semua button ke state inactive
            tabBtns.forEach(btn => {
                btn.classList.remove('active', 'bg-gold-500/20', 'border-gold-500/40', 'text-gold-300');
                btn.classList.add('bg-black/40', 'border-gray-700', 'text-gray-400');
            });

            // 2. Sembunyikan semua content
            tabContents.forEach(content => {
                content.classList.add('hidden');
            });

            // 3. Aktifkan button yang diklik
            const activeBtn = document.querySelector(`[data-tab="${tabName}"]`);
            if (activeBtn) {
                activeBtn.classList.remove('bg-black/40', 'border-gray-700', 'text-gray-400');
                activeBtn.classList.add('active', 'bg-gold-500/20', 'border-gold-500/40', 'text-gold-300');
            }

            // 4. Tampilkan content target
            const targetContent = document.getElementById(`tab-${tabName}`);
            if (targetContent) {
                targetContent.classList.remove('hidden');
                console.log('✅ Content shown: tab-' + tabName);

                // 5. Re-trigger AOS animation untuk content baru
                if (typeof AOS !== 'undefined') {
                    setTimeout(() => AOS.refresh(), 100);
                }
            } else {
                console.error('❌ Content not found: tab-' + tabName);
            }
        }

        // Bind click event ke semua tab button
        tabBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const tabName = this.getAttribute('data-tab');
                switchTab(tabName);
            });
        });

        // ============ 🎯 HOTSPOT INTERACTION (Tongkonan) ============
        const hotspots = document.querySelectorAll('[data-hotspot]');
        const hotspotDesc = document.getElementById('hotspot-desc');

        const hotspotData = {
            'atap': '<strong class="text-gold-400">Atap:</strong> Melambangkan dunia atas, tempat roh leluhur. Semakin banyak tingkatan atap, semakin tinggi status spiritual keluarga.',
            'tiang': '<strong class="text-gold-400">Tiang:</strong> Simbol hubungan antara manusia dan leluhur. Tiang utama (possi) adalah pusat energi spiritual rumah.'
        };

        hotspots.forEach(hotspot => {
            hotspot.addEventListener('click', (e) => {
                e.stopPropagation();
                const key = hotspot.dataset.hotspot;
                if (hotspotData[key] && hotspotDesc) {
                    hotspotDesc.innerHTML = hotspotData[key];
                    hotspotDesc.classList.remove('hidden');
                    setTimeout(() => hotspotDesc.classList.add('hidden'), 5000);
                }
            });
        });


        // ============ 🎨 COLOR SWATCH TOOLTIP (Kain Bugis) ============
        document.querySelectorAll('.rounded-full[title]').forEach(swatch => {
            swatch.addEventListener('click', (e) => {
                e.preventDefault();
                const meaning = swatch.getAttribute('title');
                alert(`🎨 ${meaning}`);
            });
        });

        // ============ 🔄 RESTART EDUKASI ============
        document.getElementById('restartEdu')?.addEventListener('click', () => {
            switchTab('filosofi'); // Reset ke tab pertama
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // ============ 🎬 AOS ANIMATION INIT ============
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 700,
                once: false,
                offset: 30,
                easing: 'ease-out-cubic',
                disable: window.matchMedia('(prefers-reduced-motion: reduce)').matches
            });
            // Refresh setelah halaman fully loaded
            window.addEventListener('load', () => AOS.refresh());
        }

        // ============ ⌨️ KEYBOARD SHORTCUTS (Opsional) ============
        document.addEventListener('keydown', (e) => {
            if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') return;

            const keyMap = {
                '1': 'filosofi',
                '2': 'nilai',
                '3': 'simbolik',
                '4': 'koneksi'
            };
            if (keyMap[e.key]) {
                e.preventDefault();
                switchTab(keyMap[e.key]);
            }
        });

        console.log('✅ All education scripts initialized');
    });
</script>
@endpush