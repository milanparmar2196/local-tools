<?php echo $this->render('include/header'); ?>
    <?php echo $this->render('include/navbar'); ?>
      <div class="main">
        <!-- Mobile Menu -->
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
			<li><a href="#" class="greycolor"> Manage Profile / Payments Notification</a></li>
		</ul>
		</div>
			<?php echo $this->render('include/messages.php'); ?>
             <div class="selleraccount">
		<h4 class="tabtitle">Notification</h4>
				<div class="bgwhite clprofilemain">
				<h4>Email</h4>
				<p class="greycolor">(sending to Abc******123@gmail.com)</p>
				<p class="greycolor">Send an email with unread activity for:</p>
				<div class="clientright" style="width: 100%;">
					<form class="mb-2" method="POST" action="<?= base_url().'/notification'?>">
						<input type="hidden" name="id"  value="<?php echo (isset($notifications['offline']))? $notifications['id']:0; ?>">
					  <div class="formfield">
						<div class="search-filter"  style="width: 100%;">
							<div class="search-area searchtable">
								<select class="form-select" style="background:#fff;color:#000;" name="activity">
									<option value="1" <?php if(isset($notifications['activity']) && $notifications['activity']==1){?>selected="" <?php }?>>All Activity</option>
									<option value="disable" <?php if(isset($notifications['activity']) && $notifications['activity']=="disable"){?>selected="" <?php }?>>Disable</option>
								</select>
								<i class="bi bi-chevron-down"></i>
							</div>
						</div>
					  </div>
					  <div class="formfield">
						<div class="search-filter"  style="width: 100%;">
							<div class="search-area searchtable">
								<select class="form-select" style="background:#fff;color:#000;" name="cron">
									<option value="15 Minutes" <?php if(isset($notifications['cron']) && $notifications['cron']=="15 Minutes"){?>selected="" <?php }?>>Every 15 Minutes</option>
									<option value="disable" <?php if(isset($notifications['cron']) && $notifications['cron']=="disable"){?>selected="" <?php }?>>Disable</option>
								</select>
								<i class="bi bi-chevron-down"></i>
							</div>
						</div>
					  </div>
					
					<div class="form-check mb-3">
					  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="offline" <?php if(isset($notifications['offline']) && $notifications['offline']==1){?>checked="" <?php }?>>
					  <label class="form-check-label" for="flexCheckDefault">
						Only send when offline or idle
					  </label>
					</div>
					 <div class="formfield btnset" style="justify-content: center;">
						<button type="submit" class="bgblack whitecolor bgblackbtn text-center">Save</a>
					  </div>
				  </form>
				</div>
			</div>
			</div>



        </div>
      </div>
<?php echo $this->render('include/footer'); ?>
