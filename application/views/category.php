<div class="row">
	<div class="col-md-12">
		<h1>New Category</h1>
		
		<hr />
	<form role="form" method="post" action="<?php echo base_url();?>index.php/admin/category" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-4">
			  <div class="form-group">
				<label for="Category">Category</label>
				<input type="text" class="form-control" id="Category" name="category" placeholder="Enter Category" required>
			  </div>
		  </div>
		  
		  <div class="col-md-4">
			  <div class="form-group">
				<label for="navi">Navigation Icon</label>
				<input type="file" class="form-control" id="navi" name="navi"  required>
			  </div>
		  </div>
	</div>

  <button type="submit" name="catBtn" class="btn btn-default">Submit</button>
</form>
	
		<hr />
		<table class="table table-stripped table-bordered tab">
				<tr>
					<th colspan='5'>Category List</th>
				</tr>
				<tr>
					<th>Name</th>
					<th>Action</th>
				</tr>
				<?php
				if(@$list){
					foreach($list as $lst)
					{
						?>
							<tr>			
								<td><?php echo $lst->categoryName;?></td>
								<td>
									<a href="<?php echo base_url();?>index.php/admin/deleteCategory/<?php echo $lst->id; ?>" class="btn btn-danger">Delete</a>
								</td>
							</tr>
						<?php
					}
				}?>
		</table>
	
	</div>
	
	
	
</div>