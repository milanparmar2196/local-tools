<?php echo $this->render('include/header'); ?>
    <?php echo $this->render('include/navbar'); ?>
      <div class="main">
        <!-- Mobile Menu -->
        <?php echo $this->render('include/m-sidebar'); ?>
        <?php echo $this->render('include/m-sidebar'); ?>
		<?php if (session()->get('customer_type') == "2"){?>
			<?php echo $this->render('include/buyer-account-menu'); ?>
		<?php }else{?>
			<?php echo $this->render('include/my-account-menu'); ?>
		<?php } ?>
        <div class="main-section">
		<div class="w-100 mangeprofiles">
		<ul class="breadcrumb w-100">
			<li><a href="<?= base_url(); ?>"> Home</a> / </li>
			<li><a href="#" class="greycolor"> Manage Profile / Payments</a></li>
		</ul>
		</div>
          <div class="selleraccount">
				<?php echo $this->render('frontend/Common/payments-tab'); ?>
				<?php echo $this->render('include/messages.php'); ?>
				<div class="tab-content" id="myTabContent">				
				  <div class="tab-pane fade active show" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
					 <h4 class="tabtitle">Bank Account</h4>
					<div class="bgwhite p-3">
					<div class="sellerbank">
						<div class="sellerbankinner">	
						<?php foreach($accounts as $v){?>						
						<div class="sellersearch mb-3" style="    border: 2px solid #E1E1E1;padding: 10px;border-radius: 5px;">
						<div class="d-flex tablemedia">
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
							  <label class="form-check-label d-flex ms-3" for="flexRadioDefault1">
								<div class="flex-shrink-0">
								<img src="<?= base_url();?>/public/image/bank.png" alt="m" style="width:35px;">
							  </div>
							  
							  <div class="tablemediatext">
								<h5><?= $v['bankN'];?> Bank</h5>
								<p><span class="greycolor">Checking ***<?= substr($v['accountN'], -3,);?></span></p>
							  </div>
							  </label>
							</div>
							</div>
						<a class="btn btn-post" href="<?= base_url().'/editpaidbank?id='.base64_encode($v['id']);?>">Edit</a>
					  </div>
						<?php } ?>
					  <div class="text-center">
					  <a href="<?= base_url();?>/addnewbank" class="bgblack whitecolor btn">Link New Bank Acount</a>
					  </div>
						</div>
					</div>
					</div>
				  </div>
				  
				  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
				  <h4 class="tabtitle">Manage Billing Methods</h4>
					<div class="bgwhite p-3">
					<div class="sellerbank">
						<div class="sellerbankinner">
						<?php foreach($billings as $m){?>
						<div class="sellersearch mb-3" style="    border: 2px solid #E1E1E1;padding: 10px;border-radius: 5px;">
						<div class="d-flex tablemedia">
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
							  <label class="form-check-label d-flex ms-3" for="flexRadioDefault1">
								<div class="flex-shrink-0">
								<img src="<?= base_url();?>/public/image/card.png" alt="m" style="width:35px;">
							  </div>
							  <div class="tablemediatext">
								<h5>Visa ending in <?= substr($m['cardN'],-4);?></h5>
							  </div>
							  </label>
							</div>
							</div>
						<a class="btn btn-post" href="<?= base_url().'/editbilling?id='.base64_encode($m['id']);?>">Edit</a>
					  </div>
					  <?php  }?>
					  <div class="text-center">
					  <a href="<?= base_url();?>/addbilling" class="bgblack whitecolor btn">Link New Card Account</a>
					  </div>	
						</div>
					</div>
					</div>
				  
				  </div>
				  
				</div>
			</div>

        </div>
      </div>
<?php echo $this->render('include/footer'); ?>
