<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "ADMIN SISFOTEL",
            'email' => "admin@gmail.com",
            'password' => Hash::make('password'),
            'jns_kel' => "L",
            'alamat' => "Jl. Mt. Haryono Dalam VI No.63, RT.40, Gn. Bahagia, Kecamatan Balikpapan Selatan, Kota Balikpapan, Kalimantan Timur 76114•0812-5344-670",
            'telepon' => "085343649011",
            'tanggallahir' => "2000/05/05",
            'tempatlahir' => "Brebes Ouuhhh",
            'level' => "Admin",
            'id_perusahaan' => "1",
            'no_surat_pemohon' => "12431462412",
            'site_id' => "sisfotel.brebes.go.id",
            'site_name' => "Sistem Informasi Telekomunikasi",
            'tinggi_tower' => "190 M",
            'alamat_tower' => "Alamat Tower Gan, Dimana???",
            'tanggal_bangun' => "2009/05/05",
            'koordinat_longitude' => "5436346.43",
            'koordinat_latitude' => "-425245.45",
            'pemilik_tanah' => "Pemilik Tanah",
            'batas_utara' => "Batas Utara",
            'batas_timur' => "Batas Timur",
            'batas_selatan' => "Batas Selatan",
            'batas_barat' => "Batas Barat",
            'lama_sewa' => "Pemilik Tanah",
            'operator_pengguna' => "Batas Utara",
            'spp_menara_telkom' => "Batas Timur"
        ]);
    }
}
