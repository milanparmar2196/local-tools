<?php echo $this->render('include/header'); ?>
<?php echo $this->render('include/navbar'); ?>
<style>
	.relatedproduct img{
	width: 100% !important;
	height: 225px; 
	}
	.relatedproductphoto {
	padding: 0;
	margin-bottom: 30px;
	}
	.quantity {
	display:inline-block;
	width:100%;
	border-radius:5px;
	border:2px solid #000;
	margin-top:15px;
	padding:10px 10px;
	}
	.quantity label {
	font-size:16px;
	color:#000;
	}
	.quantity a {
	display: inline-block;
	border: 2px solid #92929D;
	border-radius: 8px;
	height: 46px;
	width: 46px;
	line-height: 46px;
	color: #92929D;
	font-size: 29px;
	text-align: center;
	}
	a.quantity__minus {
	float:left;
	}
	a.quantity__plus {
	float:right;
	}
	.quantity input {
	width: 49%;
	margin: 0px 6px;
	color:#000;
	font-size:30px;
	font-weight:600;
	text-align:center;
	border: 2px solid #FFC10E;
	border-radius: 8px;
	height:46px;
	}
	.pricebox table td {
	color: #000;
	font-size: 16px;
	font-weight: 600;
	}
	.error {
	font-size: 12px;
	}
	.phoensee {
	width: 50%;
	}
