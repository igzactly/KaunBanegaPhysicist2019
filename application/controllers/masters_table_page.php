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
                  <h4><i class="icon-safe position-left"></i> <span class="text-semibold"> Master Table Question Data</span></h4>
               </div>
               <div class="heading-elements">
                  <div class="heading-btn">
                     <button type="button" onclick="submitForm(1)" class="btn bg-slate">
                     <i class="icon-add"></i> Add
                     </button>
                     <button type="button" onclick="submitForm(2)" class="btn bg-slate">
                     <i class="icon-pencil"></i> Update
                     </button>
                     <button type="button" onclick="submitForm(3)" class="btn bg-slate">
                     <i class="icon-pencil"></i> Add Questions To A Set 
                     </button>
                     
                     
                  </div>
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
                                    <input type="text" class="search form-control input-lg" placeholder="Search Question by Name / ID">
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
                                          <th>Question </th>
                                          <th>Option 1 </th>
                                          <th>Option 2</th>
                                          <th>Option 3</th>
                                          <th>Option 4</th>
                                          <th>Correct</th>
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
                              <label class="control-label col-sm-3">Question  <span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                                 <input id="nameTb" type="text" placeholder="Question " maxlength="500" class="form-control maxlength">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-sm-3">Option 1 <span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                                 <input id="ipAddTb" type="text" placeholder="Option 1" maxlength="100" class="form-control maxlength" >
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-sm-3">Option 2 <span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                                 <input id="maskTb" type="text" placeholder="Option 2" maxlength="100" class="form-control maxlength">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-sm-3">Option 3<span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                                 <input id="gatewayTb" type="text" placeholder="Option 3 " maxlength="100" class="form-control maxlength">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-sm-3">Option 4<span class="text-danger">*</span> </label>
                              <div class="col-sm-9">
                                 <input id="divisonTb" type="text" placeholder="Option 4" maxlength="100" class="form-control maxlength">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-sm-3">Correct <span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                                 <input id="departmentTb" type="text" placeholder="Correct " maxlength="100" class="form-control maxlength">
                              </div>
                           </div>
                          <div class="form-group">
                              <label class="control-label col-sm-3">Score  <span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                                 <input id="ScoreTB" type="number" placeholder="Score" maxlength="2" class="form-control maxlength">
                              </div>
                           </div>
                       
                        </div>
                         
                        
                        <div class="modal-footer">
                           <input type="hidden" id="idTb" />
                           <button type="reset" class="btn btn-default">Reset Form</button>
                           <button type="button" id="formButton" name="" onclick="return validate(this,event);" class="btn btn-primary">Submit form</button>
                        </div>
                     </form>
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

        var entityName = "Question ";
function getSets() {
    postBack("administrator/getAllSets", "", function(response) {

        var output = JSON.parse(response);
          console.log(output);
        $("#set_id").html("");

        var html = "";
        for (var i = 0; i < output.length; i++) {
           var selectData; 
            selectData += "<option id='"+output[i].set_name+"' value='"+output[i].set_name+"'>"+output[i].set_name+'</option>';

            
        }
        $("#set_id").html(selectData);
      
    });
}
$(function() {
    $('#flippedLink').addClass('active');
    getAll();
    

});

function getAll() {
    postBack("administrator/getAllFlipTheQuestion", "", function(response) {

        var output = JSON.parse(response);

        $("#tableBody").html("");

        var html = "";
        for (var i = 0; i < output.length; i++) {
            var tableData = "<tr>";
            tableData += "<td><input id='cb" + i + "' type='checkbox' name='selectRow' value='" + output[i].quest_id + "' style='height:20px;width:20px' />";

            if (output[i].flag == 1)
                tableData += '<span class="label label-flat label-icon text-danger" data-popup="tooltip" data-placement="bottom" title="Deleted" style="float:right; padding-top: 4px;"><i class="icon-trash"></i></span>';

            tableData += "<td class='idClass'>" + output[i].quest_id + "</td>";
            tableData += "<td class='nameClass'>" + output[i].quest_name + "</td>";
            tableData += "<td class='ipClass'>" + output[i].option_1 + "</td>";
            tableData += "<td>" + output[i].option_2 + "</td>";
            tableData += "<td>" + output[i].option_3 + "</td>";
            tableData += "<td>" + output[i].option_4 + "</td>";
            tableData += "<td>" + output[i].correct + "</td>";
            tableData += "<td>" + output[i].score + "</td>";
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
  getSets();
    var quest_name = $('#nameTb').val();
    var option_1 = $('#ipAddTb').val();
    var option_2= $('#maskTb').val();
    var option_3 = $('#gatewayTb').val();
    var option_4 = $('#divisonTb').val();
    var correct = $('#departmentTb').val();
    var score=$('#ScoreTB').val();
    

    var objArray = new Array();
    var newObj = new Object();
    newObj.quest_name = quest_name;
    newObj.option_1 = option_1;
    newObj.option_2 =option_2;
    newObj.option_3 = option_3;
    newObj.option_4 = option_4;
    newObj.correct = correct;
    newObj.score=score;
   

    newObj.flag = 0;
    objArray.push(newObj);


    var postdata = JSON.stringify(objArray);
    postBack("administrator/addFlipTheQuestion", "postdata=" + postdata, function(response) {
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
    postBack("administrator/getFlipedQuestionData", "postdata=" + postdata, function(response) {

        var output = JSON.parse(response);
        //console.log(output);

        $('#nameTb').val(output.quest_name);
        $('#ipAddTb').val(output.option_1);
        $('#maskTb').val(output.option_2);
        $('#gatewayTb').val(output.option_3);
        $('#divisonTb').val(output.option_4);
        $('#departmentTb').val(output.correct);
        $('#ScoreTB').val(output.score);
        $('#setSelect').val(output.set_id);
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
   
    newObj.score=score;
    objArray.push(newObj);


    var postdata = JSON.stringify(objArray);
    postBack("administrator/updateFlipTheQuestion", "postdata=" + postdata, function(response) {
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
        getSets();
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