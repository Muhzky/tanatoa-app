@extends('layouts.app')


@section('content')
{{-- ✅ HEADER BARU - Clean & Minimal --}}
<header class="fixed top-0 left-0 right-0 z-50 bg-black border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            {{-- Tombol Kembali + Info Story --}}
            <div class="flex items-center gap-4">
                <a href="{{ route('stories.index') }}" 
                   class="p-2.5 rounded-lg hover:bg-gray-800 transition-colors group" 
                   title="Kembali ke Daftar Cerita">
                    <svg class="w-5 h-5 text-yellow-500 group-hover:text-yellow-400" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                
                <div class="flex flex-col">
                    <h1 class="font-jaini text-base md:text-lg text-yellow-500">
                        {{ $scene->story->title ?? 'Legenda Sungai Karama' }}
                    </h1>
                    <p class="font-inter text-xs text-gray-400 mt-0.5">
                        Scene <span class="text-yellow-600">{{ $scene->order ?? 2 }}</span> 
                        <span class="mx-1 text-gray-600">•</span> 
                        {{ $scene->title ?? 'Pertemuan di Tepian' }}
                    </p>
                </div>
            </div>

            {{-- Badge Progress --}}
            <div class="flex items-center gap-2 px-3 py-1.5 bg-gray-900 rounded-lg border border-gray-700">
                <span class="w-2 h-2 rounded-full bg-yellow-500"></span>
                <span class="font-inter text-xs text-gray-300">
                    {{ $scene->order ? min($scene->order * 25, 100) : 25 }}%
                </span>
            </div>
        </div>

        {{-- Progress Bar - Solid Color --}}
        <div class="mt-4 mb-2">
            <div class="h-1.5 bg-gray-800 rounded-full overflow-hidden">
                <div id="progressFill" 
                     class="h-full bg-yellow-500 rounded-full transition-all duration-700"
                     style="width: {{ $scene->order ? min($scene->order * 25, 100) : 25 }}%">
                </div>
            </div>
            
           
        </div>
    </div>
</header>

