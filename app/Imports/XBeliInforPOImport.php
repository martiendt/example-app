<?php

namespace App\Imports;

use App\Models\XBeliInforPO;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use PhpOffice\PhpSpreadsheet\Shared\Date;

HeadingRowFormatter::default('none');
ini_set('max_execution_time',300);

class XBeliInforPOImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new XBeliInforPO([
		'dtanggal'	=> Date::excelToDateTimeObject(intval($row['Order Date']))->format('Y/m/d'),
		'ckodes'	=> $row['Vendor No'],
		'cnamas'	=> $row['Vendor Name'],
		'ckodeb'	=> $row['Item'],
		'cnamab'	=> $row['Item Description'],
		'nqorder'	=> $row['Qty Ordered Conv'],
		'csatorder'	=> $row['UM Conv'],
		'nqpcs'		=> $row['Qty Ordered'],
		'nhrgorder'	=> $row['Material Price Conv'],
		'cnopo'		=> $row['Po Num'],
		'ckdcab'	=> $row['Whse'],
        ]);
    }

    public function batchSize(): int
    {
        return 10;
    }
    
    public function chunkSize(): int
    {
        return 4000;
    }
}
