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
			<li><a href="#" class="greycolor"> Manage Profile</a></li>
		</ul>
		</div>
            <?php foreach ($user_data as $user_data){ ?>
				<div class="bgwhite clprofilemain">
					<div class="clientleft">
						<img src="<?= base_url();?>/public/uploads/<?= $user_data['image']; ?>" class="profilec">
						<a href="#"><img src="<?= base_url();?>/public/image/edit.png" class="edits"></a>
					</div>
					<div class="clientright">
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
						?>
						<form action="<?=base_url();?>/buyer/update-profile" method="post" enctype="multipart/form">
							<div class="formfield">
								<label for="exampleInputEmail1" class="form-label">First name</label>
								<input type="text" class="form-control" placeholder="Design" name="first_name" value="<?= $user_data['first_name']; ?>">
							</div>
							<div class="formfield">
								<label for="exampleInputEmail1" class="form-label">Last Name</label>
								<input type="text" class="form-control" placeholder="Name" name="last_name" value="<?= $user_data['last_name']; ?>">
							</div>
							<div class="formfield">
								<label for="exampleInputEmail1" class="form-label">Email</label>
								<input type="email" class="form-control" placeholder="Email" value="<?= $user_data['email']; ?>" disabled>
							</div>
							<div class="formfield">
								<label for="exampleInputEmail1" class="form-label">Mobile No.</label>
								<input type="number" class="form-control" placeholder="Mobile No." name="phone" value="<?= $user_data['phone']; ?>" require>
							</div>
							<div class="formfield">
								<label for="exampleInputEmail1" class="form-label">City</label>
								<input type="text" class="form-control" placeholder="City" name="city" value="<?= $user_data['city']; ?>">
							</div>
							<div class="formfield">
								<label for="exampleInputEmail1" class="form-label">Zip Code</label>
								<input type="text" class="form-control" placeholder="Zip Code" name="zipcode" value="<?= $user_data['zipcode']; ?>">
							</div>
							<div class="formfield">
								<label for="exampleInputEmail1" class="form-label">State</label>
								<input type="text" class="form-control" placeholder="State" name="state" value="<?= $user_data['state']; ?>">
							</div>
							<div class="formfield">
								<label for="exampleInputEmail1" class="form-label">Country</label>

								<select class="form-control" name="country">
									<?php 
										
										foreach($country_data as $country) {

											?>
											<option value="<?= $country["id"]; ?>"
											<?php 
												if($country['id'] == $user_data['country'])
												{
													echo 'selected=""';
												}
											?>
											
											><?= $country["name"]; ?></option>
											
										<?php
										}
										
									?>
									?>
									
								</select>

								
							</div>
							<div class="formfield btnset">
								<input type="hidden" name="id" value="<?php echo $user_data['id']?>" />
								<button type="submit"  class="bgblack whitecolor bgblackbtn">Save Changes</button>
							</div>
							<div class="formfield btnsetcancel">
								<a href="#" class="checkbtn boredrbtn">Cancel</a>
							</div>
						
						</form>
					</div>
				</div>
			<?php 
            	}; 
			?>
            





        </div>
      </div>
<?php echo $this->render('include/footer'); ?>
