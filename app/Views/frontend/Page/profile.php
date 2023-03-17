<?php echo $this->render('include/header'); ?>
    <?php echo $this->render('include/navbar'); ?>
      <div class="main">
        <!-- Mobile Menu -->
        <?php echo $this->render('include/m-sidebar'); ?>
        
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
					<form>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">User name</label>
						<input type="text" class="form-control" placeholder="Design" value="<?= $user_data['email']; ?>">
					  </div>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">Name</label>
						<input type="text" class="form-control" placeholder="Name" value="<?= $user_data['first_name']; ?>">
					  </div>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">Email</label>
						<input type="email" class="form-control" placeholder="Email" value="<?= $user_data['email']; ?>">
					  </div>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">Mobile No.</label>
						<input type="number" class="form-control" placeholder="Mobile No." value="<?= $user_data['phone']; ?>">
					  </div>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">City</label>
						<input type="text" class="form-control" placeholder="City" value="<?= $user_data['city']; ?>">
					  </div>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">Zip Code</label>
						<input type="text" class="form-control" placeholder="Zip Code" value="<?= $user_data['zipcode']; ?>">
					  </div>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">State</label>
						<input type="text" class="form-control" placeholder="State" value="<?= $user_data['state']; ?>">
					  </div>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">Country</label>
						<input type="text" class="form-control" placeholder="Country" value="<?php
                        
                        //$user_data['country'];
                        foreach($country_data as $country) {
                            if($country['id'] == $user_data['country'])
                            {
                                echo $country['name'];
                            }
                        }
                        ?>
                        
                        
                        ">
					  </div>
					  <div class="formfield btnset">
						<a href="#" class="bgblack whitecolor bgblackbtn">Save Changes</a>
					  </div>
					  <div class="formfield btnsetcancel">
						<a href="#" class="checkbtn boredrbtn">Cancel</a>
					  </div>
					 
					</form>
				</div>
			</div><?php 
            }; ?>
            





        </div>
      </div>
<?php echo $this->render('include/footer'); ?>
