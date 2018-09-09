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
                            <h3 class="title-5 m-b-35">Won Products/Bids</h3>

                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Seller Price (KES)</th>
                                        <th>Bidder Price (KES)</th>
                                        <th>Bidded on</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($wonbids as $won)
                                        <tr class="tr">
                                            <td>{{$won->product_name}}</td>
                                            <td>
                                                <span class="status--denied">{{number_format($won->seller_price)}}</span>
                                            </td>
                                            <td>
                                                <span class="status--process">{{number_format($won->amount)}}</span>
                                            </td>
                                            <td class="desc">{{$won->created_at}}</td>

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