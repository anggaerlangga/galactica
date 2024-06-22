<link href="<?php echo base_url('assets/css/collection.css') ?>" rel="stylesheet">

<section class="list-product">
    <div class="container">
        <div class="row">
            <div class="title">
                <?php 
                     foreach ($product as $key => $val) {
                         $category = $val->category;
                         $all = "Semua Produk";
                         $length = strlen($val->category);
                     }
                    //  if(!empty($product)) {
                    //      echo '<h1>' . $category . '</h1><hr>';
                    //  }
                    //  if($length>20) {
                    //     echo '<h1>' . $all . '</h1><hr>'; 
                    //  }
                     if(empty($product)) {
                        echo '<h1>' . "Tidak ada produk" . '</h1>';
                     }  
                ?>
            </div>
        </div>
        <div class="row justify-content-center">
        <?php foreach ($product as $row): ?>
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="<?= base_url().'upload/product/thumbnail/'.$row->photo ?>" class="img-responsive" />
                    <div class="caption">
                        <h3><?php echo $row->title ?></h3>
                        <p class="price">Rp. <?php echo number_format($row->price) ?></p>
                        <p><a href="https://wa.me/6281281268286?text=Hi+%20+Pak+!+Saya+tertarik+dengan+barang+<?php echo $row->title ?>+di+galacticajayaraya.co.id" class="btn btn-outline-primary" role="button">Beli Sekarang</a><a href="#" class="btn btn-default" role="button">Detail</a></p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>