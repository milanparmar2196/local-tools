

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
              <li class="breadcrumb-item active"><a href="<?= base_url('admin/category') ?>">Categories</a></li>
              <li class="breadcrumb-item active">Create Category</li>
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
                <h2 class="card-title">Create Categories</h2>
                
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
              <ul class="nav nav-tabs flex justify-content-center border-0 admin-tabs">
                <li><a data-toggle="tab" href="#Category"  class="active">Category</a></li>
                <li><a data-toggle="tab" href="#Category-sub">Sub Category</a></li>
              </ul>

              <div class="tab-content admin-tab-content" >
                
                <div id="Category" class="tab-pane fade in active show">
                  <form method="post" action="<?php base_url('/admin/category/create'); ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 float-left">
                            <div class="form-group form-default">
                              <label class="float-label">Name</label>
                              <input type="text" name="name" class="form-control" required="" value="">
                              <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-6 float-left">
                            <div class="form-group form-default">
                                <label class="float-label">Status</label>
                                <select class="form-control" name="is_active">
                                  <option selected="selected" value="1">Active</option>
                                  <option  value="2">Draft</option>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-default">
                                <label class="float-label">Add Icon</label>
                                <input class="form-control" type="file" name="icon" placeholder="Choose an image" required="">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center mt-3 mb-3">
                          <button class="btn btn-primary " type="submit">Save</button>
                        </div>
                                    
                    </div>
                  </form>
                </div>
                <div id="Category-sub" class="tab-pane fade">
                <form method="post" action="<?= base_url(); ?>/admin/category/create-sub-category" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4 float-left">
                            <div class="form-group form-default">
                              <label class="float-label">Parent Category</label>
                              <select name="parent_id" class="form-control" required="">
                                <option value="" selected>Select Category</option>
                                <?php 
                                  foreach($parent_category as $parent_category)
                                  { ?>
                                    <option value="<?php echo $parent_category['id'];?>" > 
                                    <?php echo $parent_category['name'];?></option>
                                 <?php }
                                ?>
                              </select>
                              <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-4 float-left">
                            <div class="form-group form-default">
                                <label class="float-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="abc xyz">
                                
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-4 float-left">
                            <div class="form-group form-default">
                                <label class="float-label">Status</label>
                                <select class="form-control" name="is_active">
                                  <option selected="selected" value="1">Active</option>
                                  <option  value="2">Draft</option>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>

                        <div class="col-sm-12 text-center mt-3 mb-3">
                          <button class="btn btn-primary " type="submit">Save</button>
                        </div>
                                    
                    </div>
                  </form>
                </div>
              </div>
              
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