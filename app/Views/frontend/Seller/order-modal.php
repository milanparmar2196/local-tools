
<div class="tableresponsive">
    <table class="table">
    <thead style="border-radius:20px; margin-bottom: 20px !important;">
        <tr>
            <th scope="col"  style="border-radius:5px 0px 0px 5px; text-align:left;padding-left: 20px;">Order Id</th>
            <th scope="col"  style="">Product</th>
            <th scope="col">rent</th>
            <th scope="col">Lease Period</th>
            <th scope="col">Total Rent</th>
            <th scope="col">Quantity</th>
			 <th scope="col">Order By</th>
            <th scope="col" style="border-radius:0px 5px 5px 0px;">Status</th>
        </tr>
    </thead>
    <tbody>
	<?php if(!empty($v) && count($v)>0){?>
        <tr>
            <td><?= $v['id']; ?></td>
            <td>
                                <div class="d-flex tablemedia">
                                    <div class="flex-shrink-0"><!-- "<?= base_url(); ?>/public/image/morgan.png"-->
                                    <?php 
                                    $img=base_url().'/public/uploads/seller-products/'.$v['image_name'];                                    
                                    ?>
                                    <img src="<?= $img;?>" alt="" style="width:45px;">
                                    </div>
                                    <div class="tablemediatext">
                                    <h5><?= $v['title'];?></h5>
                                    <p><span class="greycolor">Category</span> <?= $v['category']?><br><span class="greycolor">City</span> <?= $v['city'];?></p>
                                    </div>
                                </div>
                            </td>
                            <td><?= $v['currency']." ".$v['rent_per_day'];?></td>
                            <td><?= $v['total_lease_days']." ".$v['total_lease_type'];?><br/>
                                    <span class="greycolor"><?= Date("d M",strtotime($v['lease_start']))." to ".Date("d M",strtotime($v['lease_end']));?></span>
                                
                         </td>
                             <td><?= $v['currency']." ".$v['total_rent'];?></td>
                            <td><?= $v['quantity'];?></td>
							<td><?= $v['orderuserfname']." ".$v['orderuserlname'];?></td>
                            <?php 
                            
                            $color="#fec9cc";
                            $tcolor="#fe2b37";
                            if($v['status']==1){//	1->pending,2->delivered,3->returned,4->completed,5->cancelled,6->rejected
                                $status="Pending";
                                $color="alert-primary";
                            }
                           else if($v['status']==2){//	1->pending,2->delivered,3->returned,4->completed,5->cancelled,6->rejected
                                $status="Delivered";
                                $color="alert-success";
                                
                            }
                            else if($v['status']==3){//	1->pending,2->delivered,3->returned,4->completed,5->cancelled,6->rejected
                                $status="Returned";
                                $color="alert-danger";
                            }
                            else if($v['status']==4){//	1->pending,2->delivered,3->returned,4->completed,5->cancelled,6->rejected
                                $status="Completed";
                                $color="alert-success";
                            }
                            else if($v['status']==5){//	1->pending,2->delivered,3->returned,4->completed,5->cancelled,6->rejected
                                $status="Cancelled";
                                $color="alert-danger";
                            }
                            else if($v['status']==6){//	1->pending,2->delivered,3->returned,4->completed,5->cancelled,6->rejected
                                $status="Rejected";
                                $color="alert-warning";
                            }else{
                                $status="Pending";
                                $color="alert-primary";
                            }
                            ?>
                            <td><a class="alert <?= $color;?>"><?= $status;?></a>
                        </td>
                    </tr>
	<?php }?>
    </tbody>
    </table>
</div>
<?php //print_r($v);?>

