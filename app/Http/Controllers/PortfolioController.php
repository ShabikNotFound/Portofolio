<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    /**
     * Get the portfolio data payload.
     *
     * @return array<string, mixed>
     */
    protected function getPortfolioData(): array
    {
        $birthDate = Carbon::create(2005, 10, 1);
        $age = $birthDate->age;

        return [
            'personal' => [
                'name' => 'Shabik Sholahudin',
                'alias' => 'SHABIK // 01-10',
                'headline' => 'Informatics Student & Aspiring Web Developer',
                'subheadline' => 'Fokus pada arsitektur PHP, Laravel, serta kepemimpinan tim teknologi.',
                'bio' => 'Mahasiswa aktif di UBSI Kota Tasikmalaya yang memiliki minat mendalam di bidang rekayasa perangkat lunak dan manajemen teknologi. Berpengalaman di Divisi Litbang 2024/2026 di HIMASI UBSI, terbiasa merancang proyek kolaboratif, memecahkan masalah logika, dan terus mendalami ekosistem modern web development.',
                'birth_date' => '01 Oktober 2005',
                'age' => $age,
                'location' => 'Rajapolah, Tasikmalaya, Jawa Barat',
                'gender' => 'Laki-laki',
                'citizenship' => 'Indonesia',
                'marital_status' => 'Mahasiswa UBSI Kota Tasikmalaya',
                'status' => 'Mahasiswa UBSI Kota Tasikmalaya',
                'phone' => '081563346921',
                'phone_display' => '+62 815-6334-6921',
                'whatsapp_url' => 'https://wa.me/6281563346921?text=Halo%20Shabik%20Sholahudin,%20saya%20melihat%20portofolio%20cyberpunk%20Anda.',
                'email' => 'shabiksholahudin@gmail.com',
                'avatar' => asset('images/avatar.jpg'),
                'status_indicator' => 'Mahasiswa UBSI Kota Tasikmalaya',
                'clearance_level' => 'LEVEL-04 // UBSI_NODE',
            ],
            'education' => [
                [
                    'institution' => 'Universitas Bina Sarana Informatika (UBSI)',
                    'campus' => 'Kota Tasikmalaya',
                    'level' => 'Pendidikan Tinggi',
                    'period' => 'Sekarang',
                    'role' => 'Mahasiswa Aktif',
                    'code' => 'EDU-UBSI-04',
                    'description' => 'Mendalami bidang Teknologi Informasi dan Sistem Informasi, algoritma pemrograman, perancangan database, rekayasa perangkat lunak, serta kepemimpinan organisasi kemahasiswaan dengan capaian Indeks Prestasi Kumulatif (IPK) 3.96 / 4.00.',
                    'tags' => ['IPK 3.96', 'Sistem Informasi', 'Software Engineering', 'HiMASI UBSI'],
                ],
                [
                    'institution' => 'SMAN 6 Tasikmalaya',
                    'campus' => 'Kota Tasikmalaya',
                    'level' => 'Sekolah Menengah Atas',
                    'period' => 'Lulus',
                    'role' => 'Alumni',
                    'code' => 'EDU-SMAN6-03',
                    'description' => 'Menempuh pendidikan menengah atas dengan fondasi analitis, sains, dan keterlibatan aktif dalam kegiatan sekolah.',
                    'tags' => ['Sains & Analitika', 'Disiplin', 'Pengembangan Diri'],
                ],
                [
                    'institution' => 'SMP Terpadu Manahijul Huda',
                    'campus' => 'Tasikmalaya',
                    'level' => 'Sekolah Menengah Pertama',
                    'period' => 'Lulus',
                    'role' => 'Alumni',
                    'code' => 'EDU-SMP-02',
                    'description' => 'Membangun karakter dasar, kedisiplinan integratif, kepemimpinan sosial, dan literasi teknologi dasar.',
                    'tags' => ['Karakter', 'Integritas', 'Literasi Dasar'],
                ],
                [
                    'institution' => 'SDN Rajapolah',
                    'campus' => 'Rajapolah, Kab. Tasikmalaya',
                    'level' => 'Pendidikan Dasar',
                    'period' => 'Lulus',
                    'role' => 'Alumni',
                    'code' => 'EDU-SD-01',
                    'description' => 'Fondasi pendidikan dasar dan pengenalan pertama pada logika matematika dan kerja tim.',
                    'tags' => ['Pendidikan Dasar', 'Matematika Dasar'],
                ],
            ],
            'experiences' => [
                [
                    'title' => 'Mahasiswa Magang',
                    'organization' => 'Dinas Komunikasi dan Informatika (Diskominfo) Kota Tasikmalaya',
                    'badge' => 'INTERNSHIP // ACTIVE',
                    'period' => '2025 - Sekarang',
                    'description' => 'Menjalani program magang aktif di Diskominfo Kota Tasikmalaya, berkontribusi pada pengelolaan sistem informasi dan layanan digital pemerintah daerah.',
                    'highlights' => [
                        'Terlibat dalam pengembangan dan pemeliharaan sistem informasi instansi.',
                        'Mendukung operasional layanan teknologi informasi pemerintah kota.',
                        'Mendapatkan pengalaman langsung di lingkungan kerja pemerintahan berbasis digital.',
                    ],
                    'tech' => ['Government IT', 'Sistem Informasi', 'Laravel', 'PHP'],
                ],
                [
                    'title' => 'Divisi Litbang 2024/2026',
                    'organization' => 'HiMASI UBSI (Himpunan Mahasiswa Sistem Informasi)',
                    'badge' => 'R&D // HIMASI',
                    'period' => '2024 - 2026',
                    'description' => 'Mengembangkan program penelitian dan eksplorasi teknologi bagi anggota organisasi, memprakarsai forum riset koding, dan berpartisipasi aktif dalam strategi peningkatan kompetensi mahasiswa Sistem Informasi UBSI.',
                    'highlights' => [
                        'Mengarahkan roadmap riset teknologi dan workshop teknis himpunan.',
                        'Menginisiasi transfer knowledge terkait pemrograman dan teknologi web terkini.',
                        'Mengawasi evaluasi kinerja divisi serta inovasi program kerja.',
                    ],
                    'tech' => ['Research & Tech Planning', 'Team Collaboration', 'Community Dev'],
                ],
                [
                    'title' => 'Ketua Pelaksana Kelas Reguler',
                    'organization' => 'HiMASI UBSI',
                    'badge' => 'PROJECT MANAGEMENT',
                    'period' => 'Selesai / Terlaksana Sukses',
                    'description' => 'Bertanggung jawab penuh atas manajemen proyek acara kelas pelatihan reguler; mulai dari penyusunan rundown, rekrutmen tutor, manajemen logistik, hingga penyusunan kurikulum materi dasar.',
                    'highlights' => [
                        'Mengatur jadwal, modul pembelajaran, dan koordinasi panitia lintas seksi.',
                        'Memastikan jalannya pelatihan dengan tingkat kehadiran dan kepuasan peserta yang tinggi.',
                        'Melakukan problem solving cepat di lapangan selama acara berlangsung.',
                    ],
                    'tech' => ['Event Management', 'Curriculum Planning', 'Risk Mitigation'],
                ],
                [
                    'title' => 'Technical Support — BJU',
                    'organization' => 'Beasiswa Jalur Undangan (BJU)',
                    'badge' => 'TECHNICAL SUPPORT',
                    'period' => 'Aktif',
                    'description' => 'Bertanggung jawab sebagai technical support di lingkungan Badan Jurnalistik UBSI, memastikan kebutuhan teknis operasional unit terpenuhi dengan baik.',
                    'highlights' => [
                        'Menangani kebutuhan teknis perangkat dan sistem yang digunakan unit.',
                        'Mendukung kelancaran kegiatan dan operasional BJU dari sisi teknologi.',
                        'Berkolaborasi lintas divisi untuk memastikan infrastruktur teknis berjalan optimal.',
                    ],
                    'tech' => ['Technical Support', 'Troubleshooting', 'Team Collaboration'],
                ],
            ],
            'skills' => [
                'technical' => [
                    [
                        'name' => 'Pemrograman PHP & Modern Laravel',
                        'level' => 82,
                        'tier' => 'PROFICIENT',
                        'desc' => 'Arsitektur MVC, Blade templating, routing, Eloquent ORM, dan API development.',
                    ],
                    [
                        'name' => 'Ilmu Dasar Pemrograman & Algoritma',
                        'level' => 85,
                        'tier' => 'FOUNDATION',
                        'desc' => 'Logika pemrograman terstruktur, struktur data, pseudocode, dan dasar OOP.',
                    ],
                    [
                        'name' => 'Web Technologies (HTML5, Modern CSS, JS)',
                        'level' => 80,
                        'tier' => 'SOLID',
                        'desc' => 'Perancangan layout responsif, Tailwind CSS utility, DOM manipulation, Cyber aesthetic UI.',
                    ],
                    [
                        'name' => 'Database Relasional & SQL (MySQL / SQLite)',
                        'level' => 78,
                        'tier' => 'CORE',
                        'desc' => 'Pembuatan skema database, relasi tabel, indexing, serta query data.',
                    ],
                ],
                'tools' => [
                    [
                        'name' => 'Microsoft Office (Word, Excel, PowerPoint)',
                        'level' => 90,
                        'tier' => 'ADVANCED',
                        'desc' => 'Pengolahan dokumen formal, analisis formula spreadsheet/Excel, serta slide presentasi interaktif.',
                    ],
                    [
                        'name' => 'Git & GitHub Version Control',
                        'level' => 75,
                        'tier' => 'CORE',
                        'desc' => 'Branching, commit history, pull requests, serta repositori kolaboratif.',
                    ],
                ],
                'soft' => [
                    [
                        'name' => 'Manajemen Proyek & Waktu (Time Management)',
                        'level' => 92,
                        'tier' => 'SUPERIOR',
                        'desc' => 'Terampil menyusun timeline, membagi prioritas kerja, dan memimpin eksekusi hingga tuntas.',
                    ],
                    [
                        'name' => 'Berpikir Kreatif & Problem Solving Logis',
                        'level' => 88,
                        'tier' => 'SUPERIOR',
                        'desc' => 'Kemampuan membedah tantangan kompleks dan menciptakan pendekatan solusi yang inovatif.',
                    ],
                    [
                        'name' => 'Kepemimpinan Tim & Komunikasi Efektif',
                        'level' => 86,
                        'tier' => 'STRONG',
                        'desc' => 'Pengalaman nyata di Divisi Litbang 2024/2026 dan Ketua Pelaksana kegiatan kampus.',
                    ],
                ],
            ],
            'projects' => [
                [
                    'title' => 'e-CV & Portfolio System',
                    'category' => 'Laravel Application',
                    'summary' => 'Website portofolio dan resume interaktif berbasis Laravel 12 & PHP 8.4 dengan tema semi-cyberpunk, interactive CLI terminal, validasi kontak terintegrasi, dan mode cetak PDF resmi.',
                    'stack' => ['PHP 8.4', 'Laravel 12', 'Tailwind CSS', 'JavaScript', 'SQLite'],
                    'status' => 'DEPLOYED // LIVE',
                    'icon' => 'terminal',
                ],
                [
                    'title' => 'SmartOrganic',
                    'category' => 'Website About Waste Bank',
                    'summary' => 'Platform website bank sampah (waste bank) terpadu untuk pencatatan dan pengelolaan penyetoran sampah organik dan anorganik, sistem saldo nasabah, serta edukasi lingkungan hidup.',
                    'stack' => ['PHP', 'Laravel / Web', 'Database MySQL', 'Tailwind CSS', 'Dashboard'],
                    'status' => 'COMPLETED // ACTIVE',
                    'icon' => 'recycle',
                ],
                [
                    'title' => 'Satu Rumah Disperwaskim',
                    'category' => 'Public Sector Housing System',
                    'summary' => 'Sistem pendataan dan verifikasi kelayakan rumah untuk Dinas Perumahan dan Kawasan Permukiman (Disperwaskim), mendukung validasi hunian terpusat, monitoring data lapangan, dan rekapitulasi data akurat.',
                    'stack' => ['Web Platform', 'PHP Framework', 'Relational DB', 'Data Reporting'],
                    'status' => 'PRODUCTION // DELIVERED',
                    'icon' => 'home',
                ],
                [
                    'title' => 'SIAPA (Sistem Informasi Administrasi Pembayaran Abi Bakar Ash Shidiq)',
                    'category' => 'Financial Administration System',
                    'summary' => 'Sistem informasi pengelolaan administrasi transaksi dan pembayaran lembaga Abi Bakar Ash Shidiq; mengotomatisasi pencatatan tagihan, cetak bukti pembayaran, dan laporan keuangan komprehensif.',
                    'stack' => ['PHP / Laravel', 'Financial Engine', 'Reporting & Kwitansi', 'Role Access'],
                    'status' => 'PRODUCTION // ACTIVE',
                    'icon' => 'credit-card',
                ],
            ],
            'stats' => [
                ['label' => 'ORGANIZATION_ROLES', 'value' => '3+', 'desc' => 'Kepengurusan Kampus'],
                ['label' => 'PROGRAMMING_FOCUS', 'value' => 'PHP/LV', 'desc' => 'Laravel Ecosystem'],
                ['label' => 'PROJECT_EFFICIENCY', 'value' => '100%', 'desc' => 'On-Time Completion'],
                ['label' => 'STATUS_CODE', 'value' => '200 OK', 'desc' => 'System Online'],
            ],
            'academic_records' => [
                'current_gpa' => '3.96',
                'semesters' => [
                    ['short' => 'Sem 1', 'nilai' => '4.00', 'percentage' => 100, 'status' => 'Maksimal', 'accent' => 'from-cyan-500 to-cyan-700'],
                    ['short' => 'Sem 2', 'nilai' => '3.84', 'percentage' => 60,  'status' => 'Tinggi',   'accent' => 'from-sky-500 to-sky-700'],
                    ['short' => 'Sem 3', 'nilai' => '4.00', 'percentage' => 100, 'status' => 'Maksimal', 'accent' => 'from-cyan-500 to-cyan-700'],
                    ['short' => 'Sem 4', 'nilai' => '4.00', 'percentage' => 100, 'status' => 'Maksimal', 'accent' => 'from-emerald-500 to-emerald-700'],
                ],
            ],
        ];
    }

    /**
     * Render the cyberpunk portfolio homepage.
     */
    public function index(): View
    {
        $data = $this->getPortfolioData();

        return view('portfolio', $data);
    }

    /**
     * Handle contact message submission.
     */
    public function submitContact(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'subject' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:3000'],
        ]);

        $contactMessage = ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'] ?? 'Pesan Transmisi Cyberpunk e-CV',
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'TRANSMISSION_RECEIVED: Pesan Anda berhasil dikirim ke Shabik Sholahudin!',
                'id' => $contactMessage->id,
            ]);
        }

        return redirect()->back()->with('status', 'TRANSMISSION_SUCCESS: Sinyal transmisi Anda telah tersimpan dan diterima. Terima kasih telah menghubungi!');
    }

    /**
     * Dedicated printable / PDF CV view.
     */
    public function printCv(): View
    {
        $data = $this->getPortfolioData();

        return view('cv-print', $data);
    }
}
