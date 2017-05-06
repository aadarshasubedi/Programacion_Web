var totalSemanasDinamico = 0;
var sortableSemanasDinamico = "#semana1";
var identificadorId = 0;
var tempIdSelect;

function cargarRecursosCurso(Id_Curso){  
    $('#datos').load("../../interface/fCursos/fRecursosCurso.php?Id_Curso="+Id_Curso);
    $("#lista").css("display", "none");
}

/*
Cuando se presiona el icono de cada recurso,
se guarda en temporal el recurso seleccionado.

Ademas se agrega el nombre del recurso a la variable del modal,
para que cuando el modal se abra, se vea el nombre que tenía 
antes de cambiarlo.
*/
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

/*
Obtiene todos los recursos que se encuentras en sus respectivas 
semanas.
*/
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
                    recurso[i] = rec;                    
                }) 
                semana.recurso = recurso;  // Se agrega el array de recursos al objeto de semana                
                lista.push(semana);               
            }                        
        })

        //alert(JSON.stringify(lista));
        $.ajax({
            url: '../../controller/ctrRecursos/ctrRecursos.php',
            type: 'POST',
            data: {semana:lista, opcion:1, curso:Id_Curso},
            success: function(data) {
                swal("Se ha guardado la configuración", "", "success");
                //cargarRecursosCurso(Id_Curso);
            }
        });
}

function abrirModal(){
    $("#modalRecurso").modal('show');
}

/*
Guarda en el modal se cambia el nombre del recurso, y se presiona guardar,
se guarda ese nuevo nombre del recurso y se le pone al recurso.
*/
$(document).ready(function () {
    $("#formModalRecurso").on("submit", function(e) {
        //alert($(tempIdSelect).attr('id'));
        var identificador = $(tempIdSelect).attr("identificador");
        var id = $(tempIdSelect).attr("id");
        //alert(tempIdSelect);
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

/*
Obtiene de la base de datos el total de semanas que tiene un curso
*/
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

/*
concatena los id de las semanas para saber cuales semanas van a comunicarse
y asi compartir recursos entre ellas.
*/
function concatSortableSemanas(totalSem){
    for (var i = 2; i <= totalSem; i++) {
        sortableSemanasDinamico += ",#semana"+i;
    }
}

/*
Cuando se arrastra un recurso del panel izquierdo al derecho, al recurso que se agrega a la derecha
se le agregan varias propiedades como el icono, ese mismo icono, se encaga de abrir el modal y activar 
la funcion que guarda en temporal el recurso seleccionado

*/
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

/*
Conecta todas las semanas de un cursos para que se puedan compartir recursos
entre ellas
*/
    $(sortableSemanasDinamico).sortable({
        connectWith: ".SortableSemanas"
    }).disableSelection();

/*
Elimina un recurso que se haya arrastrado al icono de borrar.
*/
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

/*
Carga los recursos que estan en la base de datos asociados al curso
*/
function listarRecursos() {
    var Id_Curso = $("#Id_Curso").text();
    cargarRecursosCurso(Id_Curso);
}

/*
Hace llamados sincronos, primero al metodo de totalsemanas, cuando termine al metodo dragAndDrop y asi sucesivamente.
*/

$(function() {
    var promise = totalSemanas();
    promise
    .then(dragAndDrop)
    ;
});