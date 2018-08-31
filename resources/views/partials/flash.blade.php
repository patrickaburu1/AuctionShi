
@if(Session::has('success'))

    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success"></span>
        {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@elseif(Session::has('error'))


    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger"></span>
        {{ Session::get('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>


@elseif(Session::has('info'))

    <div class="sufee-alert alert with-close alert-info alert-dismissible fade show">
        <span class="badge badge-pill badge-info"></span>
        {{ Session::get('info') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

@endif

{{--add item title--}}

<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1"></h2>
            <a href="{{url('upload-product')}}" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>sell item</a>
        </div>
    </div>
</div>