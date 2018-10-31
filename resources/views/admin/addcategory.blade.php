@extends('nav.nav')

@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">

                    @include('partials.flash')

                    <div class="row">
                        <div class="col col-md-1">
                        </div>
                        <div class="col col-md-9 center-block">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Sell Product</strong> / Goods
                                </div>
                                <div class="card-body card-block">
                                    <form  method="post" enctype="multipart/form-data" class="form-horizontal" action="{{url('add-category')}}">
                                        {{csrf_field()}}
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class="text-dark form-control-label">Category</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input id="text-input" name="category" placeholder="Category"
                                                       class="form-control" required
                                                       type="text">
                                                <small class="form-text text-muted">Category</small>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class="text-dark form-control-label">description</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input id="text-input" name="description" placeholder="decription"
                                                       class="form-control" required
                                                       type="text">
                                                <small class="form-text text-muted">description</small>
                                            </div>
                                        </div>


                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <button type="submit" class="btn btn-primary btn-info">
                                                     Add new category
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col col-md-2">
                        </div>
                    </div>
                    <div class="row"></div>
                </div>
            </div>
        </div>
    </div>
@endsection