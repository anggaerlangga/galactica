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
                        <a href="<?php echo site_url('admin/product') ?>"><i class="fa fa-arrow-circle-left"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('admin/product/add') ?>" method="post" enctype="multipart/form-data" >
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
                                <label for="product_name">Barang Name</label>
                                <select class="form-control" name="product_name" id="product_name">
                                    <!-- <option value="">No Selected</option> -->
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('product_name') ?>
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
                                <label for="model">Model</label>
                                <input class="form-control <?php echo form_error('model') ? 'is-invalid':'' ?>"
                                    type="text" name="model" id="model" placeholder="Model" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('model') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="size">Size</label>
                                <input class="form-control <?php echo form_error('size') ? 'is-invalid':'' ?>"
                                    type="text" name="size" id="size" placeholder="Size" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('size') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="weight">Weight</label>
                                <input class="form-control <?php echo form_error('weight') ? 'is-invalid':'' ?>"
                                    type="text" name="weight" id="weight" placeholder="Weight" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('weight') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input class="form-control <?php echo form_error('price') ? 'is-invalid':'' ?>"
                                    type="text" name="price" id="price" placeholder="Price" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('price') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
                                    rows="4" cols="50" name="description" placeholder="Description"></textarea>
                                <div class="invalid-feedback">
                                    <?php echo form_error('description') ?>
                                </div>
                            </div>

                            <div class="form-group">
								<label for="name">Photo</label>
								<input class="form-control-file <?php echo form_error('photo') ? 'is-invalid':'' ?>"
								 type="file" name="photo" />
								<div class="invalid-feedback">
									<?php echo form_error('photo') ?>
								</div>
							</div>

                            <input type="hidden" name="product_id" value="abc" />
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
                    url : "<?php echo site_url('admin/product/getByCategoryId');?>",
                    method : "POST",
                    data : {category_id: category_id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var category_name = '';
                        var product_name = '';
                        //var model = '';
                        //var size = '';
                        //var weight = '';
                        //var price = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            category_name += data[i].category_name;
                          //  product_name += data[i].barang_name;
                          //  model += data[i].model;
                          //  size += data[i].size;
                          //  weight += data[i].weight;
                          //  price += data[i].price;
                        }
                        $('#category_name').val(category_name);
                        $('#category_id_hide').val(category_id);
                        //$('#product_name').val(product_name);
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
                    url : "<?php echo site_url('admin/product/getBarangByCategoryId');?>",
                    method : "POST",
                    data : {category_id: category_id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var barang_name = "<option value=''>Select Barang</option>";
                        
                        for (var i = 0; i < data.length; i++) {
                            barang_name += '<option value="' + data[i].barang_name + '">' + data[i].barang_name + '</option>'
                        }
                        $("#product_name").html(barang_name);
                    }
                });    
            }
            
            $('#product_name').change(function(){ 
                var product_name=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('admin/product/getBarangByBarangName');?>",
                    method : "POST",
                    data : {barang_name: product_name},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var model = '';
                        var size = '';
                        var weight = '';
                        var price = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            model += data[i].model;
                            size += data[i].size;
                            weight += data[i].weight;
                            price += data[i].price;
                        }
                        $('#model').val(model);
                        $('#size').val(size);
                        $('#weight').val(weight);
                        $('#price').val(price);
                    }
                });
            });

        });
    </script>

</body>

</html>