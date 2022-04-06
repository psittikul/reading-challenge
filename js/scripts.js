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

function formatDate(date) {
    var month = date.getMonth();
    var day = date.getDate();
    var year = date.getFullYear();
    return year + '-' + month + '-' + day;
}

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Q1'],
        datasets: [{
            label: '# of Votes',
            data: [4],
            backgroundColor: [
                'rgba(204, 204, 255, .8)',
                // 'rgba(54, 162, 235, 0.2)',
                // 'rgba(255, 206, 86, 0.2)',
                // 'rgba(75, 192, 192, 0.2)',
                // 'rgba(153, 102, 255, 0.2)',
                // 'rgba(255, 159, 64, 0.2)'
            ],
            // borderColor: [
            //     'rgba(255, 99, 132, 1)',
            //     'rgba(54, 162, 235, 1)',
            //     'rgba(255, 206, 86, 1)',
            //     'rgba(75, 192, 192, 1)',
            //     // 'rgba(153, 102, 255, 1)',
            //     // 'rgba(255, 159, 64, 1)'
            // ],
            // borderWidth: 1
        }]
    },
    options: {
        indexAxis: 'y',
        scales: {
            y: {
                display: false,
            },
            x: {
                display: false,
            }
        }
    }
});

$('.update-btn').on('click', function() {
    var user_id = $(this).data('user');
    var title = $(this).parent().find("[data-column='title']").val();
    var author = $(this).parent().find("[data-column='author']").val();
    var dateRead = $(this).parent().find("[data-column='date_read']").val();
    console.log(dateRead);
    var status = $(this).parent().find("[data-column='status']").val();
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