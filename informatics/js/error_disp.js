// displays the error on the div with the error tag based on the URL params
function displayError() {
    // Function to get URL parameter by name
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }

    // Get the error parameter from the URL
    var errorParam = getParameterByName('error');

    // Display the error message in the span
    if (errorParam) {
        var errorMessage = '';

        // Check the error parameter and set the appropriate message
        switch (errorParam) {
            case 'login_invalid':
                errorMessage = 'Invalid login credentials, please try again.';
                break;
            case 'general':
                break;
            default:
                errorMessage = 'An unexpected error occurred. Please try again.';
                break;
        }

        // Update the content of the error span
        document.getElementById('error').innerHTML = errorMessage;

        // Show the error span
        document.getElementById('error').style.display = 'block';
    }
}

displayError();