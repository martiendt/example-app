<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Export Excel & CSV to Database in Laravel </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <style>
      body {
        font-family: 'Roboto', sans-serif;
      }
      .table-responsive {
        font-size:14px !important;
      }
    br {
        line-height: 5px;
    }
 </style>
</head>

<body>
<div class="container-fluid">
	<h3>Laporan Penjualan - Stok - PO</h3>
	<div class="table-responsive">
	<div class="row-ml-5" style="height:80vh">
	<table class="table table-bordered table-sm w-auto small">
		<thead>
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Depo</th>
			<th class="text-center">Tanggal</th>
			<th class="text-center">Customer</th>
			<th class="text-center">Invoice</th>
			<th class="text-center">Principle</th>
			<th class="text-center text-nowrap">Kode Barang</th>
			<th class="text-center text-nowrap">Nama Barang</th>
			<th class="text-center">Qty</th>
			<th class="text-center">Disc</th>
			<th class="text-center text-nowrap">Harga Jual</th>
			<th class="text-center text-nowrap">DPP Jual</th>
			<th class="text-center text-nowrap">PPN Jual</th>
			<th class="text-center text-nowrap">Nominal Jual</th>
			<th class="text-center text-nowrap">Harga Stok</th>
			<th class="text-center text-nowrap">DPP Stok</th>
			<th class="text-center text-nowrap">PPN Stok</th>
			<th class="text-center text-nowrap">Nominal Stok</th>
			<th class="text-center text-nowrap">Selisih (DPP)</th>
			<th class="text-center text-nowrap">Selisih (+PPN)</th>
			<th class="text-center">%</th>
			<th class="text-center text-nowrap">Harga PO</th>
			<th class="text-center text-nowrap">DPP PO</th>
			<th class="text-center text-nowrap">PPN PO</th>
			<th class="text-center text-nowrap">Nominal PO</th>
			<th class="text-center text-nowrap">Selisih (DPP)</th>
			<th class="text-center text-nowrap">Selisih (+PPN)</th>
			<th class="text-center">%</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($jualstokpo as $item => $jualstokpo)
		<tr>
			<td class="text-center">{{ ++$item }}</td>
			<td>{{$jualstokpo->ckdcab}}</td>
			<td class="text-nowrap">{{date('d-m-Y', strtotime($jualstokpo->dtanggal))}}</td>
			<td class="text-nowrap">{{$jualstokpo->cnamac}}</td>
			<td>{{$jualstokpo->cnoinv}}</td>
			<td class="text-nowrap">{{$jualstokpo->cnamap}}</td>
			<td>{{$jualstokpo->ckodeb}}</td>
			<td class="text-nowrap">{{$jualstokpo->cnamab}}</td>
			<td class="text-right">{{$jualstokpo->nqty}}</td>
			<td class="text-right">{{number_format($jualstokpo->ndis1,2)}}%</td>
			<td class="text-right">{{number_format($jualstokpo->nhrgjual,2)}}</td>
			<td class="text-right">{{number_format($jualstokpo->dpp,2)}}</td>
			<td class="text-right">{{number_format($jualstokpo->ppn,2)}}</td>
			<td class="text-right">{{number_format($jualstokpo->nnominal,2)}}</td>
			<td class="text-right">{{number_format($jualstokpo->ncogs,2)}}</td>
			<td class="text-right">{{number_format($jualstokpo->dppmodal,2)}}</td>
			<td class="text-right">{{number_format($jualstokpo->ppnmodal,2)}}</td>
			<td class="text-right">{{number_format($jualstokpo->jualnetmodal,2)}}</td>
			<td class="text-right">{{number_format($jualstokpo->selmodaldpp,2)}}</td>
			<td class="text-right">{{number_format($jualstokpo->selmodal,2)}}</td>
			<td class="text-right">{{number_format($jualstokpo->permodal,2)}}%</td>
			<td class="text-right">{{number_format($jualstokpo->nhrgpo,2)}}</td>
			<td class="text-right">{{number_format($jualstokpo->dpppo,2)}}</td>
			<td class="text-right">{{number_format($jualstokpo->ppnpo,2)}}</td>
			<td class="text-right">{{number_format($jualstokpo->jualnetpo,2)}}</td>
			<td class="text-right">{{number_format($jualstokpo->selpodpp,2)}}</td>
			<td class="text-right">{{number_format($jualstokpo->selpo,2)}}</td>
			<td class="text-right">{{number_format($jualstokpo->perpo,2)}}%</td>
		</tr>
		@endforeach
	</tbody>
	</table>
	</div>
</div>
  <div class="mx-auto text-center">
	<a href="{{ route('export') }}" class="btn btn-info mt-2" role="button">Export Excel</a>
  </div>
</div>
</body>
</html>