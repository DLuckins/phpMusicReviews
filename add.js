function changeType(e){
  selected=document.getElementById("selected");
  value = e.target.value;
  selected.value=value;
}
function validateForm() {
    var name = document.getElementById("name").value;
    var author = document.getElementById("author").value;
    var review = document.getElementById("review").value;
    var selected = document.getElementById("selected");
    error= document.getElementById('error');
    error.style.display="none";
    if(!selected.value){
      writeError("Please, submit required data");
      return false;
    }
    if (review === ""||author === ""||name === "") {
      writeError("Please, submit required data");
      return false;
    }
    return true;
  }
function writeError(message){
  var error = document.getElementById("error");
  error.innerHTML = message;
  error.style.display="block";
}