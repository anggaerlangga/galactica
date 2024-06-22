<section class="secwon" id="secwon">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Sangat mudah menemukan kebutuhan Anda</h5>
                <p class="card-text">Mulai dari Screw, Gypsum, Compound, Baja Ringan dan Berbagai Jenis Besi dapat Anda temukan disini.</p>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Temukan kebutuhan Anda
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php foreach ($category as $row): ?>
                            <a class="dropdown-item" href="<?php echo site_url('/product/category/'.$row->category_id) ?>"><?php echo $row->category_name ?></a>
                         <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sectwo" id="welcome">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="bd-greetings">
                    <h2>Selamat Datang di Website Galactica Jaya Raya</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="about" id="about">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <h2>Apa itu</h2>
                <h4>GALACTICA ?</h4>
            </div>
            <div class="col-sm-7">
                <p>Kami adalah perusahaan Distributor Bahan Bangunan yang sudah dipercaya selama 20 tahun lebih. 
                    Kami mendistribusikan bahan-bahan bangunan seperti besi beton, besi WF, H-Beam, CNP, UNP, Semen , Bata Ringan, Gypsum dll. 
                    ke berbagai proyek seperti rumah tinggal pribadi, perumahan, proyek-proyek pemerintah, gedung-gedung bertingkat dll. </br>
                </p>
                <p>   
                    Kami sudah menjalin kerjasama yg baik dengan kontraktor- kontraktor besar seperti Total Bangun Persada, Waskita. Adhi Karya, Jaya Konstruksi dll.
                    yang telah mempercayakan kepada kami untuk mendistribusikan bahan-bahan bangunan yang mereka butuhkan.
                </p>
            </div>
        </div>
        <div class="row" style="float:right;">
            <div class="whatsapp">
                <a href="https://wa.me/6281281268286?text=Hi+!+Apakah+barang+yang+dijual+di+Website+Galactica+tersedia+?">
                    <img src="<?php echo base_url('assets/img/Asset 26.png') ?>" class="img-responsive" />
                </a>
            </div>
        </div>
    </div>
</section>

<section class="secthree">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div data-aos="fade-left" data-aos-duration="800" data-aos-delay="400" class="title">
                    <h1>Apakah Anda memiliki proyek kontruksi yang dapat kami bantu?</h1>
                </div>
                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="400" class="desc">
                    <p>Kami Distributor Bahan Bangunan menyediakan Besi Beton, Gypsum, Compound, Bata Ringan, Baja Ringan, Mortar, Lispank dll. Kami siap men-supply proyek Renovasi Rumah, Bangun Rumah, Renovasi Gedung dan Bangun Gedung</p>
                </div>
                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="400" class="btn-group">
                    <a href="https://wa.me/6281281268286?text=Hi+!+Apakah+barang+yang+dijual+di+Website+Galactica+tersedia+?" role="button" class="btn btn-outline-primary">Hubungi Kami</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div data-aos="fade-right" data-aos-duration="800" data-aos-delay="400" class="secthree-img">
                    <img src="<?php echo base_url('assets/img/secthree.jpg') ?>" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="steel">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                <h1>Produk Unggulan Kami</h1>
                <hr>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="subtitle">
                <p>Kami adalah distributor besi beton yang telah lebih dari 20 tahun bekerja sama dengan kontraktor</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($product as $product): ?>
            <div data-aos="fade-down" data-aos-duration="800" class="col-sm-4">
                <div class="thumbnail">
                    <div class="thumbnail-img">
                        <a href="#">
                            <img src="<?php echo base_url('upload/product/thumbnail/'.$product->photo) ?>" class="img-responsive">
                        </a>
                        <div class="thumbnail-body">
                            <!-- <h4 class="title"><?php echo $product->title ?></h4> -->
                        </div>
                    </div>                
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="secfour" id="product">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title">
                <h1>Produk Kami</h1>
                <hr>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="subtitle">
                <p>Kami siap mensupply proyek Anda partai kecil maupun partai besar dengan kualitas terjamin</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($category as $category): ?>
            <div data-aos="fade-down" data-aos-duration="800" class="col-sm-4">
                <div class="thumnail">
                    <div class="thumnail-img">
                        <a href="<?php echo site_url('/collection/product/'.$category->category_id) ?>">
                            <img src="<?php echo base_url('upload/homepage/'.$category->photo) ?>" class="img-responsive">
                        </a>
                        <div class="thumnail-body">
                            <h4 class="title"><a href="<?php echo site_url('/collection/product/'.$category->category_id) ?>"><?php echo $category->category_name ?></a></h4>
                        </div>
                    </div>                
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div data-aos="fade-down" data-aos-duration="800" class="row justify-content-center">
            <a href="<?php echo site_url('/collection/all') ?>" role="button" class="btn btn-outline-primary">Lihat Semua Produk</a>
        </div>
    </div>
