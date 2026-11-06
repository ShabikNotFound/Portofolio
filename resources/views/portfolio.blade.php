<!DOCTYPE html>
<html lang="id" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $personal['name'] }} // Cyber e-CV &amp; Portfolio</title>
    
    <!-- Google Fonts: Orbitron, Rajdhani, JetBrains Mono, Space Grotesk -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300;400;600;700&family=Orbitron:wght@500;700;800;900&family=Rajdhani:wght@500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .font-orbitron { font-family: 'Orbitron', sans-serif; }
        .font-rajdhani { font-family: 'Rajdhani', sans-serif; }
        .font-mono-cyber { font-family: 'JetBrains Mono', monospace; }
        .font-body { font-family: 'Space Grotesk', sans-serif; }

        /* Custom Cursor */
        * { cursor: none !important; }
        #cyber-cursor-dot {
            will-change: transform;
            transition: width 0.15s, height 0.15s, background-color 0.15s;
        }
        #cyber-cursor-ring {
            will-change: transform;
            transition: width 0.25s ease-out, height 0.25s ease-out, border-color 0.2s, opacity 0.2s;
        }
        body.cursor-hover #cyber-cursor-dot {
            width: 6px; height: 6px;
            background-color: #fff;
        }
        body.cursor-hover #cyber-cursor-ring {
            width: 44px; height: 44px;
            border-color: rgba(34,211,238,0.9);
            box-shadow: 0 0 10px rgba(34,211,238,0.4), 0 0 2px rgba(34,211,238,0.6) inset;
        }
        body.cursor-click #cyber-cursor-dot {
            width: 10px; height: 10px;
            background-color: #f0abfc;
        }
        body.cursor-click #cyber-cursor-ring {
            width: 20px; height: 20px;
            border-color: rgba(240,171,252,0.9);
        }
    </style>
