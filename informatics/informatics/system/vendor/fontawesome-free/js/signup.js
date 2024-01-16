document.getElementById('signup-form').addEventListener('submit', function(event) {
    event.preventDefault();
     
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var user_type = document.getElementById('user_type').value;
     
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'Main.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
       if (xhr.readyState === 4 && xhr.status === 200) {
         alert('Sign Up Successful!');
         // Redirect the user to the desired page
       }
    };
    xhr.send('username=' + encodeURIComponent(username) + '&email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password) + '&user_type=' + encodeURIComponent(user_type));
   });