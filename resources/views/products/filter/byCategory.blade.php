@extends('nav.nav')

@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">

                    @include('partials.flash')


                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-4 ">
                                <div class="card ">
                                    <img class="card-img-bottom" src="{{$product->product_image}}"
                                         style="height: 240px; width: 560px; " >
                                    <div class="card-img-overlay ">
                                        <div class="text-dark">{{$product->name}}  <?php
                                            $now=date("Y/m/d");
                                            $date2=date_create($product->sell_by_date);
                                            $date1=date_create($now);
                                            $diff=date_diff($date1,$date2);
                                            echo $diff->format("%a days");
                                            ?></div>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title mb-3 col-md-12">{{$product->name}}</h4>
                                        <div class="card-title"><span
                                                    class="text-dark h5 col-md-6">Price  ::          </span> <i
                                                    class="text-dark h5 col-md-6">{{number_format($product->amount)}}</i></div>
                                        <div class="card-title"><span
                                                    class="text-dark h5 col-md-6">No. of Bidder  ::  </span> <i
                                                    class="text-dark h5 col-md-6">{{number_format($product->bidders)}}</i></div>
                                        <div class="card-title"><span
                                                    class="text-dark h5 col-md-6">Bid closes on::  </span> <i
                                                    class="text-dark h5 col-md-6">{{$product->sell_by_date}}</i></div>
                                        <div class="card-title"><span
                                                    class="text-dark h5 col-md-6">Bid ends in::  </span> <i
                                                    class="text-dark h5 col-md-6"> <?php
                                                $now=date("Y/m/d");
                                                $date2=date_create($product->sell_by_date);
                                                $date1=date_create($now);
                                                $diff=date_diff($date1,$date2);
                                                echo $diff->format("%a days");
                                                ?></i></div>
                                        <div class="card-title"><span
                                                    class="text-dark h5 col-md-6">Description :: </span> <i
                                                    class="text-dark h5 col-md-6">{{$product->description}}</i></div>

                                        <div>
                                            <button class="col-md-6 btn-primary" type="button" data-toggle="modal"
                                                    data-target="#{{$product->id}}">
                                                Place Bid
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- href="{{url('place-bid/'.'1'.'/'.$product->id)}}"--}}
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

    @foreach($products as $product)
        <div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Place Bid for {{$product->name}} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form class="dl-horizontal" method="POST" action="{{url('place-bid/'.$product->id)}}">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="card">
                                    <img class="card-img-bottom" src="{{$product->product_image}}"
                                         style="height: 240px; width: 560px; " alt="Card image cap">
                                    <div class="card-img-overlay ">
                                        <div class="text-dark h5">{{$product->name}}</div>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title mb-6 col-md-12">{{$product->name}}</h4>
                                        <div class="card-title mb-6 "><span class="col-md-3 text-dark">Price::KES </span><i
                                                    class="col-md-3 text-primary">{{number_format($product->amount)}}</i><span
                                                    class="col-md-3">  {{number_format($product->bidders)}}</span> <i
                                                    class=" col-md-3text-primary"> Bidders</i></div>
                                        <div class="card-title"><span class="card-text col-md-6">Bid closes on::  </span> <i
                                                    class="text-primary col-md-6">{{$product->sell_by_date}}</i></div>
                                        <div class="card-title"><span class="card-text col-md-6">Description::  </span> <i
                                                    class="text-primary col-md-6">{{$product->description}}</i></div>
                                        <div class="card-title row"><label class="col-md-4">Amount in KES:: </label><input name="amount"
                                                                                                                           class="col-md-4 form-control" type="text" placeholder="e.g 5000" required></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" >Place Bid</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

@endsection