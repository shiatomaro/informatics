function trackApplication() {
    const applicationId = document.getElementById('applicationID').value;

    fetch('track_application.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `applicationId=${encodeURIComponent(applicationId)}`,
    })
    .then(response => response.json())
    .then(data => {
        displayApplicationStatus(data);
    })
    .catch(error => {
        console.error('Fetch error:', error);
    });
}

function displayApplicationStatus(response) {
    const applicationStatusDiv = document.getElementById('applicationStatus');

    if (response.status === 'success') {
        applicationStatusDiv.innerHTML = `Application Status: ${response.applicationStatus}`;
    } else {
        applicationStatusDiv.innerHTML = `Error: ${response.message}`;
    }
}
