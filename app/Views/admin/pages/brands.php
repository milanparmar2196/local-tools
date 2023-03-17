

  <?php echo view('admin/includes/header'); ?>
  <?php echo view('admin/includes/navbar'); ?>
  <?php echo view('admin/includes/sidebar'); ?>
  <?php use App\Models\CategoryModel; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Brands</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
              <li class="breadcrumb-item active"><a href="#">Brands</a></li>
              <!-- <li class="breadcrumb-item active"><a href="#"><?php //echo $user_data['first_name'].' '.$user_data['last_name']; ?></a></li> -->
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
                <h2 class="card-title">Brands</h2>
                <div class="text-right">
                  <a href="<?= base_url('admin/brands/create') ?>" class="btn btn-primary">Add New</a>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="50">#</th>
                    <th>Brand name</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                    if($brands)
                    {
                        $i = 1;
                        foreach($brands as $brands)
                        { 
                            ?>
                            <tr>
                                <td><?php echo $i++ ;?></td>
                                <td><?php echo $brands["name"] ;?></td>
                                <td>
                                    <?php 
                                    if($brands['status'] == 1)
                                    {
                                        echo '
                                        <a href="#" class="text-decoration-none update_state" data-value="0" 
                                        data-id="'.$brands["id"].'">
                                            <i class="fa fa-check text-success"></i>
                                        </a>
                                        ';
                                    }else{
                                        echo '
                                        <a href="#" class="text-decoration-none update_state" data-value="1" data-id="'.$brands["id"].'">
                                        <i class="fa fa-times text-danger"></i>
                                    </a>
                                        ';
                                    }
                                    
                                    ?>
                                </td>
                                <td>
                                <a href="<?= base_url(); ?>/admin/brand/<?= $brands["id"] ?>/edit">Edit</a>
                                <span class="text-primary">&nbsp; | &nbsp;</span>
                                <a href="javascript:void(0);" class="delete_category" data-id="<?= $brands["id"]; ?>">Delete</a>
                                
                                </td>
                            </tr
                           <?php 
                            
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
              </div><!-- /.card-body -->
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

    <!-- Modal Update Category-->
      <form action="<?=base_URL();?>/admin/brands/update_status" method="post">
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
                        <input type="hidden" name="status" class="status" />
              </div>
              <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">OK</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    <!-- End Modal Update Category-->
    <!-- Modal Delete Category-->
    <form action="<?=base_URL();?>/admin/category/delete_brand" method="post">
        <div class="modal fade" id="delete_category_Modal" tabindex="-1" role="dialog" aria-labelledby="delete_category_Modal" aria-hidden="true">
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
                <p>Do you really want to DELETE these record? This process cannot be undone.</p>
                        <input type="hidden" name="id" class="id" />
              </div>
              <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">OK</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    <!-- End Modal Delete Category-->
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
<script>
    $(document).ready(function(){

        // get update status
        $('.update_state').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const value = $(this).data('value');
            // Set data to Form Edit
            $('.id').val(id);
            $('.status').val(value);
            $('#change_status_Modal').modal('show');
        });

         // get Delete Category
         $('.delete_category').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.id').val(id);
            $('#delete_category_Modal').modal('show');
        });
         
    });
</script>
<?php echo view('admin/includes/footer'); ?>