</head>
<body class="bg-[#07090e] text-slate-200 font-body selection:bg-cyan-500 selection:text-black min-h-screen relative overflow-x-hidden cyber-grid">

    <!-- Subtle Background Glows -->
    <div class="fixed top-0 left-1/4 w-96 h-96 bg-cyan-600/10 rounded-full blur-[140px] pointer-events-none -z-10"></div>
    <div class="fixed bottom-10 right-10 w-96 h-96 bg-fuchsia-600/10 rounded-full blur-[160px] pointer-events-none -z-10"></div>
    <div class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] bg-blue-600/5 rounded-full blur-[200px] pointer-events-none -z-10"></div>

    <!-- Scanline Subtle Overlay -->
    <div class="fixed inset-0 cyber-scanlines opacity-25 pointer-events-none z-40"></div>

    <!-- Clean Semi-Cyberpunk Navigation Bar -->
    <header class="sticky top-0 z-50 backdrop-blur-xl bg-[#07090e]/85 border-b border-cyan-500/20 shadow-lg shadow-black/40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <!-- Brand / Cyber Identity -->
            <a href="#hero" class="flex items-center gap-2.5 cyber-sfx-btn group">
                <div class="w-8 h-8 rounded bg-cyan-950/80 border border-cyan-500/40 flex items-center justify-center text-cyan-300 font-bold font-orbitron text-xs shadow-sm shadow-cyan-500/20 group-hover:border-cyan-400 group-hover:text-cyan-200 transition-all">
                    SS
                </div>
                <div class="flex items-center gap-2">
                    <span class="font-orbitron font-bold tracking-wider text-white text-sm group-hover:text-cyan-400 transition-colors">
                        SHABIK<span class="text-cyan-400">.DEV</span>
                    </span>
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse" title="System Status: Online"></span>
                </div>
            </a>

            <!-- Clean Navigation Links -->
            <nav class="hidden md:flex items-center gap-1 lg:gap-2 text-xs font-mono-cyber text-slate-300">
                <a href="#bio" class="px-3 py-1.5 rounded-md hover:text-cyan-300 hover:bg-cyan-950/40 transition-colors cyber-sfx-btn">
                    Bio
                </a>
                <a href="#keahlian" class="px-3 py-1.5 rounded-md hover:text-cyan-300 hover:bg-cyan-950/40 transition-colors cyber-sfx-btn">
                    Keahlian
                </a>
                <a href="#pengalaman" class="px-3 py-1.5 rounded-md hover:text-cyan-300 hover:bg-cyan-950/40 transition-colors cyber-sfx-btn">
                    Pengalaman
                </a>
                <a href="#pendidikan" class="px-3 py-1.5 rounded-md hover:text-cyan-300 hover:bg-cyan-950/40 transition-colors cyber-sfx-btn">
                    Pendidikan
                </a>
                <a href="#proyek" class="px-3 py-1.5 rounded-md hover:text-cyan-300 hover:bg-cyan-950/40 transition-colors cyber-sfx-btn">
                    Proyek
                </a>
                <a href="#terminal" class="px-3 py-1.5 rounded-md hover:text-cyan-300 hover:bg-cyan-950/40 transition-colors cyber-sfx-btn">
                    Terminal
                </a>
                <a href="#kontak" class="px-3 py-1.5 rounded-md hover:text-cyan-300 hover:bg-cyan-950/40 transition-colors cyber-sfx-btn">
                    Kontak
                </a>
            </nav>

            <!-- Actions / Controls -->
            <div class="flex items-center gap-2.5 sm:gap-3">
                <!-- Clock Indicator (Clean) -->
                <span id="cyber-clock" class="hidden xl:inline-block text-[11px] font-mono-cyber text-slate-400 bg-slate-900/60 px-2.5 py-1 rounded border border-slate-800">
                    --:-- WIB
                </span>

                <!-- Compact Audio SFX Toggle -->
                <button id="audio-toggle-btn" class="cyber-sfx-btn p-2 rounded-lg border border-slate-800 bg-slate-900/50 text-slate-400 hover:border-cyan-500/40 hover:text-cyan-300 transition-all text-xs" title="Toggle Suara Cyber SFX">
                    <svg id="audio-toggle-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                    </svg>
                </button>

                <!-- Clean Cetak / PDF CV Button -->
                <a href="{{ route('cv.print') }}" target="_blank" class="cyber-sfx-btn px-3.5 py-1.5 text-xs font-mono-cyber font-semibold text-black bg-cyan-400 hover:bg-cyan-300 rounded-md transition-all flex items-center gap-1.5 shadow-md shadow-cyan-500/20">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    <span>PDF CV</span>
                </a>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-toggle" class="md:hidden p-2 rounded-lg border border-slate-800 bg-slate-900/50 text-slate-400 hover:text-white" title="Menu Navigasi">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Dropdown Menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-slate-800/80 bg-[#07090e]/95 px-4 py-3 space-y-1 text-xs font-mono-cyber">
            <a href="#bio" class="block py-2 px-3 rounded hover:bg-cyan-950/40 hover:text-cyan-300 text-slate-300">Bio</a>
            <a href="#keahlian" class="block py-2 px-3 rounded hover:bg-cyan-950/40 hover:text-cyan-300 text-slate-300">Keahlian</a>
            <a href="#pengalaman" class="block py-2 px-3 rounded hover:bg-cyan-950/40 hover:text-cyan-300 text-slate-300">Pengalaman</a>
            <a href="#pendidikan" class="block py-2 px-3 rounded hover:bg-cyan-950/40 hover:text-cyan-300 text-slate-300">Pendidikan</a>
            <a href="#proyek" class="block py-2 px-3 rounded hover:bg-cyan-950/40 hover:text-cyan-300 text-slate-300">Proyek</a>
            <a href="#terminal" class="block py-2 px-3 rounded hover:bg-cyan-950/40 hover:text-cyan-300 text-slate-300">Terminal</a>
            <a href="#kontak" class="block py-2 px-3 rounded hover:bg-cyan-950/40 hover:text-cyan-300 text-slate-300">Kontak</a>
        </div>
    </header>

    <!-- MAIN CONTENT CONTAINER -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-24">

        <!-- ================= HERO SECTION ================= -->
        <section id="hero" class="relative pt-6 pb-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <!-- Left Details & Typography -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded border border-cyan-500/30 bg-cyan-950/40 text-cyan-300 text-xs font-mono-cyber">
                        <span class="w-2 h-2 bg-emerald-400 rounded-full animate-ping"></span>
                        <span>[ STATUS: MAHASISWA UBSI KOTA TASIKMALAYA ]</span>
                    </div>

                    <div class="space-y-2">
                        <div class="text-xs uppercase font-mono-cyber tracking-widest text-cyan-400 flex items-center gap-2">
                            <span>// PROTOKOL IDENTITAS PENGGUNA</span>
                            <span class="h-px bg-cyan-500/30 flex-1"></span>
                        </div>
                        <h1 class="text-4xl sm:text-5xl md:text-6xl font-black font-orbitron tracking-tight text-white leading-none">
                            {{ $personal['name'] }}
                        </h1>
                        <p class="text-xl sm:text-2xl font-rajdhani font-semibold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-sky-300 to-fuchsia-400">
                            {{ $personal['headline'] }}
                        </p>
                    </div>

                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed border-l-2 border-cyan-500/50 pl-4 py-1 bg-cyan-950/10">
                        {{ $personal['bio'] }}
                    </p>

                    <!-- Quick Highlights Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-2">
                        <div class="p-3 rounded border border-slate-800 bg-[#0c101a]/80 backdrop-blur">
                            <div class="text-[10px] font-mono-cyber text-slate-400 uppercase">Kampus</div>
                            <div class="font-rajdhani font-bold text-white text-base">UBSI Tasikmalaya</div>
                        </div>
                        <div class="p-3 rounded border border-slate-800 bg-[#0c101a]/80 backdrop-blur">
                            <div class="text-[10px] font-mono-cyber text-slate-400 uppercase">Peran Organisasi</div>
                            <div class="font-rajdhani font-bold text-cyan-400 text-base">Divisi Litbang 2024/2026</div>
                        </div>
                        <div class="p-3 rounded border border-slate-800 bg-[#0c101a]/80 backdrop-blur col-span-2 sm:col-span-1">
                            <div class="text-[10px] font-mono-cyber text-slate-400 uppercase">Keahlian Inti</div>
                            <div class="font-rajdhani font-bold text-yellow-400 text-base">PHP &amp; Laravel Stack</div>
                        </div>
                    </div>

                    <!-- Call to Actions -->
                    <div class="flex flex-wrap items-center gap-4 pt-3">
                        <a href="{{ $personal['whatsapp_url'] }}" target="_blank" class="cyber-sfx-btn px-6 py-3 font-orbitron text-xs font-bold tracking-wider text-black bg-cyan-400 hover:bg-cyan-300 transition-all cyber-cut flex items-center gap-2 shadow-lg shadow-cyan-500/25 group">
                            <span>HUBUNGI VIA WHATSAPP</span>
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>

                        <a href="#terminal" class="cyber-sfx-btn px-6 py-3 font-mono-cyber text-xs font-semibold tracking-wider text-cyan-300 border border-cyan-500/40 bg-cyan-950/30 hover:bg-cyan-900/40 hover:border-cyan-400 transition-all cyber-cut flex items-center gap-2">
                            <span>&gt;_ BUKA TERMINAL</span>
                        </a>

                        <button onclick="window.copyToClipboard('{{ $personal['email'] }}', 'Alamat email {{ $personal['email'] }} berhasil disalin!')" class="cyber-sfx-btn p-3 rounded border border-slate-800 bg-slate-900/70 text-slate-300 hover:text-white hover:border-slate-600 transition-all text-xs font-mono-cyber flex items-center gap-1.5" title="Salin Email">
                            <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                            <span>SALIN EMAIL</span>
                        </button>
                    </div>
                </div>

                <!-- Right Cyber Profile Hologram Card -->
                <div class="lg:col-span-5 flex justify-center">
                    <div class="relative w-full max-w-sm">
                        <!-- Cyber Frame Edge Accents -->
                        <div class="absolute -top-3 -left-3 w-8 h-8 border-t-2 border-l-2 border-cyan-400 pointer-events-none"></div>
                        <div class="absolute -top-3 -right-3 w-8 h-8 border-t-2 border-r-2 border-fuchsia-400 pointer-events-none"></div>
                        <div class="absolute -bottom-3 -left-3 w-8 h-8 border-b-2 border-l-2 border-fuchsia-400 pointer-events-none"></div>
                        <div class="absolute -bottom-3 -right-3 w-8 h-8 border-b-2 border-r-2 border-cyan-400 pointer-events-none"></div>

                        <!-- Card Interior -->
                        <div class="relative bg-gradient-to-b from-[#0f1422] to-[#090c14] border border-cyan-500/30 p-6 cyber-cut shadow-2xl shadow-cyan-950/60 overflow-hidden">
                            <!-- Glitch Header Line -->
                            <div class="flex items-center justify-between text-[10px] font-mono-cyber text-cyan-400/80 pb-4 border-b border-cyan-500/20 mb-5">
                                <span>ID: SHBK-2005-1001</span>
                                <span class="text-fuchsia-400">CLEARANCE: DEV_LVL4</span>
                            </div>

                            <!-- Avatar with Cyber Hologram Portrait Frame -->
                            <div class="relative mx-auto w-56 sm:w-64 aspect-[4/5] mb-6">
                                <div class="absolute -inset-2 border border-cyan-400/30 cyber-cut pointer-events-none"></div>
                                <div class="absolute -inset-1 border border-fuchsia-400/30 cyber-cut-sm pointer-events-none"></div>
                                <div class="relative w-full h-full rounded-xl overflow-hidden border-2 border-cyan-400 shadow-xl shadow-cyan-500/30 bg-slate-900 cyber-cut">
                                    <img src="{{ $personal['avatar'] }}" alt="{{ $personal['name'] }}" class="w-full h-full object-cover object-[center_20%] hover:scale-105 transition-transform duration-500">
                                    <!-- Scanline bar -->
                                    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-cyan-400/10 to-transparent glitch-bar pointer-events-none"></div>
                                    <!-- Cyber HUD Badges -->
                                    <div class="absolute top-2 left-2 text-[9px] font-mono-cyber text-cyan-400 bg-black/80 px-2 py-0.5 rounded border border-cyan-500/40">
                                        FRAME // PORTRAIT
                                    </div>
                                    <div class="absolute bottom-2 right-2 bg-black/90 border border-cyan-400 text-cyan-300 font-mono-cyber text-[10px] px-2.5 py-0.5 rounded-full flex items-center gap-1.5 shadow-md">
                                        <span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-ping"></span>
                                        <span>LIVE</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Telemetry Bio Data List -->
                            <div class="space-y-2 text-xs font-mono-cyber">
                                <div class="flex justify-between items-center py-1 border-b border-slate-800">
                                    <span class="text-slate-400">OPERATOR:</span>
                                    <span class="text-white font-semibold">{{ $personal['name'] }}</span>
                                </div>
                                <div class="flex justify-between items-center py-1 border-b border-slate-800">
                                    <span class="text-slate-400">STATUS:</span>
                                    <span class="text-emerald-400 font-semibold">{{ $personal['status'] }}</span>
                                </div>
                                <div class="flex justify-between items-center py-1 border-b border-slate-800">
                                    <span class="text-slate-400">ORGANIZATION:</span>
                                    <span class="text-cyan-300">HiMASI UBSI</span>
                                </div>
                                <div class="flex justify-between items-center py-1">
                                    <span class="text-slate-400">KOMUNIKASI:</span>
                                    <span class="text-yellow-400">{{ $personal['phone'] }}</span>
                                </div>
                            </div>

                            <!-- Bottom Terminal Footer -->
                            <div class="mt-5 pt-3 border-t border-cyan-500/20 text-center">
                                <span class="text-[11px] font-mono-cyber text-slate-500">SYSTEM ARCHITECTURE: PHP 8.4 // LARAVEL 12</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ================= SECTION 01: DATA PRIBADI (BIO MATRIX) ================= -->
        <section id="bio" class="relative scroll-mt-20">
            <div class="flex items-center gap-3 mb-8">
                <span class="text-cyan-400 font-mono-cyber text-xl font-bold">// 01</span>
                <h2 class="text-2xl sm:text-3xl font-black font-orbitron tracking-wide text-white">
                    DATA PRIBADI <span class="text-cyan-400">[BIO MATRIX]</span>
                </h2>
                <div class="h-px bg-cyan-500/20 flex-1"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Personal Identity Parameters -->
                <div class="p-6 rounded border border-cyan-500/30 bg-[#0b0f19]/90 cyber-cut relative">
                    <div class="text-xs font-mono-cyber text-cyan-400 uppercase tracking-wider mb-4 flex items-center justify-between">
                        <span>IDENTITAS UTAMA</span>
                        <span class="text-slate-500">PAR-ID: BIO-01</span>
                    </div>

                    <div class="space-y-3.5 text-sm">
                        <div class="flex flex-col sm:flex-row sm:justify-between py-2 border-b border-slate-800">
                            <span class="text-slate-400 font-mono-cyber text-xs">Nama Lengkap</span>
                            <span class="text-white font-semibold font-rajdhani text-base">{{ $personal['name'] }}</span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between py-2 border-b border-slate-800">
                            <span class="text-slate-400 font-mono-cyber text-xs">Tanggal Lahir / Usia</span>
                            <span class="text-cyan-300 font-mono-cyber">{{ $personal['birth_date'] }} ({{ $personal['age'] }} Tahun)</span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between py-2 border-b border-slate-800">
                            <span class="text-slate-400 font-mono-cyber text-xs">Alamat Domisili</span>
                            <span class="text-white font-semibold">{{ $personal['location'] }}</span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between py-2 border-b border-slate-800">
                            <span class="text-slate-400 font-mono-cyber text-xs">Jenis Kelamin</span>
                            <span class="text-slate-200">{{ $personal['gender'] }}</span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between py-2 border-b border-slate-800">
                            <span class="text-slate-400 font-mono-cyber text-xs">Kewarganegaraan</span>
                            <span class="text-slate-200">{{ $personal['citizenship'] }}</span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between py-2">
                            <span class="text-slate-400 font-mono-cyber text-xs">Status</span>
                            <span class="text-emerald-400 font-mono-cyber font-semibold">{{ $personal['status'] }}</span>
                        </div>
                    </div>
                </div>

                <!-- Communication Transmission Channels -->
                <div class="p-6 rounded border border-cyan-500/30 bg-[#0b0f19]/90 cyber-cut flex flex-col justify-between">
                    <div>
                        <div class="text-xs font-mono-cyber text-cyan-400 uppercase tracking-wider mb-4 flex items-center justify-between">
                            <span>SALURAN TRANSMISI &amp; KONTAK</span>
                            <span class="text-slate-500">COM-NODE: 02</span>
                        </div>

                        <div class="space-y-4">
                            <!-- Phone / WA -->
                            <div class="p-3.5 rounded border border-slate-800 bg-[#070a12] flex items-center justify-between">
                                <div>
                                    <div class="text-[10px] font-mono-cyber text-slate-400">NOMOR TELEPON / WHATSAPP</div>
                                    <div class="text-base font-bold font-mono-cyber text-yellow-400">{{ $personal['phone_display'] }}</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <a href="{{ $personal['whatsapp_url'] }}" target="_blank" class="cyber-sfx-btn px-2.5 py-1 text-xs font-mono-cyber bg-emerald-600 hover:bg-emerald-500 text-white rounded">
                                        CHAT WA
                                    </a>
                                    <button onclick="window.copyToClipboard('{{ $personal['phone'] }}', 'Nomor telepon {{ $personal['phone'] }} berhasil disalin!')" class="cyber-sfx-btn p-1.5 border border-slate-700 hover:border-cyan-400 text-slate-400 hover:text-cyan-400 rounded transition-colors" title="Salin Nomor">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="p-3.5 rounded border border-slate-800 bg-[#070a12] flex items-center justify-between">
                                <div>
                                    <div class="text-[10px] font-mono-cyber text-slate-400">SURAT ELEKTRONIK (EMAIL)</div>
                                    <div class="text-base font-bold font-mono-cyber text-cyan-300 break-all">{{ $personal['email'] }}</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <a href="mailto:{{ $personal['email'] }}" class="cyber-sfx-btn px-2.5 py-1 text-xs font-mono-cyber bg-cyan-600 hover:bg-cyan-500 text-black font-semibold rounded">
                                        KIRIM
                                    </a>
                                    <button onclick="window.copyToClipboard('{{ $personal['email'] }}', 'Alamat email {{ $personal['email'] }} berhasil disalin!')" class="cyber-sfx-btn p-1.5 border border-slate-700 hover:border-cyan-400 text-slate-400 hover:text-cyan-400 rounded transition-colors" title="Salin Email">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Location Node -->
                            <div class="p-3.5 rounded border border-slate-800 bg-[#070a12] flex items-center justify-between">
                                <div>
                                    <div class="text-[10px] font-mono-cyber text-slate-400">ZONA GEOGRAFIS</div>
                                    <div class="text-sm font-semibold text-slate-200">Rajapolah, Tasikmalaya, Jawa Barat, Indonesia</div>
                                </div>
                                <span class="px-2 py-0.5 text-[10px] font-mono-cyber rounded bg-cyan-950 text-cyan-400 border border-cyan-500/30">WIB (UTC+7)</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-t border-slate-800 flex items-center justify-between text-xs font-mono-cyber text-slate-400">
                        <span>DATA RESMI VALID</span>
                        <a href="{{ route('cv.print') }}" target="_blank" class="text-cyan-400 hover:underline flex items-center gap-1">
                            <span>LIHAT VERSI DOKUMEN CV RESMI</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= SECTION 02: KEAHLIAN & MATRIKS KOMPETENSI ================= -->
        <section id="keahlian" class="relative scroll-mt-20">
            <div class="flex items-center gap-3 mb-8">
                <span class="text-cyan-400 font-mono-cyber text-xl font-bold">// 02</span>
                <h2 class="text-2xl sm:text-3xl font-black font-orbitron tracking-wide text-white">
                    KEAHLIAN &amp; KOMPETENSI <span class="text-cyan-400">[SKILL MATRIX]</span>
                </h2>
                <div class="h-px bg-cyan-500/20 flex-1"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Group 1: Technical & Programming -->
                <div class="p-6 rounded border border-cyan-500/30 bg-[#0b0f19]/90 cyber-cut space-y-5">
                    <div class="flex items-center justify-between pb-3 border-b border-cyan-500/20">
                        <div class="flex items-center gap-2">
                            <div class="w-2.5 h-2.5 bg-cyan-400 rounded-sm"></div>
                            <h3 class="font-orbitron font-bold text-white text-sm tracking-wider">TEKNOLOGI &amp; KODING</h3>
                        </div>
                        <span class="text-[10px] font-mono-cyber text-cyan-400">SYS_DEV</span>
                    </div>

                    <div class="space-y-4">
                        @foreach ($skills['technical'] as $skill)
                            <div class="space-y-1.5">
                                <div class="flex justify-between items-center text-xs">
                                    <span class="font-semibold text-slate-200">{{ $skill['name'] }}</span>
                                    <span class="font-mono-cyber text-cyan-400">{{ $skill['level'] }}%</span>
                                </div>
                                <div class="w-full h-2 bg-slate-900 rounded-full overflow-hidden border border-slate-800">
                                    <div class="h-full bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full" style="width: {{ $skill['level'] }}%"></div>
                                </div>
                                <p class="text-[11px] text-slate-400 leading-tight">{{ $skill['desc'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Group 2: Productivity Tools -->
                <div class="p-6 rounded border border-fuchsia-500/30 bg-[#0b0f19]/90 cyber-cut space-y-5">
                    <div class="flex items-center justify-between pb-3 border-b border-fuchsia-500/20">
                        <div class="flex items-center gap-2">
                            <div class="w-2.5 h-2.5 bg-fuchsia-400 rounded-sm"></div>
                            <h3 class="font-orbitron font-bold text-white text-sm tracking-wider">TOOLS &amp; PRODUKTIVITAS</h3>
                        </div>
                        <span class="text-[10px] font-mono-cyber text-fuchsia-400">PROD_ENV</span>
                    </div>

                    <div class="space-y-4">
                        @foreach ($skills['tools'] as $skill)
                            <div class="space-y-1.5">
                                <div class="flex justify-between items-center text-xs">
                                    <span class="font-semibold text-slate-200">{{ $skill['name'] }}</span>
                                    <span class="font-mono-cyber text-fuchsia-400">{{ $skill['level'] }}%</span>
                                </div>
                                <div class="w-full h-2 bg-slate-900 rounded-full overflow-hidden border border-slate-800">
                                    <div class="h-full bg-gradient-to-r from-fuchsia-500 to-pink-500 rounded-full" style="width: {{ $skill['level'] }}%"></div>
                                </div>
                                <p class="text-[11px] text-slate-400 leading-tight">{{ $skill['desc'] }}</p>
                            </div>
                        @endforeach

                        <div class="p-3.5 rounded bg-slate-950/60 border border-slate-800 text-xs text-slate-300 space-y-2 mt-4">
                            <div class="font-mono-cyber text-[10px] text-fuchsia-400 uppercase">Spesialisasi Dokumen</div>
                            <div class="flex flex-wrap gap-1.5">
                                <span class="px-2 py-0.5 rounded bg-slate-900 border border-slate-700 text-[10px] font-mono-cyber">MS Word</span>
                                <span class="px-2 py-0.5 rounded bg-slate-900 border border-slate-700 text-[10px] font-mono-cyber">MS Excel Advanced</span>
                                <span class="px-2 py-0.5 rounded bg-slate-900 border border-slate-700 text-[10px] font-mono-cyber">MS PowerPoint</span>
                                <span class="px-2 py-0.5 rounded bg-slate-900 border border-slate-700 text-[10px] font-mono-cyber">Technical Report</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Group 3: Soft Skills & Leadership -->
                <div class="p-6 rounded border border-yellow-500/30 bg-[#0b0f19]/90 cyber-cut space-y-5">
                    <div class="flex items-center justify-between pb-3 border-b border-yellow-500/20">
                        <div class="flex items-center gap-2">
                            <div class="w-2.5 h-2.5 bg-yellow-400 rounded-sm"></div>
                            <h3 class="font-orbitron font-bold text-white text-sm tracking-wider">MANAJEMEN &amp; SOFT SKILLS</h3>
                        </div>
                        <span class="text-[10px] font-mono-cyber text-yellow-400">MGMT_CORE</span>
                    </div>

                    <div class="space-y-4">
                        @foreach ($skills['soft'] as $skill)
                            <div class="space-y-1.5">
                                <div class="flex justify-between items-center text-xs">
                                    <span class="font-semibold text-slate-200">{{ $skill['name'] }}</span>
                                    <span class="font-mono-cyber text-yellow-400">{{ $skill['level'] }}%</span>
                                </div>
                                <div class="w-full h-2 bg-slate-900 rounded-full overflow-hidden border border-slate-800">
                                    <div class="h-full bg-gradient-to-r from-yellow-500 to-amber-500 rounded-full" style="width: {{ $skill['level'] }}%"></div>
                                </div>
                                <p class="text-[11px] text-slate-400 leading-tight">{{ $skill['desc'] }}</p>
                            </div>
                        @endforeach

                        <div class="p-3.5 rounded bg-slate-950/60 border border-slate-800 text-xs text-slate-300 space-y-2 mt-4">
                            <div class="font-mono-cyber text-[10px] text-yellow-400 uppercase">Karakter Kerja</div>
                            <p class="text-[11px] text-slate-400">
                                Disiplin tinggi dalam timeline proyek, orientasi pada solusi konkret, dan terbiasa berkoordinasi dalam iklim kerja organisasi yang dinamis.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= SECTION 03: RIWAYAT PENGALAMAN (MISSION LOG) ================= -->
        <section id="pengalaman" class="relative scroll-mt-20">
            <div class="flex items-center gap-3 mb-8">
                <span class="text-cyan-400 font-mono-cyber text-xl font-bold">// 03</span>
                <h2 class="text-2xl sm:text-3xl font-black font-orbitron tracking-wide text-white">
                    PENGALAMAN <span class="text-cyan-400">[MISSION LOG]</span>
                </h2>
                <div class="h-px bg-cyan-500/20 flex-1"></div>
            </div>

            <div class="space-y-6">
                @foreach ($experiences as $index => $exp)
                    <div class="p-6 rounded border border-cyan-500/25 bg-[#0b0f19]/90 cyber-cut relative transition-all hover:border-cyan-400/60 group">
                        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4 mb-3">
                            <div>
                                <div class="flex flex-wrap items-center gap-2 mb-1.5">
                                    <span class="px-2 py-0.5 rounded bg-cyan-950/80 border border-cyan-500/40 text-cyan-300 text-[10px] font-mono-cyber">
                                        {{ $exp['badge'] }}
                                    </span>
                                    <span class="px-2 py-0.5 rounded bg-slate-900 border border-slate-800 text-slate-400 text-[10px] font-mono-cyber">
                                        {{ $exp['period'] }}
                                    </span>
                                </div>
                                <h3 class="text-xl font-black font-rajdhani text-white group-hover:text-cyan-300 transition-colors">
                                    {{ $exp['title'] }}
                                </h3>
                                <div class="text-sm font-semibold text-cyan-400/90 font-mono-cyber">
                                    {{ $exp['organization'] }}
                                </div>
                            </div>
                            <div class="text-xs font-mono-cyber text-slate-500">
                                LOG_ENTRY #0{{ $index + 1 }}
                            </div>
                        </div>

                        <p class="text-slate-300 text-sm leading-relaxed mb-4">
                            {{ $exp['description'] }}
                        </p>

                        <!-- Highlights List -->
                        <div class="space-y-1.5 mb-4 pl-2 border-l-2 border-slate-800">
                            @foreach ($exp['highlights'] as $highlight)
                                <div class="text-xs text-slate-300 flex items-start gap-2">
                                    <span class="text-cyan-400 mt-0.5 font-bold">›</span>
                                    <span>{{ $highlight }}</span>
                                </div>
                            @endforeach
                        </div>

                        <!-- Tech / Skill Badges -->
                        <div class="flex flex-wrap items-center gap-2 pt-2 border-t border-slate-800/80">
                            <span class="text-[10px] font-mono-cyber text-slate-500">FOKUS:</span>
                            @foreach ($exp['tech'] as $t)
                                <span class="px-2 py-0.5 rounded bg-slate-900 text-slate-300 text-[11px] font-mono-cyber border border-slate-800">
                                    {{ $t }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- ================= SECTION 04: RIWAYAT PENDIDIKAN (ACADEMIC PROTOCOL) ================= -->
        <section id="pendidikan" class="relative scroll-mt-20">
            <div class="flex items-center gap-3 mb-8">
                <span class="text-cyan-400 font-mono-cyber text-xl font-bold">// 04</span>
                <h2 class="text-2xl sm:text-3xl font-black font-orbitron tracking-wide text-white">
                    RIWAYAT PENDIDIKAN <span class="text-cyan-400">[ACADEMIC PROTOCOL]</span>
                </h2>
                <div class="h-px bg-cyan-500/20 flex-1"></div>
            </div>

            <!-- Education Timeline Nodes -->
            <div class="relative pl-6 sm:pl-8 border-l-2 border-cyan-500/30 space-y-8">
                @foreach ($education as $edu)
                    <div class="relative group">
                        <!-- Node Marker -->
                        <div class="absolute -left-[31px] sm:-left-[39px] top-1.5 w-4 h-4 rounded-full bg-[#07090e] border-2 border-cyan-400 group-hover:scale-125 group-hover:bg-cyan-400 transition-all"></div>

                        <div class="p-5 rounded border border-slate-800 bg-[#0b0f19]/80 cyber-cut transition-all group-hover:border-cyan-500/40">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1 mb-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-xs font-mono-cyber text-cyan-400">{{ $edu['code'] }}</span>
                                    <span class="text-slate-600">//</span>
                                    <span class="text-xs font-mono-cyber text-slate-400">{{ $edu['level'] }}</span>
                                </div>
                                <span class="text-xs font-mono-cyber text-yellow-400 px-2 py-0.5 rounded bg-yellow-950/40 border border-yellow-500/30 w-fit">
                                    {{ $edu['period'] }} ({{ $edu['role'] }})
                                </span>
                            </div>

                            <h3 class="text-xl font-bold font-rajdhani text-white group-hover:text-cyan-300 transition-colors">
                                {{ $edu['institution'] }}
                            </h3>
                            <div class="text-xs text-slate-400 font-mono-cyber mb-3">
                                Lokasi: {{ $edu['campus'] }}
                            </div>

                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-3">
                                {{ $edu['description'] }}
                            </p>

                            <div class="flex flex-wrap gap-1.5">
                                @foreach ($edu['tags'] as $tag)
                                    <span class="px-2 py-0.5 rounded bg-slate-900 border border-slate-800 text-[10px] font-mono-cyber text-slate-300">
                                        #{{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Tech Stack Section -->
            <div class="mt-10 p-6 sm:p-8 rounded border border-cyan-500/30 bg-[#090d18]/90 cyber-cut relative shadow-xl shadow-cyan-950/40">
                <div class="flex items-center gap-3 pb-4 border-b border-cyan-500/20 mb-6">
                    <span class="w-2.5 h-2.5 bg-cyan-400 rounded-sm"></span>
                    <div>
                        <div class="text-xs font-mono-cyber text-cyan-400 uppercase tracking-wider">STACK TEKNOLOGI YANG DIGUNAKAN</div>
                        <h3 class="text-xl sm:text-2xl font-bold font-orbitron text-white mt-0.5">Tech Stack</h3>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <!-- Backend -->
                    <div class="group p-5 rounded-lg border border-slate-800 bg-[#060912] hover:border-cyan-500/50 transition-all duration-300 cyber-cut">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-9 h-9 rounded bg-cyan-500/10 border border-cyan-500/40 flex items-center justify-center text-cyan-400 group-hover:bg-cyan-500/20 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </div>
                            <div>
                                <div class="font-bold font-rajdhani text-white text-base group-hover:text-cyan-300 transition-colors">Backend</div>
                                <div class="text-[10px] font-mono-cyber text-slate-500">Logika bisnis, API, dan database.</div>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @foreach (['Laravel', 'PHP', 'MySQL', 'REST API', 'Laravel Sanctum'] as $tech)
                                <span class="px-2.5 py-1 rounded-md bg-slate-900/80 border border-slate-700 text-[11px] font-mono-cyber text-slate-200 hover:border-cyan-500/60 hover:text-cyan-300 transition-colors cursor-default">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <!-- Mobile -->
                    <div class="group p-5 rounded-lg border border-slate-800 bg-[#060912] hover:border-fuchsia-500/50 transition-all duration-300 cyber-cut">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-9 h-9 rounded bg-fuchsia-500/10 border border-fuchsia-500/40 flex items-center justify-center text-fuchsia-400 group-hover:bg-fuchsia-500/20 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a1 1 0 001-1V4a1 1 0 00-1-1H8a1 1 0 00-1 1v16a1 1 0 001 1z"/></svg>
                            </div>
                            <div>
                                <div class="font-bold font-rajdhani text-white text-base group-hover:text-fuchsia-300 transition-colors">Mobile</div>
                                <div class="text-[10px] font-mono-cyber text-slate-500">Aplikasi lintas platform.</div>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @foreach (['Flutter', 'Dart', 'Provider'] as $tech)
                                <span class="px-2.5 py-1 rounded-md bg-slate-900/80 border border-slate-700 text-[11px] font-mono-cyber text-slate-200 hover:border-fuchsia-500/60 hover:text-fuchsia-300 transition-colors cursor-default">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <!-- Frontend -->
                    <div class="group p-5 rounded-lg border border-slate-800 bg-[#060912] hover:border-yellow-500/50 transition-all duration-300 cyber-cut">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-9 h-9 rounded bg-yellow-500/10 border border-yellow-500/40 flex items-center justify-center text-yellow-400 group-hover:bg-yellow-500/20 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <div class="font-bold font-rajdhani text-white text-base group-hover:text-yellow-300 transition-colors">Frontend</div>
                                <div class="text-[10px] font-mono-cyber text-slate-500">Antarmuka web yang responsif.</div>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @foreach (['Blade', 'Vite', 'JavaScript', 'HTML & CSS', 'Tailwind CSS', 'Alpine.js'] as $tech)
                                <span class="px-2.5 py-1 rounded-md bg-slate-900/80 border border-slate-700 text-[11px] font-mono-cyber text-slate-200 hover:border-yellow-500/60 hover:text-yellow-300 transition-colors cursor-default">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <!-- Tools -->
                    <div class="group p-5 rounded-lg border border-slate-800 bg-[#060912] hover:border-emerald-500/50 transition-all duration-300 cyber-cut">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-9 h-9 rounded bg-emerald-500/10 border border-emerald-500/40 flex items-center justify-center text-emerald-400 group-hover:bg-emerald-500/20 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <div class="font-bold font-rajdhani text-white text-base group-hover:text-emerald-300 transition-colors">Tools</div>
                                <div class="text-[10px] font-mono-cyber text-slate-500">Alur kerja dan deployment.</div>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @foreach (['Git', 'GitHub', 'Figma', 'VS Code', 'Laragon', 'Postman'] as $tech)
                                <span class="px-2.5 py-1 rounded-md bg-slate-900/80 border border-slate-700 text-[11px] font-mono-cyber text-slate-200 hover:border-emerald-500/60 hover:text-emerald-300 transition-colors cursor-default">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ================= SECTION 05: PORTOFOLIO & PROYEK UNGGULAN ================= -->
        <section id="proyek" class="relative scroll-mt-20">
            <div class="flex items-center gap-3 mb-8">
                <span class="text-cyan-400 font-mono-cyber text-xl font-bold">// 05</span>
                <h2 class="text-2xl sm:text-3xl font-black font-orbitron tracking-wide text-white">
                    PROYEK &amp; KARYA <span class="text-cyan-400">[PROJECT SHOWCASE]</span>
                </h2>
                <div class="h-px bg-cyan-500/20 flex-1"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($projects as $project)
                    <div class="p-6 rounded border border-cyan-500/20 bg-[#0b0f19]/90 cyber-cut flex flex-col justify-between hover:border-cyan-400 transition-all group">
                        <div>
                            <div class="flex justify-between items-center text-[10px] font-mono-cyber text-slate-400 pb-2 border-b border-slate-800 mb-3">
                                <span>{{ $project['category'] }}</span>
                                <span class="text-emerald-400">{{ $project['status'] }}</span>
                            </div>

                            <h3 class="text-lg font-bold font-orbitron text-white group-hover:text-cyan-400 transition-colors mb-2">
                                {{ $project['title'] }}
                            </h3>

                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-4">
                                {{ $project['summary'] }}
                            </p>
                        </div>

                        <div>
                            <div class="flex flex-wrap gap-1.5 pt-3 border-t border-slate-800">
                                @foreach ($project['stack'] as $tech)
                                    <span class="px-2 py-0.5 rounded bg-cyan-950/60 border border-cyan-500/30 text-cyan-300 text-[10px] font-mono-cyber">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- ================= SECTION 06: INTERACTIVE CYBER TERMINAL ================= -->
        <section id="terminal" class="relative scroll-mt-20">
            <div class="flex items-center gap-3 mb-8">
                <span class="text-cyan-400 font-mono-cyber text-xl font-bold">// 06</span>
                <h2 class="text-2xl sm:text-3xl font-black font-orbitron tracking-wide text-white">
                    CYBER TERMINAL <span class="text-cyan-400">[INTERACTIVE CLI]</span>
                </h2>
                <div class="h-px bg-cyan-500/20 flex-1"></div>
            </div>

            <!-- Terminal Box -->
            <div class="rounded border border-cyan-500/40 bg-[#05070d] shadow-2xl shadow-cyan-950/80 cyber-cut overflow-hidden">
                <!-- Terminal Title Bar -->
                <div class="bg-[#0b0e17] px-4 py-2.5 border-b border-cyan-500/30 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-rose-500/80"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500/80"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500/80"></div>
                        <span class="text-xs font-mono-cyber text-slate-400 ml-2">shabik@cyber-node: ~ /bin/bash</span>
                    </div>
                    <div class="text-[10px] font-mono-cyber text-cyan-400 hidden sm:inline">
                        SSH-2.0-OPEN_PORT: 8080
                    </div>
                </div>

                <!-- Quick Command Pills -->
                <div class="bg-[#080b13] px-4 py-2 border-b border-slate-800/80 flex flex-wrap items-center gap-1.5 text-xs font-mono-cyber">
                    <span class="text-slate-500 text-[10px]">KLIK PERINTAH CEPAT:</span>
                    <button onclick="window.runTerminalQuick('help')" class="px-2 py-0.5 rounded bg-slate-900 border border-slate-700 hover:border-cyan-400 text-cyan-300 text-[11px] transition-colors">help</button>
                    <button onclick="window.runTerminalQuick('bio')" class="px-2 py-0.5 rounded bg-slate-900 border border-slate-700 hover:border-cyan-400 text-cyan-300 text-[11px] transition-colors">bio</button>
                    <button onclick="window.runTerminalQuick('skills')" class="px-2 py-0.5 rounded bg-slate-900 border border-slate-700 hover:border-cyan-400 text-cyan-300 text-[11px] transition-colors">skills</button>
                    <button onclick="window.runTerminalQuick('projects')" class="px-2 py-0.5 rounded bg-slate-900 border border-slate-700 hover:border-cyan-400 text-cyan-300 text-[11px] transition-colors">projects</button>
                    <button onclick="window.runTerminalQuick('exp')" class="px-2 py-0.5 rounded bg-slate-900 border border-slate-700 hover:border-cyan-400 text-cyan-300 text-[11px] transition-colors">exp</button>
                    <button onclick="window.runTerminalQuick('edu')" class="px-2 py-0.5 rounded bg-slate-900 border border-slate-700 hover:border-cyan-400 text-cyan-300 text-[11px] transition-colors">edu</button>
                    <button onclick="window.runTerminalQuick('sudo hire')" class="px-2 py-0.5 rounded bg-yellow-950/60 border border-yellow-500/50 hover:bg-yellow-900 text-yellow-300 text-[11px] transition-colors">sudo hire</button>
                    <button onclick="window.runTerminalQuick('clear')" class="px-2 py-0.5 rounded bg-slate-900 border border-slate-700 hover:border-rose-400 text-slate-400 hover:text-rose-300 text-[11px] transition-colors">clear</button>
                </div>

                <!-- Terminal Output Buffer -->
                <div id="terminal-output" class="p-4 sm:p-6 font-mono-cyber text-xs sm:text-sm min-h-[220px] max-h-[360px] overflow-y-auto space-y-2">
                    <div class="text-slate-400">
                        <span class="text-cyan-400 font-bold">SHABIK SHOLAHUDIN [CV-OS v2.6.0]</span><br>
                        Sistem interaktif online. Ketik <span class="text-yellow-400 font-bold cursor-pointer underline" onclick="window.runTerminalQuick('help')">'help'</span> atau klik salah satu tombol di atas untuk melihat ringkasan data.
                    </div>
                </div>

                <!-- Terminal Prompt Line -->
                <form id="terminal-command-form" class="bg-[#080b13] p-3 border-t border-cyan-500/20 flex items-center gap-2">
                    <span class="text-cyan-400 font-mono-cyber font-bold text-xs sm:text-sm pl-2">guest@shabik-node:~$</span>
                    <input type="text" id="terminal-command-input" autocomplete="off" spellcheck="false" placeholder="Ketik perintah (contoh: help, bio, skills, projects, contact)..." class="flex-1 bg-transparent border-0 text-white font-mono-cyber text-xs sm:text-sm focus:outline-none focus:ring-0 placeholder:text-slate-600">
                    <button type="submit" class="cyber-sfx-btn px-3 py-1 bg-cyan-500 hover:bg-cyan-400 text-black font-bold font-mono-cyber text-xs rounded transition-colors">
                        ENTER
                    </button>
                </form>
            </div>
        </section>

        <!-- ================= SECTION 07: TRANSMISI & KONTAK (CONTACT TRANSMISSION) ================= -->
        <section id="kontak" class="relative scroll-mt-20">
            <div class="flex items-center gap-3 mb-8">
                <span class="text-cyan-400 font-mono-cyber text-xl font-bold">// 07</span>
                <h2 class="text-2xl sm:text-3xl font-black font-orbitron tracking-wide text-white">
                    TRANSMISI HUB <span class="text-cyan-400">[CONNECT &amp; HIRE]</span>
                </h2>
                <div class="h-px bg-cyan-500/20 flex-1"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- Left Information Column -->
                <div class="lg:col-span-5 space-y-6">
                    <div class="p-6 rounded border border-cyan-500/30 bg-[#0b0f19]/90 cyber-cut space-y-4">
                        <div class="text-xs font-mono-cyber text-cyan-400 uppercase tracking-wider">
                            // JALUR KOMUNIKASI LANGSUNG
                        </div>
                        <h3 class="text-2xl font-bold font-rajdhani text-white">
                            Mari Berkolaborasi atau Rekrut Shabik
                        </h3>
                        <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
                            Terbuka untuk kesempatan magang (internship), proyek pengembangan aplikasi web berbasis PHP/Laravel, serta kolaborasi riset teknologi dan kemahasiswaan.
                        </p>

                        <div class="space-y-3 pt-2">
                            <a href="{{ $personal['whatsapp_url'] }}" target="_blank" class="cyber-sfx-btn p-3 rounded bg-emerald-950/40 border border-emerald-500/40 hover:border-emerald-400 flex items-center justify-between text-emerald-300 transition-colors">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded bg-emerald-500/20 flex items-center justify-center font-bold font-mono-cyber">WA</div>
                                    <div>
                                        <div class="text-[10px] font-mono-cyber text-emerald-400">RESPON CEPAT WHATSAPP</div>
                                        <div class="text-sm font-bold text-white">{{ $personal['phone_display'] }}</div>
                                    </div>
                                </div>
                                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>

                            <div class="p-3 rounded bg-cyan-950/40 border border-cyan-500/40 flex items-center justify-between text-cyan-300">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded bg-cyan-500/20 flex items-center justify-center font-bold font-mono-cyber">@</div>
                                    <div>
                                        <div class="text-[10px] font-mono-cyber text-cyan-400">SURAT ELEKTRONIK</div>
                                        <div class="text-sm font-bold text-white break-all">{{ $personal['email'] }}</div>
                                    </div>
                                </div>
                                <button onclick="window.copyToClipboard('{{ $personal['email'] }}', 'Email disalin!')" class="p-1.5 hover:text-white transition-colors" title="Salin Email">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                </button>
                            </div>
                        </div>

                        <div class="p-3 rounded bg-slate-900/60 border border-slate-800 text-xs font-mono-cyber text-slate-400">
                            📍 Base: Rajapolah, Tasikmalaya, Jawa Barat, Indonesia
                        </div>
                    </div>
                </div>

                <!-- Right Contact Form -->
                <div class="lg:col-span-7">
                    <div class="p-6 sm:p-8 rounded border border-cyan-500/40 bg-[#0b0f19]/95 cyber-cut relative">
                        <div class="flex items-center justify-between pb-3 border-b border-cyan-500/20 mb-6">
                            <span class="text-xs font-mono-cyber text-cyan-400 uppercase tracking-wider">FORM TRANSMISI PESAN DIGITAL</span>
                            <span class="text-xs font-mono-cyber text-slate-500">BACKEND: PHP/SQLITE</span>
                        </div>

                        <!-- Feedback Message Container -->
                        <div id="contact-feedback" class="hidden mb-6"></div>

                        @if (session('status'))
                            <div class="mb-6 p-4 rounded border border-green-500 bg-green-950/80 text-green-200 text-sm font-mono-cyber">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="mb-6 p-4 rounded border border-rose-500 bg-rose-950/80 text-rose-200 text-xs font-mono-cyber space-y-1">
                                <div class="font-bold">GAGAL TRANSMISI: Silakan cek data input Anda:</div>
                                @foreach ($errors->all() as $error)
                                    <div>• {{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <form id="cyber-contact-form" action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                            @csrf

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="space-y-1">
                                    <label for="contact-name" class="block text-xs font-mono-cyber text-slate-300">
                                        NAMA LENGKAP / ORGANISASI <span class="text-cyan-400">*</span>
                                    </label>
                                    <input type="text" id="contact-name" name="name" required value="{{ old('name') }}" placeholder="Contoh: Budi Santoso / PT Tech Solution" class="w-full px-3.5 py-2.5 rounded bg-[#060810] border border-slate-700 text-white text-sm font-mono-cyber focus:border-cyan-400 focus:outline-none transition-colors">
                                </div>

                                <div class="space-y-1">
                                    <label for="contact-email" class="block text-xs font-mono-cyber text-slate-300">
                                        EMAIL PENGIRIM <span class="text-cyan-400">*</span>
                                    </label>
                                    <input type="email" id="contact-email" name="email" required value="{{ old('email') }}" placeholder="email@perusahaan.com" class="w-full px-3.5 py-2.5 rounded bg-[#060810] border border-slate-700 text-white text-sm font-mono-cyber focus:border-cyan-400 focus:outline-none transition-colors">
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="contact-subject" class="block text-xs font-mono-cyber text-slate-300">
                                    SUBJEK / TOPIK
                                </label>
                                <input type="text" id="contact-subject" name="subject" value="{{ old('subject') }}" placeholder="Tawaran Magang / Diskusi Proyek Web / Kolaborasi" class="w-full px-3.5 py-2.5 rounded bg-[#060810] border border-slate-700 text-white text-sm font-mono-cyber focus:border-cyan-400 focus:outline-none transition-colors">
                            </div>

                            <div class="space-y-1">
                                <label for="contact-message" class="block text-xs font-mono-cyber text-slate-300">
                                    ISI PESAN TRANSMISI <span class="text-cyan-400">*</span>
                                </label>
                                <textarea id="contact-message" name="message" rows="4" required placeholder="Tuliskan pesan, rincian tawaran atau pertanyaan Anda di sini..." class="w-full px-3.5 py-2.5 rounded bg-[#060810] border border-slate-700 text-white text-sm font-mono-cyber focus:border-cyan-400 focus:outline-none transition-colors">{{ old('message') }}</textarea>
                            </div>

                            <div class="pt-2">
                                <button type="submit" id="contact-submit-btn" class="cyber-sfx-btn w-full py-3.5 font-orbitron font-bold text-xs tracking-wider text-black bg-cyan-400 hover:bg-cyan-300 transition-colors cyber-cut shadow-lg shadow-cyan-500/20">
                                    <span class="relative z-10 flex items-center justify-center gap-2">
                                        <span>KIRIM SINYAL TRANSMISI</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="mt-20 border-t border-slate-800/60 bg-[#05070d] py-8 text-xs text-slate-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <div class="w-7 h-7 rounded-full bg-cyan-500/10 border border-cyan-500/40 flex items-center justify-center text-cyan-400 text-[10px] font-bold font-mono-cyber">
                    SS
                </div>
                <div>
                    <span class="text-white font-semibold tracking-wide">{{ $personal['name'] }}</span>
                    <span class="mx-2 text-slate-700">·</span>
                    <span class="text-slate-500">Mahasiswa UBSI Kota Tasikmalaya</span>
                </div>
            </div>

            <div class="text-center md:text-right text-slate-600 text-[11px] leading-relaxed">
                <div>Dibangun dengan Laravel &amp; PHP 8.4</div>
                <div class="text-slate-700 mt-0.5">© {{ date('Y') }} Shabik Sholahudin. Semua hak dilindungi.</div>
            </div>
        </div>
    </footer>

    <!-- Interactive Cyber Toast Notification -->
    <div id="cyber-toast" class="fixed bottom-6 right-6 z-50 transform translate-y-24 opacity-0 pointer-events-none transition-all duration-300">
        <div class="px-4 py-3 rounded border border-cyan-400 bg-cyan-950/95 text-cyan-200 text-xs font-mono-cyber shadow-xl shadow-cyan-950/80 flex items-center gap-3">
            <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
            <span id="cyber-toast-text">Pesan sistem</span>
        </div>
    </div>

    <!-- Custom Cyber Cursor -->
    <div id="cyber-cursor-dot" class="fixed top-0 left-0 w-2 h-2 rounded-full bg-cyan-400 pointer-events-none z-[9999] -translate-x-1/2 -translate-y-1/2 transition-transform duration-75 mix-blend-difference"></div>
    <div id="cyber-cursor-ring" class="fixed top-0 left-0 w-8 h-8 rounded-full border border-cyan-400/60 pointer-events-none z-[9998] -translate-x-1/2 -translate-y-1/2 transition-all duration-200 ease-out"></div>

</body>
</html>
