@php
    // Variabel yang sudah ada
    $mempelaiPria = 'Fuad';
    $mempelaiWanita = 'Sindi';

    // --- DATA DETAIL BARU UNTUK ANDA ISI ---
    $namaLengkapPria = 'Fuad Khasan';
    $putraKePria = 'Putra dari';
    $bapakPria = 'Bapak Sariman';
    $ibuPria = 'Ibu Sriyatun';

    $namaLengkapWanita = 'Sindi Ni\'am Muzakki';
    $putriKeWanita = 'Putri dari';
    $bapakWanita = 'Bapak Slamet';
    $ibuWanita = 'Ibu Umi Hajar Aswarotin';

    // --- DATA BARU UNTUK ACARA AKAD NIKAH ---
    $tanggalAcara = '2025-08-10'; // Format: TAHUN-BULAN-TANGGAL
    $waktuAcara = 'Pukul 09:00 WIB - Selesai';
    $namaLokasi = ' Rumah Mempelai Wanita';
    $alamatLokasi = 'Grengseng Rt 05, Ds. Poleng, Kec. Gesi, Kab. Sragen, 57262';


    $loveStory = [
        [
            'date' => 'Agustus 2024',
            'title' => 'Menjalin Hubungan',
            'description' => 'Setelah saling mengenal sebagai teman, kami menyadari ada koneksi yang kuat dan memutuskan untuk menjalin hubungan yang lebih serius.',
        ],
        [
            'date' => 'Oktober 2024',
            'title' => 'Restu Keluarga',
            'description' => 'Dengan penuh harapan, kedua keluarga kami bertemu dan memberikan restu yang tulus untuk kami melangkah ke jenjang pernikahan.',
        ],
        [
            'date' => '10 Agustus 2025',
            'title' => 'Hari Pernikahan',
            'description' => 'Saat di mana kami akan mengucap janji suci untuk selamanya dan memulai petualangan hidup baru sebagai suami dan istri.',
        ],
    ];

    $rekeningBank = [
        [
            'bank' => 'Mandiri',
            'logo' => asset('/images/logos/mandiri.png'),
            'nomor' => '1380022296474',
            'nama' => 'Sindi Ni\'am Muakki'
        ],
        [
            'bank' => 'BRI',
            'logo' => asset('/images/logos/BRI.png'),
            'nomor' => '014001111809505',
            'nama' => 'Fuad Khasan'
        ],
    ];
    // Link untuk tombol "Lihat Lokasi" (dari Google Maps -> Share -> Copy link)
    $linkGoogleMaps = 'https://goo.gl/maps/SKah3Wvix6NCPULw5';

    // Link untuk peta yang disematkan (dari Google Maps -> Share -> Embed a map -> Copy HTML)
    // Ambil hanya bagian 'src' dari dalam tag <iframe>
    $embedGoogleMaps = 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d9411.922315835269!2d111.00600231748764!3d-7.328509851088607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMTknNDAuOSJTIDExMcKwMDAnNDkuMyJF!5e0!3m2!1sid!2sid!4v1751037789167!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"';
@endphp

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ $mempelaiWanita }} & {{ $mempelaiPria }}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/ornaments/rings.png') }}" type="image/png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@700&family=Tangerine:wght@700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #F5F5F4;   }
        .font-serif-display { font-family: 'Playfair Display', serif; }
        .font-script { font-family: 'Tangerine', cursive; }
        #detail-undangan { display: none; }
        .gsap-acara-top-center {
            position: absolute;
            top: 5rem; /* 80px = 20 * 4px */
            left: 50%;
            transform: translateX(-50%);
            width: 30%;
            z-index: 30;
            pointer-events: none;
        }
        #acara {
            position: relative;
        }
        .gsap-acara-ornament {
            opacity: 0;
        }
        .font-arabic {
            font-family: 'Amiri', serif;
        }
        .custom-radio-label input:checked + .custom-radio-dot {
            transform: scale(1);
            opacity: 1;
        }
    </style>