</style>
<div class="main">
	<!-- Mobile Menu -->
	<?php echo $this->render('include/m-sidebar'); ?>
	<?php 
		foreach($product_data as $product_data){
		 ?>
	<div class="main-section">
		<div class="categorysec">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="selectmain">
							<div class="selectbox">
								<select class="form-select" aria-label="Default select example">
									<option selected>All Categories</option>
									<?php 
										foreach($category_data as $category_data){
										    ?>
									<option value="<?= $category_data['id'] ?>"><?= $category_data['name'] ?></option>
									;
									<?php   
										}
										?>
								</select>
								<i class="fa fa-angle-down icondown" aria-hidden="true"></i>
							</div>
							<ul class="breadcrumb">
								<li><a href="#"> Home</a> / </li>
								<li><a href="<?= base_url(); ?>/category/<?= $product_data['product_categoryid'] ?>"><?= $product_data['category_name'] ?> </a> / </li>
								<li><a href="#" class="greycolor"><?= $product_data['title'] ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="catmain">
			<div class="container">
				<div class="row mb-2">
					<div class="col-md-8">
						<div class="categorytitle">
							<h6><?= $product_data['title'] ?></h6>
							<div class="daticon">
								<span class="dflex greycolor"><i class="fa fa-calendar" aria-hidden="true"></i><span>
								<?php 
									$date_of_post = $product_data['created_at'];    
									$date = $date_of_post; // 6 october 2011 2:28 pm
									$stamp = strtotime($date); // outputs 1307708880
									?>
								<?php echo date("d", $stamp); ?> 
								<?php echo date("M", $stamp); ?> 
								<?php echo date("Y", $stamp); ?> 
								</span></span>
								<span class="dflex greycolor" style="margin-left:20px;"> <i class="bi bi-geo-alt"></i> <span>
								<?= $product_data['city_name']; ?> ,<?= $product_data['state_name']; ?>, <?= $product_data['country_name']; ?></span></span>
							</div>
						</div>
						<div id="carouselExampleIndicators" class="carousel slide slidermain">
							<div class="sharem phonesetm"><a href="#"><img src="<?= base_url(); ?>/public/image/heart.png"></a></div>
							<div class="carousel-indicators">
								<?php 
									$npost_gallery_data = $post_gallery_data;
									$btn_gallery_count = 0;
									   foreach($post_gallery_data as $post_gallery_data)
									   {
									     ?>
								<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $btn_gallery_count ?>" class="active" aria-current="true" aria-label="Slide 1">
								<img src="<?= base_url(); ?>/public/uploads/seller-products/<?= $post_gallery_data['image_name']; ?>" class="d-block w-100" alt="...">
								</button>
								<?php 
									$btn_gallery_count ++;
									  }      
									?>
							</div>
							<div class="carousel-inner">
								<?php 
									$g_count = 0;
									foreach($npost_gallery_data as $post_gallery_data)
									{ ?>
								<div class="carousel-item <?php if($g_count == 0){echo 'active';}else{ echo '';} ?> ">
									<img src="<?= base_url(); ?>/public/uploads/seller-products/<?= $post_gallery_data['image_name']; ?>" class="d-block w-100" alt="...">
								</div>
								<?php  
									$g_count ++;  
									} 
									?>
							</div>
							<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
							<span class="" aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
							<span class="visually-hidden">Previous</span></button>
							<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
							<span class="" aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i>
							</span><span class="visually-hidden">Next</span>
							</button>
						</div>
						<div class="tablem hidedesk mb-3">
							<h5>$1/Day</h5>
							<ul>
								<li><span class="greycolor">DATE FROM<br></span><span>09/15/2021</span></li>
								<li><span class="greycolor">DATE FROM<br></span><span>09/15/2021</span></li>
								<li><span class="greycolor">DATE FROM<br></span><span>09/15/2021</span></li>
								<li><span class="greycolor">DATE FROM<br></span><span>09/15/2021</span></li>
								<li>
									<div class="selectbox stockwidth"><span class="greycolor">Stock</span><br><span>1 Kit</span><i class="fa fa-angle-down icondown blackcolor" aria-hidden="true"></i></div>
								</li>
							</ul>
							<a href="#" class="checkbtn">Check Availability</a>
							<div class="d-grid bookadd mb-3">
								<a href="#" class="checkbtn">Book</a>
								<a href="#" class="checkbtn boredrbtn">Add to Cart</a>
							</div>
							<div class="pricebox">
								<p class="greycolor text-center">You won’t be charged yet</p>
								<ul class="ptbl">
									<li> 1kit x $1 x 3 Days </li>
									<li class="rightsd"> $3 </li>
									<li> Service Fees </li>
									<li class="rightsd"> $3 </li>
									<li> Occupancy Taxes & Fees </li>
									<li class="rightsd"> $3 </li>
									<li style="border-top: 1px solid #ddd !important;"> Total </li>
									<li class="rightsd" style="border-top: 1px solid #ddd !important;"> $3 </li>
								</ul>
							</div>
						</div>
						<div class="bgwhite seller">
							<h4>Seller Discription</h4>
							<div class="sellerbox">
								<div class="row m-0">
									<div class="col-md-6">
										<div class="d-flex" style="justify-content: space-between;">
											<div class="media">
												<div class="media-left"><img src="<?= base_url(); ?>/public/uploads/<?= $product_data['seller_image'] ?>" class="media-object"></div>
												<div class="media-body">
													<h4 class="media-heading"><?= $product_data['seller_firstname'].' '.$product_data['seller_lastname'] ?></h4>
													<?php 
														$date_sellerjoin = $product_data['seller_joindate'];    
														$sdate = $date_sellerjoin; // 6 october 2011 2:28 pm
														$sstamp = strtotime($sdate); // outputs 1307708880
														?>
													<?php echo date("M", $sstamp); ?> 
													<?php echo date("Y", $sstamp); ?> 
													<p>Member Since <?php echo date("M", $sstamp); ?> <?php echo date("Y", $sstamp); ?> </p>
												</div>
											</div>
											<div class="p50 phoensee">
												<div class="pfollow">
													<h5 class="greycolor">Product</h5>
													<h5>50</h5>
												</div>
												<div class="pfollow dhide">
													<h5 class="greycolor">Review</h5>
													<h5><i class="fa fa-star yellowcolor" aria-hidden="true"></i> 4.5</h5>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="btnend d-flex">
											<!-- <a href="mailto:<?= $product_data['seller_email']?>" class="blackborder rightside">Contact with Seller</a> -->
											<a href="<?= base_url() ?>/seller-profile/<?= $product_data['seller_id'] ?>" class="blackbg whitecolor rightside">View Seller Profile</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row hr2">
							<!-- <div class="col-md-3">
								<div class="media producticon">
								   <div class="media-left"><img src="<?= base_url(); ?>/public/image/v1.png" class="media-object"></div>
								   <div class="media-body">
								      <h4 class="media-heading ">Entire Product</h4>
								      <p class="greycolor">You’ll have the Product to yourself.</p>
								   </div>
								</div>
								</div>
								<div class="col-md-3">
								<div class="media producticon">
								   <div class="media-left"><img src="<?= base_url(); ?>/public/image/v2.png" class="media-object"></div>
								   <div class="media-body">
								      <h4 class="media-heading ">Enhanced Clean</h4>
								      <p class="greycolor">This host has committed to Graham 5-step enhanced cleaning process</p>
								   </div>
								</div>
								</div>
								<div class="col-md-3">
								<div class="media producticon">
								   <div class="media-left"><img src="<?= base_url(); ?>/public/image/v3.png" class="media-object"></div>
								   <div class="media-body">
								      <h4 class="media-heading ">Self check-in</h4>
								      <p class="greycolor">You can check in with the doorperson.</p>
								   </div>
								</div>
								</div>
								<div class="col-md-3">
								<div class="media producticon">
								   <div class="media-left"><img src="<?= base_url(); ?>/public/image/v4.png" class="media-object"></div>
								   <div class="media-body">
								      <h4 class="media-heading ">Free cancellation before 25 Sep</h4>
								   </div>
								</div>
								</div> -->
						</div>
						<div class="row m-0">
							<div class="col-md-6">
								<div class="pdetails">
									<h4>Product Details</h4>
									<?= $product_data['description']; ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="pdetails">
									<h4>About This Product</h4>
									<?= $product_data['about_product']; ?>
								</div>
							</div>
						</div>
						<div class="row m-0">
							<div class="col-md-6">
								<div class="pdetails">
									<h4>Things to Know</h4>
									<?= $product_data['things_to_know_desc']; ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="pdetails">
									<h4>Other Details</h4>
									<div class="detailsinner">
										<?php  
											$Postothersdata = array();
											$counter = 0;
											
											if(!empty($post_ads_data_other))
											{
											   foreach($post_ads_data_other as $values)
											  {
											      $Postothersdata = array_merge($Postothersdata, $values);
											      if($Postothersdata['post_id'] == $product_data['id'])
											      {?>
										<p><span class="wset"><b><?= $Postothersdata['label'] ?> :</b></span><span class="greycolor"><?= $Postothersdata['value'] ?></span></p>
										<?php  }
											}
											}
											
											
											
											?>
									</div>
								</div>
							</div>
						</div>
						<div class="row m-0">
							<div class="col-md-12">
								<div class="bgwhite seller mb-4">
									<h4 class="blackcolor" style="color:#000;">Where you’ll be</h4>
									<iframe width="100%" height="400" src="https://maps.google.com/maps?q=<?= $product_data['latitude'] ?>,<?= $product_data['longitude'] ?>&output=embed"></iframe>
									<p><?= $product_data['city_name']; ?> ,<?= $product_data['state_name']; ?>, <?= $product_data['country_name']; ?></p>
								</div>
								<div class="pdetails mb-2 hr2">
									<h4>Cancellation Policy</h4>
									<?= $product_data['cancellation_policy']; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="sharem phide"><a href="#"><img src="<?= base_url(); ?>/public/image/share.png" style="width: 25px;"></a><a href="#"><img src="<?= base_url(); ?>/public/image/heart.png"></a></div>
						<form method="POST" id="add-to-cart" enctype="multipart/form-data">
							<input type="hidden" name="product_id" value="<?= $product_data['id'] ?>">
							<input type="hidden" name="product_seller_id" value="<?= $product_data['seller_id'] ?>">
							<input type="hidden" name="product_price" value="<?= $product_data['amount'] ?>">
							<input type="hidden" name="total_duration_tyoe" value="<?= $product_data['duration'] ?>">
							<input type="hidden" id="product_total_price" name="total_duration" value="<?= $product_data['seller_id'] ?>">
							<input type="hidden" name="status" value="1">
							
                     <?php if(session('isLoggedIn') == True){
                        ?>
                        <input type="hidden" name="buyer_id" value="<?= session()->get('id') ?>">
                        <?php   } ?>
							
							<div class="tablem hidephone">
								<h5><?= $product_data['amount'] ?>/<?= $product_data['duration'] ?></h5>
								<ul>
									<li><span class="greycolor">DATE FROM<br></span><span>
										<input type="date" name="buyer_datefrom" id="buyer_datefrom" class="form-control" style=" border: 0;" min="<?php echo date("Y-m-d"); ?>" value="<?= date("Y-m-d") ?>"></span>
									</li>
									<li><span class="greycolor">DATE TO<br></span><span>
										<?php if($product_data['duration'] == 'Day'){ ?>
										<input type="date" name="buyer_dateto" id="buyer_dateto" class="form-control" style=" border: 0;" value="<?php $startDate = time();$day_interval = date('Y-m-d', strtotime('+1 day', $startDate)); echo $day_interval;?>">
										<?php }
											elseif($product_data['duration'] == 'Hour'){
											   ?>
										<input type="date" name="buyer_dateto" id="buyer_dateto" class="form-control" style=" border: 0;" value="<?= date("Y-m-d") ?>">
										<?php  }
											elseif($product_data['duration'] == 'Weeks')
											{
											 ?>
										<input type="date" name="buyer_dateto" id="buyer_dateto" class="form-control" style=" border: 0;" value="<?php $startDate = time();$day_interval = date('Y-m-d', strtotime('+7 day', $startDate)); echo $day_interval;?>">
										<?php  }
											?>
										</span>
									</li>
									<li><span class="greycolor">TIME FROM<br></span><span>
										<input type="time" name="buyer_timeefrom" id="buyer_timeefrom" class="form-control" style=" border: 0;" value="<?= date("H:m"); ?>">
										</span>
									</li>
									<li><span class="greycolor">TIME TO<br></span><span>
										<?php 
											if($product_data['duration'] == 'Hour')
											{
											   echo '<input type="time" name="buyer_timeto" id="buyer_timeto" class="form-control" style=" border: 0;" value="'.date("H:i", strtotime('+1 hours')).'">';
											}
											elseif($product_data['duration'] == 'Day')
											{
											   echo '<input type="time" name="buyer_timeto" id="buyer_timeto" class="form-control" style=" border: 0;" value="'.date("H:m").'">';
											}
											elseif($product_data['duration'] == 'Weeks')
											{
											   echo '<input type="time" name="buyer_timeto" id="buyer_timeto" class="form-control" style=" border: 0;" value="'.date("H:m").'">';
											}
											?>
										</span>
									</li>
								</ul>
								<div class="quantity">
									<div class="row align-items-center">
										<div class="col-lg-4">
											<label>Stocks</label>
										</div>
										<div class="col-lg-8">
											<a href="#" class="quantity__minus"><span>-</span></a>
											<input name="buy_stock" id="buy_stock" type="text" class="quantity__input" value="1">
											<a href="#" class="quantity__plus"><span>+</span></a>
										</div>
									</div>
								</div>
								<!-- <a href="#" class="checkbtn">Check Availability</a> -->
								<div class="d-grid bookadd mb-3">
									<button id="add-to-cart-book" class="checkbtn">Book</button>
									<button id="add_to_cart" class="checkbtn boredrbtn">Add to Cart</button>
								</div>
								<div class="pricebox">
									<p class="greycolor text-center">You won’t be charged yet</p>
									<div class="row">
										<div class="table-responsive">
											<table class="table">
												<tbody>
													<tr>
														<td><span class="product-quantity">1kit</span> x $<span id="product-price">1</span> x <span class="product-time">3 Days
                                             
                                          </span><input type="hidden" class="product-time1" value=""></td>
														<td class="product-total-amount">$3
                                             <input type="hidden" class="product-total-amount" value="">
                                          </td>
													</tr>
													<?php   
														$Alltax = array();
														foreach($tax as $tax_data){
														   $Alltax = array_merge($Alltax,$tax_data);
														   if($Alltax['name'] == 'Service fee')
                                             {
														   ?>
                                                <tr>
                                                   <td>Service Fees</td>
                                                   <td>$<?php $servicefee = ($Alltax['percentage']*$product_data['amount'])/100; echo $servicefee ; ?></td>
                                                </tr>
                                             <?php  
                                             }
                                                elseif($Alltax['name'] == 'GST')
                                                {
                                             ?>
                                             <tr>
                                                <td>GST</td>
                                                <td>$<?php $servicefee = ($Alltax['percentage']*$product_data['amount'])/100; 
                                                echo $servicefee ;?></td>
                                             </tr>
                                             <?php 
                                             }
														}
														
														?>
													<tr class="last-tr">
														<td>Total</td>
														<td>$3</td>
                                          <input type="hidden" name="total_price" value="100">
													</tr>
												</tbody>
											</table>
											
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="row m-0">
					<div class="col-md-12">
						<h4>Related Product</h4>
					</div>
				</div>
				<div class="row">
					<?php  
						foreach($related_product as $related_product){
						?>
					<div class="col-md-3">
						<div class="relatedproduct">
							<div class="relatedproductphoto">
								<a href="<?= base_url(); ?>/product/<?= $related_product['id']; ?>">
								<img src="<?= base_url(); ?>/public/uploads/seller-products/<?= $related_product['image_name']; ?>" class="w-100 rpimg">
								</a>
								<!-- <a href="#" class="salebtn bgred beforetop">Sale</a><a href="#"><img src="<?= base_url(); ?>/public/image/heart.png" class="aftertop"></a> -->
							</div>
							<div class="relatedproducttext">
								<p class="greycolor m-0" style="font-size:12px;"><?= $related_product['category_name']; ?></p>
								<div class="d-flex nprice">
									<a href="<?= base_url(); ?>/product/<?= $related_product['id']; ?>">
										<p><?= $related_product['title']; ?></p>
									</a>
									<p>$<?= $related_product['amount']; ?>/<?= $related_product['duration']; ?></p>
								</div>
								<p><span class="dflex greycolor" style="font-size:12px;"><i class="fa fa-map-marker" aria-hidden="true"></i><span><?= $related_product['city_name']; ?>,<?= $related_product['state_name']; ?>,<?= $related_product['country_name']; ?></span></span></p>
							</div>
						</div>
					</div>
					<?php
						}
						?>
				</div>
			</div>
		</div>
	</div>
	<?php 
		}
		?>
