<div class="sidebar clientpset">
			<div class="w-100 mb-3">
				<a href="<?= base_url(); ?>/seller/profile" class="bgblack whitecolor bgblackbtn w-100 text-center">My Account</a>
			</div>
             <ul>
				<li <?php if($title == 'Profile Information') { echo 'class="active" ';} ?> > <a href="<?= base_url(); ?>/seller/manage-profile">
					<img src="<?= base_url(); ?>/public/image/01.png" class="dimg"> 
					<img src="<?= base_url(); ?>/public/image/01w.png" class="himg"> Profile Information</a>
				</li>
                <li <?php if($title == 'Change Password') { echo 'class="active" ';} ?>><a href="<?= base_url(); ?>/seller/change-password"><img src="<?= base_url(); ?>/public/image/02.svg" class="dimg"> <img src="<?= base_url(); ?>/public/image/02.png" class="himg">Change Password </a></li>
                
                <li <?php if($title == 'Document') { echo 'class="active" ';} ?>><a href="<?= base_url(); ?>/seller/document"><img src="<?= base_url(); ?>/public/image/03.svg" class="dimg"><img src="<?= base_url(); ?>/public/image/03.png" class="himg">Documents</a></li>
                <li <?php if($title == 'Seller Account') { echo 'class="active" ';} ?>><a href="<?= base_url(); ?>/seller/seller-account"><img src="<?= base_url(); ?>/public/image/04.svg" class="dimg"><img src="<?= base_url(); ?>/public/image/listing.png" class="himg">Seller Account</a></li>
                <!--<li <?php if($title == 'Buyer Account') { echo 'class="active" ';} ?>><a href="<?= base_url(); ?>/seller/buyer-account"><img src="<?= base_url(); ?>/public/image/05.svg">Buyer Account</a></li>-->
                 <li <?php if($title == 'Payments') { echo 'class="active" ';} ?>><a href="<?= base_url(); ?>/payments"><img src="<?= base_url(); ?>/public/image/06.svg">Payments</a></li>
                <li <?php if($title == 'Notifications') { echo 'class="active" ';} ?>><a href="<?= base_url(); ?>/notification"><img src="<?= base_url(); ?>/public/image/07.svg">Notifications</a></li>
                <li <?php if($title == 'Log Out') { echo 'class="active" ';} ?>><a href="<?= base_url(); ?>/logout"><img src="<?= base_url(); ?>/public/image/08.svg">Log Out </a></li>
            </ul>
        </div>