</head>
<body>
    <audio id="background-music" src="{{ asset('music/music.mp3') }}" loop></audio>
    <div id="landing" class="h-screen w-full overflow-hidden">
        <div class="relative w-full max-w-md h-full bg-orange-50 shadow-2xl mx-auto overflow-hidden" style="background-image: url('{{ asset('/images/ornaments/2.png') }}'); background-size: cover;">
            <img src="{{ asset('/images/ornaments/7.png') }}" class="gsap-anim gsap-ornament-layer-1 absolute -top-2 -left-2 w-[43%] z-10 pointer-events-none" alt="">
            <img src="{{ asset('/images/ornaments/8.png') }}" class="gsap-anim gsap-ornament-layer-1 absolute -top-2 -right-2 w-[43%] z-10 pointer-events-none" alt="">
            <img src="{{ asset('/images/ornaments/4.png') }}" class="gsap-anim gsap-ornament-layer-2 absolute -top-3 -left-3 w-[45%] z-10 pointer-events-none gsap-loop-4" alt="">
            <img src="{{ asset('/images/ornaments/5.png') }}" class="gsap-anim gsap-ornament-layer-2 absolute -top-2 right-0 w-[45%] z-10 pointer-events-none gsap-loop-5" alt="">
            <img src="{{ asset('/images/ornaments/6.png') }}" class="gsap-anim gsap-ornament-flower absolute top-0 left-1/2 -translate-x-1/2 w-[50%] z-20 pointer-events-none gsap-loop-flower" alt="">
            <img src="{{ asset('/images/ornaments/3.png') }}" class="gsap-anim gsap-ornament-bottom absolute bottom-0 left-0 w-full z-10 pointer-events-none gsap-loop-bottom" alt="">
            <img src="{{ asset('/images/ornaments/wayang1.png') }}" class="gsap-anim gsap-wayang-side absolute bottom-[-50px] left-2 -translate-y-1/2 h-[30%] z-0 pointer-events-none opacity-78" alt="">
            <img src="{{ asset('/images/ornaments/wayang2.png') }}" class="gsap-anim gsap-wayang-side absolute bottom-[-50px] right-2 -translate-y-1/2 h-[30%] z-0 pointer-events-none opacity-78" alt="">
            <img src="{{ asset('images/ornaments/mempelai-icon.png') }}" class="gsap-anim gsap-mempelai-icon absolute bottom-30 left-1/2  h-[30%] sm:h-[35%] pointer-events-none" alt="Icon Mempelai">

            <div class="relative z-30 text-center flex flex-col items-center justify-center h-full w-full p-6">
                <p class="gsap-anim gsap-text font-serif-display text-lg text-stone-600">The Wedding Of</p>
                <h1 class="gsap-anim gsap-names font-script text-6xl sm:text-7xl text-amber-900 leading-tight font-bold" style="text-shadow: 1px 1px 3px rgba(120, 53, 15, 0.5);">{{ $mempelaiWanita }} & {{ $mempelaiPria }}</h1>
                <img src="{{ asset('/images/ornaments/rings.png') }}" alt="Cincin Pernikahan" class="gsap-anim gsap-rings w-20 h-auto mb-10 drop-shadow gsap-loop-rings">

                <div class="gsap-anim gsap-guest w-full my-4 px-4">
                    <div class="border border-white/20 bg-black/5 rounded-xl p-4 max-w-xs mx-auto">
                        <p class="text-base text-stone-200" style="text-shadow: 1px 1px 4px rgba(0,0,0,0.7);">
                            Kepada Yth. Bapak/Ibu/Saudara/i:
                        </p>
                        <p class="text-2xl font-bold text-white mt-1 break-words" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">
                            {{ $namaTamu }}
                        </p>
                    </div>
                </div>

                <button id="buka-undangan-btn" class="gsap-anim gsap-button bg-amber-800 text-white font-semibold px-8 py-3 rounded-full shadow-lg hover:bg-amber-900 transition-colors duration-300 mt-4 flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path d="M3 4a2 2 0 0 0-2 2v1.161l8.441 4.221a1.25 1.25 0 0 0 1.118 0L19 7.162V6a2 2 0 0 0-2-2H3Z" />
                        <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 0 1-2.46 0L1 8.839V14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8.839Z" />
                    </svg>
                    <span>Buka Undangan</span>
                </button>
            </div>
        </div>
    </div>

    <div id="detail-undangan" class="relative w-full max-w-md h-full bg-orange-50 shadow-2xl mx-auto">
        <div class="container mx-auto max-w-4xl  text-center text-stone-700 ">
            <section id="profile" class="min-h-screen relative overflow-hidden flex items-center justify-center p-4 sm:p-6">
                <div class="absolute inset-0 w-full h-full">
                    <img src="{{ asset('/images/decoration/awankiri.png') }}" class="gsap-ornament gsap-cloud-left absolute top-[10%] left-[-5%] w-[40%] opacity-80 z-10 pointer-events-none">
                    <img src="{{ asset('/images/decoration/awankanan.png') }}" class="gsap-ornament gsap-cloud-right absolute top-[15%] right-[-5%] w-[40%] opacity-80 z-10 pointer-events-none">
                    <img src="{{ asset('/images/decoration/wayangkiri.png') }}" class="gsap-ornament gsap-wayang-left absolute bottom-0 -left-15 w-[35%] sm:w-[30%] z-25  pointer-events-none">
                    <img src="{{ asset('/images/decoration/wayangkanan.png') }}" class="gsap-ornament gsap-wayang-right absolute bottom-0 -right-15 w-[35%] sm:w-[30%] z-25  pointer-events-none">
                    <img src="{{ asset('/images/decoration/ataskiri.png') }}" class="gsap-ornament gsap-corner-top-left absolute top-0 left-0 w-[45%] z-30 pointer-events-none">
                    <img src="{{ asset('/images/decoration/ataskanan.png') }}" class="gsap-ornament gsap-corner-top-right absolute top-0 right-0 w-[45%] z-30 pointer-events-none">
                    <img src="{{ asset('/images/decoration/tengah.png') }}" class="gsap-ornament gsap-top-center absolute top-50 left-1/2 -translate-x-1/2 w-[30%] z-30 pointer-events-none">
                    <img src="{{ asset('/images/decoration/bawah.png') }}" class="gsap-ornament gsap-bottom-center absolute bottom-0 left-1/2 -translate-x-1/2 w-full max-w-md z-30 pointer-events-none">
                </div>

                <div class="gsap-profile-card relative w-full max-w-md bg-white/25 backdrop-blur-lg rounded-3xl shadow-2xl border border-white/30 pt-24 pb-10 px-6 sm:px-8 text-center z-20">
                    <h2 class="font-serif-display text-3xl sm:text-4xl text-amber-900" style="text-shadow: 1px 1px 3px rgba(120, 53, 15, 0.2);">Assalamu'alaikum Wr. Wb.</h2>
                    <p class="mt-2 max-w-xl mx-auto text-xs sm:text-sm leading-relaxed text-stone-600">Dengan memohon rahmat dan ridho Allah SWT, kami akan menyelenggarakan pernikahan:</p>

                    <div class="mt-8 flex flex-col gap-4">
                        <div>
                            <h3 class="font-script text-4xl sm:text-5xl text-amber-900">{{ $namaLengkapWanita }}</h3>
                            <p class="mt-1 text-sm font-semibold text-stone-700">{{ $putriKeWanita }}</p>
                            <p class="text-xs text-stone-600">{{ $bapakWanita }} & {{ $ibuWanita }}</p>
                        </div>
                        <p class="font-script text-4xl text-amber-800 my-2">&</p>
                        <div>
                            <h3 class="font-script text-4xl sm:text-5xl text-amber-900">{{ $namaLengkapPria }}</h3>
                            <p class="mt-1 text-sm font-semibold text-stone-700">{{ $putraKePria }}</p>
                            <p class="text-xs text-stone-600">{{ $bapakPria }} & {{ $ibuPria }}</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="ayat-suci-v2" class="relative bg-stone-800 text-white py-24 px-4 overflow-hidden">
                <div class="absolute inset-0 z-0 opacity-40">
                    <img src="{{ asset('images/decoration/ataskiri.png') }}" class="gsap-ayat-v2-corner absolute top-0 left-0 w-1/2 md:w-1/3">
                    <img src="{{ asset('images/decoration/ataskanan.png') }}" class="gsap-ayat-v2-corner absolute top-0 right-0 w-1/2 md:w-1/3">
                    <img src="{{ asset('images/decoration/awankiri.png') }}" class="gsap-ayat-v2-awan absolute top-1/4 -left-10 w-1/3 md:w-1/4">
                    <img src="{{ asset('images/decoration/awankanan.png') }}" class="gsap-ayat-v2-awan absolute top-1/3 -right-10 w-1/3 md:w-1/4">
                </div>
                <div class="relative z-10 max-w-3xl mx-auto text-center grid place-items-center">
                    <img src="{{ asset('images/decoration/tengah.png') }}" class="gsap-ayat-v2-gunungan col-start-1 row-start-1 w-full max-w-sm opacity-30">
                    <blockquote class="col-start-1 row-start-1 p-4">
                        <p dir="rtl" class="gsap-ayat-v2-arabic font-arabic text-3xl md:text-4xl leading-loose text-stone-100 mb-8" style="text-shadow: 0px 2px 8px rgba(0,0,0,0.7);">
                            وَمِنْ ءَايَٰتِهِۦٓ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَٰجًا لِّتَسْكُنُوٓا۟ إِلَيْهَا وَجَعَلَ بَيْنَكُم مَّوَدَّةً وَرَحْمَةً ۚ إِنَّ فِى ذَٰلِكَ لَءَايَٰتٍ لِّقَوْمٍ يَتَفَكَّرُونَ
                        </p>
                        <p class="gsap-ayat-v2-translation font-serif-display text-xl md:text-2xl leading-relaxed text-stone-200" style="text-shadow: 0px 2px 8px rgba(0,0,0,0.7);">
                            “Dan di antara tanda-tanda kebesaran-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.”
                        </p>
                        <footer class="gsap-ayat-v2-source mt-8 text-base text-stone-300" style="text-shadow: 0px 2px 8px rgba(0,0,0,0.7);">
                            (Qs. Ar-Rum: 21)
                        </footer>
                    </blockquote>
                </div>
            </section>

            <section id="acara" class="relative min-h-screen text-center bg-orange-50 py-20 px-4 sm:px-6 overflow-hidden">
                <div class="absolute inset-0 w-full h-full">
                    <img src="{{ asset('/images/decoration/ataskiri.png') }}" class="gsap-acara-ornament gsap-acara-corner-tl absolute top-0 left-0 w-[35%] z-10 pointer-events-none">
                    <img src="{{ asset('/images/decoration/ataskanan.png') }}" class="gsap-acara-ornament gsap-acara-corner-tr absolute top-0 right-0 w-[35%] z-10 pointer-events-none">
                    <img src="{{ asset('/images/decoration/tengah.png') }}" class="gsap-acara-ornament gsap-acara-top-center absolute top-20  w-[30%] z-30 pointer-events-none">
                    <img src="{{ asset('/images/decoration/awankiri.png') }}" class="gsap-acara-ornament gsap-acara-awan-kiri absolute top-[15%] left-[-5%] w-[30%] sm:w-[20%] z-10 pointer-events-none opacity-60">
                    <img src="{{ asset('/images/decoration/awankanan.png') }}" class="gsap-acara-ornament gsap-acara-awan-kanan absolute top-[15%] right-[-5%] w-[30%] sm:w-[20%] z-10 pointer-events-none opacity-60">
                    <img src="{{ asset('/images/decoration/wayangkiri.png') }}" class="gsap-acara-ornament gsap-acara-wayang-kiri absolute bottom-0 -left-15 w-[30%] z-30 pointer-events-none">
                    <img src="{{ asset('/images/decoration/wayangkanan.png') }}" class="gsap-acara-ornament gsap-acara-wayang-kanan absolute bottom-0 -right-15 w-[30%] z-30 pointer-events-none">
                    <img src="{{ asset('/images/decoration/bawah.png') }}" class="gsap-acara-ornament gsap-acara-bottom-center absolute bottom-0 left-1/2 -translate-x-1/2 w-full max-w-lg z-30 pointer-events-none opacity-80">
                </div>

                <div class="gsap-acara-card relative z-20 bg-white/25 backdrop-blur-md p-6 sm:p-10 rounded-2xl shadow-xl max-w-2xl mx-auto text-center">
                    <p class="max-w-md mx-auto text-stone-600 leading-relaxed">
                        Dengan segala kerendahan hati kami berharap kehadiran Bapak/Ibu/Saudara/i dalam acara pernikahan kami yang akan diselenggarakan pada:
                    </p>
                    <h3 class="font-script text-5xl sm:text-6xl text-amber-900 mt-8 mb-4">Akad Nikah</h3>
                    <img src="{{ asset('/images/ornaments/rings.png') }}" alt="Cincin Pernikahan" class="w-16 h-auto mx-auto drop-shadow-lg my-4">

                    <div class="flex flex-col items-center gap-2 my-6">
                        <div class="flex justify-center items-center gap-4 sm:gap-6 text-stone-700 font-semibold">
                            <p class="text-lg w-24 text-right">{{ \Carbon\Carbon::parse($tanggalAcara)->locale('id')->isoFormat('dddd') }}</p>
                            <div class="border-l-2 border-r-2 border-stone-300 px-4 sm:px-6">
                                <p class="text-5xl font-sans font-bold text-amber-900">{{ \Carbon\Carbon::parse($tanggalAcara)->isoFormat('D') }}</p>
                            </div>
                            <p class="text-lg w-24 text-left">{{ \Carbon\Carbon::parse($tanggalAcara)->locale('id')->isoFormat('MMMM') }}</p>
                        </div>
                        <p class="text-2xl font-semibold text-stone-700">{{ \Carbon\Carbon::parse($tanggalAcara)->locale('id')->isoFormat('Y') }}</p>
                    </div>
                    <p class="text-xl font-bold text-amber-800">{{ $waktuAcara }}</p>

                    <hr class="border-t border-stone-300/80 my-8">

                    <div>
                        <p class="font-serif-display text-xl text-stone-700">Menuju Hari Bahagia</p>
                        <div class="flex justify-center items-center gap-3 sm:gap-4 mt-4 text-white">
                            <div class="bg-amber-800/90 w-16 h-16 sm:w-20 sm:h-20 rounded-lg flex flex-col justify-center items-center shadow-md"><span id="days" class="text-2xl sm:text-3xl font-bold">00</span><span class="text-xs">Hari</span></div>
                            <div class="bg-amber-800/90 w-16 h-16 sm:w-20 sm:h-20 rounded-lg flex flex-col justify-center items-center shadow-md"><span id="hours" class="text-2xl sm:text-3xl font-bold">00</span><span class="text-xs">Jam</span></div>
                            <div class="bg-amber-800/90 w-16 h-16 sm:w-20 sm:h-20 rounded-lg flex flex-col justify-center items-center shadow-md"><span id="minutes" class="text-2xl sm:text-3xl font-bold">00</span><span class="text-xs">Menit</span></div>
                            <div class="bg-amber-800/90 w-16 h-16 sm:w-20 sm:h-20 rounded-lg flex flex-col justify-center items-center shadow-md"><span id="seconds" class="text-2xl sm:text-3xl font-bold">00</span><span class="text-xs">Detik</span></div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h4 class="font-script text-4xl text-amber-900">Lokasi Acara</h4>
                        <p class="font-semibold text-lg mt-2">{{ $namaLokasi }}</p>
                        <p class="max-w-xs mx-auto text-sm text-stone-600">{{ $alamatLokasi }}</p>
                    </div>

                    <div class="mt-8">
                        <a href="{{ $linkGoogleMaps }}" target="_blank" class="inline-block bg-amber-800 text-white font-semibold px-8 py-3 rounded-full shadow-lg hover:bg-amber-900 transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-map-marker-alt mr-2"></i>Lihat Peta
                        </a>
                        <div class="mt-8 w-full rounded-xl overflow-hidden border-4 border-white shadow-lg">
                            <iframe
                                src="{{ $embedGoogleMaps }}"
                                width="100%"
                                height="350"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </section>

           <section id="modern-love-story" class="py-24 px-4 sm:px-6 overflow-hidden bg-orange-50">
                <div class="max-w-4xl mx-auto">
                    <div class="text-center mb-16">
                        <h2 class="gsap-modern-lovestory-title font-serif-display text-4xl md:text-5xl text-amber-900">
                            Our Love Story
                        </h2>
                        <p class="gsap-modern-lovestory-p mt-4 max-w-xl mx-auto text-stone-600">
                            Perjalanan kami, sebuah babak baru yang tertulis oleh takdir, kini berlabuh pada janji suci.
                        </p>
                    </div>

                    @php
                        $storyImages = [
                            asset('images/decoration/tengah.png'),
                            asset('images/decoration/wayangkanan.png'),
                            asset('images/decoration/wayangkiri.png'),
                        ];
                    @endphp

                    <div class="flex flex-col gap-16 md:gap-24">
                        @foreach ($loveStory as $index => $story)
                            @if ($index % 2 === 0)
                                <div class="story-card flex flex-col md:flex-row items-center gap-8">
                                    <div class="image-container w-full md:w-5/12 p-6 md:p-8 flex justify-center items-center bg-stone-200/50 rounded-2xl min-h-[250px] md:min-h-[300px]">
                                        <img src="{{ $storyImages[$index % count($storyImages)] }}" alt="Ornamen Cerita {{ $index + 1 }}" class="w-2/3 md:w-full h-auto object-contain">
                                    </div>
                                    <div class="text-container w-full md:w-7/12 text-left md:text-left">
                                        <span class="block text-amber-800 font-semibold text-lg">{{ $story['date'] }}</span>
                                        <h3 class="font-serif-display text-3xl md:text-4xl text-stone-800 mt-2">{{ $story['title'] }}</h3>
                                        <p class="text-base mt-4 text-stone-600 leading-relaxed">{{ $story['description'] }}</p>
                                    </div>
                                </div>
                            @else
                                <div class="story-card flex flex-col md:flex-row-reverse items-center gap-8">
                                    <div class="image-container w-full md:w-5/12 p-6 md:p-8 flex justify-center items-center bg-stone-200/50 rounded-2xl min-h-[250px] md:min-h-[300px]">
                                        <img src="{{ $storyImages[$index % count($storyImages)] }}" alt="Ornamen Cerita {{ $index + 1 }}" class="w-2/3 md:w-full h-auto object-contain">
                                    </div>
                                    <div class="text-container w-full md:w-7/12 text-left md:text-left">
                                        <span class="block text-amber-800 font-semibold text-lg">{{ $story['date'] }}</span>
                                        <h3 class="font-serif-display text-3xl md:text-4xl text-stone-800 mt-2">{{ $story['title'] }}</h3>
                                        <p class="text-base mt-4 text-stone-600 leading-relaxed">{{ $story['description'] }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>

            <section id="hadiah-terakhir" class="relative bg-orange-50 py-19 px-4 overflow-hidden">
                <div class="absolute inset-0 z-0">
                    <img src="{{ asset('images/decoration/ataskiri.png') }}" class="gsap-final-ornament absolute top-0 left-0 w-[35%]">
                    <img src="{{ asset('images/decoration/ataskanan.png') }}" class="gsap-final-ornament absolute top-0 right-0 w-[35%]">

                    <img src="{{ asset('images/decoration/awankiri.png') }}" class="gsap-hadiah-akhir-ornament absolute top-0 -left-1/4 w-2/3 opacity-30">
                    <img src="{{ asset('images/decoration/awankanan.png') }}" class="gsap-hadiah-akhir-ornament absolute bottom-0 -right-1/4 w-2/3 opacity-30">
                    <img src="{{ asset('/images/decoration/bawah.png') }}" class="gsap-hadiah-akhir-ornament  absolute bottom-0 left-1/2 -translate-x-1/2 w-full max-w-lg z-30 pointer-events-none">
                </div>

                <div class="relative z-10 text-center max-w-4xl mx-auto">
                    <h2 class="gsap-hadiah-akhir-title font-serif-display text-5xl text-amber-900" style="text-shadow: 1px 1px 3px rgba(120, 53, 15, 0.2);">
                        Tanda Kasih
                    </h2>
                    <p class="gsap-hadiah-akhir-p mt-4 max-w-xl mx-auto text-stone-600">
                        Doa restu Anda merupakan karunia yang sangat berarti bagi kami. Namun jika memberi adalah ungkapan tanda kasih, Anda dapat melakukannya melalui tautan berikut.
                    </p>

                    <div class="mt-12 flex flex-col items-center gap-8">
                        @foreach ($rekeningBank as $rekening)
                            <div class="w-full max-w-md mx-auto">
                                <div class="gsap-hadiah-akhir-card relative transform transition duration-500 hover:scale-[1.015] hover:-translate-y-1">
                                    <div class="relative w-full aspect-video bg-white rounded-2xl shadow-lg p-6 flex flex-col justify-between ring-1 ring-stone-200 text-gray-800">

                                        <!-- Header: Icon & Bank -->
                                        <div class="flex justify-between items-start">
                                            <img src="{{ asset('images/logos/pin.png') }}" alt="Pin" class=" w-14 h-14">
                                            <img src="{{ $rekening['logo'] }}" alt="Logo {{ $rekening['bank'] }}" class="h-16 object-contain drop-shadow-sm">
                                        </div>

                                        <!-- Nomor Rekening -->
                                        <div class="mt-4">
                                            <p class="text-2xl lg:text-3xl tracking-widest font-mono text-slate-900 whitespace-nowrap overflow-x-auto" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">
                                                {{ trim(chunk_split($rekening['nomor'], 4, ' ')) }}
                                            </p>
                                        </div>

                                        <!-- Nama & Icon -->
                                        <div class="mt-3 flex justify-between items-center">
                                            <p class="text-lg font-semibold uppercase tracking-wide text-slate-800">{{ $rekening['nama'] }}</p>
                                            <svg class="w-8 h-8 text-amber-900/80" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="2.5" stroke="currentColor" fill="none">
                                                <path d="M25.46,32a6.49,6.49,0,0,1,6.49-6.49" />
                                                <path d="M25.46,32a12.3,12.3,0,0,1,12.3-12.3" />
                                                <path d="M25.46,32a18.12,18.12,0,0,1,18.12-18.12" />
                                            </svg>
                                        </div>

                                        <!-- Salin Button -->
                                        <button data-rekening-nomor="{{ $rekening['nomor'] }}" class="mt-5 w-full bg-amber-700 hover:bg-amber-800 text-white font-semibold py-2.5 rounded-xl shadow-md transition hover:shadow-lg text-sm tracking-wide">
                                            Salin Nomor
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="w-full max-w-md mx-auto">
                            <div class="gsap-hadiah-akhir-card relative bg-white/70 dark:bg-white/10 backdrop-blur-xl border border-white/20 shadow-xl rounded-2xl overflow-hidden transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl">

                                <!-- Header -->
                                <div class="p-8 pb-0 text-center">
                                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-amber-100 shadow-inner">
                                        <svg class="h-8 w-8 text-amber-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H7.5a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A3.375 3.375 0 006.375 8.25v2.25H17.625v-2.25A3.375 3.375 0 0012 4.875z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18.75h12M6 15h12" />
                                        </svg>
                                    </div>

                                    <h3 class="mt-6 text-2xl font-serif-display text-amber-900 tracking-wide">
                                        Kirim Hadiah
                                    </h3>
                                </div>

                                <!-- Body -->
                                <div class="p-8 text-center space-y-4">
                                    <div class="text-stone-700">
                                        <p class="text-sm">Untuk:</p>
                                        <p class="mt-1 text-lg font-semibold text-stone-900">{{ $namaLengkapWanita }}</p>
                                    </div>

                                    <div class="text-sm text-stone-600 bg-white/80 border border-stone-200 rounded-lg p-4 leading-relaxed">
                                        {{ $alamatLokasi }}
                                    </div>
                                </div>

                                <!-- Footer Button -->
                                <div class="bg-white/60 px-6 py-4 border-t border-stone-200">
                                    <button data-alamat="{{ $alamatLokasi }}" class="salin-btn-alamat group flex w-full items-center justify-center gap-3 bg-amber-800 hover:bg-amber-900 text-white font-medium py-3 px-6 rounded-lg shadow-lg transition-all duration-300 hover:shadow-amber-900/40">
                                        <svg class="h-5 w-5 opacity-80 transition-transform duration-300 group-hover:scale-110" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.353-.026.692-.026 1.038 0 .346.026.685.026 1.038 0 1.13.094 1.976 1.057 1.976 2.192V7.5M8.25 7.5h7.5M8.25 7.5V9a.75.75 0 00.75.75h6a.75.75 0 00.75-.75V7.5m-9 7.5h9A1.5 1.5 0 0018 13.5V9a1.5 1.5 0 00-1.5-1.5h-9A1.5 1.5 0 006 9v4.5A1.5 1.5 0 007.5 15z" />
                                        </svg>
                                        <span>Salin Alamat</span>
                                    </button>
                                </div>

                                <!-- Decorative Glow -->
                                <div class="absolute -inset-1 rounded-3xl bg-amber-500 opacity-20 blur-xl pointer-events-none z-[-1]"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="final-section" class="relative bg-orange-50 py-24 px-4 sm:px-8 overflow-hidden">
                <!-- Background Images -->
                <div class="absolute inset-0 z-0 pointer-events-none">
                    <img src="{{ asset('images/decoration/ataskiri.png') }}" class="gsap-final-ornament absolute top-0 left-0 w-[35%]">
                    <img src="{{ asset('images/decoration/ataskanan.png') }}" class="gsap-final-ornament absolute top-0 right-0 w-[35%]">
                    <img src="{{ asset('images/decoration/wayangkiri.png') }}" class="gsap-final-wayang absolute bottom-0 left-0 w-1/2 sm:w-1/3 md:w-[26%] max-w-[120px] md:max-w-xs">
                    <img src="{{ asset('images/decoration/wayangkanan.png') }}" class="gsap-final-wayang absolute bottom-0 right-0 w-1/2 sm:w-1/3 md:w-[26%] max-w-[120px] md:max-w-xs">
                    <img src="{{ asset('images/decoration/bawah.png') }}" class="gsap-final-wayang absolute bottom-0 left-1/2 -translate-x-1/2 w-full max-w-md md:max-w-lg z-20">
                </div>

                <!-- Content Container -->
                <div class="relative z-10 max-w-3xl mx-auto text-center space-y-20">
                    <!-- Form -->
                    <div class="gsap-final-form-container rounded-2xl bg-white/50 backdrop-blur-lg border-white/20 px-6 py-10 shadow-lg">
                        <img src="{{ asset('images/decoration/tengah.png') }}" class="h-16 sm:h-20 mx-auto mb-4 opacity-80">
                        <h2 class="font-serif-display text-4xl sm:text-5xl text-amber-900">Konfirmasi Kehadiran</h2>
                        <p class="mt-2 text-base text-stone-700">Mohon konfirmasi kehadiran Anda untuk kelancaran acara kami.</p>

                        <form id="final-rsvp-form" action="{{ route('rsvp.store') }}" method="POST" class="mt-8 space-y-6 text-left">
                            @csrf
                            <input type="text" name="nama" required
                                class="w-full px-5 py-3 rounded-xl border border-stone-300 bg-white/80 focus:ring-2 focus:ring-amber-500 focus:outline-none"
                                value="{{ old('nama', $namaTamu) }}" placeholder="Nama Anda">

                            <textarea name="pesan" rows="3"
                                class="w-full px-5 py-3 rounded-xl border border-stone-300 bg-white/80 focus:ring-2 focus:ring-amber-500 focus:outline-none"
                                placeholder="Tuliskan pesan dan doa terbaik Anda..."></textarea>

                            <div class="flex flex-col sm:flex-row sm:items-center sm:gap-4 gap-4">
                                <div class="w-full sm:w-1/2">
                                    <label for="kehadiran" class="sr-only">Konfirmasi Kehadiran</label>
                                    <div class="relative">
                                        <select id="kehadiran" name="kehadiran" required
                                            class="w-full cursor-pointer appearance-none rounded-xl border-2 border-amber-800 bg-white py-3 px-4 pr-10 font-semibold text-stone-700 focus:outline-none focus:ring-2 focus:ring-amber-500">
                                            <option value="hadir" selected>Hadir</option>
                                            <option value="tidak_hadir">Tidak Hadir</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-3 text-amber-800 pointer-events-none">
                                            <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="final-submit-btn"
                                    class="w-full sm:w-auto bg-amber-800 hover:bg-amber-900 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 shadow-md">
                                    Kirim
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Divider -->
                    <div class="gsap-final-divider w-full">
                        <div class="h-px bg-gradient-to-r from-transparent via-stone-400 to-transparent"></div>
                    </div>

                    <!-- Guestbook -->
                    <div class="gsap-final-guestbook-container relative z-10 px-2 md:px-4">
                        <h3 class="font-serif-display text-3xl md:text-4xl text-amber-900 mb-6">Papan Ucapan</h3>
                        <div id="final-rsvp-container" class="space-y-4 max-w-2xl mx-auto">
                            @foreach ($rsvps as $rsvp)
                                <div class="final-rsvp-card bg-white/80 backdrop-blur-md p-4 rounded-xl shadow-md text-left">
                                    <div class="flex justify-between items-start gap-3">
                                        <div>
                                            <h4 class="font-bold text-stone-800">{{ $rsvp['nama'] }}</h4>
                                            <p class="text-xs text-stone-500">{{ \Carbon\Carbon::parse($rsvp['waktu'])->locale('id')->diffForHumans() }}</p>
                                        </div>
                                        @if($rsvp['kehadiran'] == 'hadir')
                                            <span class="text-xs font-semibold bg-green-100 text-green-800 px-3 py-1 rounded-full">Hadir</span>
                                        @else
                                            <span class="text-xs font-semibold bg-red-100 text-red-800 px-3 py-1 rounded-full">Tidak Hadir</span>
                                        @endif
                                    </div>
                                    @if(!empty($rsvp['pesan']))
                                        <p class="mt-2 text-sm text-stone-700 italic">"{{ $rsvp['pesan'] }}"</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>


            <section id="ucapan-terima-kasih" class="relative min-h-screen flex items-center justify-center py-24 px-4 overflow-hidden bg-orange-50">
                <div class="absolute inset-0 z-0">
                    <img src="{{ asset('images/decoration/awankiri.png') }}" alt="Awan Kiri" class="gsap-cloud absolute top-[5%] left-0 w-1/2 md:w-1/3 opacity-40 -translate-x-1/4">
                    <img src="{{ asset('images/decoration/awankanan.png') }}" alt="Awan Kanan" class="gsap-cloud absolute top-[5%] right-0 w-1/2 md:w-1/3 opacity-40 translate-x-1/4">
                    <img src="{{ asset('images/decoration/ataskiri.png') }}" alt="Hiasan Atas Kiri" class="gsap-top-ornament absolute top-0 left-0 w-[40%] md:w-[30%] opacity-80">
                    <img src="{{ asset('images/decoration/ataskanan.png') }}" alt="Hiasan Atas Kanan" class="gsap-top-ornament absolute top-0 right-0 w-[40%] md:w-[30%] opacity-80">
                    <img src="{{ asset('images/decoration/wayangkiri.png') }}"alt="Wayang Kiri"class="gsap-bottom-ornament z-30 absolute bottom-0 -left-15 w-1/2 sm:w-1/3 md:w-[28%] max-w-[140px] sm:max-w-[180px] md:max-w-xs object-contain">
                    <img src="{{ asset('images/decoration/wayangkanan.png') }}"alt="Wayang Kanan"class="gsap-bottom-ornament z-30 absolute bottom-0 -right-15 w-1/2 sm:w-1/3 md:w-[28%] max-w-[140px] sm:max-w-[180px] md:max-w-xs object-contain">                </div>

                <div class="absolute inset-0 flex items-center justify-center z-10 pointer-events-none">
                    <img src="{{ asset('images/decoration/tengah.png') }}" alt="Hiasan Tengah" class="gsap-center-deco w-full max-w-lg opacity-30">
                </div>

                <div class="gsap-card-content relative w-full max-w-3xl bg-white/50 backdrop-blur-lg rounded-2xl shadow-xl p-8 text-center z-20 border border-white/20">
                    <p class="gsap-ucapan-content text-base text-stone-800 font-serif leading-relaxed">
                        Merupakan suatu kebahagiaan dan kehormatan bagi kami, apabila Bapak/Ibu/Saudara/i, berkenan hadir dan memberikan do'a restu kepada kedua mempelai.
                    </p>
                    <h3 class="gsap-ucapan-content font-serif-display text-3xl md:text-4xl text-amber-900 mt-8 mb-10">
                        Wassalamu'alaikum Warahmatullahi Wabarakatuh
                    </h3>
                    <div class="gsap-ucapan-content flex flex-row justify-center items-start text-center space-x-8 mt-8">
                        <div>
                            <p class="text-sm text-stone-600 mb-1 underline">Keluarga</p>
                            <h4 class="text-xs font-bold text-stone-800 font-serif leading-tight">
                                {{$bapakWanita}}<br>{{$ibuWanita}}
                            </h4>
                        </div>
                        <div>
                            <p class="text-sm text-stone-600 mb-1 underline">Keluarga</p>
                            <h4 class="text-xs font-bold text-stone-800 font-serif leading-tight">
                                {{$bapakPria}}<br>{{$ibuPria}}
                            </h4>
                        </div>
                    </div>
                    <div class="gsap-ucapan-content mt-12 pt-8 border-t border-white/40">
                        <p class="text-sm font-serif text-stone-700/90">
                            Music :
                        </p>
                        <p class="mt-1 text-xs text-stone-800 tracking-wider">
                            Denny Caknan Feat Bella Bonita - Sinarengan
                        </p>
                    </div>
                </div>

                <div class="absolute inset-0 flex items-end justify-center z-30 pointer-events-none">
                    <img src="{{ asset('images/decoration/bawah.png') }}" alt="Hiasan Bawah" class="gsap-bottom-ornament w-full max-w-md">
                </div>

                <div class="fixed bottom-6 right-6 flex flex-col space-y-3 z-50">
                    <button id="music-toggle-btn" aria-label="Putar musik" class="w-12 h-12 flex items-center justify-center bg-amber-900/70 hover:bg-amber-900 transition-colors duration-300 text-white rounded-full shadow-lg">
                        <svg id="play-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" />
                        </svg>
                        <svg id="mute-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 9.75L19.5 12m0 0l2.25 2.25M19.5 12l2.25-2.25M19.5 12l-2.25 2.25m-10.5-6l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" />
                        </svg>
                    </button>
                    <a href="https://wa.me/6282272983859?text=Halo%2C%20saya%20ingin%20bertanya%20mengenai%20undangan%20Anda."
                    target="_blank" rel="noopener noreferrer"
                    aria-label="Hubungi via WhatsApp"
                    class=" w-12 h-12 flex items-center justify-center bg-green-600/80 hover:bg-green-700 transition-colors duration-300 text-white rounded-full shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99 0-3.903-.52-5.586-1.457l-6.354 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.447-4.435-9.884-9.888-9.884-5.448 0-9.886 4.434-9.889 9.884-.001 2.225.651 4.288 1.91 5.961l-1.516 5.522zm7.54-6.234c-.197-.1-1.162-.574-1.342-.639-.18-.065-.312-.099-.445.099-.133.197-.507.639-.623.765-.116.125-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.117-.197-.015-.304.088-.403.09-.088.197-.232.296-.346.1-.116.133-.197.198-.33.065-.133.034-.248-.015-.347-.05-.1-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.116-.003-.248-.003-.38-.003s-.346.049-.52.248c-.172.196-.656.637-.656 1.559s.672 1.815.767 1.941c.095.126 1.372 2.098 3.33 2.915.47.197.84.312 1.12.398.28.088.54.076.72.023.197-.053.578-.232.66-.46.08-.227.08-.42.05-.46-.03-.04-.16-.09-.34-.19"/>
                        </svg>
                    </a>
                </div>
            </section>
        <footer class="bg-amber-900 py-12">
            <div class="max-w-7xl mx-auto px-4 text-center">

                <h3 class="font-serif-display text-2xl text-white mb-4">
                    {{$mempelaiWanita}} & {{$mempelaiPria}} </h3>

                <p class="text-sm text-stone-400">
                    Crafted with <span class="text-amber-500 transition-transform hover:scale-125 inline-block">♥</span> by
                    <a
                        class="font-semibold text-stone-200 hover:text-amber-400 transition-colors"
                    >
                        Ahmad Affandi Sikumbang
                    </a>
                </p>

                <p class="text-xs text-stone-500 mt-3">
                    &copy; 2025. All Rights Reserved.
                </p>

            </div>
        </footer>


        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // =======================================================
            // BAGIAN 1: SELEKSI ELEMEN & EVENT LISTENER UTAMA
            // =======================================================
            initMusicPlayer('music-toggle-btn', 'background-music', 'play-icon', 'mute-icon');
            gsap.registerPlugin(ScrollTrigger);
            gsap.set('.gsap-mempelai-icon', { xPercent: -50 });
            const bukaButton = document.getElementById('buka-undangan-btn');
            const detailSection = document.getElementById('detail-undangan');
            const profileSection = document.getElementById('profile');

            if (bukaButton && detailSection && profileSection) {
                bukaButton.addEventListener('click', function(event) {
                    event.preventDefault();

                    const backgroundMusic = document.getElementById('background-music');
                    if (backgroundMusic && backgroundMusic.paused) {
                        backgroundMusic.play();
                    }

                    // Tampilkan section undangan
                    detailSection.style.display = 'block';
                    document.body.style.overflow = 'auto';
                    document.documentElement.style.overflow = 'auto';

                    // Scroll ke bagian profil, bukan detailSection
                    profileSection.scrollIntoView({ behavior: 'smooth' });

                    // Debug log
                    console.log('Profile offsetTop:', profileSection.offsetTop);
                    console.log('Profile clientHeight:', profileSection.clientHeight);
                    console.log('window.innerHeight:', window.innerHeight);


                    setTimeout(() => {

                        ScrollTrigger.getAll().forEach(trigger => trigger.kill());
                        initAcaraAnimation();
                        initModernLoveStoryAnimation();
                        initAyatSuciV2Animation();
                        initFinalGiftAnimation();
                        initFinalSection();
                        initTerimaKasihAnimation();
                        ScrollTrigger.refresh();
                    }, 200);

                    const profileTl = gsap.timeline();
                    profileTl.from('.gsap-profile-card', {
                        opacity: 0,
                        scale: 0.9,
                        y: 50,
                        duration: 1,
                        ease: 'power2.out'
                    });
                    profileTl.from('.gsap-ornament', {
                        opacity: 0,
                        scale: 0.5,
                        duration: 1.2,
                        stagger: 0.08,
                        ease: 'back.out(1.7)'
                    }, "-=0.7");
                });
            }

            function initAcaraAnimation() {
                gsap.set([".gsap-acara-ornament", ".gsap-acara-card"], { autoAlpha: 0 });
                gsap.set(".gsap-acara-wayang-kiri", { xPercent: -100 });
                gsap.set(".gsap-acara-wayang-kanan", { xPercent: 100 });
                gsap.set(".gsap-acara-bottom-center", { yPercent: 100 });
                gsap.set(".gsap-acara-corner-tl", { scale: 0, transformOrigin: "top left" });
                gsap.set(".gsap-acara-corner-tr", { scale: 0, transformOrigin: "top right" });
                gsap.set(".gsap-acara-top-center", { yPercent: -150, scale: 0.5 });
                gsap.set(".gsap-acara-awan-kiri", { x: -50 });
                gsap.set(".gsap-acara-awan-kanan", { x: 50 });
                gsap.set(".gsap-acara-card", { scale: 0.8, y: 50 });

                const defaultScrollTrigger = {
                    trigger: null,
                    start: "top 85%",
                    toggleActions: "play none none none",
                    once: true,
                };

                gsap.to(".gsap-acara-wayang-kiri", { xPercent: 0, autoAlpha: 1, duration: 1.2, ease: "power2.out", scrollTrigger: { ...defaultScrollTrigger, trigger: ".gsap-acara-wayang-kiri" }});
                gsap.to(".gsap-acara-wayang-kanan", { xPercent: 0, autoAlpha: 1, duration: 1.2, ease: "power2.out", scrollTrigger: { ...defaultScrollTrigger, trigger: ".gsap-acara-wayang-kanan" }});
                gsap.to(".gsap-acara-bottom-center", { yPercent: 0, autoAlpha: 1, duration: 1.2, ease: "power2.out", scrollTrigger: { ...defaultScrollTrigger, trigger: ".gsap-acara-bottom-center", start: "top 95%" }});
                gsap.to(".gsap-acara-corner-tl", { scale: 1, autoAlpha: 1, duration: 1, ease: "back.out(1.7)", scrollTrigger: { ...defaultScrollTrigger, trigger: ".gsap-acara-corner-tl" }});
                gsap.to(".gsap-acara-corner-tr", { scale: 1, autoAlpha: 1, duration: 1, ease: "back.out(1.7)", scrollTrigger: { ...defaultScrollTrigger, trigger: ".gsap-acara-corner-tr" }});
                gsap.to(".gsap-acara-top-center", { yPercent: 0, scale: 1, autoAlpha: 1, duration: 1.2, ease: "back.out(1.7)", scrollTrigger: { ...defaultScrollTrigger, trigger: ".gsap-acara-top-center" }});
                gsap.to(".gsap-acara-awan-kiri", { x: 0, autoAlpha: 1, duration: 1.5, ease: "power1.out", delay: 0.3, scrollTrigger: { ...defaultScrollTrigger, trigger: ".gsap-acara-awan-kiri" }});
                gsap.to(".gsap-acara-awan-kanan", { x: 0, autoAlpha: 1, duration: 1.5, ease: "power1.out", delay: 0.3, scrollTrigger: { ...defaultScrollTrigger, trigger: ".gsap-acara-awan-kanan" }});
                gsap.to(".gsap-acara-card", { scale: 1, y: 0, autoAlpha: 1, duration: 1.2, ease: "back.out(1.4)", delay: 0.2, scrollTrigger: { ...defaultScrollTrigger, trigger: ".gsap-acara-card", start: "top 80%" }});
            }

            function initModernLoveStoryAnimation() {
                gsap.from(".gsap-modern-lovestory-title", { autoAlpha: 0, y: 50, duration: 1, scrollTrigger: { trigger: ".gsap-modern-lovestory-title", start: "top 85%", once: true }});
                gsap.from(".gsap-modern-lovestory-p", { autoAlpha: 0, y: 50, duration: 1, delay: 0.2, scrollTrigger: { trigger: ".gsap-modern-lovestory-p", start: "top 85%", once: true }});
                const storyCards = gsap.utils.toArray('.story-card');
                storyCards.forEach((card, index) => {
                    const imageContainer = card.querySelector('.image-container');
                    const textContainer = card.querySelector('.text-container');
                    if (index % 2 === 0) {
                        gsap.set(card, { flexDirection: 'row' });
                    } else {
                        gsap.set(card, { flexDirection: 'row-reverse' });
                    }
                    gsap.from(imageContainer, { autoAlpha: 0, x: index % 2 === 0 ? -100 : 100, scale: 0.8, duration: 1, ease: "power2.out", scrollTrigger: { trigger: card, start: "top 80%", once: true }});
                    gsap.from(textContainer, { autoAlpha: 0, x: index % 2 === 0 ? 100 : -100, duration: 1, ease: "power2.out", scrollTrigger: { trigger: card, start: "top 80%", once: true, delay: 0.2 }});
                });
            }

            function initAyatSuciV2Animation() {
                gsap.from(".gsap-ayat-v2-corner", { autoAlpha: 0, scale: 0.8, duration: 1.5, ease: "power2.out", scrollTrigger: { trigger: "#ayat-suci-v2", start: "top 80%", once: true }});
                gsap.from(".gsap-ayat-v2-awan", { autoAlpha: 0, x: (index) => (index === 0 ? -50 : 50), duration: 2, ease: "power2.out", scrollTrigger: { trigger: "#ayat-suci-v2", start: "top 75%", once: true }});
                gsap.from(".gsap-ayat-v2-gunungan", { autoAlpha: 0, scale: 0.9, duration: 1.5, delay: 0.2, ease: "power3.out", scrollTrigger: { trigger: "#ayat-suci-v2", start: "top 70%", once: true }});
                const commonTextSettings = { autoAlpha: 0, y: 50, duration: 1.2, ease: "power3.out", scrollTrigger: { trigger: "#ayat-suci-v2", start: "top 70%", once: true }};
                gsap.from(".gsap-ayat-v2-arabic", { ...commonTextSettings, delay: 0.5 });
                gsap.from(".gsap-ayat-v2-translation", { ...commonTextSettings, delay: 0.7 });
                gsap.from(".gsap-ayat-v2-source", { ...commonTextSettings, y: 30, delay: 0.9 });
            }

            function initFinalGiftAnimation() {
                const sectionTrigger = { trigger: "#hadiah-terakhir", start: "top 80%", once: true };
                gsap.from(".gsap-hadiah-akhir-title", { autoAlpha: 0, y: 50, duration: 1, scrollTrigger: sectionTrigger });
                gsap.from(".gsap-hadiah-akhir-p", { autoAlpha: 0, y: 50, duration: 1, delay: 0.2, scrollTrigger: sectionTrigger });
                gsap.from(".gsap-hadiah-akhir-ornament", { autoAlpha: 0, scale: 0.5, duration: 2, ease: "power2.out", scrollTrigger: { trigger: "#hadiah-terakhir", start: "top bottom", once: true }});
                const cards = gsap.utils.toArray('.gsap-hadiah-akhir-card');
                cards.forEach((card, index) => {
                    gsap.from(card, { autoAlpha: 0, y: 80, duration: 1, delay: index * 0.2, ease: "power2.out", scrollTrigger: { trigger: card, start: "top 85%", once: true }});
                });
                const copyButtons = document.querySelectorAll('.salin-btn-akhir');
                copyButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        const accountNumber = button.dataset.rekeningNomor;
                        navigator.clipboard.writeText(accountNumber).then(() => {
                            const originalText = button.innerHTML;
                            button.innerHTML = 'Berhasil Disalin!';
                            button.disabled = true;
                            setTimeout(() => {
                                button.innerHTML = originalText;
                                button.disabled = false;
                            }, 2000);
                        });
                    });
                });
            }

            function initFinalSection() {
                gsap.from(".gsap-final-ornament", { autoAlpha: 0, scale: 0.5, duration: 1.5, scrollTrigger: { trigger: "#final-section", start: "top 80%", once: true }});
                gsap.from(".gsap-final-form-container", { autoAlpha: 0, y: 50, duration: 1.2, scrollTrigger: { trigger: ".gsap-final-form-container", start: "top 80%", once: true }});
                gsap.from(".gsap-final-divider", { autoAlpha: 0, scaleX: 0, duration: 1, scrollTrigger: { trigger: ".gsap-final-divider", start: "top 85%", once: true }});
                gsap.from(".gsap-final-guestbook-container", { autoAlpha: 0, y: 50, duration: 1.2, scrollTrigger: { trigger: ".gsap-final-guestbook-container", start: "top 85%", once: true }});
                gsap.from(".gsap-final-wayang", { autoAlpha: 0, y: 150, duration: 1.5, ease: "power2.out", scrollTrigger: { trigger: ".gsap-final-guestbook-container", start: "top 90%", once: true }});

                const rsvpForm = document.getElementById('final-rsvp-form');
                if (rsvpForm) {
                    rsvpForm.addEventListener('submit', function(e) {
                        e.preventDefault();
                        const submitButton = document.getElementById('final-submit-btn');
                        const originalButtonText = submitButton.innerHTML;
                        submitButton.innerHTML = '...';
                        submitButton.disabled = true;

                        const formData = new FormData(rsvpForm);
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                        fetch(rsvpForm.action, {
                            method: 'POST',
                            headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                addNewRsvpCard(data.rsvp);
                                rsvpForm.reset();
                                document.querySelector('input[name="kehadiran"][value="hadir"]').checked = true;
                            }
                        })
                        .finally(() => {
                            submitButton.innerHTML = originalButtonText;
                            submitButton.disabled = false;
                        });
                    });
                }
            }

            function addNewRsvpCard(rsvp) {
                const cardContainer = document.getElementById('final-rsvp-container');
                const newCard = document.createElement('div');
                newCard.className = 'final-rsvp-card bg-white/80 p-4 rounded-lg shadow-md text-left';

                const kehadiranBadge = rsvp.kehadiran === 'hadir'
                    ? `<span class="text-xs font-semibold bg-green-100 text-green-800 px-3 py-1 rounded-full">Hadir</span>`
                    : `<span class="text-xs font-semibold bg-red-100 text-red-800 px-3 py-1 rounded-full">Tidak Hadir</span>`;
                const pesanHtml = rsvp.pesan ? `<p class="mt-2 text-stone-700 text-sm italic">"${rsvp.pesan}"</p>` : '';

                newCard.innerHTML = `
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-bold text-stone-800">${rsvp.nama}</h4>
                            <p class="text-xs text-stone-500">Baru saja</p>
                        </div>
                        ${kehadiranBadge}
                    </div>
                    ${pesanHtml}
                `;
                cardContainer.prepend(newCard);
                gsap.from(newCard, { autoAlpha: 0, y: -50, duration: 0.8, ease: "power2.out" });
            }

            function initMusicPlayer(buttonId, audioId, playIconId, muteIconId) {
                const musicButton = document.getElementById(buttonId);
                const backgroundMusic = document.getElementById(audioId);
                const playIcon = document.getElementById(playIconId);
                const muteIcon = document.getElementById(muteIconId);

                if (!musicButton || !backgroundMusic || !playIcon || !muteIcon) {
                    console.warn("Satu atau lebih elemen pemutar musik tidak ditemukan.");
                    return;
                }

                const updateButtonState = () => {
                    if (backgroundMusic.paused) {
                        playIcon.classList.add('hidden');
                        muteIcon.classList.remove('hidden');
                        musicButton.setAttribute('aria-label', 'Putar musik');
                    } else {
                        playIcon.classList.remove('hidden');
                        muteIcon.classList.add('hidden');
                        musicButton.setAttribute('aria-label', 'Hentikan musik');
                    }
                };

                backgroundMusic.addEventListener('play', updateButtonState);
                backgroundMusic.addEventListener('pause', updateButtonState);

                musicButton.addEventListener('click', () => {
                    if (backgroundMusic.paused) {
                        backgroundMusic.play();
                    } else {
                        backgroundMusic.pause();
                    }
                });

                updateButtonState();
            }

            function initTerimaKasihAnimation() {
                gsap.set([
                    ".gsap-cloud", ".gsap-top-ornament", ".gsap-bottom-ornament",
                    ".gsap-center-deco", ".gsap-card-content", ".gsap-buttons"
                ], { autoAlpha: 0 });

                const tl = gsap.timeline({
                    scrollTrigger: {
                        trigger: "#ucapan-terima-kasih",
                        start: "top 85%",
                        once: true,
                    }
                });

                const decorations = [
                    ".gsap-cloud",
                    ".gsap-top-ornament",
                    ".gsap-bottom-ornament",
                ];

                tl.from(decorations, {
                    y: (index) => (index === 0 ? -30 : (index === 1 ? -30 : 30)),
                    scale: 0.9,
                    duration: 1.5,
                    ease: "power3.out",
                    stagger: 0.15
                }, 0);

                tl.to(decorations, { autoAlpha: 1, duration: 1.5, stagger: 0.15 }, 0);

                tl.to(".gsap-center-deco", {
                    autoAlpha: 0.3,
                    scale: 1,
                    duration: 1.2,
                    ease: "power3.out"
                }, "-=1.2");

                tl.to(".gsap-card-content", {
                    autoAlpha: 1,
                    duration: 0.5,
                    ease: "power2.inOut"
                }, "-=0.8");

                tl.from(".gsap-ucapan-content", {
                    autoAlpha: 0,
                    y: 25,
                    duration: 0.8,
                    ease: "power2.out",
                    stagger: 0.1
                }, "-=0.5");

            }

            // =======================================================
            // BAGIAN 3: LOGIKA TAMBAHAN (COUNTDOWN, ETC)
            // =======================================================
            const countdown = () => {
                const daysEl = document.getElementById('days');
                const hoursEl = document.getElementById('hours');
                const minutesEl = document.getElementById('minutes');
                const secondsEl = document.getElementById('seconds');

                if (!daysEl || !hoursEl || !minutesEl || !secondsEl) return;

                const targetDate = new Date("{{ $tanggalAcara }} 09:00:00").getTime();
                const now = new Date().getTime();
                const gap = targetDate - now;

                if (gap < 0) {
                    daysEl.innerText = '00';
                    hoursEl.innerText = '00';
                    minutesEl.innerText = '00';
                    secondsEl.innerText = '00';
                    return;
                }

                const second = 1000;
                const minute = second * 60;
                const hour = minute * 60;
                const day = hour * 24;

                const textDay = Math.floor(gap / day);
                const textHour = Math.floor((gap % day) / hour);
                const textMinute = Math.floor((gap % hour) / minute);
                const textSecond = Math.floor((gap % minute) / second);

                daysEl.innerText = String(textDay).padStart(2, '0');
                hoursEl.innerText = String(textHour).padStart(2, '0');
                minutesEl.innerText = String(textMinute).padStart(2, '0');
                secondsEl.innerText = String(textSecond).padStart(2, '0');
            };
            setInterval(countdown, 1000);

            // =======================================================
            // BAGIAN 4: ANIMASI AWAL & LOOPING
            // =======================================================
            function startContinuousAnimations() {
                gsap.to('.gsap-wayang-side', { y: -12, duration: 5, repeat: -1, yoyo: true, ease: "sine.inOut" });
                gsap.to('.gsap-mempelai-icon', { y: -10, duration: 4, repeat: -1, yoyo: true, ease: "sine.inOut" });
                gsap.to('.gsap-loop-rings', { rotate: -8, scale: 1.05, duration: 4, repeat: -1, yoyo: true, ease: "power1.inOut" });
                gsap.to('.gsap-loop-4', { y: 5, x: -5, rotate: -3, duration: 6, repeat: -1, yoyo: true, ease: "sine.inOut" });
                gsap.to('.gsap-loop-5', { y: -5, x: 5, rotate: 3, duration: 6, repeat: -1, yoyo: true, ease: "sine.inOut", delay: 0.5 });
                gsap.to('.gsap-loop-flower', { scale: 1.03, duration: 5, repeat: -1, yoyo: true, ease: "power1.inOut" });
                gsap.to('.gsap-loop-bottom', { x: 5, duration: 7, repeat: -1, yoyo: true, ease: "sine.inOut" });
            }

            gsap.defaults({ ease: "power3.inOut", duration: 1.2 });
            const tl = gsap.timeline({ onComplete: startContinuousAnimations });

            tl
                .from('.gsap-ornament-bottom', { yPercent: 100, opacity: 0, duration: 1 }, "+=0.5")
                .from('.gsap-ornament-layer-1', { scale: 0.5, opacity: 0, stagger: 0.2 }, "<")
                .from('.gsap-ornament-layer-2', { scale: 0.5, opacity: 0, stagger: 0.2 }, "<0.2")
                .from('.gsap-ornament-flower', { scale: 0, opacity: 0, duration: 1.5, ease: "power4.out" }, "-=1")
                .from('.gsap-text', { y: -30, opacity: 0 }, "-=0.5")
                .from('.gsap-photo', { scale: 0, opacity: 0, ease: "back.out(1.7)" }, "-=0.8")
                .from('.gsap-names', { scale: 0.8, opacity: 0 }, "-=0.8")
                .from('.gsap-wayang-side', { yPercent: 100, opacity: 0, duration: 1 }, "-=1.8")
                .from('.gsap-mempelai-icon', { yPercent: 100, opacity: 0, ease: "power2.out" }, "-=0.5")
                .from('.gsap-rings', { y: -50, opacity: 0, ease: "bounce.out" }, "-=0.6")
                .from('.gsap-guest', { y: 30, opacity: 0 }, "-=0.6")
                .from('.gsap-button', { scale: 0.5, opacity: 0 }, "-=0.8");
        });
    </script>
</body>
</html>
