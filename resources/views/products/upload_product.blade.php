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
                                <div class="card-body  text-dark h4">
                                    <form  method="post" enctype="multipart/form-data" class="form-horizontal" action="{{url('upload-product')}}">
                                       {{csrf_field()}}
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Product Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input id="" name="product_name" placeholder="Product Name"
                                                       class="form-control  text-dark h4" required
                                                       type="text">
                                                <small class="  text-dark h4">Enter Product Name</small>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="password-input" class=" text-dark h4 form-control-label">Amount</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input id="password-input" name="amount" placeholder="Amount" required
                                                       class="form-control  text-dark h4" type="number" maxlength="5">
                                                <small class=" text-dark  ">Please enter amount in KES</small>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="select" class="  text-dark h4 form-control-label">Select Category</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name="category" id="select" class="form-control  text-dark h4" required>
                                                    <option class=" text-dark h4" value="0" disabled selected>Please select Category</option>
                                                    @foreach($categories as $category)
                                                    <option class=" text-dark h4" value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="password-input" class=" text-dark h4 form-control-label">Sell By Date</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input id="password-input" name="sellby_date" placeholder="Date" required
                                                       class="form-control  text-dark h4" type="date">
                                                <small class=" text-dark h4">To be sold by date</small>
                                            </div>
                                        </div>


                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" text-dark h4 form-control-label">Product
                                                    Description</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="product_description" id="textarea-input" rows="5"
                                                          placeholder="Product Description" class="form-control  text-dark h4"
                                                          maxlength="250" required></textarea>
                                                <small class=" text-dark h4">Enter More Info About Product (max
                                                    character 250)
                                                </small>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="file-input" class=" text-dark h4 form-control-label">Product
                                                    Image</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input id="file-input" name="image" class="form-control-file  text-dark h4"
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