$("[data-column='status']").on('change', function() {
    console.log("Status changed to: " + $(this).val());
    console.log($(this).next());
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