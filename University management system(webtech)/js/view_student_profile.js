
function viewProfileValidation(){

//===================================================================================================

    const xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../views/students/view_student_profile.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){
            //document.getElementById('txtHint').innerHTML=this.responseText;
            location="../views/students/view_student_profile.php";
        }
    }
    xhttp.send();

//=====================================================================================
}
