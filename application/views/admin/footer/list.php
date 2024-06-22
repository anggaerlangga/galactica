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

                <h1 class="h3 mb-2 text-gray-800">Section Page Seven</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/footer/add') ?>"><i class="fas fa-plus"></i> Add New</a>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Language</th>
                                            <th>Motto</th>
                                            <th>Subtitle</th>
                                            <th>Subtitle 2</th>
                                            <th>Email</th>
                                            <th>Terms & Agreements</th>
                                            <th>Privacy & Policy</th>
                                            <th>Twitter</th>
                                            <th>Telegram</th>
                                            <th>Facebook</th>
                                            <th>Instagram</th>
                                            <th>Medium</th>
                                            <th>Linkedin</th>
                                            <th>Github</th>
                                            <th>Youtube</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($footer as $footer): ?>
                                        <tr>
                                            <td><?php echo $footer->lang ?></td>
                                            <td><?php echo $footer->motto ?></td>
                                            <td><?php echo $footer->subtitle ?></td>
                                            <td><?php echo $footer->subtitle2 ?></td>
                                            <td><?php echo $footer->email ?></td>
                                            <td><?php echo $footer->tna ?></td>
                                            <td><?php echo $footer->pnp ?></td>
                                            <td><?php echo $footer->twitter ?></td>
                                            <td><?php echo $footer->telegram ?></td>
                                            <td><?php echo $footer->facebook ?></td>
                                            <td><?php echo $footer->instagram ?></td>
                                            <td><?php echo $footer->medium ?></td>
                                            <td><?php echo $footer->linkedin ?></td>
                                            <td><?php echo $footer->github ?></td>
                                            <td><?php echo $footer->youtube ?></td>
                                            <td>
                                                <a href="<?php echo site_url('admin/footer/edit/'.$footer->footer_id) ?>"
                                                class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                                <a onclick="deleteConfirm('<?php echo site_url('admin/footer/delete/'.$footer->footer_id) ?>')"
                                                href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Delete</a>
										    </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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

    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('js/sb-admin-2.min.js') ?>"></script>
    <script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>

    <?php $this->load->view("admin/_partials/modal.php") ?>

    <script>
        function deleteConfirm(url){
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>

</body>

</html>