<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body>
    <div class="authContainer">
      <div class="authWrapper">
        <div class="title"><span>Sign in</span></div>
        <form method="post" class="authForm" action="fordb/usersLoginForm.php">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="email" placeholder="Email" name="email" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required>
          </div>
          <div class="row button">
            <input type="submit" value="Login">
          </div>
          <div class="signup-link">Not a member? <a href="/sign-up">Sign up</a></div>
        </form>
      </div>
    </div>
  </body>
</html>