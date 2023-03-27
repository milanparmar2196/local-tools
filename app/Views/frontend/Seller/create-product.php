<?php echo $this->render('include/header'); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<?php echo $this->render('include/navbar'); ?>
<div class="main">
	<!-- Mobile Menu -->
	<?php echo $this->render('include/m-sidebar'); ?>
	<div class="main-section">
		<div class="w-100 mangeprofiles">
			<div class="w-100 addprodpost">
				<a href="<?= base_url(); ?>/seller/profile" class="bgblack whitecolor bgblackbtn text-center">My Account</a>
				<ul class="breadcrumb w-100">
					<li><a href="<?= base_url(); ?>"> Home</a> / </li>
					<li><a href="#" class="greycolor">Post Ad</a></li>
				</ul>
			</div>
			<?= \Config\Services::validation()->listErrors(); ?>
			<span class="d-none alert alert-success mb-3" id="res_message"></span>
			<div class="addetailpic">
				
						<form action="javascript:void(0)" method="post" id="postcreate" enctype="multipart/form-data">
						<div class="row mb-3">
							<div class="col-md-6">
								<h4 class="mb-4 font18">Ad Details</h4>
								<div class="bgwhite p-4 radius10">
									<span class="greycolor mb-2">Ad type*</span>
									<div class="radioadd">
										<div class="form-check" style="margin-right: 30px;">
											<input class="form-check-input" type="radio" name="ad_type" value="I offer" id="flexRadioDefault1" checked="checked">
											<label class="form-check-label" for="flexRadioDefault1">
											I offer
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="ad_type"value="I’m looking for" id="flexRadioDefault2" >
											<label class="form-check-label" for="flexRadioDefault2">
											I’m looking for
											</label>
										</div>
									</div>
									<div class="mb-3">
										<label for="exampleInputEmail122" class="form-label greycolor">Title of the ad* </label>
										<input type="text" class="form-control" id="exampleInputEmail122" placeholder="Text" name="title" required>
									</div>
									<div class="mb-3">
										<label for="exampleInputEmail122" class="form-label greycolor">Short Descriptions* </label>
										<input type="text" class="form-control" name="description" id="exampleInputEmail122" placeholder="Text here" required>
									</div>
									<div class="mb-3">
										<label class="form-label">Stocks*</label>
										<input type="number" minlength="1" class="form-control" name="stocks" id="exampleInputEmail122" placeholder="100" required>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<h4 class="mb-4 font18">Pictures</h4>
								<div class="d-flex w-100 fileupleadsbox mb-3">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
										<label class="form-check-label" for="flexRadioDefault2">
										Thumbnail
										</label>
									</div>
									<div class="fileupleadscommn">
										<div class="fileupleads">
											<label for="files" class="form-label font18 blackcolor">Image Upload</label>
											
											 <input class="form-control" name="images[]" type="file" id="files" multiple required> 
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div id="sortableImgThumbnailPreview">
									</div>
								</div>
							</div>
						</div>
						<h4 class="mb-4 font18">Price</h4>
						<div class="bgwhite p-3 radius10 mb-4">
							<div class="row">
								<div class="col">
									<div class="mb-0">
										<label class="form-label blackcolor">Currency*</label>
										<select class="form-select" name="currency" aria-label="Default select example" required>
											<option>Select </option>
											<option value="AUD">Australian Dollar (AUD)</option>
											<option value="CAD">Canadian Dollar (CAD)</option>
											<option value="INR">Indian Rupee(INR)</option>
											<option value="AED">UAE Dirham(AED)</option>
											<option value="USS">US Dollar(USS)</option>
										</select>
									</div>
								</div>
								<div class="col">
									<div class="mb-0">
										<label class="form-label blackcolor">Rented As a*</label>
										<select class="form-select" name="duration" aria-label="Default select example" required>
											<option>Select </option>
											<option value="Hour">Hour</option>
											<option value="Day">Day</option>
											<option value="Weeks">Weeks</option>
											<option value="Month">Month</option>
											<option value="Year">Year</option>
										</select>
									</div>
								</div>
								<div class="col">
									<div class="mb-0">
										<label class="form-label blackcolor">Rent Price*</label>
										<input type="number" class="form-control" name="amount"  placeholder="100.00" required>
									</div>
								</div>
							</div>
						</div>
						<div class="row mb-4">
							<div class="col">
								<div class="mb-0bgwhite radius10">
									<h4 class="mb-2 font18">Category*</h4>
									<div class="search-filter w-100">
										<div class="search-area searchtable w-100">
											<select class="form-select" id="category" aria-label="Default select example" name="category_id" required>
												<option selected="">Selece Category</option>
												<?php 
													foreach($categories as $categories){
														?>
												<option value="<?= $categories['id'] ?>"><?= $categories['name'] ?></option>
												<?php }
													?>
											</select>
											<i class="bi bi-chevron-down"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="mb-0bgwhite radius10">
									<h4 class="mb-2 font18">Sub - Category</h4>
									<div class="search-filter w-100">
										<div class="search-area searchtable w-100">
											<select class="form-select" id="subcategory" name="sub_category_id" aria-label="Default select example">
												<option selected="">Selece Sub-Category</option>
											</select>
											<i class="bi bi-chevron-down"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="mb-0bgwhite radius10">
									<h4 class="mb-2 font18">Brand*</h4>
									<div class="search-filter w-100">
										<div class="search-area searchtable w-100">
											<select class="form-select" name="brand_id" aria-label="Default select example" required>
												<option selected="">Selece Brand</option>
												<?php 
													foreach($brands as $brand) {
													
													?>
												<option value="<?= $brand['id']; ?>"><?= $brand['name']; ?></option>
												<?php 
													}
													?>
											</select>
											<i class="bi bi-chevron-down"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<h4 class="mb-2 font18 m-0">Vendor details</h4>
						<div class="bgwhite p-4 radius10 mb-3">
							<div class="row m-0">
								<div class="col-md-6">
									<div class="mb-3">
										<label for="exampleInputEmail122" class="form-label greycolor">Name* </label>
										<input type="text" class="form-control" name="vendor_name" id="exampleInputEmail122" placeholder="Name">
									</div>
									<div class="mb-3">
										<label for="exampleInputEmail122" class="form-label greycolor">Phone Number </label>
										<input type="number" minlength="10" maxlength="13" class="form-control" name="phone_number" id="exampleInputEmail122" placeholder="Text here">
									</div>
									
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label for="exampleInputEmail122" class="form-label greycolor"> Street, No.*</label>
										<input type="text" class="form-control" name="address_line_1"  id="exampleInputEmail122" placeholder="Name">
									</div>
									<div class="mb-3">
										<label for="exampleInputEmail122" class="form-label"> Address </label>
										<input type="text" class="form-control" name="address_line_2"  id="exampleInputEmail122" placeholder="Text here" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="mb-0bgwhite radius10">
										<label for="exampleInputEmail123" class="form-label greycolor">Country </label>
										<div class="search-filter w-100">
											<div class="search-area searchtable w-100">
												<select class="form-select" id="country" name="country"aria-label="Default select example" required>
													<option>Select Country</option>
													<?php
														$country_data = $country;
														foreach ($country as $country){
														?>
													<option value="<?= $country['id'] ?>"><?= $country['name'] ?></option>
													<?php
														}
														?>
												</select>
												<i class="bi bi-chevron-down"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="mb-0bgwhite radius10">
										<label for="exampleInputEmail123" class="form-label greycolor">State </label>
										<div class="search-filter w-100">
											<div class="search-area searchtable w-100">
												<select class="form-select" id="state" name="state" aria-label="Default select example">
													<option>Select state</option>
												</select>
												<i class="bi bi-chevron-down"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="mb-0bgwhite radius10">
										<label for="exampleInputEmail123" class="form-label greycolor">City* </label>
										<div class="search-filter w-100">
											<div class="search-area searchtable w-100">
												<select class="form-select" id="city" name="city" aria-label="Default select example">
													<option>Select City</option>
												</select>
												<i class="bi bi-chevron-down"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="radius10">
										<label for="exampleInputEmail123" class="form-label greycolor">Postcode* </label>
										<input type="number" class="form-control" name="postcode" id="exampleInputEmail122" placeholder="">
									</div>
								</div>
							</div>
							<div class="col-md-12">
									
									<div class="mb-3">
										<label for="exampleInputEmail123" class="form-label greycolor">Description </label>
										
										<textarea class="" name="provider_desc" id="provider_desc" required></textarea>
										<script> CKEDITOR.replace('provider_desc'); </script>
									</div>
								</div>
						</div>
						<h4 class="mb-2 font18 m-0">Payment policy</h4>
						<div class="bgwhite p-3 radius10 mb-4">
							<div class="row">
								<div class="col-md-2">
									<div class="radioadd" style="flex-direction: column;">
										<span class="blackcolor mb-2 form-label">Deposit*</span>
										<div class="typesd">
											<div class="form-check" style="margin-right: 30px;">
												<input class="form-check-input" type="radio" name="deposit" id="deposit1"  value= "1" checked required>
												<label class="form-check-label" >
												yes
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="deposit" vlaue= "0"  id="deposit2" required>
												<label class="form-check-label" >
												No
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="mb-0">
										<label class="form-label blackcolor">Rented Amount per</label>
										<div class="search-filter w-100">
											<div class="search-area searchtable w-100">
												<select class="form-select" id="deposite_duration" name="deposite_duration" aria-label="Default select example" required>
													<option>Select </option>
													<option value="Day">Day</option>
													<option value="Weeks">Weeks</option>
													<option value="Month">Month</option>
													<option value="Year">Year</option>
												</select>
												<i class="bi bi-chevron-down"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="mb-0">
										<label class="form-label blackcolor">Amount</label>
										<input type="number" class="form-control " id="deposit-amount" name="deposite_amount" id="exampleInputEmail122" placeholder="">
									</div>
								</div>
							</div>
						</div>
						<h4 class="mb-2 font18 m-0">Damage policy</h4>
						<div class="bgwhite p-3 radius10 mb-4">
							<div class="row">
								<div class="col-md-2">
									<div class="radioadd" style="flex-direction: column;">
										<span class="blackcolor mb-2 form-label">Product Damage Protection Money*</span>
										<div class="typesd">
											<div class="form-check" style="margin-right: 30px;">
												<input class="form-check-input" type="radio" name="demage" id="demage1" checked="" value="1">
												<label class="form-check-label" for="demage1">
												yes
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="demage" id="demage2" value="0">
												<label class="form-check-label" for="demage2">
												No
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="mb-0">
										<label class="form-label blackcolor">Damege Policy Type</label>
										<div class="search-filter w-100">
											<div class="search-area searchtable w-100">
												<select class="form-select" id="demage_type" name="demage_type" aria-label="Default select example" required>
													<option>Select </option>
													<option value="Day">Policy Type 1</option>
													<option value="Weeks">Policy Type 2</option>
													<option value="Month">Policy Type 3</option>
													<option value="Year">Year</option>
												</select>
												<i class="bi bi-chevron-down"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="mb-0">
										<label class="form-label blackcolor">Amount</label>
										<input type="number" class="form-control" id="demage_amount" name="demage_amount"  placeholder="" required>
									</div>
								</div>
							</div>
						</div>
						<div class="row mb-4">
							<div class="col-md-6">
								<h4 class="mb-2 font18">Product Details</h4>
								<div class="mb-0 bgwhite radius10 w-100" style="float: left;padding: 15px;box-sizing: border-box;">
									<div class=" w-100">
										<label class="form-label">Description*</label>
										<textarea class="" id="product_desc" name="product_desc" required></textarea>
										<script> CKEDITOR.replace('product_desc'); </script>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<h4 class="mb-2 font18">About Product</h4>
								<div class="mb-0 bgwhite radius10 w-100" style="float: left;padding: 15px;box-sizing: border-box;">
									<div class=" w-100">
										<label class="form-label">Description*</label>
										<textarea class="" id="product_about" name="product_about" required></textarea>
										<script> CKEDITOR.replace('product_about'); </script>
									</div>
								</div>
							</div>
						</div>
						<div class="row mb-4">
							<div class="col-md-6">
								<h4 class="mb-2 font18">Things to Know</h4>
								<div class="mb-0 bgwhite radius10 w-100" style="float: left;padding: 15px;box-sizing: border-box;">
									<div class=" w-100">
										<label class="form-label">Description*</label>
										<textarea class="" id="things_to_know_desc" name="things_to_know_desc"></textarea>
										<script> CKEDITOR.replace('things_to_know_desc'); </script>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<h4 class="mb-2 font18">Cancellation Policy</h4>
								<div class="mb-0 bgwhite radius10 w-100" style="float: left;padding: 15px;box-sizing: border-box;">
									<div class=" w-100">
										<label class="form-label">Description*</label>
										<textarea class="" id="cancellation_policy" name="cancellation_policy" required></textarea>
										<script> CKEDITOR.replace('cancellation_policy'); </script>
									</div>
								</div>
							</div>
						</div>
						<h4 class="mb-2 font18 m-0">Add Custom Details</h4>
						<div class="bgwhite p-3 radius10 mb-4">
							<table class="add-custom-box w-100">
								<tr>
									<td>
										<div class="row">
											<div class="col-md-4">
												<div class="mb-0 w-100">
													<span class="blackcolor mb-2 form-label">Label</span>
													<input type="text" name="add_label[]" class="form-control" id="exampleInputEmail123" placeholder="Text here">
												</div>
											</div>
											<div class="col-md-4">
												<div class="mb-0 w-100">
													<span class="blackcolor mb-2 form-label">Value</span>
													<input type="text" name="add_value[]" class="form-control" id="exampleInputEmail123" placeholder="Text here">
												</div>
											</div>
											<div class="col-md-4">
												<div class="d-flex addpbtn" style="padding-top: 22px;">
													<a href="javascript:void(0)" class="js-add-row bgblack">Add Details</a>
													<a href="javascript:void(0)" class="js-del-row btn-post">Delete</a>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</table>
						</div>
						<h4 class="mb-2 font18 m-0">Listing Location</h4>
						<div class="bgwhite p-4 radius10 mb-3">
							<div class="row m-0">
								<div class="col-md-6">
									<div class="mb-3">
										<label for="exampleInputEmail122" class="form-label greycolor"> Street, No.*</label>
										<input type="text" class="form-control" name="listing_address1" id="exampleInputEmail122" placeholder="Name" required>
									</div>
									<div class="mb-3">
										<label for="exampleInputEmail122" class="form-label">Addresss* </label>
										<input type="text" class="form-control" name="listing_address2"  id="exampleInputEmail122" placeholder="Text here" required>
									</div>
									<div class="mb-3">
										<div class="mb-0bgwhite radius10">
											<label for="exampleInputEmail123" class="form-label greycolor">Country </label>
											<div class="search-filter w-100">
												<div class="search-area searchtable w-100">
													<select class="form-select" id="country_list" name="country_list" aria-label="Default select example" required>
														<option>Select Country</option>
														<?php foreach ($country_data as $country){
															?>
														<option value="<?= $country['id'] ?>"><?= $country['name'] ?></option>
														<?php
															}
															?>
													</select>
													<i class="bi bi-chevron-down"></i>
												</div>
											</div>
										</div>
									</div>
									<div class="row mb-3">
										<div class="col">
											<div class="mb-0bgwhite radius10">
												<label for="exampleInputEmail123" class="form-label greycolor">State </label>
												<div class="search-filter w-100">
													<div class="search-area searchtable w-100">
														<select class="form-select" id="state_list" name="state_list"  aria-label="Default select example" required>
															<option>Select State</option>
														</select>
														<i class="bi bi-chevron-down"></i>
													</div>
												</div>
											</div>
										</div>
										<div class="col">
											<div class="mb-0bgwhite radius10">
												<label for="exampleInputEmail123" class="form-label greycolor">City* </label>
												<div class="search-filter w-100">
													<div class="search-area searchtable w-100">
														<select class="form-select" name="city_list" id="city_list" aria-label="Default select example">
															<option>Select City</option>
														</select>
														<i class="bi bi-chevron-down"></i>
													</div>
												</div>
											</div>
										</div>
										<div class="col">
											<div class="radius10">
												<label for="exampleInputEmail123" class="form-label greycolor">Postcode* </label>
												<input type="number" name="postcode_list" class="form-control" id="exampleInputEmail122" placeholder="00000" required>
											</div>
										</div>
									</div>
									<div class="row mb-3">
										<div class="col">
											<div class="radius10">
												<label for="exampleInputEmail123" class="form-label greycolor">Latitude (for Maps Pin Position) </label>
												<input type="number" id="latitude" name="latitude"  onkeyup="ValidateLatitude();" class="form-control" id="exampleInputEmail122" placeholder="51.165691" required>
											</div>
										</div>
										<div class="col">
											<div class="mb-0bgwhite radius10">
												<label for="exampleInputEmail123" class="form-label greycolor">Longitude (for Maps Pin Position) </label>
												<input type="number" id="longitude" onkeyup="ValidateLongitude();"  name="longitude" class="form-control" id="exampleInputEmail122" placeholder="10.451526" required>
											</div>
										</div>
										<div class="col-12 text-center addpbtn">
											<button type="button" id="submit_coordinates" onclick="addToMap()" class="btn-post mt-3 mb-3">Add to Map</button>
										</div>
									</div>
								</div>
								<div class="col-md-6 " id="map_mapbox">
									
								</div>
							</div>
						</div>
						<h4 class="mb-2 font18 m-0">When is your Listing Available?</h4>
						<div class="bgwhite p-3 radius10 mb-4">
							<div class="row">
								<div class="col-md-12">
									<p class="greycolor">*Click to select the period you wish to mark as booked for visitors.</p>
									<div class="selectasdate">
										<div class="selectas">
											<span style="margin-right:10px;"><b>Selected as</b></span>
											<div class="search-filter">
												<div class="search-area searchtable w-100">
													<select class="form-select" aria-label="Default select example">
														<option selected="">Monthly</option>
													</select>
													<i class="bi bi-chevron-down"></i>
												</div>
											</div>
											<div class="today-add">
												<span></span> Today
											</div>
											<div class="bookd-add">
												<span></span> Booked
											</div>
										</div>
										<!-- <img src="<?= base_url(); ?>/public/image/date.png" class="datepiker w-100"> -->
										<div class="col-12 text-center select-calender mt-4">
											<input type="text" class="form-control" name="daterange"  style="max-width:300px;margin:0 auto; text-align:center;"/>
										</div>
									</div>

								</div>
							</div>
						</div>
						<h4 class="mb-2 font18 m-0">Publish your Ad with Benefit <span class="lightred">(Recommended)</span></h4>
						<?php  
							$db = db_connect();
							use App\Models\SubscriptionPlansModel;
						?>
						<div class="row mb-4 ads_row">
							<div class="col-md-4">
								<div class="pubaddmain push-plan pushplan" style=" border-radius: 10px;border: 1px solid #FFC10E;">
									<img src="<?= base_url(); ?>/public/image/b1.png" class="badimg">
									<p>Push Up Plan</p>
									<div class="search-filter">
										<div class="search-area searchtable">
											<select class="form-select ads_plans" id="pushup_plan" name="ads_id"  aria-label="Default select example">
												<option selected>Select</option>
												<?php  
											
												$subscriptionPlans1 = new SubscriptionPlansModel();
												$where1 = array(
													'plan_id' => 2,
													'status' => 1 ,

												);
												
												$subsdata = $subscriptionPlans1->where($where1)->findAll();
												foreach($subsdata as $subsdata) { ?>
													<option value="<?= $subsdata['id']?>"><?php echo $subsdata['duration']?></option>
												<?php } ?>
												

											</select>
											<i class="bi bi-chevron-down"></i>
										</div>
										
									</div>
									<p id="plan_price2"><b>&nbsp;</b></p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="pubaddmain highlight  high-light " style="border-radius: 10px;border: 1px solid #86B817;">
									<img src="<?= base_url(); ?>/public/image/b3.png" class="badimg">
									<p>HighLight</p>
									<div class="search-filter">
										<div class="search-area searchtable">
										<select class="form-select ads_plans" id="highLight" name="ads_id" aria-label="Default select example">
											<option selected="">Select</option>
												<?php  

												$subscriptionPlans2 = new SubscriptionPlansModel();
												$where1 = array(
													'plan_id' => 3,
													'status' => 1 ,

												);
												
												$subsdata = $subscriptionPlans2->where($where1)->findAll();
												foreach($subsdata as $subsdata) { ?>
													<option value="<?= $subsdata['id']?>"><?php echo $subsdata['duration']?></option>
												<?php } ?>
											</select>
											<i class="bi bi-chevron-down"></i>
										</div>
									</div>
									<p id="plan_price1"><b>&nbsp;</b></p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="pubaddmain top-plan topplan" style="background: #fff; border-radius: 10px;border: 1px solid #0064D2;">
									<img src="<?= base_url(); ?>/public/image/b2.png" class="badimg">
									<p>Top Plan</p>
									<div class="search-filter">
										<div class="search-area searchtable">
										<select class="form-select ads_plans" id="top-plans"  name="ads_id"  aria-label="Default select example">
												<option value="" selected>Select</option>
												<?php  
											
												$subscriptionPlans3 = new SubscriptionPlansModel();
												$where1 = array(
													'plan_id' => 1,
													'status' => 1 ,

												);
												
												$subsdata = $subscriptionPlans3->where($where1)->findAll();
												foreach($subsdata as $subsdata) { ?>
													<option value="<?= $subsdata['id']?>"><?php echo $subsdata['duration']?></option>
												<?php } ?>
												

											</select>
											<i class="bi bi-chevron-down"></i>
										</div>
									</div>
									<p id="plan_price"><b>&nbsp;</b></p>
								</div>
							</div>
						</div>
						<h4 class="mb-2 font18 m-0">Publish your ad</h4>
						<div class="bgwhite p-3 radius10 mb-4">
							<div class="row">
								<div class="col-md-12">
									<p class="greycolor text-center">Our <a href="<?= base_url(); ?>" style="color:#FFC10E;">terms of use</a> apply . You can find information on the processing of your data in our <a  href="<?= base_url(); ?>" style="color:#FFC10E;">privacy policy</a>.</p>
									<div class="payprew d-flex">
										<input type="hidden" name="seller_id" value="<?= session()->get('id') ?>" />
										<button type="submit"  class="borderbtn" id="submit-btn">Place an Ad</button>
										<button type="submit" id="submit_pay" class="bgblack whitecolor blackbtn blur  mx-2" disabled>Pay & Place an Ad</button>
										<button type="submit" id="" class="borderbtn">Preview</button>
									</div>
								</div>
							</div>
						</div>
						<div class="response-message ms-3"></div>
					</form>
			</div>
		</div>
	</div>
