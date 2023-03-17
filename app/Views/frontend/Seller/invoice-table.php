<div class="row">
    <div class="col-md-12">
    <p class="greycolor">Reservation fees filter applies only to the invoices issued by you!</p>
    </div>
</div>
    <div class="row">
    <div class="col-md-6">
        <div class="detailsinner">
        <p><span class="wset" style=" width: auto; margin-right: 10px;"><b>Total Invoices Confirmed:</b></span><span class="greycolor"><?php if($pay_amt>0){?><?= $pay_amt." ".$invoices[0]['currency'];?><?php }else{ echo 0;}?></span></p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="detailsinner">
            <p><span class="wset" style=" width: auto; margin-right: 10px;"><b>Total Invoices Issued:</b></span><span class="greycolor"><?= count($invoices);?></span></p>
        </div>
    </div>
</div>
<div class="tableresponsive">
        <table class="table">
        <thead style="border-radius:20px; margin-bottom: 20px !important;">
            <tr>
            <th scope="col"  style="border-radius:5px 0px 0px 5px; text-align:center;">Invoice</th>
            <th scope="col">Order ID</th>
            <th scope="col">Date</th> 
			<th scope="col">Invoice Type</th> 
            <th scope="col">Price</th>
            <th scope="col" style="border-radius:0px 5px 5px 0px;text-align:right;padding-right: 20px;"></th>
            </tr>
        </thead>
        <tbody>
          <?php 
		  if(!empty($invoices)){
		  foreach($invoices as $l){?>
            <tr  onclick="invoicedetailmodal('<?= base64_encode($l['id']); ?>')" style="cursor:pointer;">
                <td><?= $l['id']; ?></td>
                <td><?= $l['id']; ?></td>
                <td><?= Date("M d, Y",$l['order_at']); ?></td>   
				<td><?= $l['membership'];?></td>
                <td><?= $l['currency']." ".$l['pay_amt'];?></td>
                <td style="text-align:right;width:130px;"> <button class="btn btn-post" style="white-space: nowrap;">View Details</button></td>
            </tr>
            <?php }
			  }else{ ?>
		  <tr><td colspan="4">
		  No Data Found
		  </td>
		  </tr>
		  <?php }?>
         </tbody>
    </table>                        
</div>
                      
                    