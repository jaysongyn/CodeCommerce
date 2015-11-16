@extends('app')
@section('content')
	<div class="container">
		<h1>Editing Order Status: {{ $order->id }}</h1>
		
		@if ($errors->any())
			<ul class='alert'>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>	
		@endif
		
		{!! Form::open(['route'=>['orders.update', $order->id], 'method' =>'put']) !!}

		<div class="form-group">
			{!! Form::label('status', 'Status:') !!}
			{!! Form::select('status_id', $status, $order->status->id, ['class'=>'form-control']) !!}
		</div>	

		<div class='form-group'>
			{!! Form::submit('Save Order', ['Class'=>'btn btn-primary ']) !!}
		</div>	

		{!! Form::close()!!}
	</div>	
@endsection('content')