<?php echo $this->render('include/header'); ?>
    <?php echo $this->render('include/navbar'); ?>
      <div class="main">
        <!-- Mobile Menu -->
        <?php echo $this->render('include/m-sidebar'); ?>
        <?php echo $this->render('include/buyer-account-menu'); ?>
        <div class="main-section">
		<div class="w-100 mangeprofiles">
		    <ul class="breadcrumb w-100">
                <li><a href="#"> Home</a> / </li>
                <li><a href="#" class="greycolor"> Manage Profile / Buyer account</a></li>
            </ul>
		</div>
        
        <div class="selleraccount">
				<ul class="nav nav-tabs" id="myTab" role="tablist">				 
				  <li class="nav-item" role="presentation">
					<button class="nav-link active" id="order-tab" data-bs-toggle="tab" data-bs-target="#order-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><img src="<?= base_url(); ?>/public/image/order.png" class="dimg"> <img src="<?= base_url(); ?>/public/image/order-w.png" class="himg">order</button>
				  </li>
				  <li class="nav-item" role="presentation">
					<button class="nav-link" id="message-tab" data-bs-toggle="tab" data-bs-target="#message-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane1" aria-selected="false"><img src="<?= base_url(); ?>/public/image/message.png" class="dimg"><img src="<?= base_url(); ?>/public/image/message-w.png" class="himg">Messages</button>
				  </li>
				  <li class="nav-item" role="presentation">
					<button class="nav-link" id="invoice-tab" data-bs-toggle="tab" data-bs-target="#invoice-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane2" aria-selected="false"><img src="<?= base_url(); ?>/public/image/invoice.png" class="dimg"><img src="<?= base_url(); ?>/public/image/invoice-w.png" class="himg">Invoice</button>
				  </li>
				  <li class="nav-item" role="presentation">
					<button class="nav-link" id="analytics-tab" data-bs-toggle="tab" data-bs-target="#analytics-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane3" aria-selected="false"><img src="<?= base_url(); ?>/public/image/invoice.png" class="dimg"><img src="<?= base_url(); ?>/public/image/invoice-w.png" class="himg">Analytics</button>
				  </li>
				</ul>
				<div class="tab-content" id="myTabContent">				  
				  <div class="tab-pane fade show active" id="order-tab-pane" role="tabpanel" aria-labelledby="order-tab" tabindex="0">
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
                                callorders($("#search-product").val());
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
                             <th scope="col" style="border-radius:0px 5px 5px 0px;text-align:center;padding-right: 20px;">Status</th>
                        </tr>
                        </thead>
                        <tbody id="order-data">
                           
                        </tbody>
                    </table>
                    </div>
				  
				  </div>
				  <div class="tab-pane fade" id="message-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0"></div>
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
                      
                        </div>
                       
                    <div id="invoice-data"></div>
                
              
          <!-- invoice tab data ends-->
          </div>
		  <!-- Analytics code starts-->
		   <div class="tab-pane fade" id="analytics-tab-pane" role="tabpanel" aria-labelledby="disabled-tab3" tabindex="0">
				  <h4 class="tabtitle">Analytics</h4>
				  <div class="row mb-3">
						<div class="col-md-3">
						<div class="bgwhite p-3 analytcsmain">
						<div class="d-flex">
						  <div class="flex-shrink-0">
							<img src="<?= base_url();?>/public/image/a1.png" alt="...">
						  </div>
						  <div class="flex-grow-1 ms-3">
							<h4>Total Spend</h4>
						  </div>
						</div>
						<h4 style="color:#38E25D;"><?php if(isset($invoices) && count($invoices)>0){ ?><?= $invoices[0]['currency']." ".$pay_amt;?><?php }else{?>0<?php }?></h4>
						</div>
						</div>
						
						<div class="col-md-3">
						<div class="bgwhite p-3 analytcsmain">
						<div class="d-flex">
						  <div class="flex-shrink-0">
							<img src="<?= base_url();?>/public/image/a2.png" alt="...">
						  </div>
						  <div class="flex-grow-1 ms-3">
							<h4>Total Orders</h4>
						  </div>
						</div>
						<h4 style="color:#FC5A5A;"><?= count($invoices);?></h4>
						</div>
						</div>
					 </div>
					 <div class="row mb-3">
					<!-- <div class="col-md-8">
					  <h4 class="tabtitle">Next Booking</h4>
					  <div class="anabooking bgwhite p-3">
					  <ul class="anabooklist">
					  <li>
					  <div class="d-flex tablemedia">
					  <div class="flex-shrink-0">
						<img src="<?= base_url();?>/public/image/morgan.png" alt="m" style="width:45px;">
					  </div>
					  <div class="tablemediatext">
						<h5>Morgan Drill Concrete</h5>
					  </div>
					  </div>
					  </li>
					  <li>Hourly</li>
					  <li>04-02-23 01:00 to 04-02-23 04:00</li>
					  </ul>
					  <ul class="anabooklist">
					  <li>
					  <div class="d-flex tablemedia">
					  <div class="flex-shrink-0">
						<img src="<?= base_url();?>/public/image/morgan.png" alt="m" style="width:45px;">
					  </div>
					  <div class="tablemediatext">
						<h5>Morgan Drill Concrete</h5>
					  </div>
					  </div>
					  </li>
					  <li>Hourly</li>
					  <li>04-02-23 01:00 to 04-02-23 04:00</li>
					  </ul>
					  </div>
					  
					 </div>-->
					 <div class="col-md-4"><!-- 12-->
					  <h4 class="tabtitle">Account History (last 7 days)</h4>
					  <div class="anabooking bgwhite p-3">
					  <?php 
					  if(!empty($lastsevendaysData) && count($lastsevendaysData)>0){
						  foreach($lastsevendaysData  as $p){
					  ?>
					  <ul class="anabooklist">
						<li><?= Date('M d, Y H:i A',$p['order_at']);?><br> <b>Generated Invoice Invoice <?= $p['id']?></b></li>
					  </ul>					  
					  <?php }}else{?>
					  No Data Found
					  <?php }?>
					  </div>
					 </div>
					 </div>
				   
				  </div>
		  <!-- Analtics code ends-->
          
				</div>
			</div>

        </div>
      </div>
      <script>
        callorders("");
        function callorders(searchtxt){
        $.ajax({
                    url: "<?= base_url(); ?>/buyer/buyer_orders",
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
                            url: "<?= base_url(); ?>/buyer/buyer_invoices",
                            type: "POST",						
                            data:  {fdate:"",tdate:""},					   
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
                 
                 
                 if(fromdate=="" || todate==""){
                  return false;
                 }
                
                  $.ajax({
                            url: "<?= base_url(); ?>/buyer/buyer_invoices",
                            type: "POST",						
                            data:  {fdate:fromdate,tdate:todate},					   
                            success: function(response) {
                              $('#invoice-data').html(response);
                              
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
						url: "<?= base_url(); ?>/buyer/orders_modal",
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
						url: "<?= base_url(); ?>/buyer/invoicedetails_modal",
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

