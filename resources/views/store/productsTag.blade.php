@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@stop

@section('content')
<div class="col-sm-9 padding-right">
    <div class="features_items"><!--products_items-->
        <h2 class="title text-center">Tag - {{$productsTag->name}}</h2>
        @include('store.partial.products',['products' => $productsTag->products ])
    </div><!--products_items-->    
</div>
@stop