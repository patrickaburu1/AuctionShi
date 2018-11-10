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
                            <h3 class="title-5 m-b-35">Transaction History   Balance::  KES {{$balance}}</h3>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                       <th class="text-dark h4">Phone Number</th>
                                       <th class="text-dark h4">Type</th>
                                       <th class="text-dark h4">Amount</th>
                                       <th class="text-dark h4">Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $transaction)
                                        <tr class="tr">
                                           <td class="text-dark h5">{{$transaction->phone}}</td>
                                            <td class="text-info">{{$transaction->type}}</td>
                                           <td class="text-dark h5">
                                                {{number_format($transaction->amount)}}
                                            </td>
                                            <td class="text-dark h5 desc">{{$transaction->created_at}}</td>
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