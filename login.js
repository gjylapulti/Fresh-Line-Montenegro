container = document.querySelector(".container"),
pwShowHide = document.querySelectorAll(".showhidepw"),
pwFields = document.querySelectorAll(".password"),
signUp = document.querySelector(".signup-link"),
login = document.querySelector(".login-link");

pwShowHide.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", ()=>{
        pwFields.forEach(pwField =>{
            if(pwField.type === "password") {
                pwField.type = "text";
                pwShowHide.forEach(icon =>{
                    icon.classList.replace("fa-eye-slash", "fa-eye");
                })
            }else{
                pwField.type = "password";

                pwShowHide.forEach(icon =>{
                    icon.classList.replace("fa-eye", "fa-eye-slash")
                })
            }
            })
        })
    });

    /*signUp.addEventListener("click", function () {
        container.classList.add("active");
    });

    login.addEventListener("click", function() {
        container.classList.remove("active");
    });*/

    //Validimi i formes

    function loginvalidation() {
        let email = document.forms.loginForm.email.value;
        let password = document.forms.loginForm.password.value;
        let regEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

        if(email == "" || !regEmail.test(email)) {
            alert("Please enter a valid E-mail !");
            email.focus();
            return false;
        } if (password == ""){
            alert("Please enter your password");
            password.focus();
            return false;
        } else{
            alert("Login succesful.")
        }
    }

    
    function signUpValidation() {
        let name = document.forms.signUp.name.value;
        let email = document.forms.signUpFrom.email.value;
        let password = document.forms.signUpFrom.password.value;
        let confirmpsw = document.forms.signUpFrom.confirmpassword.value;

        let regEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        let regName = /\d+/g;

        if(name == "" || regName.test(name)) {
            alert("Please enter your name properly");
            name.focus();
            return false;
        }

        if(email == "" || !regEmail.test(email)) {
            alert("Please enter your email properly");
            email.focus();
            return false;
        }
        if(password == "" || regName.test(password)) {
            alert("Please enter your password properly");
            password.focus();
            return false;
        }
        if(confirmpsw == "" || regName.test(confirmpsw)) {
            alert("Please confirm your password. ");
            confirmpsw.focus();
            return false;
        }
    }