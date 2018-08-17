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
                                    <form  method="post" enctype="multipart/form-data" class="form-horizontal" action="{{url('upload-product')}}">
                                       {{csrf_field()}}
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Product Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input id="text-input" name="product_name" placeholder="Product Name"
                                                       class="form-control" required
                                                       type="text">
                                                <small class="form-text text-muted">Enter Product Name</small>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="password-input" class=" form-control-label">Amount</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input id="password-input" name="amount" placeholder="Amount" required
                                                       class="form-control" type="number" maxlength="5">
                                                <small class="help-block form-text">Please enter amount in KES</small>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="select" class=" form-control-label">Select Category</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name="category" id="select" class="form-control" required>
                                                    <option value="0" disabled selected>Please select Category</option>
                                                    <option value="1">Electronic</option>
                                                    <option value="2">Kitchen</option>
                                                    <option value="3">Furniture</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="password-input" class=" form-control-label">Sell By Date</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input id="password-input" name="sellby_date" placeholder="Date" required
                                                       class="form-control" type="date">
                                                <small class="help-block form-text">To be sold by date</small>
                                            </div>
                                        </div>


                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Product
                                                    Description</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="product_description" id="textarea-input" rows="5"
                                                          placeholder="Product Description" class="form-control"
                                                          maxlength="250" required></textarea>
                                                <small class="form-text text-muted">Enter More Info About Product (max
                                                    character 250)
                                                </small>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="file-input" class=" form-control-label">Product
                                                    Image</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input id="file-input" name="image" class="form-control-file"
                                                       type="file" required>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <button type="submit" class="btn btn-primary btn-info">
                                                    <i class="fa fa-upload"></i> Upload Product
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