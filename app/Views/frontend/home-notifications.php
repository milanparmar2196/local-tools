<?php echo $this->render('include/header'); ?>
    <?php echo $this->render('include/navbar'); ?>
      <div class="main">
        <!-- Mobile Menu -->
        <?php echo $this->render('include/m-sidebar'); ?>
       
        
        <div class="main-section" style="min-height:330px;">
		<div class="w-100 mangeprofiles">
		<div class="d-flex">
		<a href="#" class="btn blackbg whitecolor" style="padding:5px 70px;">Notification</a>
		<ul class="breadcrumb w-100" style="margin-left:20px;">
		  <li><a href="#"> Home</a> / </li>
		  <li><a href="#" class="greycolor"> Notification</a></li>
		</ul>
		</div>
		</div>
		<?php if(!empty($notifications)){
			foreach($notifications as $v){
				if($v['notification-type']=="success"){
					$type="n3.png";
				}else if($v['notification-type']=="primary"){
					$type="n1.png";
				}else if($v['notification-type']=="warning"){
					$type="n2.png";
				}else if($v['notification-type']=="danger"){
					$type="n4.png";
				}
			
			?>
            <div class="bgwhite p-2 radius10 notificat-cart mb-3">
				<div class="text-center d-flex" style="border-left: 3px solid #4F52FF;padding-left: 5px; justify-content: space-between;align-items: center;">
					<div class="d-flex tablemedia">
					  <div class="flex-shrink-0">
						<img src="<?php base_url();?>public/image/<?= $type;?>" alt="m" style="width:35px;">
					  </div>
					  <div class="tablemediatext">
						<h5><?= $v['title'];?></h5>
						<p><span class="greycolor"><?= $v['details'];?></span></p>
					  </div>
					</div>
					<a href="<?= base_url().'/deletenotifications?msg='.base64_encode($v['id']);?>"><img src="<?php base_url();?>public/image/crose.png" style="width: 35px;"></a>
				</div>
			</div>
		<?php }}else{?>
		
		<?php }?>
			

        </div>
      </div>
	 

<?php echo $this->render('include/footer'); ?>
