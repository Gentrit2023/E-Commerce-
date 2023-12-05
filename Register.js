function validation() {
  let usernamePattern = /^[a-zA-Z0-9]{6,20}$/;
  let emailPattern = /^[a-zA-Z.-_]+@+[a-z]+\.+[a-z]{2,3}$/;
  let passwordPattern = /^[a-zA-Z0-9@#$%^&*]{6,20}$/;

  if (document.Formfill.Username.value == "") {
    document.getElementById("result").innerHTML = "Enter Username*";
    return false;
  } else if (!usernamePattern.test(document.Formfill.Username.value)) {
    document.getElementById("result").innerHTML = "Atleast six letter*";
    return false;
  } else if (document.Formfill.Email.value == "") {
    document.getElementById("result").innerHTML = "Enter your Email*";
    return false;
  } else if (!emailPattern.test(document.Formfill.Email.value)) {
    document.getElementById("result").innerHTML = "Invalid Email*";
    return false;
  } else if (document.Formfill.Password.value == "") {
    document.getElementById("result").innerHTML = "Enter your Password*";
    return false;
  } else if (!passwordPattern.test(document.Formfill.Password.value)) {
    document.getElementById("result").innerHTML = "Password incorrect*";
    return false;
  } else if (document.Formfill.CPassword.value == "") {
    document.getElementById("result").innerHTML = "Enter Confirm Password*";
    return false;
  } else if (
    document.Formfill.CPassword.value !== document.Formfill.Password.value
  ) {
    document.getElementById("result").innerHTML = "Password doesn't matched*";
    return false;
  } else if (
    document.Formfill.Password.value == document.Formfill.CPassword.value
  ) {
    popup.classList.add("open-slide");
    return false;
  }
}
