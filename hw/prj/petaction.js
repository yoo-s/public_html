function action(petaction) {
  if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        var xhr=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    var xhr=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange=function() {
    if (xhr.readyState==4 && xhr.status==200) {
      document.getElementById("message").innerHTML=xhr.responseText;
    }
  }
  if (petaction == "pet") {
    xhr.open("GET","petaction1.php?action="+petaction,true);
    xhr.send();
  } else if (petaction == "feed") {
    xhr.open("GET","petaction2.php?action="+petaction,true);
    xhr.send();
  } else if (petaction == "play") {
    xhr.open("GET","petaction3.php?action="+petaction,true);
    xhr.send();
  }
}

