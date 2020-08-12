@extends('nav.nav')

@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">

                    <div class="row" style="background-color: white">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35">Sold Products</h3>

                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                       <th class="text-dark h4">Name</th>
                                       <th class="text-dark h4">Desription</th>
                                       <th class="text-dark h4">Price (KES)</th>
                                       <th class="text-dark h4">Bidders</th>
                                       <th class="text-dark h4">Added on</th>
                                       <th class="text-dark h4">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr class="tr">
                                          <td class="text-dark h5">{{$product->name}}</td>
                                          <td class="text-dark h5">{{$product->description}}</td>
                                          <td class="text-dark h5">
                                                <span class="status--denied">{{number_format($product->amount)}}</span>
                                            </td>
                                            <td class="text-info">{{number_format($product->bidders)}}</td>
                                            <td class="text-dark h5 desc">{{$product->created_at}}</td>

                                          <td class="text-dark h5">
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                </div>
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