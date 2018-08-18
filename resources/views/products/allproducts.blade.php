@extends('nav.nav')

@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">

                    @include('partials.flash')

                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-bottom" src="{{$product->product_image}}"
                                         style="height: 240px; width: 560px; " alt="Card image cap">
                                    <div class="card-img-overlay ">
                                        <div class="text-dark">{{$product->name}}</div>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title mb-3 col-md-12">{{$product->name}}</h4>
                                        <div class="card-title mb-3 "><span class="col-md-6 text-dark">Price::
                                                KES <i class="text-primary">{{number_format($product->amount)}}</i></span><span
                                                    class="col-md-6 ">  {{number_format($product->bidders)}} <i class="text-primary"> Bidders</i></span> </div>
                                        <div class="card-title"><span class="card-text col-md-6">Bid closes on::  </span> <i class="text-primary col-md-6">{{$product->sell_by_date}}</i></div>
                                        <div class="card-title"><p class="card-text">{{$product->description}}</p></div>
                                       <div > <a  href="{{url('place-bid/'.'1'.'/'.$product->id)}}"
                                                class="col-md-6 btn-primary">Place Bid </a> <button class="col-md-4 btn-primary"> more info</button></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection