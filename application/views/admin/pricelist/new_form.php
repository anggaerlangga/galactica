<?php $this->load->view("admin/_partials/head.php") ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Side Bar -->
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("admin/_partials/navbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <h1 class="h3 mb-2 text-gray-800">Add Content in Section</h1>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
				<?php endif; ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/pricelist') ?>"><i class="fa fa-arrow-circle-left"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('admin/pricelist/add') ?>" method="post" enctype="multipart/form-data" >
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="category_id">Category ID</label>
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option value="">No Selected</option>
                                            <?php foreach($category as $row):?>
                                                <option value="<?php echo $row->category_id;?>"><?php echo $row->category_id;?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('category_id') ?>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="category">Category Name</label>
                                        <input class="form-control <?php echo form_error('category') ? 'is-invalid':'' ?>"
                                            name="category" id="category_name" placeholder="Category Name" readonly />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('category') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input class="form-control <?php echo form_error('title') ? 'is-invalid':'' ?>"
                                    type="text" name="title" id="title" placeholder="TItle" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('title') ?>
                                </div>
                            </div>

                            <div class="form-group">
								<label for="name">File</label>
								<input class="form-control-file <?php echo form_error('file') ? 'is-invalid':'' ?>"
								 type="file" name="files" />
								<div class="invalid-feedback">
									<?php echo form_error('file') ?>
								</div>
							</div>

                            <input type="hidden" name="pricelist_id" value="abc" />
                            <input type="hidden" name="category_id" id="category_id_hide"/>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input class="btn btn-success" type="submit" name="btn" id="btn_save" value="Save" />
                
                        </form>
                    </div>
                </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view("admin/_partials/footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('js/sb-admin-2.min.js') ?>"></script>

        <script>
        $(document).ready(function(){
            $('#category_id').change(function(){ 
                var category_id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('admin/pricelist/getByCategoryId');?>",
                    method : "POST",
                    data : {category_id: category_id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var category_name = '';
                        //var model = '';
                        //var size = '';
                        //var weight = '';
                        //var price = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            category_name += data[i].category_name;
                          //  pricelist_name += data[i].barang_name;
                          //  model += data[i].model;
                          //  size += data[i].size;
                          //  weight += data[i].weight;
                          //  price += data[i].price;
                        }
                        $('#category_name').val(category_name);
                        $('#category_id_hide').val(category_id);
                        //$('#pricelist_name').val(pricelist_name);
                        //$('#model').val(model);
                        //$('#size').val(size);
                        //$('#weight').val(weight);
                        //$('#price').val(price);
                        get_barang(category_id);
                    }
                });
                return false;
            });

            function get_barang(category_id)
            {
                $.ajax({
                    url : "<?php echo site_url('admin/pricelist/getBarangByCategoryId');?>",
                    method : "POST",
                    data : {category_id: category_id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var barang_name = "<option value=''>Select Barang</option>";
                        
                        for (var i = 0; i < data.length; i++) {
                            barang_name += '<option value="' + data[i].barang_name + '">' + data[i].barang_name + '</option>'
                        }
                        $("#pricelist_name").html(barang_name);
                    }
                });    
            }

        });
    </script>

</body>

</html>