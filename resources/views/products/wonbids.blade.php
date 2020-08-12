@extends('nav.nav')

@section('content')
    <div class="page-container" >
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid" >

                    @include('partials.flash')
                    <div class="row"  style="background-color: white">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35">Won Products/Bids</h3>

                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                       <th class="text-dark h4">Name</th>
                                       <th class="text-dark h4">Seller Price (KES)</th>
                                       <th class="text-dark h4">Bidder Price (KES)</th>
                                       <th class="text-dark h4">Bidded on</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($wonbids as $won)
                                        <tr class="tr">
                                          <td class="text-dark h5">{{$won->product_name}}</td>
                                          <td class="text-dark h5">
                                                <span class="status--denied">{{number_format($won->seller_price)}}</span>
                                            </td>
                                          <td class="text-dark h5">
                                                <span class="status--process">{{number_format($won->amount)}}</span>
                                            </td>
                                            <td class="text-dark h5 desc">{{$won->created_at}}</td>

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