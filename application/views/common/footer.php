  <!-- Javascript -->
  <script src="<?php echo base_url('assets/jquery/jquery.slim.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!-- Slick Carousel -->
  <script src="<?php echo base_url('vendor/slick/slick.min.js')?>"></script>
  <script src="<?php echo base_url('vendor/slick/slick-animation.min.js')?>"></script>
  <!-- Color box -->
  <script src="<?php echo base_url('vendor/colorbox/jquery.colorbox.js')?>"></script>
  <!-- shuffle -->
  <script src="<?php echo base_url('vendor/shuffle/shuffle.min.js')?>"></script>
  <script src="<?php echo base_url('vendor/aos/aos.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/main.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/script.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/smoothscroller.js') ?>"></script>


<div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-md-4">
          <div class="about-foot">
            <div class="title">
              <h4>TENTANG KAMI</h4>
            </div>
            <div class="logo">
              <img src="<?php echo base_url('assets/img/logo_header.png')?>">
            </div>
            <div class="desc">
              <p>Kami adalah perusahaan Distributor Bahan Bangunan. Kami mendistribusikan bahan bangunan seperti Besi Beton, Besi WF, H-Beam, CNP, UNP, Semen, Bata Ringan, Gypsum dll. Ke berbagai proyek seperti rumah tinggal, perumahan, proyek pemerintahan dan gedung bertingkat.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-d=md-4">
          <div class="working-foot">
            <div class="title">
              <h4>JAM OPERASIONAL</h4>
            </div>
            <div class="desc">
              <p>Kami siap melayani anda baik secara online maupun offline. Kami siap melayani anda ditempat kami </p>
              <ul>
                <li>Monday - Friday   :   08:00 - 17:00 PM</li>
                <li>Saturday          :   08:00 - 12:00 PM</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-d=md-4">
          <div class="service-foot">
            <div class="title">
              <h4>PRODUK</h4>
            </div>
            <div class="desc">
              <ul>
                <li><a href="<?php echo base_url('/collection/product/STEEL') ?>">BESI BETON</a></li>
                <li><a href="<?php echo base_url('/collection/product/CNP') ?>">CNP</a></li>
                <li><a href="<?php echo base_url('/collection/product/UNP') ?>">UNP</a></li>
                <li><a href="<?php echo base_url('/collection/product/WF') ?>">WF, IWF</a></li>
                <li><a href="<?php echo base_url('/collection/product/HBEAM') ?>">H-BEAM</a></li>
                <li><a href="<?php echo base_url('/collection/product/HOLLOW') ?>">HOLLOW HITAM</a></li>
                <li><a href="<?php echo base_url('/collection/product/HOLLOWGALVANIS') ?>">HOLLOW GALVANIS</a></li>
                <li><a href="<?php echo base_url('/collection/product/SIKU') ?>">BESI SIKU</a></li>
                <li><a href="<?php echo base_url('/collection/product/PLAT') ?>">PLAT STRIP</a></li>
                <li><a href="<?php echo base_url('/collection/product/GYP') ?>">GYPSUM</a></li>
                <li><a href="<?php echo base_url('/collection/product/COMPND') ?>">COMPOUND</a></li>
                <li><a href="<?php echo base_url('/collection/product/BAJARINGAN') ?>">BAJA RINGAN</a></li>
                <li><a href="<?php echo base_url('/collection/product/ROOFING') ?>">METAL ROOFING</a></li>
                <li><a href="<?php echo base_url('/collection/product/LISPLANK') ?>">LISPLANK</a></li>
                <li><a href="<?php echo base_url('/collection/product/MORTAR') ?>">MORTAR</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="footer-bottom">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="copyright">
          &copy;2022 <span>CV Galactica Jaya Raya</span>. All Rights Reserved
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Footer -->

<script>
  $('.thumbnail').click(function(){
    $('.modal-body').empty();
    $($(this).parents('div').html()).appendTo('.modal-body');
    $('#modal').modal({show:true});
});

$('#modal').on('show.bs.modal', function () {
    $('.col-4,.row .thumbnail').addClass('blur');
});

$('#modal').on('hide.bs.modal', function () {
    $('.col-4,.row .thumbnail').removeClass('blur');
});

// $(document).ready(function(){
  $('#category_id').change(function(){ 
      var category_id=$(this).val();
        $.ajax({
          url : "<?php echo site_url('home/getpricelistByCategory');?>",
          method : "POST",
          data : {category_id: category_id},
          async : true,
          dataType : 'json',
            success: function(data){
              var html = '';
              var i;
              for(i=0; i<data.length; i++){
                html += '<tr>'+
                '<td>'+data[i].title+'</td>'+
                '<td>'+'<a href="#" onclick="downloadPDF(\'<?php echo base_url('upload/pricelist/');?>' +data[i].files + '\')">'+'Download'+'</a>'+'</td>'+
                '</tr>';

                // html += '<div class="plcard">'+
                // '<div class="card-body">'+
                // '<a href="#" onclick="downloadPDF(\'<?php echo base_url('upload/pricelist/');?>' + data[i].files + '\')">'+data[i].title+
                // '</a>'+
                // '</div>'+
                // '</div>';
              }
              $('#show_data').html(html);
            }
        });
        return false;
  });

  function downloadPDF(url) {
    // Implement download logic here
    window.open(url, '_blank');
  }

// });

</script>