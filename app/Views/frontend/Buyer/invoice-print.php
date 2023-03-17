<div class="row <?php if(!isset($print)){?>invoice-print<?php }?>  pb-5" >
<div class="col-md-12">
  <div class="tableresponsive">
	 <table class="table">
		<thead style="border-radius:20px; margin-bottom: 20px !important;">
		   <tr>
			  <th scope="col"  style="border-radius:5px 0px 0px 5px; text-align:left;padding-left: 20px;">Invoice ID</th>
			  <th scope="col">Order ID</th>
			  <th scope="col">Date</th>
			  <!--<th scope="col">Invoice Type</th>-->
			  <!--<th scope="col">Status</th>-->
			  <th scope="col">Price</th>
		   </tr>
		</thead>
		<tbody>
		   <tr>
			  <td><?= $v['id'];?></td>
			  <td><?= $v['id'];?></td>
			  <td><?= Date("M d, Y",$v['order_at']); ?></td>   
			  <!--<td>Highlight Plan</td>-->
			  <!--<td>Amount Paid</td>-->
			  <td><?= $v['currency']." ".$v['pay_amt'];?></td>
		   </tr>
		</tbody>
	 </table>
  </div>
    <div class="orderdel pb-5">
   
			<div class="detailsinner mb-3" style="display: flex;align-items: center;justify-content: space-between;font-size: 20px;">
				<p> <span class="wset"><b>Invoice No.:</b></span><span class="greycolor"><?= $v['id'];?></span></p>
				<a href="#" class="btncomon" style="    color: #A228B6; border: 1px solid #A228B6; padding: 6px 20px;border-radius: 8px" onclick="printDiv()">Print</a>
			</div>
			<div class="invoicemain" id="invoice-print">
			<div class="detailsinner">
				<p><span class="wset"><b>Invoice No.:</b></span><span class="greycolor"><?= $v['id'];?></span></p>
				<p><span class="wset"><b>Period :</b></span><span class="greycolor"><?= Date("d-m-Y H:i",strtotime($v['lease_start']))." to ".Date("d-m-Y H:i",strtotime($v['lease_end']));?></span></p>
				<p><span class="wset"><b>No of hours :</b></span><span class="greycolor"><?= $v['total_lease_days']." ".$v['total_lease_type'];;?></span></p>
				<p><span class="wset"><b>Stock :</b></span><span class="greycolor"><?= $v['quantity'];?></span></p>
				<p><span class="wset"><b>Price per hour :</b></span><span class="greycolor"><?= $v['rent_per_day'];?></span></p>
				<p><span class="wset"><b>Product :</b></span><span class="greycolor"><?= $v['title'];?></span></p>
				<p><span class="wset"><b>Rented By :</b></span><span class="greycolor"><?= $v['seller_fname']." ".$v['seller_lname']?></span></p>
				<p><span class="wset"><b>Email :</b></span><span class="greycolor"><?= $v['seller_email']?></span></p>
				<p><span class="wset"><b>Phone :</b></span><span class="greycolor"><?= $v['country_pre']." ".$v['seller_phone'];?></span></p>
			</div>
		
		<ul class="costprice">
			<li>Cost :<br> <span class="greycolor">Sub Total</span></li>
			<li>Price :<br> <span class="greycolor"><?= $v['currency']." ".$v['rent_per_day'];?></span></li>
			<li>Details :<br> <span class="greycolor"><?= $v['total_lease_days']." ".$v['total_lease_type'];?> x <?= $v['currency']." ".$v['rent_per_day'];?></span></li>
		</ul>
		<div class="detailsinner">
			<p><span class="wset"><b>User Pays :</b></span><span class="greycolor"><?= $v['currency']." ".$v['pay_amt'];?></span></p>
			<p><span class="wset"><b>Balance :</b></span><span class="greycolor"><?= $v['balance'];?></span></p>
			<p><span class="wset"><b>You Earned :</b></span><span class="greycolor"><?= $v['currency']." ".$v['earned_amt'];?></span></p>
			<p style="color:#EB2424;">*we deduct security deposit, city fees, cleaning fees and website service fee</p>
			<p><span class="wset"><b>Service Fee :</b></span><span class="greycolor"><?= $v['currency']." ".$v['service_fee'];?></span></p>
			<p><span class="wset"><b>Taxes :</b></span><span class="greycolor"><?= $v['currency']." ".$v['taxes'];?></span></p>
			<p style="color:#EB2424;">*taxes are included in your earnings and you are responsible for paying these taxes</p>
		</div>
		</div><!-- invoice main div ends-->
    </div>
</div> 
</div>
<script>
 $("a.invoice").click(function(){
             $(".invoice-print").toggleClass('intro');
           });

    function printDiv() {
            var divContents = document.getElementById("invoice-print").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body > <h3>Invoice Details : </h3>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
</script>