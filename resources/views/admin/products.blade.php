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
                            <h3 class="title-5 m-b-35">Running Products</h3>

                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Desription</th>
                                        <th>Price (KES)</th>
                                        <th>Bidders</th>
                                        <th>Added on</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr class="tr">
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->description}}</td>
                                            <td>
                                                <span class="status--denied">{{number_format($product->amount)}}</span>
                                            </td>
                                            <td class="text-info">{{number_format($product->bidders)}}</td>
                                            <td class="desc">{{$product->created_at}}</td>

                                            <td>
                                                {{--  <a href="{{url('close-bid/'.$product->id)}}" class="text-info btn" data-placement="top"> Close Bid</a>--}}
                                                <a href="{{url('suspend-product/'.$product->id)}}" class="text-info btn" data-placement="top"> Suspend Product</a>
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