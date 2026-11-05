// Semi-Cyberpunk Portfolio Interactive System
// Built for Shabik Sholahudin

class CyberpunkAudio {
    constructor() {
        this.ctx = null;
        this.muted = localStorage.getItem('cyber_audio_muted') === 'true';
        this.init();
    }

    init() {
        // Defer AudioContext until user interaction
        const enableAudio = () => {
            if (!this.ctx) {
                const AudioCtx = window.AudioContext || window.webkitAudioContext;
                if (AudioCtx) {
                    this.ctx = new AudioCtx();
                }
            }
            window.removeEventListener('click', enableAudio);
            window.removeEventListener('keydown', enableAudio);
        };
        window.addEventListener('click', enableAudio, { once: true });
        window.addEventListener('keydown', enableAudio, { once: true });
    }

    playTone(freq, type = 'sine', duration = 0.08, gainVal = 0.04) {
        if (this.muted || !this.ctx) return;
        try {
            if (this.ctx.state === 'suspended') {
                this.ctx.resume();
            }
            const osc = this.ctx.createOscillator();
            const gain = this.ctx.createGain();
            osc.type = type;
            osc.frequency.setValueAtTime(freq, this.ctx.currentTime);
            gain.gain.setValueAtTime(gainVal, this.ctx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.0001, this.ctx.currentTime + duration);
            osc.connect(gain);
            gain.connect(this.ctx.destination);
            osc.start();
            osc.stop(this.ctx.currentTime + duration);
        } catch (e) {
            // Ignore audio context errors silently
        }
    }

    click() {
        this.playTone(800, 'sine', 0.04, 0.03);
    }

    blip() {
        this.playTone(1200, 'triangle', 0.06, 0.04);
    }

    success() {
        this.playTone(523.25, 'triangle', 0.1, 0.05);
        setTimeout(() => this.playTone(659.25, 'triangle', 0.12, 0.05), 80);
        setTimeout(() => this.playTone(1046.50, 'triangle', 0.2, 0.06), 160);
    }

    toggleMute() {
        this.muted = !this.muted;
        localStorage.setItem('cyber_audio_muted', this.muted);
        return this.muted;
    }
}

window.cyberAudio = new CyberpunkAudio();

