@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[50vh] flex items-start overflow-hidden bg-cover bg-center bg-no-repeat pt-32"
    style="background-image: url('{{ asset('assets/img/background.jpg') }}');">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/60"></div>

    <!-- Content - Samakan container dengan navbar -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 w-full">
        <div class="max-w-3xl">
            <!-- Badge -->
            <div class="mb-6" data-aos="fade-down">
                <span class="inline-flex items-center gap-2 px-6 py-2 border border-gold-500/50 rounded-full text-gold-300 text-xs uppercase tracking-[0.3em] font-inter bg-black/20 backdrop-blur-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-gold-400"></span>
                    Warisan Digital
                    <span class="w-1.5 h-1.5 rounded-full bg-gold-400"></span>
                </span>
            </div>

            <!-- Title -->
            <h1 class="font-jaini text-6xl md:text-7xl lg:text-8xl font-bold text-white mb-6 drop-shadow-lg"
                data-aos="fade-up" data-aos-delay="100">
                Cerita Digital
            </h1>

            <!-- Subtitle -->
            <p class="font-playfair text-xl md:text-2xl text-gray-200 max-w-2xl leading-relaxed"
                data-aos="fade-up" data-aos-delay="200">
                Jelajahi koleksi cerita rakyat Bugis dan Toraja dalam pengalaman menjelajah yang imersif
            </p>
        </div>
    </div>

    <!-- Decorative Corners -->
    <div class="absolute top-20 left-8 w-20 h-20 border-l border-t border-gold-500/30 rounded-tl-2xl hidden md:block"></div>
    <div class="absolute top-20 right-8 w-20 h-20 border-r border-t border-gold-500/30 rounded-tr-2xl hidden md:block"></div>
</section>


<!-- Stories Grid -->
<section class="py-12 bg-heritage-950">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Stats -->
        <div class="mb-10 flex items-center justify-between" data-aos="fade-up">
            <p class="font-inter text-gray-400 text-sm">
                Menampilkan <span id="storyCount" class="text-gold-400 font-semibold">{{ $stories->count() }}</span> cerita
            </p>
        </div>

        <!-- Stories Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="storiesGrid">

            @forelse($stories as $story)
            <article class="story-card group bg-heritage-900 rounded-2xl overflow-hidden border border-white/5 hover:border-gold-500/40 transition-all duration-400 hover:-translate-y-1"
                data-category="{{ strtolower($story->category) }}" data-aos="fade-up">

                <!-- Image Container -->
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ asset('storage/'.$story->cover_image) }}"
                        alt="{{ $story->title }}"
                        loading="lazy"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-heritage-900 via-heritage-900/20 to-transparent"></div>

                    <!-- Category Badge -->
                    <span class="absolute bottom-3 left-3 px-3 py-1 bg-gold-500/90 text-black text-xs font-bold uppercase tracking-wider rounded-full">
                        {{ $story->category }}
                    </span>

                    <!-- Book Button Overlay -->
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/30 backdrop-blur-[2px]">
                        <div class="w-14 h-14 rounded-full bg-gold-500 flex items-center justify-center transform scale-90 group-hover:scale-100 transition-transform shadow-lg shadow-gold-500/40">
                            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-5">
                    <h3 class="font-jaini text-xl font-bold text-white mb-2 group-hover:text-gold-400 transition-colors line-clamp-1">
                        {{ $story->title }}
                    </h3>
                    <p class="font-inter text-gray-400 text-sm mb-4 line-clamp-2 leading-relaxed">
                        {{ \Illuminate\Support\Str::limit($story->description, 90) }}
                    </p>

                    <!-- Meta Info -->
                    <div class="flex items-center justify-between pt-3 border-t border-white/5">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-gold-500/20 to-gold-600/20 border border-gold-500/30 flex items-center justify-center">
                                <span class="text-gold-400 text-xs font-bold font-jaini">
                                    {{ strtoupper(substr($story->title, 0, 1)) }}
                                </span>
                            </div>
                            <span class="font-inter text-xs text-gray-500">{{ $story->category }}</span>
                        </div>
                        <a href="{{ route('stories.start', $story->slug) }}"
                            class="inline-flex items-center gap-1 text-gold-400 hover:text-gold-300 text-sm font-inter font-medium transition-colors group/link">
                            Baca
                            <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Hover Glow Effect -->
                <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"
                    style="background: radial-gradient(ellipse at top right, rgba(212,175,55,0.12), transparent 70%);">
                </div>
            </article>
            @empty
            <div class="col-span-full text-center py-20">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-heritage-800 mb-6">
                    <svg class="w-10 h-10 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="font-jaini text-2xl text-white mb-2">Belum Ada Cerita</h3>
                <p class="font-inter text-gray-400 max-w-sm mx-auto">Koleksi sedang dalam pengembangan.</p>
            </div>
            @endforelse

        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll(".filter-btn");
        const cards = document.querySelectorAll(".story-card");
        const searchInput = document.getElementById("searchInput");
        const countText = document.getElementById("storyCount");

        let activeFilter = "all";

        function filterStories() {
            let visible = 0;
            const keyword = searchInput.value.toLowerCase().trim();

            cards.forEach(card => {
                const category = card.dataset.category;
                const title = card.querySelector("h3")?.innerText.toLowerCase() || "";
                const desc = card.querySelector("p")?.innerText.toLowerCase() || "";

                const matchCategory = activeFilter === "all" || category === activeFilter;
                const matchSearch = !keyword || title.includes(keyword) || desc.includes(keyword);

                if (matchCategory && matchSearch) {
                    card.style.display = "block";
                    card.style.animation = "none";
                    setTimeout(() => card.style.animation = "fadeIn 0.4s ease-out", 10);
                    visible++;
                } else {
                    card.style.display = "none";
                }
            });

            countText.innerText = visible;

            // Handle no results
            const grid = document.getElementById("storiesGrid");
            let noResults = document.getElementById("noResults");

            if (visible === 0 && {
                    {
                        $stories - > count()
                    }
                } > 0 && !noResults) {
                noResults = document.createElement("div");
                noResults.id = "noResults";
                noResults.className = "col-span-full text-center py-16";
                noResults.innerHTML = `
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-heritage-800 mb-4">
                    <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <p class="font-inter text-gray-400">Tidak ada cerita yang cocok dengan pencarian Anda</p>
            `;
                grid.appendChild(noResults);
            } else if (visible > 0 && noResults) {
                noResults.remove();
            }
        }

        buttons.forEach(btn => {
            btn.addEventListener("click", () => {
                activeFilter = btn.dataset.filter;

                buttons.forEach(b => {
                    b.classList.remove("active", "bg-gold-500", "text-black");
                    b.classList.add("bg-white/5", "text-gray-300", "border-transparent");
                });

                btn.classList.remove("bg-white/5", "text-gray-300", "border-transparent");
                btn.classList.add("active", "bg-gold-500", "text-black");

                filterStories();
            });
        });

        searchInput.addEventListener("input", filterStories);

        const style = document.createElement("style");
        style.textContent = `
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }
    `;
        document.head.appendChild(style);
    });
</script>
@endpush

