const realfileBtn = document.getElementById("realfile");
const custombtn = document.getElementById("change_picture");
const pfp = document.getElementById("pfp");
const editbtn = document.getElementById("editbtn");
const cancelbtn = document.getElementById("cancelprofile");
var isInEditMode = false;

//Change pictures
custombtn.addEventListener("click", function() {
    realfileBtn.click();
});

realfileBtn.addEventListener("change" ,function () {
    const chooseFile = this.files[0];
    if (chooseFile){
        const reader = new FileReader();

        reader.addEventListener('load' , function(){
            pfp.setAttribute('style',`background-image: url('${reader.result}')`);
        });
        reader.readAsDataURL(chooseFile);
    }
});

cancelbtn.addEventListener("click" ,function () {
    this.isInEditMode = false;
    switch_form(this.isInEditMode);
});

editbtn.addEventListener('click',function(){
    this.isInEditMode = true;
    switch_form(this.isInEditMode);
});

function switch_form(p){
    document.getElementById("firstname").readOnly = !p;
    document.getElementById("lastname").readOnly = !p;
    document.getElementById("address").readOnly = !p;
    document.getElementById("email").readOnly = !p;
    document.getElementById("username").readOnly = !p;
    document.getElementById("password").readOnly = !p;
    document.getElementById("phone").readOnly = !p;
    document.getElementById("submitprofile").style.display = (p)? 'block': 'none';
    document.getElementById("cancelprofile").style.display = (p)? 'block': 'none';
    document.getElementById("editbtn").style.display = (p)? 'none': 'block';
    document.getElementById("change_picture").hidden = !p;
}