<div class="row">
    <div class="col-md-4">
    <div class="orderform">
        <h4 class="yellowcolor">Order From</h4>
        <h4><?= $v['seller_fname']." ".$v['seller_lname'];?></h4>
        <div class="d-flex">
            <div class="flex-shrink-0">
                <img src="<?= base_url(); ?>/public/image/location.png" alt="..." style="width:18px;">
            </div>
            <div class="flex-grow-1 ms-3">
                <p class="greycolor"><?= $v['listing_address1'];?>,  <?= $v['listing_address2'];?> , <?= $v['seller_city'] ;?>, <?= $v['seller_pincode']?> , <?= $v['seller_state']?>,<?= $v['seller_country'] ?></p>
            </div>
        </div>
        <div class="d-flex">
            <div class="flex-shrink-0">
                <img src="<?= base_url(); ?>/public/image/call.png" alt="..." style="width:18px;">
            </div>
            <div class="flex-grow-1 ms-3">
                <p><a href="tell:<?= $v['country_pre']." ".$v['seller_phone'];?>" class="greycolor"><?= $v['country_pre']." ".$v['seller_phone'];?></a></p>
            </div>
        </div>
        <div class="d-flex">
            <div class="flex-shrink-0">
                <img src="<?= base_url(); ?>/public/image/email.png" alt="..." style="width:18px;">
            </div>
            <div class="flex-grow-1 ms-3">
                <p><a href="mailto:<?= $v['seller_email'];?>" class="greycolor"><?= $v['seller_email'];?></a></p>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-4">
    <div class="orderform">
        <h4 class="yellowcolor">Order By</h4>
        <h4><?= $user['first_name']." ".$user['last_name'];?></h4>
        <div class="d-flex">
            <div class="flex-shrink-0">
                <img src="<?= base_url(); ?>/public/image/location.png" alt="..." style="width:18px;">
            </div>
            <div class="flex-grow-1 ms-3">
                <p class="greycolor"><?= $user['city'];?>,  <?= $user['state'];?> , <?= $user['zipcode'] ;?>,<?= $user['country_name'] ?></p>
            </div>
        </div>
        <div class="d-flex">
            <div class="flex-shrink-0">
                <img src="<?= base_url(); ?>/public/image/call.png" alt="..." style="width:18px;">
            </div>
            <div class="flex-grow-1 ms-3">
                <p><a href="tell:<?= $user['country_pre']." ".$user['phone'];?>" class="greycolor"><?= $user['country_pre']." ".$user['phone'];?></a></p>
            </div>
        </div>
        <div class="d-flex">
            <div class="flex-shrink-0">
                <img src="<?= base_url(); ?>/public/image/email.png" alt="..." style="width:18px;">
            </div>
            <div class="flex-grow-1 ms-3">
                <p><a href="mailto:<?= $user['email'];?>" class="greycolor"><?= $user['email'];?></a></p>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-4">
    <div class="orderform">
        <h4 class="yellowcolor">Payment Details</h4>
        <div class="detailsinner">
            <p><span class="wset"><b>Invoice No.:</b></span><span class="greycolor"><?= $v['id'];?></span></p>
            <p><span class="wset"><b>Pay Amount :</b></span><span class="greycolor"><?= $v['currency']?>  <?= $v['pay_amt'];?></span></p>
            <p><span class="wset"><b>Balance :</b></span><span class="greycolor"><?= $v['balance'];?></span></p>
        </div>
    </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <div class="orderdel">
        <div class="orderdelbox">
            <div class="orderdelboxinner">
                <h4>Order</h4>
                <span class="greenbg bgbox"></span>
                <p class="greycolor"><?= Date("D, d M Y",$v['order_at']);?></p>
            </div>
            <?php if(!empty($v['deliver_at']) && !is_null($v['deliver_at'])){?>
            <div class="orderdelboxinner">
                <h4>Delivered</h4>
                <span class="greenbg bgbox"></span>
                <p class="greycolor"><?= Date("D, d M Y",$v['deliver_at']);?></p>
            </div>
            <?php } ?>
            <?php if(!empty($v['return_at']) && !is_null($v['return_at'])){?>
            <div class="orderdelboxinner">
                <h4>Returned</h4>
                <span class="greenbg bgbox beforenone"></span>
                <p class="greycolor"><?= Date("D, d M Y",$v['return_at']);?></p>
            </div>
            <?php } ?>
        </div>
        <div class="d-flex invoiceorder">
            <a href="#" class="btncomon invoice" style="background:#FFC10E;" style="cursor: pointer;">Invoice Detailed</a>
            <a href="#" class="btncomon alert <?= $color;?>"><?= $status;?></a>
            <a href="#" class="btncomon" style="background:#000;color:#fff;">Send reminder Mail</a>
        </div>
    </div>
    </div>
</div>
</div>
<?php echo $this->render('frontend/Buyer/invoice-print'); ?>

              