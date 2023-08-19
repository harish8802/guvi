$(document).ready(function() {
    $('#profileForm').submit(function(event) {
      event.preventDefault();
      var age = $('#age').val();
      var dob = $('#dob').val();
      var contact = $('#contact').val();
      var isLoggedIn = localStorage.getItem('isLoggedIn');
      var id = localStorage.getItem('id');
      $.ajax({
        type: 'POST',
        url: ',php,profile.php',
        data: {age: age, dob: dob, contact: contact, isLoggedIn: isLoggedIn, id: id},
        success: function(response) {
          $('#message').html(response);
        }
      });
    });
  });
  