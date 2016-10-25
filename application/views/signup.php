<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registration Page</title>

    <!-- Bootstrap -->
  
    <link rel="stylesheet" type="text/css" href="">
  </head>
  <body>
      <h1>Create New Account Here</h1>
      
      <?php  
      echo form_open('main/signup_validation');
      
      echo validation_errors();
      
      echo "<p>First Name:";
      echo form_input('first_name');
      echo "</p>";
      
      echo "<p>Last Name:";
      echo form_input('last_name');
      echo "</p>";
      
      echo "<p>Username:";
      echo form_input('username');
      echo "</p>";
      
      echo "<p>Email ID:";
      echo form_input('email',$this->input->post('email'));
      echo "</p>";
      
      echo "<p>Password:";
      echo form_password('password');
      echo "</p>";
      
      echo "<p>Confirm Password:";
      echo form_password('cpassword');
      echo "</p>";
      
      echo "<p>";
      echo form_submit('signup_submit','Sign Up');
      echo "</p>";
      
      
      echo form_close();
      ?>
      
  </body>
</html>