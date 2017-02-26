/**
 * Created by mandy on 2/24/17.
 */


$(function(){
    $(document).on('click', '.languages span', function(){
        var lang = $(this).attr('id');
        $.post('index.php?r=site/language', {'lang': lang}, function(data)
        {

            location.reload(true);
        });
    });
});