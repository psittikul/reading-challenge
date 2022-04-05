$('.update-btn').on('click', function() {
    console.log(this);
    console.log('Update standings with this info: user ID=' + this.parent().data('user'));
    // $.ajax({
    //     method: "POST",
    //     url: "save.php",
    //     data: {
    //     }
    // });
});