</div>
<script>
	$( document ).ready(function() {
	   
	      $("#add-to-cart").validate({
		rules: {
			buyer_datefrom: {
				required: true
			},
			buyer_dateto: {
				required: true,
			},
			buyer_timeefrom: {
				required: true,
			},
			buyer_timeto: {
				required: true,
			},
			
			buy_stock: {
				required: true,
			}
			
		},
		messages: {
			buyer_datefrom: {
				required: "Please choose Date From",
			},
			buyer_dateto: {
				required: "Please choose Date To",
			},
	            buyer_timeefrom: {
				required: "Please Select Time From",
			},
	            buyer_timeto: {
				required: "Please Select Time to",
			},
			buy_stock: {
				required: "Please add Stock Quanity.",
			}
			
			
		}
	});
   // Buy now
	      $('#add-to-cart-book').click(function() {
	         event.preventDefault();
	
            if($("#add-to-cart").valid())
            {
               var form = $("#add-to-cart").closest("form");
               var formData = new FormData(form[0]);
               $.ajax({
                  url: "<?= base_url(); ?>/cart/add_to_cart",
                  type: "POST",
                  //data: $('#postcreate').serialize(),
                  data:  formData,
                  contentType: false,
                  cache: false,
                  processData:false,
                  //dataType: "json",
                  success: function(result) {
                     window.location.href = 'http://localhost/local-tools-devlop/checkout';
                     
                     }
                        
               });
            }
         });

   // Add to cart add_to_cart
   $('#add_to_cart').click(function() {
      event.preventDefault();

      if($("#add-to-cart").valid())
		{
			var form = $("#add-to-cart").closest("form");
			var formData = new FormData(form[0]);
			$.ajax({
				url: "<?= base_url(); ?>/product/cart",
				type: "POST",
				//data: $('#postcreate').serialize(),
				data:  formData,
			   contentType: false,
				cache: false,
			   processData:false,
				//dataType: "json",
				success: function(result) {
					window.location.href = 'http://localhost/local-tools-devlop/cart';
               
               }
			});
		}
   });

   $('#add-to-cart-book').click(function() {
	         event.preventDefault();
	
		if($("#add-to-cart").valid())
		{
			var form = $("#add-to-cart").closest("form");
			var formData = new FormData(form[0]);
			$.ajax({
				url: "<?= base_url(); ?>/cart/add_to_cart",
				type: "POST",
				//data: $('#postcreate').serialize(),
				data:  formData,
			   contentType: false,
				cache: false,
			   processData:false,
				//dataType: "json",
				success: function(result) {
					window.location.href = 'http://localhost/local-tools-devlop/checkout';
               
               }

	
					
	             	
			});
		}
	});

	});
