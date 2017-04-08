$Id_MatriculaTemp = "";

$("#informativo").on('hidden.bs.modal', function () {
    cargarPagina('../../interface/fMatriculas/fGestionMatriculas.php');
});


/***** Agregar Rol *****/
(function($,W,D){
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function(){
            $("#formularioMatricula").validate({

                submitHandler: function(form) {                 
                    agregarMatricula();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);
function agregarMatricula(){
    var formData = new FormData(document.getElementById("formularioMatricula"));   
    formData.append("opcion", 1);    
    $.ajax({
    url : "../../controller/ctrMatriculas/ctrMatriculas.php",
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
