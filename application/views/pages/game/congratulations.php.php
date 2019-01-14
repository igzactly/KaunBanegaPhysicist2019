<body >
<div class="container"> 
    
<div class="row">
    <b>
<div class="col-lg-4">   
<h2 >Team  <?php  if($this->session->userdata('team_name')){
                    echo $this->session->userdata('team_name');
                    
                    }
                    
                    
                    else{
                        header("location: ". base_url()."game");
                        }
                        ?> 
                    </h2>
</div>
<div class="col-lg-2">
    <center>
    <h2 id="demo" style="background-color: yellow;color: :red;"></h2>
</center>
</div>
<div class="col-lg-3">
    <h2 style="color:  #ff0000;">
        Score <score id="score"><?php echo $this->session->userdata('score'); ?></score>
    </h2>
    
</div>

</b>
</div>

</div>
<?php
$this->session->sess_destroy();
?>
