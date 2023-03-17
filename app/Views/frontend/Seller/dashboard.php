<?php echo $this->render('include/header'); ?>
    <?php echo $this->render('include/navbar'); ?>
      <div class="main">
        <!-- Mobile Menu -->
        <?php echo $this->render('include/m-sidebar'); ?>
        <?php //print_r($parent_category);
        
        foreach($parent_category as $user_data)
        {
            
        
        ?>

        <div class="main-section">
            <div class="row">
            <div class="col-md-12">
            <h4 class="businesstitle">Business Profile <span class="greycolor">/ <?php echo $user_data['first_name'].' '.$user_data['last_name']; ?></span></h4>
            </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                <div class=" businessprofile mb-3">
                <div class="bprofile">
                
                <img src="../public/uploads/<?php echo $user_data['image']; ?>" class="adminimg">
                
                <h4><?php echo $user_data['first_name'].' '.$user_data['last_name']; ?></h4>
                </div>
                <ul class="profileicon">
                <li> <a href="mailto:<?= $user_data['email']; ?>"> <img src="<?=base_url();?>/public/image/email.png"><?php echo $user_data['email']; ?> </a> </li>
                <li> <a href="tell:<?= $user_data['phone']; ?>"> <img src="<?=base_url();?>/public/image/call.png"><?= $user_data['phone']; ?> </a></li>
                <li> <a href="#"> <img src="<?=base_url();?>/public/image/location.png"> 
                <?php 
                    foreach($country_data as $country) {
                        if($country['id'] == $user_data['country'])
                        {
                            echo $country['name'];
                        }
                    }
                    ?>
                 </a></li>
                </ul>
                <a href="<?= base_url(); ?>/seller/manage-profile" class="profileme">Manager Profile</a>
                </div>
                </div>
                <div class="col-md-9">
                <div class="grid-view">
                    <div class="productbox">
                        <figure>
                            <img src="<?=base_url();?>/public/images/products/garden-tools.png">
                        </figure>
                        <label>Garden Tools</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Garden Tools</h4>
                            <span>$1/Day</span>
                        </div>
                        <div class="d-flex starloc">
                        <label><i class="bi bi-geo-alt"></i> George Colony California</label>
                        <span>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        </span>
                        </div>
                    </div>

                    <div class="productbox">
                        <figure>
                            <img src="<?=base_url();?>/public/images/products/kfz.png">
                        </figure>
                        <label>KFZ Tools</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>KFZ Tools</h4>
                            <span>$1/Day</span>
                        </div>
                        <div class="d-flex starloc">
                        <label><i class="bi bi-geo-alt"></i> George Colony California</label>
                        <span>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        </span>
                        </div>
                    </div>

                    <div class="productbox">
                        <figure>
                            <img src="<?=base_url();?>/public/images/products/cordless.png">
                        </figure>
                        <label>Cordless Device</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Cordless Device 2.0</h4>
                            <span>$1/Day</span>
                        </div>
                    <div class="d-flex starloc">
                        <label><i class="bi bi-geo-alt"></i> George Colony California</label>
                        <span>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        </span>
                        </div>
                    </div>

                    <div class="productbox">
                        <figure>
                            <img src="images/products/zigma.png">
                        </figure>
                        <label>Loader & Shutter</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Zigma Loader & Shutter</h4>
                            <span>$1/Day</span>
                        </div>
                    <div class="d-flex starloc">
                        <label><i class="bi bi-geo-alt"></i> George Colony California</label>
                        <span>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        </span>
                        </div>
                    </div>

                    <div class="productbox">
                        <figure>
                            <img src="<?=base_url();?>/public/images/products/tata.png">
                        </figure>
                        <label>Construction Machinery</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>TATA Construction Machinery</h4>
                            <span>$1/Day</span>
                        </div>
                    <div class="d-flex starloc">
                        <label><i class="bi bi-geo-alt"></i> George Colony California</label>
                        <span>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        </span>
                        </div>
                    </div>

                    <div class="productbox">
                        <figure>
                            <img src="<?=base_url();?>/public/images/products/kfz.png">
                        </figure>
                        <label>Drill Concrete</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Morgan Drill Concrete</h4>
                            <span>$1/Day</span>
                        </div>
                    <div class="d-flex starloc">
                        <label><i class="bi bi-geo-alt"></i> George Colony California</label>
                        <span>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star yellowcolor" aria-hidden="true"></i></a>
                        </span>
                        </div>
                    </div>                  
                    
                </div>
                </div>
            </div>
            




        </div>
        <?php } ?>
      </div>
<?php echo $this->render('include/footer'); ?>
