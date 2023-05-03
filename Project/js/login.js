const open_eye_signup = document.getElementById("show_btn_signup");
const open_eye_login = document.getElementById("show_btn_login");
var isShowingPasswordSignup = false;
var isShowingPasswordLogin = false;

function EyeIcon(_booleanVar , input , openE , closedE ){
    this._booleanVar = !this._booleanVar;
    if (this._booleanVar){
        document.getElementById(input).type = "text";
        document.getElementById(openE).style.display = "none";
        document.getElementById(closedE).style.display = "block";
    }else{
        document.getElementById(input).type = "password";
        document.getElementById(openE).style.display = "block";
        document.getElementById(closedE).style.display = "none";
    }
}

open_eye_signup.addEventListener("click",function(){
    EyeIcon(this.isShowingPasswordSignup , "input_password_signup" , "open_eye_signup" , "slash_eye_signup");
});
open_eye_login.addEventListener("click",function(){
    EyeIcon(this.isShowingPasswordLogin , "input_password_login" , "open_eye_login" , "slash_eye_login");
});


//Switch between Login and SignUp
function activate_login(){
    document.getElementById("signup_section").style.display = "none";
    document.getElementById("login_section").style.display = "flex";
}
function activate_singup(){
    document.getElementById("signup_section").style.display = "flex";
    document.getElementById("login_section").style.display = "none";

}

