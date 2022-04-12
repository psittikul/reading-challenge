$("[data-column='status']").on('change', function() {
    var dateRead = $(this).parent().next().find("[data-column='date_read']");
    if($(this).val() !== 'Read') {
        $(dateRead).val('');
        $(dateRead).prop('disabled', true);
    }
    else {
        $(dateRead).val(new Date());
        $(dateRead).prop('disabled', false);
    }
});

$(".show-add-book-btn").on("click", function() {
    var userID = $(this).data("user");
    $("form[data-user='" + userID + "']").css("display") === "none" ? $("form[data-user='" + userID + "']").css("display", "initial") : $("form[data-user='" + userID + "']").css("display", "none");
});

function formatDate(date) {
    var month = date.getMonth();
    var day = date.getDate();
    var year = date.getFullYear();
    return year + '-' + month + '-' + day;
}

// const ctx = document.getElementById('myChart').getContext('2d');
// const myChart = new Chart(ctx, {
//     type: 'bar',
//     data: {
//         labels: ['Q1'],
//         datasets: [{
//             // label: '# of Votes',
//             data: [2],
//             backgroundColor: [
//                 'rgba(204, 204, 255, .8)',
//                 // 'rgba(54, 162, 235, 0.2)',
//                 // 'rgba(255, 206, 86, 0.2)',
//                 // 'rgba(75, 192, 192, 0.2)',
//                 // 'rgba(153, 102, 255, 0.2)',
//                 // 'rgba(255, 159, 64, 0.2)'
//             ],
//             // borderColor: [
//             //     'rgba(255, 99, 132, 1)',
//             //     'rgba(54, 162, 235, 1)',
//             //     'rgba(255, 206, 86, 1)',
//             //     'rgba(75, 192, 192, 1)',
//             //     // 'rgba(153, 102, 255, 1)',
//             //     // 'rgba(255, 159, 64, 1)'
//             // ],
//             // borderWidth: 1
//         }]
//     },
//     options: {
//         indexAxis: 'y',
//         datasets: {
//             label: {
//                 display: false,
//             }
//         },
//         scales: {
//             y: {
//                 display: false,
//             },
//             x: {
//                 display: false,
//             }
//         }
//     }
// });

// $('#saveBookChangesBtn').on('click', function() {
//     var user_id = $(this).attr('data-user');
//     var title = $(this).parent().find("[data-column='title']").val();
//     var author = $(this).parent().find("[data-column='author']").val();
//     var date_read = $(this).parent().find("[data-column='date_read']").val();
//     var status = $(this).parent().find("[data-column='status']").val();
//     var prompt = $("#promptDatalist").val();
//     var book_id = $(this).attr('data-book');
//     if (book_id > 0) {
//         console.log('UPDATE books SET prompt_id = [GET ID FOR] ' + prompt + ' WHERE id = ' + book_id);
//     }
//     else {
//         console.log('INSERT INTO books(title, author, date_read, status, prompt_id) VALUES (' + title + '...)');
//     }
// });

$('#saveBookChangesBtn').on('click', function() {
    var user_id = $(this).attr('data-user');
    var title = $(this).parent().find("[data-column='title']").val();
    var author = $(this).parent().find("[data-column='author']").val();
    var dateRead = $(this).parent().find("[data-column='date_read']").val();
    var status = $(this).parent().find("[data-column='status']").val();
    var book_id = $(this).attr('data-book');
    var prompt_id = null;

    // Get ID that corresponds to selected prompt
    var prompt = $("#promptDatalist").val();
    if (prompt.length > 0) {
        var prompt_selected = document.getElementById('datalistOptions').querySelector('[value="' + prompt + '"]');
        prompt_id = $(prompt_selected).data('id');
    }

    if (book_id > 0) {
        console.log("UPDATE books SET prompt_id = " + prompt_id + 
            ", title = '" + title + "', date_read = " + dateRead + ", status = '" + status + "' WHERE id = " + book_id);
    }
    else {
        console.log('INSERT INTO books(title, author, date_read, status, prompt_id) VALUES (' + title + '...)');
    }
    // $.ajax({
    //     method: "POST",
    //     url: "../includes/save.php",
    //     // dataType: 'JSON',
    //     data: {
    //         title: title,
    //         author: author,
    //         date_read: dateRead != '' ? dateRead : null,
    //         status: status,
    //         user_id: user_id,
    //         prompt_id: prompt_id,
    //     },
    //     success: function(response) {
    //         console.log(response);
    //         location.reload();
    //     },
    //     fail: function(response) {
    //         console.log(response);
    //     }
    // });
});

// $('.update-btn').on('click', function() {
//     var user_id = $(this).data('user');
//     var title = $(this).parent().find("[data-column='title']").val();
//     var author = $(this).parent().find("[data-column='author']").val();
//     var dateRead = $(this).parent().find("[data-column='date_read']").val();
//     var status = $(this).parent().find("[data-column='status']").val();
//     var prompt_id = $("#promptDatalist").val();
//     $.ajax({
//         method: "POST",
//         url: "../includes/save.php",
//         // dataType: 'JSON',
//         data: {
//             title: title,
//             author: author,
//             date_read: dateRead != '' ? dateRead : null,
//             status: status,
//             user_id: user_id,
//             prompt_id: prompt_id != '' ? prompt_id : null,
//         },
//         success: function(response) {
//             console.log(response);
//             location.reload();
//         },
//         fail: function(response) {
//             console.log(response);
//         }
//     });
// });

$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $("#clearPromptBtn").on("click", function() {
        $("#promptDatalist").val("");
    });

    $("[data-column='status']").on('change', function() {
        var dateRead = $(this).parent().next().find("[data-column='date_read']");
        if($(this).val() !== 'Read') {
            $(dateRead).val('');
            $(dateRead).prop('disabled', true);
        }
        else {
            var today = new Date();
            var year = today.getFullYear();
            var month = (today.getMonth() + 1) < 10 ? '0' + (today.getMonth() + 1) : (today.getMonth() + 1);
            var day = today.getDate();
            var date = year + '-' + month + '-' + day;
            $(dateRead).val(date);
            $(dateRead).prop('disabled', false);
        }
    });

    $("#promptDatalist").on('change', function() {
        if ($(this).val() == '') {
            $("#editBookModal").find(".modal-title").text('Edit Entry');
        }
        else {
            $("#editBookModal").find(".modal-title").text($(this).val());
        }
    });

    $("#titleDatalist").on('change', function() {
        var user_id = $(this).attr("data-user");
        var title_selected = document.getElementById('titleOptions' + user_id).querySelector('[value="' + $(this).val() + '"]');
        if ($(title_selected)[0] == null) {
            // This is a new book
            // Reset rest of modal fields
            $("#editBookModal").find("[data-column='author']").val('');
            $("#editBookModal").find("[data-column='status']").val('');
            $("#editBookModal").find("[data-column='date_read']").val('');
        }
        else {
            // Existing book
            var book_id = $(title_selected).data('id');
            var author = $(title_selected).data('author');
            var status = $(title_selected).data('status');
            var date_read = $(title_selected).data('date');
            $("#editBookModal").find("[data-column='author']").val(author);
            $("#editBookModal").find("[data-column='status']").val(status);
            $("#editBookModal").find("[data-column='date_read']").val(date_read);
        }
    });

    $('#saveBookChangesBtn').on('click', function() {
        console.log("Save changes to book");
        var user_id = $(this).attr('data-user');
        // var title = $(this).parent().find("[data-column='title']").val();
        var title = $("#titleDatalist").val();
        var author = $(this).parent().find("[data-column='author']").val();
        var dateRead = $(this).parent().find("[data-column='date_read']").val();
        var status = $(this).parent().find("[data-column='status']").val();
        var book_selected = document.getElementById('titleOptions' + user_id).querySelector('[value="' + title + '"]');
        var book_id = $(book_selected).data('id');
        var old_book_id = null;
        var prompt_id = null;
    
        // Get ID that corresponds to selected prompt
        var prompt = $("#promptDatalist").val();
        if (prompt.length > 0) {
            var prompt_selected = document.getElementById('datalistOptions').querySelector('[value="' + prompt + '"]');
            prompt_id = $(prompt_selected).data('id');
            
            // IF user selected a prompt that already has a book assigned, show a confirmation message
            if($("[data-prompt='" + prompt_id + "'][data-user='" + user_id + "']").data('book') > 0) {
                old_book_id = $("[data-prompt='" + prompt_id + "'][data-user='" + user_id + "']").data('book');
                var title = $("[data-prompt='" + prompt_id + "'][data-user='" + user_id + "']").parent().text().trim();
                let text = 'The book: ' + title + ' is currently assigned to this prompt. Saving changes will move that to a free space.';
                if (confirm(text) == true) {
                    console.log("Confirmed");
                }
                else {
                    console.log("Cancel");
                    return;
                }
            }
        }
    
        if (book_id > 0) {
            console.log("UPDATE books SET prompt_id = " + prompt_id + 
                ", title = '" + title + "', date_read = '" + dateRead + "', status = '" + status + "' WHERE id = " + book_id);
        }
        else {
            console.log('INSERT INTO books(title, author, date_read, status, prompt_id) VALUES (' + title + '...)');
        }
        $.ajax({
            method: "POST",
            url: "../includes/save.php",
            // dataType: 'JSON',
            data: {
                user_id: user_id,
                title: title,
                author: author,
                date_read: dateRead != '' ? dateRead : null,
                status: status,
                book_id: book_id,
                old_book_id: old_book_id,
                prompt_id: prompt_id,
            },
            success: function(response) {
                console.log(response);
                location.reload();
            },
            fail: function(response) {
                console.log(response);
            }
        });
    });

    $("#editBookModal").on('show.bs.modal', function(e) {
        var button = $(e.relatedTarget)[0];
        if ($(button).attr('class') == 'add-book-btn btn') {
            var userID = $(button).data('user');
            $(this).find('.modal-title').text('Add New Book');
            $(this).find("[data-column='status']").val('To Be Read');
            $(this).find("[data-column='status']").change();
            $(this).find("[data-column='date_read']").val('');
            $(this).find("[data-column='author']").val('');
            $(this).find('form').attr('data-user', userID);
            $(this).find("button#saveBookChangesBtn").attr('data-user', userID);
            $(this).find("button#saveBookChangesBtn").attr('data-book', '');
            $(this).find("button#saveBookChangesBtn").attr('data-prompt', '');
            $(this).find("input[data-column='title']").val('');
        }
        if ($(button).attr('class') == 'edit-book-btn btn') {
            var userID = $(button).data('user');
            var book_id = $(button).data('book');
            var author = $(button).parent().data('author');
            var date_read = $(button).parent().data('date');
            var status = $(button).parent().data('status');
            $(this).find("#titleDatalist").attr("data-user", userID);
            $(this).find("#titleDatalist").attr("list", "titleOptions" + userID);
            if($(button).data('prompt')) {
                var promptID = $(button).data('prompt');
                $(this).find("button#saveBookChangesBtn").attr('data-prompt', promptID);
                var prompt = $(button).parent().parent().find('.prompt-cell').text().trim();
                $(this).find('.modal-title').text(prompt);
                $(this).find('#promptDatalist').val(prompt);
            }
            else {
                $(this).find('.modal-title').text('Edit Entry');
            }
            var title = $(button).parent().text().trim();
            $(this).find("[data-column='status']").val(status);
            $(this).find("[data-column='status']").change();
            $(this).find("[data-column='date_read']").val(date_read);
            $(this).find("[data-column='author']").val(author);
            $(this).find('form').attr('data-user', userID);
            $(this).find("button#saveBookChangesBtn").attr('data-user', userID);
            $(this).find("button#saveBookChangesBtn").attr('data-book', book_id);
            $(this).find("input[data-column='title']").val(title);
        }
    });
  })