@extends('layouts.app')

@section('content')
    <h1>Orders</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Total Price</th>
                <th>Orderables</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>
                        @foreach ($order->cameras as $camera)
                            <p>Camera: {{ $camera->name }} - Quantity: {{ $camera->pivot->quantity }}</p>
                        @endforeach

                        @foreach ($order->videocameras as $videocamera)
                            <p>Video Camera: {{ $videocamera->name }} - Quantity: {{ $videocamera->pivot->quantity }}</p>
                        @endforeach

                        @foreach ($order->accessories as $accessory)
                            <p>Accessory: {{ $accessory->name }} - Quantity: {{ $accessory->pivot->quantity }}</p>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
<style>
    body {
        font-family: "Roboto", sans-serif;
        background-color: #f2f2f2;
    }

    .t {
        text-align: center;
        color: #4a148c;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 30px;
    }

    img {
        position: flex;
        max-width: 100px;
        max-height: 100px;
        border-radius: 25%;
    }

    table {
        width: 100%;
        background-color: #fff;
        border-collapse: collapse;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    th {
        background-color: #673ab7;
        color: #fff;
        text-align: center;
    }

    td {
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .btn {
        min-width: 150px;
    }

    .btn-secondary {
        color: #fff;
        background-color: #673ab7;
        border-color: #673ab7;
    }

    .btn-secondary:hover {
        color: #fff;
        background-color: #512da8;
        border-color: #512da8;
    }

    .btn-danger {
        color: #fff;
        background-color: #d32f2f;
        border-color: #d32f2f;
    }

    .btn-danger:hover {
        color: #fff;
        background-color: #c62828;
        border-color: #c62828;
    }

    .db {
        display: block;
    }

    .l {
        float: left;
        margin-right: 10px;
    }

    @media (max-width: 768px) {

        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;
        }

        th,
        td {
            border: none;
            text-align: left;
            padding: 10px;
        }

        th {
            background-color: transparent;
            color: #333;
        }

        td:before {
            content: attr(data-label);
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .btn {
            display: block;
            margin-bottom: 10px;
        }

        .btn-secondary:hover {
            color: #fff;
            background-color: #512da8;
            border-color: #512da8;
        }
    }
</style>
