<?php
$servername = "localhost";
$username = "root"; 
$password = "";  
$dbname = "jobdata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function filterData($conn, $startdate, $enddate) {
    $starttime = $startdate . " 00:00:00";
    $endtime = $enddate . " 23:59:59";
    $sql = "SELECT * FROM slurmfinishedjobsinfo WHERE starttime >= '$starttime' AND endtime <= '$endtime'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

function prepareChartData($filteredData, $chartOption) {
    $chartData = [];
    switch ($chartOption) {
        case 'groupname_vs_slots':
            foreach ($filteredData as $row) {
                $groupname = $row['groupname'];
                $slots = $row['slots'];
                if (isset($chartData[$groupname])) {
                    $chartData[$groupname] += $slots;
                } else {
                    $chartData[$groupname] = $slots;
                }
            }
            break;
        case 'groupname_vs_jobs':
            foreach ($filteredData as $row) {
                $groupname = $row['groupname'];
                if (isset($chartData[$groupname])) {
                    $chartData[$groupname]++;
                } else {
                    $chartData[$groupname] = 1;
                }
            }
            break;
        case 'username_vs_slots':
            foreach ($filteredData as $row) {
                $username = $row['username'];
                $slots = $row['slots'];
                if (isset($chartData[$username])) {
                    $chartData[$username] += $slots;
                } else {
                    $chartData[$username] = $slots;
                }
            }
            break;
        case 'groupname_vs_ElapsedTime':
            foreach ($filteredData as $row) {
                $groupname = $row['groupname'];
                $ElapsedTime = $row['ElapsedTime'];
                if (isset($chartData[$groupname])) {
                    $chartData[$groupname] += $ElapsedTime;
                } else {
                    $chartData[$groupname] = $ElapsedTime;
                }
            }
            break;
        case 'username_vs_ElapsedTime':
            foreach ($filteredData as $row) {
                $username = $row['username'];
                $ElapsedTime = $row['ElapsedTime'];
                if (isset($chartData[$username])) {
                    $chartData[$username] += $ElapsedTime;
                } else {
                    $chartData[$username] = $ElapsedTime;
                }
            }
            break;
        case 'slots_vs_ElapsedTime':
            foreach ($filteredData as $row) {
                $slots = $row['slots'];
                $ElapsedTime = $row['ElapsedTime'];
                if (isset($chartData[$slots])) {
                    $chartData[$slots] += $ElapsedTime;
                } else {
                    $chartData[$slots] = $ElapsedTime;
                }
            }
            break;
    }
    return $chartData;
}

if (isset($_POST['startdate'], $_POST['enddate'], $_POST['chart_option'])) {
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $chartOption = $_POST['chart_option'];

    $filteredData = filterData($conn, $startdate, $enddate);
    $chartData = prepareChartData($filteredData, $chartOption);

    // Modify X and Y axis labels based on chart option
    switch ($chartOption) {
        case 'groupname_vs_slots':
            $xAxisLabel = 'Groupname';
            $yAxisLabel = 'Slots';
            break;
        case 'groupname_vs_jobs':
            $xAxisLabel = 'Groupname';
            $yAxisLabel = 'Number of Jobs';
            break;
        case 'username_vs_slots':
            $xAxisLabel = 'Username';
            $yAxisLabel = 'Slots';
            break;
        case 'groupname_vs_ElapsedTime':
            $xAxisLabel = 'Groupname';
            $yAxisLabel = 'Runtime (Hours)';
            // Convert ElapsedTime from seconds to hours
            foreach ($chartData as $key => $value) {
                $chartData[$key] = round($value / 3600, 2); // Convert seconds to hours
            }
            break;
        case 'username_vs_ElapsedTime':
            $xAxisLabel = 'Username';
            $yAxisLabel = 'Runtime (Hours)';
            // Convert ElapsedTime from seconds to hours
            foreach ($chartData as $key => $value) {
                $chartData[$key] = round($value / 3600, 2); // Convert seconds to hours
            }
            break;
        case 'slots_vs_ElapsedTime':
            $xAxisLabel = 'Slots';
            $yAxisLabel = 'Runtime (Hours)';
            // Convert ElapsedTime from seconds to hours
            foreach ($chartData as $key => $value) {
                $chartData[$key] = round($value / 3600, 2); // Convert seconds to hours
            }
            break;
        default:
            $xAxisLabel = 'X Axis';
            $yAxisLabel = 'Y Axis';
            break;
    }
} else {
    die('Invalid parameters.');
}

$conn->close();

$chartTypes = [
    'groupname_vs_slots' => 'pie',
    'groupname_vs_jobs' => 'pie',
    'username_vs_slots' => 'pie',
    'groupname_vs_ElapsedTime' => 'bar',
    'username_vs_ElapsedTime' => 'bar',
    'slots_vs_ElapsedTime' => 'bar'
    
];

$chartType = $chartTypes[$chartOption] ?? 'bar';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart" width="300" height="300"></canvas>
    <script>
        const chartData = <?php echo json_encode($chartData); ?>;
        const labels = Object.keys(chartData);
        const data = Object.values(chartData);
        const xAxisLabel = '<?php echo $xAxisLabel; ?>';
        const yAxisLabel = '<?php echo $yAxisLabel; ?>';

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: '<?php echo $chartType; ?>',
            data: {
                labels: labels,
                datasets: [{
                    label: '<?php echo $chartOption; ?>',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false, // Do not maintain aspect ratio
                aspectRatio: 1, // Aspect ratio of 1:1 (square)
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: yAxisLabel
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: xAxisLabel
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>



