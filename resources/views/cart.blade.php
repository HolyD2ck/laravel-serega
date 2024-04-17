@extends('layouts.app')
@vite('resources/sass/cart.scss')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Продукт</th>
                                <th scope="col">Цена</th>
                                <th scope="col">Количество</th>
                                <th scope="col">Удалить</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $details['photo'] }}" alt="{{ $details['name'] }}"
                                                    class="img-fluid">
                                                <h6 class="pl-3 mb-0 product-name">{{ $details['name'] }}</h6>
                                            </div>
                                        </td>
                                        <td>{{ $details['price'] }} ₽</td>
                                        <td>{{ $details['quantity'] }}</td>
                                        <td>
                                            <a href="{{ route('cart.remove', $id) }}"
                                                class="btn btn-danger btn-sm remove-from-cart">Удалить</a>

                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="cart-summary">
                    <h4>Общая стоимость:
                        @php
                            $total = 0;
                            if (session('cart')) {
                                foreach (session('cart') as $id => $details) {
                                    $total += $details['price'] * $details['quantity'];
                                }
                            }
                            echo $total;
                        @endphp
                        ₽</h4>
                </div>

                <button id="checkoutButton" class="btn btn-primary">Оформить заказ</button>
            </div>
        </div>
    </div>
    <div id="checkoutModal" class="modal">

        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Оформление заказа</h2>
            <form action="{{ route('checkout.submit') }}" method="post" class="form">
                @csrf
                <div class="form-group">
                    <label for="name">Имя:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="address">Адрес доставки:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="card_number">Номер банковской карты:</label>
                    <input type="text" id="card_number" name="card_number" required>
                </div>
                <div class="form-group">
                    <label for="csv">CSV код:</label>
                    <input type="text" id="csv" name="csv" required>
                </div>
                @if (Auth::guest())
                    <p>Пожалуйста, <a href="{{ route('login') }}">войдите в систему</a> или <a
                            href="{{ route('register') }}">зарегистрируйтесь</a>, чтобы сделать заказ.</p>
                @else
                    <button type="submit" class="btn btn-success">Подтвердить</button>
                @endif

            </form>
        </div>
        <style>
            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgb(0, 0, 0);
                background-color: rgba(0, 0, 0, 0.4);
            }

            .modal-content {
                background-color: #fefefe;
                margin: 15% auto;
                padding: 20px;
                border: 1px solid #888;
                width: 80%;
                text-align: center;
            }

            .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }

            .form {
                display: inline-block;
                text-align: left;
                width: 100%;
            }

            .form-group {
                margin-bottom: 10px;
            }

            .form-group label {
                display: block;
                margin-bottom: 5px;
            }

            .form-group input {
                width: 100%;
                padding: 5px;
                box-sizing: border-box;
                border: 1px solid #ddd;
                border-radius: 5px;
            }

            .btn {
                display: inline-block;
                padding: 10px 20px;
                margin-top: 10px;
                border: none;
                border-radius: 5px;
                background-color: #4CAF50;
                color: white;
                cursor: pointer;
            }

            .btn:hover {
                background-color: #45a049;
            }
        </style>
    </div>

@endsection
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var modal = document.getElementById("checkoutModal");
        var btn = document.getElementById("checkoutButton");

        btn.onclick = function() {
            modal.style.display = "block";
        }

        var span = document.getElementsByClassName("close")[0];

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });
</script>
