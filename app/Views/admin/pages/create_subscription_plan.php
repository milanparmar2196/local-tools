

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
              <li class="breadcrumb-item active">Create Subscription Plan</li>
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
                <h2 class="card-title">Create Subscription Plan</h2>
                
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
                <form method="post" action="<?= base_url('/admin/subscription/create'); ?>" enctype="multipart/form-data">
                    <div class="row px-4 my-3">
                        <div class="col-md-4 float-left">
                            <div class="form-group form-default">
                                <label class="float-label">Name</label>
                                <select class="form-control" name="name">
                                  <option selected="selected">Select Category</option>
                                  <?php 
                                    foreach ($plans as $plans){
                                      echo '<option  value="'.$plans['id'].'">'.$plans['name'].'</option>';

                                    }
                                  ?>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-4 float-left">
                            <div class="form-group form-default">
                                <label class="float-label">Duration</label>
                                <select class="form-control" name="duration">
                                  <option  value="1 Day">1 Day</option>
                                  <option  value="7 Days">7 Days</option>
                                  <option  value="15 Days">15 Days</option>
                                  <option selected="selected" value="30 Days">30 Days</option>
                                  <option  value="90 Days">90 Days</option>
                                  <option  value="1 Year">1 Year</option>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-4 float-left">
                            <div class="form-group form-default">
                                <label class="float-label">Status</label>
                                <select class="form-control" name="status">
                                  <option selected="selected" value="1">Active</option>
                                  <option  value="2">Draft</option>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-default">
                                <label class="float-label">Upload Icon</label>
                                <input class="form-control" type="file" name="icon" placeholder="Choose an image" required="">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-default">
                                <label class="float-label">Amount</label>
                                <input class="form-control" type="text" name="amount" placeholder="10,000" required="">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-sm-12 text-center mt-3 mb-3">
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