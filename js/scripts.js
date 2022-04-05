$('.update-btn').on('click', function() {
    var title = $(this).parent().find("[data-column='title']");
    var author = $(this).parent().find("[data-column='author']");
    console.log('Update standings with this info: user ID=' + $(this).parent().data('user') + ' title: ' + title + ' author: ' + author);
    // $.ajax({
    //     method: "POST",
    //     url: "save.php",
    //     data: {
    //     }
    // });
});