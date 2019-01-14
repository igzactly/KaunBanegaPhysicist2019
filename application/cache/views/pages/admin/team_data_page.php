<!-- Page container -->
<div class="page-container">
   <!-- Page content -->
   <div class="page-content">
      <?php $this->load->view('pages/admin/sidebar');?>
      <!-- Main content -->
      <div class="content-wrapper">
         <!-- Page header -->
         <div class="page-header page-header-default">
            <div class="page-header-content">
               <div class="page-title">
                  <h4><i class="icon-safe position-left"></i> <span class="text-semibold">Team Data</span></h4>
               </div>
             
            </div>
         </div>
         <!-- /page header -->
         <!-- Content area -->
         <div class="content">
            <div class="row">
               <div class="col-md-12">
                  <div class="panel panel-flat">
                     <div id="entityPanel" class="panel-body">
                        <div class="form-group">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group has-feedback has-feedback-left">
                                    <input type="text" class="search form-control input-lg" placeholder="Search Team by Name / ID">
                                    <div class="form-control-feedback">
                                       <i class="icon-search4"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row">
                              <div class="col-md-12">
                                 <table class="table table-bordered table-hover table-condensed table-striped">
                                    <thead class="bg-slate">
                                       <tr>
                                          <th style="width:100px;"></th>
                                          <th>ID</th>
                                          <th>Team Name </th>
                                          <th>Leader </th>
                                          <th>Member 1</th>
                                          <th>Member 2</th>
                                          <th>Member 3</th>
                                          <th>College</th>
                                          <th>Class</th>
                                          <th>Score</th>
                                       </tr>
                                    </thead>
                                    <tbody id="tableBody" class="list">
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
            <?php $this->load->view('templates/admin/footer');?>
         </div>
         <!-- /content area -->
      </div>
      <!-- /main content -->
   </div>
   <!-- /page content -->
</div>
<!-- /page container -->
<!-- Theme JS files -->
<script type="text/javascript" src="assets/js/core/app.js"></script>
<script type="text/javascript" src="assets/js/custom/list.js"></script>
<!-- /theme JS files -->
<script type="text/javascript">

      var entityName = "Team  ";

$(function() {
    $('#usersLink').addClass('active');
    getAll();
    

});

