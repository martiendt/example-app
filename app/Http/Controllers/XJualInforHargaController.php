<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\XJualInforHargaImport;
use App\Exports\XJualInforHargaExport;
use App\Models\XJualInforHarga;
use Redirect;
use Session;

class XJualInforHargaController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
	$this->validate($request, ['file' => 'required|mimes:csv,xls,xlsx']);
	XJualInforHarga::query()->delete();
        Excel::import(new XJualInforHargaImport, $request->file('file')->store('temp'));
	Session::flash('jualsuccess','Import Invoice Infor berhasil');
        return back();
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new XJualInforHargaExport, 'XJualInforHargacollection.xlsx');
    }        
}
