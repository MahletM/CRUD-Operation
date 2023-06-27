<!DOCTYPE html>
<html>
<head>
    <title>Assigned Garbages Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 400px;
            height: 400px;
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <div style="display: flex;">
        <div class="chart-container">
            <canvas id="aboveGarbagesChart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="betweenGarbagesChart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="belowGarbagesChart"></canvas>
        </div>
    </div>

    <div style="display: flex;">
        <div class="chart-container">
            <canvas id="analysisChart"></canvas>
            <div id="analysisText"></div>
        </div>
        <div class="chart-container">
            <canvas id="pieChart"></canvas>
        </div>
    </div>

    <script>
        var aboveData = @json($aboveGarbages);
        var betweenData = @json($betweenGarbages);
        var belowData = @json($belowGarbages);

        var aboveLabels = aboveData.map(function(item) {
            return 'Garbage ' + item.id;
        });

        var betweenLabels = betweenData.map(function(item) {
            return 'Garbage ' + item.id;
        });

        var belowLabels = belowData.map(function(item) {
            return 'Garbage ' + item.id;
        });

        var aboveCtx = document.getElementById('aboveGarbagesChart').getContext('2d');
        var aboveChart = new Chart(aboveCtx, {
            type: 'bar',
            data: {
                labels: aboveLabels,
                datasets: [{
                    label: 'Garbages Above 75',
                    data: aboveData.map(function(item) {
                        return item.level;
                    }),
                    backgroundColor: 'rgba(255, 0, 0, 0.2)', // Above Garbages color
                    borderColor: 'rgba(75, 192, 192, 1)', // Above Garbages border color
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0,
                        max: 100,
                        stepSize: 10,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });

        var betweenCtx = document.getElementById('betweenGarbagesChart').getContext('2d');
        var betweenChart = new Chart(betweenCtx, {
            type: 'bar',
            data: {
                labels: betweenLabels,
                datasets: [{
                    label: 'Garbages Between 40 and 75',
                    data: betweenData.map(function(item) {
                        return item.level;
                    }),
                    backgroundColor: 'rgba(255, 255, 0, 0.2)', // Between Garbages color
                    borderColor: 'rgba(255, 255, 0, 1)', // Between Garbages border color
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0,
                        max: 100,
                        stepSize: 10,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });
        var belowCtx = document.getElementById('belowGarbagesChart').getContext('2d');
        var belowChart = new Chart(belowCtx, {
            type: 'bar',
            data: {
                labels: belowLabels,
                datasets: [{
                    label: 'Garbages Below 40',
                    data: belowData.map(function(item) {
                        return item.level;
                    }),
                    backgroundColor: 'rgba(0, 255, 0, 0.2)', // Below Garbages color
                    borderColor: 'rgba(255, 99, 132, 1)', // Below Garbages border color
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0,
                        max: 100,
                        stepSize: 10,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });

        var abovePercentage = (aboveData.length / (aboveData.length + betweenData.length + belowData.length)) * 100;
        var betweenPercentage = (betweenData.length / (aboveData.length + betweenData.length + belowData.length)) * 100;
        var belowPercentage = (belowData.length / (aboveData.length + betweenData.length + belowData.length)) * 100;

        var analysisCtx = document.getElementById('analysisChart').getContext('2d');
        var analysisChart = new Chart(analysisCtx, {
            type: 'bar',
            data: {
                labels: ['Above 75%', 'Between 40 and 75%', 'Below 40%'],
                datasets: [{
                    label: 'Percentage Analysis',
                    data: [abovePercentage, betweenPercentage, belowPercentage],
                    backgroundColor: [
                        'rgba(255, 0, 0, 0.2)', // Above 75% color
                        'rgba(255, 255, 0, 0.2)', // Between 40 and 75% color
                        'rgba(0, 255, 0, 0.2)' // Below 40% color
                    ],
                    borderColor: [
                        'rgba(255, 0, 0, 1)', // Above 75% border color
                        'rgba(255, 255, 0, 0.2)', // Between 40 and 75% border color
                        'rgba(255, 99, 132, 1)' // Below 40% border color
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0,
                        max: 100,
                        stepSize: 10,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });
        var pieCtx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Above 75%', 'Between 40 and 75%', 'Below 40%'],
                datasets: [{
                    label: 'Percentage Analysis',
                    data: [abovePercentage, betweenPercentage, belowPercentage],
                    backgroundColor: [
                        'rgba(255, 0, 0, 0.2)', // Above 75% color
                        'rgba(255, 255, 0, 0.2)', // Between 40 and 75% color
                        'rgba(0, 255, 0, 0.2)' // Below 40% color
                    ],
                    borderColor: [
                        'rgba(255, 0, 0, 1)', // Above 75% border color
                        'rgba(255, 255, 0, 0.2)', // Between 40 and 75% border color
                        'rgba(255, 99, 132, 1)' // Below 40% border color
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        var analysisText = document.getElementById('analysisText');
        analysisText.innerHTML = 'Percentage Analysis:<br>';
        analysisText.innerHTML += 'Above 75%: ' + abovePercentage.toFixed(2) + '%<br>';
        analysisText.innerHTML += 'Between 40 and 75%: ' + betweenPercentage.toFixed(2) + '%<br>';
        analysisText.innerHTML += 'Below 40%: ' + belowPercentage.toFixed(2) + '%<br>';
    </script>
</body>
</html>