function getAll() {
    postBack("administrator/getAllTeam", "", function(response) {

        var output = JSON.parse(response);

        $("#tableBody").html("");

        var html = "";
        var tableData = "<tr class='success'>";
            tableData += "<td> </td>";

            if (output[0].flag == 1)
                tableData += '<span class="label label-flat label-icon text-danger" data-popup="tooltip" data-placement="bottom" title="Deleted" style="float:right; padding-top: 4px;"><i class="icon-trash"></i></span>';

            tableData += "<td class='idClass'>" + output[0].team_id + "</td>";
            tableData += "<td class='nameClass'>" + output[0].team_name + "</td>";
            tableData += "<td class='ipClass'>" + output[0].player_1 + "</td>";
            tableData += "<td>" + output[0].player_2 + "</td>";
            tableData += "<td>" + output[0].player_3 + "</td>";
            tableData += "<td>" + output[0].player_4 + "</td>";
            tableData += "<td>" + output[0].college + "</td>";
            tableData += "<td>" + output[0].class+ "</td>";
            tableData += "<td>" + output[0].score+ "</td>";
            tableData += "</tr>";
            $("#tableBody").append(tableData);



            //Rank 2

            var tableData = "<tr class='warning'>";
            tableData += "<td> </td>";

            if (output[1].flag == 1)
                tableData += '<span class="label label-flat label-icon text-danger" data-popup="tooltip" data-placement="bottom" title="Deleted" style="float:right; padding-top: 4px;"><i class="icon-trash"></i></span>';

            tableData += "<td class='idClass'>" + output[1].team_id + "</td>";
            tableData += "<td class='nameClass'>" + output[1].team_name + "</td>";
            tableData += "<td class='ipClass'>" + output[1].player_1 + "</td>";
            tableData += "<td>" + output[1].player_2 + "</td>";
            tableData += "<td>" + output[1].player_3 + "</td>";
            tableData += "<td>" + output[1].player_4 + "</td>";
            tableData += "<td>" + output[1].college + "</td>";
            tableData += "<td>" + output[1].class+ "</td>";
            tableData += "<td>" + output[1].score+ "</td>";
            tableData += "</tr>";
            $("#tableBody").append(tableData);



            //Rank 3
             var tableData = "<tr class='warning'>";
            tableData += "<td> </td>";

            if (output[2].flag == 1)
                tableData += '<span class="label label-flat label-icon text-danger" data-popup="tooltip" data-placement="bottom" title="Deleted" style="float:right; padding-top: 4px;"><i class="icon-trash"></i></span>';

            tableData += "<td class='idClass'>" + output[2].team_id + "</td>";
            tableData += "<td class='nameClass'>" + output[2].team_name + "</td>";
            tableData += "<td class='ipClass'>" + output[2].player_1 + "</td>";
            tableData += "<td>" + output[2].player_2 + "</td>";
            tableData += "<td>" + output[2].player_3 + "</td>";
            tableData += "<td>" + output[2].player_4 + "</td>";
            tableData += "<td>" + output[2].college + "</td>";
            tableData += "<td>" + output[2].class+ "</td>";
            tableData += "<td>" + output[2].score+ "</td>";
            tableData += "</tr>";
            $("#tableBody").append(tableData);

        for (var i = 3; i < output.length; i++) {
            var tableData = "<tr class='danger'>";
            tableData += "<td><input id='cb" + i + "' type='checkbox' name='selectRow' value='" + output[i].team_id + "' style='height:20px;width:20px' />";

            if (output[i].flag == 1)
                tableData += '<span class="label label-flat label-icon text-danger" data-popup="tooltip" data-placement="bottom" title="Deleted" style="float:right; padding-top: 4px;"><i class="icon-trash"></i></span>';

            tableData += "<td class='idClass'>" + output[i].team_id + "</td>";
            tableData += "<td class='nameClass'>" + output[i].team_name + "</td>";
            tableData += "<td class='ipClass'>" + output[i].player_1 + "</td>";
            tableData += "<td>" + output[i].player_2 + "</td>";
            tableData += "<td>" + output[i].player_3 + "</td>";
            tableData += "<td>" + output[i].player_4 + "</td>";
            tableData += "<td>" + output[i].college + "</td>";
            tableData += "<td>" + output[i].class+ "</td>";
            tableData += "<td>" + output[i].score+ "</td>";
            tableData += "</tr>";
            $("#tableBody").append(tableData);
        }
        applyFilterableList();
    });
}

function applyFilterableList() {
    var options = {
        valueNames: ['idClass', 'nameClass', 'ipClass']
    };
    var list = new List('entityPanel', options);
}

function resetForm() {
    $('#entityForm').trigger("reset");
}

function addEntity() {
    var quest_name = $('#nameTb').val();
    var option_1 = $('#ipAddTb').val();
    var option_2= $('#maskTb').val();
    var option_3 = $('#gatewayTb').val();
    var option_4 = $('#divisonTb').val();
    var correct = $('#departmentTb').val();
    var score=$('#ScoreTB').val();
    var set =$('#setSelect').val();

    var objArray = new Array();
    var newObj = new Object();
    newObj.quest_name = quest_name;
    newObj.option_1 = option_1;
    newObj.option_2 =option_2;
    newObj.option_3 = option_3;
    newObj.option_4 = option_4;
    newObj.correct = correct;
    newObj.score=score;
    newObj.set=set;

    newObj.flag = 0;
    objArray.push(newObj);


    var postdata = JSON.stringify(objArray);
    postBack("administrator/addQuestion", "postdata=" + postdata, function(response) {
        console.log(response);
        var output = JSON.parse(response);
        formSaved();
        if (output.status == true) {
            showSuccessMessage(entityName + " Added Successfully!");
            $('#entity_modal').modal('hide');
            resetForm();
            getAll();
        } else {
            showErrorMessage("Failed to add new " + entityName + ". Please try again later");
        }
    });
}




