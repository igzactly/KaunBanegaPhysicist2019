<body>
	
<div class="page-container">
<div class="page-content">
<div class="content-wrapper">
<div class="row">

<div class="panel panel-primary">
	<div class="panel-heading">
		<h2 class="panel-title animation" data-animation="bounceInRight">
			Final Score For Team  <?php echo $this->session->userdata('team_name');?>
			
		</h2>
		
	</div>
</div>

	<div>

  <center>
    <div class="panel panel-primary">
	<div class="panel-heading">
		<h2 class="panel-title animation" data-animation="bounceInRight">
			Final Score For Team  <?php echo $this->session->userdata('team_name');?> is <br><?php echo $this->session->userdata('score'); ?>
			
		</h2>
		
	</div>
</div>
    
  </center>
  </div>
</div>
</div>
</div>
<?php
$this->session->sess_destroy();
?>

