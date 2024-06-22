<div class="modal fade" id="Modal_Submit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 d-flex align-items-center justify-content-center">
                        <div class="icon-failed">
                            <img src="<?php echo site_url('assets/img/OK.png') ?>" class="img-responsive">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 d-flex align-items-center justify-content-center">
                        <div class="success">
                            <h1>Great!</h1>
                            <br>
                            <p>Thank you for joining the challenge.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="loader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 d-flex align-items-center justify-content-center">
                        <div class="icon-failed">
                            <img src="<?php echo site_url('assets/img/OK.png') ?>" class="img-responsive">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 d-flex align-items-center justify-content-center">
                        <div class="success">
                            <h1>Please Wait ...</h1>
                            <br>
                            <p>Thank you for joining the challenge.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="modal fade" id="validation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 d-flex align-items-center justify-content-center">
                        <div class="icon-failed">
                            <img src="<?php echo site_url('assets/img/Error.png') ?>" class="img-responsive">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 d-flex align-items-center justify-content-center">
                        <div class="caution">
                            <h1>Ooops!</h1>
                            <br>
                            <p>Something is wrong, please check the format of the data you filled in and try again</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tick_agree" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 d-flex align-items-center justify-content-center">
                        <div class="icon-failed">
                            <img src="<?php echo site_url('assets/img/Error.png') ?>" class="img-responsive">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 d-flex align-items-center justify-content-center">
                        <div class="caution">
                            <h1>Ooops!</h1>
                            <br>
                            <p>Please tick the checkbox.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-dialog .modal-content {
        background: linear-gradient(180deg, #0F0F0F 0%, #090705 100%);
    }

    .modal-dialog .modal-content .success h1 {
        font-family: 'Montserrat-Medium';
        font-size: 30px;
        text-align: center;
        color: #ffff;
    }

    .modal-dialog .modal-content .success p {
        font-family: 'Montserrat';
        font-weight: 300px;
        font-size: 18px;
        text-align: center;
        color: #ffff;
    }

    .modal-dialog .modal-content .caution h1 {
        font-family: 'Montserrat-Medium';
        font-size: 30px;
        text-align: center;
        color: #ffff;
    }

    .modal-dialog .modal-content .caution p {
        font-family: 'Montserrat';
        font-weight: 300px;
        font-size: 18px;
        text-align: center;
        color: #ffff;
    }

    .modal-header {
        border: none;
    }

    .modal-footer {
        border: none;
    }

    .close {
        color: #ffff;
    }
</style>