// Cyber Terminal Simulator
document.addEventListener('DOMContentLoaded', () => {
    // 1. Live Cyber Clock
    const clockEl = document.getElementById('cyber-clock');
    if (clockEl) {
        const updateClock = () => {
            const now = new Date();
            const timeStr = now.toLocaleTimeString('id-ID', { hour12: false });
            clockEl.textContent = `${timeStr} WIB`;
        };
        updateClock();
        setInterval(updateClock, 1000);
    }

    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    }

    // 2. Audio Toggle Button
    const audioBtn = document.getElementById('audio-toggle-btn');
    const audioIcon = document.getElementById('audio-toggle-icon');
    const audioText = document.getElementById('audio-toggle-text');

    if (audioBtn) {
        const updateAudioUI = () => {
            if (window.cyberAudio.muted) {
                if (audioIcon) audioIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2" />`;
                if (audioText) audioText.textContent = 'SFX: MUTED';
                audioBtn.classList.remove('text-cyan-400', 'border-cyan-500/40');
                audioBtn.classList.add('text-slate-400', 'border-slate-700');
            } else {
                if (audioIcon) audioIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />`;
                if (audioText) audioText.textContent = 'SFX: ACTIVE';
                audioBtn.classList.add('text-cyan-400', 'border-cyan-500/40');
                audioBtn.classList.remove('text-slate-400', 'border-slate-700');
            }
        };
        updateAudioUI();
        audioBtn.addEventListener('click', () => {
            window.cyberAudio.toggleMute();
            updateAudioUI();
            if (!window.cyberAudio.muted) {
                window.cyberAudio.blip();
            }
        });
    }

    // 3. Audio feedback on interactive elements
    document.querySelectorAll('.cyber-sfx-btn').forEach(btn => {
        btn.addEventListener('mouseenter', () => window.cyberAudio.blip());
        btn.addEventListener('click', () => window.cyberAudio.click());
    });

    // 4. Copy to clipboard helper
    window.copyToClipboard = (text, message = 'Tersalin ke papan klip!') => {
        navigator.clipboard.writeText(text).then(() => {
            window.cyberAudio.success();
            showCyberToast(message);
        });
    };

    const showCyberToast = (msg) => {
        const toast = document.getElementById('cyber-toast');
        const toastText = document.getElementById('cyber-toast-text');
        if (toast && toastText) {
            toastText.textContent = msg;
            toast.classList.remove('translate-y-24', 'opacity-0', 'pointer-events-none');
            toast.classList.add('translate-y-0', 'opacity-100');
            setTimeout(() => {
                toast.classList.add('translate-y-24', 'opacity-0', 'pointer-events-none');
                toast.classList.remove('translate-y-0', 'opacity-100');
            }, 3000);
        }
    };

    // 5. Interactive Terminal Console
    const terminalInput = document.getElementById('terminal-command-input');
    const terminalOutput = document.getElementById('terminal-output');
    const terminalForm = document.getElementById('terminal-command-form');

    const executeCommand = (cmd) => {
        const cleanCmd = cmd.trim().toLowerCase();
        let reply = '';

        switch (cleanCmd) {
            case 'help':
                reply = `
<div class="text-cyan-400 font-bold mb-1">=== PROTOKOL PERINTAH CYBERNETIK ===</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-1 text-slate-300">
  <div><span class="text-yellow-400 font-mono">bio</span> - Informasi profil Shabik</div>
  <div><span class="text-yellow-400 font-mono">edu</span> - Riwayat pendidikan akademik</div>
  <div><span class="text-yellow-400 font-mono">exp</span> - Riwayat organisasi & kepanitiaan</div>
  <div><span class="text-yellow-400 font-mono">skills</span> - Matriks keahlian & stack teknologi</div>
  <div><span class="text-yellow-400 font-mono">projects</span> - Portofolio proyek & karya unggulan</div>
  <div><span class="text-yellow-400 font-mono">contact</span> - Saluran komunikasi langsung</div>
  <div><span class="text-yellow-400 font-mono">sudo hire</span> - Akses prioritas rekrutmen / kolaborasi</div>
  <div><span class="text-yellow-400 font-mono">clear</span> - Bersihkan terminal buffer</div>
</div>`;
                break;
            case 'bio':
                reply = `
<div class="text-cyan-300 font-mono">
  [STATUS: 200 OK] NAMA: Shabik Sholahudin<br>
  [AFFILIATION] Mahasiswa UBSI Kota Tasikmalaya<br>
  [ORIGIN] Rajapolah, Tasikmalaya, Jawa Barat, Indonesia<br>
  [FOCUS] Pemrograman Web (PHP / Laravel), Creative Problem Solving & Time Management
</div>`;
                break;
            case 'edu':
                reply = `
<div class="text-cyan-300 font-mono space-y-1">
  <div>• [TERTINARY] Universitas Bina Sarana Informatika (UBSI) Tasikmalaya (Aktif)</div>
  <div>• [SECONDARY] SMAN 6 Tasikmalaya</div>
  <div>• [JUNIOR] SMP Terpadu Manahijul Huda</div>
  <div>• [PRIMARY] SDN Rajapolah</div>
</div>`;
                break;
            case 'exp':
                reply = `
<div class="text-cyan-300 font-mono space-y-1">
  <div>1. <span class="text-yellow-400 font-bold">Divisi Litbang 2024/2026</span> - HiMASI UBSI</div>
  <div>2. <span class="text-yellow-400 font-bold">Ketua Pelaksana Kelas Reguler</span> - HIMASI UBSI</div>
  <div>3. <span class="text-yellow-400 font-bold">Anggota BJU</span> - Kampus UBSI</div>
</div>`;
                break;
            case 'skills':
                reply = `
<div class="text-cyan-300 font-mono space-y-1">
  <div>[TECH] PHP 8.4, Laravel, HTML5, Modern CSS, MySQL / SQLite, Dasar Algoritma</div>
  <div>[TOOLS] Microsoft Office (Word, Excel, PPT), Git & GitHub</div>
  <div>[SOFT] Project & Time Management, Creative Thinking, Kepemimpinan Organisasi</div>
</div>`;
                break;
            case 'projects':
            case 'proyek':
                reply = `
<div class="text-cyan-300 font-mono space-y-2">
  <div>1. <span class="text-yellow-400 font-bold">e-CV & Portfolio System</span> - Portofolio Semi-Cyberpunk Laravel 12 & PHP 8.4</div>
  <div>2. <span class="text-yellow-400 font-bold">SmartOrganic</span> - Website Platform Bank Sampah (Waste Bank)</div>
  <div>3. <span class="text-yellow-400 font-bold">Satu Rumah Disperwaskim</span> - Sistem Pendataan & Validasi Hunian Layak</div>
  <div>4. <span class="text-yellow-400 font-bold">SIAPA</span> - Sistem Informasi Administrasi Pembayaran Abi Bakar Ash Shidiq</div>
</div>`;
                break;
            case 'contact':
                reply = `
<div class="text-cyan-300 font-mono space-y-1">
  <div>[TRANSMIT] Email: <a href="mailto:shabiksholahudin@gmail.com" class="text-yellow-400 underline">shabiksholahudin@gmail.com</a></div>
  <div>[HOTLINE] WhatsApp: <a href="https://wa.me/6281563346921" target="_blank" class="text-yellow-400 underline">+62 815-6334-6921</a></div>
  <div>[LOCATION] Rajapolah, Tasikmalaya, Indonesia</div>
</div>`;
                break;
            case 'sudo hire':
            case 'hire':
                reply = `
<div class="p-3 bg-cyan-950/60 border border-cyan-500 text-cyan-200 font-mono">
  <span class="text-green-400 font-bold">[ACCESS GRANTED]</span> Membuka jalur komunikasi prioritas...<br>
  Shabik Sholahudin terbuka untuk kesempatan magang, proyek web PHP/Laravel, dan kolaborasi.<br>
  <a href="#kontak" class="text-yellow-400 underline font-bold mt-1 inline-block">Klik di sini untuk langsung mengirim pesan ➔</a>
</div>`;
                break;
            case 'clear':
                if (terminalOutput) {
                    terminalOutput.innerHTML = '';
                }
                return;
            default:
                reply = `<div class="text-rose-400 font-mono">UNKNOWN_COMMAND: '${escapeHtml(cleanCmd)}'. Ketik <span class="text-yellow-400 underline cursor-pointer" onclick="window.runTerminalQuick('help')">'help'</span> untuk daftar perintah yang tersedia.</div>`;
                break;
        }

        if (terminalOutput) {
            const entry = document.createElement('div');
            entry.className = 'py-2 border-b border-cyan-500/20 text-sm font-mono';
            entry.innerHTML = `
              <div class="flex items-center gap-2 text-slate-400 mb-1">
                <span class="text-cyan-400">guest@shabik-node:~$</span>
                <span class="text-white">${escapeHtml(cleanCmd)}</span>
              </div>
              <div class="pl-4">${reply}</div>
            `;
            terminalOutput.appendChild(entry);
            terminalOutput.scrollTop = terminalOutput.scrollHeight;
            window.cyberAudio.blip();
        }
    };

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    window.runTerminalQuick = (cmd) => {
        if (terminalInput) {
            terminalInput.value = cmd;
            executeCommand(cmd);
            terminalInput.value = '';
            terminalInput.focus();
        }
    };

    if (terminalForm && terminalInput) {
        terminalForm.addEventListener('submit', (e) => {
            e.preventDefault();
            if (terminalInput.value.trim() !== '') {
                executeCommand(terminalInput.value);
                terminalInput.value = '';
            }
        });
    }

    // 6. Contact Form AJAX Transmission (Fallback to standard POST if JS disabled)
    const contactForm = document.getElementById('cyber-contact-form');
    const contactFeedback = document.getElementById('contact-feedback');
    const submitBtn = document.getElementById('contact-submit-btn');

    if (contactForm && contactFeedback) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(contactForm);

            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                  <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                  MEMPROSES SINYAL TRANSMISI...
                `;
            }

            try {
                const response = await fetch(contactForm.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: formData,
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    window.cyberAudio.success();
                    contactFeedback.classList.remove('hidden');
                    contactFeedback.className = 'p-4 rounded border border-green-500 bg-green-950/80 text-green-200 text-sm font-mono';
                    contactFeedback.innerHTML = `
                      <div class="font-bold mb-1">✔ [TRANSMISSION SUCCESS]</div>
                      <div>${data.message}</div>
                    `;
                    contactForm.reset();
                } else {
                    throw new Error(data.message || 'Gagal mengirim pesan transmisi.');
                }
            } catch (err) {
                contactFeedback.classList.remove('hidden');
                contactFeedback.className = 'p-4 rounded border border-rose-500 bg-rose-950/80 text-rose-200 text-sm font-mono';
                contactFeedback.innerHTML = `
                  <div class="font-bold mb-1">✖ [TRANSMISSION ERROR]</div>
                  <div>Terjadi kendala jaringan transmisi. Silakan gunakan tautan WhatsApp langsung di atas atau coba sesaat lagi.</div>
                `;
            } finally {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = `
                      <span class="relative z-10 flex items-center justify-center gap-2">
                        <span>KIRIM SINYAL TRANSMISI</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                      </span>
                    `;
                }
            }
        });
    }
});
