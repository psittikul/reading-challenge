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
    var title = $(this).parent().find("[data-column='title']").val();
    var author = $(this).parent().find("[data-column='author']").val();
    var dateRead = $(this).parent().find("[data-column='date_read']").val();
    var status = $(this).parent().find("[data-column='status']").val();
    $.ajax({
        method: "POST",
        url: "../includes/save.php",
        data: {
            title: title,
            author: author,
            date_read: dateRead,
            status: status,
        },
        success: function(response) {
            console.log(response);
        }
    });
});