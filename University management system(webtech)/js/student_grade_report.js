
    function showAllGrade(){

        const xhttp = new XMLHttpRequest();

        xhttp.open('POST', '../views/students/getGrade.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send();

        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){

                document.getElementById('txtHint').innerHTML = this.responseText;
            }
        }
    }