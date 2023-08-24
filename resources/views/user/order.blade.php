@extends('layouts.app')
@section('style')
    <style>
        .ftco-cart button i {
            color: #c49b63;
        }

        .ftco-cart .quantity-left-minus {
            background: transparent;
            padding: 16px 20px;
        }

        .ftco-cart .quantity-right-plus {
            background: transparent;
            padding: 16px 20px;
        }

        .ftco-cart button,
        .ftco-cart .form-control {
            height: 54px !important;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: #c49b63 !important;
            padding: 0;
        }

        .ftco-cart .form-group {
            position: relative;
        }

        .ftco-cart .form-group .form-control {
            padding-right: 40px;
        }

        .ftco-cart .form-group .icon {
            position: absolute;
            top: 50%;
            right: 20px;
            font-size: 14px;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            color: #c49b63;
        }

        .ftco-cart .form-group .icon span {
            color: #c49b63;
        }

        @media (max-width: 767.98px) {
            .ftco-cart .form-group .icon {
                right: 10px;
            }
        }

        .ftco-cart .form-group .select-wrap {
            position: relative;
        }

        .ftco-cart .form-group .select-wrap select {
            font-size: 14px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .cart-list {
            overflow-x: hidden;
        }

        .table-cart {
            min-width: 1000px !important;
            width: 100%;
            text-align: center;
        }

        .table-cart th {
            font-weight: 500;
        }

        .table-cart .thead-primary {
            background: #c49b63;
        }

        .table-cart .thead-primary tr th {
            padding: 20px 10px;
            color: #fff !important;
            border: 1px solid transparent !important;
        }

        .table-cart tbody tr td {
            text-align: center !important;
            vertical-align: middle;
            padding: 40px 10px;
            border: 1px solid transparent !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
        }

        .table-cart tbody tr td.product-remove a {
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 5px 10px;

        }

        .table-cart tbody tr td.product-remove a:hover {
            background: #c49b63;
        }

        .table-cart tbody tr td.product-remove a:hover span {
            color: #000;
        }

        .table-cart tbody tr td.product-remove button {
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 5px 10px;
            background-color: transparent;
        }

        .table-cart tbody tr td.product-remove button:hover {
            background: #c49b63;
        }

        .table-cart tbody tr td.product-remove button:hover span {
            color: #000000;
        }

        .table-cart tbody tr td.quantity {
            width: 20%;
        }

        .table-cart tbody tr td.image-prod .img {
            display: block;
            width: 100px;
            height: 100px;
            margin: 0 auto;
        }

        .table-cart tbody tr td.product-name {
            width: 30%;

        }

        .table-cart tbody tr td.product-name h3 {
            font-size: 16px;
            text-transform: uppercase;
            color: white;
        }

        .table-cart tbody tr td.product-name p {
            color: rgba(255, 255, 255, 0.258);
        }

        .table-cart tbody tr td.total,
        .table-cart tbody tr td.price {
            color: #fff;
        }

        .cart-wrap .btn-primary {
            display: block;
            width: 100%;
        }

        .cart-total {
            width: 100%;
            display: block;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 20px;
        }

        .cart-total h3 {
            font-size: 20px;
            text-transform: uppercase;
        }

        .cart-total p {
            width: 100%;
            display: block;
        }

        .cart-total p span {
            display: block;
            width: 50%;
        }

        .cart-total p.total-price span {
            text-transform: uppercase;
        }

        .cart-total p.total-price span:last-child {
            color: #c49b63;
        }

        .cart-total hr {
            background: rgba(255, 255, 255, 0.1);
        }
        .page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #c49b63 !important;
    border-color: #c49b63 !important;
}
    </style>
@endsection
@section('content')

    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg)') }};"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Orders</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Orders</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="cart">

        <section class="ftco-section ftco-cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list">
                            <table class=" table-cart">
                                <thead class="thead-primary">
                                    <tr class="text-center">

                                        <th>&nbsp;</th>
                                        <th>ref</th>
                                        <th>location</th>
                                        <th>total</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($orders->count() > 0)
                                        @foreach ($orders as $order)
                                        <tr class="text-center">
                                                <td class=" px-4 text-center align-center m-auto"><h1><i class="fas fa-store text-white " aria-hidden="true"></i></h1></td>



                                                <td class="product-name">
                                                    <h3>{{ $order->id }} </h3>
                                                </td>
                                                <td class="product-name">
                                                    <h3>{{ $order->city }} </h3>
                                                    <p> {{ $order->address }} </p>
                                                </td>




                                                <td class="total align-center">$ {{ $order->total }} </td>
                                                <td class="text-center ">

                                                        @if ($order->status === 'processing')
                                                            <span class="badge badge-pill badge-warning px-4 py-2"><h4>processing</h4></span>
                                                        @elseif ($order->status === 'in delivering')
                                                            <span class="badge badge-pill badge-info"><h4>in delivering</h4></span>
                                                        @elseif ($order->status === 'delivered')
                                                            <span class="badge badge-pill badge-success"><h4>delivered</h4></span>
                                                        @else
                                                            <span class="badge badge-pill badge-danger"><h4>faild</h4></span>
                                                        @endif

                                                </td>
                                            </tr><!-- END TR-->
                                        @endforeach
                                    @else
                                        <tr class="text-center ">
                                            <td colspan="6">
                                                <h3 class="text-white">you haven't orders </h3>

                                            </td>
                                        </tr>
                                    @endif



                                </tbody>
                            </table>
                    </div>
                    <div class="col-md-12 ftco-animate d-flex mt-4 justify-content-center">
                    {{ $orders->links() }}
                    </div>
                </div>

            </div>
        </section>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Discover</span>
                    <h2 class="mb-4">Related products</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="menu-entry">
                        <a href="#" class="img" style="background-image: url(images/menu-1.jpg);"></a>
                        <div class="text text-center pt-4">
                            <h3><a href="#">Coffee Capuccino</a></h3>
                            <p>A small river named Duden flows by their place and supplies</p>
                            <p class="price"><span>$5.90</span></p>
                            <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="menu-entry">
                        <a href="#" class="img" style="background-image: url(images/menu-2.jpg);"></a>
                        <div class="text text-center pt-4">
                            <h3><a href="#">Coffee Capuccino</a></h3>
                            <p>A small river named Duden flows by their place and supplies</p>
                            <p class="price"><span>$5.90</span></p>
                            <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="menu-entry">
                        <a href="#" class="img" style="background-image: url(images/menu-3.jpg);"></a>
                        <div class="text text-center pt-4">
                            <h3><a href="#">Coffee Capuccino</a></h3>
                            <p>A small river named Duden flows by their place and supplies</p>
                            <p class="price"><span>$5.90</span></p>
                            <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="menu-entry">
                        <a href="#" class="img" style="background-image: url(images/menu-4.jpg);"></a>
                        <div class="text text-center pt-4">
                            <h3><a href="#">Coffee Capuccino</a></h3>
                            <p>A small river named Duden flows by their place and supplies</p>
                            <p class="price"><span>$5.90</span></p>
                            <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
