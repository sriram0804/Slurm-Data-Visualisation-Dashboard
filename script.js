document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('chartForm');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        // Fetch form data
        const formData = new FormData(form);
        const startdate = formData.get('startdate');
        const enddate = formData.get('enddate');
        const chartOption = formData.get('chart_option');

        // Send data to the server
        const url = form.action;

        const params = new URLSearchParams({
            startdate: startdate,
            enddate: enddate,
            chart_option: chartOption
        });

        fetch(url, {
            method: 'POST',
            body: params,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        })
        .then(response => response.text())
        .then(html => {
            // Insert the generated chart into the DOM
            const chartContainer = document.querySelector('.chart-container');
            chartContainer.innerHTML = html;

            // Optionally, re-initialize any required scripts
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});



