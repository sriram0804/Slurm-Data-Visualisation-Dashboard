# 📊 SLURM-Dashboard

**A Web-Based Visualization Tool for SLURM Workload Metrics**

The SLURM-Dashboard is a dynamic, interactive web-based platform designed to visualize SLURM (Simple Linux Utility for Resource Management) job data. Built using PHP and Chart.js, the dashboard provides system administrators and HPC users with powerful insights into job scheduling, resource usage, and workload distribution through customizable and real-time visualizations.

---

## 🎯 Project Objective

To simplify and enhance SLURM job data analysis by:

- Querying job metrics from a **MySQL database**.
- Providing a **user-friendly interface** to select chart types and date ranges.
- Generating **interactive charts** to explore trends in HPC resource usage.

---

## ⚙️ Features

- **📈 Chart Generation**
  - Visualize SLURM job statistics using:
    - **Pie Charts** – Username vs Slots
    - **Bar Charts** – Groupname vs Slots, Jobname vs Elapsed Time
    - **Line Charts** – Slots vs Time of Month

- **🗓️ Custom Input Options**
  - Select **start and end dates** for targeted time-range analysis.
  - Choose the **desired chart type** from a dropdown.

- **📊 Real-Time Visualization**
  - Charts update instantly based on user input.
  - Built with responsive, interactive components.

---

## 🧰 Tech Stack

| Layer     | Technology     |
|-----------|----------------|
| Frontend  | HTML, CSS, JavaScript |
| Backend   | PHP |
| Database  | MySQL |
| Charts    | [Chart.js](https://www.chartjs.org/) |

---

## 📁 Project Structure

SLURM-Dashboard/
├── index.php # Main dashboard UI and form for input
├── data_processing.php # Backend: fetches and returns data as JSON
├── styles.css # Dashboard styling
├── script.js # Handles frontend chart rendering and AJAX calls
├── README.md # Project documentation

## 💡 Use Cases
Monitor SLURM job patterns across users or groups.

Identify resource hogs and optimize scheduling strategies.

Visualize trends over time for resource planning.