<main class="min-h-screen pt-24 pb-36 bg-heritage-950 relative overflow-hidden">
    <div class="absolute z-0 repeat-x bottom-0 top-0 left-0 right-0 ">
        <img src="{{ asset('assets/img/bg-scene.png') }}" alt="Background" class="w-full h-full object-cover opacity-20">
    </div>

    {{-- ✅ CONTAINER UTAMA - MEMBATASI LEBAR KONTEN --}}
    <div class="relative z-10 max-w-4xl mx-auto px-10 pt-3 md:pt-12">

        <div class="mb-6 flex items-center justify-center" data-aos="fade-down">
            <span class="px-4 py-1.5 bg-black/60 backdrop-blur-sm border border-gold-500/30 rounded-full text-gold-300 text-xs font-inter uppercase tracking-wider">
                ✦ Scene {{ $scene->order ?? 2 }} ✦
            </span>
        </div>

        <h1 class="font-jaini text-xl md:text-3xl lg:text-4xl text-gold-400 text-center mb-8 px-4"
            data-aos="fade-up"
            data-aos-delay="100">

            {{ $scene->title }}

        </h1>

        {{-- ✅ VISUAL MEDIA --}}
        <div class="mb-10" data-aos="zoom-in" data-aos-duration="800">
            <div class="relative rounded-2xl overflow-hidden border border-white/10 shadow-2xl shadow-black/50 bg-black/40">
                @if($scene->media_visual)
                @php
                $visualPath = $scene->media_visual;
                $visualExtension = pathinfo($visualPath, PATHINFO_EXTENSION);
                @endphp

                @if(in_array(strtolower($visualExtension), ['mp4', 'webm', 'ogg']))
                <!-- Video Player -->
                <video id="sceneVideo" class="w-full h-auto md:h-96 object-cover" controls preload="metadata">
                    <source src="{{ asset('storage/'.$visualPath) }}" type="video/{{ strtolower($visualExtension) }}">
                    Browser Anda tidak mendukung tag video.
                </video>
                @else
                <!-- Image Fallback -->
                <img src="{{ asset('storage/'.$visualPath) }}" alt="Scene Visual" class="w-full h-96 md:h-100 ">
                @endif
                @else
                <img src="{{ asset('assets/img/placeholder-scene.jpg') }}" alt="Scene Visual" class="w-full h-96 md:h-96 object-cover">
                @endif

                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent pointer-events-none"></div>
                <div class="absolute top-4 right-4 px-3 py-1 bg-black/60 backdrop-blur-sm border border-gold-500/30 rounded-full text-gold-300 text-xs font-inter">
                    {{ in_array(strtolower($visualExtension ?? ''), ['mp4', 'webm', 'ogg']) ? 'Video' : 'Visual' }}
                </div>
            </div>
        </div>


        {{-- Audio --}}
        <div class="mb-10" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
            <div class="max-w-4xl mx-auto">
                <div class="bg-black/70 backdrop-blur-md border border-white/10 rounded-2xl p-4 md:p-5 shadow-xl shadow-black/30 relative overflow-hidden">

                    {{-- ✨ Overlay Gradient & Badge Status Audio --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent pointer-events-none"></div>
                    <div class="absolute top-4 right-4 px-3 py-1 bg-black/60 backdrop-blur-sm border border-gold-500/30 rounded-full text-gold-300 text-xs font-inter z-10">
                        🎧 {{ $scene->media_audio ? 'Audio Available' : 'No Audio' }}
                    </div>

                    <div class="relative z-10"> {{-- Wrapper konten agar tetap di atas overlay --}}
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-full bg-gold-500/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-inter text-sm font-semibold text-white">Narasi Scene</h3>
                                <p class="font-inter text-xs text-gray-400">Dengarkan cerita yang dibacakan</p>
                            </div>
                        </div>

                        {{-- Cek audio ada --}}
                        @if($scene->media_audio)
                        <audio controls class="w-full h-10 mb-2" preload="metadata">
                            <source src="{{ asset('storage/'.$scene->media_audio) }}" type="audio/mpeg">
                            Browser Anda tidak mendukung elemen audio.
                        </audio>
                        @else
                        {{-- Fallback: tidak ada audio --}}
                        <div class="text-center py-2">
                            <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-gray-500/20 flex items-center justify-center">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2" />
                                </svg>
                            </div>
                            <p class="text-gray-400 text-sm font-inter">🔇 Narasi audio tidak tersedia</p>
                            <p class="text-gray-500 text-xs font-inter mt-1">Silakan baca narasi teks di bawah.</p>
                        </div>
                        @endif
                    </div> {{-- End relative z-10 wrapper --}}
                </div>
            </div>
        </div>

        {{-- ✅ STORY TEXT - Gaya Tulisan Kuno/Manuskrip --}}
        <div class="mb-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
            <div class="max-w-4xl mx-auto">
                <article class="relative bg-gradient-to-br from-black/80 via-black/60 to-black/80 backdrop-blur-md border border-gold-500/20 rounded-2xl p-6 md:p-5 shadow-2xl shadow-black/50 overflow-hidden">

                    {{-- Header --}}
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gold-500/20">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gold-500/20 to-gold-600/10 flex items-center justify-center border border-gold-500/30">
                            <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-jaini text-lg text-gold-300">Narasi Cerita</h3>
                            <p class="font-inter text-xs text-gray-500">Baca kisah ini</p>
                        </div>
                        <span class="ml-auto px-3 py-1 bg-gold-500/10 border border-gold-500/20 rounded-full text-gold-400 text-xs font-inter tracking-wide">📖 Teks</span>
                    </div>

                    {{-- Konten Narasi - Gaya Tulisan Kuno --}}
                    <div class="font-jaini text-[17px] md:text-lg leading-relaxed text-gold-100/90 selection:bg-gold-500/30 selection:text-gold-50 relative z-10">
                        {{-- Decorative quote mark - Atas Kiri --}}
                        <span class="text-4xl text-gold-500/30 font-serif leading-none float-left mr-2 mt-[-4px]">"</span>

                        <p class=" indent-8 text-justify ">
                            {!! nl2br(e($scene->content ?? 'Matahari mulai tenggelam di ufuk barat, memantulkan cahaya keemasan di permukaan Sungai Karama...')) !!}
                        </p>

                        {{-- Decorative quote mark - Bawah Kanan --}}
                        <div class="flex justify-end">
                            <span class="text-4xl text-gold-500/30 font-serif leading-none">"</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>


        {{-- ✅ Choice --}}
        @php
        // Ambil pilihan aktif sekali saja untuk efisiensi (Eager Load dari controller)
        $activeChoices = $scene->choices->where('is_active', true)->sortBy('order');
        $hasChoices = $activeChoices->isNotEmpty();

        // Cek apakah scene ini adalah ending
        $isEndScene = (bool) $scene->is_ending;
        @endphp

        <section id="choiceSection" class="mt-6" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
            <div class="max-w-4xl mx-auto">
                {{-- Header Section --}}
                <div class="mb-3 flex items-center gap-3">
                    <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gold-500/30 to-transparent"></div>
                    <span class="font-inter text-xs uppercase tracking-wider text-gold-400">
                        {{ $isEndScene ? 'Cerita Selesai' : ($hasChoices ? 'Pilih Lanjutan' : 'Lanjutkan Cerita') }}
                    </span>
                    <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gold-500/30 to-transparent"></div>
                </div>

                {{-- ============================================
             🔚 SCENE AKHIR: Pesan Selesai + 2 Tombol
             ============================================ --}}
                @if($isEndScene)
                <div class="text-center mb-6 p-6 bg-gradient-to-br from-gold-500/10 to-gold-600/10 backdrop-blur-sm border border-gold-400/50 rounded-xl" data-aos="fade-up">
                    {{-- Icon Centang Emas --}}
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-br from-gold-400 to-gold-600 mb-3 shadow-lg mx-auto">
                        <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>

                    {{-- Pesan Utama --}}
                    <h2 class="font-jaini text-2xl text-gold-400 mb-2">
                        Cerita Telah Selesai
                    </h2>
                    <p class="font-inter text-sm text-gray-400 mb-4">
                        Terima kasih telah mengikuti cerita "{{ $story->title }}"
                    </p>

                    {{-- 2 Tombol Action --}}
                    <div class="flex flex-col sm:flex-row gap-3 justify-center">

                        {{-- Tombol 1: Ulangi Cerita --}}
                        <form action="{{ route('story.restart', ['story' => $story->slug]) }}" method="POST" class="flex-1 max-w-xs">
                            @csrf
                            <button type="submit" class="w-full px-4 py-3 bg-gradient-to-br from-gold-500/20 to-gold-600/20 backdrop-blur-sm border border-gold-400 hover:border-gold-300 text-gold-300 rounded-lg transition-all hover:-translate-y-0.5 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-gold-500/50 font-jaini text-sm flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Ulangi Cerita
                            </button>
                        </form>

                        {{-- Tombol 2: Kembali ke Pilihan Cerita --}}
                        <a href="{{ route('stories.index') }}" class="flex-1 max-w-xs px-4 py-3 bg-black/40 backdrop-blur-sm border border-gold-500/30 hover:border-gold-400 text-gold-300 rounded-lg transition-all hover:-translate-y-0.5 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-gold-500/50 font-jaini text-sm flex items-center justify-center gap-2 text-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>

                {{-- ============================================
             🔘 SCENE DENGAN PILIHAN: Tampilkan Grid
             ============================================ --}}
                @elseif($hasChoices)
                <div class="grid md:grid-cols-2 gap-4">
                    @foreach($activeChoices as $index => $choice)
                    <form action="{{ route('choices.select', $choice->id) }}" method="POST" class="group" onsubmit="handleChoiceSubmit(event, {{ $index + 1 }})">
                        @csrf
                        <input type="hidden" name="choice_id" value="{{ $choice->id }}">
                        <input type="hidden" name="scene_id" value="{{ $scene->id }}">

                        <button type="submit" class="choice-btn w-full text-left relative bg-gradient-to-br from-black/70 to-black/40 backdrop-blur-sm border border-gold-500/30 hover:border-gold-400 rounded-lg p-4 transition-all hover:transform hover:-translate-y-0.5 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-gold-500/50">
                            <div class="absolute top-2 right-2 w-6 h-6 opacity-30 group-hover:opacity-60 transition-opacity">
                                <svg viewBox="0 0 24 24" class="text-gold-400" fill="currentColor">
                                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                                </svg>
                            </div>
                            <div class="pr-6">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="w-6 h-6 rounded-full bg-gold-500/20 flex items-center justify-center text-gold-400 font-bold text-xs">{{ $index + 1 }}</span>
                                    <span class="font-inter text-xs uppercase tracking-wider text-gold-300">Pilihan</span>
                                </div>
                                <h4 class="font-jaini text-base text-white mb-1 group-hover:text-gold-300 transition-colors">{{ $choice->text }}</h4>
                                <p class="font-inter text-xs text-gray-400 line-clamp-4">{{ $choice->description }}</p>
                            </div>
                            <div class="absolute bottom-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </div>
                        </button>
                    </form>
                    @endforeach
                </div>

                {{-- ============================================
             ⏭️ SCENE LINEAR: Tombol Lanjut Berikutnya
             ============================================ --}}
                @else
                <form action="{{ route('scenes.next', ['story' => $story->slug, 'scene' => $scene->id]) }}" method="POST" class="max-w-xs mx-auto">
                    @csrf
                    <button type="submit" class="choice-btn w-full text-left relative bg-gradient-to-br from-black/70 to-black/40 backdrop-blur-sm border border-gold-500/30 hover:border-gold-400 rounded-lg p-4 transition-all hover:transform hover:-translate-y-0.5 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-gold-500/50 flex items-center justify-center gap-2 group">
                        <span class="font-jaini text-base text-white group-hover:text-gold-300 transition-colors">Lanjut ke Scene Selanjutnya</span>
                        <svg class="w-4 h-4 text-gold-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>
                </form>
                @endif
            </div>
        </section>
    </div>
    </div>
</main>

<!-- Settings Panel -->
<div id="settingsBackdrop" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden"></div>
<aside id="settingsPanel" class="fixed top-0 right-0 h-full w-80 max-w-full bg-heritage-900 border-l border-white/10 z-[70] transform translate-x-full transition-transform duration-300 shadow-2xl">
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="font-jaini text-xl text-gold-400">Pengaturan</h3>
            <button id="closeSettings" class="p-2 hover:bg-white/10 rounded-lg transition-colors text-gray-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="space-y-4">
            <label class="flex items-center justify-between p-3 bg-black/30 rounded-lg cursor-pointer hover:bg-black/40">
                <span class="font-inter text-sm text-gray-300">Teks Besar</span>
                <input type="checkbox" id="largeText" class="w-5 h-5 rounded border-gray-600 bg-black/50 text-gold-500">
            </label>
            <label class="flex items-center justify-between p-3 bg-black/30 rounded-lg cursor-pointer hover:bg-black/40">
                <span class="font-inter text-sm text-gray-300">Kurangi Animasi</span>
                <input type="checkbox" id="reduceMotion" class="w-5 h-5 rounded border-gray-600 bg-black/50 text-gold-500">
            </label>
        </div>
    </div>
</aside>

<!-- Transition Overlay -->
<div id="sceneTransition" class="fixed inset-0 z-[100] bg-black flex items-center justify-center hidden">
    <div class="text-center">
        <div class="w-16 h-16 mx-auto mb-4 border-4 border-gold-500/30 border-t-gold-400 rounded-full animate-spin"></div>
        <p class="font-inter text-gold-400 text-sm">Memuat scene berikutnya...</p>
    </div>
</div>
@endsection

@push('styles')
<style>
    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
    .animate-shimmer {
        animation: shimmer 2.5s infinite;
    }

    .choice-btn {
        will-change: transform;
        backface-visibility: hidden;
    }

    .choice-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 25px 50px -12px rgba(234, 179, 8, 0.25);
        border-color: rgba(251, 191, 36, 0.6);
    }

    body.text-large .prose {
        font-size: 1.5rem !important;
        line-height: 1.8 !important;
    }

    @media (min-width: 768px) {
        body.text-large .prose {
            font-size: 1.875rem !important;
        }
    }

    @media (prefers-reduced-motion: reduce) {

        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            transition-duration: 0.01ms !important;
        }
    }

    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #111;
    }

    ::-webkit-scrollbar-thumb {
        background: #333;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    /* Custom range untuk progress audio */
    #audioProgress {
        position: relative;
    }

    #audioProgress:hover #audioProgressFill {
        filter: brightness(1.1);
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ============ 🎵 AUDIO PLAYER ============
        const audio = document.getElementById('narrationAudio');
        const playBtn = document.getElementById('audioPlayPause');
        const playIcon = document.getElementById('playIcon');
        const pauseIcon = document.getElementById('pauseIcon');
        const progressFill = document.getElementById('audioProgressFill');
        const currentTimeEl = document.getElementById('currentTime');
        const durationEl = document.getElementById('duration');
        const audioProgress = document.getElementById('audioProgress');
        const volumeToggle = document.getElementById('volumeToggle');
        const volumeHigh = document.getElementById('volumeHigh');
        const volumeMute = document.getElementById('volumeMute');
        const playbackSpeed = document.getElementById('playbackSpeed');
        const audioStatus = document.getElementById('audioStatus');

        let isPlaying = false;
        let isDragging = false;
        let audioLoadError = false;
        let lastVolume = 1;

        // Format waktu (mm:ss)
        const formatTime = (seconds) => {
            if (!seconds || isNaN(seconds) || !isFinite(seconds)) return '0:00';
            const mins = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);
            return `${mins}:${secs.toString().padStart(2, '0')}`;
        };

        // Update UI status audio
        const updateAudioStatus = (status, isError = false) => {
            if (audioStatus) {
                audioStatus.textContent = status;
                audioStatus.classList.toggle('text-red-400', isError);
                audioStatus.classList.toggle('text-gold-300', !isError);
            }
        };

        if (audio) {
            audio.addEventListener('loadedmetadata', () => {
                if (durationEl && audio.duration && isFinite(audio.duration)) {
                    durationEl.textContent = formatTime(audio.duration);
                    updateAudioStatus('🎧 Ready');
                    console.log('✅ Audio metadata loaded:', audio.duration);
                }
            });

            audio.addEventListener('canplay', () => {
                console.log('✅ Audio ready to play');
            });

            audio.addEventListener('loadstart', () => {
                console.log('🔄 Loading audio from:', audio.currentSrc || audio.src);
                updateAudioStatus('🔄 Loading...');
            });

            audio.addEventListener('waiting', () => {
                updateAudioStatus('⏳ Buffering...');
            });

            audio.addEventListener('playing', () => {
                updateAudioStatus('🎧 Playing');
            });

            audio.addEventListener('pause', () => {
                updateAudioStatus('⏸️ Paused');
            });

            audio.addEventListener('error', (e) => {
                const error = audio.error;
                console.error('❌ Audio error:', error);
                console.error('Error code:', error?.code);
                console.error('Error message:', error?.message);
                console.error('Audio src:', audio.currentSrc || audio.src);

                audioLoadError = true;

                if (durationEl) durationEl.textContent = 'Error';
                if (playBtn) {
                    playBtn.disabled = true;
                    playBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    playBtn.title = 'Audio tidak dapat diputar';
                }
                if (progressFill) {
                    progressFill.classList.remove('from-gold-600', 'to-gold-400');
                    progressFill.classList.add('bg-red-500');
                }

                updateAudioStatus('❌ Error', true);

                if (audioProgress?.parentElement && !document.getElementById('audioErrorMsg')) {
                    const errorMsg = document.createElement('p');
                    errorMsg.id = 'audioErrorMsg';
                    errorMsg.className = 'text-red-400 text-xs mt-2 font-inter';
                    const errorMessages = {
                        1: '⚠️ Proses fetch audio dibatalkan',
                        2: '⚠️ Error jaringan saat memuat audio',
                        3: '⚠️ Dekoding audio gagal - file mungkin corrupt',
                        4: '⚠️ Format audio tidak didukung'
                    };
                    errorMsg.textContent = errorMessages[error?.code] || '⚠️ Gagal memuat audio. Coba refresh halaman.';
                    audioProgress.parentElement.appendChild(errorMsg);
                }
            });

            audio.addEventListener('timeupdate', () => {
                if (progressFill && currentTimeEl && audio.duration && isFinite(audio.duration)) {
                    const percent = (audio.currentTime / audio.duration) * 100;
                    progressFill.style.width = percent + '%';
                    currentTimeEl.textContent = formatTime(audio.currentTime);
                }
            });

            audio.addEventListener('ended', () => {
                isPlaying = false;
                playIcon?.classList.remove('hidden');
                pauseIcon?.classList.add('hidden');
                if (progressFill) progressFill.style.width = '0%';
                if (currentTimeEl) currentTimeEl.textContent = '0:00';
                updateAudioStatus('✅ Selesai');
            });

            audio.addEventListener('seeked', () => {
                if (progressFill && audio.duration) {
                    const percent = (audio.currentTime / audio.duration) * 100;
                    progressFill.style.width = percent + '%';
                }
            });
        }

        // ============ ▶️ PLAY / PAUSE (FIXED) ============
        if (playBtn && audio) {

            // sync UI dari audio asli (bukan variable)
            audio.addEventListener('play', () => {
                playIcon?.classList.add('hidden');
                pauseIcon?.classList.remove('hidden');
            });

            audio.addEventListener('pause', () => {
                playIcon?.classList.remove('hidden');
                pauseIcon?.classList.add('hidden');
            });

            playBtn.addEventListener('click', async () => {
                if (audioLoadError) return;

                try {
                    if (audio.paused) {
                        await audio.play();
                    } else {
                        audio.pause();
                    }
                } catch (err) {
                    console.warn('⚠️ Play blocked, retry muted...', err);

                    // 🔥 fallback paksa (anti autoplay block)
                    try {
                        audio.muted = true;
                        await audio.play();
                        audio.muted = false;
                    } catch (e) {
                        console.error('❌ Gagal total play:', e);
                    }
                }
            });
        }

        // ============ 🔍 SEEK ============
        if (audioProgress && audio) {
            const getSeekPosition = (e) => {
                if (!audio.duration || !isFinite(audio.duration) || audioLoadError) return null;
                const rect = audioProgress.getBoundingClientRect();
                const clientX = e.clientX ?? e.touches?.[0]?.clientX;
                if (clientX === undefined || clientX === null) return null;
                return Math.max(0, Math.min(1, (clientX - rect.left) / rect.width));
            };

            const seekAudio = (e) => {
                const pos = getSeekPosition(e);
                if (pos !== null) {
                    audio.currentTime = pos * audio.duration;
                    if (progressFill) progressFill.style.width = (pos * 100) + '%';
                }
            };

            audioProgress.addEventListener('mousedown', (e) => {
                e.preventDefault();
                isDragging = true;
                seekAudio(e);
            });
            document.addEventListener('mousemove', (e) => {
                if (isDragging) seekAudio(e);
            });
            document.addEventListener('mouseup', () => {
                isDragging = false;
            });

            audioProgress.addEventListener('touchstart', (e) => {
                isDragging = true;
                seekAudio(e.touches[0]);
            }, {
                passive: true
            });
            document.addEventListener('touchmove', (e) => {
                if (isDragging && e.touches[0]) seekAudio(e.touches[0]);
            }, {
                passive: true
            });
            document.addEventListener('touchend', () => {
                isDragging = false;
            });

            audioProgress.addEventListener('click', (e) => {
                if (!isDragging) seekAudio(e);
            });
        }

        // ============ 🔊 VOLUME ============
        if (volumeToggle && audio) {
            audio.volume = lastVolume;

            volumeToggle.addEventListener('click', () => {
                if (audio.muted || audio.volume === 0) {
                    audio.muted = false;
                    audio.volume = lastVolume || 1;
                    volumeHigh?.classList.remove('hidden');
                    volumeMute?.classList.add('hidden');
                } else {
                    lastVolume = audio.volume;
                    audio.muted = true;
                    volumeHigh?.classList.add('hidden');
                    volumeMute?.classList.remove('hidden');
                }
            });

            audioProgress?.addEventListener('wheel', (e) => {
                e.preventDefault();
                const delta = e.deltaY > 0 ? -0.1 : 0.1;
                audio.volume = Math.max(0, Math.min(1, audio.volume + delta));
                audio.muted = audio.volume === 0;
                if (audio.muted) {
                    volumeHigh?.classList.add('hidden');
                    volumeMute?.classList.remove('hidden');
                } else {
                    volumeHigh?.classList.remove('hidden');
                    volumeMute?.classList.add('hidden');
                }
            }, {
                passive: false
            });
        }

        // ============ ⏩ PLAYBACK SPEED ============
        if (playbackSpeed && audio) {
            playbackSpeed.addEventListener('change', (e) => {
                audio.playbackRate = parseFloat(e.target.value);
            });
        }

        window.addEventListener('beforeunload', () => {
            if (audio && !audio.paused) audio.pause();
        });

        if (audio) {
            audio.volume = 1;
            audio.muted = false;
        }

        // ============ ⚙️ SETTINGS PANEL ============
        const settingsPanel = document.getElementById('settingsPanel');
        const settingsToggle = document.getElementById('settingsToggle');
        const closeSettings = document.getElementById('closeSettings');
        const settingsBackdrop = document.getElementById('settingsBackdrop');
        const largeTextToggle = document.getElementById('largeText');
        const reduceMotionToggle = document.getElementById('reduceMotion');

        const openSettings = () => {
            settingsPanel?.classList.remove('translate-x-full');
            settingsBackdrop?.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        };

        const closeSettingsPanel = () => {
            settingsPanel?.classList.add('translate-x-full');
            settingsBackdrop?.classList.add('hidden');
            document.body.style.overflow = '';
        };

        settingsToggle?.addEventListener('click', openSettings);
        closeSettings?.addEventListener('click', closeSettingsPanel);
        settingsBackdrop?.addEventListener('click', closeSettingsPanel);

        if (largeTextToggle) {
            if (localStorage.getItem('pref_large_text') === 'true') {
                largeTextToggle.checked = true;
                document.body.classList.add('text-large');
            }
            largeTextToggle.addEventListener('change', (e) => {
                document.body.classList.toggle('text-large', e.target.checked);
                localStorage.setItem('pref_large_text', e.target.checked);
            });
        }

        if (reduceMotionToggle) {
            if (localStorage.getItem('pref_reduce_motion') === 'true') {
                reduceMotionToggle.checked = true;
                document.documentElement.style.setProperty('--aos-duration', '0.01ms');
            }
            reduceMotionToggle.addEventListener('change', (e) => {
                if (e.target.checked) {
                    document.documentElement.style.setProperty('--aos-duration', '0.01ms');
                    if (typeof AOS !== 'undefined') AOS.refresh({
                        disable: true
                    });
                } else {
                    document.documentElement.style.removeProperty('--aos-duration');
                    if (typeof AOS !== 'undefined') AOS.refresh({
                        disable: false
                    });
                }
                localStorage.setItem('pref_reduce_motion', e.target.checked);
            });
        }

        // ============ 🎮 CHOICE SUBMIT ============
        window.handleChoiceSubmit = function(e, choiceNum) {
            e.preventDefault();
            const form = e.target.closest('form');
            const transition = document.getElementById('sceneTransition');
            if (!form) return;

            if (audio && !audio.paused) {
                audio.pause();
                isPlaying = false;
                playIcon?.classList.remove('hidden');
                pauseIcon?.classList.add('hidden');
            }

            transition?.classList.remove('hidden');

            const btn = form.querySelector('.choice-btn');
            if (btn) btn.classList.add('ring-2', 'ring-gold-400', 'scale-[0.98]');

            setTimeout(() => form.submit(), 1200);
        };

        // ============ ⌨️ KEYBOARD SHORTCUTS ============
        document.addEventListener('keydown', (e) => {
            const tagName = document.activeElement?.tagName?.toLowerCase();
            const isTyping = tagName === 'input' || tagName === 'textarea' || tagName === 'select' || document.activeElement?.isContentEditable;
            if (isTyping) return;

            if (e.key === 'Escape') {
                closeSettingsPanel();
                return;
            }

            if (e.key === ' ') {
                e.preventDefault();
                if (audio && playBtn && !audioLoadError) playBtn.click();
                return;
            }

            if (audio && !audioLoadError) {
                if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    audio.currentTime = Math.max(0, audio.currentTime - 5);
                    return;
                }
                if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    audio.currentTime = Math.min(audio.duration || 0, audio.currentTime + 5);
                    return;
                }
            }

            if (audio) {
                if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    audio.volume = Math.min(1, audio.volume + 0.1);
                    audio.muted = false;
                    volumeHigh?.classList.remove('hidden');
                    volumeMute?.classList.add('hidden');
                    return;
                }
                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    audio.volume = Math.max(0, audio.volume - 0.1);
                    if (audio.volume === 0) {
                        audio.muted = true;
                        volumeHigh?.classList.add('hidden');
                        volumeMute?.classList.remove('hidden');
                    }
                    return;
                }
            }

            if (e.key >= '1' && e.key <= '4') {
                const choiceForms = document.querySelectorAll('#choiceSection form');
                const idx = parseInt(e.key) - 1;
                if (choiceForms[idx]) {
                    e.preventDefault();
                    choiceForms[idx].querySelector('button[type="submit"]')?.click();
                }
            }
        });

        // ============ 🎬 AOS INIT ============
        if (typeof AOS !== 'undefined') {
            const reduceMotion = reduceMotionToggle?.checked ||
                localStorage.getItem('pref_reduce_motion') === 'true' ||
                window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            AOS.init({
                duration: reduceMotion ? 1 : 700,
                once: true,
                offset: 30,
                disable: reduceMotion ? 'phone' : false,
                easing: 'ease-out-cubic'
            });

            window.addEventListener('load', () => AOS.refresh());
        }

        // ============ 🖱️ CLICK OUTSIDE SETTINGS ============
        document.addEventListener('click', (e) => {
            if (!settingsPanel?.classList.contains('translate-x-full')) {
                if (!settingsPanel?.contains(e.target) && !settingsToggle?.contains(e.target)) {
                    closeSettingsPanel();
                }
            }
        });

        // ============ 📱 MOBILE TOUCH ============
        document.querySelectorAll('button, .choice-btn, #audioProgress').forEach(el => {
            el.addEventListener('touchstart', () => el.classList.add('active'), {
                passive: true
            });
            el.addEventListener('touchend', () => el.classList.remove('active'), {
                passive: true
            });
        });

        // ============ 🔄 AUTO HIDE HEADER ============
        let lastScrollY = window.scrollY;
        const header = document.querySelector('header');
        if (header) {
            window.addEventListener('scroll', () => {
                const currentScrollY = window.scrollY;
                if (currentScrollY > 100) {
                    header.classList.toggle('-translate-y-full', currentScrollY > lastScrollY);
                } else {
                    header.classList.remove('-translate-y-full');
                }
                lastScrollY = currentScrollY;
            }, {
                passive: true
            });
        }

        // ============ 🎯 DEBUG (local only) ============
        @env('local')
        if (audio) {
            console.group('🎵 Audio Debug Info');
            console.log('Src:', audio.src);
            console.log('CurrentSrc:', audio.currentSrc);
            console.log('ReadyState:', audio.readyState);
            console.log('NetworkState:', audio.networkState);
            console.log('CanPlayType MP3:', audio.canPlayType('audio/mpeg'));
            console.log('CanPlayType OGG:', audio.canPlayType('audio/ogg'));
            console.groupEnd();
        }
        @endenv

        document.addEventListener('turbo:before-render', () => {
            if (audio && !audio.paused) audio.pause();
        });

        console.log('✅ Scene scripts initialized');
    });
</script>
@endpush