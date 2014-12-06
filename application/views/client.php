<div class="row">
	<div class="col-md-12">
		<h1>New Client</h1>
		
		<hr />
	<form role="form" method="post" action="<?php echo base_url();?>index.php/admin/client">
  <div class="form-group">
    <label for="Client">Client</label>
    <input type="text" class="form-control" id="Client" name="client" placeholder="Enter Client" required>
  </div>
  
  <button type="submit" name="clieBtn" class="btn btn-default">Submit</button>
</form>

	<hr />
		<table class="table table-stripped table-bordered tab">
				<tr>
					<th colspan='5'>Client List</th>
				</tr>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
				<?php
				if(@$list){
					foreach($list as $lst)
					{
						?>
							<tr>			
								<td><?php echo $lst->clientName;?></td>
								<td><?php echo $lst->desc;?></td>
								<td>
									<a href="<?php echo base_url();?>index.php/admin/deleteClie/<?php echo $lst->id; ?>" class="btn btn-danger">Delete</a>
								</td>
							</tr>
						<?php
					}
				}?>
		</table>
	</div>
</div>