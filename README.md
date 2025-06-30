📊 SLURM-Dashboard
Web-Based SLURM Data Visualization Dashboard

This project provides a lightweight, web-based dashboard designed for visualizing job metrics from SLURM (Simple Linux Utility for Resource Management). It enables system administrators and HPC researchers to analyze job submissions and performance data interactively through customizable charts, driven by user input.

🚀 Features
📈 Dynamic Chart Generation
Create interactive bar, pie, and line charts to visualize SLURM job statistics.

⚙️ Customizable Inputs
Users can specify:

Date Range (Start & End)

Chart Type (Bar, Pie, Line)

🔍 Data Metrics Supported

Username vs Slots (Pie Chart)

Groupname vs Slots (Bar Chart)

Jobname vs Elapsed Time (Bar Chart)

Slots vs Time of Month (Line Chart)

🖥️ Responsive UI
Clean and interactive interface built with HTML/CSS/JavaScript.

🗂️ Repository Structure
bash
Copy
Edit
SLURM-Dashboard/
├── index.php              # Main user interface and chart display
├── data_processing.php    # Backend logic for data retrieval from MySQL
├── styles.css             # Styling for dashboard layout
├── script.js              # Frontend chart rendering and event handling
└── README.md              # Project documentation

🛠️ Tech Stack
Frontend: HTML, CSS, JavaScript

Backend: PHP

Database: MySQL

Charting Library: Chart.js

📦 Installation & Usage
Clone the Repository

bash
Copy
Edit
git clone https://github.com/sriram0804/Slurm-Dashboard.git
cd Slurm-Dashboard
Set Up the MySQL Database

Import your SLURM job log data into MySQL.

Ensure your table has fields like username, groupname, slots, elapsed_time, jobname, and timestamp.

Configure the Database Connection

Open data_processing.php.

Update database credentials (host, username, password, database) accordingly.

Run the Project Locally

Use a local server environment like XAMPP, WAMP, or LAMP.

Place the project folder in your web root directory (e.g., htdocs/).

Navigate to http://localhost/Slurm-Dashboard/index.php in your browser.

Generate Charts

Select chart type, specify the date range, and click "Generate" to view visualizations.

💡 Project Highlights
Enables real-time SLURM data analysis through visual means.

Reduces overhead for system administrators by simplifying job monitoring.

Highly customizable for integrating with larger HPC monitoring solutions.

Uses open-source technologies for easy deployment and collaboration.

