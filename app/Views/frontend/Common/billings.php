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
			<li><a href="#" class="greycolor"> Manage Profile / Payments</a></li>
		</ul>
		</div>
            <div class="selleraccount">
				<?php echo $this->render('frontend/Common/payment-tab-addpage'); ?>
				<?php echo $this->render('include/messages.php'); ?>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade active show" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
					 <h4 class="tabtitle">Add Bank Account</h4>
					<div class="bgwhite clprofilemain">
				<div class="clientright" style="width: 100%;max-width: 80%;margin: auto;float: none;">
					<form method="POST" id="paidpayments" action="<?= base_url()."/addbilling"?>">
						<input type="hidden" name="type" value="<?= $type;?>"> 
						<input type="hidden" name="id" value='<?php if($type=="edit"){ echo base64_encode($billings['id']);} ?>'> 
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">Card Holder Name</label>
						<input type="text" class="form-control" placeholder="Card Holder Name" id="holderN" name="holderN" value='<?php if($type=="edit"){ echo $billings['holderN'];} ?>'>
					  </div>
					 
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">Card Number</label>
						<input type="Text" class="form-control" placeholder="Card Number" id="cardN" name="cardN" value='<?php if($type=="edit"){ echo $billings['cardN'];} ?>'>
					  </div>
					   <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">Expires On</label>
						<input type="text" class="form-control" placeholder="MM/YY" id="expire" name="expire" value='<?php if($type=="edit"){ echo $billings['expire'];} ?>'>
					  </div>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">Security Code</label>
						<input type="text" class="form-control" placeholder="Security Code" id="code" name="code" value='<?php if($type=="edit"){ echo $billings['code'];} ?>'>
					  </div>					 
					 
					  <div class="formfield btnset">
						<button type="submit" class="bgblack whitecolor bgblackbtn text-center" id="btn-save">Save</a>
					  </div>
					  <div class="formfield btnsetcancel">
						<a class="checkbtn boredrbtn" href="<?= base_url()."/payments"?>">Cancel</a>
					  </div>
					 
					</form>
				</div>
			</div>
				  </div>
			
				  
				</div>
			</div>

        </div>
      </div>
	  <script>
       $(document).ready(function() {
			$("#paidpayments").validate({
				rules: {
					holderN: {
						required: true
					},
					cardN: {
						required: true,						
					},
					expire: {
						required: true,						
					},
					code: {
						required: true,
					}									
				},
				messages: {
					holderN: {
						required: "Please Enter Card Holder Name",
					},
					cardN: {
						required: "Please Enter Card Number",						
					},
					expire: {
						required: "Please Enter Expiry MM/YY",
						
					},					
					code: {
						required: "Please Enter Security Code",
					}
				}
			});
	   });
</script>
<?php echo $this->render('include/footer'); ?>

