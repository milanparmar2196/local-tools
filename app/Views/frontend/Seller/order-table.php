 <?php
 if(!empty($orders)){
 foreach($orders as $v){?>
                        <tr  onclick="callordermodal('<?= base64_encode($v['id']); ?>')"  style="cursor: pointer;">
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
                            <td><?= $v['total_lease_days'];?><br/>
                                    <span class="greycolor"><?= Date("d M",strtotime($v['lease_start']))." to ".Date("d M",strtotime($v['lease_end']));?></span>
                                
                         </td>
                             <td><?= $v['currency']." ".$v['total_rent'];?></td>
                            <td><?= $v['quantity'];?></td>
							<td><?= $v['first_name']." ".$v['last_name'];?></td>
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
                        <?php }}else{ ?>
                                <tr><td colspan="6">No data found</td></tr>
                            <?php }?>

                           