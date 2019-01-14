<body onload="getQuests()">
<script type="text/javascript">
 
function getQuests(){
	var objArray=new Array();
    var newObj=new Object();
   
    
   objArray.push(newObj);
  var postdata = JSON.stringify(objArray);
	
	var postdata = "Name";
    var myData=postBack("game/getQuests", "postdata=" + postdata, function(response) {
        
        //console.log(response);
        var output = JSON.parse(response);
        console.log(output);
        
        if (output.status == true && output.quest_num<=10) {
        	showSuccessMessage("This Question is for "+output['quest_array']['score']+"  Marks");
        	console.log(output['quest_array']['quest_name']);
        	$('#questionHeader').text(output['quest_array']['quest_name']);
        	$('#option1Button').text(output['quest_array']['option_1']);
        	$('#option2Button').text(output['quest_array']['option_2']);
        	$('#option3Button').text(output['quest_array']['option_3']);
        	$('#option4Button').text(output['quest_array']['option_4']);
        	$('#correctButton').text(output['quest_array']['correct']);
			$('#option1Button').val(output['quest_array']['option_1']);
        	$('#option2Button').val(output['quest_array']['option_2']);
        	$('#option3Button').val(output['quest_array']['option_3']);
        	$('#option4Button').val(output['quest_array']['option_4']);
        	$('#correctButton').val(output['quest_array']['correct']);
        	$('#ScoreTB').text(output['quest_array']['score']);
        	$('#option2Button').show();
		    $('#option4Button').show();
		    $('#option1Button').show();
		    $('#option3Button').show();
		    $('#correctButton').hide();



        	
        	

           
            
        } else {

            showErrorMessage("Something Went Wong !");
            window.location="game/gameover";
            
        }
    });
  
}
function checkAnswer(checkedValue){
	blockPage();
	var correctValue=$("#correctButton").text();
	if(checkedValue==correctValue){
		alert('correct');
	var objArray=new Array();
	var correctScoreValue=$('#ScoreTB').val();
	objArray.score=correctScoreValue;
	
    var newObj=new Object();
   
    
   objArray.push(newObj);
  var postdata = JSON.stringify(objArray);
	
	//var postdata = "Name";
       postBack("game/update_score", "postdata=" + postdata, function(response) {
        
        //console.log(response);
        var output = JSON.parse(response);
        console.log(output);
        
        if (output.status == true ) {
        	console.log("Score Updated Sucessfully");
        	


        	
        	

           
            
        } else {
        	$('#correctButton').show();
            showErrorMessage("Game Over !");
           
        }
    });
		getQuests();
		unblockPage();

	}
	else{
		var data =$('#correctButton').val();
		showErrorMessage("The correct answer was "+data);
		alert('wrong');
		getQuests();
		unblockPage();

	}

	

}
function fiftyFifty(){
	if($('#option1Button').val()==$('#correctButton').val() || $('#option3Button').val()==$('#correctButton').val()){
		$('#option2Button').hide();
		$('#option4Button').hide();
	}else{
		$('#option1Button').hide();
		$('#option3Button').hide();

	}
	$('#fiftyFiftyButton').hide();

}
function flipTheQuestion(){
	var x = Math.floor((Math.random() * 4) + 1);
	var objArray=new Array();
    var newObj=new Object();
   
    objArray.set_id=x;
   objArray.push(newObj);
    var postdata = JSON.stringify(objArray);
	
	//var postdata = "Name";
    var myData=postBack("game/getFlippedQuest", "postdata=" + postdata, function(response) {
        
        //console.log(response);
        var output = JSON.parse(response);
        console.log(output);
        
        if (output.status == true ) {
        	showSuccessMessage("This Question is for "+output['quest_array']['score']+"  Marks");
        	console.log(output['quest_array']['quest_name']);
        	$('#questionHeader').text(output['quest_array']['quest_name']);
        	$('#option1Button').text(output['quest_array']['option_1']);
        	$('#option2Button').text(output['quest_array']['option_2']);
        	$('#option3Button').text(output['quest_array']['option_3']);
        	$('#option4Button').text(output['quest_array']['option_4']);
        	$('#correctButton').text(output['quest_array']['correct']);
			$('#option1Button').val(output['quest_array']['option_1']);
        	$('#option2Button').val(output['quest_array']['option_2']);
        	$('#option3Button').val(output['quest_array']['option_3']);
        	$('#option4Button').val(output['quest_array']['option_4']);
        	$('#correctButton').val(output['quest_array']['correct']);
        	$('#ScoreTB').text(output['quest_array']['score']);
        	$('#option2Button').show();
		    $('#option4Button').show();
		    $('#option1Button').show();
		    $('#option3Button').show();



        	
        	

           
            
        } else {
            showErrorMessage("Something Went Wong !");
            
            
        }
    });
    $('#filpTheQuestionButton').hide();


}



	
</script>
<div class="page-container">
	<div class="page-content">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="panel-title">Team  <?php  if($this->session->userdata('team_name')){
					echo $this->session->userdata('team_name');
					} 
					else{
						header("location: ". base_url()."game");
						}
						?> </h2>
				<input type="hidden" id="ScoreTB" value="0" >

			</div>
		</div>
		
		<div class=" panel panel-flat  border-info border-bottom-info  border-info bg-info">
		<h2 class="panel-title " id="questionHeader">The Question Goes Here !</h2>
			
		</div>
		
		
		<div class="panel-body">
		
		<div class="row-lg-6">
		  <div class="col-lg-6">
		   <button type="button" id="option1Button" class="btn btn-primary" onclick="checkAnswer(this.value)" style="width: 25em;  height: 6em; margin: 0px 50px 50px 50px;">Option 1</button>
			
		</div>
		<div class="col-lg-6">
		   <button type="button" onclick="checkAnswer(this.value)" id="option2Button" class="btn btn-primary" style="width: 25em;  height: 6em; margin: 0px 50px 50px 50px;">Option 2</button>
			
		</div>
	</div>
	<button type="button" id="correctButton"  class="btn bg-green" style="width: 25em;  height: 6em;margin-left: 375px;">Correct</button>
	<div class="row-lg-6">
		  <div class="col-lg-6">
		   <button type="button" id="option3Button" onclick="checkAnswer(this.value)" class="btn btn-primary" style="width: 25em;  height: 6em;margin: 50px 50px 50px 50px;">Option 3</button>
			
		</div>
		<div class="col-lg-6">
		   <button type="button" id="option4Button" onclick="checkAnswer(this.value)" class="btn btn-primary" style="width: 25em;  height: 6em;margin: 50px 50px 50px 50px;">Option 4</button>
			
		</div>
	</div>
</div>
<div class="row">
	
	<div class="col-lg-3">
		<button class="btn btn-primary" id="filpTheQuestionButton" style="margin-left:205px;" onclick="flipTheQuestion()">Flip The Question</button>

	
	</div>
	<div class="col-lg-3">
		<button class="btn btn-primary" style="margin-left:585px;" id="fiftyFiftyButton" onclick="fiftyFifty()">50 - 50 </button>

	
	</div>
	
</div>
</div>
</div>
	

