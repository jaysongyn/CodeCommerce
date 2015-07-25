@extends('store.store')

@section('content')
<div class="container">
		<h1>Meus Pedidos</h1>
		<br>
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Items</th>
				<th>Valor</th>
				<th>Status</th>
			</tr>	
			
			@foreach($orders as $order)
			<tr>	
				<td>
					{{ $order->id }}
				</td>
				<td>
					<ul>
					@foreach($order->items as $item)
						<li>{{ $item->product->name }}</li>
					@endforeach
					</ul>
				</td>	
				<td>
					{{ $order->total }}
				</td>
				<td>
					{{ $order->status }}
				</td>			
				
			</tr>	
			@endforeach			
		</table>		
		{!! $orders->render() !!} 	
	</div>			
@stop