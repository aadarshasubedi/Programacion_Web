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