function Hide() {
    var passwordInput = document.getElementById("password-input");
    var passwordCheckWrapper = document.getElementById("password-check-wrapper");

    if (passwordInput == ""){
        passwordCheckWrapper.style.display = "none";
        console.log("Hidden");
    } else {
        passwordCheckWrapper.style.display = "block";
        console.log("Shown");
    }
}