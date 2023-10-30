@if(Session::has('message'))
	<span class="notif">{{Session::get('message')}}</span>
@endif

<div class="panel panel-default">
	<div class="panel-heading">EDIT DATA</div>
		<div class="panel-body">
			{{ html()->form('PUT', '/edit')->open() }}
		        {{ html()->text('id', $cust->id, ['class' => 'form-control']) }}
			{{ html()->text('name', $cust->name, ['class' => 'form-control']) }}
			{{ html()->submit('Submit', ['class' => 'btn btn-primary']) }}
			{{ html()->form()->close() }}
		</div>
	</table>
</div>