<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\XHargaInforImport;
use App\Models\XHargaInfor;
use Redirect;
use Session;
use DB;

class XHargaInforController extends Controller
{
    public function fileImport(Request $request) 
    {
	$this->validate($request, ['file' => 'required|mimes:csv,txt']);
	XHargaInfor::query()->delete();
        Excel::import(new XHargaInforImport, $request->file('file')->store('temp'));
	DB::statement('create or replace view vhrgakhir as select ckodeb,max(dtanggal) as tgl from xhargainfor group by ckodeb');
	DB::statement('delete xhargainfor from xhargainfor, vhrgakhir where vhrgakhir.ckodeb = xhargainfor.ckodeb and dtanggal <> tgl');
	DB::statement('drop view vhrgakhir');
	Session::flash('hargasuccess','Import Harga Barang berhasil');
        return back();
    }
}
