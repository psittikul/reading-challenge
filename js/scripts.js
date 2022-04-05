$("[data-column='status']").on('change', function() {
    var dateRead = $(this).parent().next().find("[data-column='date_read']");
    console.log("Status changed to: " + $(this).val());
    console.log(dateRead);
    if($(dateRead).val() !== 'Read') {
        $(dateRead).prop('disabled', true);
    }
});

$('.update-btn').on('click', function() {
    var title = $(this).parent().find("[data-column='title']").val();
    var author = $(this).parent().find("[data-column='author']").val();
    var dateRead = $(this).parent().find("[data-column='date_read']").val();
    var status = $(this).parent().find("[data-column='status']").val();
    console.log('Update standings with this info: user ID=' + $(this).parent().data('user') + ' title: ' + title + ' author: ' + author);
    // $.ajax({
    //     method: "POST",
    //     url: "save.php",
    //     data: {
    //     }
    // });
});