</div>
	<script>
		$(document).ready(function(){
	
		// Get sub-category
		$('#category').change(function(){
		
			var category_id = $('#category').val();
		
			var action = 'get_subcategory';
		
			if(category_id != '')
			{
				$.ajax({
					url:"<?php echo base_url('/seller/SellerProductController/get_subcategory'); ?>",
					method:"POST",
					data:{category_id:category_id, action:action},
					dataType:"JSON",
					success:function(data)
					{
						var html = '<option value="">Select Sub-Category</option>';
		
						for(var count = 0; count < data.length; count++)
						{
		
							html += '<option value="'+data[count].id+'">'+data[count].name+'</option>';
		
						}
		
						$('#subcategory').html(html);
					}
				});
			}
			else
			{
				$('#subcategory').val('');
			}
			
		});
		
		// Get state
		
		$('#country').change(function(){
		
			var country_id = $('#country').val();
		
			var action = 'get_state';
		
			if(country_id != '')
			{
				$.ajax({
				url:"<?php echo base_url('/seller/SellerProductController/get_state'); ?>",
				method:"POST",
				data:{country_id:country_id, action:action},
				dataType:"JSON",
				success:function(data)
				{
					var html = '<option value="">Select State</option>';
		
					for(var count = 0; count < data.length; count++)
					{
		
						html += '<option value="'+data[count].id+'">'+data[count].name+'</option>';
		
					}
		
					$('#state').html(html);
				}
			});
			}
			else
			{
				$('#state').val('');
			}
			$('#city').val('');
		});
		// Get City
		$('#state').change(function(){
		
			var state_id = $('#state').val();
		
			var action = 'get_city';
		
			if(state_id != '')
			{
				$.ajax({
					url:"<?php echo base_url('/seller/SellerProductController/get_city'); ?>",
					method:"POST",
					data:{state_id:state_id, action:action},
					dataType:"JSON",
					success:function(data)
					{
						var html = '<option value="">Select City</option>';
		
						for(var count = 0; count < data.length; count++)
						{
							html += '<option value="'+data[count].id+'">'+data[count].name+'</option>';
						}
		
						$('#city').html(html);
					}
				});
			}
			else
			{
				$('#city').val('');
			}
		
		});
		// top plans
		$('#top-plans').change(function(){
		
			var plans_id = $('#top-plans').val();

			var action = 'get_price';

			if(plans_id != '')
			{
				$.ajax({
					url:"<?php echo base_url('/seller/SellerProductController/get_price'); ?>",
					method:"POST",
					data:{plans_id:plans_id, action:action},
					dataType:"JSON",
					success:function(data)
					{
						var html = '';

						for(var count = 0; count < data.length; count++)
						{

							html += '<p> <b>$'+data[count].amount+'</b></p>';

						}

						$('#plan_price').html(html);
					}
				});
			}
			else
			{
				$('#plan_price').val('');
			}
			
		});
		// HighLight plans
		$('#highLight').change(function(){
		
			var plans_id = $('#highLight').val();

			var action = 'get_price';

			if(plans_id != '')
			{
				$.ajax({
					url:"<?php echo base_url('/seller/SellerProductController/get_price'); ?>",
					method:"POST",
					data:{plans_id:plans_id, action:action},
					dataType:"JSON",
					success:function(data)
					{
						var html = '';

						for(var count = 0; count < data.length; count++)
						{

							html += '<p> <b>$'+data[count].amount+'</b></p>';

						}

						$('#plan_price1').html(html);
					}
				});
			}
			else
			{
				$('#plan_price1').val('');
			}
		
		});

		// Pushup plans
		$('#pushup_plan').change(function(){
		
			var plans_id = $('#pushup_plan').val();

			var action = 'get_price';

			if(plans_id != '')
			{
				$.ajax({
					url:"<?php echo base_url('/seller/SellerProductController/get_price'); ?>",
					method:"POST",
					data:{plans_id:plans_id, action:action},
					dataType:"JSON",
					success:function(data)
					{
						var html = '';

						for(var count = 0; count < data.length; count++)
						{

							html += '<p> <b>$'+data[count].amount+'</b></p>';

						}

						$('#plan_price2').html(html);
					}
				});
			}
			else
			{
				$('#plan_price2').val('');
			}

		});
		});
	
	</script>
	<script>
		$(document).ready(function(){
		
			// Get state
		
			$('#country_list').change(function(){
		
				var country_id = $('#country_list').val();
			
				var action = 'get_state';
			
				if(country_id != '')
				{
					$.ajax({
					url:"<?php echo base_url('/seller/SellerProductController/get_state'); ?>",
					method:"POST",
					data:{country_id:country_id, action:action},
					dataType:"JSON",
					success:function(data)
					{
						var html = '<option value="">Select State</option>';
			
						for(var count = 0; count < data.length; count++)
						{
			
							html += '<option value="'+data[count].id+'">'+data[count].name+'</option>';
			
						}
			
						$('#state_list').html(html);
					}
				});
				}
				else
				{
					$('#state_list').val('');
				}
				$('#city_list').val('');
			});
			// Get City
			$('#state_list').change(function(){
			
				var state_id = $('#state_list').val();
			
				var action = 'get_city';
			
				if(state_id != '')
				{
					$.ajax({
						url:"<?php echo base_url('/seller/SellerProductController/get_city'); ?>",
						method:"POST",
						data:{state_id:state_id, action:action},
						dataType:"JSON",
						success:function(data)
						{
							var html = '<option value="">Select City</option>';
			
							for(var count = 0; count < data.length; count++)
							{
								html += '<option value="'+data[count].id+'">'+data[count].name+'</option>';
							}
			
							$('#city_list').html(html);
						}
					});
				}
				else
				{
					$('#city').val('');
				}
			
			});
		
		});
		
	</script>
	<style>
		.blur{
			opacity: 0.5;
		}
		.error{
			font-size: 12px;
			color: red;
			background: #ff000014;
		}
		label.error{
			padding: 10px;
			border-radius: 4px;
			background: transparent;
		}
		.ui-sortable-placeholder { 
		border: 1px dashed black!important; 
		visibility: visible !important;
		background: #eeeeee78 !important;
		}
		.ui-sortable-placeholder * { visibility: hidden; }
		.RearangeBox.dragElemThumbnail{opacity:0.6;}
		.RearangeBox {
		width: 150px;
		height:178px;
		padding:10px 5px;
		cursor: all-scroll;
		float: left;
		border: 1px solid #9E9E9E;
		font-family: sans-serif;
		display: inline-block;            
		margin: 5px!important;
		text-align: center;
		color: #673ab7;
		background: #ffc107;
		/*color: rgb(34, 34, 34);
		background: #f3f2f1;     */
		}
		.IMGthumbnail{
		max-width:130px;
		height:155px;
		margin:auto;
		background-color: #ececec;
		padding:2px;
		border:none;
		}
		.IMGthumbnail img {
			max-width: 100%;
			max-height: 100%;
			height: 100%;
			width: 100%;
		}
		.imgThumbContainer{
		margin:4px;
		border: solid;
		display: inline-block;
		justify-content: center;
		position: relative;
		border: 1px solid rgba(0,0,0,0.14);
		-webkit-box-shadow: 0 0 4px 0 rgba(0,0,0,0.2);
		box-shadow: 0 0 4px 0 rgba(0,0,0,.2);
		}
		.imgThumbContainer > .imgName{
		text-align:center;
		padding: 2px 6px;
		margin-top:4px;
		font-size:13px;
		height: 15px;
		overflow: hidden;
		}
		.imgThumbContainer > .imgRemoveBtn{
		position: absolute;
		color: #e91e63ba;
		right: -10px;
		top: -10px;
		cursor: pointer;
		display: none;
		background: #fff;
		border-radius: 100%;
		font-size: 20px;
		padding: 0px 4px;
		}
		.RearangeBox:hover > .imgRemoveBtn{ 
		display: block;
		}
		.push-plan.intro {
			background: #FFC10E !important;
			color: #fff !important;
		}
		.high-light.intro-two {
			background: #86B817 !important;
			color: #fff !important;
		}
		.top-plan.intro-three {
			background: #0064D2 !important;
			color: #fff !important;
		}
		.searchtable i {

			color: #000;
		}
		.form-control:disabled, .addetailpic select.form-select:disabled {
				background-color: var(--mo-form-control-disabled-bg) !important;
				opacity: 1;
			}
	</style>
	
	<script>
		$(function() {
				$("#sortableImgThumbnailPreview").sortable({
					connectWith: ".RearangeBox",
				
					
					start: function( event, ui ) { 
						$(ui.item).addClass("dragElemThumbnail");
						ui.placeholder.height(ui.item.height());
				
					},
					stop:function( event, ui ) { 
						$(ui.item).removeClass("dragElemThumbnail");
					}
				});
				$("#sortableImgThumbnailPreview").disableSelection();
			});
		
		
		
		
		document.getElementById('files').addEventListener('change', handleFileSelect, false);
		
		function handleFileSelect(evt) {
		
		var files = evt.target.files; 
		var output = document.getElementById("sortableImgThumbnailPreview");
		
		// Loop through the FileList and render image files as thumbnails.
		for (var i = 0, f; f = files[i]; i++) {
		
			// Only process image files.
			if (!f.type.match('image.*')) {
			continue;
			}
		
			var reader = new FileReader();
		
			// Closure to capture the file information.
			reader.onload = (function(theFile) {
			return function(e) {
				// Render thumbnail.
				var imgThumbnailElem = "<div class='RearangeBox imgThumbContainer'><i class='bi bi-x-lg imgRemoveBtn' aria-hidden='true'onclick='removeThumbnailIMG(this)'></i><div class='IMGthumbnail' ><img  src='" + e.target.result + "'" + "title='"+ theFile.name + "' name='images[]'/></div></div>";
						
						output.innerHTML = output.innerHTML + imgThumbnailElem; 
				
			};
			})(f);
		
			// Read in the image file as a data URL.
			reader.readAsDataURL(f);
		}
		}
		
		function removeThumbnailIMG(elm){
		elm.parentNode.outerHTML='';
		}
	</script>
	<script src='<?= base_url(); ?>/public/js/jquery.min.js'></script>

	<script>
    $(document).ready(function () {
        $('#deposit1').click(function () {
			 $("#deposit-amount").prop("disabled", false);
			 $("#deposite_duration").prop("disabled", false);
            
        });
        $('#deposit2').click(function () {
			 $("#deposit-amount").prop("disabled", true);
			 $("#deposite_duration").prop("disabled", true);
        });


		$('#demage1').click(function () {
			 $("#deposit-amount").prop("disabled", false);
			 $("#deposite_duration").prop("disabled", false);
            
        });
        $('#demage2').click(function () {
			 $("#demage_amount").prop("disabled", true);
			 $("#demage_type").prop("disabled", true);
        });
    });
	</script>
	<script id="rendered-js" >
		$(document).on('click', '.js-add-row', function () {
		$('.add-custom-box').append($('.add-custom-box').find('tr:last').clone());
		});
		
		$(document).on('click', '.js-del-row', function () {
		$('.add-custom-box').find('tr:last').remove();
		});
		//# sourceURL=pen.js
		
	</script>
	<script>
         $(document).ready(function(){
           $(".push-plan").click(function(){
				$(".push-plan").addClass('intro');
				$("#pushup_plan").addClass('ads_selected');
				$(".push-plan :input").prop("disabled", false);
				$(".highlight").removeClass('intro-two');
				$(".highlight").removeClass('ads_selected');
				$(".topplan").removeClass('intro-three');
				$(".topplan").removeClass('ads_selected');
				$(".highlight :input").prop("disabled", true);
				$(".topplan :input").prop("disabled", true);
           });
            $(".high-light").click(function(){
         		$(".high-light").addClass('intro-two');
				$("#highLight").addClass('ads_selected');
				$(".high-light :input").prop("disabled", false);
				$(".push-plan").removeClass('intro');
				$(".push-plan").removeClass('ads_selected');
				$(".topplan").removeClass('intro-three');
				$(".topplan").removeClass('ads_selected');
				$(".push-plan :input").prop("disabled", true);
				$(".topplan :input").prop("disabled", true);
           });
            $(".top-plan").click(function(){
         		$(".top-plan").addClass('intro-three');
				 $("#top-plans").addClass('ads_selected');
			 	$(".top-plan :input").prop("disabled", false);
				$(".highlight").removeClass('intro-two');
				$(".highlight").removeClass('ads_selected');
				$(".push-plan").removeClass('intro');
				$(".push-plan").removeClass('ads_selected');
				$(".highlight :input").prop("disabled", true);
				$(".push-plan :input").prop("disabled", true);
           });

		   const defaultCoordinates = [10.451526, 51.165691];
		   loadMap(defaultCoordinates)
         });

		 function ValidateLatitude() {
			$("#lblLat").hide();
			var regexLat = new RegExp('^(\\+|-)?(?:90(?:(?:\\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\\.[0-9]{1,6})?))$');
			if (!regexLat.test($("#txtLat").val())) {
				$("#lblLat").html("Invalid Latitude").show();
			}
		}

		function ValidateLongitude() {
			$("#lblLong").hide();
			var regexLong = new RegExp('^(\\+|-)?(?:180(?:(?:\\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\\.[0-9]{1,6})?))$');
			if (!regexLong.test($("#txtLong").val())) {
				$("#lblLong").html("Invalid Longitude").show();
			}
		}

		function loadMap(coordinates) {
			mapboxgl.accessToken = '<?= $PK_MAPBOX ?>';
			const map = new mapboxgl.Map({
				container: 'map_mapbox',
				style: 'mapbox://styles/mapbox/streets-v12',
				center: coordinates,
				zoom: 7,
			});
			const marker = new mapboxgl.Marker({
				draggable: true,
				properties: {
					'marker-color': '#FF0000'
				}

			});
			marker.setLngLat(coordinates).addTo(map);

			map.on('style.load', function() {
				marker.on('dragend', function (e) {
					let coordinates = e.lngLat;
					const lngLat = marker.getLngLat();
					setCoordinatesToForm(lngLat)
				});
				map.on('click', function(e) {
					let coordinates = e.lngLat;
					marker.setLngLat(coordinates).addTo(map);
					setCoordinatesToForm(coordinates)
				});
			});
		}

		function setCoordinatesToForm(coordinates) {
			$('#postcreate input[name="latitude"]').val(coordinates.lat);
			$('#postcreate input[name="longitude"]').val(coordinates.lng);
		}

		function addToMap() {
			const lat = $('#postcreate input[name="latitude"]').val();
			const lng = $('#postcreate input[name="longitude"]').val();
			if(lat != '' && lng != '') {
				loadMap([lng, lat])
			}
		}
      </script>

	
    


	
	<?php echo $this->render('include/footer'); ?>