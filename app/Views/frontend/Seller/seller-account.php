<?php echo $this->render('include/header'); ?>
    <?php echo $this->render('include/navbar'); ?>
      <div class="main">
        <!-- Mobile Menu -->
        <?php echo $this->render('include/m-sidebar'); ?>
        <?php echo $this->render('include/my-account-menu'); ?>
        <div class="main-section">
		<div class="w-100 mangeprofiles">
		    <ul class="breadcrumb w-100">
                <li><a href="#"> Home</a> / </li>
                <li><a href="#" class="greycolor"> Manage Profile / Seller account</a></li>
            </ul>
		</div>
        
        <div class="selleraccount">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item" role="presentation">
					<button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><img src="<?= base_url(); ?>/public/image/analatik.png" class="dimg"> <img src="<?= base_url(); ?>/public/image/analatik-w.png" class="himg"> Analytics</button>
				  </li>
				  <li class="nav-item" role="presentation">
					<button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><img src="<?= base_url(); ?>/public/image/listing-b.png" class="dimg"><img src="<?= base_url(); ?>/public/image/listing.png" class="himg"> My Listing</button>
				  </li>
				  <li class="nav-item" role="presentation">
					<button class="nav-link" id="order-tab" data-bs-toggle="tab" data-bs-target="#order-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><img src="<?= base_url(); ?>/public/image/order.png" class="dimg"> <img src="<?= base_url(); ?>/public/image/order-w.png" class="himg">order</button>
				  </li>
				  <li class="nav-item" role="presentation">
					<button class="nav-link" id="message-tab" data-bs-toggle="tab" data-bs-target="#message-tab-pane" type="button" role="tab" aria-controls="message-tab-pane" aria-selected="false"><img src="<?= base_url(); ?>/public/image/message.png" class="dimg"><img src="<?= base_url(); ?>/public/image/message-w.png" class="himg">Messages</button>
				  </li>
				  <li class="nav-item" role="presentation">
					<button class="nav-link" id="ivoice-tab" data-bs-toggle="tab" data-bs-target="#invoice-tab-pane" type="button" role="tab" aria-controls="invoice-tab-pane" aria-selected="false"><img src="<?= base_url(); ?>/public/image/invoice.png" class="dimg"><img src="<?= base_url(); ?>/public/image/invoice-w.png" class="himg">Invoice</button>
				  </li>
				  <li class="nav-item" role="presentation">
					<button class="nav-link" id="membership-tab" data-bs-toggle="tab" data-bs-target="#membership-tab-pane" type="button" role="tab" aria-controls="membership-tab-pane" aria-selected="false"><img src="<?= base_url(); ?>/public/image/invoice.png" class="dimg"><img src="<?= base_url(); ?>/public/image/invoice-w.png" class="himg">Membership</button>
				  </li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade " id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">...</div>
				  
				  <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <h4 class="tabtitle">My Listing</h4>
                    <div class="sellersearch mb-3">
                    <div class="s-search">
                        <input type="text" placeholder="Search by Listing Name" id="search-p">
                        <i class="bi bi-search"></i>
                    </div>
                    <a class="btn btn-post" href="<?= base_url(); ?>/seller/add-product">Add New Product</a>
                    </div>
                    <div class="tableresponsive">
                    <table class="table">
                        <thead style="border-radius:20px; margin-bottom: 20px !important;">
                        <tr>
                            <th scope="col"  style="border-radius:5px 0px 0px 5px; text-align:left;padding-left: 20px;">Product</th>
                            <th scope="col">Price</th>
                            <!--<th scope="col">Role</th>-->
                            <th scope="col">Quantity</th>
                        <th scope="col">Status</th>
                            <th scope="col" style="border-radius:0px 5px 5px 0px;text-align:right;padding-right: 20px;">Action</th>
                        </tr>
                        </thead>
                        <tbody id="product-data">
						
                        </tbody>
                    </table>
                    </div>
				  
				  </div>
				   <div class="tab-pane fade show" id="order-tab-pane" role="tabpanel" aria-labelledby="order-tab" tabindex="0">
                    <h4 class="tabtitle">My Orders</h4>
                    <div class="sellersearch mb-3">
                    <div class="s-search">
                            <input type="text" placeholder="Search by Product Name" id="search-product">
                            <i class="bi bi-search"></i>
                    </div>                  
                    </div>
                    <script>
					
					
                        $("#search-product").keyup(function(event){
							
                            if (event.keyCode == '13') {
								//alert("kkmm");	
                                callorders($("#search-product").val());
                            //...
                            }
                        });


						$("#search-p").keyup(function(event){
                            if (event.keyCode == '13') {
								//alert("kkoo");		
                                callproducts($("#search-p").val());
                            //...
                            }
                        });

                    </script>
                    <div class="tableresponsive">
                    <table class="table">
                        <thead style="border-radius:20px; margin-bottom: 20px !important;">
                        <tr>
							 <th scope="col" style="border-radius:5px 0px 0px 5px; text-align:left;padding-left: 20px;">Order ID</th>
                            <th scope="col">Product</th>
                            <th scope="col">Rent</th>
                            <th scope="col">Lease Period</th>
                            <th scope="col">Total Rent</th>
                            <th scope="col">Quantity</th>
							<th scope="col">Order By</th>
                             <th scope="col" style="border-radius:0px 5px 5px 0px;text-align:center;padding-right: 20px;">Status</th>
                        </tr>
                        </thead>
                        <tbody id="order-data">
                           
                        </tbody>
                    </table>
                    </div>
				  
				  </div>
				  <div class="tab-pane fade" id="message-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
				    <div class="tab-pane fade" id="invoice-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">

                      <!-- invoice tab  data-->
                      <h4 class="tabtitle">Invoice</h4>
                      <div class="row mb-2">
                          <div class="col-md-3">
                            <div class="sellersearch">
                              <div class="s-search">
                              <input type="date" placeholder="From date" id="fromdate" onchange="callinvoice1()">
                              <i class="bi bi-search"></i>
                              </div>
                            </div>
                          </div>
                        <div class="col-md-3">
                          <div class="sellersearch">
                            <div class="s-search">
                              <input type="date" placeholder="To Date" id="todate" onchange="callinvoice1()">
                              <i class="bi bi-search"></i>
                            </div>
                            </div>
                          </div>          
						 <div class="col-md-3">
                          <div class="sellersearch">
                            <div class="s-search">
                             <select class="form-select" onchange="callinvoice1()" id="m-type">
												<option value="">Select</option>
												<?php 
												foreach($plans as $u){
												?>
												<option value="<?= $u['id'];?>" ><?= $u['name'];?></option>
												<?php }?>
											</select><i class="bi bi-chevron-down"></i>
                            </div>
                            </div>
                          </div> 
                        </div>
                       
                    <div id="invoice-data"></div>
                
              
          <!-- invoice tab data ends-->
          </div>
		   <div class="tab-pane fade show" id="membership-tab-pane" role="tabpanel" aria-labelledby="membership-tab" tabindex="0">
                    <h4 class="tabtitle">Membership</h4>
                    <div class="sellersearch mb-3">
                    <div class="s-search">
                        <input type="text" placeholder="Search by Listing Name" id="search-m">
                        <i class="bi bi-search"></i>
                    </div>
                   <!-- <a class="btn btn-post" href="<?= base_url(); ?>/seller/add-product">Add New Product</a>-->
                    </div>
                    <div class="tableresponsive">
                    <table class="table">
                        <thead style="border-radius:20px; margin-bottom: 20px !important;">
                        <tr>
                            <th scope="col"  style="border-radius:5px 0px 0px 5px; text-align:left;padding-left: 20px;">Product</th>
                            <th scope="col">Membership Type</th>
							 <th scope="col">Timeline</th>
							 <th scope="col">Price</th>
                           
							<th scope="col">Status</th>
                           
                        </tr>
                        </thead>
                        <tbody id="membership-data">
						
                        </tbody>
                    </table>
                    </div>
				  
				  </div>
				</div>
			</div>

        </div>
      </div>
	        <script>
			
						$("#search-m").keyup(function(event){					
                            if (event.keyCode == '13') {
								//alert("kk");		
                                callmembership($("#search-m").val());
                            //...
                            }
                        });

			
			
			callproducts("");
			function callproducts(searchtxt){
				 $.ajax({
                    url: "<?= base_url(); ?>/products",
                    type: "POST",						
                    data:  {searchtxt:searchtxt},					   
                    success: function(response) {
                      $('#product-data').html(response);
                      
                          }
                  });
			}
			
        callorders("");
        function callorders(searchtxt){
        $.ajax({
                    url: "<?= base_url(); ?>/orders",
                    type: "POST",						
                    data:  {searchtxt:searchtxt},					   
                    success: function(response) {
                      $('#order-data').html(response);
                      
                          }
                  });
                }



                callinvoice();
                function callinvoice(){
                 
                  $.ajax({
                            url: "<?= base_url(); ?>/invoices",
                            type: "POST",						
                            data:  {fdate:"",tdate:"","type":$("#m-type").val()},					   
                            success: function(response) {
                              $('#invoice-data').html(response);
                              
                                  }
                          });
                }

                function callinvoice1(){
                  var date = new Date($('#fromdate').val());
                  var day = date.getDate();        
                  if(!isNaN(day)) {     
                      
                  var month = date.getMonth() + 1;
                  var year = date.getFullYear();
                  if(day<10){
                      day="0"+day;
                    }  
                    if(month<10){
                      month="0"+month;
                    }  
                    if(year<10){
                      year="0"+year;
                    }  
                  var fromdate=[year, month, day].join('-');
                  }else{
                    var fromdate="";
                  }

                  var date = new Date($('#todate').val());
                  var day = date.getDate();      
                  if(!isNaN(day)) {    
                    var month = date.getMonth() + 1;
                    var year = date.getFullYear();
                    if(day<10){
                      day="0"+day;
                    }  
                    if(month<10){
                      month="0"+month;
                    }  
                    if(year<10){
                      year="0"+year;
                    } 
                    var todate=[year, month, day].join('-');                 
                  }else{
                    var todate="";
                  }
                 
                
                  $.ajax({
                            url: "<?= base_url(); ?>/invoices",
                            type: "POST",						
                            data:  {fdate:fromdate,tdate:todate,"type":$("#m-type").val()},					   
                            success: function(response) {
                              $('#invoice-data').html(response);
                              
                                  }
                          });
                }

                callmembership("");
			function callmembership(searchtxt){
				 $.ajax({
                    url: "<?= base_url(); ?>/membership",
                    type: "POST",						
                    data:  {searchtxt:searchtxt},					   
                    success: function(response) {
                      $('#membership-data').html(response);
                      
                          }
                  });
			}
      </script>
   <!-- Modal -->
   <div class="modal" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header border-0">
                  <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> -->
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body" id="order-body">
               
              </div>
            </div>
         </div>
      </div>
	  <!-- order modal end -->
<!--invoice detail print Modal starts -->
<div class="modal fade" id="invoicedetailModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="invoicebody">
	
      </div>
    </div>
  </div>
</div>
	  
	  <!-- invoice detail modal end-->
    <script>
   
function callordermodal(orderid){
 // alert("call modal");
 // $("#orderModal").modal('show');
    $.ajax({
						url: "<?= base_url(); ?>/orders_modals",
						type: "POST",
						//data: $('#postcreate').serialize(),
						data: {"orderid":"'"+orderid+"'"},					  
						success: function(response) {
              $("#order-body").html(response);
              $("#orderModal").modal('show');             
            }
            });
}

function invoicedetailmodal(orderid){
	
	 $.ajax({
						url: "<?= base_url(); ?>/invoicedetails_modals",
						type: "POST",
						//data: $('#postcreate').serialize(),
						data: {"orderid":"'"+orderid+"'"},					  
						success: function(response) {
							
							  $("#invoicebody").html(response);
							  $("#invoicedetailModal").modal('show');             
							}
            });
}
    </script>
<?php echo $this->render('include/footer'); ?>
