<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body>
    <div class="authContainer">
      <div class="authWrapper">
        <div class="title"><span>Sign up</span></div>
        <form method="post" class="authForm" action="fordb/usersRegistrationForm.php" onsubmit="return validateForm()">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="email" placeholder="Email" id="email" name="email" required>
          </div>
          <div class="row">
          <i class="fas fa-pen"></i>
            <input type="text" placeholder="Username" id="username" name="username" maxlength="20" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" id="password" placeholder="Password" name="password" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" id="passwordConf" placeholder="Confirm password" name="passwordConf" required>
          </div>
          <p class="error" id="error"></p>
          <div class="row button">
            <input type="submit" value="Login">
          </div>
          <div class="signup-link">Already a member? <a href="/sign-in">Sign in</a></div>
        </form>
      </div>
    </div>
  <script src="reg.js"></script> 
  </body>
</html>