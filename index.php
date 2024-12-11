<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SlurmJobs</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h2>SLURM FINISHED JOBS INFO</h2>
        <form id="chartForm" action="data_processing.php" method="post">
            <label for="startdate">Start Date:</label>
            <input type="date" id="startdate" name="startdate" required>
            <br><br>
            <label for="enddate">End Date:</label>
            <input type="date" id="enddate" name="enddate" required>
            <br><br>
            <label for="chart_option">Select Chart Option:</label>
            <select id="chart_option" name="chart_option" required>

                <option value="groupname_vs_slots">Groupname vs CPU Used </option>
                <option value="groupname_vs_jobs">Group vs No. of Jobs </option>
                <option value="username_vs_slots">Username vs Slots </option>
                <option value="groupname_vs_ElapsedTime">Groupname vs RunTime </option>
                <option value="username_vs_ElapsedTime">Username vs RunTime</option>
                <option value="slots_vs_ElapsedTime">CPU Used vs RunTime</option>
            </select>
            <br><br>
            <button type="submit">Generate Charts</button>
        </form>
        <br><br>
        <div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
