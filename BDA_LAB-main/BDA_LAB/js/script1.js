document.getElementById("submit1").addEventListener("click", function(event) {
    let username = document.getElementById("name").value;
    let password = document.getElementById("password").value;
    let errorMessage = "";
   
    var regName = /^[a-zA-Z]+ [a-zA-Z]/;
    if (username === "") {
      errorMessage += "Username must be filled out \n";
    } else if (username.length < 5) {
      errorMessage += "Username must be at least 5 characters long\n";
    } else if (/\d/.test(username)) {
      errorMessage += "Username should not contain numbers\n";
    }
   else if (password === "") {
      errorMessage += "Password must be filled out and not left empty\n";
    } else if (password.length < 8) {
      errorMessage += "Password must be at least 8 characters long\n";
    }
    else{
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