$.ajax({
    'url': "http://127.0.0.1:8000/api/chart-data",
    'method': "GET",
    'dataType': "json",
    'success': function (data) {
        console.log(data);
        drawChart(data.to20,data.to40,data.to60,data.to80,data.to100,data.full)
    },
    error: function (msg) {
        alert("Error. Unable to fetch data");
        console.log(msg)
    }
});

function drawChart(to20,to40,to60,to80,to100, full){

    //doughnut
    let ctxD = document.getElementById("myDoughnut").getContext('2d');
    let myLineChart = new Chart(ctxD, {
        type: 'doughnut',
        data: {
            labels: ["Below 20%", "Between 20-40%", "Between 40-60%", "Between 60-80%", "Between 80-100%"],
            datasets: [
                {
                    data: [to20, to40, to60, to80, to100],
                    backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#53a345"],
                    hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#41823e"]
                }
            ]
        },
        options: {
            responsive: true
        }
    });

    //bar chart
    let ctx = document.getElementById("myBarChart").getContext('2d');
    let myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["South Imenti", "North Imenti", "Tigania East", "Tigania West", "Igembe South", "Buuri", "Central Imenti","Igembe Central", "Igembe North"],
            datasets: [{
                label: 'Projects per Constituency',
                data: [full["South Imenti"], full["North Imenti"], full["Tigania East"], full["Tigania West"], full["Igembe South"], full["Buuri"], full["Central Imenti"],full["Igembe Central"], full["Igembe North"]],
                backgroundColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

}