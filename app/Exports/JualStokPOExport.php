<?php

namespace App\Exports;

use App\Models\XJualInforHarga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class JualStokPOExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
 
    public function collection(){

       $jualstokpo = XJualInforHarga::orderBy('dtanggal', 'asc')->orderBy('cnoinv', 'asc')->get();
 

       return collect($jualstokpo);

    }
    public function view(): View
    {
        return view('kdu.export-jualstokpo', [
            'jualstokpo' => XJualInforHarga::orderBy('cnoinv', 'asc')->orderBy('dtanggal', 'asc')->get()
        ]);
    }
}
