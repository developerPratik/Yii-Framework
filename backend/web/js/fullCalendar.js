/**
 * Created by mandy on 2/22/17.
 */


$(function(){

    $(document).on('click', '.fc-day', function() {
        var date = $(this).attr('data-date');
        $.get('index.php?r=events/create', {'date': date}, function (data) {
            $('#modal').modal('show').
                find('#modalContent').html(data);
        });
    });

});
