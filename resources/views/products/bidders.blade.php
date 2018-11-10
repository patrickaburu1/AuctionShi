@extends('nav.nav')

@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">

                    @include('partials.flash')
                    <div class="row" style="background-color: white">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35">Bidders of {{$product->name}}</h3>

                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-dark h4">Name</th>
                                        <th class="text-dark h4">Seller Price (KES)</th>
                                        <th class="text-dark h4">user</th>
                                        <th class="text-dark h4">Bidder Price (KES)</th>
                                        <th class="text-dark h4">Bidded on</th>
                                        <th class="text-dark h4">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bidders as $bidder)
                                        <tr class="tr">
                                         <td class="text-dark h5">{{$bidder->product_name}}</td>
                                         <td class="text-dark h5">
                                                <span class="status--denied">{{number_format($bidder->seller_price)}}</span>
                                            </td>
                                            <td class="text-info">{{$bidder->user_name}}</td>
                                         <td class="text-dark h5">
                                                <span class="status--process">{{number_format($bidder->amount)}}</span>
                                            </td>
                                            <td class="desc">{{$bidder->created_at}}</td>

                                         <td class="text-dark h5">
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