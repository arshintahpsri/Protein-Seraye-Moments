import Alpine from 'alpinejs';

window.Alpine = Alpine;

/*
 | Halaman Booking — kalender + pilihan sesi.
 | Data slot di bawah masih contoh statis. Saat backend siap, ganti `slots`
 | dengan data dari server (mis. fetch ke /api/slot?tanggal=YYYY-MM-DD).
 */
Alpine.data('booking', () => ({
    year: 2026,
    month: 3, // 0-based → April
    day: 24,
    jam: '11:00',

    // Hari prosesi wisuda (disorot rose di kalender)
    hariProsesi: [23, 24, 25],

    // status: tersedia | terisi | tutup
    slots: [
        { jam: '09:00', nama: 'Sesi Pagi', ket: 'Cahaya Alami Lembut • Area Taman UI', m: 'Sesi Pagi (Cahaya Alami Sempurna)', status: 'tersedia', ringkas: '(Sesi Pagi)' },
        { jam: '10:00', nama: 'Sesi Menjelang Siang', ket: 'Telah Dipesan oleh Klien Lain', m: 'Telah Dipesan oleh Klien Lain', status: 'terisi' },
        { jam: '11:00', nama: 'Sesi Emas Pasca-Sidang', ket: 'Sesi Emas Pasca-Sidang • Depan Balairung', m: 'Sesi Emas Pasca-Sidang', status: 'tersedia', ringkas: '(Sesi Siang Pasca-Sidang)' },
        { jam: '13:00', nama: 'Jeda Kru & Gear', ket: 'Istirahat Kru & Sterilisasi Lensa', m: 'Istirahat Kru & Sterilisasi Studio', status: 'tutup' },
        { jam: '15:00', nama: 'Sesi Sore (Golden Hour Balairung)', ket: 'Cahaya Senja Dramatis • Danau Kenanga & Selasar Kolom', m: 'Sesi Sore (Golden Hour Balairung)', status: 'tersedia', sisa: 1, ringkas: '(Sesi Sore Golden Hour)' },
    ],

    get namaBulan() {
        return new Date(this.year, this.month, 1).toLocaleDateString('id-ID', { month: 'long', year: 'numeric' });
    },

    // 6 baris × 7 kolom, minggu dimulai hari Minggu
    get sel() {
        const awal = new Date(this.year, this.month, 1).getDay();
        const hariBulan = new Date(this.year, this.month + 1, 0).getDate();
        const hariBulanLalu = new Date(this.year, this.month, 0).getDate();
        const out = [];
        for (let i = 0; i < 42; i++) {
            const n = i - awal + 1;
            if (n < 1) out.push({ d: hariBulanLalu + n, luar: true });
            else if (n > hariBulan) out.push({ d: n - hariBulan, luar: true });
            else out.push({ d: n, luar: false });
        }
        // buang baris terakhir bila seluruhnya di luar bulan
        return out.slice(35).every((c) => c.luar) ? out.slice(0, 35) : out;
    },

    pindahBulan(arah) {
        const t = new Date(this.year, this.month + arah, 1);
        this.year = t.getFullYear();
        this.month = t.getMonth();
        this.day = null;
    },

    pilihHari(c) {
        if (!c.luar) this.day = c.d;
    },

    adalahProsesi(c) {
        return !c.luar && this.month === 3 && this.year === 2026 && this.hariProsesi.includes(c.d);
    },

    pilihSlot(s) {
        if (s.status === 'tersedia') this.jam = s.jam;
    },

    get slotDipilih() {
        return this.slots.find((s) => s.jam === this.jam);
    },

    get tanggal() {
        return this.day ? new Date(this.year, this.month, this.day) : null;
    },
    get tanggalPanjang() {
        return this.tanggal
            ? this.tanggal.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' })
            : 'Belum dipilih';
    },
    get tanggalHariBesar() {
        return this.tanggal
            ? this.tanggal.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' }).toUpperCase()
            : '—';
    },
    get tanggalPendek() {
        return this.tanggal ? this.tanggal.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' }) : '—';
    },
    get tanggalIso() {
        if (!this.tanggal) return '';
        const p = (n) => String(n).padStart(2, '0');
        return `${this.year}-${p(this.month + 1)}-${p(this.day)}`;
    },
    get stepJadwal() {
        return this.tanggal ? `${this.tanggalPendek} • ${this.jam} WIB` : 'Pilih tanggal & jam';
    },
    get siapLanjut() {
        return Boolean(this.tanggal && this.slotDipilih);
    },
}));

Alpine.start();
