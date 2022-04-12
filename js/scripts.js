$("[data-column='status']").on('change', function() {
    var dateRead = $(this).parent().next().find("[data-column='date_read']");
    if($(dateRead).val() !== 'Read') {
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

$('.update-btn').on('click', function() {
    var user_id = $(this).data('user');
    var title = $(this).parent().find("[data-column='title']").val();
    var author = $(this).parent().find("[data-column='author']").val();
    var dateRead = $(this).parent().find("[data-column='date_read']").val();
    var status = $(this).parent().find("[data-column='status']").val();
    var prompt_id = $("[data-column='prompt_id'][data-user='" + user_id + "']").val();
    $.ajax({
        method: "POST",
        url: "../includes/save.php",
        // dataType: 'JSON',
        data: {
            title: title,
            author: author,
            date_read: dateRead != '' ? dateRead : null,
            status: status,
            user_id: user_id,
            prompt_id: prompt_id != '' ? prompt_id : null,
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

$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $("#editBookModal").on('show.bs.modal', function(e) {
        var button = $(e.relatedTarget)[0];
        var userID = $(button).data('user');
        var promptID = $(button).data('prompt');
        var title = $(button).data('title');
        // var userID = $(e.relatedTarget).data('user');
        // var promptID = e.relatedTarget.data('prompt');
        // var title = e.relatedTarget.data('title');
        // var author = e.relatedTarget.data('author');
        $(this).find('form').attr('data-user', userID);
        $(this).find("button#saveBookChangesBtn").attr('data-user', userID);
        $(this).find("button#saveBookChangesBtn").attr('data-prompt', promptID);
        $(this).find("input[data-column='title']").val(title);
    });
  })