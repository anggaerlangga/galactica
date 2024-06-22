<link href="<?php echo base_url('assets/css/about.css') ?>" rel="stylesheet">
<div id="banner-area" class="banner-area">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">PROJECT KAMI</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">HOME</a></li>
                      <li class="breadcrumb-item active" aria-current="page">PROJECT</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 

<section class="detail-product">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h1><?php echo $product->title ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="image-product">
                    <img src="<?php echo site_url('/upload/product/'.$product->project_id) ?>" class="img-responsive">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="desc-product">
                    <p><?php echo $product->description ?></p>
                </div>
            </div>
        </div>
    </div>
</section>