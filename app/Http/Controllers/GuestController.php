<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use DB;
use Hash;
use File;
use App\Perusahaan;
use App\User;

class GuestController extends Controller
{
    public function Index()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        } else {
            return view('guest.register');
        }
    }

    public function Masuk(Request $request)
    {
        if (Auth::attempt(['email' => $request->get('emaillogin'), 'password' => $request->get('passwordlogin')])) {
            $user = User::find(Auth::id());
            //cek password harus enskripsi lagi atau tidak
            if (Hash::needsRehash($user->password)) {
                $password = Hash::make($request->get('passwordlogin'));
                $user->password = $password;
                $user->save();
            }
                return redirect('/dashboard');
        } else {
            return redirect('/')->with('login', 'error');
        }
    }

    public function Daftar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pasfoto' => 'required|file|image|mimes:jpeg,png,jpg|max:5120',
            'nama' => 'required|string|max:25',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'kode' => 'required|integer',
            'jns_kel' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'tempatlahir' => 'required|string',
            'tanggallahir' => 'required|date',
            'no_surat_pemohon' => 'required|integer',
            'site_id' => 'required|string',
            'tinggi_tower' => 'required|integer',
            'alamat_tower' => 'required|string',
            'tanggal_bangun' => 'required|date',
            'koordinat_longitude' => 'required',
            'koordinat_latitude' => 'required',
            'pemilik_tanah' => 'required|string',
            'batas_utara' => 'required',
            'batas_timur' => 'required',
            'batas_selatan' => 'required',
            'batas_barat' => 'required',
            'lama_sewa' => 'required',
            'operator_pengguna' => 'required',
            'spp_menara_telkom' => 'required|file|pdf|mimes:pdf|max:5120',
            'ktp_pemohon' => 'required|file|pdf|mimes:pdf|max:5120',
            'surat_kuasa_perwakilan' => 'required|file|pdf|mimes:pdf|max:5120',
            'pernyataan_telah_diadakan_sosialisasi' => 'required|file|pdf|mimes:pdf|max:5120',
            'surat_perjanjian_sewa_lahan' => 'required|file|pdf|mimes:pdf|max:5120',
            'surat_pernyataan_tidak_sengketa' => 'required|file|pdf|mimes:pdf|max:5120',
            'permohonan_izin_tempat_usaha' => 'required|file|pdf|mimes:pdf|max:5120',
            'rekomendasi_kades' => 'required|file|pdf|mimes:pdf|max:5120',
            'rekomendasi_camat' => 'required|file|pdf|mimes:pdf|max:5120',
            'surat_jaminan_keamanan_tower' => 'required|file|pdf|mimes:pdf|max:5120',
            'berita_acara_kesepakatan' => 'required|file|pdf|mimes:pdf|max:5120',
            'surat_pernyataan_tidak_keberatan' => 'required|file|pdf|mimes:pdf|max:5120',
            'surat_persetujuan_keluarga' => 'required|file|pdf|mimes:pdf|max:5120',
            'surat_pernyataan_akses_jalan	' => 'required|file|pdf|mimes:pdf|max:5120',
            'surat_pernyataan_pemilik_tanah' => 'required|file|pdf|mimes:pdf|max:5120',
            'surat_pernyataan_boleh_bangun' => 'required|file|pdf|mimes:pdf|max:5120',
            'surat_pernyataan_pengmebalian_sewa_tanah' => 'required|file|pdf|mimes:pdf|max:5120',
            'kartu_keluarga' => 'required|file|pdf|mimes:pdf|max:5120',
            'sertifikat_tanah' => 'required|file|pdf|mimes:pdf|max:5120',
            'pajak_pbb' => 'required|file|pdf|mimes:pdf|max:5120',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('validator', 'failed');
        }

            $d = new User();
            $d->name = $request->get('nama');
            $d->email = $request->get('email');
            $d->id_perusahaan = $request->get('kode');
            $d->alamat = $request->get('alamat');
            $d->telepon = $request->get('telepon');
            $d->jns_kel = $request->get('jns_kel');
            $d->tempatlahir = $request->get('tempatlahir');
            $d->tanggallahir = $request->get('tanggallahir');
            $d->password = Hash::make($request->get('password'));
            $d->no_surat_pemohon = $request->get('no_surat_pemohon');
            $d->site_id = $request->get('site_id');
            $d->site_name = $request->get('site_name');
            $d->tinggi_tower = $request->get('tinggi_tower');
            $d->alamat_tower = $request->get('alamat_tower');
            $d->tanggal_bangun = $request->get('tanggal_bangun');
            $d->koordinat_longitude = $request->get('koordinat_longitude');
            $d->koordinat_latitude = $request->get('koordinat_latitude');
            $d->pemilik_tanah = $request->get('pemilik_tanah');
            $d->batas_utara = $request->get('batas_utara');
            $d->batas_timur = $request->get('batas_timur');
            $d->batas_selatan = $request->get('batas_selatan');
            $d->batas_barat = $request->get('batas_barat');
            $d->lama_sewa = $request->get('lama_sewa');
            $d->operator_pengguna = $request->get('operator_pengguna');


            $d->save();

            $file = $request->file('pasfoto');
            $extensi = $file->getClientOriginalExtension();
            $pin = mt_rand(00, 999);
            $nama_file = $d->id_perusahaan . '-' . $d->id . '-' . $pin . '.' . $extensi;
            $destinasi = public_path() . '/files/pasfoto/';

            if (!File::isDirectory($destinasi)) {
                File::makeDirectory($destinasi, 0775, true);
            }

            $file->move($destinasi, $nama_file);

            $p = User::whereid($d->id)->first();
            $p->foto = $nama_file;
            $p->save();

            if ($p) {
                Auth::loginUsingId($d->id);
                return redirect('dashboard');
            }else{
                return redirect()->route('home');
            }
    }

    public function DataPerusahaan()
    {
        $d = Perusahaan::all();
        return $d;
    }

    public function TambahPerusahaan(Request $request)
    {
        $d = new Perusahaan();
        $d->nama_perusahaan = $request->get('nama_perusahaan');
        $d->alamat_lengkap_perusahaan = $request->get('alamat_lengkap_perusahaan');
        $d->kota_perusahaan = $request->get('kota_perusahaan');
        $d->tlp_perusahaan = $request->get('tlp_perusahaan');
        $d->save();

        if($d){
            return 1;
        }else{
            return "";
        }
    }

    public function Keluar()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
