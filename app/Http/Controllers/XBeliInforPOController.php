<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\XBeliInforPOImport;
use App\Exports\XBeliInforPOExport;
use App\Models\XBeliInforPO;
use Redirect;
use Session;
use DB;

class XBeliInforPOController extends Controller
{   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
	$this->validate($request, ['file' => 'required|mimes:csv,xls,xlsx']);
	XBeliInforPO::query()->delete();
        Excel::import(new XBeliInforPOImport, $request->file('file')->store('temp'));
	DB::update('update xbeliinforpo set nhrgpcs = (nqorder * nhrgorder) / nqpcs where nqpcs <> 0');
	Session::flash('posuccess','Import PO Infor berhasil');
        return back();
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new XBeliInforPOExport, 'XBeliInforPOcollection.xlsx');
    }        
}
