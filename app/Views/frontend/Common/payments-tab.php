
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
	<button class="nav-link <?php if($tab=="payment"){?>active <?php }?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><img src="<?= base_url();?>/public/image/listing-b.png" class="dimg"><img src="<?= base_url();?>/public/image/listing.png" class="himg"> Get Paid</button>
  </li>
  <li class="nav-item" role="presentation">
	<button class="nav-link <?php if($tab=="billing"){?>active <?php }?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" tabindex="-1"><img src="<?= base_url();?>/public/image/biling.png" class="dimg"><img src="<?= base_url();?>/public/image/biling-w.png" class="himg"> Billing & Payments</button>
  </li>
</ul>