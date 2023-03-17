<?php echo $this->render('include/header'); ?>
<?php echo $this->render('include/navbar'); ?>
<style>
    .main-section{
        width: 80%;
    }
    .productbox img{
         width: 100%;
        height: 225px; 
    }
</style>
<div class="main">
   <!-- Mobile Menu -->
   <?php echo $this->render('include/m-sidebar'); ?>
   <!---------main Sidebar--------------->
   <?php echo $this->render('include/sidebar'); ?>
   <div class="main-section">
      <div class="bg-yellow">
         <h4 class="slick-heading">Highlight</h4>
         <div class="regular slider d-flex">
            <?php 
                foreach($highlightplans_ads as $highlightplans_ads){   
            ?>
                <div class="productbox">
                    <div class="sale-ribbon" style="display: none">
                        <span>Sale</span>
                    </div>
                    <div class="like-btn" style="display: none">
                        <i class="bi bi-heart-fill"></i>
                    </div>
                    <figure>
                        <?php
                         $PostGalleryresult = array();
                         $NPostGalleryresult = array();
                         $counter = 0;
                         $noimg = 0;
                         $npost_ads_gallery = $post_ads_gallery;
                         foreach($post_ads_gallery as $value)
                         {
                            $PostGalleryresult = array_merge($PostGalleryresult, $value);
                            
                            
                            if($PostGalleryresult['post_id'] == $highlightplans_ads['id']){
                                if($PostGalleryresult != '' && $PostGalleryresult <= 1)
                                {
                                    
                                    echo '<a href="'.base_url().'/product/'.$highlightplans_ads['id'].'"> <img class="is_lessthen" src="'.base_url().'/public/uploads/seller-products/'.$PostGalleryresult['image_name'].'"></a> ';
                                }
                                
                                elseif($PostGalleryresult >1){
                                    
                                    if($counter == 0)
                                    {
                                        echo '<a href="'.base_url().'/product/'.$highlightplans_ads['id'].'"> <img class="is_greaterthen" src="'.base_url().'/public/uploads/seller-products/'.$PostGalleryresult['image_name'].'"></a> ';
                                    }
                                    $counter = $counter + 1;
                                    

                                }
                                
                            }
                            
                         }        
                         
                        ?>
                    </figure>
                    <?php 
                        $categorydata = array();
                        foreach($categorydetails as $value){
                            $categorydata = array_merge($categorydata, $value);
                            
                            if($categorydata['id'] == $highlightplans_ads['category_id'])
                        
                            {
                                echo "<label>".$categorydata['name']."</label>" ;
                            }

                        }
                    
                    ?>
                
                    <div class="d-flex justify-content-between align-items-center">
                    <a href="<?= base_url(); ?>/product/<?=$highlightplans_ads['id']?>"> <h4><?= $highlightplans_ads['title'] ?></h4></a>
                        <span>$<?= $highlightplans_ads['amount'].'/'.$highlightplans_ads['duration'] ?></span>
                    </div>
                    <label><i class="bi bi-geo-alt"></i><?php
                        echo $highlightplans_ads['city_name'].','. $highlightplans_ads['state_name'].','.$highlightplans_ads['country_name'];
                    ?> </label>
                </div>
            <?php } ?>
           

         </div>
      </div>
      <div class="grid-view">

         <?php 
                foreach($adds_list_random as $adds_list_random){   
            ?>
                <div class="productbox">
                    <div class="sale-ribbon" style="display: none">
                        <span>Sale</span>
                    </div>
                    <div class="like-btn" style="display: none">
                        <i class="bi bi-heart-fill"></i>
                    </div>
                    <figure>
                    <?php
                         $PostGalleryresult = array();
                         $counter = 0;
                         $noimg = 0;
                         foreach($post_ads_gallery as $value)
                         {
                            $PostGalleryresult = array_merge($PostGalleryresult, $value);
                            
                            
                            if($PostGalleryresult['post_id'] == $adds_list_random['id']){
                                if($PostGalleryresult != '' && $PostGalleryresult <= 1)
                                {
                                    
                                    echo '<a href="'.base_url().'/product/'.$adds_list_random['id'].'"> <img class="is_lessthen" src="'.base_url().'/public/uploads/seller-products/'.$PostGalleryresult['image_name'].'"></a> ';
                                }
                                
                                elseif($PostGalleryresult >1){
                                    
                                    if($counter == 0)
                                    {
                                        echo '<a href="'.base_url().'/product/'.$adds_list_random['id'].'"> <img class="is_greaterthen" src="'.base_url().'/public/uploads/seller-products/'.$PostGalleryresult['image_name'].'"></a> ';
                                    }
                                    $counter = $counter + 1;
                                    

                                }
                                
                            }
                            
                         }        
                         
                        ?>
                    </figure>
                    <?php 
                        $categorydata = array();
                        foreach($categorydetails as $value){
                            $categorydata = array_merge($categorydata, $value);
                            
                            if($adds_list_random['id'] == $adds_list_random['category_id'])
                        
                            {
                                echo "<label>".$categorydata['name']."</label>" ;
                            }

                        }
                    
                    ?>
                
                    <div class="d-flex justify-content-between align-items-center">
                    <a href="<?= base_url(); ?>/product/<?=$adds_list_random['id']?>"> <h4><?= $adds_list_random['title'] ?></h4></a>
                        <span>$<?= $adds_list_random['amount'].'/'.$adds_list_random['duration'] ?></span>
                    </div>
                    <label><i class="bi bi-geo-alt"></i><?php
                        echo $adds_list_random['city_name'].','. $adds_list_random['state_name'].','.$adds_list_random['country_name'];
                    ?> </label>
                </div>
            <?php } ?>
         
      </div>
      <div class="d-flex justify-content-center mt-4 mb-4">
        <input type="hidden" name="limit" id="limit" value="10"/>
        <input type="hidden" name="offset" id="offset" value="20"/>
         <button  id="load_more_products" class="btn btn-loadmore">Load More</button>
      </div>
      <!--- Yellow Footer --->
      <div class="yellow-footer">
         <div class="logo">
            <figure>
               <img src="<?php echo base_url(); ?>/public/images/why-logo.png">
            </figure>
         </div>
         <div class="btn-area">
            <button class="btn btn-knowmore">Know More</button>
         </div>
         <div class="free-shipping text-center">
            <figure class="icon">
               <img src="<?php echo base_url(); ?>/public/images/icons/free-shipping.svg">                            
            </figure>
            <h5>Free Shipping</h5>
            <p>Free delivery for all orders</p>
         </div>
         <div class="money text-center">
            <figure class="icon">
               <img src="<?php echo base_url(); ?>/public/images/icons/money.svg">                            
            </figure>
            <h5>Money Guarantee</h5>
            <p>30 days money back</p>
         </div>
         <div class="support text-center">
            <figure class="icon">
               <img src="<?php echo base_url(); ?>/public/images/icons/suppoort.svg">                           
            </figure>
            <h5>24/7 Support</h5>
            <p>Friendly 24/7 support</p>
         </div>
         <div class="secure-payment text-center">
            <figure class="icon">
               <img src="<?php echo base_url(); ?>/public/images/icons/payment.svg">                            
            </figure>
            <h5>Secure Payment</h5>
            <p>All cards accepted</p>
         </div>
      </div>
      <!--------------------->
   </div>
</div>


<?php echo $this->render('include/footer'); ?>