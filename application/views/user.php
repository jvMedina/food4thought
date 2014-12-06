<div class="row">
	<div class="col-md-12">
		<h1>New User</h1>
		
		<hr />
	<form role="form" method="post" action="<?php echo base_url();?>index.php/admin/user">
  <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" required>
  </div>
  
    <div class="form-group">
    <label for="Client">Client</label>
	<select name="client" class="form-control" required>
	
			<?php foreach($client as $cat){
			echo '<option value="'.$cat->id.'">'.$cat->clientName.'</option>';
		}?>
	</select>
	</div>
	
	
	<div class="form-group">
    <label for="category">Category</label>
	<select name="category[]" class="form-control" required multiple>
	
		<?php foreach($category as $cat){
			echo '<option value="'.$cat->id.'">'.$cat->categoryName.'</option>';
		}?>
	</select>
	</div>
  
  <button type="submit" name="userBtn" class="btn btn-default">Submit</button>
</form>
	</div>
</div>