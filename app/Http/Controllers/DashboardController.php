<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Barang;


class DashboardController extends Controller
{
    public function index()
    {
        $data_barang = new Barang;
        
        $list_barang = $data_barang->all();

        return view('dashboard.index', compact('list_barang'));
    }

    public function save_data(Request $requests)
    {
        $data_barang = new Barang;

        $data_barang->barang_name = $requests->namabarang;
        $data_barang->kecamatan_name = $requests->namakecamatan;
        $data_barang->kota_name      = $requests->namakota;
        $data_barang->created_by     = Auth::id();

        $data_barang->save();

        return redirect('/dashboard')->with(['success' => 'Data barang berhasil disimpan']);
    }

    public function update_data(Request $requests)
    {
        $barang = barang::find($requests->idbarang);

        $barang->barang_name = $requests->namabarang;
        $barang->kecamatan_name = $requests->namakecamatan;
        $barang->kota_name      = $requests->namakota;
        
        $barang->save();

        return redirect('/dashboard')->with(['success' => 'Data barang berhasil diupdate']);
    }

    public function delete_data(Request $requests)
    {
        $barang = barang::find($requests->del_idbarang);
 
        $barang->delete();

        return redirect('/dashboard')->with(['success' => 'Data barang berhasil dihapus']);
    }
}
