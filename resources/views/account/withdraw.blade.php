@extends('nav.nav')

@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    @include('partials.flash')
                    <div class="row card " id="express">
                        <div class="col-md-6">
                            <h4 class="title-5 m-b-35">withdraw Current    Balance::  KES {{$balance}}</h4>
                            <form method="post" action="{{url('withdraw')}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="selectbasic">Phone Number</label>
                                    <div class="col-md-12">
                                        <input id="msisdn" name="phone" value="" class="form-control" required=""
                                               placeholder="e.g 07XXXXXXXX">
                                    </div>
                                </div>

                                <div class="row"></div>

                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="selectbasic">Amount</label>
                                    <div class="col-md-12">
                                        <input id="amount" name="amount" class="form-control" required=""
                                               placeholder="KES. 100" maxlength="10" type="text">
                                    </div>
                                </div>

                                <div></div>

                                <div class="form-group">
                                    <button type="submit" class="btn  btn-primary  form-control">Withdraw</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>