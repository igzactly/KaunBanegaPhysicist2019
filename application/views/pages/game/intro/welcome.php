<style type="text/css">
  .class1{
    background-image: url("assets/images/logo.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
<body background = "s#fffff">
<div class="page-container">
<div class="page-content">
<div class="content-wrapper">
<div class="row">

<div class="panel panel-primary">
	<div class="panel-heading">
		<h2 class="panel-title animation" data-animation="bounceInRight">
			Welcome to Kaun Banega Physicist 
			
		</h2>
				
	</div>
</div>

	<div>

  <center>

  <table>

  <tr>
  <td><button class="btn btn-primary" id="Born" style="height: 60px;width: 200px; font-weight: bold; font-size: 31px" onclick="startGame('Born',1)"> Born</button> </td> 
  <td width = 50></td> 
  <td><button class="btn btn-primary" id="Lande" style="height: 60px;width: 200px; font-weight: bold; font-size: 31px" onclick="startGame('Lande',2)"> Lande</button> </td>
  <td width = 50></td>
  <td><center><button class="btn btn-primary" id="Debye" style="height: 60px;width: 200px; font-weight: bold; font-size: 31px" onclick="startGame('Debye',3)"> Debye</button></center> </td>
  <td width = 50></td>
  <td><button class="btn btn-primary" id="Sommerfield" style="height: 60px;width: 200px; font-weight: bold; font-size: 31px" onclick="startGame('Sommerfield',4)"> Sommerfield</button> </td>
  <td width = 50></td>
  <td><button class="btn btn-primary" id="Bohm" style="height: 60px;width: 200px; font-weight: bold; font-size: 31px" onclick="startGame('Bohm',5)"> Bohm</button> </td> 
  </tr>

  <tr>
  <td height = 200></td> 
  <td width = 50></td> 
  <td height = 200></td>
  <td width = 50></td>
  <td height = 200></td>
  <td width = 50></td>
  <td height = 200></td>
  <td width = 50></td>
  <td height = 200></td>
  </tr>

  <tr>
  <td> </td> 
  <td></td> 
 <td> </td> 
  <td></td>
  <td><center><img src = "assets/images/backgrounds/logo1.jpg" width = "150px" height = "130px"></img></center></td>
  <td></td>
  <td> </td>
  <td></td>
  <td> </td>
  </tr>

  <tr>
  <td height = 200></td> 
  <td width = 50></td> 
  <td height = 200></td>
  <td width = 50></td>
  <td height = 200></td>
  <td width = 50></td>
  <td height = 200></td>
  <td width = 50></td>
  <td height = 200></td>
  </tr>

  <tr>
  <td><button class="btn btn-primary" id="Jordan" style="height: 60px;width: 200px; font-weight: bold; font-size: 31px" onclick="startGame('Jordan',6)"> Jordan</button> </td> 
  <td width = 50></td> 
 <td><button class="btn btn-primary" id="Bethe" style="height: 60px;width: 200px; font-weight: bold; font-size: 31px" onclick="startGame('Bethe',7)"> Bethe</button> </td> 
  <td width = 50></td>
  <td><center><button class="btn btn-primary" id="Bardeen" style="height: 60px;width: 200px; font-weight: bold; font-size: 31px" onclick="startGame('Bardeen',8)"> Bardeen</button></center> </td> 
  <td width = 50></td>
  <td><button class="btn btn-primary" id="Kirchoff" style="height: 60px;width: 200px; font-weight: bold; font-size: 31px" onclick="startGame('Kirchoff',9)"> Kirchoff</button> </td>
  <td width = 50></td>
  <td><button class="btn btn-primary" id="Tie Breaker" style="height: 60px;width: 200px; font-weight: bold; font-size: 31px" onclick="startGame('Tie Breaker',10)"> Tie Breaker</button> </td>
  </tr>

  
  

  
    
    
    
    
    

	

	
	
	
	
	
  </center>
  </div>
</div>
</div>
</div>

<script type="text/javascript">
 function startGame(teamName,setid){
    var objArray = new Array();
    var newObj = new Object();
    
    newObj.team = teamName;
    newObj.set_id=setid;
    objArray.push(newObj);


    
    
    var postdata = JSON.stringify(objArray);
    postBack("game/addTeam", "postdata=" + postdata, function(response) {
        console.log(response);
        var output = JSON.parse(response);
        formSaved();
        if (output.status == true) {
            $('#'+teamName).css('background','yellow');
            $('#'+teamName).css('color','black');
            $('#'+teamName).attr("disabled", "disabled");
            window.open('game/gameplay');
            
        } else {
            showErrorMessage("Something Went Wrong Contact Administrator ASAP !");
        }
    });
	
}



</script>