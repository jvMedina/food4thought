<div  class="row">
	 <div class="jumbotron">
        <h1>Welcome, <span id="greenDo" style="color:#176C25;"><?php 
		$data = ($this->session->userdata('information'));
		echo $data['username'];
		?>!</span></h1> 
      </div>
</div>