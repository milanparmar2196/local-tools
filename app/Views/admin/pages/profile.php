

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
            <h3>User/ <?= $user_data['first_name'].' '.$user_data['last_name'] ?> </h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?= base_url('admin/users') ?>">Users</a></li>
              <li class="breadcrumb-item active"><a href="#"><?php echo $user_data['first_name'].' '.$user_data['last_name']; ?></a></li>
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

          <div class="col-xs-12 col-sm-4">
            <div class="card">
                <div class="card-body">
                  <div class="profile-n text-center">
                    <img class="img-fluid img-circle" src="<?= base_url(); ?>/public/uploads/<?= $user_data['image'] ?>" />
                    <h4><?= $user_data['first_name'].' '.$user_data['last_name'] ?></h4>
                  </div>
                  <div class="user-data">
                    <div class="data-list">
                      <span style="margin-right:15px;"><i class="fa fa-thin fa-envelope"></i></span>
                      <span> <?= $user_data['email']; ?> </span>
                    </div>
                    <div class="data-list">
                      <span style="margin-right:15px;"><i class="fas fa-solid fa-phone"></i></span>
                      <span> <?= $user_data['phone']; ?> </span>
                    </div>
                    <div class="data-list">
                      <span style="margin-right:15px;"><i class=" fa fa-map-marker"></i></span>
                      <span> 
                        <?php 
                          $country = $user_data['country'];
                          $db = db_connect();
                          
                          $query = $db->query("SELECT * FROM tbl_countries WHERE id = $country");
                          $row   = $query->getRowArray();
                          if (isset($row)) {
                            echo $row['name'];
                        }
                          
                        ?>
                      </span>
                    </div>
                  </div>
                </div>
            </div>
            <h3>Business Details</h3>
            <div class="card">
                <div class="card-body">
                  
                  <div class="user-data">
                    <div class="data-list">
                      <span style="margin-right:15px;"><i class="fa fa-thin fa-envelope"></i></span>
                      <span> <?= $user_data['email']; ?> </span>
                    </div>
                    <div class="data-list">
                      <span style="margin-right:15px;"><i class="fas fa-solid fa-phone"></i></span>
                      <span> <?= $user_data['phone']; ?> </span>
                    </div>
                    <div class="data-list">
                      <span style="margin-right:15px;"><i class=" fa fa-map-marker"></i></span>
                      <span> 
                        <?php 
                          $country = $user_data['country'];
                          $db = db_connect();
                          
                          $query = $db->query("SELECT * FROM tbl_countries WHERE id = $country");
                          $row   = $query->getRowArray();
                          if (isset($row)) {
                            echo $row['name'];
                        }
                          
                        ?>
                      </span>
                    </div>
                  </div>
                </div>
            </div>
            <h3>Billing Details</h3>
            <div class="card">
                <div class="card-body">
                  
                  <div class="user-data">
                    <div class="data-list">
                     <p>Bank</p>
                      
                    </div>
                    <div class="data-list">
                      <p>Account Number</p>
                    </div>
                    <div class="data-list">
                      <p>IFSC</p>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-8">
            <div class="row">
              <div class="col-xs-12">
                <ul class=" user-tabs flex justify-content-start">
                  <li><a href="#" class="active">Products</a></li>
                  <li><a href="#">Booking</a></li>
                  <li><a href="#">Invoice</a></li>
                </ul>
              </div>
              <div class="col-md-12 mt-5">
                <div class="card">
                  <div class="card-header p-2">
                    <h2 class="card-title">Orders</h2>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    
                  </div><!-- /.card-body -->
                </div>
              <!-- /.nav-tabs-custom -->
              </div>
            </div>
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

<!-- Modal Delete Product-->
<form action="/admin/update_status" method="post">
        <div class="modal fade" id="change_status_Modal" tabindex="-1" role="dialog" aria-labelledby="change_status_Modal" aria-hidden="true">
        <div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>						
				<h4 class="modal-title w-100">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to update these record status? This process cannot be undone.</p>
                <input type="hidden" name="id" class="id" />
                <input type="hidden" name="is_active" class="is_active" />
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger">OK</button>
			</div>
		</div>
	</div>
        </div>
    </form>
    <!-- End Modal Delete Product-->
<script>
    $(document).ready(function(){

        // get update status
        $('.update_state').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const value = $(this).data('value');
            // Set data to Form Edit
            $('.id').val(id);
            $('.is_active').val(value);
            $('#change_status_Modal').modal('show');
        });
         
    });
</script>
<?php echo view('admin/includes/footer'); ?>