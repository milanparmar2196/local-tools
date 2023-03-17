<?php echo $this->render('include/header'); ?>
    <?php echo $this->render('include/navbar'); ?>
      <div class="main">
        <!-- Mobile Menu -->
        <?php echo $this->render('include/m-sidebar'); ?>
        <?php echo $this->render('include/buyer-account-menu'); ?>
        <div class="main-section">
		<div class="w-100 mangeprofiles">
		<ul class="breadcrumb w-100">
			<li><a href="<?= base_url(); ?>"> Home</a> / </li>
			<li><a href="#" class="greycolor"> Manage Profile / Change Password</a></li>
		</ul>
		</div>
        <div class="bgwhite clprofilemain ">
				<div class="clientright passwordmain">
                <?php if(isset($validation)):?>
						<div class="alert alert-warning">
						<?= $validate->listErrors() ?>
						</div>
						<?php endif; 
						
						if(session()->getFlashdata('status')){
							echo '<div class="alert alert-success mt-2 mb-2">';
							echo '<h6>'.session()->getFlashdata("status").'</h6>';
							echo '</div>';
						}
                        if(session()->getFlashdata('error')){
							echo '<div class="alert alert-danger mt-2 mb-2">';
							echo '<h6>'.session()->getFlashdata("error").'</h6>';
							echo '</div>';
						}
						?>
					<form method="post" action="<?= base_url();?>/buyer/update-password" enctype="multipart/form-data">
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">Old Password</label>
						<input type="password" class="form-control" placeholder="Design" name="old_password" required="required">
					  </div>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">New Password</label>
						<input type="password" class="form-control" placeholder="123456" name="password" required="required">
					  </div>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">Confirm New Password</label>
						<input type="password" class="form-control" placeholder="Confirm New Password" name="confirmpassword" required="required" >
					  </div>
						<div class="d-flex savepass">
					  <div class="formfield btnset">
						<button type="submit" class="bgblack whitecolor bgblackbtn">Save Password</button>
					  </div>
					  <div class="formfield btnsetcancel">
						<a href="#" class="checkbtn boredrbtn">Cancel</a>
					  </div>
					 </div>
					</form>
				</div>
			</div>

        </div>
      </div>
<?php echo $this->render('include/footer'); ?>
