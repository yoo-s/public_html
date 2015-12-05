function checkchars(cur){
  //change max length to determine below
  var maxlength=20;
  if (cur.password.value.length > maxlength){
    alert("Password must be 20 characters or less.");
    return false;
  }
}
