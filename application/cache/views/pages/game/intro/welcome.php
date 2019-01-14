<body class="pace-done">
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
	<div class="panel-body">
	<h3>
		The game where you will be challenged by your mastery in physics ! <br>

	</h3>
	<h3 class="bg-danger">
		Here are the rules 
	</h3>
	<h4 class="bg-info">
		1 . You will be given 10 questions you have to select any one of the options you feel to be correct 
	</h4>
	<h4 class="bg-info">
		2 . Each Question carry  different marks 
	</h4>
		
	</div>
				</div>
			</div>
			<div>
				<center><button type="button" class="btn btn-primary" onclick="submitForm()"><i class="icon-thumbs-up3 position-left"></i>Begin Game </button></center>
			</div>
		</div>
	</div>
</div>
<div id="entity_modal" class="modal fade" data-backdrop="static" data-keyboard="false">
               <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                     <div class="modal-header bg-info">
                        <button type="button" class="close" onclick="closeEntityModal()">&times;</button>
                        <h5 id="formTitle" class="modal-title"></h5>
                     </div>
                     <form id="entityForm" action="#" class="form-horizontal">
                        <div class="modal-body">
                           <div class="form-group">
                              <label class="control-label col-sm-3">Team Name  <span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                                 <select class="form-control" id="teamNameTb">
                                 	<option class="form-control" value="Einstien">Einstien</option>
                                 	<option class="form-control" value="Raman">Raman</option>
                                 	<option class="form-control" value="Newton">Newton</option>
                                 	<option class="form-control" value="Rutherford">Rutherford</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-sm-3">Team Leader <span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                                 <input id="teamLeaderTb" type="text" placeholder="Team Leader Name" maxlength="15" class="form-control maxlength"  onblur="checkname(this.value)">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-sm-3">Member 1  <span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                                 <input id="mem1TB" type="text" placeholder="Member 1" maxlength="15" class="form-control maxlength" onblur="checkname(this.value)">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-sm-3">Member 2 <span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                                 <input id="mem2TB" type="text" placeholder="Member 2" maxlength="15" class="form-control maxlength" onblur="checkname(this.value)">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-sm-3">Member 3 </label>
                              <div class="col-sm-9">
                                 <input id="mem3TB" type="text" placeholder="Member 3" maxlength="15" class="form-control maxlength" onblur="checkname(this.value)">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-sm-3">College Name </label>
                              <div class="col-sm-9">
                                 <input id="collegeNameTb" type="text" placeholder="College Name" maxlength="30" class="form-control maxlength">
                              </div>
                           </div>
                            <div class="form-group">
                              <label class="control-label col-sm-3">Class Name </label>
                              <div class="col-sm-9">
                                 <input id="classNameTb" type="text" placeholder="Class Name" maxlength="20" class="form-control maxlength">
                              </div>
                           </div>
                        </div>
                        </div>

                        <div class="modal-footer">
                           <input type="hidden" id="idTb" />
                           <button type="reset" class="btn btn-default">Reset Form</button>
                           <button type="button" id="formButton" name="" onclick="registerTeam()" class="btn btn-primary">Register Team !</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>

<script type="text/javascript">
	function submitForm(){
		 $('#formTitle').html("Register Your Team ");
            $('.formReadOnly').removeAttr("readonly");
            $('.formDisabled').removeAttr("disabled");
            $('#formButton').attr("name", "addNew");
			$('#entity_modal').modal('show');
	}

	function validateData(){
		var team = $('#teamNameTb').val();
		var player_1=$('#teamLeaderTb').val();
		var player_2=$('#mem1TB').val();
		var player_3=$('#mem2TB').val();
		var player_4=$('#mem3TB').val();
		var college=$('#collegeNameTb').val();
		var className=$('#classNameTb').val();
		if(!checkname(team)){
			showErrorMessage('Your Team Name is not Valid !');
			$('#teamNameTb').focus();
			return false;

		}
		if(!checkname(player_1)){
			showErrorMessage('Your Leader Name is not valid ');
			$('#teamLeaderTb').focus();
			return false;
		}
		if(!checkname(player_2)){
			showErrorMessage('Your Leader Name is not valid ');
			$('#mem1TB').focus();
			return false;
		}
		if(!checkname(player_3)){
			showErrorMessage('Your Leader Name is not valid ');
			$('#mem2TB').focus();
			return false;
		}
		if(!checkname(player_4)){
			showErrorMessage('Your Leader Name is not valid ');
			$('#mem3TB').focus();
			return false;
		}
		return true;
		



	}
	function checkname(inputtxt)  
{   
	//var regex = new RegExp('^' + inputtxt);
    var letters = /^[A-Za-z]+$/;  
    //if you want upper and numbers too 
    //letters = /^[A-Za-z0-9]+$/;
    //if you only want some letters
    // letters = /^[azertyuiop]+$/;
    if(inputtxt.match(letters))  
    {  
        //showSuccessMessage('This is valid !');    
        return true;  
    }  
    else  
    {  
        showErrorMessage('check the name you have entered')  
        return false;  
    }  
}
function registerTeam(){
	    var team = $('#teamNameTb').val();
		var player_1=$('#teamLeaderTb').val();
		var player_2=$('#mem1TB').val();
		var player_3=$('#mem2TB').val();
		var player_4=$('#mem3TB').val();
		var college=$('#collegeNameTb').val();
		var className=$('#classNameTb').val();
		var x = Math.floor((Math.random() * 4) + 1);
	if(!validateData()){
		showErrorMessage('Something is wrong !');

	}
	else{
    var objArray = new Array();
    var newObj = new Object();
    newObj.player_1 = player_1;
    newObj.player_2 = player_2;
    newObj.player_3 = player_3;
    newObj.player_4 = player_4;
    newObj.class = className;
    newObj.team = team;
    newObj.college=college;
    newObj.set_id=x;
    objArray.push(newObj);


    showSuccessMessage('Registering Your Team Data ');
    
    var postdata = JSON.stringify(objArray);
    postBack("game/addTeam", "postdata=" + postdata, function(response) {
        console.log(response);
        var output = JSON.parse(response);
        formSaved();
        if (output.status == true) {
            showSuccessMessage("Team  Added Successfully!");
            $('#entity_modal').modal('hide');
            window.location='game/gameplay';
            
        } else {
            showErrorMessage("Something Went Wrong Contact Administrator ASAP !");
        }
    });
	}



} 
</script>