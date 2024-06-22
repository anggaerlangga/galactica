<section class="pricelist" id="pricelist">
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
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">No Selected</option>
                            <?php foreach($category as $row):?>
                                <option value="<?php echo $row->category_id;?>"><?php echo $row->category_id;?></option>
                            <?php endforeach;?>
                    </select>
                    <!-- <select class="form-control" name="category" id="category_id">
                        <option value="">---Pilih Produk---</option>
                        <option value="PIPA">Pipa PVC</option>
                        <option value="BAJARINGAN">BAJA RINGAN</option>
                        <option value="STEEL">BESI BETON</option>
                        <option value="WF">WF IWF</option>
                        <option value="HOLLOW">HOLLOW</option>
                        <option value="UNP">UNP</option>
                        <option value="HBEAM">HBEAM</option>
                        <option value="GYP">GYPSUM</option>
                        <option value="COMPND">COMPOUND</option>
                        <option value="MORTAR">MORTAR</option>
                    </select> -->
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                            
                        <tbody>
                    </table>
                </div>    
            </div>
        </div>
    </div>
</section>