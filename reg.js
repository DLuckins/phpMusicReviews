function validateForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var passwordConf = document.getElementById("passwordConf").value;
    if(username.length<4){
      writeError("Username should be more than 4 characters");
      return false;
    }
    if (password.length<8) {
      writeError("Password should be atleast 8 characters");
      return false;
    }
    if (password!=passwordConf) {
        writeError("Passwords should be identical!");
        return false;
      }
    return true;
  }
  function writeError(message){
    var error = document.getElementById("error");
    error.innerHTML = message;
    error.style.display="block";
  }