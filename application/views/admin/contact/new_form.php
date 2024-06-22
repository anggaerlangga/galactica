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
                        <a href="<?php echo site_url('admin/contact') ?>"><i class="fa fa-arrow-circle-left"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('admin/contact/add') ?>" method="post" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input class="form-control <?php echo form_error('phone') ? 'is-invalid':'' ?>"
                                    type="text" name="phone" placeholder="Phone" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('phone') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="wa">Whatsapp</label>
                                <input class="form-control <?php echo form_error('wa') ? 'is-invalid':'' ?>"
                                    type="text" name="wa" placeholder="Whatsapp" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('wa') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
                                    type="text" name="email" placeholder="Email" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('email') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ig">Instagram</label>
                                <input class="form-control <?php echo form_error('ig') ? 'is-invalid':'' ?>"
                                    type="text" name="ig" placeholder="Instagram" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('ig') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input class="form-control <?php echo form_error('address') ? 'is-invalid':'' ?>"
                                    type="text" name="address" placeholder="Address" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('address') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input class="form-control <?php echo form_error('latitude') ? 'is-invalid':'' ?>"
                                    type="text" name="latitude" placeholder="Latitude" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('latitude') ?>
                                </div>
                            </div>

                            <input type="hidden" name="contact_id" value="abc" />
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input class="btn btn-success" type="submit" name="btn" value="Save" />
                
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

</body>

</html>