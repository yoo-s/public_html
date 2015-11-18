function CheckPassword(inputtxt) 
{ 
  var passw=  /^[A-Z][0-9][0-9]$/;
  if(inputtxt.value.match(passw)) 
  { 
    alert('Correct, try another...')
      return true;
  }
  else
  { 
    alert('Wrong...!')
      return false;
  }
}

