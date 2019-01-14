<body onload="getQuests()">
<script type="text/javascript">
 
function getQuests(){
	blockPage();
	var objArray=new Array();
    var newObj=new Object();
   
    
   objArray.push(newObj);
  var postdata = JSON.stringify(objArray);
	
	var postdata = "Name";
    var myData=postBack("game/getQuests", "postdata=" + postdata, function(response) {
        
        //console.log(response);
        var output = JSON.parse(response);
        console.log(output);
        
        if (output.status == true && output.quest_num<11) {
        	
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
        	console.log(parseInt(output.quest_num)*5);
        	$('#option2Button').hide();
		    $('#option4Button').hide();
		    $('#option1Button').hide();
		    $('#option3Button').hide();
		    $('#checkButton').hide();
		    $('#correctButton').hide();
		    $("#nextButton").hide();
		    $("#getOptions").show();
		    $("#filpTheQuestionButton").hide();
		     if(output['quest_array']['quest_num']>5){
		    	$("#chaltaHaiButton1").hide();
		    	$("#chaltaHaiButton1").hide();
		    	$("#filpTheQuestionButton").show();

		    }
		   


        	
        	

           
            
        } else {

            showErrorMessage("Something Went Wong !");
            window.location="game/gameover";
            
        }
    });



    $('#checkButton').show();
    $("#option1Button").removeClass("btn-danger animation ");
    $("#option2Button").removeClass("btn-danger animation ");
    $("#option3Button").removeClass("btn-danger animation ");
    $("#option4Button").removeClass("btn-danger animation ");
    unblockPage();
  
}
function checkAnswer(checkedValue){

	postBack("game/checkAnswer","postdata="+"",function(response){
		var output = JSON.parse(response);
        console.log(output);
        if(output.isCorrect==false){
        	var correct=$('#correctButton').text();
        	var opt1=$('#option1Button').text();
        	var opt_2=$('#option2Button').text();
        	var opt_3=$('#option3Button').text();
        	var opt_4=$('#option4Button').text();
        	if(opt_1==correct){
        		$('#option1Button').addClass("btn-danger animation ");
        	}
        	else if(opt_2==correct){
        		$('#option2Button').addClass("btn-danger animation ");
        	}
        	else if(opt_3==correct){
        		$('#option3Button').addClass("btn-danger animation ");

        	}
        	else
        	{
        		$('#option4Button').addClass("btn-danger animation ");
        	}

        	
        }
        else{
        	var correct=$('#correctButton').text();
        	var opt_1=$('#option1Button').text();
        	var opt_2=$('#option2Button').text();
        	var opt_3=$('#option3Button').text();
        	var opt_4=$('#option4Button').text();
        	if(opt_1==correct){
        		$('#option1Button').addClass("btn-success animation ");
        	}
        	else if(opt_2==correct){
        		$('#option2Button').addClass("btn-success animation ");
        	}
        	else if(opt_3==correct){
        		$('#option3Button').addClass("btn-success animation ");

        	}
        	else
        	{
        		$('#option4Button').addClass("btn-success animation ");
        	}

        }


	}
		);
	$('#checkButton').hide();
	$('#nextButton').show();

	

}

