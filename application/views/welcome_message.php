<div class="row">
	 <div class="col-md-4 col col-md-offset-4 center borderShade"> 
	 
				<img src="<?php echo base_url();?>public/images/logo.png" width="70%" class="frontLogo">
			<h1>food4thought</h1>
			<?php if($this->session->flashdata('message')){?>
			<div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('message');?></div>
			<?php } ?>
					<form role="form" method="post" action="<?php echo base_url();?>index.php/welcome/validate">
					  <div class="form-group change">
						<label for="exampleInputEmail1">Email address</label>
						<input type="email" required class="form-control" id="exampleInputEmail1" name="username" placeholder="Enter email">
					  </div>
					  <div class="form-group change">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
					  </div>
					  <button type="submit" class="btn btn-default subtn">Submit</button>
					</form>
	</div>
</div>

