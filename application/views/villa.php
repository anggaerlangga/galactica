<link href="<?php echo base_url('assets/css/villa.css') ?>" rel="stylesheet">

<div class="villa_collection">
    <img src="<?php echo base_url('assets/img/Asset 19.png') ?>" class="img-responsive" />
    <div class="container">
        <div class="row">
            <h2>Koleksi Villa Kami</h2>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <span class="dot_big"></span>
                <?php 
                     foreach ($villa as $key => $val) {
                         $location_name = $val->location_name;
                     }
                     echo '<h3>' . $location_name . '</h3>';
                ?>
            </div>
        </div>

        <?php foreach ($villa as $row): ?>
        <div class="row">
            <div class="villa-list">
                <h4><?php echo $row->kode_villa ?></h4>
                <div class="row">
                    <div class="col-sm-4">
                        <img src="<?= base_url().'upload/villa/thumbnail/'.$row->photo?>" class="img-responsive" />
                    </div>
                    <div class="col-sm-8">
                        <p><?php echo $row->description ?></p>
                        <p class="fasilitas"><?php echo $row->tamu ?> tamu | <?php echo $row->kamartidur ?> K.Tidur | <?php echo $row->kamarmandi ?> K.Mandi</p>
                        <a href="<?php echo site_url('/villa_detail/villa/'.$row->kode_villa) ?>"><button class="btn btn-warning">Mulai dari <?php echo $row->price ?></button></a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>
