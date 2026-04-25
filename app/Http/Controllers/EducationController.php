<?php
namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Support\Facades\Cache;

class EducationController extends Controller
{
    /**
     * Tampilkan halaman utama edukasi
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {


        return view('education.index');
    }

    /**
     * Tampilkan section: Filosofi Budaya
     * 
     * @return \Illuminate\View\View
     */
    public function filosofi()
    {
        $filosofi = Cache::remember('education.filosofi', 3600, function () {
            return [
                // 🐛 Bugis Philosophy
                [
                    'id' => 'siri-na-pacce',
                    'judul' => 'Siri\' Na Pacce',
                    'kategori' => 'Bugis',
                    'icon' => 'heart',
                    'deskripsi' => 'Kehormatan diri (siri\') dan empati sosial (pacce) sebagai pondasi etika masyarakat Bugis.',
                    'quote' => 'Siri\' mateppi, pacce mappasitinjak.',
                    'quote_arti' => 'Harga diri yang dijunjung, solidaritas yang menguatkan.',
                    'penerapan' => [
                        'Dalam Cerita' => 'Membentuk keputusan tokoh La Galigo dalam menghadapi konflik kerajaan',
                        'Dalam Hidup' => 'Menjaga integritas pribadi sambil peduli pada sesama'
                    ],
                    'related_story' => 'la-galigo',
                    'related_scene' => [3, 7, 12]
                ],
                [
                    'id' => 'reso-na-bintang',
                    'judul' => 'Reso Na Bintang',
                    'kategori' => 'Bugis',
                    'icon' => 'star',
                    'deskripsi' => 'Kerja keras (reso) dan harapan (bintang) sebagai kunci meraih cita-cita.',
                    'quote' => 'Reso na bintang, mappadeceng na dewata.',
                    'quote_arti' => 'Usaha dan doa, diperindah oleh kehendak Ilahi.',
                    'penerapan' => [
                        'Dalam Cerita' => 'Perjuangan Sawerigading berlayar menembus badai',
                        'Dalam Hidup' => 'Kombinasi ikhtiar maksimal dan tawakkal'
                    ],
                    'related_story' => 'sawerigading',
                    'related_scene' => [5, 9]
                ],
                // 🏔️ Toraja Philosophy
                [
                    'id' => 'aluk-todolo',
                    'judul' => 'Aluk Todolo',
                    'kategori' => 'Toraja',
                    'icon' => 'mountain',
                    'deskripsi' => '"Jalan para leluhur": tatanan kehidupan yang menjaga harmoni manusia, alam, dan roh.',
                    'quote' => 'Bumi adalah ibu, langit adalah ayah.',
                    'quote_arti' => 'Manusia adalah penjaga keseimbangan antara keduanya.',
                    'penerapan' => [
                        'Dalam Cerita' => 'Ritual dan adat sebagai panduan keputusan tokoh',
                        'Dalam Hidup' => 'Menghormati tradisi sambil beradaptasi dengan zaman'
                    ],
                    'related_story' => 'legenda-toraja',
                    'related_scene' => [2, 6, 10]
                ],
                [
                    'id' => 'resi-ade',
                    'judul' => 'Resi\'na Ade\'na',
                    'kategori' => 'Umum',
                    'icon' => 'shield',
                    'deskripsi' => 'Kesetiaan pada janji dan tatanan adat sebagai sumber kekuatan moral.',
                    'quote' => 'Ade\'na mate, resi\'na mate.',
                    'quote_arti' => 'Jika adat mati, maka kesetiaan pun ikut mati.',
                    'penerapan' => [
                        'Dalam Cerita' => 'Konflik batin tokoh antara takdir dan kewajiban',
                        'Dalam Hidup' => 'Menepati janji sebagai cermin karakter'
                    ],
                    'related_story' => null,
                    'related_scene' => []
                ],
            ];
        });

        return view('education.sections.filosofi', compact('filosofi'));
    }

