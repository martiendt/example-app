<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\View;
use App\Models\XJualInforHarga;
use App\Exports\JualStokPOExport;
use Request;
use Redirect;
use DB;

ini_set('max_execution_time',300);

class JualStokPOController extends Controller
{
	public function showJualStokPO()
	{
		DB::statement('update xhargainfor set finfor=0, cidinfor=null');
		DB::statement('update xbeliinforpo set fharga=0, cidharga=null');
		DB::statement('update xjualinforharga set forder=0, cidorder=null');
		DB::statement('update xbeliinforpo, xhargainfor set xbeliinforpo.npricelist = nharga, xbeliinforpo.ncogs = xhargainfor.ncogs, fharga = 1, cidharga = xhargainfor.cuid where xbeliinforpo.ckodeb=xhargainfor.ckodeb');
		DB::statement('update xjualinforharga, xhargainfor set npricelist = nharga, xjualinforharga.ncogs = xhargainfor.ncogs, forder = 1, cidorder = xhargainfor.cuid where xjualinforharga.ckodeb=xhargainfor.ckodeb');
		DB::statement('create or replace view vhrgbeliakhir as select ckodeb,max(nhrgpcs) as hrg from xbeliinforpo group by ckodeb');
		DB::statement('update xjualinforharga, vhrgbeliakhir set nhrgpo = hrg where vhrgbeliakhir.ckodeb = xjualinforharga.ckodeb');
		DB::statement('drop view vhrgbeliakhir');
		
		DB::statement('update xjualinforharga set dppmodal = jualmodal where nnominal > 0');
		DB::statement('update xjualinforharga set dpppo = jualpo where nnominal > 0');

		DB::statement('update xjualinforharga set permodal = ((nnominal-jualnetmodal)/jualnetmodal) * 100 where jualnetmodal <> 0');
		DB::statement('update xjualinforharga set permodal = 100 where jualnetmodal = 0 and selmodal <> 0');

		DB::statement('update xjualinforharga set perpo = ((nnominal-jualnetpo)/jualnetpo) * 100 where jualnetpo <> 0');
		DB::statement('update xjualinforharga set perpo = 100 where jualnetpo = 0 and selpo <> 0');

		$dataJualStokPO = XJualInforHarga::orderBy('cnoinv', 'asc')->orderBy('dtanggal', 'asc')->get();
		return view('kdu/display-jualstokpo', ["jualstokpo" => $dataJualStokPO]);
	}

	public function export() 
	{
    		return Excel::download(new JualStokPOExport, 'jualstokpo.xlsx');
	}

}
