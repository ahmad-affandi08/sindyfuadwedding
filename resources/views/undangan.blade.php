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
    $namaLokasi = 'Rumah Mempelai Wanita'; // Dihapus spasi di depan
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
            'nama' => 'Sindi Ni\'am Muzakki'
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

    {{-- Animate.css CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    {{-- Font Awesome for Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/ornaments/rings.png') }}" type="image/png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@700&family=Tangerine:wght@700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
    body { font-family: 'Poppins', sans-serif; background-color: #F5F5F4; }
    .font-serif-display { font-family: 'Playfair Display', serif; }
    .font-script { font-family: 'Tangerine', cursive; }
    #detail-undangan { display: none; }
    .font-arabic { font-family: 'Amiri', serif; }
    .custom-radio-label input:checked + .custom-radio-dot {
        transform: scale(1);
        opacity: 1;
    }
    .animate-on-scroll {
        opacity: 0;
    }

    @keyframes entry-fade-in-up {
        from {
            opacity: 0;
            transform: translate3d(0, 50px, 0);
        }
        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }

    @keyframes entry-fade-in {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes float-up-down {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-20px);
        }
    }

    @keyframes gentle-float {
        0%, 100% {
            transform: translateY(0) scale(1);
        }
        50% {
            transform: translateY(-10px) scale(1.03);
        }
    }

    .wayang-entry-then-float {
        opacity: 0;
        animation:
            entry-fade-in-up 1.2s ease-out 0.8s forwards,
            float-up-down 5s ease-in-out 2s infinite;
    }

    .rings-entry-then-float {
        opacity: 0;
        animation:
            entry-fade-in 1.5s ease-out 1.2s forwards,
            gentle-float 6s ease-in-out 2.7s infinite;
    }
</style>
</head>
<body>
    <audio id="background-music" src="{{ asset('music/music.mp3') }}" loop></audio>
    <div id="landing" class="h-screen w-full overflow-hidden">
        <div class="relative w-full max-w-md h-full bg-orange-50 shadow-2xl mx-auto overflow-hidden" style="background-image: url('{{ asset('/images/ornaments/2.png') }}'); background-size: cover;">

            <img src="{{ asset('/images/ornaments/7.png') }}" class="animate__animated animate__zoomIn animate__delay-1s absolute -top-2 -left-2 w-[43%] z-10 pointer-events-none" alt="">
            <img src="{{ asset('/images/ornaments/8.png') }}" class="animate__animated animate__zoomIn animate__delay-1s absolute -top-2 -right-2 w-[43%] z-10 pointer-events-none" alt="">
            <img src="{{ asset('/images/ornaments/4.png') }}" class="animate__animated animate__zoomIn animate__delay-1s absolute -top-3 -left-3 w-[45%] z-10 pointer-events-none" alt="">
            <img src="{{ asset('/images/ornaments/5.png') }}" class="animate__animated animate__zoomIn animate__delay-1s absolute -top-2 right-0 w-[45%] z-10 pointer-events-none" alt="">
            <img src="{{ asset('/images/ornaments/6.png') }}" class="animate__animated animate__zoomIn animate__delay-1s absolute top-0 left-1/2 -translate-x-1/2 w-[50%] z-20 pointer-events-none" alt="">
            <img src="{{ asset('/images/ornaments/3.png') }}" class="animate__animated animate__fadeInUp absolute bottom-0 left-0 w-full z-10 pointer-events-none" alt="">

            <img src="{{ asset('/images/ornaments/wayang1.png') }}" class="wayang-entry-then-float absolute bottom-[-50px] left-2 -translate-y-1/2 h-[30%] z-0 pointer-events-none opacity-78">
            <img src="{{ asset('/images/ornaments/wayang2.png') }}" class="wayang-entry-then-float absolute bottom-[-50px] right-2 -translate-y-1/2 h-[30%] z-0 pointer-events-none opacity-78">
            <img src="{{ asset('images/ornaments/mempelai-icon.png') }}" class="animate__animated animate__fadeInUp animate__delay-1s absolute bottom-30 left-1/2 -translate-x-1/2 h-[30%] sm:h-[35%] pointer-events-none" alt="Icon Mempelai">

            <div class="relative z-30 text-center flex flex-col items-center justify-center h-full w-full p-6">
                <p class="animate__animated animate__fadeInDown animate__delay-1s font-serif-display text-lg text-stone-600">The Wedding Of</p>
                <h1 class="animate__animated animate__fadeIn animate__delay-1s font-script text-6xl sm:text-7xl text-amber-900 leading-tight font-bold" style="text-shadow: 1px 1px 3px rgba(120, 53, 15, 0.5);">{{ $mempelaiWanita }} & {{ $mempelaiPria }}</h1>

                <img src="{{ asset('/images/ornaments/rings.png') }}" alt="Cincin Pernikahan" class="rings-entry-then-float w-20 h-auto mb-10 drop-shadow">

                <div class="animate__animated animate__fadeInUp animate__delay-2s w-full my-4 px-4">
                    <div class="border border-white/20 bg-black/5 rounded-xl p-4 max-w-xs mx-auto">
                        <p class="text-base text-stone-200" style="text-shadow: 1px 1px 4px rgba(0,0,0,0.7);">
                            Kepada Yth. Bapak/Ibu/Saudara/i:
                        </p>
                        <p class="text-2xl font-bold text-white mt-1 break-words" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">
                            {{ $namaTamu }}
                        </p>
                    </div>
                </div>

                <button id="buka-undangan-btn" class="animate__animated animate__zoomIn animate__delay-2s bg-amber-800 text-white font-semibold px-8 py-3 rounded-full shadow-lg hover:bg-amber-900 transition-colors duration-300 mt-4 flex items-center justify-center gap-2">
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
    <div class="container mx-auto max-w-4xl text-center text-stone-700 ">

        <section id="profile" class="min-h-screen relative overflow-hidden flex items-center justify-center p-4 sm:p-6">
            <div class="absolute inset-0 w-full h-full pointer-events-none">
                <img src="{{ asset('/images/decoration/awankiri.png') }}" class="animate-on-scroll absolute top-[10%] left-[-5%] w-[40%] opacity-80 z-10" data-animation="fadeInLeft" data-delay="300">
                <img src="{{ asset('/images/decoration/awankanan.png') }}" class="animate-on-scroll absolute top-[15%] right-[-5%] w-[40%] opacity-80 z-10" data-animation="fadeInRight" data-delay="300">
                <img src="{{ asset('/images/decoration/wayangkiri.png') }}" class="animate-on-scroll absolute bottom-0 -left-15 w-[35%] sm:w-[30%] z-30" data-animation="fadeInUp" data-delay="500">
                <img src="{{ asset('/images/decoration/wayangkanan.png') }}" class="animate-on-scroll absolute bottom-0 -right-15 w-[35%] sm:w-[30%] z-30" data-animation="fadeInUp" data-delay="500">
                <img src="{{ asset('/images/decoration/ataskiri.png') }}" class="animate-on-scroll absolute top-0 left-0 w-[45%] z-30" data-animation="fadeInDown">
                <img src="{{ asset('/images/decoration/ataskanan.png') }}" class="animate-on-scroll absolute top-0 right-0 w-[45%] z-30" data-animation="fadeInDown">
                <img src="{{ asset('/images/decoration/bawah.png') }}" class="animate-on-scroll absolute bottom-0 left-1/2 -translate-x-1/2 w-full max-w-md z-30" data-animation="fadeInUp">
            </div>

            <div class="animate-on-scroll relative w-full max-w-md bg-white/25 backdrop-blur-lg rounded-3xl shadow-2xl border border-white/30 pt-12 pb-10 px-6 sm:px-8 text-center z-20" data-animation="zoomIn">
                <img src="{{ asset('/images/decoration/tengah.png') }}" class="animate-on-scroll absolute -top-16 left-1/2 -translate-x-1/2 w-[30%] z-40 pointer-events-none" data-animation="zoomIn" data-delay="200">
                <h2 class="animate-on-scroll font-serif-display text-3xl sm:text-4xl text-amber-900" style="text-shadow: 1px 1px 3px rgba(120, 53, 15, 0.2);" data-animation="fadeInDown" data-delay="400">Assalamu'alaikum Wr. Wb.</h2>
                <p class="animate-on-scroll mt-2 max-w-xl mx-auto text-xs sm:text-sm leading-relaxed text-stone-600" data-animation="fadeInUp" data-delay="500">Dengan memohon rahmat dan ridho Allah SWT, kami akan menyelenggarakan pernikahan:</p>

                <div class="mt-8 flex flex-col gap-4">
                    <div class="animate-on-scroll" data-animation="fadeInLeft" data-delay="600">
                        <h3 class="font-script text-4xl sm:text-5xl text-amber-900">{{ $namaLengkapWanita }}</h3>
                        <p class="mt-1 text-sm font-semibold text-stone-700">{{ $putriKeWanita }}</p>
                        <p class="text-xs text-stone-600">{{ $bapakWanita }} & {{ $ibuWanita }}</p>
                    </div>
                    <p class="animate-on-scroll font-script text-4xl text-amber-800 my-2" data-animation="zoomIn" data-delay="700">&</p>
                    <div class="animate-on-scroll" data-animation="fadeInRight" data-delay="600">
                        <h3 class="font-script text-4xl sm:text-5xl text-amber-900">{{ $namaLengkapPria }}</h3>
                        <p class="mt-1 text-sm font-semibold text-stone-700">{{ $putraKePria }}</p>
                        <p class="text-xs text-stone-600">{{ $bapakPria }} & {{ $ibuPria }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="ayat-suci-v2" class="relative bg-stone-800 text-white py-24 px-4 overflow-hidden">
            <div class="absolute inset-0 z-0 opacity-40 pointer-events-none">
                <img src="{{ asset('images/decoration/ataskiri.png') }}" class="animate-on-scroll absolute top-0 left-0 w-[45%]" data-animation="fadeInLeft">
                <img src="{{ asset('images/decoration/ataskanan.png') }}" class="animate-on-scroll absolute top-0 right-0 w-[45%]" data-animation="fadeInRight">
                <img src="{{ asset('images/decoration/awankiri.png') }}" class="animate-on-scroll absolute top-1/4 -left-10 w-1/3 md:w-1/4" data-animation="fadeInLeft" data-delay="200">
                <img src="{{ asset('images/decoration/awankanan.png') }}" class="animate-on-scroll absolute top-1/3 -right-10 w-1/3 md:w-1/4" data-animation="fadeInRight" data-delay="200">
            </div>
            <div class="relative z-10 max-w-3xl mx-auto text-center grid place-items-center">
                <img src="{{ asset('images/decoration/tengah.png') }}" class="animate-on-scroll col-start-1 row-start-1 w-full max-w-sm opacity-30" data-animation="zoomIn">
                <blockquote class="col-start-1 row-start-1 p-4">
                    <p dir="rtl" class="animate-on-scroll font-arabic text-3xl md:text-4xl leading-loose text-stone-100 mb-8" style="text-shadow: 0px 2px 8px rgba(0,0,0,0.7);" data-animation="fadeInUp" data-delay="200">
                        وَمِنْ ءَايَٰتِهِۦٓ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَٰجًا لِّتَسْكُنُوٓا۟ إِلَيْهَا وَجَعَلَ بَيْنَكُم مَّوَدَّةً وَرَحْمَةً ۚ إِنَّ فِى ذَٰلِكَ لَءَايَٰتٍ لِّقَوْمٍ يَتَفَكَّرُونَ
                    </p>
                    <p class="animate-on-scroll font-serif-display text-xl md:text-2xl leading-relaxed text-stone-200" style="text-shadow: 0px 2px 8px rgba(0,0,0,0.7);" data-animation="fadeInUp" data-delay="400">
                        “Dan di antara tanda-tanda kebesaran-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.”
                    </p>
                    <footer class="animate-on-scroll mt-8 text-base text-stone-300" style="text-shadow: 0px 2px 8px rgba(0,0,0,0.7);" data-animation="fadeInUp" data-delay="600">
                        (Qs. Ar-Rum: 21)
                    </footer>
                </blockquote>
            </div>
        </section>

        <section id="acara" class="relative min-h-screen text-center bg-orange-50 py-20 px-4 sm:px-6 overflow-hidden">
            <div class="absolute inset-0 w-full h-full pointer-events-none">
                <img src="{{ asset('/images/decoration/ataskiri.png') }}" class="animate-on-scroll absolute top-0 left-0 w-[45%] z-10" data-animation="fadeInDown">
                <img src="{{ asset('/images/decoration/ataskanan.png') }}" class="animate-on-scroll absolute top-0 right-0 w-[45%] z-10" data-animation="fadeInDown">
                <img src="{{ asset('/images/decoration/awankiri.png') }}" class="animate-on-scroll absolute top-[15%] left-[-5%] w-[30%] sm:w-[20%] z-10 opacity-60" data-animation="fadeInLeft" data-delay="200">
                <img src="{{ asset('/images/decoration/awankanan.png') }}" class="animate-on-scroll absolute top-[15%] right-[-5%] w-[30%] sm:w-[20%] z-10 opacity-60" data-animation="fadeInRight" data-delay="200">
                <img src="{{ asset('/images/decoration/wayangkiri.png') }}" class="animate-on-scroll absolute bottom-0 -left-15 w-[30%] z-30" data-animation="fadeInUp" data-delay="400">
                <img src="{{ asset('/images/decoration/wayangkanan.png') }}" class="animate-on-scroll absolute bottom-0 -right-15 w-[30%] z-30" data-animation="fadeInUp" data-delay="400">
                <img src="{{ asset('/images/decoration/bawah.png') }}" class="animate-on-scroll absolute bottom-0 left-1/2 -translate-x-1/2 w-full max-w-lg z-30 opacity-80" data-animation="fadeInUp">
            </div>

            <div class="relative z-20">
                <img src="{{ asset('/images/decoration/tengah.png') }}" class="animate-on-scroll h-24 mx-auto" data-animation="zoomIn">
                <p class="animate-on-scroll max-w-md mx-auto text-stone-600 leading-relaxed mt-4" data-animation="fadeInUp" data-delay="100">
                    Dengan segala kerendahan hati kami berharap kehadiran Bapak/Ibu/Saudara/i dalam acara pernikahan kami yang akan diselenggarakan pada:
                </p>
                <div class="animate-on-scroll bg-white/25 backdrop-blur-md p-6 sm:p-10 rounded-2xl shadow-xl max-w-2xl mx-auto text-center mt-8" data-animation="fadeInUp" data-delay="200">
                    <h3 class="animate-on-scroll font-script text-5xl sm:text-6xl text-amber-900" data-animation="zoomIn" data-delay="300">Akad Nikah</h3>
                    <img src="{{ asset('/images/ornaments/rings.png') }}" alt="Cincin Pernikahan" class="animate-on-scroll w-16 h-auto mx-auto drop-shadow-lg my-4" data-animation="zoomIn" data-delay="400">

                    <div class="animate-on-scroll flex flex-col items-center gap-2 my-6" data-animation="fadeInUp" data-delay="500">
                        <div class="flex justify-center items-center gap-4 sm:gap-6 text-stone-700 font-semibold">
                            <p>{{ \Carbon\Carbon::parse($tanggalAcara)->locale('id')->isoFormat('dddd') }}</p>
                            <div class="border-l-2 border-r-2 border-stone-300 px-4 sm:px-6">
                                <p class="text-5xl font-sans font-bold text-amber-900">{{ \Carbon\Carbon::parse($tanggalAcara)->isoFormat('D') }}</p>
                            </div>
                            <p>{{ \Carbon\Carbon::parse($tanggalAcara)->locale('id')->isoFormat('MMMM') }}</p>
                        </div>
                        <p class="text-2xl font-semibold text-stone-700">{{ \Carbon\Carbon::parse($tanggalAcara)->locale('id')->isoFormat('Y') }}</p>
                    </div>
                    <p class="animate-on-scroll text-xl font-bold text-amber-800" data-animation="fadeInUp" data-delay="600">{{ $waktuAcara }}</p>

                    <hr class="animate-on-scroll border-t border-stone-300/80 my-8" data-animation="zoomIn" data-delay="600">

                    <div>
                        <p class="animate-on-scroll font-serif-display text-xl text-stone-700" data-animation="fadeInUp" data-delay="700">Menuju Hari Bahagia</p>
                        <div class="flex justify-center items-center gap-3 sm:gap-4 mt-4 text-white">
                            <div class="animate-on-scroll bg-amber-800/90 w-16 h-16 sm:w-20 sm:h-20 rounded-lg flex flex-col justify-center items-center shadow-md" data-animation="zoomIn" data-delay="800"><span id="days" class="text-2xl sm:text-3xl font-bold">00</span><span class="text-xs">Hari</span></div>
                            <div class="animate-on-scroll bg-amber-800/90 w-16 h-16 sm:w-20 sm:h-20 rounded-lg flex flex-col justify-center items-center shadow-md" data-animation="zoomIn" data-delay="900"><span id="hours" class="text-2xl sm:text-3xl font-bold">00</span><span class="text-xs">Jam</span></div>
                            <div class="animate-on-scroll bg-amber-800/90 w-16 h-16 sm:w-20 sm:h-20 rounded-lg flex flex-col justify-center items-center shadow-md" data-animation="zoomIn" data-delay="1000"><span id="minutes" class="text-2xl sm:text-3xl font-bold">00</span><span class="text-xs">Menit</span></div>
                            <div class="animate-on-scroll bg-amber-800/90 w-16 h-16 sm:w-20 sm:h-20 rounded-lg flex flex-col justify-center items-center shadow-md" data-animation="zoomIn" data-delay="1100"><span id="seconds" class="text-2xl sm:text-3xl font-bold">00</span><span class="text-xs">Detik</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="lokasi" class="relative bg-stone-800 text-white py-24 px-4 overflow-hidden">
            <div class="absolute inset-0 z-30 pointer-events-none">
                <img src="{{ asset('images/decoration/ataskiri.png') }}" class="animate-on-scroll absolute top-0 left-0 w-1/3 max-w-xs opacity-70" data-animation="fadeInDown">
                <img src="{{ asset('images/decoration/ataskanan.png') }}" class="animate-on-scroll absolute top-0 right-0 w-1/3 max-w-xs opacity-70" data-animation="fadeInDown">
                <img src="{{ asset('images/decoration/tengah.png') }}" class="animate-on-scroll absolute top-10 left-1/2 -translate-x-1/2 w-1/4 max-w-[150px] opacity-40" data-animation="zoomIn">
                <img src="{{ asset('images/decoration/awankiri.png') }}" class="animate-on-scroll absolute top-1/4 -left-10 w-1/3 opacity-20" data-animation="fadeInLeft" data-delay="200">
                <img src="{{ asset('images/decoration/awankanan.png') }}" class="animate-on-scroll absolute top-1/3 -right-10 w-1/3 opacity-20" data-animation="fadeInRight" data-delay="200">
                <img src="{{ asset('images/decoration/wayangkiri.png') }}" class="animate-on-scroll absolute bottom-0 -left-10 w-1/3 sm:w-1/4 max-w-[180px] z-10" data-animation="fadeInUp" data-delay="300">
                <img src="{{ asset('images/decoration/wayangkanan.png') }}" class="animate-on-scroll absolute bottom-0 -right-10 w-1/3 sm:w-1/4 max-w-[180px] z-10" data-animation="fadeInUp" data-delay="300">
                <img src="{{ asset('images/decoration/bawah.png') }}" class="animate-on-scroll absolute bottom-0 left-1/2 -translate-x-1/2 w-full max-w-lg opacity-90" data-animation="fadeInUp">
            </div>

            <div class="relative z-20 max-w-4xl mx-auto text-center">
                <h2 class="animate-on-scroll font-serif-display text-4xl md:text-5xl text-amber-100" data-animation="fadeInUp" style="text-shadow: 1px 1px 5px rgba(0,0,0,0.5);">
                    Peta Lokasi Acara
                </h2>
                <p class="animate-on-scroll mt-4 max-w-xl mx-auto text-stone-300" data-animation="fadeInUp" data-delay="200">
                    Gunakan peta interaktif di bawah ini untuk mempermudah perjalanan Anda menuju hari bahagia kami.
                </p>

                <div class="animate-on-scroll mt-12 max-w-3xl mx-auto bg-white/10 backdrop-blur-md p-4 sm:p-6 rounded-2xl shadow-xl border border-white/20" data-animation="zoomIn" data-delay="400">
                    <div class="text-left text-stone-900 bg-white p-6 rounded-xl shadow-lg">
                        <h4 class="font-script text-4xl text-amber-900">Lokasi Acara</h4>
                        <p class="font-semibold text-lg mt-2">{{ $namaLokasi }}</p>
                        <p class="max-w-xs text-sm text-stone-600">{{ $alamatLokasi }}</p>
                        <a href="{{ $linkGoogleMaps }}" target="_blank" class="inline-flex items-center gap-2 mt-4 bg-amber-800 text-white font-semibold px-6 py-2 rounded-full shadow-lg hover:bg-amber-900 transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Buka di Google Maps</span>
                        </a>
                    </div>
                    <div class="animate-on-scroll mt-4 w-full rounded-xl overflow-hidden border-4 border-white shadow-lg" data-animation="fadeInUp" data-delay="500">
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

        <section id="modern-love-story" class="relative py-24 px-4 sm:px-6 overflow-hidden bg-orange-50">
            <div class="absolute inset-0 z-0 pointer-events-none">
                <img src="{{ asset('images/decoration/awankiri.png') }}" class="animate-on-scroll absolute top-[10%] -left-[5%] w-1/3 opacity-30" data-animation="fadeInLeft">
                <img src="{{ asset('images/decoration/awankanan.png') }}" class="animate-on-scroll absolute top-[30%] -right-[5%] w-1/3 opacity-30" data-animation="fadeInRight">
                <img src="{{ asset('images/decoration/awankiri.png') }}" class="animate-on-scroll absolute bottom-[10%] -left-[10%] w-1/2 opacity-20" data-animation="fadeInLeft" data-delay="200">
            </div>

            <div class="relative z-10 max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="animate-on-scroll font-serif-display text-4xl md:text-5xl text-amber-900" data-animation="fadeInUp">
                        Our Love Story
                    </h2>
                    <p class="animate-on-scroll mt-4 max-w-xl mx-auto text-stone-600" data-animation="fadeInUp" data-delay="200">
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

                <div class="flex flex-col gap-12 md:gap-16">
                    @foreach ($loveStory as $index => $story)
                        @if ($index % 2 === 0)
                            <div class="story-card flex flex-row items-center gap-4 sm:gap-8">
                                <div class="animate-on-scroll image-container w-5/12 p-4 sm:p-6 flex justify-center items-center bg-stone-200/50 rounded-2xl min-h-[220px] sm:min-h-[250px]" data-animation="fadeInLeft" data-delay="{{ $index * 150 }}">
                                    <img src="{{ $storyImages[$index % count($storyImages)] }}" alt="Ornamen Cerita {{ $index + 1 }}" class="w-full h-auto object-contain max-h-[150px] sm:max-h-[200px]">
                                </div>
                                <div class="animate-on-scroll text-container w-7/12 text-left" data-animation="fadeInRight" data-delay="{{ $index * 150 }}">
                                    <span class="block text-amber-800 font-semibold text-base sm:text-lg">{{ $story['date'] }}</span>
                                    <h3 class="font-serif-display text-2xl sm:text-3xl text-stone-800 mt-1 sm:mt-2">{{ $story['title'] }}</h3>
                                    <p class="text-xs sm:text-base mt-2 sm:mt-4 text-stone-600 leading-relaxed">{{ $story['description'] }}</p>
                                </div>
                            </div>
                        @else
                            <div class="story-card flex flex-row-reverse items-center gap-4 sm:gap-8">
                                <div class="animate-on-scroll image-container w-5/12 p-4 sm:p-6 flex justify-center items-center bg-stone-200/50 rounded-2xl min-h-[220px] sm:min-h-[250px]" data-animation="fadeInRight" data-delay="{{ $index * 150 }}">
                                    <img src="{{ $storyImages[$index % count($storyImages)] }}" alt="Ornamen Cerita {{ $index + 1 }}" class="w-full h-auto object-contain max-h-[150px] sm:max-h-[200px]">
                                </div>
                                <div class="animate-on-scroll text-container w-7/12 text-left" data-animation="fadeInLeft" data-delay="{{ $index * 150 }}">
                                    <span class="block text-amber-800 font-semibold text-base sm:text-lg">{{ $story['date'] }}</span>
                                    <h3 class="font-serif-display text-2xl sm:text-3xl text-stone-800 mt-1 sm:mt-2">{{ $story['title'] }}</h3>
                                    <p class="text-xs sm:text-base mt-2 sm:mt-4 text-stone-600 leading-relaxed">{{ $story['description'] }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>

        <section id="hadiah-terakhir" class="relative bg-orange-50 py-24 px-4 overflow-hidden">
    <div class="absolute inset-0 z-0 pointer-events-none">
        <img src="{{ asset('images/decoration/awankiri.png') }}" class="animate-on-scroll absolute top-0 -left-1/4 w-2/3 opacity-30" data-animation="fadeInLeft">
        <img src="{{ asset('images/decoration/awankanan.png') }}" class="animate-on-scroll absolute bottom-0 -right-1/4 w-2/3 opacity-30" data-animation="fadeInRight">
        <img src="{{ asset('/images/decoration/bawah.png') }}" class="animate-on-scroll absolute bottom-0 left-1/2 -translate-x-1/2 w-full max-w-lg z-30" data-animation="fadeInUp" data-delay="200">
    </div>

    <div class="relative z-10 text-center max-w-4xl mx-auto">
        <h2 class="animate-on-scroll font-serif-display text-5xl text-amber-900" style="text-shadow: 1px 1px 3px rgba(120, 53, 15, 0.2);" data-animation="fadeInUp">
            Tanda Kasih
        </h2>
        <p class="animate-on-scroll mt-4 max-w-xl mx-auto text-stone-600" data-animation="fadeInUp" data-delay="200">
            Doa restu Anda merupakan karunia yang sangat berarti bagi kami. Namun jika memberi adalah ungkapan tanda kasih, Anda dapat melakukannya melalui pilihan di bawah ini.
        </p>

        <div class="mt-12 flex flex-col items-center gap-8">

            @foreach ($rekeningBank as $index => $rekening)
                <div class="animate-on-scroll w-full max-w-md mx-auto" data-animation="fadeInUp" data-delay="{{ $index * 150 }}">
                    <div class="relative transform transition duration-500 hover:scale-[1.015] hover:-translate-y-1">
                        <div class="relative w-full aspect-video bg-white rounded-2xl shadow-lg p-6 flex flex-col justify-between ring-1 ring-stone-200 text-gray-800">
                            <div class="flex justify-between items-start">
                                <img src="{{ asset('images/logos/pin.png') }}" alt="Pin" class="w-14 h-14">
                                <img src="{{ $rekening['logo'] }}" alt="Logo {{ $rekening['bank'] }}" class="h-16 object-contain drop-shadow-sm">
                            </div>
                            <div class="mt-4">
                                <p class="text-2xl lg:text-3xl tracking-widest font-mono text-slate-900 whitespace-nowrap overflow-x-auto" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">
                                    {{ trim(chunk_split($rekening['nomor'], 4, ' ')) }}
                                </p>
                            </div>
                            <div class="mt-3 flex justify-between items-center">
                                <p class="text-lg font-semibold uppercase tracking-wide text-slate-800">{{ $rekening['nama'] }}</p>
                                <svg class="w-8 h-8 text-amber-900/80" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="2.5" stroke="currentColor" fill="none">
                                    <path d="M25.46,32a6.49,6.49,0,0,1,6.49-6.49" />
                                    <path d="M25.46,32a12.3,12.3,0,0,1,12.3-12.3" />
                                    <path d="M25.46,32a18.12,18.12,0,0,1,18.12-18.12" />
                                </svg>
                            </div>
                            <button data-rekening-nomor="{{ $rekening['nomor'] }}" class="salin-btn-rekening mt-5 w-full bg-amber-700 hover:bg-amber-800 text-white font-semibold py-2.5 rounded-xl shadow-md transition hover:shadow-lg text-sm tracking-wide">
                                Salin Nomor
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="animate-on-scroll w-full max-w-md mx-auto" data-animation="fadeInUp" data-delay="{{ count($rekeningBank) * 150 }}">
                <div class="relative bg-white/70 backdrop-blur-xl border border-white/20 shadow-xl rounded-2xl overflow-hidden transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl">
                    <div class="p-8 pb-0 text-center">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-amber-100 shadow-inner">
                            <svg class="h-8 w-8 text-amber-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H7.5a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A3.375 3.375 0 006.375 8.25v2.25H17.625v-2.25A3.375 3.375 0 0012 4.875z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18.75h12M6 15h12" />
                            </svg>
                        </div>
                        <h3 class="mt-6 text-2xl font-serif-display text-amber-900 tracking-wide">
                            Kirim Hadiah Fisik
                        </h3>
                    </div>
                    <div class="p-8 text-center space-y-4">
                        <div class="text-stone-700">
                            <p class="text-sm">Untuk:</p>
                            <p class="mt-1 text-lg font-semibold text-stone-900">{{ $namaLengkapWanita }}</p>
                        </div>
                        <div class="text-sm text-stone-600 bg-white/80 border border-stone-200 rounded-lg p-4 leading-relaxed">
                            {{ $alamatLokasi }}
                        </div>
                    </div>
                    <div class="bg-white/60 px-6 py-4 border-t border-stone-200">
                        <button data-alamat="{{ $alamatLokasi }}" class="salin-btn-alamat group flex w-full items-center justify-center gap-3 bg-amber-800 hover:bg-amber-900 text-white font-medium py-3 px-6 rounded-lg shadow-lg transition-all duration-300 hover:shadow-amber-900/40">
                            <svg class="h-5 w-5 opacity-80 transition-transform duration-300 group-hover:scale-110" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.353-.026.692-.026 1.038 0 .346.026.685.026 1.038 0 1.13.094 1.976 1.057 1.976 2.192V7.5M8.25 7.5h7.5M8.25 7.5V9a.75.75 0 00.75.75h6a.75.75 0 00.75-.75V7.5m-9 7.5h9A1.5 1.5 0 0018 13.5V9a1.5 1.5 0 00-1.5-1.5h-9A1.5 1.5 0 006 9v4.5A1.5 1.5 0 007.5 15z" />
                            </svg>
                            <span>Salin Alamat</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

        <section id="final-section" class="relative bg-orange-50 py-24 px-4 sm:px-8 overflow-hidden">
            <div class="absolute inset-0 z-0 pointer-events-none">
                <img src="{{ asset('images/decoration/ataskiri.png') }}" class="animate-on-scroll absolute top-0 left-0 w-[45%]" data-animation="fadeInDown">
                <img src="{{ asset('images/decoration/ataskanan.png') }}" class="animate-on-scroll absolute top-0 right-0 w-[45%]" data-animation="fadeInDown">
                <img src="{{ asset('images/decoration/wayangkiri.png') }}" class="animate-on-scroll absolute bottom-0 left-0 w-1/2 sm:w-1/3 md:w-[26%] max-w-[120px] md:max-w-xs" data-animation="fadeInUp" data-delay="200">
                <img src="{{ asset('images/decoration/wayangkanan.png') }}" class="animate-on-scroll absolute bottom-0 right-0 w-1/2 sm:w-1/3 md:w-[26%] max-w-[120px] md:max-w-xs" data-animation="fadeInUp" data-delay="200">
                <img src="{{ asset('images/decoration/bawah.png') }}" class="animate-on-scroll absolute bottom-0 left-1/2 -translate-x-1/2 w-full max-w-md md:max-w-lg z-20" data-animation="fadeInUp">
            </div>

            <div class="relative z-10 max-w-3xl mx-auto space-y-20">
                <div class="animate-on-scroll rounded-2xl bg-white/50 backdrop-blur-lg border-white/20 px-6 py-10 shadow-lg" data-animation="zoomIn">
                    <img src="{{ asset('images/decoration/tengah.png') }}" class="animate-on-scroll h-16 sm:h-20 mx-auto mb-4 opacity-80" data-animation="zoomIn" data-delay="200">
                    <h2 class="animate-on-scroll font-serif-display text-4xl sm:text-5xl text-amber-900" data-animation="fadeInUp" data-delay="300">Konfirmasi Kehadiran</h2>
                    <p class="animate-on-scroll mt-2 text-base text-stone-700" data-animation="fadeInUp" data-delay="400">Mohon konfirmasi kehadiran Anda untuk kelancaran acara kami.</p>

                    <form id="final-rsvp-form" action="{{ route('rsvp.store') }}" method="POST" class="mt-8 space-y-6 text-left">
                        @csrf
                        <div class="animate-on-scroll" data-animation="fadeInUp" data-delay="500">
                            <input type="text" name="nama" required
                                class="w-full px-5 py-3 rounded-xl border border-stone-300 bg-white/80 focus:ring-2 focus:ring-amber-500 focus:outline-none"
                                value="{{ old('nama', $namaTamu) }}" placeholder="Nama Anda">
                        </div>
                        <div class="animate-on-scroll" data-animation="fadeInUp" data-delay="600">
                            <textarea name="pesan" rows="3"
                                class="w-full px-5 py-3 rounded-xl border border-stone-300 bg-white/80 focus:ring-2 focus:ring-amber-500 focus:outline-none"
                                placeholder="Tuliskan pesan dan doa terbaik Anda..."></textarea>
                        </div>
                        <div class="animate-on-scroll flex flex-col sm:flex-row sm:items-center sm:gap-4 gap-4" data-animation="fadeInUp" data-delay="700">
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

                <div class="animate-on-scroll w-full" data-animation="zoomIn">
                    <div class="h-px bg-gradient-to-r from-transparent via-stone-400 to-transparent"></div>
                </div>

                <div class="animate-on-scroll relative z-10 px-2 md:px-4" data-animation="fadeInUp">
                    <h3 class="font-serif-display text-3xl md:text-4xl text-amber-900 mb-6">Papan Ucapan</h3>
                    <div id="final-rsvp-container" class="space-y-4 max-w-2xl mx-auto">
                        @foreach ($rsvps as $rsvp)
                            <div class="animate-on-scroll final-rsvp-card bg-white/80 backdrop-blur-md p-4 rounded-xl shadow-md text-left" data-animation="fadeInUp">
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
            <div class="absolute inset-0 z-30 pointer-events-none">
                <img src="{{ asset('images/decoration/awankiri.png') }}" alt="Awan Kiri" class="animate-on-scroll absolute top-[5%] left-0 w-1/2 md:w-1/3 opacity-40 -translate-x-1/4" data-animation="fadeInLeft">
                <img src="{{ asset('images/decoration/awankanan.png') }}" alt="Awan Kanan" class="animate-on-scroll absolute top-[5%] right-0 w-1/2 md:w-1/3 opacity-40 translate-x-1/4" data-animation="fadeInRight">
                <img src="{{ asset('images/decoration/ataskiri.png') }}" alt="Hiasan Atas Kiri" class="animate-on-scroll absolute top-0 left-0 w-[45%]" data-animation="fadeInDown">
                <img src="{{ asset('images/decoration/ataskanan.png') }}" alt="Hiasan Atas Kanan" class="animate-on-scroll absolute top-0 right-0 w-[45%]" data-animation="fadeInDown">
                <img src="{{ asset('images/decoration/wayangkiri.png') }}"alt="Wayang Kiri"class="animate-on-scroll z-30 absolute bottom-0 -left-15 w-1/2 sm:w-1/3 md:w-[28%] max-w-[140px] sm:max-w-[180px] md:max-w-xs object-contain" data-animation="fadeInUp">
                <img src="{{ asset('images/decoration/wayangkanan.png') }}"alt="Wayang Kanan"class="animate-on-scroll z-30 absolute bottom-0 -right-15 w-1/2 sm:w-1/3 md:w-[28%] max-w-[140px] sm:max-w-[180px] md:max-w-xs object-contain" data-animation="fadeInUp">
            </div>

            <div class="absolute inset-0 flex items-center justify-center z-10 pointer-events-none">
                <img src="{{ asset('images/decoration/tengah.png') }}" alt="Hiasan Tengah" class="animate-on-scroll w-full max-w-lg opacity-30" data-animation="zoomIn">
            </div>

            <div class="animate-on-scroll relative w-full max-w-3xl bg-white/50 backdrop-blur-lg rounded-2xl shadow-xl p-8 text-center z-20 border border-white/20" data-animation="zoomIn" data-delay="200">
                 <img src="{{ asset('images/decoration/bawah.png') }}" alt="Hiasan Bawah" class="animate-on-scroll w-full max-w-xs mx-auto" data-animation="fadeInUp" data-delay="300">
                <p class="animate-on-scroll text-base text-stone-800 font-serif leading-relaxed mt-4" data-animation="fadeInUp" data-delay="400">
                    Merupakan suatu kebahagiaan dan kehormatan bagi kami, apabila Bapak/Ibu/Saudara/i, berkenan hadir dan memberikan do'a restu kepada kedua mempelai.
                </p>
                <h3 class="animate-on-scroll font-serif-display text-3xl md:text-4xl text-amber-900 mt-8 mb-10" data-animation="fadeInUp" data-delay="500">
                    Wassalamu'alaikum Warahmatullahi Wabarakatuh
                </h3>
                <div class="animate-on-scroll flex flex-row justify-center items-start text-center space-x-8 mt-8" data-animation="fadeInUp" data-delay="600">
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
                <div class="animate-on-scroll mt-12 pt-8 border-t border-white/40" data-animation="fadeInUp" data-delay="700">
                    <p class="text-sm font-serif text-stone-700/90">
                        Music :
                    </p>
                    <p class="mt-1 text-xs text-stone-800 tracking-wider">
                        Denny Caknan Feat Bella Bonita - Sinarengan
                    </p>
                </div>
            </div>

            <div class="absolute inset-0 flex items-end justify-center z-30 pointer-events-none">
                <img src="{{ asset('images/decoration/bawah.png') }}" alt="Hiasan Bawah" class="animate-on-scroll w-full max-w-md" data-animation="fadeInUp" data-delay="100">
            </div>

            <div class="fixed bottom-6 right-6 flex flex-col space-y-3 z-50">
                    <a href="#landing" id="home-btn" aria-label="Kembali ke atas" class="w-12 h-12 flex items-center justify-center bg-amber-900/70 hover:bg-amber-900 transition-colors duration-300 text-white rounded-full shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h7.5" />
                        </svg>
                    </a>
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
                    {{$mempelaiWanita}} & {{$mempelaiPria}}
                </h3>
                <p class="text-sm text-stone-400">
                    Crafted with <span class="text-amber-500 transition-transform hover:scale-125 inline-block">♥</span> by
                    <a class="font-semibold text-stone-200 hover:text-amber-400 transition-colors">
                        Ahmad Affandi Sikumbang
                    </a>
                </p>
                <p class="text-xs text-stone-500 mt-3">
                    © 2025. All Rights Reserved.
                </p>
            </div>
        </footer>

    </div>
</div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // =======================================================
            // SKRIP UNTUK DEBUGGING - TANPA ANIMASI TRANSISI
            // =======================================================

            // Penanda untuk animasi landing
            let initialLandingAnimationHasPlayed = false;

            // Elemen-elemen utama
            const bukaButton = document.getElementById('buka-undangan-btn');
            const homeButton = document.getElementById('home-btn');
            const landingSection = document.getElementById('landing');
            const detailSection = document.getElementById('detail-undangan');
            const backgroundMusic = document.getElementById('background-music');

            // Elemen untuk animasi custom
            const wayangLeft = document.getElementById('wayang-left');
            const wayangRight = document.getElementById('wayang-right');
            const rings = document.getElementById('rings');

            // --- FUNGSI NAVIGASI YANG SANGAT DISEDERHANAKAN ---

            function openInvitation() {
                if (backgroundMusic && backgroundMusic.paused) {
                    backgroundMusic.play().catch(e => console.error("Autoplay was prevented:", e));
                }

                // Langsung ubah tampilan tanpa animasi
                landingSection.style.display = 'none';
                detailSection.style.display = 'block';

                // Langsung aktifkan scroll
                document.body.style.overflow = 'auto';
                document.documentElement.style.overflow = 'auto';

                window.scrollTo({ top: 0, behavior: 'instant' });
            }

            function goHome() {
                // Langsung ubah tampilan tanpa animasi
                detailSection.style.display = 'none';
                landingSection.style.display = 'block';

                // Pastikan elemen wayang & cincin terlihat
                if(wayangLeft) wayangLeft.style.opacity = '1';
                if(wayangRight) wayangRight.style.opacity = '1';
                if(rings) rings.style.opacity = '1';

                // Langsung nonaktifkan scroll
                document.body.style.overflow = 'hidden';
                document.documentElement.style.overflow = 'hidden';

                window.scrollTo({ top: 0, behavior: 'instant' });
            }

            // --- LOGIKA UNTUK ANIMASI AWAL (TETAP ADA) ---

            function runEntryAnimation(element, entryAnimation, loopClass, delay) {
                setTimeout(() => {
                    if (!element) return;
                    element.classList.add('animate__animated', entryAnimation);
                    element.style.opacity = '1';

                    element.addEventListener('animationend', () => {
                        element.classList.remove('animate__animated', entryAnimation);
                        element.classList.add(loopClass);
                    }, { once: true });
                }, delay);
            }

            function playLandingAnimations() {
                if (initialLandingAnimationHasPlayed) return;
                runEntryAnimation(wayangLeft, 'animate__fadeInUp', 'is-floating', 800);
                runEntryAnimation(wayangRight, 'animate__fadeInUp', 'is-floating', 800);
                runEntryAnimation(rings, 'animate__fadeIn', 'is-gently-floating', 1200);
                initialLandingAnimationHasPlayed = true;
            }

            // --- PEMASANGAN EVENT LISTENER ---

            playLandingAnimations();

            bukaButton.addEventListener('click', openInvitation);

            if (homeButton) {
                homeButton.addEventListener('click', function(event) {
                    event.preventDefault();
                    goHome();
                });
            }

            // =======================================================
            // INISIALISASI FUNGSI-FUNGSI LAINNYA (TETAP SAMA)
            // =======================================================
            initMusicPlayer('music-toggle-btn', 'background-music', 'play-icon', 'mute-icon');
            initAnimateOnScroll();
            initCopyToClipboard();
            initCountdown();
            initRsvpForm();

            function initAnimateOnScroll() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const element = entry.target;
                            const animation = element.getAttribute('data-animation') || 'fadeInUp';
                            const delay = element.getAttribute('data-delay') || '0';
                            setTimeout(() => {
                                element.style.opacity = '1';
                                element.classList.add('animate__animated', `animate__${animation}`);
                            }, parseInt(delay));
                            observer.unobserve(element);
                        }
                    });
                }, { threshold: 0.1 });
                document.querySelectorAll('.animate-on-scroll').forEach(el => {
                    observer.observe(el);
                });
            }

            function initMusicPlayer(buttonId, audioId, playIconId, muteIconId) {
                const musicButton = document.getElementById(buttonId);
                const audio = document.getElementById(audioId);
                const playIcon = document.getElementById(playIconId);
                const muteIcon = document.getElementById(muteIconId);
                if (!musicButton || !audio || !playIcon || !muteIcon) return;
                const updateButtonState = () => {
                    if (audio.paused) { playIcon.classList.add('hidden'); muteIcon.classList.remove('hidden'); }
                    else { playIcon.classList.remove('hidden'); muteIcon.classList.add('hidden'); }
                };
                audio.addEventListener('play', updateButtonState);
                audio.addEventListener('pause', updateButtonState);
                musicButton.addEventListener('click', () => { if (audio.paused) audio.play(); else audio.pause(); });
                updateButtonState();
            }

            function initCountdown() {
                const daysEl = document.getElementById('days'), hoursEl = document.getElementById('hours'), minutesEl = document.getElementById('minutes'), secondsEl = document.getElementById('seconds');
                if (!daysEl) return;
                const targetDate = new Date("{{ $tanggalAcara }} 09:00:00").getTime();
                const interval = setInterval(() => {
                    const now = new Date().getTime();
                    const gap = targetDate - now;
                    if (gap < 0) {
                        clearInterval(interval);
                        daysEl.innerText = '00'; hoursEl.innerText = '00'; minutesEl.innerText = '00'; secondsEl.innerText = '00';
                        return;
                    }
                    const s = 1000, m = s * 60, h = m * 60, d = h * 24;
                    daysEl.innerText = String(Math.floor(gap / d)).padStart(2, '0');
                    hoursEl.innerText = String(Math.floor((gap % d) / h)).padStart(2, '0');
                    minutesEl.innerText = String(Math.floor((gap % h) / m)).padStart(2, '0');
                    secondsEl.innerText = String(Math.floor((gap % m) / s)).padStart(2, '0');
                }, 1000);
            }

            function initCopyToClipboard() {
                document.querySelectorAll('.salin-btn-rekening').forEach(button => {
                    const originalText = button.innerHTML;
                    button.addEventListener('click', () => {
                        navigator.clipboard.writeText(button.dataset.rekeningNomor).then(() => {
                            button.innerHTML = 'Berhasil Disalin!'; button.disabled = true;
                            setTimeout(() => { button.innerHTML = originalText; button.disabled = false; }, 2000);
                        });
                    });
                });
                document.querySelectorAll('.salin-btn-alamat').forEach(button => {
                    const originalText = button.innerHTML;
                    button.addEventListener('click', () => {
                        navigator.clipboard.writeText(button.dataset.alamat).then(() => {
                            button.innerHTML = 'Berhasil Disalin!'; button.disabled = true;
                            setTimeout(() => { button.innerHTML = originalText; button.disabled = false; }, 2000);
                        });
                    });
                });
            }

            function initRsvpForm() {
                const rsvpForm = document.getElementById('final-rsvp-form');
                if (rsvpForm) {
                    rsvpForm.addEventListener('submit', function(e) {
                        e.preventDefault();
                        const submitButton = document.getElementById('final-submit-btn');
                        const originalButtonText = submitButton.innerHTML;
                        submitButton.innerHTML = '...'; submitButton.disabled = true;
                        fetch(rsvpForm.action, {
                            method: 'POST',
                            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), 'Accept': 'application/json' },
                            body: new FormData(rsvpForm)
                        })
                        .then(response => response.json())
                        .then(data => { if (data.success) { addNewRsvpCard(data.rsvp); rsvpForm.reset(); document.querySelector('#kehadiran').value = 'hadir'; }})
                        .finally(() => { submitButton.innerHTML = originalButtonText; submitButton.disabled = false; });
                    });
                }
            }

            function addNewRsvpCard(rsvp) {
                const cardContainer = document.getElementById('final-rsvp-container');
                if(!cardContainer) return;
                const newCard = document.createElement('div');
                newCard.className = 'final-rsvp-card bg-white/80 p-4 rounded-xl shadow-md text-left animate__animated animate__fadeInDown';
                const kehadiranBadge = rsvp.kehadiran === 'hadir' ? `<span class="text-xs font-semibold bg-green-100 text-green-800 px-3 py-1 rounded-full">Hadir</span>` : `<span class="text-xs font-semibold bg-red-100 text-red-800 px-3 py-1 rounded-full">Tidak Hadir</span>`;
                const pesanHtml = rsvp.pesan ? `<p class="mt-2 text-sm text-stone-700 italic">"${rsvp.pesan}"</p>` : '';
                newCard.innerHTML = `<div class="flex justify-between items-start gap-3"><div><h4 class="font-bold text-stone-800">${rsvp.nama}</h4><p class="text-xs text-stone-500">Baru saja</p></div>${kehadiranBadge}</div>${pesanHtml}`;
                cardContainer.prepend(newCard);
            }
        });
    </script>
</body>
</html>