    /**
     * Tampilkan section: Nilai Kehidupan
     * 
     * @return \Illuminate\View\View
     */
    public function nilai()
    {
        $nilai = Cache::remember('education.nilai', 3600, function () {
            return [
                [
                    'id' => 'keberanian-takdir',
                    'judul' => 'Keberanian Menghadapi Takdir',
                    'sumber' => 'Epos Sawerigading',
                    'icon' => 'sword',
                    'color' => 'red',
                    'deskripsi' => 'Pahlawan tidak lari dari tanggung jawab. Sawerigading memilih berlayar ke negeri asing, menghadapi badai dan monster, demi menyelamatkan kerajaan.',
                    'pelajaran' => [
                        'Jangan takut memulai perjalanan baru',
                        'Tanggung jawab adalah bagian dari takdir',
                        'Keberanian bukan tanpa rasa takut, tapi bertindak meski takut'
                    ],
                    'refleksi_prompt' => 'Kapan terakhir kali Anda menghadapi pilihan sulit demi tanggung jawab?',
                    'related_story' => 'sawerigading',
                    'related_scene' => 5
                ],
                [
                    'id' => 'kesetiaan-pengorbanan',
                    'judul' => 'Kesetiaan & Pengorbanan',
                    'sumber' => 'La Galigo',
                    'icon' => 'heart-hand',
                    'color' => 'gold',
                    'deskripsi' => 'Cinta dan bakti kepada tanah air sering menuntut pengorbanan pribadi. Tokoh-tokoh La Galigo mengajarkan bahwa kebahagiaan kolektif lebih mulia.',
                    'pelajaran' => [
                        'Pengorbanan pribadi untuk kebaikan bersama',
                        'Cinta tanah air diwujudkan dalam tindakan nyata',
                        'Kesetiaan diuji dalam situasi sulit'
                    ],
                    'refleksi_prompt' => 'Apa yang rela Anda korbankan untuk orang/nilai yang Anda cintai?',
                    'related_story' => 'la-galigo',
                    'related_scene' => 8
                ],
                [
                    'id' => 'kepemimpinan-bijak',
                    'judul' => 'Kepemimpinan Bijaksana',
                    'sumber' => 'Legenda Toraja',
                    'icon' => 'crown',
                    'color' => 'purple',
                    'deskripsi' => 'Pemimpin sejati mendengarkan suara alam, menjaga adat, dan tidak memaksakan kehendak. Keputusan diambil melalui musyawarah.',
                    'pelajaran' => [
                        'Pemimpin adalah pelayan, bukan penguasa',
                        'Musyawarah lebih kuat daripada keputusan sepihak',
                        'Menjaga harmoni lebih penting daripada kemenangan pribadi'
                    ],
                    'refleksi_prompt' => 'Bagaimana Anda mengambil keputusan penting yang mempengaruhi orang lain?',
                    'related_story' => 'legenda-toraja',
                    'related_scene' => 4
                ],
                [
                    'id' => 'gotong-royong',
                    'judul' => 'Gotong Royong & Solidaritas',
                    'sumber' => 'Semua Cerita',
                    'icon' => 'users',
                    'color' => 'green',
                    'deskripsi' => 'Tidak ada tokoh yang berhasil sendirian. Kolaborasi lintas generasi dan status sosial menjadi kunci keberhasilan setiap misi.',
                    'pelajaran' => [
                        'Kebersamaan memperkuat individu',
                        'Setiap orang memiliki peran penting',
                        'Solidaritas adalah kekuatan budaya Nusantara'
                    ],
                    'refleksi_prompt' => 'Siapa "tim" yang mendukung Anda dalam mencapai tujuan?',
                    'related_story' => null,
                    'related_scene' => []
                ],
            ];
        });

        return view('education.sections.nilai', compact('nilai'));
    }

