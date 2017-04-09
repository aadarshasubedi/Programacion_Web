$(function() {
    $("#sortable").sortable({
        connectWith: ".connectedSortable",
        remove: function(event, ui) {
            ui.item.clone().appendTo('#sortable1').val("0");
            $(this).sortable('cancel');
        }
    }).disableSelection();

    $("#sortable1, #sortable2, #sortable3, #sortable4").sortable({
        connectWith: ".SortableSemanas",
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray').toString();
            var Id_Curso = $("#Id_Curso").text();
            $.ajax({
                url: '../../controller/ctrRecursos/ctrRecursos.php',
                type: 'POST',
                data: {list_order:list_sortable, opcion:1, curso:Id_Curso},
                success: function(data) {
                   alert(data);
                }
            });
        },
    }).disableSelection();

    $('#trash').droppable({
        over: function(event, ui) {
           
            if(ui.draggable.val() == 0){
                eliminar = confirm("¿Deseas eliminar este recurso?");
                if(eliminar) {
                   ui.draggable.remove();
                }
            }
        }
    });
});