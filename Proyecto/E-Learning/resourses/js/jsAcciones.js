function cargarPagina (url) {
    $('#contenedor').load(url);
}

function cargarPaginaDatos (url) {
    $('#datos').load(url);
    $("#lista").css("display", "none");
}

function cargarPaginaListar (url) {
    $('#lista').load(url);
}

function home() {
    window.open("../../interface", "_self");
}

/***** Login *****/
(function($,W,D){
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function(){
            $("#formIniciarSesion").validate({
                rules: {
                    Id_Usuario: "required",
                    clave: "required"
                }, 
                messages: {
                    Id_Usuario: "Campo Requerido",
                    clave: "Campo Requerido"
                },

                submitHandler: function(form) {                 
                    iniciarSesion();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);
function iniciarSesion(){
    var formData = new FormData(document.getElementById("formIniciarSesion"));       
    $.ajax({
    url : "../controller/ctrSesion/ctrIniciarSesion.php",
    type : "post",
    dataType : "html",
    data : formData,
    cache : false,
    contentType : false,
    processData : false
    }).done(function(data) {
        $('#modalLogin').modal().hide();
        //console.log(data);
        location.reload();
    });     
} 

function cerrarSesion() {
    window.open("../../controller/ctrSesion/ctrCerrarSesion.php", "_self");
}

/***** Modificar Usuario Login *****/
(function($,W,D){
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function(){
            $("#formularioModificarUsuarioLogin").validate({
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
                    modificarUsuarioLogin();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);
function modificarUsuarioLogin(){
    $Id_Usuario = $('#Id_Usuario').val();
    $Id_Rol = $('#Id_Rol').val();
    var formData = new FormData(document.getElementById("formularioModificarUsuarioLogin"));   
    formData.append("opcion", 5); 
    formData.append("Id_Usuario", $Id_Usuario); 
    formData.append("Id_Rol", $Id_Rol);   
    $.ajax({
    url : "../../controller/ctrUsuarios/ctrUsuarios.php",
    type : "post",
    dataType : "html",
    data : formData,
    cache : false,
    contentType : false,
    processData : false
    }).done(function(data) {  
        alert(data + "\nLos cambios se verán reflejados en el próximo Inicio de Sesión.");
        window.open("../../interface", "_self");
    });
}