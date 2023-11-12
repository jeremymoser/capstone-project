// New Password Validation
document.getElementById("new_password").addEventListener("input", () => {
    let current_password = document.getElementById("current_password").value;
    let new_password = document.getElementById("new_password").value;
    const len = new_password.length;
    const uppercase = /[A-Z]/;
    const number = /\d/;
    const special = /[~!@#\$%\^\&*\-_={\[\]};,.?]/;
    if (current_password !== new_password) {
      document.getElementById("current").classList.add("text-success");
      document.getElementById("current").classList.remove("text-danger");
    } else {
      document.getElementById("current").classList.add("text-danger");
      document.getElementById("current").classList.remove("text-success");
    }
    if (len >= 10) {
      document.getElementById("length").classList.add("text-success");
      document.getElementById("length").classList.remove("text-danger");
    } else {
      document.getElementById("length").classList.add("text-danger");
      document.getElementById("length").classList.remove("text-success");
    }
    if (uppercase.test(new_password)) {
      document.getElementById("uppercase").classList.add("text-success");
      document.getElementById("uppercase").classList.remove("text-danger");
    } else {
      document.getElementById("uppercase").classList.add("text-danger");
      document.getElementById("uppercase").classList.remove("text-success");
    }
    if (number.test(new_password)) {
      document.getElementById("number").classList.add("text-success");
      document.getElementById("number").classList.remove("text-danger");
    } else {
      document.getElementById("number").classList.add("text-danger");
      document.getElementById("number").classList.remove("text-success");
    }
    if (special.test(new_password)) {
      document.getElementById("special").classList.add("text-success");
      document.getElementById("special").classList.remove("text-danger");
    } else {
      document.getElementById("special").classList.add("text-danger");
      document.getElementById("special").classList.remove("text-success");
    }
    if (
      current_password !== new_password &&
      len >= 10 &&
      uppercase.test(new_password) &&
      number.test(new_password) &&
      special.test(new_password)
    ) {
      document.getElementById("new_password").classList.add("is-valid");
      document.getElementById("new_password").classList.remove("is-invalid");
      document
        .getElementById("confirm_new_password_field")
        .classList.remove("d-none");
      document.getElementById("confirm_new_password").classList.add("d-block");
      passwordsMatch(
        document.getElementById("new_password").value,
        document.getElementById("confirm_new_password").value
      );
    } else {
      document.getElementById("new_password").classList.add("is-invalid");
      document.getElementById("new_password").classList.remove("is-valid");
      document.getElementById("save").disabled = true;
    }
  });
  
  // Confirm New Password Validation
  document
    .getElementById("confirm_new_password")
    .addEventListener("input", () => {
      let confirm_new_password = document.getElementById(
        "confirm_new_password"
      ).value;
      const new_password = document.getElementById("new_password").value;
      if (confirm_new_password === new_password) {
        document.getElementById("confirm_new_password").classList.add("is-valid");
        document
          .getElementById("confirm_new_password")
          .classList.remove("is-invalid");
      } else {
        document
          .getElementById("confirm_new_password")
          .classList.add("is-invalid");
        document
          .getElementById("confirm_new_password")
          .classList.remove("is-valid");
        document.getElementById("save").disabled = true;
      }
      passwordsMatch(
        document.getElementById("new_password").value,
        document.getElementById("confirm_new_password").value
      );
    });
  
  // Change Password Clear field
  function resetField() {
    document.getElementById("current_password").value = "";
    document
      .getElementById("current_password")
      .classList.remove("is-valid", "is-invalid");
    document.getElementById("new_password").value = "";
    document
      .getElementById("new_password")
      .classList.remove("is-valid", "is-invalid");
    document.getElementById("confirm_new_password").value = "";
    document.getElementById("confirm_new_password_field").classList.add("d-none");
    document
      .getElementById("confirm_new_password")
      .classList.remove("is-valid", "is-invalid");
    document
      .getElementById("current")
      .classList.remove("text-success", "text-danger");
    document
      .getElementById("length")
      .classList.remove("text-success", "text-danger");
    document
      .getElementById("uppercase")
      .classList.remove("text-success", "text-danger");
    document
      .getElementById("number")
      .classList.remove("text-success", "text-danger");
    document
      .getElementById("special")
      .classList.remove("text-success", "text-danger");
    document.getElementById("save").disabled = true;
    document.getElementById("current_password").focus();
  }
  
  function passwordsMatch(new_password, confirm_new_password) {
    if (new_password === confirm_new_password) {
      document.getElementById("save").disabled = false;
      document.getElementById("confirm_new_password").classList.add("is-valid");
      document
        .getElementById("confirm_new_password")
        .classList.remove("is-invalid");
    } else {
      document.getElementById("save").disabled = true;
      document.getElementById("confirm_new_password").classList.add("is-invalid");
      document
        .getElementById("confirm_new_password")
        .classList.remove("is-valid");
    }
  }