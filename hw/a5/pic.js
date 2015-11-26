

function updatePicture(choice) {
  if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        var xhr=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    var xhr=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange=function() {
    if (xhr.readyState==4 && xhr.status==200) {
      document.getElementById("image").innerHTML=xhr.responseText;
    }
  }
  xhr.open("GET","img.php?choice="+choice,true);
  xhr.send();
}

