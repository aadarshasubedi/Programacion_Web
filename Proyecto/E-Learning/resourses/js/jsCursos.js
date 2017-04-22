/*=======================*/
/*        TABLE
/*=======================*/

window.operateEvents = {
    'click .recursos': function (e, value, row) {
        //alert("Info");
        cargarRecursosCurso(parseInt(row.Codigo));
    },
    'click .edit': function (e, value, row) {
        //alert("Edit");
        paginaModificarCurso(parseInt(row.Codigo));
    }
};

$(function () {
    $('#tableCursos').bootstrapTable({
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
        $('#tableCursos').bootstrapTable('resetView');
    });    
});

function operateFormatter(value, row, index) {
    return [
        '<button type="button" class="btn btn-default recursos"><i class="fa fa-list-alt"></i><span> Resourses</span></button>',
        '<span> </span>',
        '<button type="button" class="btn btn-default edit"><i class="fa fa-edit"></i><span> Edit</span></button>'
    ].join('');
}

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
(function($,W,D){
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function(){
            $("#formularioCurso").validate({
                rules: {
                    Nombre: "required",
                    Fecha_Inicio: "required",
                    Fecha_Final: "required",
                }, 
                messages: {
                    Nombre: "Campo Requerido",
                    Fecha_Inicio: "Campo Requerido",
                    Fecha_Final: "Campo Requerido"
                },

                submitHandler: function(form) {                 
                    agregarCurso();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);

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

var style = document.createElement("link");
    style.href = "//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css";
document.head.appendChild(style);

var script = document.createElement("script");
    script.src = "https://code.jquery.com/ui/1.12.1/jquery-ui.js";
document.head.appendChild(script);