    /**
     * Tampilkan section: Makna Simbolik
     * 
     * @return \Illuminate\View\View
     */
    public function simbolik()
    {
        $simbol = Cache::remember('education.simbolik', 3600, function () {
            return [
                [
                    'id' => 'tongkonan',
                    'nama' => 'Rumah Tongkonan',
                    'kategori' => 'Arsitektur Toraja',
                    'image' => 'simbol-tongkonan.jpg',
                    'image_alt' => 'Rumah adat Tongkonan dengan atap melengkung',
                    'deskripsi' => 'Setiap bagian Tongkonan adalah peta kosmologi: atap = dunia atas (roh), badan rumah = dunia tengah (manusia), kolong = dunia bawah (alam).',
                    'makna_bagian' => [
                        'atap' => [
                            'label' => 'Atap Melengkung',
                            'makna' => 'Melambangkan tanduk kerbau (status spiritual) dan dunia atas tempat roh leluhur. Semakin banyak tingkatan, semakin tinggi status.'
                        ],
                        'tiang' => [
                            'label' => 'Tiang Utama (Possi)',
                            'makna' => 'Pusat energi spiritual, simbol hubungan vertikal manusia dengan leluhur dan Tuhan.'
                        ],
                        'lantai' => [
                            'label' => 'Lantai Rumah',
                            'makna' => 'Dunia fana tempat manusia hidup, bekerja, dan berinteraksi sosial.'
                        ],
                        'ukiran' => [
                            'label' => 'Ukiran (Pa\'ssura)',
                            'makna' => 'Setiap motif adalah doa, perlindungan, dan cerita yang diturunkan ke generasi berikut.'
                        ]
                    ],
                    'audio' => 'assets/audio/ambience-tongkonan.mp3',
                    'related_story' => 'legenda-toraja'
                ],
                [
                    'id' => 'phinisi',
                    'nama' => 'Perahu Phinisi',
                    'kategori' => 'Maritim Bugis',
                    'image' => 'simbol-phinisi.jpg',
                    'image_alt' => 'Perahu Phinisi dengan layar terkembang',
                    'deskripsi' => 'Phinisi bukan sekadar alat transportasi, tapi metafora perjalanan hidup: laut = kehidupan, layar = harapan, jangkar = iman.',
                    'makna_bagian' => [
                        'layar' => [
                            'label' => 'Layar Terkembang',
                            'makna' => 'Harapan, keberanian menghadapi ketidakpastian, dan kepercayaan pada takdir.'
                        ],
                        'laut' => [
                            'label' => 'Lautan Luas',
                            'makna' => 'Kehidupan dengan segala tantangan dan peluang yang tak terduga.'
                        ],
                        'jangkar' => [
                            'label' => 'Jangkar',
                            'makna' => 'Iman, prinsip, dan nilai yang membuat kita tetap teguh dalam badai.'
                        ],
                        'nahkoda' => [
                            'label' => 'Nahkoda',
                            'makna' => 'Diri sendiri sebagai pengambil keputusan dalam perjalanan hidup.'
                        ]
                    ],
                    'audio' => 'assets/audio/ocean-waves.mp3',
                    'related_story' => 'sawerigading'
                ],
                [
                    'id' => 'kain-bugis',
                    'nama' => 'Motif Kain Sarung Bugis',
                    'kategori' => 'Tekstil Tradisional',
                    'image' => 'simbol-kain-bugis.jpg',
                    'image_alt' => 'Detail motif geometris kain sarung Bugis',
                    'deskripsi' => 'Pola geometris bukan hiasan semata. Setiap garis, warna, dan bentuk menyimpan kode silsilah, status sosial, dan doa keselamatan.',
                    'makna_warna' => [
                        'merah' => ['hex' => '#8B0000', 'makna' => 'Keberanian, kekuatan, darah kehidupan'],
                        'kuning' => ['hex' => '#D4AF37', 'makna' => 'Kemuliaan, kebijaksanaan, cahaya Ilahi'],
                        'hijau' => ['hex' => '#2E7D32', 'makna' => 'Kesuburan, harapan, harmoni alam'],
                        'hitam' => ['hex' => '#1a1a1a', 'makna' => 'Kekuatan misterius, perlindungan, kedalaman']
                    ],
                    'makna_motif' => [
                        'balo renreng' => 'Motif garis lurus = keteguhan hati dan jalur hidup yang lurus',
                        'balo lobang' => 'Motif kotak = keteraturan dunia dan keseimbangan',
                        'balo bintang' => 'Motif bintang = petunjuk, harapan, dan bimbingan leluhur'
                    ],
                    'related_story' => 'la-galigo'
                ],
                [
                    'id' => 'pa-tedong',
                    'nama' => 'Pa\'tedong (Kerbau)',
                    'kategori' => 'Simbol Ritual Toraja',
                    'image' => 'simbol-kerbau.jpg',
                    'image_alt' => 'Kerbau Toraja dengan tanduk melengkung',
                    'deskripsi' => 'Kerbau bukan sekadar hewan ternak, tapi mediator antara dunia manusia dan roh leluhur. Simbol pengorbanan suci dan penjaga keseimbangan kosmis.',
                    'makna_ritual' => [
                        'pengorbanan' => 'Wujud penghormatan tertinggi kepada leluhur',
                        'status' => 'Jumlah dan kualitas kerbau menunjukkan status sosial keluarga',
                        'keseimbangan' => 'Pengorbanan menjaga harmoni antara alam nyata dan gaib'
                    ],
                    'audio' => 'assets/audio/ritual-gendang.mp3',
                    'audio_label' => 'Suara gendang ritual Rambu Solo\'',
                    'related_story' => 'legenda-toraja'
                ],
            ];
        });

        return view('education.sections.simbolik', compact('simbol'));
    }

