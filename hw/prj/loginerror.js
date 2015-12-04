function loginfail() {
  if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        var xhr=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    var xhr=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange=function() {
    if (xhr.readyState==4 && xhr.status==200) {
      document.getElementById("loginfail").innerHTML=xhr.responseText;
    }
  }
  xhr.open("GET","loginfail.php",true);
  xhr.send();
}

