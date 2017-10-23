@extends('store.template')

@section('content')

<div class="container text-center">
	<div id="products">
		@foreach($products as $product)
			<div class="product white-panel">
				<h3>{{ $product->name }}</h3><hr>
				<img src="{{ $product->image }}" width="200">
				<div class="product-info panel">
					<p>{{ $product->extract }}</p>
					<h4>Precio: ${{ number_format($product->price,2) }}</span></h4>
					<p>
						<a class="btn btn-success" href="{{ route('cart-add', $product->id) }}">
							<i class="fa fa-cart-plus"></i> Agregar
						</a>
						<a class="btn btn-primary" href="{{ route('product-detail', $product->id) }}"><i class="fa fa-chevron-circle-right"></i> Detalles</a>
					</p>
				</div>
			</div>
		@endforeach
	</div>
</div>
@stop