function getEntityDetails() {
    var id = $('input[name=selectRow]:checked:visible:first').val();

    if (!id) {
        showErrorMessage("Please select the " + entityName + " you wish to update");
        return;
    }

    $('#entity_modal').modal('show');

    var objArray = new Array();
    var newObj = new Object();
    newObj.id = id;
    objArray.push(newObj);

    var postdata = JSON.stringify(objArray);
    postBack("administrator/getQuestionData", "postdata=" + postdata, function(response) {

        var output = JSON.parse(response);
        //console.log(output);

        $('#nameTb').val(output.quest_name);
        $('#ipAddTb').val(output.option_1);
        $('#maskTb').val(output.option_2);
        $('#gatewayTb').val(output.option_3);
        $('#divisonTb').val(output.option_4);
        $('#departmentTb').val(output.correct);
        $('#ScoreTB').val(output.score);
        $('setSelect').val(output.set_id);
        $('#idTb').val(output.quest_id);
    });
}

function updateEntity() {
    var quest_id = $('#idTb').val();
    var quest_name = $('#nameTb').val();
    var option_1 = $('#ipAddTb').val();
    var option_2 = $('#maskTb').val();
    var option_3 = $('#gatewayTb').val();
    var option_4 = $('#divisonTb').val();
    var correct = $('#departmentTb').val();
    var set=$('#setSelect').val();
    var score=$('#ScoreTB').val();


    var objArray = new Array();
    var newObj = new Object();
    newObj.quest_id = quest_id;
    newObj.quest_name = quest_name;
    newObj.option_1 = option_1;
    newObj.option_2 = option_2;
    newObj.option_3 = option_3;
    newObj.option_4 = option_4;
    newObj.correct = correct;
    newObj.set=set;
    newObj.score=score;
    objArray.push(newObj);


    var postdata = JSON.stringify(objArray);
    postBack("administrator/updateQuestion", "postdata=" + postdata, function(response) {
        console.log(response);
        var output = JSON.parse(response);
        formSaved();
        if (output.status == true) {
            showSuccessMessage(entityName + " Updated Successfully!");
            $('#entity_modal').modal('hide');
            resetForm();
            getAll();
        } else {
            showErrorMessage("Failed to update " + entityName + ". Please try again later");
        }
    });
}

function validate(control, event) {
    event = (event) ? event : window.event;
    if (event.type == 'keypress') {
        var charCode = (event.which) ? event.which : event.keyCode;
        if (isBackspace(charCode)) {
            return true;
        } else if (control.name == 'name') {
            return isAlphabate(charCode) || isSpace(charCode);
        }
    } else if (event.type == 'change') {
        if (control.name == 'name') {
            if (control.value == "") {
                var id = parseInt(control.id.split("name")[1]);
                control.value = obj[id].name;
            }
        }
    } else if (event.type == 'click') {
        if (control.name == 'addNew') {
            if (validateForm()) {
                addEntity();
            }
        } else if (control.name == 'update') {
            if (validateForm()) {
                updateEntity();
            }
        } else if (control.name == 'importFile') {
            if ($("#csvFileInput").val() == "") {
                showErrorMessage("No file Selected. Please browse for file!");
                $("#csvFileInput").focus();
            } else {
                var file = document.getElementById('csvFileInput');
                handleFiles(file.files[0]);
            }
        }
    }
    return true;
}

function validateForm() {
    var nameTb = $('#nameTb').val();
    var ipAddTb = $('#ipAddTb').val();
    var maskTb = $('#maskTb').val();
    var gatewayTb = $('#gatewayTb').val();

    if (isEmpty(nameTb, "Please enter Question the name")) {
        $('#nameTb').focus();
        return false;
    }
    
    return true;
}

function submitForm(mode) {
    switch (mode) {
        case 1: //add
            $('#formTitle').html("Add New " + entityName);
            $('.formReadOnly').removeAttr("readonly");
            $('.formDisabled').removeAttr("disabled");
            $('#formButton').attr("name", "addNew");

            $('#entity_modal').modal('show');
            break;

        case 2: // update
            $('#formTitle').html("Update " + entityName);
            $('.formReadOnly').attr("readonly", "readonly");
            $('.formDisabled').attr("disabled", "disabled");
            $('#formButton').attr("name", "update");

            getEntityDetails();
            break;
        case 3: //import
            $('#import_modal').modal('show');
            break;
    }
}



</script>