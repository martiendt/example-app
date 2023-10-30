<?php

namespace App\Imports;

use App\Models\XHargaInfor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

HeadingRowFormatter::default('none');

class XHargaInforImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts, ShouldQueue, WithCustomCsvSettings
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new XHargaInfor([
		'dtanggal'	=> Carbon::createFromFormat('m/d/Y', $row['Effective Date'])->format('Y/m/d'),
		'ckodeb'	=> $row['Item'],
		'cnamab'	=> $row['Item Description'],
		'nharga'	=> str_replace(',','',$row['Unit Price 1']),
		'ncogs'		=> str_replace(',','',$row['Unit Cost']),
        ]);
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter'		=> "\t"
        ];
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
