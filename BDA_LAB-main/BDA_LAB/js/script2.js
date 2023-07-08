document.getElementById("submit2").addEventListener("click", function(event) {
    let username = document.getElementById("name").value;
    let password = document.getElementById("password").value;
    let errorMessage = "";
   
    if (username === "Vivek" && password==="vivek@2003") {
        window.location = "Success.php";
    }
    else{
        errorMessage += "Username or password is incorrect\n";
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
    function validatePassword(password) {
      const specialCharacters = "!@#$%^&*()_+-=[]{};:'\"\\|,.<>/?`~";
    let hasLowercase = false;
    let hasUppercase = false;
    let hasSpecial = false;
  
    for (let i = 0; i < password.length; i++) {
      const char = password.charAt(i);
      if (char >= 'a' && char <= 'z') {
        hasLowercase = true;
      } else if (char >= 'A' && char <= 'Z') {
        hasUppercase = true;
      } else if (specialCharacters.indexOf(char) >= 0) {
        hasSpecial = true;
      }
    }
  
    return hasLowercase && hasUppercase && hasSpecial;
    }