window.cyberAudio=new class{constructor(){this.ctx=null,this.muted=localStorage.getItem(`cyber_audio_muted`)===`true`,this.init()}init(){let e=()=>{if(!this.ctx){let e=window.AudioContext||window.webkitAudioContext;e&&(this.ctx=new e)}window.removeEventListener(`click`,e),window.removeEventListener(`keydown`,e)};window.addEventListener(`click`,e,{once:!0}),window.addEventListener(`keydown`,e,{once:!0})}playTone(e,t=`sine`,n=.08,r=.04){if(!this.muted&&this.ctx)try{this.ctx.state===`suspended`&&this.ctx.resume();let i=this.ctx.createOscillator(),a=this.ctx.createGain();i.type=t,i.frequency.setValueAtTime(e,this.ctx.currentTime),a.gain.setValueAtTime(r,this.ctx.currentTime),a.gain.exponentialRampToValueAtTime(1e-4,this.ctx.currentTime+n),i.connect(a),a.connect(this.ctx.destination),i.start(),i.stop(this.ctx.currentTime+n)}catch{}}click(){this.playTone(800,`sine`,.04,.03)}blip(){this.playTone(1200,`triangle`,.06,.04)}success(){this.playTone(523.25,`triangle`,.1,.05),setTimeout(()=>this.playTone(659.25,`triangle`,.12,.05),80),setTimeout(()=>this.playTone(1046.5,`triangle`,.2,.06),160)}toggleMute(){return this.muted=!this.muted,localStorage.setItem(`cyber_audio_muted`,this.muted),this.muted}},document.addEventListener(`DOMContentLoaded`,()=>{let e=document.getElementById(`cyber-clock`);if(e){let t=()=>{let t=new Date().toLocaleTimeString(`id-ID`,{hour12:!1});e.textContent=`${t} WIB`};t(),setInterval(t,1e3)}let t=document.getElementById(`mobile-menu-toggle`),n=document.getElementById(`mobile-menu`);t&&n&&(t.addEventListener(`click`,()=>{n.classList.toggle(`hidden`)}),n.querySelectorAll(`a`).forEach(e=>{e.addEventListener(`click`,()=>{n.classList.add(`hidden`)})}));let r=document.getElementById(`audio-toggle-btn`),i=document.getElementById(`audio-toggle-icon`),a=document.getElementById(`audio-toggle-text`);if(r){let e=()=>{window.cyberAudio.muted?(i&&(i.innerHTML=`<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2" />`),a&&(a.textContent=`SFX: MUTED`),r.classList.remove(`text-cyan-400`,`border-cyan-500/40`),r.classList.add(`text-slate-400`,`border-slate-700`)):(i&&(i.innerHTML=`<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />`),a&&(a.textContent=`SFX: ACTIVE`),r.classList.add(`text-cyan-400`,`border-cyan-500/40`),r.classList.remove(`text-slate-400`,`border-slate-700`))};e(),r.addEventListener(`click`,()=>{window.cyberAudio.toggleMute(),e(),window.cyberAudio.muted||window.cyberAudio.blip()})}document.querySelectorAll(`.cyber-sfx-btn`).forEach(e=>{e.addEventListener(`mouseenter`,()=>window.cyberAudio.blip()),e.addEventListener(`click`,()=>window.cyberAudio.click())}),window.copyToClipboard=(e,t=`Tersalin ke papan klip!`)=>{navigator.clipboard.writeText(e).then(()=>{window.cyberAudio.success(),o(t)})};let o=e=>{let t=document.getElementById(`cyber-toast`),n=document.getElementById(`cyber-toast-text`);t&&n&&(n.textContent=e,t.classList.remove(`translate-y-24`,`opacity-0`,`pointer-events-none`),t.classList.add(`translate-y-0`,`opacity-100`),setTimeout(()=>{t.classList.add(`translate-y-24`,`opacity-0`,`pointer-events-none`),t.classList.remove(`translate-y-0`,`opacity-100`)},3e3))},s=document.getElementById(`terminal-command-input`),c=document.getElementById(`terminal-output`),l=document.getElementById(`terminal-command-form`),u=e=>{let t=e.trim().toLowerCase(),n=``;switch(t){case`help`:n=`
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
</div>`;break;case`bio`:n=`
<div class="text-cyan-300 font-mono">
  [STATUS: 200 OK] NAMA: Shabik Sholahudin<br>
  [AFFILIATION] Mahasiswa UBSI Kota Tasikmalaya<br>
  [ORIGIN] Rajapolah, Tasikmalaya, Jawa Barat, Indonesia<br>
  [FOCUS] Pemrograman Web (PHP / Laravel), Creative Problem Solving & Time Management
</div>`;break;case`edu`:n=`
<div class="text-cyan-300 font-mono space-y-1">
  <div>• [TERTINARY] Universitas Bina Sarana Informatika (UBSI) Tasikmalaya (Aktif)</div>
  <div>• [SECONDARY] SMAN 6 Tasikmalaya</div>
  <div>• [JUNIOR] SMP Terpadu Manahijul Huda</div>
  <div>• [PRIMARY] SDN Rajapolah</div>
</div>`;break;case`exp`:n=`
<div class="text-cyan-300 font-mono space-y-1">
  <div>1. <span class="text-yellow-400 font-bold">Divisi Litbang 2024/2026</span> - HiMASI UBSI</div>
  <div>2. <span class="text-yellow-400 font-bold">Ketua Pelaksana Kelas Reguler</span> - HIMASI UBSI</div>
  <div>3. <span class="text-yellow-400 font-bold">Anggota BJU</span> - Kampus UBSI</div>
</div>`;break;case`skills`:n=`
<div class="text-cyan-300 font-mono space-y-1">
  <div>[TECH] PHP 8.4, Laravel, HTML5, Modern CSS, MySQL / SQLite, Dasar Algoritma</div>
  <div>[TOOLS] Microsoft Office (Word, Excel, PPT), Git & GitHub</div>
  <div>[SOFT] Project & Time Management, Creative Thinking, Kepemimpinan Organisasi</div>
</div>`;break;case`projects`:case`proyek`:n=`
<div class="text-cyan-300 font-mono space-y-2">
  <div>1. <span class="text-yellow-400 font-bold">e-CV & Portfolio System</span> - Portofolio Semi-Cyberpunk Laravel 12 & PHP 8.4</div>
  <div>2. <span class="text-yellow-400 font-bold">SmartOrganic</span> - Website Platform Bank Sampah (Waste Bank)</div>
  <div>3. <span class="text-yellow-400 font-bold">Satu Rumah Disperwaskim</span> - Sistem Pendataan & Validasi Hunian Layak</div>
  <div>4. <span class="text-yellow-400 font-bold">SIAPA</span> - Sistem Informasi Administrasi Pembayaran Abi Bakar Ash Shidiq</div>
</div>`;break;case`contact`:n=`
<div class="text-cyan-300 font-mono space-y-1">
  <div>[TRANSMIT] Email: <a href="mailto:shabiksholahudin@gmail.com" class="text-yellow-400 underline">shabiksholahudin@gmail.com</a></div>
  <div>[HOTLINE] WhatsApp: <a href="https://wa.me/6281563346921" target="_blank" class="text-yellow-400 underline">+62 815-6334-6921</a></div>
  <div>[LOCATION] Rajapolah, Tasikmalaya, Indonesia</div>
</div>`;break;case`sudo hire`:case`hire`:n=`
<div class="p-3 bg-cyan-950/60 border border-cyan-500 text-cyan-200 font-mono">
  <span class="text-green-400 font-bold">[ACCESS GRANTED]</span> Membuka jalur komunikasi prioritas...<br>
  Shabik Sholahudin terbuka untuk kesempatan magang, proyek web PHP/Laravel, dan kolaborasi.<br>
  <a href="#kontak" class="text-yellow-400 underline font-bold mt-1 inline-block">Klik di sini untuk langsung mengirim pesan ➔</a>
</div>`;break;case`clear`:c&&(c.innerHTML=``);return;default:n=`<div class="text-rose-400 font-mono">UNKNOWN_COMMAND: '${d(t)}'. Ketik <span class="text-yellow-400 underline cursor-pointer" onclick="window.runTerminalQuick('help')">'help'</span> untuk daftar perintah yang tersedia.</div>`}if(c){let e=document.createElement(`div`);e.className=`py-2 border-b border-cyan-500/20 text-sm font-mono`,e.innerHTML=`
              <div class="flex items-center gap-2 text-slate-400 mb-1">
                <span class="text-cyan-400">guest@shabik-node:~$</span>
                <span class="text-white">${d(t)}</span>
              </div>
              <div class="pl-4">${n}</div>
            `,c.appendChild(e),c.scrollTop=c.scrollHeight,window.cyberAudio.blip()}};function d(e){let t=document.createElement(`div`);return t.textContent=e,t.innerHTML}window.runTerminalQuick=e=>{s&&(s.value=e,u(e),s.value=``,s.focus())},l&&s&&l.addEventListener(`submit`,e=>{e.preventDefault(),s.value.trim()!==``&&(u(s.value),s.value=``)});let f=document.getElementById(`cyber-contact-form`),p=document.getElementById(`contact-feedback`),m=document.getElementById(`contact-submit-btn`);f&&p&&f.addEventListener(`submit`,async e=>{e.preventDefault();let t=new FormData(f);m&&(m.disabled=!0,m.innerHTML=`
                  <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                  MEMPROSES SINYAL TRANSMISI...
                `);try{let e=await fetch(f.action,{method:`POST`,headers:{Accept:`application/json`,"X-Requested-With":`XMLHttpRequest`},body:t}),n=await e.json();if(e.ok&&n.success)window.cyberAudio.success(),p.classList.remove(`hidden`),p.className=`p-4 rounded border border-green-500 bg-green-950/80 text-green-200 text-sm font-mono`,p.innerHTML=`
                      <div class="font-bold mb-1">✔ [TRANSMISSION SUCCESS]</div>
                      <div>${n.message}</div>
                    `,f.reset();else throw Error(n.message||`Gagal mengirim pesan transmisi.`)}catch{p.classList.remove(`hidden`),p.className=`p-4 rounded border border-rose-500 bg-rose-950/80 text-rose-200 text-sm font-mono`,p.innerHTML=`
                  <div class="font-bold mb-1">✖ [TRANSMISSION ERROR]</div>
                  <div>Terjadi kendala jaringan transmisi. Silakan gunakan tautan WhatsApp langsung di atas atau coba sesaat lagi.</div>
                `}finally{m&&(m.disabled=!1,m.innerHTML=`
                      <span class="relative z-10 flex items-center justify-center gap-2">
                        <span>KIRIM SINYAL TRANSMISI</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                      </span>
                    `)}})}),(function(){let e=document.getElementById(`cyber-cursor-dot`),t=document.getElementById(`cyber-cursor-ring`);if(!e||!t)return;if(window.matchMedia(`(hover: none)`).matches){e.style.display=`none`,t.style.display=`none`,document.body.style.cursor=`auto`;return}let n=-100,r=-100,i=-100,a=-100;document.addEventListener(`mousemove`,t=>{n=t.clientX,r=t.clientY,e.style.transform=`translate(${n}px, ${r}px) translate(-50%, -50%)`});function o(){i+=(n-i)*.14,a+=(r-a)*.14,t.style.transform=`translate(${i}px, ${a}px) translate(-50%, -50%)`,requestAnimationFrame(o)}o();let s=`a, button, [role="button"], input, textarea, select, label, .cyber-sfx-btn`;document.addEventListener(`mouseover`,e=>{e.target.closest(s)&&document.body.classList.add(`cursor-hover`)}),document.addEventListener(`mouseout`,e=>{e.target.closest(s)&&document.body.classList.remove(`cursor-hover`)}),document.addEventListener(`mousedown`,()=>{document.body.classList.add(`cursor-click`)}),document.addEventListener(`mouseup`,()=>{document.body.classList.remove(`cursor-click`)}),document.addEventListener(`mouseleave`,()=>{e.style.opacity=`0`,t.style.opacity=`0`}),document.addEventListener(`mouseenter`,()=>{e.style.opacity=`1`,t.style.opacity=`1`})})();