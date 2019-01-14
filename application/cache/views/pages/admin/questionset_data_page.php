<!-- Page header -->
         <div class="page-header page-header-default">
            <div class="page-header-content">
               <div class="page-title">
                  <h4><i class="icon-question position-left"></i> <span class="text-semibold">Question Set Data </span></h4>
               </div>
               <div class="heading-elements">
                  <div class="heading-btn">
                     <button type="button" onclick="submitForm(1)" class="btn bg-slate">
                     <i class="icon-add"></i> Add
                     </button>
                     <button type="button" onclick="submitForm(2)" class="btn bg-slate">
                     <i class="icon-pencil"></i> Update
                     </button>
                     <button type="button" onclick="deleteEntity()" class="btn bg-slate">
                     <i class="icon-trash"></i> Delete
                     </button>
                     <button type="button" onclick="restoreEntity()" class="btn bg-slate">
                     <i class="icon-reset"></i> Restore
                     </button>
                  </div>
               </div>
            </div>
         </div>
<div class="page-container">
   <!-- Page content -->
   <div class="page-content">
   <?php $this->load->view('pages/admin/sidebar');?>
     <div class="content">
            <div class="row">
               <div class="col-md-12">
                  <div class="panel panel-flat">
                     <div id="entityPanel" class="panel-body">
                        <div class="form-group">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group has-feedback has-feedback-left">
                                    <input type="text" class="search form-control input-lg" placeholder="Search Question Set by ID  / Name ">
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
                                          <th>Question Set ID</th>
                                          
                                          <th>Question Set Name </th>
                                          <th>Number Of Questions </th>
                                          
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
                              <label class="control-label col-sm-3">Question Set  Name <span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                                 <input id="nameTb" type="text" placeholder="Question Set  Name" maxlength="1" class="form-control maxlength">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-sm-3">No Of Questions <span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                                 <input id="ipAddTb" type="text" placeholder="No Of Questions" maxlength="2" class="form-control maxlength" >
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
            <?php //$this->load->view('include/footer');?>
         </div>



      
     </div>
    </div>
   </div>
<script type="text/javascript">

    var entityName = "Question Set";

$(function() {
    $('#reportLink').addClass('active');
    getAll();
});

function getAll() {
    postBack("administrator/getAll", "", function(response) {

        var output = JSON.parse(response);

        $("#tableBody").html("");

        var html = "";
        for (var i = 0; i < output.length; i++) {
            var tableData = "<tr>";
            tableData += "<td><input id='cb" + i + "' type='checkbox' name='selectRow' value='" + output[i].set_id + "' style='height:20px;width:20px' />";

            if (output[i].flag == 1)
                tableData += '<span class="label label-flat label-icon text-danger" data-popup="tooltip" data-placement="bottom" title="Deleted" style="float:right; padding-top: 4px;"><i class="icon-trash"></i></span>';

            tableData += "<td class='idClass'>" + output[i].set_id + "</td>";
            tableData += "<td class='nameClass'>" + output[i].set_name + "</td>";
            tableData += "<td >" + output[i].no_of_quest + "</td>";
            
            tableData += "</tr>";
            $("#tableBody").append(tableData);
        }
        applyFilterableList();
    });
}

function applyFilterableList() {
    var options = {
        valueNames: ['idClass', 'nameClass']
    };
    var list = new List('entityPanel', options);
}

function resetForm() {
    $('#entityForm').trigger("reset");
}

function addEntity() {
    var nameTb = $('#nameTb').val();
    var ipAddTb = $('#ipAddTb').val();
    

    var objArray = new Array();
    var newObj = new Object();
    newObj.name = nameTb;
    newObj.no_of_quest = ipAddTb;
    newObj.flag = 0;
    objArray.push(newObj);


    var postdata = JSON.stringify(objArray);
    postBack("administrator/addset", "postdata=" + postdata, function(response) {
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

function deleteEntity() {
    var array = new Array();
    var selectedRows = $("input[name='selectRow']:checked");
    $.each(selectedRows,
        function() {
            var id = $(this).attr("value");
            array.push(id);
        });

    if (selectedRows.length == 0) {
        showErrorMessage('No ' + entityName + ' Selected. Please select the ' + entityName + ' you want to delete');
        return false;
    }

    confirmDelete("Are you sure you want to delete selected " + entityName + "? ", function() {

        var objArray = new Array();
        var newObj = new Object();
        newObj.id = array;

        objArray.push(newObj);

        var postdata = JSON.stringify(objArray);

        postBack("administrator/deleteset", "postdata=" + postdata, function(response) {

            var output = JSON.parse(response);
            console.log(output);
            if (output.status == true) {
                showSuccessMessage(entityName + " Deleted Successfully!");
                $('#entity_modal').modal('hide');
                getAll();
            } else {
                showErrorMessage("Failed to delete " + entityName + ". Please try again later");
            }
        });
    });


}

function restoreEntity() {
    var array = new Array();
    var selectedRows = $("input[name='selectRow']:checked");
    $.each(selectedRows,
        function() {
            var id = $(this).attr("value");
            array.push(id);
        });

    if (selectedRows.length == 0) {
        showErrorMessage('No ' + entityName + ' Selected. Please select the ' + entityName + ' you want to restore');
        return false;
    }

    confirmDelete("Are you sure you want to restore selected " + entityName + "? ", function() {

        var objArray = new Array();
        var newObj = new Object();
        newObj.id = array;

        objArray.push(newObj);

        var postdata = JSON.stringify(objArray);

        postBack("administrator/restoreset", "postdata=" + postdata, function(response) {

            var output = JSON.parse(response);
            console.log(output);
            if (output.status == true) {
                showSuccessMessage(entityName + " Restored Successfully!");
                $('#entity_modal').modal('hide');
                getAll();
            } else {
                showErrorMessage("Failed to restore " + entityName + ". Please try again later");
            }
        });
    });
}

function getEntityDetails() {
   var id = $('input[name=selectRow]:checked:visible:first').val();

    if (!id) {
        showErrorMessage("Please select the " + entityName + " you wish to update");
        return;
    }

    $('#entity_modal').modal('show');
    var set_name = $('#nameTb').val();
    var no_of_quest = $('#ipAddTb').val();
    var objArray = new Array();
    var newObj = new Object();
    newObj.id = id;
    objArray.push(newObj);

    var postdata = JSON.stringify(objArray);
    postBack("administrator/get", "postdata=" + postdata, function(response) {

        var output = JSON.parse(response);
        console.log(output);

        $('#nameTb').val(output.set_name);
        $('#ipAddTb').val(output.no_of_quest);
       
        $('#idTb').val(id);
    });
}

function updateEntity() {
    var set_id=$('#idTb').val();
    var idTb = $('#nameTb').val();
    var nameTb = $('#ipAddTb').val();
    

    var objArray = new Array();
    var newObj = new Object();
    newObj.set_id=set_id;
    newObj.set_name = idTb;
    newObj.no_of_quest = nameTb;
    
    objArray.push(newObj);


    var postdata = JSON.stringify(objArray);
    postBack("administrator/updateset", "postdata=" + postdata, function(response) {
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

    if (isEmpty(nameTb, "Please enter the set name")) {
        $('#nameTb').focus();
        return false;
    }
    
    
    if (isEmpty(ipAddTb, "Please enter the number of questions ")) {
        $('#ipAddTb').focus();
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
