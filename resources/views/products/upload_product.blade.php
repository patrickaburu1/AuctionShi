@extends('nav.nav')

@section('content')
    <div class="page-container">

        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-header">
                            <strong>Basic Form</strong> Elements
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Text Input</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input id="text-input" name="text-input" placeholder="Text" class="form-control"
                                               type="text">
                                        <small class="form-text text-muted">This is a help text</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="email-input" class=" form-control-label">Email Input</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input id="email-input" name="email-input" placeholder="Enter Email"
                                               class="form-control" type="email">
                                        <small class="help-block form-text">Please enter your email</small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="password-input" class=" form-control-label">Amount</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input id="password-input" name="amount" placeholder="Amount"
                                               class="form-control" type="number" maxlength="5">
                                        <small class="help-block form-text">Please enter amount in KES </small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="password-input" class=" form-control-label">Selling Not Later Than</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input id="password-input" name="date" placeholder="Date"
                                               class="form-control" type="date">
                                        <small class="help-block form-text">Please enter amount in KES </small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Select Category</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="select" id="select" class="form-control">
                                            <option value="0" disabled selected>Please select Category</option>
                                            <option value="1">Electronic</option>
                                            <option value="2">Kitchen</option>
                                            <option value="3">Furniture</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-input" class=" form-control-label">File input</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input id="file-input" name="file-input" class="form-control-file" type="file">
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

                    <div class="row"></div>
                </div>
            </div>
        </div>
    </div>
@endsection