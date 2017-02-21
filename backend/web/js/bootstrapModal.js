/**
 * Created by mandy on 2/21/17.
 */

$(function() {

//    get the button id
    $('#modalButton').click(function () {
        $('#modal').modal('show').
            find('#modalContent').load($(this).attr('value'));
    });
});
