@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@stop

@section('content')
	<div class="container">
	   @if($cart == 'empty')
	   		<h3>Carrinho de compra vazio! </h3>

	   @else
		   <h3>Pedido Realizado com sucesso! </h3>

		   <p>O pedido #{{ $order->id }}, foi realizado com sucesso.</p>
		@endif   

	</div>
@stop