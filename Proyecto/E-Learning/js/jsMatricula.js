$Id_MatriculaTemp = "";

function getValorSelect(Id_Usuario) {
    $.ajax({
        url: '../../controller/ctrMatriculas/ctrMatriculas.php',
        type: 'POST',
        data: {opcion:5, usuario:Id_Usuario.value},
        success: function(data) {
            var cursos = JSON.parse(data);
            $('#Id_Curso').empty();
            
            if(cursos.length == 0){
                $('#Id_Curso').append( '<option value="0" selected disable>No hay cursos disponibles</option>' );
            }else{
                $('#Id_Curso').append( '<option value="#" selected disable>Seleccione un Curso</option>' );
                for (var i = 0; i < cursos.length; i++) {
                 $('#Id_Curso').append( '<option value="'+cursos[i].Id_Curso+'">'+cursos[i].Nombre+'</option>' );
             }
         }

        }
    });
}

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
