<div class="row">
	<div class="col-sm-12">
		<?php if (session()->getFlashdata('success') !== NULL) :?>
			 <div class="alert alert-success">			
				<?php echo session()->getFlashdata('success'); ?>
			  </div>
		<?php endif; ?>
		<?php if (session()->getFlashdata('error') !== NULL) : ?>
			<div class="alert alert-danger">			
				<?php echo session()->getFlashdata('error'); ?>
			 </div>
		<?php endif; ?>
	</div>
</div>