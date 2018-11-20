var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00",
            "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00"
        ],
        datasets: [{
            label: 'Histórico de Variação da Temperatura',
            data: [-10, -11, -10, -9, -8, -9, -10, -9, -9, -9, -10, -10, -9, -8, -7, -6, -5, -4, -3, -2, -1, 0, 1, 2],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)'
            ],
            borderWidth: 1,
            fill: false
        }]
    },
    options: {
        responsive: true
    }
});