    /**
     * Tampilkan koneksi: Edukasi → Scene Cerita Spesifik
     * 
     * @param  string  $storySlug
     * @return \Illuminate\View\View
     */
    public function koneksi($storySlug)
    {
        $story = Story::where('slug', $storySlug)->with(['scenes' => function ($q) {
            $q->orderBy('order')->select('id', 'story_id', 'order', 'title', 'has_educational_note');
        }])->firstOrFail();

        // Ambil scene yang memiliki catatan edukatif
        $educationalScenes = $story->scenes->filter(fn($s) => $s->has_educational_note ?? false);

        $koneksi = [
            'la-galigo' => [
                'judul' => 'Koneksi: La Galigo & Nilai Budaya',
                'deskripsi' => 'Jelajahi bagaimana filosofi Bugis terwujud dalam adegan-adegan kunci epos La Galigo.',
                'highlight_scenes' => [
                    3 => [
                        'title' => 'Musyawarah Kerajaan',
                        'nilai' => 'Siri\' Na Pacce',
                        'penjelasan' => 'Adegan ini menunjukkan bagaimana keputusan penting diambil melalui musyawarah, mencerminkan nilai solidaritas dan penghormatan pada pendapat bersama.'
                    ],
                    7 => [
                        'title' => 'Sawerigading Berangkat',
                        'nilai' => 'Reso Na Bintang',
                        'penjelasan' => 'Keberanian Sawerigading meninggalkan kenyamanan kerajaan mencerminkan filosofi kerja keras dan harapan dalam meraih takdir.'
                    ],
                    12 => [
                        'title' => 'Kepulangan Pahlawan',
                        'nilai' => 'Kesetiaan & Pengorbanan',
                        'penjelasan' => 'Pengorbanan pribadi Sawerigading demi keselamatan kerajaan mengajarkan bahwa kebahagiaan kolektif lebih mulia.'
                    ]
                ]
            ],
            'sawerigading' => [
                'judul' => 'Koneksi: Sawerigading & Perjalanan Hidup',
                'deskripsi' => 'Setiap tantangan dalam pelayaran Sawerigading adalah metafora perjalanan spiritual manusia.',
                'highlight_scenes' => [
                    5 => [
                        'title' => 'Badai di Laut Lepas',
                        'nilai' => 'Keberanian Menghadapi Takdir',
                        'penjelasan' => 'Badai melambangkan ujian hidup. Sikap Sawerigading yang tetap tenang dan percaya pada takdir mengajarkan ketabahan.'
                    ],
                    9 => [
                        'title' => 'Pertemuan dengan Penunjuk Jalan',
                        'nilai' => 'Gotong Royong',
                        'penjelasan' => 'Bantuan dari tokoh misterius menunjukkan bahwa tidak ada perjalanan yang ditempuh sendirian; solidaritas lintas batas adalah kekuatan.'
                    ]
                ]
            ],
            'legenda-to-manurung' => [
                'judul' => 'Koneksi: To Manurung & Filosofi Siri\' na Pacce',
                'deskripsi' => 'Setiap ritual dan keputusan dalam cerita mencerminkan prinsip masyarakat Bugis-Makassar: menjaga martabat (siri\'), solidaritas (pacce), dan harmoni antara manusia, alam, serta Dewata.',
                'highlight_scenes' => [
                    2 => [
                        'title' => 'Ritual Mappalili',
                        'nilai' => 'Harmoni dengan Dewata',
                        'penjelasan' => 'Ritual menjelang musim tanam sebagai wujud permohonan berkah kepada Dewata, menegaskan bahwa kemakmuran manusia bergantung pada keseimbangan kosmis dan kepatuhan pada hukum alam.'
                    ],
                    6 => [
                        'title' => 'Musyawarah Ade\'',
                        'nilai' => 'Siri\' na Pacce',
                        'penjelasan' => 'Forum adat yang mengutamakan kesepakatan kolektif mencerminkan prinsip harga diri (siri\') dan rasa sepenanggungan (pacce), fondasi kepemimpinan yang adil dan berdaulat.'
                    ],
                    10 => [
                        'title' => 'Upacara Penobatan Arung',
                        'nilai' => 'Mandat Ilahi & Tanggung Jawab Sosial',
                        'penjelasan' => 'Ritual pengukuhan pemimpin yang diyakini sebagai keturunan To Manurung menegaskan mandat suci untuk menegakkan keadilan, menjaga tatanan adat, dan menjadi penjaga keseimbangan alam semesta.'
                    ]
                ]
            ]
        ];

        $data = $koneksi[$storySlug] ?? [
            'judul' => "Koneksi: {$story->title}",
            'deskripsi' => 'Jelajahi nilai-nilai budaya yang terintegrasi dalam cerita ini.',
            'highlight_scenes' => []
        ];

        return view('education.sections.koneksi', compact('story', 'data', 'educationalScenes'));
    }