</section>

<!-- <section class="pricelist" id="pricelist">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title">
                <h1>Price List Kami</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <select class="form-control" name="category" id="category">
                        <option value="">---Pilih Produk---</option>
                        <option value="PIPA">Pipa PVC</option>
                        <option value="WF">WF IWF</option>
                        <option value="BAJARINGAN">BAJA RINGAN</option>
                        <option value="HOLLOW">HOLLOW</option>
                        <option value="UNP">UNP</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4" id="show_data"></div>
        </div>
    </div>
</section> -->

<section class="proyek" id="proyek">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title">
                <h1>Proyek Kami</h1>
                <hr>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="subtitle">
                <p>Kami men-supply bahan bangunan lebih dari 20 tahun baik untuk Partai Besar maupun Partai Kecil</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($proyek as $proyek): ?>
            <div data-aos="fade-down" data-aos-duration="800" class="col-sm-4">
                <div class="thumbnail">
                    <div class="thumbnail-img">
                        <a href="#">
                            <img src="<?php echo base_url('upload/homepage/'.$proyek->photo) ?>" class="img-responsive">
                        </a>
                        <div class="thumbnail-body">
                            <h4 class="title"><a href="#"><?php echo $proyek->nama_proyek ?></a></h4>
                        </div>
                    </div>                
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="article" id="article">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title">
                <h1>Artikel</h1>
                <hr>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($article as $article): ?>
            <div class="col-sm-3">
                <div class="card-box">
                    <figure class="img-card margin-bottom-no">
                        <a href="<?php echo site_url('/article/getDetail/'.$article->article_id) ?>">
                            <img loading="lazy" src="<?php echo base_url('upload/homepage/'.$article->image) ?>">
                        </a>
                    </figure>
                    <article class="text-card">
                        <a href="<?php echo site_url('/article/getDetail/'.$article->article_id) ?>">
                            <h3 class="title"><?php echo $article->title ?></h3>
                        </a>
                        <h4 class="date"></h4>
                    </article>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div data-aos="fade-down" data-aos-duration="800" class="row justify-content-center">
            <a href="<?php echo site_url('/article') ?>" role="button" class="btn btn-outline-primary">Lihat Semua Artikel</a>
        </div>
    </div>
</section>

<section class="secfive" id="partner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title">
                <h1>Partner Kami</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="thumbnail-slider">
                <div class="thumbnail-container">
                    <?php foreach ($partner as $partner): ?>
                        <div class="col-sm-3">
                            <div class="item">
                                <img src="<?php echo base_url('upload/homepage/'.$partner->photo) ?>"/>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- controls slides -->
                <div class="controls"></div>
            </div>
        </div>
    </div>
</section>

<section class="secsix" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div data-aos="zoom-in" data-aos-duration="800" data-aos-delay="400" class="title">
                <h1>Hubungi Kami</h1>
                <hr>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-6">
                <div data-aos="fade-left" data-aos-duration="800" class="maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15866.221011281177!2d106.667814!3d-6.190216!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f905a17f1089%3A0xe3ce35c5d04f04b4!2sJl.%20KH%20Hasyim%20Ashari%20No.108%2C%20RT.005%2FRW.003%2C%20Poris%20Plawad%20Utara%2C%20Kec.%20Cipondoh%2C%20Kota%20Tangerang%2C%20Banten%2015122!5e0!3m2!1sid!2sid!4v1668959701845!5m2!1sid!2sid" width="500" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <?php foreach ($contact as $contact): ?>
            <div class="col-sm-6 col-md-6">
                <div data-aos="fade-right" data-aos-duration="800" class="contact">
                    <ul>
                        <li><img src="<?php echo base_url('assets/img/telephone.png')?>"><?php echo $contact->phone ?></li>
                        <li><img src="<?php echo base_url('assets/img/whatsapp.png')?>"><?php echo $contact->wa ?></li>
                        <li><img src="<?php echo base_url('assets/img/instagram.png')?>"><?php echo $contact->ig ?></li>
                        <li><img src="<?php echo base_url('assets/img/mail.png')?>"><?php echo $contact->email ?></li>
                        <li><img src="<?php echo base_url('assets/img/place.png')?>"><?php echo $contact->address ?></li>
                    </ul>
                </div>
                <div data-aos="fade-down" data-aos-duration="800" class="inquiry">
                    <a href="#" role="button" class="btn btn-primary">Tanyakan pada kami apa yang Anda butuhkan</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>