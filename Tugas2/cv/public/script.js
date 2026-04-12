function darkMode(){

document.body.classList.toggle("dark");

}


function sendMessage(){

var name = document.getElementById("name").value;
var message = document.getElementById("message").value;

var xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function(){

if(this.readyState == 4 && this.status == 200){

document.getElementById("result").innerHTML = this.responseText;

}

};

xhttp.open("POST","contact.php",true);
xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xhttp.send("name="+name+"&message="+message);

}
