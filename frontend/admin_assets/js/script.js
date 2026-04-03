const togglePasswordButton = document.querySelector("#toggle-password");
const closedEyeIcon = document.querySelector("#closed-eye");

const openEyeIcon = document.querySelector("#open-eye");

const passwordElement = document.querySelector("#password");

let isPasswordVisible = false;

togglePasswordButton.addEventListener("click", function () {
    if ( !isPasswordVisible ) {
        // make password visible
        passwordElement.type = "text";
        closedEyeIcon.classList.add("hide");
        openEyeIcon.classList.remove("hide");
    } else {
        // make password hidden
        passwordElement.type = "password";

        closedEyeIcon.classList.remove("hide");
        openEyeIcon.classList.add("hide");
    }

    isPasswordVisible = !isPasswordVisible;
});
