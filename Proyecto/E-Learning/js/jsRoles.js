$Id_RolTemp = "";

$("#informativo").on('hidden.bs.modal', function () {
    cargarPagina('../../interface/fRol/fGestionRoles.php');
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
                    Estado: "required",
                }, 
                messages: {
                    Nombre: "Campo Requerido",
                    Estado: "Campo Requerido"
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