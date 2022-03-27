<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Kelurahan;
use PDF;


class PasienController extends Controller
{
    public function index()
    {
        $dt_kelurahan = new Kelurahan;
        
        $list_pasien = Pasien::join("kelurahans", "pasiens.id_kelurahan", "=", "kelurahans.id")
                                ->orderBy("pasiens.created_at", "ASC")
                                ->get();
        
        $list_kelurahan = $dt_kelurahan->all();

        return view('pasien.index', compact('list_pasien', 'list_kelurahan'));
    }

    public function save_data(Request $requests)
    {
        $data_pasien = new Pasien;
        $get_kelurahan = Kelurahan::find($requests->kelurahan);
        $total_pasien = Pasien::count() == 0 ? 1 : (Pasien::count()+1);
        if (strlen($total_pasien + 1) == 1) {
            $firstcode = "000000";
        } 
        elseif (strlen($total_pasien + 1) == 2) {
            $firstcode = "00000";
        }
        elseif (strlen($total_pasien + 1) == 3) {
            $firstcode = "0000";
        }
        elseif (strlen($total_pasien + 1) == 4) {
            $firstcode = "000";
        }
        elseif (strlen($total_pasien + 1) == 5) {
            $firstcode = "00";
        }
        elseif (strlen($total_pasien + 1) == 5) {
            $firstcode = "0";
        }
        elseif (strlen($total_pasien + 1) == 5) {
            $firstcode = "";
        }

        $id_pasien = date("Ym") . $firstcode . $total_pasien;

        $data_pasien->id_pasien         = $id_pasien;
        $data_pasien->nama_pasien       = $requests->namapasien;
        $data_pasien->tanggal_lahir     = $requests->tanggallahir;
        $data_pasien->jenis_kelamin     = $requests->jeniskelamin;
        $data_pasien->alamat_pasien     = $requests->alamat;
        $data_pasien->telepon           = $requests->nomortelepon;
        $data_pasien->rt                = $requests->rt;
        $data_pasien->rw                = $requests->rw;
        $data_pasien->id_kelurahan      = $get_kelurahan->id;
        $data_pasien->created_by        = Auth::id();

        $data_pasien->save();

        return redirect('/pasien')->with(['success' => 'Data pasien berhasil disimpan']);
    }

    public function update_data(Request $requests)
    {
        $pasien = pasien::find($requests->idpasien);

        $pasien->pasien_name = $requests->namapasien;
        $pasien->kecamatan_name = $requests->namakecamatan;
        $pasien->kota_name      = $requests->namakota;
        
        $pasien->save();

        return redirect('/pasien')->with(['success' => 'Data pasien berhasil diupdate']);
    }

    public function delete_data(Request $requests)
    {
        $pasien = pasien::find($requests->del_idpasien);
 
        $pasien->delete();

        return redirect('/pasien')->with(['success' => 'Data pasien berhasil dihapus']);
    }

    public function generatePDF(Request $request)
    {
        // print_r("<pre>");
        $get_pasien = Pasien::join("kelurahans", "pasiens.id_kelurahan", "=", "kelurahans.id")
                                ->where("pasiens.id_pasien", $request->id_pasien)
                                ->orderBy("pasiens.created_at", "ASC")
                                ->first();
        // print_r($get_pasien->toArray());
        // exit();
        $data = [
            'title' => 'Kartu Pasien',
            'id_pasien' => $get_pasien->id_pasien,
            'nama_pasien' => $get_pasien->nama_pasien,
            'tanggal_lahir' => $get_pasien->tanggal_lahir,
            'alamat' => $get_pasien->alamat_pasien,
            'jenis_kelamin' => $get_pasien->jenis_kelamin,
            'date' => date('m/d/Y')
        ];
        // return view('pasien.kartu_pasien', $data);
        $pdf = PDF::loadView('pasien.kartu_pasien', $data);
    
        return $pdf->download('kartu_pasien_'.$get_pasien->id_pasien.'.pdf');
    }
}
