<?php

namespace App\Imports;

use App\Models\XJualInforHarga;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Str;

HeadingRowFormatter::default('none');
ini_set('max_execution_time',900);

class XJualInforHargaImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new XJualInforHarga([
		'dtanggal'	=> Date::excelToDateTimeObject(intval($row['Tgl Invoice']))->format('Y/m/d'),
		'csales'	=> $row['Salesman'],
		'ckodec'	=> $row['Sold To'],
		'cnamac'	=> $row['Sold To Name'],
		'ckodep'	=> $row['Product Code'],
		'cnamap'	=> $row['Principle'],
		'ckodeb'	=> $row['Item'],
		'cnamab'	=> $row['Item Description'],
		'nqty'		=> $row['Qty Invoiced'],
		'nhrgjual'	=> $row['Selling Price'],
		'ndis1'		=> $row['Discount (%)'],
		'nppn'		=> intval($row['Tax Code']),
		'nnominal'	=> $row['Amount Aft Tax'],
		'cnoinv'	=> $row['Invoice'],
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