$(function(){
    $('button').bind('click', function(e){
        var idBut=$(this).attr('id');
        $.post( 'php/deletePerson.php',{paramId: idBut});
        e.preventDefault();
        $(this).closest('tr').remove();
    });
});


