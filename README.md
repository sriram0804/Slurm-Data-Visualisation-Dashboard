# Slurm-Dashboard

SLURM Data Visualization Dashboard
This project is a Web-based dashboard for visualizing SLURM (Simple Linux Utility for Resource Management) workload manager data. It allows users to generate dynamic and interactive charts based on job metrics stored in a MySQL database. The dashboard supports user-defined inputs for time range and chart types, providing insightful visualizations for job-related analytics.

Features
Dynamic Chart Generation: Create bar charts, pie charts, and line charts for various SLURM job metrics.
Customizable Inputs: Users can specify the start date, end date, and desired chart type.
Data Analysis: Visualize job data metrics such as:
Username vs Slots (Pie Chart)
Groupname vs Slots (Bar Chart)
Jobname vs Elapsed Time (Bar Chart)
Slots vs Time of Month (Line Chart)
Interactive Design: Built with a responsive and user-friendly interface.
Files in the Repository
index.php: Main interface for user inputs and chart display.
data_processing.php: Backend script for querying the MySQL database and preparing data for visualization.
styles.css: Stylesheet for the dashboard's design.
script.js: JavaScript for rendering charts and handling user interactions.
Technology Stack
Frontend: HTML, CSS, JavaScript
Backend: PHP
Database: MySQL
Charting Library: Chart.js
How to Use
Clone the repository:
bash
Copy code
git clone https://github.com/sriram0804/Slurm-Dashboard.git
Set up your MySQL database with your own/personal log data.
Configure the database connection in data_processing.php.
Deploy the project on a local or web server (e.g., XAMPP, WAMP, or LAMP).
Open index.php in your browser, specify the inputs, and generate visualizations.

Project Highlights
This dashboard facilitates effective analysis and monitoring of SLURM job data, making it a valuable tool for system administrators and researchers managing HPC workloads.
