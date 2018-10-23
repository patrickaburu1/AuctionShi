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
                            <h3 class="title-5 m-b-35">Transaction History</h3>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Phone Number</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $transaction)
                                        <tr class="tr">
                                            <td>{{$transaction->phone}}</td>
                                            <td class="text-info">{{$transaction->type}}</td>
                                            <td>
                                                {{number_format($transaction->amount)}}
                                            </td>
                                            <td class="desc">{{$transaction->created_at}}</td>
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