$(document).ready(function() {
    $('#registerForm').submit(function(event) {
      event.preventDefault();
      var name = $('#name').val();
      var email = $('#email').val();
      var password = $('#password').val();
      $.ajax({
        type: 'POST',
        url: 'php/register.php',
        data: {name: name, email: email, password: password},
        success: function(response) {
          $('#message').html(response);
        }
      });
    });
  });
  