function setAnswer(checkedValue,checkedId){
	 var objArray = new Array();
    var newObj = new Object();
    newObj.selected_option=checkedValue;
    objArray.push(newObj);
    var postdata = JSON.stringify(objArray);
    postBack("game/set_answer", "postdata=" + postdata, function(response) {
        
        //console.log(response);
        var output = JSON.parse(response);
        console.log(output);
        
        
        


});
        
        $("#"+checkedId).addClass("btn-danger animation ");
        if(checkedId=="option1Button"){
        	$("#option2Button").removeClass("btn-danger animation ");
        	$("#option3Button").removeClass("btn-danger animation ");
        	$("#option4Button").removeClass("btn-danger animation ");
        }
        else if(checkedId=="option2Button"){
        	$("#option1Button").removeClass("btn-danger animation ");
        	$("#option3Button").removeClass("btn-danger animation ");
        	$("#option4Button").removeClass("btn-danger animation ");
        }
        else if(checkedId=="option3Button"){
        	$("#option1Button").removeClass("btn-danger animation ");
        	$("#option2Button").removeClass("btn-danger animation ");
        	$("#option4Button").removeClass("btn-danger animation ");
        }
        else if(checkedId=="option4Button"){
        	$("#option1Button").removeClass("btn-danger animation ");
        	$("#option2Button").removeClass("btn-danger animation ");
        	$("#option3Button").removeClass("btn-danger animation ");
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
        	$('#option2Button').hide();
		    $('#option4Button').hide();
		    $('#option1Button').hide();
		    $('#option3Button').hide();
		    $('#checkButton').hide();
			$("#getOptions").show();
			$("#nextButton").hide();




        	
        	

           
            
        } else {
            showErrorMessage("Something Went Wong !");
            
            
        }
    });
    $('#filpTheQuestionButton').hide();


}
function getOptions(){
	$('#option1Button').show();
	$('#option2Button').show();
	$('#option3Button').show();
	$('#option4Button').show();
	$('#checkButton').show();
	$("#getOptions").hide();
	$("#nextButton").hide();
}
function chaltaHai(){

}
function nextQuest(){
	    location.reload();

}



	
</script>
<div class="page-container">
	<div class="page-content">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="panel-title">Team  <?php  if($this->session->userdata('team_name')){
					echo $this->session->userdata('team_name');
					for($i=0;$i<=50;$i++){
						
						echo "&nbsp ";
					}
					
					} 
					else{
						header("location: ". base_url()."game");
						}
						?> Score <?php echo $this->session->userdata('score');
						echo "&nbsp";
						for($i=0;$i<=50;$i++){
						
						echo "&nbsp";
					} ?> 
						Marks<?php echo "&nbsp";
						echo (($this->session->userdata('question_number')*5)+5);
						
						?> 
					</h2>
				<input type="hidden" id="ScoreTB" value="0" >

			</div>
		</div>
		
		<div class=" panel panel-flat  border-info border-bottom-info  border-info bg-info">
		
		<h2 class="panel-title " id="questionHeader">The Question Goes Here !</h2>
			
		</div>
		
		
		<div class="panel-body">
		
		<div class="row-lg-6">
		  <div class="col-lg-6">
		   <button type="button" id="option1Button" class="btn btn-primary animation" data-animation="rubberBand" onclick="setAnswer(this.value,this.id)" style="width: 25em;  height: 6em; margin: 0px 50px 50px 50px;" data-animation="bounce">Option 1</button>
			
		</div>
		<div class="col-lg-6">
		   <button type="button" onclick="setAnswer(this.value,this.id)" id="option2Button" class="btn btn-primary" style="width: 25em;  height: 6em; margin: 0px 50px 50px 50px;" data-animation="bounce">Option 2</button>
			
		</div>
	</div>
	<button type="button" id="correctButton"  class="btn bg-green" style="width: 25em;  height: 6em;margin-left: 375px;" data-animation="bounce">Correct</button>
	<div class="row-lg-6">
		  <div class="col-lg-6">
		   <button type="button" id="option3Button" onclick="setAnswer(this.value,this.id)" class="btn btn-primary" style="width: 25em;  height: 6em;margin: 50px 50px 50px 50px;" data-animation="bounce">Option 3</button>
			
		</div>
		<div class="col-lg-6">
		   <button type="button" id="option4Button" onclick="setAnswer(this.value,this.id)" class="btn btn-primary" style="width: 25em;  height: 6em;margin: 50px 50px 50px 50px;" data-animation="bounce">Option 4</button>
			
		</div>
	</div>
</div>
<div class="row">
	
	<div class="col-lg-3">
		<button class="btn btn-primary" id="filpTheQuestionButton" style="margin-left:50px;" onclick="flipTheQuestion()">Flip The Question</button>
		


	
	</div>
	<div class="col-lg-3">

		<button class="btn btn-primary"  id="fiftyFiftyButton" onclick="fiftyFifty()">50 - 50 </button>

	
	</div>
	<div class="col-lg-3">
		<button class="btn btn-primary"  id="chaltaHaiButton1" onclick="chaltaHai()">Chalta Hai </button>

	</div>
	<div class="col-lg-3">
		<button class="btn btn-primary"  id="chaltaHaiButton2" onclick="chaltHai()">Chalta Hai </button>
		
	</div>
	<div class="row">
		<div class="col-lg-3">
		<button class="btn btn-primary" style="margin-left:50px;margin-top: 50px;" id="checkButton" onclick="checkAnswer()">Check </button>
		<div class="col-lg-3">
		<button class="btn btn-primary" style="margin-left:50px;margin-top: 50px;" id="getOptions" onclick="getOptions()">Get Options  </button>
		<button class="btn btn-primary" style="margin-left:150px;margin-top: 50px;" id="nextButton" onclick="nextQuest()">Next </button>
		
	</div>
	


	</div>


	
</div>
</div>
</div>
	

