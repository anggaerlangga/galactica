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

                <h1 class="h3 mb-2 text-gray-800">Edit Content in Section</h1>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
				<?php endif; ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/footer') ?>"><i class="fa fa-arrow-circle-left"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data"> 

                            <div class="form-group">
                                <label for="lang">Language</label>
                                <select class="form-control" name="lang">
								    <option value="<?php echo $footer->lang ?>"><?php echo $footer->lang ?></option>
									<option value="EN">English</option>
                                    <option value="DE">Deutch</option>
								</select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('lang') ?>
                                </div>
                            </div>

                            <div class="form-group">
								<label for="image">Logo</label>
								<input class="form-control <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
                                 <input type="hidden" name="old_image" value="<?php echo $footer->image ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>

                            <div class="form-group">
                                <label for="motto">Motto</label>
                                <input class="form-control <?php echo form_error('motto') ? 'is-invalid':'' ?>"
                                    type="text" name="motto" placeholder="Motto" value="<?php echo $footer->motto ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('motto') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="subtitle">Subtitle</label>
                                <input class="form-control <?php echo form_error('subtitle') ? 'is-invalid':'' ?>"
                                    type="text" name="subtitle" placeholder="Subtitle" value="<?php echo $footer->subtitle ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('subtitle') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="subtitle2">subtitle 2</label>
                                <input class="form-control <?php echo form_error('subtitle2') ? 'is-invalid':'' ?>"
                                    type="text" name="subtitle2" placeholder="Subtitle2" value="<?php echo $footer->subtitle2 ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('subtitle2') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
                                    type="text" name="email" placeholder="Email" value="<?php echo $footer->email ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('email') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tna">Terms & Agreements</label>
                                <input class="form-control <?php echo form_error('tna') ? 'is-invalid':'' ?>"
                                    type="text" name="tna" placeholder="Terms & Agreements" value="<?php echo $footer->tna ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tna') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pnp">Privacy & Policy</label>
                                <input class="form-control <?php echo form_error('pnp') ? 'is-invalid':'' ?>"
                                    type="text" name="pnp" placeholder="Privacy & Policy" value="<?php echo $footer->pnp ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('pnp') ?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="twitter">Twitter URL</label>
                                <input class="form-control <?php echo form_error('twitter') ? 'is-invalid':'' ?>"
                                    type="text" name="twitter" placeholder="Twitter URL" value="<?php echo $footer->twitter ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('twitter') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="telegram">Telegram URL</label>
                                <input class="form-control <?php echo form_error('telegram') ? 'is-invalid':'' ?>"
                                    type="text" name="telegram" placeholder="Telegram URL" value="<?php echo $footer->telegram ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('telegram') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="facebook">Facebook URL</label>
                                <input class="form-control <?php echo form_error('facebook') ? 'is-invalid':'' ?>"
                                    type="text" name="facebook" placeholder="Facebook URL" value="<?php echo $footer->facebook ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('facebook') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="instagram">Instagram URL</label>
                                <input class="form-control <?php echo form_error('instagram') ? 'is-invalid':'' ?>"
                                    type="text" name="instagram" placeholder="Instagram URL" value="<?php echo $footer->instagram ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('instagram') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="medium">Medium URL</label>
                                <input class="form-control <?php echo form_error('medium') ? 'is-invalid':'' ?>"
                                    type="text" name="medium" placeholder="Medium URL" value="<?php echo $footer->medium ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('medium') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="linkedin">Linkedin URL</label>
                                <input class="form-control <?php echo form_error('linkedin') ? 'is-invalid':'' ?>"
                                    type="text" name="linkedin" placeholder="Linkedin URL" value="<?php echo $footer->linkedin?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('linkedin') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="github">Github URL</label>
                                <input class="form-control <?php echo form_error('github') ? 'is-invalid':'' ?>"
                                    type="text" name="github" placeholder="Github URL" value="<?php echo $footer->github ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('github') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="youtube">Youtube URL</label>
                                <input class="form-control <?php echo form_error('youtube') ? 'is-invalid':'' ?>"
                                    type="text" name="youtube" placeholder="Youtube URL" value="<?php echo $footer->youtube ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('youtube') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lang">Language</label>
                                <select class="form-control" name="lang">
								    <option value="<?php echo $footer->lang ?>"><?php echo $footer->lang ?></option>
									<option value="EN">English</option>
                                    <option value="DE">Deutch</option>
								</select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('lang') ?>
                                </div>
                            </div>

                            <input type="hidden" name="footer_id" value="<?php echo $footer->footer_id ?>" />
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