</script>
<script>
	$(document).ready(function() {
	  const minus = $('.quantity__minus');
	  const plus = $('.quantity__plus');
	  const input = $('.quantity__input');
	  minus.click(function(e) {
		e.preventDefault();
		var value = input.val();
		if (value > 1) {
		  value--;
		}
		input.val(value);
	  });
	  
	  plus.click(function(e) {
		e.preventDefault();
		var value = input.val();
		value++;
		input.val(value);
	  })
	});
	 
</script>
<script>
	$(document).ready(function() {
	   $("#buyer_datefrom").change(function(){
	      var buyer_datefrom = $("#buyer_datefrom").val();
         $(".product-time").text($("#product-time").text().replace("Hi", "Bye"));
	      $(".product-time1").val(buyer_datefrom);
	   });
	   $("#buyer_dateto").change(function(){
	      var buyer_dateto = $("#buyer_dateto").val();
	      $("#product-time").append(buyer_dateto);
	   });
	   $("#buyer_timeefrom").change(function(){
	      var buyer_timeefrom = $("#buyer_timeefrom").val();
	      $("#product-time").append(buyer_timeefrom);
	   });
	   $("#buyer_timeto").change(function(){
	      var buyer_timeto = $("#buyer_timeto").val();
	      $("#product-price").append(buyer_timeefrom);
	      $("#product-time").val(buyer_timeto);
	   });
	   $("#buy_stock").change(function(){
	      var buy_stock = $("#buy_stock").val();
	      $("#product-quantity").append(buy_stock);
	   });
	});
</script>
<?php echo $this->render('include/footer'); ?>