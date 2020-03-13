<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('jns_kel',['L','P']);
            $table->longText('alamat');
            $table->string('telepon');
            $table->date('tanggallahir');
            $table->string('tempatlahir');
            $table->string('foto')->nullable();
            $table->string('bukti')->nullable();
            $table->enum('level',['Admin','Kasi','Kabid','Kepala','Pemohon'])->default('Pemohon');
            $table->string('id_perusahaan');
            // Bagian Penting Wkwkwk
            $table->string('no_surat_pemohon');
            $table->string('site_id');
            $table->string('site_name');
            $table->string('tinggi_tower');
            $table->string('alamat_tower');
            $table->date('tanggal_bangun');
            $table->string('koordinat_longitude');
            $table->string('koordinat_latitude');
            $table->string('pemilik_tanah');
            $table->string('batas_utara');
            $table->string('batas_timur');
            $table->string('batas_selatan');
            $table->string('batas_barat');
            $table->string('lama_sewa');
            $table->string('operator_pengguna');
            // Nah ini Bagian Upload Dokument
            $table->string('spp_menara_telkom')->nullable();
            $table->string('ktp_pemohon')->nullable();
            $table->string('surat_kuasa_perwakilan')->nullable();
            $table->string('surat_perjanjian_sewa_lahan')->nullable();
            $table->string('surat_pernyataan_tidak_sengketa')->nullable();
            $table->string('permohonan_izin_tempat_usaha')->nullable();
            $table->string('rekomendasi_kades')->nullable();
            $table->string('rekomendasi_camat')->nullable();
            $table->string('surat_jaminan_keamanan_tower')->nullable();
            $table->string('berita_acara_kesepakatan')->nullable();
            $table->string('surat_pernyataan_tidak_keberatan')->nullable();
            $table->string('surat_persetujuan_keluarga')->nullable();
            $table->string('surat_pernyataan_akses_jalan')->nullable();
            $table->string('surat_pernyataan_pemilik_tanah')->nullable();
            $table->string('surat_pernyataan_boleh_bangun')->nullable();
            $table->string('surat_pernyataan_pengmebalian_sewa_tanah')->nullable();
            $table->string('kartu_keluarga')->nullable();
            $table->string('sertifikat_tanah')->nullable();
            $table->string('pajak_pbb')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
