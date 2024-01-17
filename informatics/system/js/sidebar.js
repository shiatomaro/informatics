$(document).ready(function() {
    // Handle sidebar link clicks
    $('#sidebar li a').click(function(e) {
        e.preventDefault();
        var route = $(this).attr('href');
        loadContent(route);
    });

    // Load initial content based on the current route
    var currentRoute = window.location.pathname.substr(1); // Extract route from URL
    loadContent(currentRoute);
});

function loadContent(route) {
    // Dynamically load content into the 'content' div using AJAX
    $.ajax({
        url: 'router.php?route=' + route,
        type: 'GET',
        success: function(data) {
            $('#content').html(data);
        },
        error: function() {
            alert('Error loading content');
        }
    });
}