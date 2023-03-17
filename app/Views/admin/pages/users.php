

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
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">User Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="50">#</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Registered</th>
                  <th>Role</th>
                  <th>Product</th>
                  <th>Phone</th>
                  <th>Is Active?</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    if($user_data)
                    {
                        $i = 1;
                        foreach($user_data as $user)
                        {
                            ?>
                            <tr>
                                <td><?php echo $i++ ;?></td>
                                <td><img class="img-responsive img-circle" src="../public/uploads/<?php echo $user['image']; ?>" width="40px"></td>
                                <td><?php echo $user["first_name"].' '.$user["last_name"] ;?></td>
                                <td><?= $user['created_at'] ?></td>
                                <td>
                                    <?php 
                                        if($user["customer_type"] == 1)
                                        {
                                            echo 'Seller';
                                        }
                                        elseif($user["customer_type"] == 2){
                                            echo 'Buyer';
                                        }else{
                                            echo '&nbsp';
                                        }
                                        
                                    ?>
                                </td>
                                <td><?php echo $user["email"] ;?></td>
                                <td><?php echo $user["phone"] ;?></td>
                                <td>
                                    <?php 
                                    if($user['is_active'] == 1)
                                    {
                                        echo '
                                        <a href="#" class="text-decoration-none update_state" data-value="0" 
                                        data-id="'.$user["id"].'">
                                            <i class="fa fa-check text-success"></i>
                                        </a>
                                        ';
                                    }else{
                                        echo '
                                        <a href="#" class="text-decoration-none update_state" data-value="1" data-id="'.$user["id"].'">
                                        <i class="fa fa-times text-danger"></i>
                                    </a>
                                        ';
                                    }
                                    
                                    ?>
                                </td>
                                <td><a href="<?= base_url(); ?>/admin/users/<?php echo $user['id'] ;?>">Show</a></td>
                            </tr
                           <?php 
                            ;
                        }
                    }

                    ?>
                </tbody>
                
              </table>
                <?php 

                    if($pagination_link){
                        echo $pagination_link->links('default_head');
                    }

                ?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
<style>
    .pagination{
        margin: 30px 0 0;
    justify-content: end;
    }
  .pagination li a
  {
    position: relative;
    display: block;
    padding: .5rem .75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #007bff;
    background-color: #fff;
    border: 1px solid #dee2e6;
  }

  .pagination li.active a {
    z-index: 1;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
  }
</style>
<!-- Modal Delete Product-->
<form action="<?= base_url(); ?>/admin/update_status" method="post">
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