<?php
function autoLogIn(){
  $activeUser = new ActiveUser;
  $activeUserType = $activeUser->Retrieve('UserType');
  global $pypeModule;

  if(!$activeUser->isGuest()){
    if(isActiveURL('access')=='yeah' || strtolower($pypeModule)=='pype'){
      #AUTO LOGIN
      if(strtolower($activeUserType) != 'student'){
        redirect(isURL('access_logged-in!staff'),'0','off');
      } 
      else {
        redirect(isURL('student'));
      }
    }   
  }
}
?>