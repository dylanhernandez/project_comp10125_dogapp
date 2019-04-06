/*
|--------------------------------------------------------------------------
| StAuth10065: I Dylan Hernandez, 000307857 certify that this material is my original work. 
| No other person's work has been used without due acknowledgement. 
| I have not made my work available to anyone else.
|--------------------------------------------------------------------------
*/

var tableBody = $('#tableBodySection');
var createButtonSection = $('#createButtonSection');
var formSection = $('#formSection');
var formName = $('#formname');
var form = $('#ajaxForm');
var inputName = $('#nameInput');
var inputAge = $('#ageInput');
var inputOwner = $('#ownerInput');
var inputToys = $('#toysInput');
var inputReference = $('#referenceInput');
var buttonCreate = $("#buttonCreate");
var buttonCancel = $("#buttonCancel");

function ajaxRead() {
    $.get("/dogapp/public/ajax/read", function(data) {
        var buildHTML = "";
        for(var i in data) {
            buildHTML += newTableRow(data[i]);
        }
        tableBody.html(buildHTML);
    });
}

function ajaxCreate() {
    $.post( "/dogapp/public/ajax/add", form.serialize(), function(data) {
        closeForm();
        ajaxRead();
    });
}

function ajaxUpdateGet(dog) {
    if(dog !== undefined) {
        $.get("/dogapp/public/ajax/edit/" + dog, function(data) {
            openForm("Edit");
            inputName.val(data.name);
            inputAge.val(data.age);
            inputOwner.val(data.owner);
            inputToys.val(data.toys);
            inputReference.val(data.id);
        });
    }
}

function ajaxUpdatePost() {
    $.post( "/dogapp/public/ajax/edit/" + inputReference.val(), form.serialize(), function(data) {
        closeForm();
        ajaxRead();
    });
}

function ajaxDelete(dog) {
    $.get( "/dogapp/public/ajax/delete/" + dog, function() {
        closeForm();
        ajaxRead();
    });
}

function openForm(action) {
    formSection.show();
    formName.html(action);
    createButtonSection.hide();
}

function submitForm() {
    var action = formName.html();
    switch(action) {
        case "Add":
            ajaxCreate();
        break;
        case "Edit":
            ajaxUpdatePost();
        break;
    }
}

function closeForm() {
    form.find("input[type=text], input[type=hidden]").val("");
    formSection.hide();
    createButtonSection.show();
}

function newTableRow(dog) {
    var row = "";
    row += "<tr>";
    row += "<td>"+dog.name+"</td>";
    row += "<td>"+dog.age+"</td>";
    row += "<td>"+dog.owner+"</td>";
    row += "<td>"+dog.toys+"</td>";
    row += "<td>"+dog.created_at+"</td>";
    row += "<td>"+dog.updated_at+"</td>";
    row += "<td>";
    row += "<button type='button' class='btn btn-sm btn-block btn-default' role='button' style='margin-bottom:5px;' onclick='ajaxUpdateGet("+dog.id+")' >Edit</button>";
    row += "<button type='button' class='btn btn-sm btn-block btn-danger' role='button' onclick='ajaxDelete("+dog.id+")'>Delete</button>";
    row += "</td>";
    row += "</tr>";
    return row;
}

$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    form.submit(function(e) {
        submitForm();
        e.preventDefault();
    });
    buttonCreate.click(function(){
        openForm("Add");
    });
    buttonCancel.click(function(){
        closeForm();
    });
    ajaxRead();
});