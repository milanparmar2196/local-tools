

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
              <li class="breadcrumb-item active">Update Category</li>
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
                <h2 class="card-title">Update Categories</h2>
                
              </div><!-- /.card-header -->
              <form role="form" action="<?=  base_url('/admin/category/update');?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">

                      <div class="col-md-4">
                          <div class="form-group form-default">
                            <label class="float-label">Name</label>
                            <input type="text" name="name" class="form-control" required="" value="<?php echo $category_data['name'];  ?>">
                            <span class="form-bar"></span>
                              
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group form-default">
                            <label class="float-label">Add Icon</label>
                              <input class="form-control" type="file" name="icon" placeholder="Choose an image" value="<?php echo $category_data['icon'] ?>">
                              <span class="form-bar"></span>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group form-default">
                              <label class="float-label">Status</label>
                              <select class="form-control" name="is_active">
                                <option value="1"
                                  <?php  
                                    if($category_data['is_active'] == 1)
                                    {
                                      echo 'selected=" "';
                                    }
                                  ?>
                                >Active</option>
                                <option value="0"
                                <?php  
                                    if($category_data['is_active'] == 0)
                                    {
                                      echo 'selected=" "';
                                    }
                                  ?>
                                >Draft</option>
                                <?php
                                ?>
                              </select>
                              <span class="form-bar"></span>
                          </div>
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                    <input type="hidden" name="id" value="<?= $category_data['id'] ?>" >
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
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