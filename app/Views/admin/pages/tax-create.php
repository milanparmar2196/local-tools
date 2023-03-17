

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
              <li class="breadcrumb-item active"><a href="<?= base_url('admin/tax') ?>">Tax</a></li>
              <li class="breadcrumb-item active">Create Tax</li>
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
                <h2 class="card-title">Create Tax</h2>
                
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
             

                  <form method="post" action="<?=base_url('/admin/tax/create'); ?>" enctype="multipart/form-data">
                    <div class="col-sm-12 mt-4 mb-4 pl-4 pr-4">
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-default">
                              <label class="float-label">Fee Name</label>
                              <input type="text" class="form-control" name="name" placeholder="Fee Name" required/>
                              <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-default">
                                <label class="float-label">Percentage</label>
                                <input class="form-control" name="percentage" step="00.01" placeholder="10" type="number" required>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-default">
                                <label class="float-label">Status</label>
                                <select class="form-control" name="status" required>
                                  <option value="1" selected="selected">Active</option>
                                  <option  value="0">Draft</option>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center mt-3 mb-3">
                          <button class="btn btn-primary " type="submit">Save</button>
                        </div>
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