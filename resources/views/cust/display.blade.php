@if(Session::has('message'))
	<span class="notif">{{Session::get('message')}}</span>
@endif

<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Created</th>
		</tr>
		@foreach ($cust as $cust)
		<tr>
			<td>{{$cust->id}}</td>
			<td>{{$cust->name}}</td>
			<td>{{$cust->created_at}}</td>
			<td><a href="hapus/{{$cust->id}}">HAPUS</a> ||| <a href="edit/{{$cust->id}}">EDIT</a>
			</td>
		</tr>
		@endforeach
	</table>
</div>