document.addEventListener('DOMContentLoaded', function () {
    // Chart MyReview
    var ctx = document.getElementById("info-review");
    if (ctx) {
        var reviewProgress = document.getElementById("review-progress");
        var reviewItem = document.querySelectorAll('.my-review .data-review');
        var labelReview = [], dataReview = [], colorReview = [], averageScore = 0;
        var dataColor = ['#ce68a5', '#4ab5c1', '#6975c8', '#3091d3', '#04c37d', '#cac304'];
        for (var i = 0; i < reviewItem.length; i++) {
            labelReview.push(reviewItem[i].getAttribute('data-name'));
            dataReview.push(reviewItem[i].getAttribute('data-score'));
            colorReview.push(dataColor[i]);
            averageScore += Number(reviewItem[i].getAttribute('data-score'));
        }
        averageScore = (averageScore/reviewItem.length).toFixed(1);
        var myReview = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                labels: labelReview,
                datasets: [{
                    data: [10, 10, 10, 10, 10],
                },
                {
                    label: 'Đánh giá',
                    data: dataReview,
                    backgroundColor: colorReview,
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        ticks: {
                            min: 0,
                            max: 10
                        },
                        display: false
                    }],
                    yAxes: [{
                        ticks: {
                            mirror: true,
                            labelOffset: -20,
                            fontSize: 15,
                            fontFamily: "'Arsenal', sans-serif",
                            fontStyle: '400',
                            fontColor: '#333'
                        },
                        categoryPercentage: 0.3,
                        barPercentage: 1.0,
                        stacked: true,
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                    }]
                },
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var label = data.datasets[tooltipItem.datasetIndex].label || '';
                            if (label) {
                                if (label !== "") {
                                    label += ': ';
                                    label += tooltipItem.xLabel + " đ";
                                }
                            }
                            return label;
                        }
                    }
                }
            }
        });
        if (reviewProgress) {
            var myReviewProgress = new Chart(reviewProgress, {
                type: 'doughnut',
                data: {
                  labels: labelReview,
                  datasets: [{
                    backgroundColor: colorReview,
                    data: dataReview,
                    hoverBorderWidth: 4
                  }]
                },
                plugins: [{
                  beforeDraw: function(chart) {
                    var width = chart.chart.width,
                        height = chart.chart.height,
                        ctx = chart.chart.ctx;
                
                    ctx.restore();
                    var fontSize = (height / 100).toFixed(2);
                    ctx.font = fontSize + "em 'Arsenal', sans-serif";
                    ctx.fillStyle = "#dc0e18";
                    ctx.textBaseline = "middle";
                
                    var text = averageScore,
                        textX = Math.round((width - ctx.measureText(text).width) / 2),
                        textY = height / 2;
                
                    ctx.fillText(text, textX, textY);
                    ctx.save();
                  }
              }],
                options: {
                    layout: {
                        padding: {
                            top: 15,
                            bottom: 15
                        }
                    },
                    legend: {
                    display: false,
                    },
                    maintainAspectRatio: false,
                    cutoutPercentage: 80
                }
            });
        }
    }

    // Chart Suitable Time
    var suitableTime = document.getElementById('suitable-time');
    if (suitableTime) {
        var timeItem = document.querySelectorAll('.data-time');
        var labelTime = [], dataTime = [];
        for (var i = 0; i < timeItem.length; i++) {
            labelTime.push(timeItem[i].getAttribute('data-time'));
            dataTime.push(timeItem[i].getAttribute('data-suitable'));
        }
        var travelTime = new Chart(suitableTime, {
            type: "bar",
            data: {
                labels: labelTime,
                datasets: [{
                    data: dataTime,
                    backgroundColor: [
                        '#49d4e2',
                        '#49d4e2',
                        '#49d4e2',
                        '#49d4e2',
                        '#49d4e2',
                        '#49d4e2',
                        '#49d4e2',
                        '#49d4e2',
                        '#49d4e2',
                        '#49d4e2',
                        '#49d4e2',
                        '#49d4e2'
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 10
                        },
                        display: false
                    }],
                    xAxes: [{
                        ticks: {
                            fontSize: 14,
                            fontFamily: "'Arsenal', sans-serif",
                            fontStyle: '400',
                            fontColor: '#333'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                    }]
                },
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var label = data.datasets[tooltipItem.datasetIndex].label || '';
                            if (tooltipItem.yLabel <= 2) {
                                var suitable = "Không thích hợp";
                            } else if (tooltipItem.yLabel <= 4) {
                                var suitable = "Bình thường";
                            } else if (tooltipItem.yLabel <= 6) {
                                var suitable = "Tương đối thích hợp";
                            } else if (tooltipItem.yLabel <= 8) {
                                var suitable = "Thích hợp";
                            } else {
                                var suitable = "Rất thích hợp";
                            }
                            label += suitable;
                            return label;
                        }
                    }
                }
            }
        })
    }
})