

  <?php echo view('admin/includes/header'); ?>
  <?php echo view('admin/includes/navbar'); ?>
  <?php echo view('admin/includes/sidebar'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Categories</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?= base_url('admin/subscription') ?>">Subscription</a></li>
              <li class="breadcrumb-item active">Edit Subscription Plan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content pt-2 pb-2 pl-5 pr-5">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
        
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <h2 class="card-title">Edit Subscription Plan</h2>
                
              </div><!-- /.card-header -->
              <?php if(isset($validation)):?>
                  <div class="alert alert-warning">
                  <?= $validate->listErrors() ?>
                  </div>
                <?php endif; 
                
                  if(session()->getFlashdata('status')){
                    echo '<div class="alert alert-success mt-2 mb-2">';
                    echo '<h6 style="color:#fff;">'.session()->getFlashdata("status").'</h6>';
                    echo '</div>';
                  }
                ?>
                <form method="post" action="<?= base_url('/admin/subscription/update-plan'); ?>" enctype="multipart/form-data">
                    <div class="row px-4 my-3">
                        <div class="col-md-4 float-left">
                            <div class="form-group form-default">
                                <label class="float-label">Name</label>
                                <select class="form-control" name="name">
                                  <option  value="">Select Category</option>
                                  
                                  <option  value="Push Up Plan" <?php  if($Plans_data['plan_id'] == 3){ echo 'selected="selected"'; } ?> >Push Up Plan</option>
                                  <option  value="HeighLight" <?php  if($Plans_data['plan_id'] == 2){ echo 'selected="selected"'; } ?>>Heigh Light</option>
                                  <option  value="Top Plan" <?php  if($Plans_data['plan_id'] == 1){ echo 'selected="selected"'; } ?>>Top Plan</option> 
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-4 float-left">
                            <div class="form-group form-default">
                                <label class="float-label">Duration</label>
                                <select class="form-control" name="duration">
                                  <option  value="1 Day" <?php  if($Plans_data['duration'] == '1 Day'){ echo 'selected="selected"'; } ?>>1 Day</option>
                                  <option  value="7 Days" <?php  if($Plans_data['duration'] == '7 Days'){ echo 'selected="selected"'; } ?>>7 Days</option>
                                  <option  value="15 Days" <?php  if($Plans_data['duration'] == '15 Days'){ echo 'selected="selected"'; } ?>>15 Days</option>
                                  <option  value="30 Days" <?php  if($Plans_data['duration'] == '30 Days'){ echo 'selected="selected"'; } ?>>30 Days</option>
                                  <option  value="90 Days" <?php  if($Plans_data['duration'] == '90 Days'){ echo 'selected="selected"'; } ?>>90 Days</option>
                                  <option  value="1 Year" <?php  if($Plans_data['duration'] == '1 Year'){ echo 'selected="selected"'; } ?>>1 Year</option>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-4 float-left">
                            <div class="form-group form-default">
                                <label class="float-label">Status</label>
                                <select class="form-control" name="status">
                                  <option  <?php  if($Plans_data['status'] == 1){ echo 'selected="selected"'; } ?> value="1">Active</option>
                                  <option  <?php  if($Plans_data['status'] == 0){ echo 'selected="selected"'; } ?> value="2">Draft</option>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-default">
                                <label class="float-label">Upload Icon</label>
                                <input class="form-control" type="file" name="icon" placeholder="Choose an image">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-default">
                                <label class="float-label">Amount</label>
                                <input class="form-control" type="text" name="amount" placeholder="10,000" required="" value="<?= $Plans_data['amount']; ?>">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-sm-12 text-center mt-3 mb-3">
                          <input type="hidden" class="form-control" name="id" value="<?= $Plans_data['id'];?>" />
                          <button class="btn btn-primary " type="submit">Save</button>
                        </div>
                                    
                    </div>
                  </form>
              
            </div>
            <!-- /.nav-tabs-custom -->
          </div>


        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->


<?php echo view('admin/includes/footer'); ?>