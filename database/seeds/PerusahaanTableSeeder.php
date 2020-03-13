<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PerusahaanTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perusahaan')->insert([
            'nama_perusahaan' => "PT SIKODE Tbk",
            'alamat_lengkap_perusahaan' => "Jl. Mt. Haryono Dalam VI No.63, RT.40, Gn. Bahagia, Kecamatan Balikpapan Selatan, Kota Balikpapan, Kalimantan Timur 76114•0812-5344-670",
            'kota_perusahaan' => "Ibu Kota Baru",
            'tlp_perusahaan' => "0085343649011"
        ]);
    }
}
