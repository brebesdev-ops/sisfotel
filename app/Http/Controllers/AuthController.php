<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perusahaan;
use Auth;
use File;
use Hash;
use PDF;
use App\User;
use Validator;

class AuthController extends Controller
{
    //
    public function Dashboard()
    {
        $perusahaan = Perusahaan::whereid(Auth::user()->id_perusahaan)->first()->nama_perusahaan;

        return view('auth\dashboard',compact('perusahaan'));
    }


     public function UploadBukti(Request $request)
     {
        $validator = Validator::make($request->all(), [
            'formBukti' => 'required|file|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('validator', 'failed');
        }

            $d = User::whereid(Auth::user()->id)->first();

            $file = $request->file('formBukti');
            $extensi = $file->getClientOriginalExtension();
            $pin = mt_rand(00, 999);
            $nama_file = $d->id_perusahaan . '-' . $d->id . '-' . $pin . '.' . $extensi;
            $destinasi = public_path() . '/files/bukti/';

            if (!File::isDirectory($destinasi)) {
                File::makeDirectory($destinasi, 0775, true);
            }

            $file->move($destinasi, $nama_file);

            $p = User::whereid($d->id)->first();
            $p->bukti = $nama_file;
            $p->save();

            if ($p) {
                return redirect('dashboard');
            }
     }

     public function Anggota()
     {

        if(Auth::user()->level == "Admin"){
            return view('auth\anggota');
        }else{
            abort(403, 'Unauthorized action.');
        }
     }

     public function DataAnggota()
     {
        if(Auth::user()->level == "Admin"){
            $d = User::select('users.id as id',
            'name',
            'email',
            'tanggallahir',
            'foto',
            'bukti',
            'telepon',
            'tempatlahir',
            'email_verified_at',
            'jns_kel',
            'alamat',
            'perusahaan.nama_perusahaan')->where('level','!=','Admin')->join('perusahaan','perusahaan.id','users.id_perusahaan')->get();
            return $d;
        }else{
            return response()->json(['error' => 'Not authorized.'],403);
        }
     }

     public function AccAnggota(Request $request)
     {
         if(Auth::user()->level == "Admin"){
            $a = User::whereid($request->get('id'))->first();
            $a->email_verified_at = \Carbon\Carbon::now()->toDateTimeString();
            $a->save();
         }else{
            return response()->json(['error' => 'Not authorized.'],403);
         }
     }

     public function ResetAnggota(Request $request)
     {
         if(Auth::user()->level == "Admin"){
            $d = User::whereid($request->get('id'))->first();

            $a = User::whereid($request->get('id'))->first();
            $a->password = Hash::make($d->email);
            $a->save();
         }else{
            return response()->json(['error' => 'Not authorized.'],403);
         }
     }

     public function Kartu()
     {
         if(is_null(Auth::user()->email_verified_at)){
            abort(403, 'Unauthorized action.');
         }else{
            $data = User::select('name','nama_perusahaan')->join('perusahaan','perusahaan.id','users.id_perusahaan')->where('users.id','=', Auth::user()->id)->first();
            $d = [$data->name, $data->nama_perusahaan];
            $pdf = PDF::loadView('auth.kartu', ['data'=>$data]);
             return $pdf->download('Kartu '.$data->name.'.pdf');
         }
     }
}
