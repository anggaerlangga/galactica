<link href="<?php echo base_url('assets/css/villa_detail.css') ?>" rel="stylesheet">

<div class="villa_detail">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                    <!-- slides -->
                    <div class="carousel-inner">
                    <?php 
                        foreach ($villa_gallery as $key => $value) {
                            $active = ($key == 0) ? 'active' : '';
                            echo '<div class="carousel-item ' . $active . '">
                                <img src="' . base_url().'upload/villa/' . $value->photo . '" alt="…">
                                </div>';
                        }
                    ?>
                        <!-- <div class="carousel-item active"> <img src="https://i.imgur.com/weXVL8M.jpg" alt="Hills"> </div> -->
                        <!-- <div class="carousel-item"> <img src="https://i.imgur.com/Rpxx6wU.jpg" alt="Hills"> </div> -->
                        <!-- <div class="carousel-item"> <img src="https://i.imgur.com/83fandJ.jpg" alt="Hills"> </div> -->
                        <!-- <div class="carousel-item"> <img src="https://i.imgur.com/JiQ9Ppv.jpg" alt="Hills"> </div> -->
                    </div> <!-- Left right --> <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> <!-- Thumbnails -->
                    <ol class="carousel-indicators list-inline">
                        <?php
                            foreach ($villa_gallery as $key => $value) {
                            $active = ($key == 0) ? 'active' : '';
                            echo '<li data-target="#custCarousel" data-slide-to="' . $key . '" class="' . $active . '"><img src="' . base_url().'upload/villa/' . $value->photo . '" class="img-fluid">';
                            }
                        ?>
                        <!-- <li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel"> <img src="https://i.imgur.com/weXVL8M.jpg" class="img-fluid"> </a> </li> -->
                        <!-- <li class="list-inline-item"> <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel"> <img src="https://i.imgur.com/Rpxx6wU.jpg" class="img-fluid"> </a> </li> -->
                        <!-- <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="2" data-target="#custCarousel"> <img src="https://i.imgur.com/83fandJ.jpg" class="img-fluid"> </a> </li> -->
                        <!-- <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="3" data-target="#custCarousel"> <img src="https://i.imgur.com/JiQ9Ppv.jpg" class="img-fluid"> </a> </li> -->
                    </ol>
                </div>
            </div>
        </div>
        
        <div class="content-area">
            <div class="row">
                <div class="col-sm-12">   
                <?php foreach($villa as $row) : ?>
                    <h4>Villa <?php echo $row->kode_villa ?></h4> 
                <?php endforeach ?>
                </div>
                <div class="col-sm-8">
                    <?php foreach($villa as $row) : ?>
                        <p><?php echo $row->description ?></p> 
                    <?php endforeach ?>
                </div>
                <div class="col-sm-4">
                <?php foreach($villa as $row) : ?>
                    <div class="book_outbond">
                        <h4>Pesan Sekarang</h4>
                        <a href="https://wa.me/6281281707188?text=Hi+%20+Mang+!+Saya+tertarik+dengan+villa+<?php echo $row->kode_villa ?>+di+Mangvilla.com">
                            <img src="<?php echo base_url('assets/img/Asset 25.png') ?>" class="img-responsive" />
                        </a>
                        <p>+62 812 8170 7188</p>
                    </div>
                    <?php endforeach ?>
                </div> 
            </div>
        </div>

        <div class="fasilitas">
            <div class="row">
                <div class="col-sm-12">
                    <h4>Fasilitas</h4>
                </div>
                <div class="col-sm-8">
                   <?php foreach($villa as $row) : ?>
                    <div class="daftar-fasilitas">
                        <ul>
                            <div class="col">
                            <li><img src="<?php echo base_url('assets/img/01 orang.png') ?>" /><?php echo $row->tamu ?> Tamu</li>
                            <li><img src="<?php echo base_url('assets/img/02 kamar tidur-01.png') ?>" /><?php echo $row->kamartidur ?> Kamar</li>
                            <li><img src="<?php echo base_url('assets/img/03 kamar mandi-01.png') ?>" /><?php echo $row->kamarmandi ?> Kamar Mandi</li>
                            </div>
                            <div class="col">
                            <li><img src="<?php echo base_url('assets/img/04 ruang keluarga.png') ?>" /><?php if($row->ruangkeluarga == 'Y') { echo "Ruang Keluarga : Ada"; } else { echo "Ruang Keluarga : Tidak Ada"; } ?></li>
                            <li><img src="<?php echo base_url('assets/img/05 dapur.png') ?>" /><?php if($row->dapur == 'Y') { echo "Dapur : Ada"; } else { echo "Dapur : Tidak Ada"; } ?></li>
                            <li><img src="<?php echo base_url('assets/img/06 parkir-01.png') ?>" /><?php if($row->tempatparkir == 'Y') { echo "Parkiran : Ada"; } else { echo "Parkiran : Tidak Ada"; } ?></li>
                            </div>
                            <div class="col">
                            <li><img src="<?php echo base_url('assets/img/07 wifi.png') ?>" /><?php if($row->wifi == 'Y') { echo "Wifi : Ada"; } else { echo "Wifi : Tidak Ada"; } ?></li>
                            <li><img src="<?php echo base_url('assets/img/08 kolam renang-.png') ?>" /><?php if($row->kolamrenang == 'Y') { echo "Kolamrenang : Ada"; } else { echo "Kolamrenang : Tidak Ada"; } ?></li>
                            </div>
                        </ul>
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="col-sm-4">
                    <div class="lokasi">

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
