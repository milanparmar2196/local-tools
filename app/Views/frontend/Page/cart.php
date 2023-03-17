<?php echo $this->render('include/header'); ?>
<?php echo $this->render('include/navbar'); ?>
<div class="main">
   <!-- Mobile Menu -->
   <?php echo $this->render('include/m-sidebar'); ?>
   <div class="main-section">
      <div class="w-100 mangeprofiles">
         <div class="d-flex">
            <a href="#" class="btn blackbg whitecolor" style="padding:5px 70px;">Cart</a>
            <ul class="breadcrumb w-100" style="margin-left:20px;">
               <li><a href="#"> Home</a> / </li>
               <li><a href="#">My Profile</a> / </li>
               <li><a href="notification.html" class="greycolor"> Cart</a></li>
            </ul>
         </div>
      </div>
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-9">
               <div class="tableresponsive carttable">
                  <table class="table">
                     <thead style="border-radius:20px; margin-bottom: 20px !important;">
                        <tr>
                           <th scope="col" style="; text-align:left;padding-left: 20px;">Product</th>
                           <th scope="col">Rent</th>
                           <th scope="col">Lease Period</th>
                           <th scope="col">Total Rent</th>
                           <th scope="col">Quantity</th>
                           <th scope="col"></th>
                           <th scope="col" style=";text-align:right;padding-right: 20px;"></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                            foreach($cart_data as $cart_data){
                                ?>
                            <tr>
                                <td>
                                    <div class="d-flex tablemedia">
                                        <div class="flex-shrink-0">
                                            <img src="<?= base_url(); ?>/public/uploads/seller-products/<?= $cart_data['image_name'] ?>" alt="m" style="width:45px;">
                                        </div>
                                        <div class="tablemediatext">
                                            <h5><?= $cart_data['title'] ?></h5>
                                            <p><span class="greycolor">Category</span> <?= $cart_data['category_name']; ?><span class="greycolor"> and</span> <?php 
                                            $All_category = array();
                                            foreach($sub_category as $sub_category_v)
                                            $All_category = array_merge($All_category, $sub_category_v) ;
                                             
                                            if($All_category['parent_id'] == $cart_data['category_id'])
                                            { echo $All_category['name']; }  ?> <br><span class="greycolor">City</span> <?= $cart_data['city_name'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>$<?= $cart_data['price'] ?>/<?= $cart_data['total_duration_tyoe'] ?></td>
                                <td>15 days<br><span class="greycolor">1st May to 15th May</span></td>
                                <td>$<?= $cart_data['total_price'] ?></td>
                                <td style="display: flex;"><span class="tabcircle greycircle">-</span> <span class="tabcircle blackcircle" style=" border-radius: 6px; margin: 0px 7px;">1</span> <span class="tabcircle blackcircle">+</span></td>
                                <td style=""> <span class=""><a href="#"><img src="<?= base_url(); ?>/public/image/heart.png" style="width: 30px;"></a></span></td>
                                <td style="text-align:right;"> <span class=""><a href="#"><img src="<?= base_url(); ?>/public/image/del.png" style="width: 20px;"></a></span></td>
                            </tr>
                            <?php
                            }
                        ?>
                        
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="col-md-3">
               <div class="bgwhite p-3 mb-3">
                  <p><b>John Doe</b></p>
                  <div class="sellersearch mb-3" style="    border: 1px solid #00005B;border-radius: 10px;">
                     <div class="s-search">
                        <i class="bi bi-geo-alt" style="top: 0px;left: 5px;position: relative;z-index: 99;"></i>
                        <input type="text" placeholder="Search by Listing Name">
                     </div>
                  </div>
                  <p class="greycolor">2rd FLOOR,  Older Town, Melsugen,  Schwalm-Eder, northern Hesse,  34212 - Germany</p>
               </div>
               <div class="d-flex mb-3" style="justify-content: space-between;">
                  <input type="text" placeholder="Enter coupon code here" class="bgwhite radius10" style="border: none; width: 70%; padding: 0px 15px;"> <a href="#" class="btn btn-post">coupon</a>
               </div>
               <div class="bgwhite cartpricedet mb-3 radius10">
                  <h6>Price Details</h6>
                  <div class="d-flex justify-content-between p-2">
                     <span class="greycolor">Price ( 5 Products )</span>
                     <span>$75</span>
                  </div>
                  <div class="d-flex justify-content-between p-2">
                     <span class="greycolor">Tax (5%)</span>
                     <span>Free</span>
                  </div>
                  <div class="d-flex justify-content-between p-2" style="border-bottom: 2px solid #C4CDD5;">
                     <span class="greycolor">Service Fee (10%)</span>
                     <span>$0</span>
                  </div>
                  <div class="d-flex justify-content-between p-2">
                     <span class="greycolor">Total Amount</span>
                     <span>$75</span>
                  </div>
               </div>
               <a href="#" class="btn btn-post w-100">Checkout</a>
            </div>
         </div>
      </div>
   </div>
</div>
<?php echo $this->render('include/footer'); ?>