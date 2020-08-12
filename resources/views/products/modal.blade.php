@extends('nav.nav')

@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="mr-2 fa fa-align-justify"></i>
                                    <strong class="card-title" v-if="headerText">Modals</strong>
                                </div>
                                <div class="card-body">

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#smallmodal">
                                        Small
                                    </button>

                                    <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                                        Medium
                                    </button>
                                    <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#largeModal">
                                        Large
                                    </button>
                                    <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#scrollmodal">
                                        Scrolling
                                    </button>
                                    <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#staticModal">
                                        Static
                                    </button>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Small Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra and the mountain
                        zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus Dolichohippus. The latter
                        resembles an ass, to which it is closely related, while the former two are more horse-like. All three belong to the
                        genus Equus, along with other living equids.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>
@endsection