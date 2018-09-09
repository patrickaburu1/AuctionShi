@extends('nav.nav')

@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">

                    @include('partials.flash')
                    <div class="row">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35">Bidders of {{$product->name}}</h3>

                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Seller Price (KES)</th>
                                        <th>user</th>
                                        <th>Bidder Price (KES)</th>
                                        <th>Bidded on</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bidders as $bidder)
                                        <tr class="tr">
                                            <td>{{$bidder->product_name}}</td>
                                            <td>
                                                <span class="status--denied">{{number_format($bidder->seller_price)}}</span>
                                            </td>
                                            <td class="text-info">{{$bidder->user_name}}</td>
                                            <td>
                                                <span class="status--process">{{number_format($bidder->amount)}}</span>
                                            </td>
                                            <td class="desc">{{$bidder->created_at}}</td>

                                            <td>
                                                <a href="{{url('close-bid/'.$bidder->product_id.'/'.$bidder->id)}}" class="text-info" data-placement="top">Give Bid</a>

                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATA TABLE -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection