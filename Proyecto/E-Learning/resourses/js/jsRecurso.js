var totalSemanasDinamico = 0;
var sortableSemanasDinamico = "#semana1";
var identificadorId = 0;
var tempIdSelect;

function cargarRecursosCurso(Id_Curso){  
    $('#datos').load("../../interface/fCursos/fRecursosCurso.php?Id_Curso="+Id_Curso);
    $("#lista").css("display", "none");
}

function guardaTempRecursoSelected(d){
    tempIdSelect = d;
    var identificador = $(tempIdSelect).attr("identificador");
    var id = $(tempIdSelect).attr("id");
    var texto = "";
    if (id == 1 || id == 2){
        texto = $("[identificador="+identificador+"]").find('strong').text();            
    }else if (id == 4){
        texto = $("[identificador="+identificador+"]").find('a').text();            
    }
    $('#nombreEtiqueta').val(texto);
}

function guardarConfigurarion(){
        var Id_Curso = $("#Id_Curso").text();
        var lista = [];
        $(".SortableSemanas").each(function() {
            if(($(this).find("li")).children().length > 0){
                var semana = new Object();    
                semana.IdSemana = $(this).attr("id"); 
                var recurso = [];                           // Donde se van almacenar temporalmente los recursos de cada semana
                $(this).find("li").each(function(i) {     // Se crea un objeto por cada recurso de semana
                    var rec = new Object();
                    rec.Rec_Identificador = $(this).attr("identificador");
                    rec.Rec_IdTipo = $(this).attr("id");
                    rec.Rec_Nombre = ($(this).text()).replace(/[\n\r\t]+/g, '');
                    rec.Rec_Nombre = (rec.Rec_Nombre).trim();
                    rec.Rec_Url = $(this).attr("Url");
                    recurso[i] = rec;                    
                }) 
                semana.recurso = recurso;  // Se agrega el array de recursos al objeto de semana                
                lista.push(semana);               
            }                        
        })
        $.ajax({
            url: '../../controller/ctrRecursos/ctrRecursos.php',
            type: 'POST',
            data: {semana:lista, opcion:1, curso:Id_Curso},
            success: function(data) {
                listarRecursos();
                swal("Se ha guardado la configuración", "", "success");
            }
        });
}

function abrirModal(){
    $("#modalRecurso").modal('show');
}

$(document).ready(function () {
    $("#formModalRecurso").on("submit", function(e) {
        var identificador = $(tempIdSelect).attr("identificador");
        var id = $(tempIdSelect).attr("id");
        if (id == 1 || id == 2){
            $("[identificador="+identificador+"]").find('strong').text($('#nombreEtiqueta').val());            
        }else if (id == 4){
            $("[identificador="+identificador+"]").find('a').text($('#nombreEtiqueta').val());            
        }
        $('#nombreEtiqueta').val("");
        $("#modalRecurso").modal('hide');
        e.preventDefault();
    });
     
    $("#btnSubmitModal").on('click', function() {
        $("#formModalRecurso").submit();
    });
});

function totalSemanas() {
    var Id_Curso = $("#Id_Curso").text();
    var deferred = new $.Deferred();
    $.ajax({
        url: '../../controller/ctrRecursos/ctrRecursos.php',
        type: 'POST',
        data: {Id_Curso:Id_Curso, opcion:2},
        success: function(data) {
            concatSortableSemanas(data);
            deferred.resolve();
        }
    });
    return deferred.promise();
}

function concatSortableSemanas(totalSem){
    for (var i = 2; i <= totalSem; i++) {
        sortableSemanasDinamico += ",#semana"+i;
    }
}

