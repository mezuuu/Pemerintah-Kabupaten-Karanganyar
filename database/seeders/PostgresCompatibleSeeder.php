<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostgresCompatibleSeeder extends Seeder
{
    public function run()
    {
        // 1. Clear tables to prevent duplicate ID errors on multiple deployments
        DB::table('users')->delete();
        DB::table('news')->delete();
        DB::table('menu_links')->delete();

        // 2. Insert Users
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Administrator Diskominfo',
            'username' => 'DiskominfoKeren',
            'email' => 'admin@karanganyarkab.go.id',
            'password' => \Illuminate\Support\Facades\Hash::make('DiskominfoKaranganyarKeren'),
            'is_admin' => true,
            'is_approved' => true,
            'remember_token' => 'LHmDnPhW77JWF5uuwnvpkyj6oFEyhHVPBKqmogAVBWjNyrXXhhMKEfWPqJ1f',
            'created_at' => '2026-04-27 19:40:03',
            'updated_at' => '2026-04-27 19:40:03',
        ]);

        // 3. Insert News
        DB::table('news')->insert([
            [
                'id' => 4,
                'headline' => 'Viral Keributan Antarpendaki di Puncak Gunung Lawu Gara-gara Berebut Foto',
                'description' => 'Keributan antarpendaki terjadi di kawasan spot puncakGunung Lawu. Insiden tersebut sempat terekam video dan viral di media sosial pada Senin (27/4/2026).\r\n\r\nDalam rekaman video yang beredar, keributan terjadi di lokasi spot foto puncak Gunung Lawu. Dalam video itu terlihat sejumlah orang terlibat adu dorong hingga menyebabkan seorang pendaki terjatuh. Sedangkan sejumlah pendaki lain tampak berupaya meredakan situasi.',
                'link' => 'https://solopos.espos.id/viral-keributan-antarpendaki-di-puncak-gunung-lawu-gara-gara-berebut-foto-2210681',
                'og_image' => null,
                'manual_image' => '1777355435_69f04aab82153.webp',
                'category' => 'Sosial',
                'created_by' => 1,
                'created_at' => '2026-04-27 22:42:12',
                'updated_at' => '2026-04-27 22:50:36'
            ],
            [
                'id' => 5,
                'headline' => 'Warga Kaliwuluh Terlapor Pengeroyokan, Rencana Minta Perlindungan Hukum Ke Pemkab Dan DPRD',
                'description' => 'Disangka lakukan pengeroyokan warga kaliwuluh kebak kramat diperiksa Polres Karanganyar, rencanakan minta perlindungan hukum ke pemkab dan DPRD Karanganyar',
                'link' => 'https://kabarkaranyar.com/warga-kaliwuluh-terlapor-pengeroyokan-rencana-minta-perlindungan-hukum-ke-pemkab-dan-dprd/',
                'og_image' => 'https://kabarkaranganyar.com/wp-content/uploads/2026/04/IMG-20260427-191048.jpg',
                'manual_image' => null,
                'category' => 'Sosial',
                'created_by' => 1,
                'created_at' => '2026-04-27 22:55:19',
                'updated_at' => '2026-04-27 22:55:19'
            ]
        ]);

        // 4. Insert Menu Links
        $menus = [
            [1, 'Profil', 'Legislatif', 'https://www.karanganyarkab.go.id/legislatif/', true, 1],
            [2, 'Profil', 'Daftar Pejabat', 'https://www.karanganyarkab.go.id/daftar-nama-pejabat/', true, 2],
            [3, 'Profil', 'RLPPD', 'https://www.karanganyarkab.go.id/rlppd-kabupaten-karanganyar/', true, 3],
            [4, 'Profil', 'Pariwisata', 'https://pesonakaranganyar.karanganyarkab.go.id/', true, 4],
            [5, 'Perangkat Daerah', 'Sekretariat Daerah', 'https://setda.karanganyarkab.go.id/', true, 1],
            [6, 'Perangkat Daerah', 'Sekretariat DPRD', 'https://dprd.karanganyarkab.go.id/struktur-organisasi-dprd-kabupaten-karanganyar/', true, 2],
            [7, 'Perangkat Daerah', 'Inspektorat', 'https://inspektorat.karanganyarkab.go.id/', true, 3],
            [8, 'Perangkat Daerah', 'Dinas', 'https://www.karanganyarkab.go.id/category/skpd/dinas/', true, 4],
            [9, 'Perangkat Daerah', 'Badan', 'https://www.karanganyarkab.go.id/category/skpd/badan/', true, 5],
            [10, 'Perangkat Daerah', 'Kecamatan', 'https://www.karanganyarkab.go.id/kecamatan/', true, 6],
            [11, 'Perangkat Daerah', 'Kelurahan', 'https://www.karanganyarkab.go.id/kelurahan/', true, 7],
            [12, 'Perangkat Daerah', 'RSUD (Rumah Sakit Daerah)', 'https://rsudkaranganyar.simkeskhanza.com/', true, 8],
            [13, 'Perangkat Daerah', 'BUMD', 'https://www.karanganyarkab.go.id/category/bumd/', true, 9],
            [14, 'Aduan', 'Whistleblowing System', 'https://www.karanganyarkab.go.id/wbs/', true, 1],
            [15, 'Aduan', 'Suara Masyarakat', 'https://www.karanganyarkab.go.id/suara-masyarakat/', true, 2],
            [16, 'Aduan', 'Laporgub', 'https://laporgub.jatengprov.go.id/', true, 3],
            [17, 'Aduan', 'SP4N Lapor', 'https://www.lapor.go.id/', true, 4],
            [18, 'Aduan', 'Sapamas (WA)', 'https://api.whatsapp.com/send?phone=628112629999', true, 5],
            [19, 'Data', 'Satudata', 'https://satudata.karanganyarkab.go.id/', true, 1],
            [20, 'Data', 'Opendata', 'https://opendata.karanganyarkab.go.id/', true, 2],
            [21, 'Data', 'Keuangan Daerah', 'https://www.karanganyarkab.go.id/transparansi-anggaran-2/', true, 3],
            [22, 'Data', 'Hibah & Bansos', 'https://www.karanganyarkab.go.id/hibah-dan-bansos/', true, 4],
            [23, 'Data', 'Statistik', 'https://www.karanganyarkab.go.id/statistik/', true, 5]
        ];

        $menuData = [];
        foreach ($menus as $m) {
            $menuData[] = [
                'id' => $m[0],
                'group' => $m[1],
                'label' => $m[2],
                'url' => $m[3],
                'is_external' => $m[4],
                'order' => $m[5],
                'created_at' => '2026-04-27 20:29:38',
                'updated_at' => '2026-04-27 20:29:38'
            ];
        }

        DB::table('menu_links')->insert($menuData);
    }
}
