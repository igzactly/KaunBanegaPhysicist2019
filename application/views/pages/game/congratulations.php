<body onload="playIntro()">
  <script type="text/javascript">
    function playIntro(){
       var x = document.getElementById("introMusic"); 
              x.play();
    }
  </script>
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
<div class="row">
	<div class=WordSection1>

<p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
style='mso-no-proof:yes'><!--[if gte vml 1]><v:shapetype id="_x0000_t75"
 coordsize="21600,21600" o:spt="75" o:preferrelative="t" path="m@4@5l@4@11@9@11@9@5xe"
 filled="f" stroked="f">
 <v:stroke joinstyle="miter"/>
 <v:formulas>
  <v:f eqn="if lineDrawn pixelLineWidth 0"/>
  <v:f eqn="sum @0 1 0"/>
  <v:f eqn="sum 0 0 @1"/>
  <v:f eqn="prod @2 1 2"/>
  <v:f eqn="prod @3 21600 pixelWidth"/>
  <v:f eqn="prod @3 21600 pixelHeight"/>
  <v:f eqn="sum @0 0 1"/>
  <v:f eqn="prod @6 1 2"/>
  <v:f eqn="prod @7 21600 pixelWidth"/>
  <v:f eqn="sum @8 21600 0"/>
  <v:f eqn="prod @7 21600 pixelHeight"/>
  <v:f eqn="sum @10 21600 0"/>
 </v:formulas>
 <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
 <o:lock v:ext="edit" aspectratio="t"/>
</v:shapetype><v:shape id="Picture_x0020_1" o:spid="_x0000_i1025" type="#_x0000_t75"
 style='width:106.5pt;height:134pt;visibility:visible;mso-wrap-style:square'>
 <v:imagedata src="Congratulations_files/image001.jpg" o:title=""/>
</v:shape><![endif]--><![if !vml]><img width=142 height=179
src="http://localhost/kaunBanegaPhysicist/assets/images/backgrounds/logo1.jpg" v:shapes="Picture_x0020_1"><![endif]></span><b
style='mso-bidi-font-weight:normal'><span style='font-size:36.0pt;line-height:
150%;font-family:"Arial",sans-serif'><o:p></o:p></span></b></p>

<p class=MsoNormal align=center style='text-align:center;line-height:200%'><b
style='mso-bidi-font-weight:normal'><span style='font-size:36.0pt;line-height:
200%;font-family:"Arial",sans-serif;color:red'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal align=center style='text-align:center;line-height:150%'><b
style='mso-bidi-font-weight:normal'><span style='font-size:36.0pt;line-height:
150%;font-family:"Arial",sans-serif;color:red'>Congratulations to the Budding
Physicist</span></b><b style='mso-bidi-font-weight:normal'><span
style='font-size:36.0pt;line-height:150%;font-family:"Arial",sans-serif'><o:p></o:p></span></b></p>

</div>
</div>
</div>
<?php
$this->session->sess_destroy();
?>
<audio id="introMusic">
  <source src="http://localhost/kaunBanegaPhysicist/assets/sounds/intro.mp3" type="audio/ogg">
  
  
</audio>