    /**
     * API: Ambil data edukasi untuk frontend dynamic loading
     * 
     * @param  string  $section
     * @return \Illuminate\Http\JsonResponse
     */
    public function api($section)
    {
        $allowed = ['filosofi', 'nilai', 'simbolik'];

        if (!in_array($section, $allowed)) {
            return response()->json(['error' => 'Section tidak valid'], 400);
        }

        $data = Cache::remember("education.api.{$section}", 1800, function () use ($section) {
            return match ($section) {
                'filosofi' => $this->getFilosofiData(),
                'nilai' => $this->getNilaiData(),
                'simbolik' => $this->getSimbolData(),
                default => []
            };
        });

        return response()->json($data);
    }

    private function getFilosofiCount(): int
    {
        // Bisa diganti dengan query database jika data disimpan di DB
        return 4;
    }

    private function getNilaiCount(): int
    {
        return 4;
    }

    private function getSimbolCount(): int
    {
        return 4;
    }

    private function getFilosofiData(): array
    {
        // Return data untuk API endpoint
        return collect($this->filosofi())->map(fn($f) => [
            'id' => $f['id'],
            'judul' => $f['judul'],
            'kategori' => $f['kategori'],
            'deskripsi' => $f['deskripsi'],
            'related_story' => $f['related_story']
        ])->toArray();
    }

    private function getNilaiData(): array
    {
        return collect($this->nilai())->map(fn($n) => [
            'id' => $n['id'],
            'judul' => $n['judul'],
            'sumber' => $n['sumber'],
            'deskripsi' => $n['deskripsi'],
            'pelajaran' => $n['pelajaran']
        ])->toArray();
    }

    private function getSimbolData(): array
    {
        return collect($this->simbolik())->map(fn($s) => [
            'id' => $s['id'],
            'nama' => $s['nama'],
            'kategori' => $s['kategori'],
            'image' => $s['image'],
            'deskripsi' => $s['deskripsi']
        ])->toArray();
    }
}
