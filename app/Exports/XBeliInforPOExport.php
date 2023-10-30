<?php

namespace App\Exports;

use App\Models\XBeliInforPO;
use Maatwebsite\Excel\Concerns\FromCollection;

class XBeliInforPOExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return XBeliInforPO::all();
    }
}
