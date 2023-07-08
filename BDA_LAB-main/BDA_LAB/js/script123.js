document.getElementById("send").addEventListener("click", function(event) {
  let username = document.getElementById("name").value;
  let phone = document.getElementById("phone").value;
  let address = document.getElementById("address").value;
  let arrivals = document.getElementById("arrivals").value;
  let leaving = document.getElementById("leaving").value;
  let email = document.getElementById("email").value;
  const usernameRegex = new RegExp(/^[A-Za-z0-9_!#$%&'*+\/=?`{|}~^.-]+@iiita.ac.in/,"gm");
  let errorMessage = "";
  if (username === "") {
    errorMessage += "Username must be filled out \n";
  } else if (username.length < 5) {
    errorMessage += "Username must be at least 5 characters long\n";
  }
  else if(/[^a-zA-Z ]/.test(username)){
    errorMessage+="Username must not contain any number or special charcters";
  }
  else if(phone===""){
      errorMessage += "Phone not filled\n";
  }
  else if(phone.length<10 || phone.length>10){
      errorMessage += "Invalid Phone number\n";
  }
  else if(address===""){
      errorMessage += "Address not filled\n";
  }
  else if (/[^a-zA-Z , ]/.test(address)){
      errorMessage += "Address should only contain letters AND MUST NOT CONTAIN ANY  SPECIAL CHARACTERS \n";
  }
  else if(! usernameRegex.test(email)){
      errorMessage += "Invalid email\n";
  }
  else if(arrivals && leaving && arrivals>leaving){
    errorMessage += "Invalid Dates\n";
    window.location = "book.php";
  }
// if (validatePassword(password)) {
//   errorMessage += "Password must have 2 special characters\n";
// }
  if (errorMessage !== "" ) {
    alert(errorMessage);
    return false;
  }
  return true;
  }); 
  var validateData = function () {
    var jday = $('arrival').val();
    var lday = $('#leaving').val();
    if (jday && lday && jday > lday) {return}

    return true;
};