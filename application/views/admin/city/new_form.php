<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/city/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('admin/city/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="city">City Name*</label>
								<input class="form-control <?php echo form_error('city_name') ? 'is-invalid':'' ?>"
								 type="text" name="city_name" placeholder="City Name" />
								<div class="invalid-feedback">
									<?php echo form_error('city_name') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="province">Province Name*</label>
								<select class="form-control" name="province">
									<option value="">No Selected</option>
									<?php foreach($province as $row):?>
									<option value="<?php echo $row->province_name;?>"><?php echo $row->province_name;?></option>
                       				 <?php endforeach;?>
								</select>
							</div>

							<div class="form-group">
								<label for="createdby">Created By*</label>
								<input class="form-control <?php echo form_error('createdby') ? 'is-invalid':'' ?>"
								 type="text" name="createdby" placeholder="Created By" />
								<div class="invalid-feedback">
									<?php echo form_error('createdby') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="createdon">Created On*</label>
								<input class="form-control <?php echo form_error('createdon') ? 'is-invalid':'' ?>"
								 type="date" name="createdon" placeholder="Created On" />
								<div class="invalid-feedback">
									<?php echo form_error('createdon') ?>
								</div>
							</div>

							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>