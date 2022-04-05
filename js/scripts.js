$("[data-column='status']").on('change', function() {
    var dateRead = $(this).parent().next().find("[data-column='date_read']");
    if($(dateRead).val() !== 'Read') {
        $(dateRead).val('');
        $(dateRead).prop('disabled', true);
    }
    else {
        $(dateRead).prop('disabled', false);
    }
});

$('.update-btn').on('click', function() {
    var user_id = $(this).data('user');
    var title = $(this).parent().find("[data-column='title']").val();
    var author = $(this).parent().find("[data-column='author']").val();
    var dateRead = $(this).parent().find("[data-column='date_read']").val();
    console.log(dateRead != '');
    var status = $(this).parent().find("[data-column='status']").val();
    $.ajax({
        method: "POST",
        url: "../includes/save.php",
        dataType: 'JSON',
        data: {
            title: title,
            author: author,
            date_read: dateRead != '' ? dateRead : null,
            status: status,
            user_id: user_id,
        },
        success: function(response) {
            console.log(response);
            location.refresh;
        },
        fail: function(response) {
            console.log(response);
        }
    });
});