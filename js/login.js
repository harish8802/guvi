$(document).ready(function() {
    $('#loginForm').submit(function(event) {
      event.preventDefault();
      var email = $('#email').val();
      var password = $('#password').val();
      $.ajax({
        type: 'POST',
        url: '/php/login.php',
        data: {email: email, password: password},
        success: function(response) {
          if (response === 'Login successful!') {
            localStorage.setItem('isLoggedIn', true);
            window.location.href = '/php/profile.php';
          } else {
            $('#message').html(response);
          }
        }
      });
    });
  });
  