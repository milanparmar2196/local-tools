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
					<form method="POST" id="paidpayments" action="<?= base_url()."/addnewbank"?>">
						<input type="hidden" name="type" value="<?= $type;?>"> 
						<input type="hidden" name="id" value='<?php if($type=="edit"){ echo base64_encode($accounts['id']);} ?>'> 
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">Account Holder Name</label>
						<input type="text" class="form-control" placeholder="Account Holder Name" id="accounth" name="accounth" value='<?php if($type=="edit"){ echo $accounts['accountH'];} ?>'>
					  </div>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">Bank Name</label>
						<input type="text" class="form-control" placeholder="Name" id="bankn" name="bankn" value='<?php if($type=="edit"){ echo $accounts['bankN'];} ?>'>
					  </div>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">Account Number</label>
						<input type="Text" class="form-control" placeholder="Account Number" id="accountn" name="accountn" value='<?php if($type=="edit"){ echo $accounts['accountN'];} ?>'>
					  </div>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">Confirm Account Number</label>
						<input type="password" class="form-control" placeholder="131435446" id="accountc" name="accountc" value='<?php if($type=="edit"){ echo $accounts['accountN'];} ?>'>
					  </div>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">IFSC Code</label>
						<input type="text" class="form-control" placeholder="BGHF1234" id="ifsc" name="ifsc" value='<?php if($type=="edit"){ echo $accounts['ifsc'];} ?>'>
					  </div>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">Account Type</label>
						<input type="text" class="form-control" placeholder="Saving" id="accountt" name="accountt" value='<?php if($type=="edit"){ echo $accounts['accountT'];} ?>'>
					  </div>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">City</label>
						<input type="text" class="form-control" placeholder="City" id="city" name="city" value='<?php if($type=="edit"){ echo $accounts['city'];} ?>'>
					  </div>
					  <div class="formfield">
						<label for="exampleInputEmail1" class="form-label">Zip Code</label>
						<input type="text" class="form-control" placeholder="Zip Code" id="zipcode" name="zipcode" value='<?php if($type=="edit"){ echo $accounts['zipcode'];} ?>'>
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
					accounth: {
						required: true
					},
					bankn: {
						required: true,						
					},
					accountn: {
						required: true,						
					},
					accountc: {
						required: true,
						equalTo :'#accountn'
					},
					ifsc: {
						required: true,
					},
					accountt: {
						required: true,
					},
					city: {
						required: true,
					},
					zipcode: {
						required: true,
					}					
				},
				messages: {
					accounth: {
						required: "Please Enter Account Holder Name",
					},
					bankn: {
						required: "Please Enter Bank Name",						
					},
					accountn: {
						required: "Please Enter Account Number",
						
					},
					accountc: {
						required: "Please Enter Account Number Again",	
						equalTo :"Account Number and confirm account number does not match",						
					},
					ifsc: {
						required: "Please Enter IFSC Code",
					},
					accountt: {
						required: "Please Enter Account Type",
					},
					city: {
						required: "Please Enter City",
					},
					zipcode: {
						required: "Please Enter Zipcode",
					}
				}
			});
	   });
</script>
<?php echo $this->render('include/footer'); ?>