function dragAndDrop(){

    $("#sortable").sortable({
        connectWith: ".connectedSortable",
        remove: function(event, ui) {
            ui.item.clone().appendTo(this).val("1");
            ui.item.attr("value","0");
            var id = $((ui.item)).attr('id');
            $((ui.item)).attr('identificador',id+""+identificadorId);
            identificadorId++;
            if(id != 3){
                $(ui.item).attr('onclick','guardaTempRecursoSelected(this);');
                $((ui.item).find('span')).attr('onclick','abrirModal();');
                $((ui.item).find('span')).attr('data-hover','tooltip');
                $((ui.item).find('span')).attr('title','Configuracion');
                $((ui.item).find('span')).removeClass( "ui-icon ui-icon-arrowthick-2-n-s" ).addClass( "ui-icon ui-icon-pencil" );
            }        
        }
    }).disableSelection();

    $(sortableSemanasDinamico).sortable({
        connectWith: ".SortableSemanas"
    }).disableSelection();

    $('#trash').droppable({
        over: function(event, ui) {
           var identi = $((ui.draggable)).attr('identificador');
            if(ui.draggable.val() == 0){
                swal({
                  title: "¿Deseas eliminar este recurso?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Si",
                  cancelButtonText: "No",
                  closeOnConfirm: false
                },
                  function(){
                    var identificador = (ui.draggable).attr('identificador');
                    eliminarRecurso(identificador, ui.draggable); 
                    swal("Eliminado", "El recurso se ha eliminado", "success");
                });  
            }
        }
    });
}

function listarRecursos() {
    var Id_Curso = $("#Id_Curso").text();
    cargarRecursosCurso(Id_Curso);
}

function eliminarRecurso(identificadorRecurso, recurso){
    $.ajax({ 
        url: '../../controller/ctrRecursos/ctrRecursos.php',
        type: 'POST',
        data: {IdentificadorRecurso:identificadorRecurso, opcion:3},
        success: function(data) {  
            recurso.remove();  
            setTimeout(function(){ 
                listarRecursos(); 
            }, 1000);                  
        },
        error: function(data){
            return false;
        }
    });
}


$(function() {
    var promise = totalSemanas();
    promise
    .then(dragAndDrop)
    ;
});


/***** CARGA DE ARCHIVOS *****/
function cargarArchivo(){

    if($('#nombre').val() != null && $('#file').val() != null && $('#semana').val() != null){
        var Id_Curso = $("#Id_Curso").text();
        var Id_Tipo_Recurso = 4; // Es por defecto 4 porque este tipo de recurso es un link
        var Identificador = identificadorId;
        identificadorId++;
        var secuencia = 0;
        var formData = new FormData(document.getElementById("formCargaArchivo"));   
        formData.append("opcion", 1);     
        formData.append("Id_Curso", Id_Curso); 
        formData.append("Id_Tipo_Recurso", Id_Tipo_Recurso); 
        formData.append("Identificador", Identificador); 
        formData.append("secuencia", secuencia); 
        $.ajax({
            url : "../../controller/ctrCargaArchivo/ctrCargaArchivo.php",
            type : "post",
            dataType : "html",
            data : formData,
            cache : false,
            contentType : false,
            processData : false
        }).done(function(data) {   
            $('#cargaArchivo').modal('hide');
            $("#mensaje").html(data);
            $('#informativo').modal('show');
        });
    } else {
        alert("Existen campos vacios.");
    }
}

var $videoTemp = '';
//Carga el video a carpeta tempUploar para simular descarga
function reproducir(name, video){
    $videoTemp = video;
    $.ajax({
        url: '../../controller/ctrCargaArchivo/ctrCargaArchivo.php',
        type: 'POST',
        data: {opcion:2, nombre:video},
        success: function(data) {
            if(data){
                $('#title').text(name);
                $('#video').attr('src', '../../controller/ctrCargaArchivo/tempUpload/'+video);
                $('#modalVideo').modal('show');
            } else {
                swal("No es posible reproducir el video.", "", "warning");
            }
        }
    });
}

//elimina el video una vez cerrado el modal
$("#modalVideo").on('hidden.bs.modal', function () {
    $("#video").attr("src","");
    $.ajax({
        url: '../../controller/ctrCargaArchivo/ctrCargaArchivo.php',
        type: 'POST',
        data: {opcion:3, nombre:$videoTemp},
        success: function(data) {
            console.log(data);
            $videoTemp = '';
        }
    });
});