<?php
function restrict($to='loggedIn'){
  $activeUser = new ActiveUser;
  $activeUserType = $activeUser->Retrieve('UserType');

  if($to == 'loggedIn'){
    //check if active user is a guest
    if($activeUser->isGuest()){
      global $pypeLoader;

      #DENY ACCESS TO ALL, EXECPT
      $grantAccess = array('pype','access');
      $currentModule = $pypeLoader->module();
      if(!in_array($currentModule, $grantAccess)){
      redirect(isURL('access_denied'));
      }
    }
  }

  if($to == 'student'){
    //check if active user is a student
    if($activeUserType != 'student'){
      redirect(isURL('access_denied!student'));
    }
  }


  if($to == 'notstudent'){
    //check if active user is not a student
    if($activeUserType == 'student'){
      redirect(isURL('access_denied!notstudent'));
    }
  }

  if($to == 'staff'){
    //check if active user is a staff
    if($activeUserType != 'staff'){
      redirect(isURL('access_denied!staff'));
    }
  }

  if($to == 'lecturer'){
    //check if active user is a lecturer
    if($activeUserType != 'lecturer'){
      redirect(isURL('access_denied!lecturer'));
    }
  }

  if($to == 'admin'){
    //check if active user is an admin
    if($activeUserType != 'admin'){
      redirect(isURL('access_denied!admin'));
    }
  }
}

function showIFUser($is){
  $isActiveUser = new ActiveUser;
  $isActiveUserType = strtolower($isActiveUser->Retrieve('UserType'));
  if($isActiveUserType == 'student'){$userIsA = 'student';}
  else {$userIsA = getRecord('StaffIsA',$isActiveUser->Retrieve('BindID'),'staff');}
  
  if($is == $userIsA){return TRUE;}
  else {return FALSE;}
}
?>