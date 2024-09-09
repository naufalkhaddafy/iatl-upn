<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [11, "ACEH"],
            [12, "SUMATERA UTARA"],
            [13, "SUMATERA BARAT"],
            [14, "RIAU"],
            [15, "JAMBI"],
            [16, "SUMATERA SELATAN"],
            [17, "BENGKULU"],
            [18, "LAMPUNG"],
            [19, "KEPULAUAN BANGKA BELITUNG"],
            [21, "KEPULAUAN RIAU"],
            [31, "DKI JAKARTA"],
            [32, "JAWA BARAT"],
            [33, "JAWA TENGAH"],
            [34, "DAERAH ISTIMEWA YOGYAKARTA"],
            [35, "JAWA TIMUR"],
            [36, "BANTEN"],
            [51, "BALI"],
            [52, "NUSA TENGGARA BARAT"],
            [53, "NUSA TENGGARA TIMUR"],
            [61, "KALIMANTAN BARAT"],
            [62, "KALIMANTAN TENGAH"],
            [63, "KALIMANTAN SELATAN"],
            [64, "KALIMANTAN TIMUR"],
            [65, "KALIMANTAN UTARA"],
            [71, "SULAWESI UTARA"],
            [72, "SULAWESI TENGAH"],
            [73, "SULAWESI SELATAN"],
            [74, "SULAWESI TENGGARA"],
            [75, "GORONTALO"],
            [76, "SULAWESI BARAT"],
            [81, "MALUKU"],
            [82, "MALUKU UTARA"],
            [91, "PAPUA"],
            [92, "PAPUA BARAT"],
            [93, "PAPUA SELATAN"],
            [94, "PAPUA TENGAH"],
            [95, "PAPUA PEGUNUNGAN"],
            // [96, "PAPUA BARAT DAYA"],
        ];

        foreach ($data as $province) {
            Province::create([
                'id'=>$province[0],
                'name'=>$province[1]
            ]);
        }
    }
}
