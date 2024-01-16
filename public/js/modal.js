

$(document).ready(function () {

    $('.supprimer').on('click', function() {
        let oeuvreId = $(this).data('id');
        console.log(oeuvreId)
        $('#confirmDelete').attr('href', "/oeuvre/__id__/delete".replace('__id__', oeuvreId))
    });
});