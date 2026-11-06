<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae - {{ $personal['name'] }}</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: #0f172a;
        }
        @media print {
            body {
                background-color: #ffffff;
                color: #000000;
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }
            .no-print {
                display: none !important;
            }
            .page-container {
                box-shadow: none !important;
                margin: 0 !important;
                padding: 24px !important;
                width: 100% !important;
                max-width: 100% !important;
            }
        }
    </style>
</head>
<body class="py-8 px-4">

    <!-- Top Action Banner (Hidden when printing) -->
    <div class="no-print max-w-4xl mx-auto mb-6 p-4 rounded-xl bg-slate-900 text-white flex flex-col sm:flex-row items-center justify-between gap-4 shadow-lg border border-slate-700">
        <div class="flex items-center gap-3">
            <a href="{{ route('portfolio') }}" class="px-3 py-1.5 text-xs font-semibold rounded bg-slate-800 hover:bg-slate-700 text-cyan-300 transition-colors flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>Kembali ke Portofolio Cyber</span>
            </a>
            <span class="text-xs text-slate-300">Format Cetak &amp; Ekspor PDF Resmi CV</span>
        </div>
        <button onclick="window.print()" class="px-5 py-2 text-xs font-bold rounded bg-cyan-400 hover:bg-cyan-300 text-black flex items-center gap-2 shadow-md transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
            <span>CETAK / SIMPAN KE PDF (CTRL+P)</span>
        </button>
    </div>

    <!-- Official Printable CV Document Sheet -->
    <div class="page-container max-w-4xl mx-auto bg-white p-8 sm:p-12 shadow-2xl rounded-xl border border-slate-200">
        
        <!-- Header: Name, Contact & Photo -->
        <div class="flex flex-col-reverse sm:flex-row items-start justify-between gap-6 pb-8 border-b-2 border-slate-900">
            <div class="space-y-2 flex-1">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight uppercase">
                    {{ $personal['name'] }}
                </h1>
                <p class="text-sm font-semibold text-cyan-700 tracking-wide">
                    Mahasiswa Sistem Informasi UBSI Kota Tasikmalaya &bull; IPK 3.96 / 4.00
                </p>

                <!-- Contacts -->
                <div class="pt-2 flex flex-wrap gap-x-6 gap-y-1.5 text-xs text-slate-700 font-medium">
                    <span class="inline-flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>{{ $personal['phone_display'] }}</span>
                    </span>
                    <span class="inline-flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>{{ $personal['email'] }}</span>
                    </span>
                    <span class="inline-flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>{{ $personal['location'] }}</span>
                    </span>
                </div>
            </div>

            <!-- Profile Photo (Portrait) -->
            <div class="w-28 h-36 sm:w-32 sm:h-40 rounded-xl overflow-hidden border-4 border-cyan-600 shadow-md flex-shrink-0">
                <img src="{{ $personal['avatar'] }}" alt="{{ $personal['name'] }}" class="w-full h-full object-cover object-[center_20%]">
            </div>
        </div>

        <!-- Body 2-Column Grid -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 pt-8">
            
            <!-- Left Column: Data Pribadi & Keahlian -->
            <div class="md:col-span-5 space-y-6">
                <!-- Data Pribadi Section -->
                <div>
                    <h2 class="text-base font-bold text-slate-900 border-b-2 border-slate-900 pb-1 mb-3 uppercase tracking-wider">
                        Data Pribadi
                    </h2>
                    <table class="w-full text-xs text-slate-700 space-y-1">
                        <tbody>
                            <tr class="py-1">
                                <td class="font-semibold text-slate-900 py-1 pr-2 w-28">Nama</td>
                                <td class="py-1">: {{ $personal['name'] }}</td>
                            </tr>
                            <tr class="py-1">
                                <td class="font-semibold text-slate-900 py-1 pr-2">Tanggal Lahir</td>
                                <td class="py-1">: {{ $personal['birth_date'] }}</td>
                            </tr>
                            <tr class="py-1">
                                <td class="font-semibold text-slate-900 py-1 pr-2">Alamat</td>
                                <td class="py-1">: {{ $personal['location'] }}</td>
                            </tr>
                            <tr class="py-1">
                                <td class="font-semibold text-slate-900 py-1 pr-2">Jenis Kelamin</td>
                                <td class="py-1">: {{ $personal['gender'] }}</td>
                            </tr>
                            <tr class="py-1">
                                <td class="font-semibold text-slate-900 py-1 pr-2">Kewarganegaraan</td>
                                <td class="py-1">: {{ $personal['citizenship'] }}</td>
                            </tr>
                            <tr class="py-1">
                                <td class="font-semibold text-slate-900 py-1 pr-2">Status</td>
                                <td class="py-1 font-medium">: {{ $personal['status'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Keahlian Section -->
                <div>
                    <h2 class="text-base font-bold text-slate-900 border-b-2 border-slate-900 pb-1 mb-3 uppercase tracking-wider">
                        Keahlian
                    </h2>
                    <ul class="text-xs text-slate-700 space-y-2 list-disc list-inside">
                        <li>Menguasai ilmu dasar tentang Pemrograman (PHP, Laravel, Algoritma, DB).</li>
                        <li>Menguasai Ilmu dasar tentang Microsoft Office (Word, Excel, PowerPoint).</li>
                        <li>Terampil dalam mengelola waktu dan mengatur proyek.</li>
                        <li>Memiliki kemampuan untuk berpikir kreatif dan pemecahan masalah.</li>
                    </ul>
                </div>
            </div>

            <!-- Right Column: Pendidikan, Hasil Studi & Pengalaman -->
            <div class="md:col-span-7 space-y-6">
                <!-- Pendidikan Section -->
                <div>
                    <h2 class="text-base font-bold text-slate-900 border-b-2 border-slate-900 pb-1 mb-3 uppercase tracking-wider">
                        Pendidikan
                    </h2>
                    <ul class="space-y-3 text-xs text-slate-700">
                        @foreach ($education as $edu)
                            <li class="border-l-2 border-cyan-600 pl-3">
                                <div class="font-bold text-slate-900 text-sm">{{ $edu['institution'] }}</div>
                                <div class="text-cyan-800 font-medium">{{ $edu['campus'] }} &bull; <span class="text-slate-500">{{ $edu['period'] }} ({{ $edu['role'] }})</span></div>
                                <div class="text-[11px] text-slate-600 mt-0.5">{{ $edu['description'] }}</div>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Ringkasan Hasil Studi Semester Tiap Semester -->
                    <div class="mt-3 p-3 rounded-lg bg-slate-50 border border-slate-200 text-xs">
                        <div class="flex items-center justify-between font-semibold text-slate-900 mb-1.5">
                            <span>Index Prestasi Tiap Semester (IPK: <strong class="text-cyan-800">{{ $academic_records['current_gpa'] }} / 4.00</strong>)</span>
                            <span class="text-[10px] text-slate-500 font-normal">UBSI Tasikmalaya</span>
                        </div>
                        <div class="grid grid-cols-4 gap-2 text-center text-[11px] pt-1.5 border-t border-slate-200">
                            @foreach ($academic_records['semesters'] as $sem)
                                <div class="p-1 rounded bg-white border border-slate-200">
                                    <div class="text-[10px] text-slate-500">{{ $sem['short'] }}</div>
                                    <strong class="text-cyan-800 text-xs">{{ $sem['nilai'] }}</strong>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Pengalaman Section -->
                <div>
                    <h2 class="text-base font-bold text-slate-900 border-b-2 border-slate-900 pb-1 mb-3 uppercase tracking-wider">
                        Pengalaman
                    </h2>
                    <ul class="space-y-3 text-xs text-slate-700">
                        @foreach ($experiences as $exp)
                            <li class="border-l-2 border-cyan-600 pl-3">
                                <div class="font-bold text-slate-900 text-sm">{{ $exp['title'] }}</div>
                                <div class="text-cyan-800 font-semibold">{{ $exp['organization'] }} &bull; <span class="text-slate-500 font-normal">({{ $exp['period'] }})</span></div>
                                <div class="text-[11px] text-slate-600 mt-1">{{ $exp['description'] }}</div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Proyek & Karya Terpilih -->
                <div>
                    <h2 class="text-base font-bold text-slate-900 border-b-2 border-slate-900 pb-1 mb-3 uppercase tracking-wider">
                        Proyek &amp; Karya Terpilih
                    </h2>
                    <ul class="space-y-2 text-xs text-slate-700">
                        @foreach ($projects as $project)
                            <li class="border-l-2 border-slate-400 pl-3">
                                <div class="font-bold text-slate-900">{{ $project['title'] }} <span class="text-[10px] text-cyan-700 font-semibold font-mono">({{ $project['category'] }})</span></div>
                                <div class="text-[11px] text-slate-600 mt-0.5">{{ $project['summary'] }}</div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>

        <!-- Footer stamp -->
        <div class="mt-10 pt-4 border-t border-slate-200 text-center text-[10px] text-slate-400">
            Dihasilkan secara digital oleh Sistem e-CV Shabik Sholahudin berbasis Laravel &bull; Dokumen Resmi &bull; {{ date('d F Y') }}
        </div>
    </div>

</body>
</html>
