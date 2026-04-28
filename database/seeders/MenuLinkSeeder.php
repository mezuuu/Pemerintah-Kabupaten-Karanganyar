<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuLink;

class MenuLinkSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            // === Profil ===
            ['group' => 'Profil', 'label' => 'Legislatif', 'url' => 'https://www.karanganyarkab.go.id/legislatif/', 'order' => 1],
            ['group' => 'Profil', 'label' => 'Daftar Pejabat', 'url' => 'https://www.karanganyarkab.go.id/daftar-nama-pejabat/', 'order' => 2],
            ['group' => 'Profil', 'label' => 'RLPPD', 'url' => 'https://www.karanganyarkab.go.id/rlppd-kabupaten-karanganyar/', 'order' => 3],
            ['group' => 'Profil', 'label' => 'Pariwisata', 'url' => 'https://pesonakaranganyar.karanganyarkab.go.id/', 'order' => 4],

            // === Perangkat Daerah ===
            ['group' => 'Perangkat Daerah', 'label' => 'Sekretariat Daerah', 'url' => 'https://setda.karanganyarkab.go.id/', 'order' => 1],
            ['group' => 'Perangkat Daerah', 'label' => 'Sekretariat DPRD', 'url' => 'https://dprd.karanganyarkab.go.id/struktur-organisasi-dprd-kabupaten-karanganyar/', 'order' => 2],
            ['group' => 'Perangkat Daerah', 'label' => 'Inspektorat', 'url' => 'https://inspektorat.karanganyarkab.go.id/', 'order' => 3],
            ['group' => 'Perangkat Daerah', 'label' => 'Dinas', 'url' => 'https://www.karanganyarkab.go.id/category/skpd/dinas/', 'order' => 4],
            ['group' => 'Perangkat Daerah', 'label' => 'Badan', 'url' => 'https://www.karanganyarkab.go.id/category/skpd/badan/', 'order' => 5],
            ['group' => 'Perangkat Daerah', 'label' => 'Kecamatan', 'url' => 'https://www.karanganyarkab.go.id/kecamatan/', 'order' => 6],
            ['group' => 'Perangkat Daerah', 'label' => 'Kelurahan', 'url' => 'https://www.karanganyarkab.go.id/kelurahan/', 'order' => 7],
            ['group' => 'Perangkat Daerah', 'label' => 'RSUD (Rumah Sakit Daerah)', 'url' => 'https://rsudkaranganyar.simkeskhanza.com/', 'order' => 8],
            ['group' => 'Perangkat Daerah', 'label' => 'BUMD', 'url' => 'https://www.karanganyarkab.go.id/category/bumd/', 'order' => 9],

            // === Aduan ===
            ['group' => 'Aduan', 'label' => 'Whistleblowing System', 'url' => 'https://www.karanganyarkab.go.id/wbs/', 'order' => 1],
            ['group' => 'Aduan', 'label' => 'Suara Masyarakat', 'url' => 'https://www.karanganyarkab.go.id/suara-masyarakat/', 'order' => 2],
            ['group' => 'Aduan', 'label' => 'Laporgub', 'url' => 'https://laporgub.jatengprov.go.id/', 'order' => 3],
            ['group' => 'Aduan', 'label' => 'SP4N Lapor', 'url' => 'https://www.lapor.go.id/', 'order' => 4],
            ['group' => 'Aduan', 'label' => 'Sapamas (WA)', 'url' => 'https://api.whatsapp.com/send?phone=628112629999', 'order' => 5],

            // === Data ===
            ['group' => 'Data', 'label' => 'Satudata', 'url' => 'https://satudata.karanganyarkab.go.id/', 'order' => 1],
            ['group' => 'Data', 'label' => 'Opendata', 'url' => 'https://opendata.karanganyarkab.go.id/', 'order' => 2],
            ['group' => 'Data', 'label' => 'Keuangan Daerah', 'url' => 'https://www.karanganyarkab.go.id/transparansi-anggaran-2/', 'order' => 3],
            ['group' => 'Data', 'label' => 'Hibah & Bansos', 'url' => 'https://www.karanganyarkab.go.id/hibah-dan-bansos/', 'order' => 4],
            ['group' => 'Data', 'label' => 'Statistik', 'url' => 'https://www.karanganyarkab.go.id/statistik/', 'order' => 5],
        ];

        foreach ($links as $link) {
            MenuLink::create(array_merge($link, ['is_external' => true]));
        }
    }
}
