<div class="row">
	<div class="col-md-12">
		
		
		
		
<?php if($this->uri->segment(3) == 'created'){?>		
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
<?php }else{ ?>
<a href="<?php echo base_url();?>index.php/admin/user/created" class="btn btn-primary " id="createA">Create </a>
<hr />
	<table class="table table-stripped table-bordered tab">
				<tr>
					<th colspan='5'>User List</th>
				</tr>
				<tr>
					<th>Username</th>
					<th>Role</th>
				</tr>
				<?php
				if(@$list){
					foreach($list as $lst)
					{
						?>
							<tr>			
								<td><?php echo $lst->username;?></td>
								<td><?php echo $lst->roleType;?></td>
								<td>
									<a href="<?php echo base_url();?>index.php/admin/deleteUser/<?php echo $lst->id; ?>" class="btn btn-danger">Delete</a>
								</td>
							</tr>
						<?php
					}
				}?>
		</table>
<?php }?>
	</div>
</div>