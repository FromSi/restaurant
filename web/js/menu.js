$('.btn-send-request').on('click', function (e) {
    e.preventDefault();

    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var id = $('#id-table').attr('data-value');
    var idList = '';

    for (var i = 0; i < $('.item-list-menu').length; i++) {
        if ($('.item-list-menu').eq(i).hasClass('active')){
            idList += $('.item-list-menu').eq(i).attr('data-value') + ',';
        }
    }

    $.ajax({
        type: 'POST',
        cache: false,
        data: {
            _csrf: csrfToken,
            ids: idList.slice(0, -1),
            id: id,
        },
        url: '/ajax/request',
        success: function (response) {
            location.reload();
        },
        error: function () {
            alert('ERR');
        }
    });

});

$('.item-list-menu').on('click', function (e) {
    if (!$(e.target).closest('a').hasClass('active')){
        $(e.target).closest('a').addClass('active');
    } else {
        $(e.target).closest('a').removeClass('active');
    }
});