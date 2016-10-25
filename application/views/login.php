<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login Page</title>

    <!-- Bootstrap -->
  
    <link rel="stylesheet" type="text/css" href="">
  </head>
  <body>
      <h1>Already have an account? Login here</h1>
      
      <?php  
      echo form_open('main/login_validation');
      
      echo validation_errors();
      
      echo "<p>Email ID:";
      echo form_input('email');
      echo "</p>";
      
      echo "<p>Password:";
      echo form_password('password');
      echo "</p>";
      
      echo "<p>";
      echo form_submit('login_submit','Login');
      echo "</p>";
      
      
      echo form_close();
      
      
      ?>
      
      
  </body>
</html>