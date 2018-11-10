@extends('nav.nav')

@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">

                    @include('partials.flash')
                    <div class="row" style="background-color: white">
                        <div class="col-md-12 ">
                            <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35">Placed Bids On Product</h3>

                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-bordered" >
                                    <thead>
                                    <tr>
                                        <th class="text-dark h4">Name</th>
                                        <th class="text-dark h4">Seller Price (KES)</th>
                                        <th class="text-dark h4">Bidder Price (KES)</th>
                                        <th class="text-dark h4">Product Status</th>
                                        <th class="text-dark h4">Bidded on</th>
                                        <th class="text-dark h4">ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($placedbids as $placedbid)
                                        <tr class="tr">
                                          <td class="text-dark h5">{{$placedbid->product_name}}</td>
                                          <td class="text-dark h5">
                                                <span class="status--denied">{{number_format($placedbid->seller_price)}}</span>
                                            </td>

                                          <td class="text-dark h5">
                                                <span class="status--process">{{number_format($placedbid->amount)}}</span>
                                            </td>
                                          <td class="text-dark h5">
                                                @if($placedbid->product_status==0)
                                                <span class="status--process">Running</span>
                                                    @else
                                                    <span class="status--denied">Bid Closed</span>
                                                    @endif
                                            </td>
                                            <td class="text-dark h5 desc">{{$placedbid->created_at}}</td>

                                          <td class="text-dark h5">
                                                @if($placedbid->product_status==0)
                                                    <a href="{{url('withdraw-bid/'.$placedbid->id)}}"> <button class="btn btn-danger">Withdraw Bid</button></a>
                                                @else
                                                    <a  href="#"> <button disabled class="btn btn-danger">Withdraw Bid</button></a>
                                                @endif
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