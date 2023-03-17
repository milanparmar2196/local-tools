<?php if(!empty($products)){
							foreach($products as $k=>$v){
								//print_r($v);die();
							?>
                        <tr>
                            <td>
								<div class="d-flex tablemedia">
								<div class="flex-shrink-0">
								<img src="<?= base_url(); ?>/public/uploads/seller-products/<?= $v['image_name'];?>" alt="m" style="width:45px;">
								</div>
								<div class="tablemediatext">
								<h5><?= $v['title'];?></h5>
								<p><span class="greycolor">Category</span> <?= $v['category']?><br><span class="greycolor">City</span> <?= $v['city'];?></p>
								</div>
								</div>
									</td>
									<td><?= $v['membership'];?></td>
									<td><?= $v['sduration'];?></td>
									<td><?= $v['currency'];?> <?= $v['samount'];?></td>
									
									<td><?= ucfirst($v['status']);?></td>
								
									</tr>
							<?php }}?>
                       