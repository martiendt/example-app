<table>
	<thead>
		<tr>
			<th>No</th>
			<th>Depo</th>
			<th>Tanggal</th>
			<th>Customer</th>
			<th>Invoice</th>
			<th>Principle</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Qty</th>
			<th>Disc</th>
			<th>Harga Jual</th>
			<th>DPP Jual</th>
			<th>PPN Jual</th>
			<th>Nominal Jual</th>
			<th>Harga Stok</th>
			<th>DPP Stok</th>
			<th>PPN Stok</th>
			<th>Nominal Stok</th>
			<th>Selisih (DPP)</th>
			<th>Selisih (+PPN)</th>
			<th>%</th>
			<th>Harga PO</th>
			<th>DPP PO</th>
			<th>PPN PO</th>
			<th>Nominal PO</th>
			<th>Selisih (DPP)</th>
			<th>Selisih (+PPN)</th>
			<th>%</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($jualstokpo as $item => $jualstokpo)
		<tr>
			<td>{{ ++$item }}</td>
			<td>{{$jualstokpo->ckdcab}}</td>
			<td>{{date('d-m-Y', strtotime($jualstokpo->dtanggal))}}</td>
			<td>{{$jualstokpo->cnamac}}</td>
			<td>{{$jualstokpo->cnoinv}}</td>
			<td>{{$jualstokpo->cnamap}}</td>
			<td>{{$jualstokpo->ckodeb}}</td>
			<td>{{$jualstokpo->cnamab}}</td>
			<td>{{$jualstokpo->nqty}}</td>
			<td>{{round($jualstokpo->ndis1,2)}}</td>
			<td>{{round($jualstokpo->nhrgjual,2)}}</td>
			<td>{{round($jualstokpo->dpp,2)}}</td>
			<td>{{round($jualstokpo->ppn,2)}}</td>
			<td>{{round($jualstokpo->nnominal,2)}}</td>
			<td>{{round($jualstokpo->ncogs,2)}}</td>
			<td>{{round($jualstokpo->dppmodal,2)}}</td>
			<td>{{round($jualstokpo->ppnmodal,2)}}</td>
			<td>{{round($jualstokpo->jualnetmodal,2)}}</td>
			<td>{{round($jualstokpo->selmodaldpp,2)}}</td>
			<td>{{round($jualstokpo->selmodal,2)}}</td>
			<td>{{round($jualstokpo->permodal,2)}}</td>
			<td>{{round($jualstokpo->nhrgpo,2)}}</td>
			<td>{{round($jualstokpo->dpppo,2)}}</td>
			<td>{{round($jualstokpo->ppnpo,2)}}</td>
			<td>{{round($jualstokpo->jualnetpo,2)}}</td>
			<td>{{round($jualstokpo->selpodpp,2)}}</td>
			<td>{{round($jualstokpo->selpo,2)}}</td>
			<td>{{round($jualstokpo->perpo,2)}}</td>
		</tr>
		@endforeach
	</tbody>
</table>