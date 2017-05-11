/*=======================*/
/*        TABLE
/*=======================*/

window.operateEvents = {
    'click .edit': function (e, value, row) {
        //alert("Edit");
        paginaModificarRol(parseInt(row.Codigo));
    }
};

$(function () {
    $('#tableRoles').bootstrapTable({
        toolbar: ".toolbar",
        search: true,
        pagination: true,
        pageSize: 5,
        pageList: [5,10,25,50,100],
        
        formatShowingRows: function(pageFrom, pageTo, totalRows){
            return "Showing " + pageFrom + " to " + pageTo + " of " + totalRows + " rows. \n";
        },
        
        formatRecordsPerPage: function(pageNumber){
            return pageNumber + " Rows per page";
        }
    });
    
    $(window).resize(function () {
        $('#tableRoles').bootstrapTable('resetView');
    });    
});

function operateFormatter(value, row, index) {
    return [
        '<button type="button" class="btn btn-default edit"><i class="fa fa-edit"></i><span> Edit</span></button>'
    ].join('');
}

$Id_RolTemp = "";

$("#informativo").on('hidden.bs.modal', function () {
    cargarPagina('../../interface/fRoles/fGestionRoles.php');
});

function paginaModificarRol(Id_Rol){          
    $('#datos').load("../../interface/fRoles/fModificarRol.php?Id_Rol="+Id_Rol);
    $("#lista").css("display", "none");
}

/***** Agregar Rol *****/
(function($,W,D){
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function(){
            $("#formularioRol").validate({
                rules: {
                    Nombre: "required",
                }, 
                messages: {
                    Nombre: "Campo Requerido",
                },

                submitHandler: function(form) {                 
                    agregarRol();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);
function agregarRol(){
    var formData = new FormData(document.getElementById("formularioRol"));   
    formData.append("opcion", 1);    
    $.ajax({
    url : "../../controller/ctrRoles/ctrRoles.php",
    type : "post",
    dataType : "html",
    data : formData,
    cache : false,
    contentType : false,
    processData : false
    }).done(function(data) {    
        $("#mensaje").html(data);
        $('#informativo').modal('show');
    });
}

/***** Modificar Rol *****/
(function($,W,D){
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function(){
            $("#formularioModificarRol").validate({
                rules: {
                    Nombre: "required",
                    //Estado: "required",
                }, 
                messages: {
                    Nombre: "Campo Requerido",
                    //Estado: "Campo Requerido"
                },

                submitHandler: function(form) {                 
                    modificarRol();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);
function modificarRol(){
    $Id_Rol = $('#Id_Rol').val();
    var formData = new FormData(document.getElementById("formularioModificarRol"));   
    formData.append("opcion", 3); 
    formData.append("Id_Rol", $Id_Rol);    
    $.ajax({
    url : "../../controller/ctrRoles/ctrRoles.php",
    type : "post",
    dataType : "html",
    data : formData,
    cache : false,
    contentType : false,
    processData : false
    }).done(function(data) {  
        $("#mensaje").html(data);
        $('#informativo').modal('show');
    });
}

/***** Eliminar Curso *****/