@extends('layouts.app')
@vite('resources/sass/shop.scss')
@section('content')
    <div class="container py-5">
        <div class="row">
            @if ($products->count())
                @foreach ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card product-card">
                            <img src="{{ $product->Фото }}" alt="{{ $product->Название }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->Название }}</h5>
                                <p class="card-text">
                                    <strong>Производитель:</strong> {{ $product->Производитель }}<br>
                                    <strong>Цена:</strong> {{ $product->Цена }} ₽<br>
                                    <strong>Материал:</strong> {{ $product->Материал }}<br>
                                    <strong>Цвет:</strong> {{ $product->Цвет }}<br>
                                    <strong>Гарантия:</strong>
                                    {{ $product->Гарантия ? 'Да' : 'Нет' }}
                                </p>
                                <a href="{{ route('cart.add', ['type' => 'accessory', 'id' => $product->id]) }}"
                                    class="btn btn-purple" style="color:white">Добавить в корзину</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Товары не найдены.</p>
            @endif
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection
