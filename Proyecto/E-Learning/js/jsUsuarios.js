
var $Id_UsuarioTemp = "";

function paginaModificarUsuario(Id_Usuario){          
    $('#datos').load("../../interface/fUsuarios/fModificarUsuario.php?Id_Usuario="+Id_Usuario);
    $("#lista").css("display", "none");
}

/*=======================*/
/*        MODALS
/*=======================*/


$("#informativo").on('hidden.bs.modal', function () {
    cargarPagina('../../interface/fUsuarios/fGestionUsuarios.php');
});

$("#informacionUsuario").on('hidden.bs.modal', function () {
    document.getElementById("Id_Usuario").innerHTML = "";
    document.getElementById("nombre").innerHTML = "";
    document.getElementById("primer_apellido").innerHTML = "";
    document.getElementById("segundo_apellido").innerHTML = "";
    document.getElementById("id_genero").innerHTML = "";
    document.getElementById("pais").innerHTML = "";
});

/*=======================*/
/*     VALIDACIONES
/*=======================*/

/***** Agregar Usuario *****/
(function($,W,D){
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function(){
            $("#formularioUsuario").validate({
                rules: {
                    Id_Usuario: "required",
                    Clave: "required",
                    Id_Genero: "required",
                    Nombre: "required",
                    Primer_Apellido: "required",
                    Segundo_Apellido: "required",
                    Pais: "required"
                }, 
                messages: {
                    Id_Usuario: "Campo Requerido",
                    Clave: "Campo Requerido",
                    Id_Genero: "Campo Requerido",
                    Nombre: "Campo Requerido",
                    Primer_Apellido: "Campo Requerido",
                    Segundo_Apellido: "Campo Requerido",
                    Pais: "Campo Requerido"
                },

                submitHandler: function(form) {                 
                    agregarUsuario();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);
function agregarUsuario(){
    var formData = new FormData(document.getElementById("formularioUsuario"));   
    formData.append("opcion", 1);     
    $.ajax({
    url : "../../controller/ctrUsuarios/ctrUsuarios.php",
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

/***** Modificar Usuario *****/
 (function($,W,D){
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function(){
            $("#formularioModificarUsuario").validate({
                rules: {
                    Id_Usuario: "required",
                    Clave: "required",
                    Id_Genero: "required",
                    Nombre: "required",
                    Primer_Apellido: "required",
                    Segundo_Apellido: "required",
                    Pais: "required"
                }, 
                messages: {
                    Id_Usuario: "Campo Requerido",
                    Clave: "Campo Requerido",
                    Id_Genero: "Campo Requerido",
                    Nombre: "Campo Requerido",
                    Primer_Apellido: "Campo Requerido",
                    Segundo_Apellido: "Campo Requerido",
                    Pais: "Campo Requerido"
                },

                submitHandler: function(form) {                 
                    modificarUsuario();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);
function modificarUsuario(){
    $Id_Usuario = $('#Id_Usuario').val();
    var formData = new FormData(document.getElementById("formularioModificarUsuario"));   
    formData.append("opcion", 3); 
    formData.append("Id_Usuario", $Id_Usuario);    
    $.ajax({
    url : "../../controller/ctrUsuarios/ctrUsuarios.php",
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

/***** Eliminar Usuario *****/
function modalEliminarUsuario($Id_Usuario){
    $Id_UsuarioTemp = $Id_Usuario;
    var mensaje = "Deseas eliminar el usuario: " + $Id_Usuario;
    $("#mensajeEliminar").html(mensaje);
    $('#eliminar').modal('show');
}

$("#eliminarU").click(function(){  
    var formData = new FormData("");    
    formData.append("opcion", 2);     
    $.ajax({
    url : "../../controller/ctrUsuarios/ctrUsuarios.php?Id_Usuario="+$Id_UsuarioTemp,
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
});

/***** Consultar Usuario *****/
function infoUsuario($Id_Usuario){
    $('#informacionUsuario').modal('show');
    var formData = new FormData("");    
    formData.append("opcion", 4);     
    $.ajax({
        url : "../../controller/ctrUsuarios/ctrUsuarios.php?Id_Usuario="+$Id_Usuario,
        type : "post",
        dataType : "html",
        data : formData,
        cache : false,
        contentType : false,
        processData : false
    }).done(function(data) { 

        var obj = JSON.parse(data);

        document.getElementById("Id_Usuario").innerHTML = obj[0].Id_Usuario;
        document.getElementById("nombre").innerHTML = obj[0].Nombre;
        document.getElementById("primer_apellido").innerHTML = obj[0].Primer_Apellido;
        document.getElementById("segundo_apellido").innerHTML = obj[0].Segundo_Apellido;
        document.getElementById("id_genero").innerHTML = obj[0].Id_Genero;
        document.getElementById("pais").innerHTML = obj[0].Pais;
    });
}