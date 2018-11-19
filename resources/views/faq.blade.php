@extends('nav.nav')

@section('content')
    <div class="page-container ">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    @include('partials.flash')
                    <div class="row text-dark ">
                        <ul>
                            <h3> How to Buy/Bid product</h3>
                            <li>Click bid button</li>
                            <li>Set the price you would like to buy product at</li>
                            <li>Then make sure you maintain sufficient balance in your account to increase chances of winning product</li>
                            <li>After you place bid successfully, wait for the bidder to give out bid.</li>
                            <li>Once you win product bid you will receive a message notifying you for the and when to collect it</li>
                            <li>Also placed bid will be availble on dashboard and also won bid.</li>
                        </ul>
                    </div>
                    <div class="row text-dark ">
                        <h3> How to sell product</h3>
                        <ul>
                            <li>Click sell button</li>
                            <li>Upload product with its clear image</li>
                            <li>Set the price you want to sell product at</li>
                            <li>Set sell by what date (after that date product will no longer be available for buyers)</li>
                            <li>After you upload product successfully it will available for bider, where bidder will place bid based
                                on his/her is willing to buy at </li>
                            <li>Bidder will be availabe on your product under bidders from the highest bidder to lowest bidder</li>
                            <li>Then its upto you to decide which buyer you would like to give NB:: You will only be able to give out bid to only bidder who have sufficient balance in their wallet</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection