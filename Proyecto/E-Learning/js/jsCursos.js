$Id_CursoTemp = "";

$("#informativo").on('hidden.bs.modal', function () {
    cargarPagina('../../interface/fCursos/fGestionCursos.php');
});

function paginaModificarCurso(Id_Curso){          
    $('#datos').load("../../interface/fCursos/fModificarCurso.php?Id_Curso="+Id_Curso);
    $("#lista").css("display", "none");
}

function cargarRecursosCurso(Id_Curso){          
    $('#datos').load("../../interface/fCursos/fRecursosCurso.php?Id_Curso="+Id_Curso);
    $("#lista").css("display", "none");
}

function cargarCursoEstudiante(Id_Curso){
    $('#contenedor').load("../../interface/fEstudiante/fRecursosCurso.php?Id_Curso="+Id_Curso);
}

/***** Agregar Curso *****/
function agregarCurso(){
    var formData = new FormData(document.getElementById("formularioCurso"));   
    formData.append("opcion", 1);    
    $.ajax({
    url : "../../controller/ctrCursos/ctrCursos.php",
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

/***** Modificar Curso *****/
function modificarCurso(){
    $Id_Curso = $('#Id_Curso').val();
    var formData = new FormData(document.getElementById("formularioModificarCurso"));   
    formData.append("opcion", 3); 
    formData.append("Id_Curso", $Id_Curso);    
    $.ajax({
    url : "../../controller/ctrCursos/ctrCursos.php",
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