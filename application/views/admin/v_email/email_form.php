                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <!-- <a href="<?php echo site_url('admin/secwon') ?>"><i class="fa fa-arrow-circle-left"></i>Back</a> -->
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('admin/email/send') ?>" method="post" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label for="title">Email</label>
                                <input class="form-control" type="text" name="email" />
                            </div>

                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input class="btn btn-success" type="submit" name="btn" value="Save" />
                
                        </form>
                    </div>
                </div>