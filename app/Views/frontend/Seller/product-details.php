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
									<td><?= $v['currency'];?> <?= $v['amount'];?>/<?= $v['duration'];?></td>
									<!--<td>Daily</td>-->
								<td><?= $v['stocks'];?></td>
									<td style="width:110px;">
								<div class="search-filter">
										<div class="search-area searchtable">
											<select class="form-select" onchange="changestatus(this.id,this.value)" id="<?= $v['id'];?>">
												<option value="active" <?php if($v['status']=="active"){?> selected=""<?php }?>>Active</option>
												<option value="deactivate" <?php if($v['status']=="deactivate"){?> selected=""<?php }?>>Inactive</option>
											</select>
											
									<i class="bi bi-chevron-down"></i>
										</div>
									</div>
									<script>
												function changestatus(id,value){
													 $.ajax({
													url: "<?= base_url(); ?>/changestatus",
													type: "POST",						
													data:  {id:id,status:value},					   
													success: function(response) {
													  
													  
														  }
												  });
												}
											</script>
								</td>
									<td style="text-align:right;width:110px;"> <span class="editdeltab"><a href="<?= base_url().'/deleteproduct?id='.$v['id']; ?>"><img src="<?= base_url(); ?>/public/image/delete.png" style="width: 30px;"></></a> <a href="<?= base_url(); ?>/seller/add-product"><img src="<?= base_url(); ?>/public/image/edit.png" style="width: 30px;"></a></span></td>
							</tr>
							<?php }}?>
                       